<?php
    //======== Can truyen ===================
    $id_user= $_COOKIE["ID"];
    $db = new connect_DB("localhost","mongonv2","root","");
    $qr= new Query("mongonv2");

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
        };
        return $user_data;
    }
    $temp_user = get_user_data($qr,$db);
    //=======================================
    $folderPath = '../../../../../Data/UserData/'.$id_user;
    // Lấy danh sách tệp trong thư mục
    $fileList = scandir($folderPath);
    // Loại bỏ các tệp "." và ".."
    $fileList = array_diff($fileList, array('.', '..'));
    $list_file_json=[];
    // In danh sách tên tệp
    foreach ($fileList as $file) 
    {
        
        $pos=strpos($file,".json");
        $pos1=strpos($file,"DB"); 
        if ($pos !== false && $pos1 !== false) // neu dung la file json  thi add vao mang
        {
            $name_file_json= str_replace(".json", "", $file);
            // echo $name_file_json;
            $list_file_json[]=$name_file_json;
        }
        // echo $file . "<br>";
    }

    for($i=0;$i < count($list_file_json);$i++){
        // echo $list_file_json[$i];
        $link_file = "../../../../../Data/UserData/".$id_user."/".$list_file_json[$i].".json";
        $jsonString = file_get_contents($link_file);
        $data = json_decode($jsonString,true);
        foreach($data as $keys => $values){
            foreach($temp_user as $key => $value){
                if ($temp_user[$key]['name']=== $keys){
                    // echo "son";
                    $id = $temp_user[$key]['id'];
                    $rqt = $keys;
                    break;
                }
            }

        }
        //===
                $query= $qr->select_request_user("request",$id);
                $result=$db->get_data($query);
                if (!$result)
                {
                    die ('Error select request');
                }
                else
                {
                // Lay thong tin bang request 
                $data_reqest=[];
                // print_r($result);
                while ($row = mysqli_fetch_assoc($result))
                { 
                    $data_reqest[$row['requestnumber']]=[];
                    $data_reqest[$row['requestnumber']]['user']=$row['user'];
                    $data_reqest[$row['requestnumber']]['status']=$row['status'];
                    $data_reqest[$row['requestnumber']]['requester']=$row['requester'];
                    $data_reqest[$row['requestnumber']]['dateissue']=$row['dateissue'];
                    $data_reqest[$row['requestnumber']]['deadline']=$row['deadline'];
                };
            }
                    foreach($data_reqest as $key => $value){
                        // echo $key;
                        if($key === $list_file_json[$i]){
                            $no=$i+1;
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td id=\"".$no."\">"."<a href = '../Information_about_TEXT_ID.php?rq=".$list_file_json[$i]."&id_user=".$id."&rqter=".$rqt."' target = '_blank'>".$list_file_json[$i]."</a></td>";
                            echo "<td>".$data_reqest[$key]['status']."</td>";
                            echo "<td>".$data_reqest[$key]['requester']."</td>";
                            echo "<td>".$data_reqest[$key]['dateissue']."</td>";
                            echo "</tr>";
                        }
                    }
        //==
    }
?>