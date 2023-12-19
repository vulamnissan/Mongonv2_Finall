<?php
//FUNCTION SUPPORT
include "../../BE/my_sql.php";
$user_mail=$_SESSION["email"];
$user_name=$_SESSION["name"];
$user_sect="abcdgroup";
$user_id=$_SESSION["ID"];
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");

function get_count_request($qr, $db) // search last row in table "request"
    {
        $result= $qr->count_data($db, "request");
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

function add_request($qr, $db, $id, $rq, $stt, $creator, $date, $dl, $user)
    {
        $query= $qr->insert_request($db, "request", $id, $rq, $stt, $creator, $date, $dl, $user);
    }
function get_list_request($qr, $db)
    {
        //=======================get data request=================
        $result= $qr->select_data($db, "request");
        if (!$result)
            {
                die ('The query is wrong');
            }
        else
            {
                //nothing to go
            }
        $list_request=[];
        while ($row = mysqli_fetch_assoc($result))
        {
            $list_request[$row['user']]=[];
            $list_request[$row['user']]['requestnumber']=$row['requestnumber'];
            $list_request[$row['user']]['status']=$row['status'];
            $list_request[$row['user']]['requester']=$row['requester'];
            $list_request[$row['user']]['dateissue']=$row['dateissue'];
            
        };
        return $list_request;
    }

function get_user_data($qr, $db)
{
    //=======================Get data user=================
    $result= $qr->select_data($db, "user");
    if (!$result)
        {
            die ('The query is wrong');
        }
    else
        {
            //nothing to do
        }
    $user_data=[];
    while ($row = mysqli_fetch_assoc($result))
        {
            $user_data[$row['mail']]=[];
            $user_data[$row['mail']]['id']=$row['id'];
            $user_data[$row['mail']]['name']=$row['name'];
            $user_data[$row['mail']]['type']=$row['type'];
            $user_data[$row['mail']]['password']=$row['password'];
            
        };
    return $user_data;
}
function get_last_DB($qr, $db)
{
    $result= $qr->select_request_DB($db, "request");
    if (!$result)
        {
            die ('Query wrong');
        }
    else
    {
        //nothing to go 
    }

    $arr_rq_db=[];
    while ($row = mysqli_fetch_assoc($result))
        {
            array_push($arr_rq_db, $row['requestnumber']);    
        };
    return $arr_rq_db;
}
$temp_flag = $_GET['flag']??"";
if($temp_flag != 1){
    $arr_db = get_last_DB($qr, $db);
    if (count($arr_db) == 0)
        {
            $last_DB=1;
            $rq="DB".$last_DB;
            $temp_rq_check = "DB".($last_DB);
        }
    else
        {
            $check_rq=$_SESSION["DB_".$user_id];
            if ($check_rq == "")
                {
                    $arr_replace_db = array_map(function($item){
                    return str_replace("DB", "", $item);
                    }, $arr_db);
                    rsort($arr_replace_db);
                    $last_DB=$arr_replace_db[0]+1;
                    $rq="DB".$last_DB;
                    $temp_rq_check = "DB".($last_DB);
                }
            else
                {
                    $rq=$_SESSION["DB_".$user_id];
                    $temp_rq_check = $rq;
                }
        }
}
else
    {
        $temp_rq_check = $_GET['rq']??"";
        $rq = $_GET['rq']??"";
    }                                           

$last_request=get_count_request($qr, $db); //last row 
$arr_time=getdate();
$time_now=$arr_time['mday']."/".$arr_time['mon']."/".$arr_time['year'];
$id = $last_request;
$stt="Open";
$creator=$user_name;
$date=($time_now);
$user=$user_id;
$dl=NULL;