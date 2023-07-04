<?php
    include "my_sql.php";
    $db = new connect_DB('localhost','mongonv2',"root",'');
    $qr= new Query("mongonv2");

    function get_count_limit($qr,$db)
    {
        $query= $qr->count_data("fix_limit");
        $result=$db->get_data($query);
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
    $last_row_limit=get_count_limit($qr,$db);
    function get_insert_limit($qr,$db,$id,$display_type,$meter,$limit)
    {
        $query= $qr->insert_limit("fix_limit",$id,$display_type,$meter,$limit);
        $db->get_data($query);
    }
    $arr_json = $_POST["object_add"]??"";
    $link_file = "../../../Data/UserData/file_draft_limit_length_add_new.json";
    $jsonString = json_encode($arr_json, JSON_PRETTY_PRINT);
    if (file_put_contents($link_file, $jsonString)) 
    {
        echo "Save successfully";
    }
    else
    {
        echo "Fail to save";
    }

    foreach($arr_json as $key => $value){
        // echo ($key);
        $display_type=$key;
        $id=$last_row_limit;
        $limit = $arr_json[$key]['Limit'];
        echo $limit;
        $meter = $arr_json[$key]['Meter'];

        get_insert_limit($qr,$db,$id,$display_type,$meter,$limit);
    
    }

?>    