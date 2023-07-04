<?php
//============can truyen=========
include "../../BE/my_sql.php";
$user_mail=$_COOKIE["email"];
$user_name=$_COOKIE["name"];
$user_sect="abcdgroup";
$user_id=$_COOKIE["ID"];
$db = new connect_DB('localhost','mongonv2',"root",'');
$qr= new Query("mongonv2");


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
function get_list_request($qr,$db)
{
    //=======================Lay data textid infor=================
    $query= $qr->select_data("request");
    $result=$db->get_data($query);
    if (!$result)
    {
        die ('Câu truy vấn bị sai');
    }
    else
    {

    }
    $list_request=[];
    while ($row = mysqli_fetch_assoc($result))
    {
        $list_request[$row['user']]=[];
        $list_request[$row['user']]['requestnumber']=$row['requestnumber'];
        $list_request[$row['user']]['status']=$row['status'];
        $list_request[$row['user']]['requester']=$row['requester'];
        $list_request[$row['user']]['dateissue']=$row['dateissue'];
        // $text_infor[$row['textid']]['US_English']=$row['US_English'];
        
    };
    return $list_request;
}

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
        
        // $text_infor[$row['textid']]['US_English']=$row['US_English'];
        
    };
    return $user_data;
}
$last_request=get_count_request($qr,$db);
// echo $last_request;

$arr_time=getdate();
$time_now=$arr_time['mday']."/".$arr_time['mon']."/".$arr_time['year'];

// echo $time_now;
//Save request vao MySQL
$id = $last_request;
$rq = "DB".$last_request;;
$stt="Open";
$creator=$user_name;
$date=($time_now);
$user=$user_id;
$dl=NULL;