<?php
//MANAGER SELECT APPROVAL AND SEND MAIL
// Check token 
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Access denied.");
        } else {
            //Token valid : pass
        }
    }

include "my_sql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");
function get_user_data($qr, $db)  //=======================get data user from table user in database=================
    {
        $result= $qr->select_data($db, "user");
        if (!$result)
            {
                die ('The query is wrong');
            }
        else
            {
                //nothing       
            }
        $user_data=[];
        while ($row = mysqli_fetch_assoc($result))
            {
                $user_data[$row['mail']]=[];
                $user_data[$row['mail']]['id'] = $row['id'];
                $user_data[$row['mail']]['name'] = $row['name'];
                $user_data[$row['mail']]['type'] = $row['type'];
                $user_data[$row['mail']]['password'] = $row['password'];
                $user_data[$row['mail']]['sect'] = $row['sect'];
                $user_data[$row['mail']]['company'] = $row['company'];
                $user_data[$row['mail']]['mail'] = $row['mail'];
            };
        return $user_data;
    }

$arr_user = get_user_data($qr, $db);
$data_user_index = array_values($arr_user);
$id=($_GET["id"]??"");
$request=($_GET["rq"]??"");
$path = str_replace(" ", "", '../../../Data/UserData/'.$id.'/'.$request.'.json'); //link file json draft of request member

// =========================Send mail======================
$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString,  true);
foreach($jsonData as $key => $value)
    {
        for($i =0;$i < count($data_user_index);$i++)
            {
                if($key === $data_user_index[$i]['name'])
                    {
                        $creator_name=$data_user_index[$i]['name'];
                        $creator_sect=$data_user_index[$i]['sect'];
                        $creator_company=$data_user_index[$i]['company'];
                        $creator_mail=$data_user_index[$i]['mail'];
                        break;
                    }
            }

    }
    for($i =0;$i < count($data_user_index);$i++)
        {
            if($data_user_index[$i]['id'] === $id)
                {
                    $mgr_name = $data_user_index[$i]['name'];
                    $mgr_sect = $data_user_index[$i]['sect'];
                    $mgr_mail = $data_user_index[$i]['mail'];
                    $mgr_company = $data_user_index[$i]['company'];
                    break;
                }
        }
    $data = array_values($jsonData);
    
// 2. CREATE AND SEND MAIL
require "../../send_mail.php";
$mail_sender = "email";
$name_receiver = $_SESSION['name'];
$mail_receiver = "KNT19203@local.nmcorp.nissan.biz";

$subject_request = "Database of Wording complete :".$rq;
$htmlBody_request = "<h2>To: ".$creator_name. "</h2>"
                            ."<br>"
                            ."<h3>The below request for additional information has been aprroved.</h3>"
                            ."Request Number: ".$request.""
                            ."<p>Don't return to the sender of this mail.</p>"  
                            ."</br>"; 

//2.1.2 SEND MAIL REQUEST TO MANAGER
Send_Mail($subject_request, $htmlBody_request, $mail_sender, $mail_receiver);   

// =========================update file to DB=====================
function up_text_id($qr, $db, $textid, $content, $display_type, $meter_type, $number_lines, $US_English, $Japanese, $VehicleApplied, $ManagerApproval, $Date)
    {
        $query= $qr->update_textid($db, "textid_infor", $textid, $content, $display_type, $meter_type, $number_lines, $US_English, $Japanese, $VehicleApplied, $ManagerApproval, $Date);
    }
function up_text_idlanguage($qr, $db, $textid, $US_English, $Japanese)
    {
        $query_text_infor = $qr->update_textid_language($db, "textid_language", $textid, $US_English, $Japanese);
    }

function get_count_textid($qr, $db) //function search last row of table
{
    $result= $qr->count_data($db, "textid_infor");

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
function update_status_to_table($qr, $db, $request) //function search last row of table
    {
        $query= $qr->update_status_query($db, "request", $request);
    }
update_status_to_table($qr, $db, $request);
$last_row_textid=get_count_textid($qr, $db); //last row of table "textid_infor"

include '../../securityCheck.php';
foreach($jsonData[$creator_name] as $key => $value)
    {
        $textid=jsEscape($key);
        $content = jsEscape($jsonData[$creator_name][$key]['Content']);
        $display_type = jsEscape($jsonData[$creator_name][$key]['Display type']);
        $meter_type = jsEscape($jsonData[$creator_name][$key]['Meter type']);
        $number_lines = jsEscape($jsonData[$creator_name][$key]['Number of lines']);
        $US_English = jsEscape($jsonData[$creator_name][$key]['US English']);
        $Japanese = jsEscape($jsonData[$creator_name]['Japanese']);
        $VehicleApplied = jsEscape($jsonData[$creator_name][$key]['Vehicle already applied']);
        $ManagerApproval = jsEscape($jsonData[$creator_name][$key]['Manager approval status']);
        $Date = jsEscape($jsonData[$creator_name][$key]['Date']);
        up_text_id($qr, $db, $textid, $content, $display_type, $meter_type, $number_lines, $US_English, $Japanese, $VehicleApplied, $ManagerApproval, $Date); //call function update to table "textid_infor"
        up_text_idlanguage($qr, $db, $textid, $US_English, $Japanese);  
    }  

echo "Database updated complete";
?>
