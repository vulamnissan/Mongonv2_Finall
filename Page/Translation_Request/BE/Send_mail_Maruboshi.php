
<?php

//====================== Lay thong tin maruboshi ========================
// $path = '../../../Data/UserData/2/TR6.json';
// $request="TR01";
$id=($_POST["id"]??"");
$request=($_POST["rq"]??"");
$path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');
// echo $path;
$arr_path=explode("/",$path);
$request=$arr_path[count($arr_path)-1];
$request=str_replace(".json","",$request);

$url="http//";

$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString, true);

$mgr_name=$jsonData["mgr"]['name'];
$mgr_sect=$jsonData['mgr']['sect'];
$mgr_mail=$jsonData['mgr']['mail'];
$mgr_company=$jsonData['mgr']['company'];;

$creator_name=$jsonData['creator']['name'];
$creator_sect=$jsonData['creator']['sect'];
$creator_company=$jsonData['creator']['company'];

$translator_name=$jsonData['translator']['name'];
$translator_sect=$jsonData['translator']['sect'];
$translator_company=$jsonData['translator']['company'];
$translator_mail=$jsonData['translator']['mail'];

$pw=$jsonData['password'];

$time=$jsonData['date'];

// mail to manager
$subject = "Translation Request ".$request;
$body = "To: ".$translator_name. "
        \n
        \n The below translation request has been sent to you, so please check it!
        \n URL: ".$url."
        \n Request Number: ".$request."
        \n
        \n Receiver Engineering Contact Information:
        \n==================================================
        \n Company Name: ".$translator_company." 
        \n User Name: ".$translator_name."
        \n Department Code: ".$translator_sect."
        \n
        \n Sender Engineering Contact Information:
        \n==================================================
        \n Company Name: ".$mgr_company." 
        \n User Name: ".$mgr_name."
        \n Department Code: ".$mgr_sect."";

// $attachmentPath = "test123.json";

$emailDraft = "mailto:?subject=" . $string = str_replace("+", " ", urlencode($subject)) . "&body=" . $string1 = str_replace("+", " ", urlencode($body)) . "&to=" . $translator_mail;

// Open the email draft in Outlook
$command = 'open "' . $emailDraft . '"';
shell_exec($command);


// Mail password
$subject = "Translation Request ".$request;
$body = "To: ".$translator_name. "
        \n
        \n Password: ".$pw."
        \n Receiver Engineering Contact Information:
        \n==================================================
        \n Company Name: ".$translator_company." 
        \n User Name: ".$translator_name."
        \n Department Code: ".$translator_sect."
        \n
        \n Sender Engineering Contact Information:
        \n==================================================
        \n Company Name: ".$mgr_company." 
        \n User Name: ".$mgr_name."
        \n Department Code: ".$mgr_sect."";


// Create the email draft
$emailDraft = "mailto:?subject=" . $string = str_replace("+", " ", urlencode($subject)) . "&body=" . $string1 = str_replace("+", " ", urlencode($body)) . "&to=" . $translator_mail;

// Open the email draft in Outlook
$command = 'open "' . $emailDraft . '"';
shell_exec($command);        

// echo ("asdads");

//===============Luu reauest cua M vao Db ========
        include "MySql.php";
    $db = new connect_DB("localhost","mongonv2","root","");
    $qr= new Query("mongonv2");
        //===== Lay id cua Maruboshi ==========
        $query= $qr->select_id_manager("user",$translator_mail);
        // echo $query;
        $result=$db->get_data($query);
        if (!$result)
        {
                die ('Câu truy vấn bị sai');
        }
        else
        {

        }

        while ($row = mysqli_fetch_assoc($result))
        {
                $id_maruboshi=$row['id'];
        };

        // lay dong cuoi bang request

        function get_count_request($qr,$db)
        {
        $query= $qr->count_data("request");
        $result=$db->get_data($query);
        while ($row = mysqli_fetch_assoc($result))
        {
            $last_row=$row['count(*)']; 
        };
        if ($last_row===0)
        {
            return 1;
        }
        else
        {
            return $last_row+1;
        }
        }

        // Luu request cua M vao DB
        $last_request=get_count_request($qr,$db);
        // echo $last_request;
        $id=$last_request;
        function add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user)
        {
                $query= $qr->insert_request("request",$id,$rq,$stt,$creator,$date,$dl,$user);
                // echo $query;
                $db->get_data($query);
        }
        add_request($qr,$db,$id,$request,"Open",$creator_name,$time,$dl,$id_maruboshi);
        // print_r($jsonData);
        // ======== Luu vao folder cua M ============
        $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
// $link_save_file=str_replace(" ","","../../../Data/UserData/".$id_maruboshi."/".$request.".json");
// echo $id_maruboshi;
if (file_put_contents(str_replace(" ","","../../../Data/UserData/".$id_maruboshi."/".$request.".json"),$jsonString)) 
{
        echo "Please check your email before sending.";
}
else
{
        echo "Fail to send mail";
        // echo "../../../Data/UserData/".$id_maruboshi."/".$request.".json";

}
?>
