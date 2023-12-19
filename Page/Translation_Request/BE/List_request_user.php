
<?php
    //CONTENT: CREATE LIST REQUEST OF CREATOR
    // INPUT: $id_user
    // OUTPUT: TABLE LIST REQUEST OF CREATOR
    //1. INPUT HANDLE  
    //1.1 INPUT FROM COOKIE
    $id_user=$_SESSION['ID'];
    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
    $qr= new Query("mongonv2");
    //1.2 lOAD DARA FROM TABLE REQUEST
    $result= $qr->select_request_user($db,"request",$id_user);
    if (!$result)
    {
        die ('Query Wrong');
    }
    else
    {

    }
    
    //1.3 CREATE ARRAY DATA REQUEST
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
    
   // 1.4 GET NAME FILE IN FOLDER
    $folderPath = '../../../../Data/UserData/'.$id_user;
    // LIST FILE IN FOLDER
    $fileList = scandir($folderPath);
    // DELETE FILE "." AND ".."
    $fileList = array_diff($fileList, array('.', '..'));
    $list_file_json=[];
    // CREATE ARRAY NAME FILE IN FOLDER
    foreach ($fileList as $file) 
    {
        $pos=strpos($file,".json"); 
        $pos1=strpos($file,"TR"); 
        if ($pos !== false && $pos1 !==false) 
        {
            $name_file_json= str_replace(".json", "", $file);
            $list_file_json[]=$name_file_json;
        }
    }
  // 2. OUTPUT TABLE REQUEST OF CREATOR
    for ($i=0;$i<count($list_file_json);$i++)
    {
        if ($data_reqest[$list_file_json[$i]]['status'] == "Open"){
            $no=$i+1;
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td id=\"".$no."\">"."<a href = '../../FE/Translation_Request.php?flag=1&rq=".$list_file_json[$i]."&id_user=".$id_user."&checkshow=request' target = '_parent'>".$list_file_json[$i]."</a></td>";
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
            echo "<td id=\"".$no."\">"."<a href = '../../FE/Translation_Request.php?flag=1&rq=".$list_file_json[$i]."&id_user=".$id_user."&checkshow=request' target = '_parent'>".$list_file_json[$i]."</a></td>";
            echo "<td>".$data_reqest[$list_file_json[$i]]['status']."</td>";
            echo "<td>".$data_reqest[$list_file_json[$i]]['requester']."</td>";
            echo "<td>".$data_reqest[$list_file_json[$i]]['dateissue']."</td>";
            echo "</tr>";
        }
    }
?>
