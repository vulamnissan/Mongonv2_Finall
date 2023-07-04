<?php
    //======== Can truyen ===================
    $id_user=$_COOKIE['ID'];
    
    $db = new connect_DB("localhost","mongonv2","root","");
    $qr= new Query("mongonv2");

        // Lay thong tin folder trong folder
   
        $folderPath = '../../../../../Data/UserData/'.$id_user;
        // Lấy danh sách tệp trong thư mục
        $fileList = scandir($folderPath);
        // Loại bỏ các tệp "." và ".."
        $fileList = array_diff($fileList, array('.', '..'));
        $list_file_json=[];
    //=======================================
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
    echo "<pre>";
    print_r($list_file_json);
    foreach($list_file_json as $key => $value){
        
    }

    //=====load table translation request=====
    $query= $qr->select_request_user("request",$id_user);
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
        // $data_reqest[$row['id']]['requestnumber']=$row['requestnumber'];
        $data_reqest[$row['requestnumber']]['user']=$row['user'];
        $data_reqest[$row['requestnumber']]['status']=$row['status'];
        $data_reqest[$row['requestnumber']]['requester']=$row['requester'];
        $data_reqest[$row['requestnumber']]['dateissue']=$row['dateissue'];
        $data_reqest[$row['requestnumber']]['deadline']=$row['deadline'];
    };

    // // Lay thong tin folder trong folder
   
    // $folderPath = '../../../../../Data/UserData/'.$id_user;
    // // Lấy danh sách tệp trong thư mục
    // $fileList = scandir($folderPath);
    // // Loại bỏ các tệp "." và ".."
    // $fileList = array_diff($fileList, array('.', '..'));
    // $list_file_json=[];

    
    // In danh sách tên tệp
    // foreach ($fileList as $file) 
    // {
        
    //     $pos=strpos($file,".json"); 
    //     $pos1=strpos($file,"DB"); 
    //     if ($pos !== false && $pos1 !== false) // neu dung la file json  thi add vao mang
    //     {
    //         $name_file_json= str_replace(".json", "", $file);
    //         // echo $name_file_json;
    //         $list_file_json[]=$name_file_json;
    //     }
    //     // echo $file . "<br>";
    // }
    //============================================

    //=====================Ve bang request========================
        for ($i=0;$i<count($list_file_json);$i++)
        {
            foreach($data_reqest as $key => $value){
                if($key === $list_file_json[$i]){
                    $no=$i+1;
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo ($data_reqest[$key]['status']);
                    // echo "<td class=\"list_request\" onclick=\"show_pass_rq(this.id,'".$list_file_json[$i]."')\" id=\"".$no."\">".$list_file_json[$i]."</td>";
                    echo "<td id=\"".$no."\">"."<a href = '../Information_about_TEXT_ID.php?rq=".$list_file_json[$i]."&id_user=".$id_user."&rqter=".$data_reqest[$list_file_json[$i]]['requester']."' target = '_blank'>".$list_file_json[$i]."</a></td>";
                    echo "<td>".$data_reqest[$key]['status']."</td>";
                    echo "<td>".$data_reqest[$key]['requester']."</td>";
                    echo "<td>".$data_reqest[$key]['dateissue']."</td>";
                    echo "</tr>";
                }
            }
        }
    }
?>