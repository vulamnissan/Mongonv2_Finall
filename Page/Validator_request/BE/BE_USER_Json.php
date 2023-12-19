
<?php
// CONTENT: File json user
// INPUT: $request,  flag, list language
// OUTPUT: File json user
// Start the session
session_start();
?>

<?php
// create json user
    $arr_data=$_POST["arr"]??"";
    $user_mail=$_SESSION['email'];
    $user_name=$_SESSION['name'];
    $user_sect="abcdgroup";
    $user_id=$_SESSION['ID'];
    $user_company="NISSAN";
    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
    $qr= new Query("mongonv2");

    function get_data_fix_limit($qr, $db)
        {
            $query= $qr->select_data($db, "fix_limit");
            $result=$db->get_data($query);
            if (!$result)
            {
                die ('Query is wrong');
            }
            else
            {
                
            }
            $fix_limit=[];
            while ($row = mysqli_fetch_assoc($result))
            {
                $fix_limit[$row['display_type']."_".$row['meter']]=$row['limit'];

            };
            return $fix_limit;

        }

    function get_data_textid_infor($qr, $db)
        {
            //=======================get data textid infor=================
            $query= $qr->select_data($db, "textid_infor");
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
            };
            return $text_infor;
        }

    function get_count_request($qr, $db)
        {
            $query= $qr->count_data($db, "request");
            $result=$db->get_data($query);
            while ($row = mysqli_fetch_assoc($result))
            {
                
                $last_row=$row['MAX(id)']; 
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
    //===================== insert table request ==================================
    function add_request($qr, $db, $id, $rq, $stt, $creator, $date, $dl, $user)
        {
            $query= $qr->insert_request($db, "request", $id, $rq, $stt, $creator, $date, $dl, $user);
            $db->get_data($query);
        }
$arr_fix_limit=get_data_fix_limit($qr, $db);
$arr_infor_text=get_data_textid_infor($qr, $db);
$last_request=get_count_request($qr, $db);
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
$arr_data['validator']['name']="";
$arr_data['validator']['sect']="";
$arr_data['validator']['mail']="";
$arr_data['validator']['company']="";
$arr_data['deadline']="";
$arr_time=getdate();
$time_now=$arr_time['mday']."/".$arr_time['mon']."/".$arr_time['year'];
$arr_data['date']=$time_now;
foreach ($arr_data['validation_request'] as $key=>$value)
{
    $arr_data['validation_request'][$key]['content']=$arr_infor_text[$key]['content'];
    $arr_data['validation_request'][$key]['display_type']=$arr_infor_text[$key]['display_type'];
    $arr_data['validation_request'][$key]['meter_type']=$arr_infor_text[$key]['meter_type'];
    $arr_data['validation_request'][$key]['number_line']=$arr_infor_text[$key]['number_lines'];
    $arr_data['validation_request'][$key]['layout']="";
    $arr_data['validation_request'][$key]['limit_lenght']=$arr_fix_limit[$arr_infor_text[$key]['display_type']."_".$arr_infor_text[$key]['meter_type']];
}

function get_last_VL($qr, $db)
    {
        $query= $qr->select_request_VL($db, "request");
        $result=$db->get_data($query);
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
                array_push($arr_rq_tr, $row['requestnumber']);    
            };
        return $arr_rq_tr;
    }

$arr_tr = get_last_VL($qr, $db);
if (count($arr_tr) == 0)
    {
        $last_VL=1;
    }
else
    {
        $arr_replace_tr = array_map(function($item){
        return str_replace("VL", "", $item);
        }, $arr_tr);
        rsort($arr_replace_tr);
        $last_VL=$arr_replace_tr[0]+1;
    }
$jsonString = json_encode($arr_data,  JSON_PRETTY_PRINT);
//Save request 
$id=$last_request;
$rq="VL".$last_VL;
$stt="Open";
$creator=$user_name;
$date=($time_now);
$user=$user_id;
$dl=NULL;

add_request($qr, $db, $id, $rq, $stt, $creator, $date, $dl, $user);
$link_file_json = "../../../Data/UserData/".$user_id."/".$rq.".json";

//Save file json draf
$_SESSION['link_file_json'] = $link_file_json ;
$_SESSION['request'] = $rq;

if (file_put_contents($link_file_json, $jsonString)) 
    {
        echo "Save successfully";
    }
else
    {
        echo "Fail to save";
    }

?>


