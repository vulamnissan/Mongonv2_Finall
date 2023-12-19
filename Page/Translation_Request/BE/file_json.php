<?php
// CONTENT: SAVE FILE JSON
// INPUT: $user_mail,  $user_name, $user_sect, $user_id, $user_company,$arr_data, $link_json
//OUTPUT: FILE JSON
// 1. INPUT HANDLE
//1.1 INPUT FROM POST
$user_mail=$_SESSION['email'];
$user_name=$_SESSION['name'];
 // ????????????????????????????????????????
$user_sect="abcdgroup";
$user_company="NISSAN";
//????????????????????????????????????????
$user_id=$_SESSION['ID'];
$arr_data=$_POST["arr"]??"";
$link_json=$_POST["link"]??"";
include "MySql.php";
$db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
$qr= new Query("mongonv2");
   
//1.2 INPUT FROM DATABASE
// =================== get data table fix limit ================
function get_data_fix_limit($qr,$db)
    {
        $result= $qr->select_data($db,"fix_limit");
        if (!$result)
            {
                die ('Query is wrong');
            }
        else
            {
                //nothing to do  
            }
        $fix_limit=[];

        while ($row = mysqli_fetch_assoc($result))
            {
                $fix_limit[$row['display_type']."_".$row['meter']]=$row['limit'];
            };
        return $fix_limit;
    }
// =================== get data table textid infor ================
function get_data_textid_infor($qr,$db)
{
    $result= $qr->select_data($db,"textid_infor");
    if (!$result)
        {
            die ('Query wrong');
        }
    else
        {
            // nothing to do 
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
    // =================== get last id of table request ================
    function get_count_request($qr,$db)
    {
        $result= $qr->count_data($db,"request");
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
    // ===================== insert table request ==================================
    function add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user)
        {
            $query= $qr->insert_request($db,"request",$id,$rq,$stt,$creator,$date,$dl,$user);
        }
$arr_fix_limit=get_data_fix_limit($qr,$db);
$arr_infor_text=get_data_textid_infor($qr,$db);
$last_request=get_count_request($qr,$db);
//2. ADD INFOR TO ARRAY JSON
// ===== info of careator , mrg, translator =====
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
// ========================= info of text ===============
foreach ($arr_data['translation_request'] as $key=>$value)
    {
        $arr_data['translation_request'][$key]['language']['US_English']['content']=trim($arr_infor_text[$key]['US_English']);
        $arr_data['translation_request'][$key]['content']=trim($arr_infor_text[$key]['content']);
        $arr_data['translation_request'][$key]['display_type']=trim($arr_infor_text[$key]['display_type']);
        $arr_data['translation_request'][$key]['number_line']=trim($arr_infor_text[$key]['number_lines']);
        $arr_data['translation_request'][$key]['layout']="";
        $arr_data['translation_request'][$key]['limit_lenght']=trim($arr_fix_limit[trim($arr_infor_text[$key]['display_type'])."_".trim($arr_infor_text[$key]['meter_type'])]);
    }

// 3. INSERT TABLE REQUEST AND SAVE FIILE JSON
// 3.1 INSERT TABLE REQUEST
$id=$last_request;
function get_last_TR($qr,$db)
    {
        $result= $qr->select_request_TR($db,"request");
        if (!$result)
            {
                die ('Query wrong1');
            }
        else
            {
                //nothing to do 
            }
        $arr_rq_tr=[];
        while ($row = mysqli_fetch_assoc($result))
            {
                array_push($arr_rq_tr,$row['requestnumber']);    
            };
        return $arr_rq_tr;
    }

$arr_tr = get_last_TR($qr,$db);
if (count($arr_tr) == 0)
    {
        $last_TR=1;
    }
else
    {
        $arr_replace_tr = array_map(function($item){
        return str_replace("TR","",$item);
        },$arr_tr);
        rsort($arr_replace_tr);
        $last_TR=$arr_replace_tr[0]+1;
    }
                                            

$rq="TR".$last_TR;
$stt="Open";
$creator=$user_name;
$date=($time_now);
$user=$user_id;
$dl=NULL;
// save file json
if ($link_json!="")
    {
        $link_file_json=$link_json;
    }
else
    {
        add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user);
        $link_file_json="../../../Data/UserData/".$user_id."/".$rq.".json";
    }

//3.2 SAVE FILE JSON
$jsonString = json_encode($arr_data, JSON_PRETTY_PRINT);
if (file_put_contents($link_file_json,$jsonString)) 
    {
        echo $link_file_json;
    }
else
    {
        echo "Fail";
    }

?>
