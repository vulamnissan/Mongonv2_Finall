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
    $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');

    // =========================Gui mail======================
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    // $data = $array_values($jsonData['VuLam']);
    echo "<pre>";
    print_r($jsonData);
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
        $data = array_values($jsonData);
    // mail to manager
    $subject = "Reject for additional information ".$request;
    $body = "To: ".$creator_name. "
            \n
            \n The below request for additional information has been aprroved.
            \n Request Number: ".$request."
            \n URL: http://
            \n
            \n Don't return to the sender of this mail.";


    $emailDraft = "mailto:?subject=" . $string = str_replace("+", " ", urlencode($subject)) . "&body=" . $string1 = str_replace("+", " ", urlencode($body)) . "&to=" . $creator_mail;

    // Open the email draft in Outlook
    $command = 'open "' . $emailDraft . '"';
    shell_exec($command);
    // echo $path;
    // =========================update file vao DB=====================
    function up_text_id($qr,$db,$textid,$content,$display_type,$meter_type,$number_lines,$US_English,$Japanese,$VehicleApplied,$ManagerApproval,$Date)
    {
        $query= $qr->update_textid("textid_infor",$textid,$content,$display_type,$meter_type,$number_lines,$US_English,$Japanese,$VehicleApplied,$ManagerApproval,$Date);
        echo $query;
        $db->get_data($query);
    }

    function get_count_textid($qr,$db)
    {
        $query= $qr->count_data("textid_infor");
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


$last_row_textid=get_count_textid($qr,$db);


foreach($jsonData[$creator_name] as $key => $value){
    // echo ($key);
    $textid=$key;
    $content= $jsonData[$creator_name][$key]['Content'];
    // echo $content;
    $display_type= $jsonData[$creator_name][$key]['Display type'];
    $meter_type= $jsonData[$creator_name][$key]['Meter type'];
    $number_lines= $jsonData[$creator_name][$key]['Number of lines'];
    $US_English= $jsonData[$creator_name][$key]['US English'];
    $Japanese= $jsonData[$creator_name]['Japanese'];
    $VehicleApplied= $jsonData[$creator_name][$key]['Vehicle already applied'];
    $ManagerApproval= $jsonData[$creator_name][$key]['Manager approval status'];
    $Date= $jsonData[$creator_name][$key]['Date'];
    up_text_id($qr,$db,$textid,$content,$display_type,$meter_type,$number_lines,$US_English,$Japanese,$VehicleApplied,$ManagerApproval,$Date);
    echo "Updated";

}
?>