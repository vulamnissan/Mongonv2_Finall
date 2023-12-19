<?php
$id_user=$_SESSION["ID"];
unset($_SESSION['DB_'.$id_user]);
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");
//=====load table translation request=====
$result= $qr->select_request_user($db, "request", $id_user);
function customCompare($a,  $b) {
    $aNumber = (int)substr($a,  2);
    $bNumber = (int)substr($b,  2);
    return $aNumber - $bNumber;
}

if (!$result)
    {
        // nothing to do
    }
else
    {
    // GET INFOR TABLE "request" 
        $data_request=[];
        while ($row = mysqli_fetch_assoc($result))
        {
            $data_request[$row['requestnumber']]=[];
            $data_request[$row['requestnumber']]['user']=$row['user'];
            $data_request[$row['requestnumber']]['status']=$row['status'];
            $data_request[$row['requestnumber']]['requester']=$row['requester'];
            $data_request[$row['requestnumber']]['dateissue']=$row['dateissue'];
            $data_request[$row['requestnumber']]['deadline']=$row['deadline'];
        };

        // get infor in folder

        $folderPath = '../../../../../Data/UserData/'.$id_user;
        //get list file in folder
        $fileList = scandir($folderPath);
        // Remove files "." and ".."
        $fileList = array_diff($fileList,  array('.',  '..'));
        $list_file_json=[];

        
    // Print a list of filenames
        foreach ($fileList as $file) 
            {
                
                $pos=strpos($file, ".json"); 
                $pos1=strpos($file, "DB");
                if ($pos !== false && $pos1!==false) //If it's a json file and name file contains "DB",  add to list
                    {
                        $name_file_json= str_replace(".json",  "",  $file);
                        $list_file_json[] = $name_file_json;
                    }
            }
        //=====================configure table request========================
        usort($list_file_json,  'customCompare');
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
                //nothing to do
            }
            else{
                $list_file_json_sort[count($list_file_json_sort)] = $list_file_json[$i];
            }
        }
        //=====================configure table request========================
        for ($i=0;$i<count($list_file_json_sort);$i++)
        {
            $no=$i+1;
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td id=\"".$no."\">"."<a href = '../Information_about_TEXT_ID.php?flag=1&rq=".$list_file_json_sort[$i]."&id_user=".$id_user."&checkshow=request' target = '_blank'>".$list_file_json_sort[$i]."</a></td>";
            echo "<td>".$data_request[$list_file_json_sort[$i]]['status']."</td>";
            echo "<td>".$data_request[$list_file_json_sort[$i]]['requester']."</td>";
            echo "<td>".$data_request[$list_file_json_sort[$i]]['dateissue']."</td>";
            echo "</tr>";
        }
    }
?>
