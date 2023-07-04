<?php
   // ========= Can truyen vao=============================
    $user_mail=$_COOKIE['email'];
    $user_name=$_COOKIE['name'];
    $user_sect="abcdgroup";
    $user_id=$_COOKIE['ID'];
    $user_company="NISSAN";
    //=================================================
    $arr_data=$_POST["arr"]??"";
    $link_json=$_POST["link"]??"";
    include "MySql.php";
    $db = new connect_DB("localhost","mongonv2","root","");
    $qr= new Query("mongonv2");
   
    //=======================Lay data user==================
    // function get_data_user($qr,$db)
    // {
    //     $user = [];
    //     $query= $qr->select_data("user");
    //     $result=$db->get_data($query);
    //     if (!$result)
    //     {
    //         die ('Câu truy vấn bị sai');
    //     }
    //     else
    //     {
    //         // return $result;
    //     }
    //     while ($row = mysqli_fetch_assoc($result))
    //     {
    //         $user[$row["mail"]]['name']=$row["name"];
    //         $user[$row["mail"]]['sect']=$row["sect"];
    //         $user[$row["mail"]]['id']=$row["id"];
    //     };
    //     return $user;
    // }
    
    function get_data_fix_limit($qr,$db)
    {
        //=======================Lay data fix limit==================
        $query= $qr->select_data("fix_limit");
        $result=$db->get_data($query);
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        else
        {
            
        }
        $fix_limit=[];
        while ($row = mysqli_fetch_assoc($result))
        {
            // $fix_limit[$row['id']]=[];

            $fix_limit[$row['display_type']."_".$row['meter']]=$row['limit'];

        };
        return $fix_limit;

    }

    function get_data_textid_infor($qr,$db)
    {
        //=======================Lay data textid infor=================
        $query= $qr->select_data("textid_infor");
        $result=$db->get_data($query);
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        else
        {
    
        }
        $text_infor=[];
        while ($row = mysqli_fetch_assoc($result))
        {
            $text_infor[$row['textid']]=[];
            $text_infor[$row['textid']]['content']=$row['content'];
            $text_infor[$row['textid']]['display_type']=$row['display_type'];
            $text_infor[$row['textid']]['number_lines']=$row['number_lines'];
            $text_infor[$row['textid']]['meter_type']=$row['meter_type'];
            $text_infor[$row['textid']]['US_English']=$row['US_English'];
            
        };
        return $text_infor;
    }

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

    function add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user)
    {
        $query= $qr->insert_request("request",$id,$rq,$stt,$creator,$date,$dl,$user);
        // echo $query;
        $db->get_data($query);
    }
// $arr_user=get_data_user($qr,$db);
$arr_fix_limit=get_data_fix_limit($qr,$db);
$arr_infor_text=get_data_textid_infor($qr,$db);
$last_request=get_count_request($qr,$db);
// print_r($arr_data);
// them noi dung vao fule json
$arr_data['password']="";
$arr_data['creator']=[];
$arr_data['creator']['name']=$user_name;
$arr_data['creator']['sect']=$user_sect;
$arr_data['creator']['mail']=$user_mail;
$arr_data['creator']['company']=$user_company;
$arr_data['mgr']['name']="";
$arr_data['mgr']['sect']="";
$arr_data['mgr']['mail']="";
$arr_data['mgr']['company']="";
$arr_data['translator']['name']="";
$arr_data['translator']['sect']="";
$arr_data['translator']['mail']="";
$arr_data['translator']['company']="";
$arr_data['deadline']="";
$arr_data['user']=$user_id;
$arr_time=getdate();
$time_now=$arr_time['mday']."/".$arr_time['mon']."/".$arr_time['year'];
$arr_data['date']=$time_now;
// lay thong tin cho txt
foreach ($arr_data['translation_request'] as $key=>$value)
{
    $arr_data['translation_request'][$key]['language']['US_English']['content']=$arr_infor_text[$key]['US_English'];
    $arr_data['translation_request'][$key]['content']=$arr_infor_text[$key]['content'];
    $arr_data['translation_request'][$key]['display_type']=$arr_infor_text[$key]['display_type'];
    $arr_data['translation_request'][$key]['number_line']=$arr_infor_text[$key]['number_lines'];
    $arr_data['translation_request'][$key]['layout']="";
    // echo ($arr_infor_text[$key]['display_type']."_".$arr_infor_text[$key]['meter_type']);
    $arr_data['translation_request'][$key]['limit_lenght']=$arr_fix_limit[$arr_infor_text[$key]['display_type']."_".$arr_infor_text[$key]['meter_type']];
}
// print_r($arr_data);

$jsonString = json_encode($arr_data, JSON_PRETTY_PRINT);
// echo ("../../../Data/UserData/".$arr_user[$user_mail]['id']."/test.json");
// print_r($arr_data);

//Save request vao MySQL
$id=$last_request;
$rq="TR".$last_request;
$stt="Open";
$creator=$user_name;
$date=($time_now);
$user=$user_id;
$dl=NULL;

if ($link_json!="")
{
    $link_file_json=$link_json;
}
else
{
    add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user);
    //Save vao file json draf
    $link_file_json="../../../Data/UserData/".$user_id."/".$rq.".json";
}


if (file_put_contents($link_file_json,$jsonString)) 
{
    // $_SESSION["asdasd" & $user_name]  = "../../../Data/UserData/".$user_id."/".$rq.".json";
    // print_r($_SESSION);
    echo $link_file_json;
}
else
{
    echo "Fail";
    // echo "../../../Data/UserData/".$user_id."/".$rq.".json";
}

?>