<?php
    include "my_sql.php";
    $db = new connect_DB('localhost','mongonv2',"root",'');
    $qr= new Query("mongonv2");
    function get_user_data($qr,$db)
{
    //=======================Lay data textid infor=================
    $query= $qr->select_data("user");
    $result=$db->get_data($query);
    if (!$result)
    {
        die ('Câu truy vấn bị sai');
    }
    else
    {

    }
    $user_data=[];
    while ($row = mysqli_fetch_assoc($result))
    {
        $user_data[$row['mail']]=[];
        $user_data[$row['mail']]['id']=$row['id'];
        $user_data[$row['mail']]['name']=$row['name'];
        $user_data[$row['mail']]['type']=$row['type'];
        $user_data[$row['mail']]['password']=$row['password'];
        $user_data[$row['mail']]['sect']=$row['sect'];
        $user_data[$row['mail']]['company']=$row['company'];
        $user_data[$row['mail']]['mail']=$row['mail'];
    };
    return $user_data;
}
    $arr_user = get_user_data($qr,$db);
    $data_user_index = array_values($arr_user);
    $id=($_GET["id"]??"");
    $request=($_GET["rq"]??"");
    // echo $id;
    // echo $request;
    $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');

    // =========================Gui mail======================
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    // $data = $array_values($jsonData['VuLam']);
    foreach($jsonData as $key => $value){
        for($i =0;$i < count($data_user_index);$i++){
            if($key === $data_user_index[$i]['name']){
                $creator_name=$data_user_index[$i]['name'];
                $creator_sect=$data_user_index[$i]['sect'];
                $creator_company=$data_user_index[$i]['company'];
                $creator_mail=$data_user_index[$i]['mail'];
                break;
            }
        }

    }

        // echo $jsonData;
        for($i =0;$i < count($data_user_index);$i++){
            if($data_user_index[$i]['id'] === $id){
                $mgr_name=$data_user_index[$i]['name'];
                $mgr_sect=$data_user_index[$i]['sect'];
                $mgr_mail=$data_user_index[$i]['mail'];
                $mgr_company=$data_user_index[$i]['company'];
                break;
            }
        }

    // mail to manager
    $subject = "Reject for additional information ".$request;
    $body = "To: ".$creator_name. "
            \n
            \n The below request for additional information can't approved, so please check the contents again.
            \n Request Number: ".$request."
            \n
            \n Receiver Engineering Contact Information:
            \n==================================================
            \n Company Name: ".$mgr_company." 
            \n User Name: ".$mgr_name."
            \n Department Code: ".$mgr_sect."
            \n
            \n Sender Engineering Contact Information:
            \n==================================================
            \n Company Name: ".$creator_company." 
            \n User Name: ".$creator_name."
            \n Department Code: ".$creator_sect."";

    // $attachmentPath = "test123.json";

    $emailDraft = "mailto:?subject=" . $string = str_replace("+", " ", urlencode($subject)) . "&body=" . $string1 = str_replace("+", " ", urlencode($body)) . "&to=" . $creator_mail;

    // Open the email draft in Outlook
    $command = 'open "' . $emailDraft . '"';
    shell_exec($command);
    // echo $path;
    // =========================Xoa file=====================
    $status=unlink($path);
    if ($status)
    {
        echo "Successfully reject request";
    }
    else
    {
        echo "Error when rejecting";
    }
?>