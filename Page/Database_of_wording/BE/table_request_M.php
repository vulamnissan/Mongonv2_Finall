<?php
//CONFIGURE TABLE LIST REQUEST OF MANAGER
$id_user= $_SESSION["ID"];
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");

function get_user_data($qr, $db)
{
    //=======================get data user================
    $result= $qr->select_data($db, "user");
    if (!$result)
        {
            die ('The query is wrong');
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
function customCompare($a, $b) {
    $aNumber = (int)substr($a, 2);
    $bNumber = (int)substr($b, 2);
    return $aNumber - $bNumber;
}
$temp_user = get_user_data($qr, $db);
$folderPath = '../../../../../Data/UserData/'.$id_user;
// Get the list of files in the directory
$fileList = scandir($folderPath);
// Remove files "." and ".."
$list_file_json=[];
// Print a list of filenames
foreach ($fileList as $file) 
    {          
        $pos=strpos($file, ".json");
        $pos1=strpos($file, "DB"); 
        if ($pos !== false && $pos1 !== false) // If it's a json file and name file contains "DB"
            {
                $name_file_json= str_replace(".json", "", $file);
                $list_file_json[]=$name_file_json;
                
            }
    }

$result= $qr->select_request_user($db, "request", $id_user);

if (!$result)
{
    die ('Error select request');
}
else
{
// get infor in table request 
$data_request=[];
while ($row = mysqli_fetch_assoc($result))
    { 
        $data_request[$row['requestnumber']]=[];
        $data_request[$row['requestnumber']]['user']=$row['user'];
        $data_request[$row['requestnumber']]['status']=$row['status'];
        $data_request[$row['requestnumber']]['requester']=$row['requester'];
        $data_request[$row['requestnumber']]['dateissue']=$row['dateissue'];
        $data_request[$row['requestnumber']]['deadline']=$row['deadline'];
    }
}

usort($list_file_json, 'customCompare');
$list_file_json_sort = [];
$j = 0;
$result= $qr->select_requestnumber($db, "request", $id_user);
if ($result->num_rows > 0){
    while ($row = mysqli_fetch_assoc($result))
    {
        $j += 1;
        $list_file_json_sort[$j-1] = $row['requestnumber'];

    }
}
 
for ($i=0;$i<count($list_file_json);$i++)
    {
        if(in_array($list_file_json[$i], $list_file_json_sort)){
            //nothing
        }
        else{
            $list_file_json_sort[count($list_file_json_sort)] = $list_file_json[$i];
        }
    }
 
for($i=0;$i < count($list_file_json_sort);$i++)
    {   
        $link_file = "../../../../../Data/UserData/".$id_user."/".$list_file_json_sort[$i].".json";
        $jsonString = file_get_contents($link_file);
        $data = json_decode($jsonString, true);

        foreach($data as $keys => $values)
        {
            foreach($temp_user as $key => $value)
                {
                    if ($temp_user[$key]['name']=== $keys){
                        $id = $temp_user[$key]['id'];
                        $rqt = $keys;
                        break;
                    }
                }
                
            foreach($data_request as $key => $value)
                {
                    if($key === $list_file_json_sort[$i])
                        {
                            $no=$i+1;
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td id=\"".$no."\">"."<a href = '../Information_about_TEXT_ID.php?flag=1&rq=".$list_file_json_sort[$i]."&id_user=".$id."&id_M=".$id_user."&rqter=".$rqt."' target = '_blank'>".$list_file_json_sort[$i]."</a></td>";
                            echo "<td>".$data_request[$key]['status']."</td>";
                            echo "<td>".$data_request[$key]['requester']."</td>";
                            echo "<td>".$data_request[$key]['dateissue']."</td>";
                            echo "</tr>";
                        }
                }
        }
    }                                           
?>
