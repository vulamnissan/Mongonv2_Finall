<!--// CONTENT: list table request
// INPUT: link_file_json_manager
// OUTPUT: table list request manager  -->
<?php
    //===========================
    $id_manager= $_SESSION["ID"];
    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
    $qr= new Query("mongonv2");
    //=======================================

    //=====load table translation request=====
    $query= $qr->select_request_user($db, "request", $id_manager);
    $result=$db->get_data($query);
    if (!$result)
        {
            die ('Error select request');
        }
    else
        {
            // nothing to do 
        }
    
    // get infomation from request in database 
    $data_reqest=[];
    while ($row = mysqli_fetch_assoc($result))
        {
            $data_reqest[$row['requestnumber']]=[];
            $data_reqest[$row['requestnumber']]['user']=$row['user'];
            $data_reqest[$row['requestnumber']]['status']=$row['status'];
            $data_reqest[$row['requestnumber']]['requester']=$row['requester'];
            $data_reqest[$row['requestnumber']]['dateissue']=$row['dateissue'];
            $data_reqest[$row['requestnumber']]['deadline']=$row['deadline'];
        };
    
    //===========================================
    // get infomation from json file
   
    $folderPath = '../../../../Data/UserData/'.$id_manager;
    // get list folder
    $fileList = scandir($folderPath);
    // delete  "." and ".."
    $fileList = array_diff($fileList,  array('.',  '..'));
    $list_file_json=[];
    foreach ($fileList as $file) 
        {
            $pos=strpos($file, ".json"); 
            $pos1=strpos($file, "VL");
            $pos2= strpos($file, "_");
            if ($pos !== false && $pos1 !==false && $pos2 !==false ) 
                {
                    $name_file_json= str_replace(".json",  "",  $file);
                    $list_file_json[]=$name_file_json;
                }
        }
    //============================================

    //===================== table request========================
    for ($i=0;$i<count($list_file_json);$i++)
    {
        if ($data_reqest[$list_file_json[$i]]['status'] == "Open"){
            $no=$i+1;
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td style='text-decoration:underline ; cursor:pointer' id=\"".$no."\" class=\"list_request\" onclick=\"show_pass_rq(this.id, '".$list_file_json[$i]."')\">".$list_file_json[$i]."</td>";
            echo "<td>".$data_reqest[$list_file_json[$i]]['status']."</td>";
            echo "<td>".$data_reqest[$list_file_json[$i]]['requester']."</td>";
            echo "<td>".$data_reqest[$list_file_json[$i]]['dateissue']."</td>";
            echo "</tr>";
        }
    }

    for ($i=0;$i<count($list_file_json);$i++)
    {
        if ($data_reqest[$list_file_json[$i]]['status'] == "Close"){
            $no=$i+1;
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td style='text-decoration:underline ; cursor:pointer' id=\"".$no."\" class=\"list_request\" onclick=\"show_pass_rq(this.id, '".$list_file_json[$i]."')\">".$list_file_json[$i]."</td>";
            echo "<td>".$data_reqest[$list_file_json[$i]]['status']."</td>";
            echo "<td>".$data_reqest[$list_file_json[$i]]['requester']."</td>";
            echo "<td>".$data_reqest[$list_file_json[$i]]['dateissue']."</td>";
            echo "</tr>";
        }
    }
    
?>