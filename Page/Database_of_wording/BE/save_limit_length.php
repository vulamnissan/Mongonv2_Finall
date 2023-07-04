      <?php
    include "my_sql.php";
    $db = new connect_DB('localhost','mongonv2',"root",'');
    $qr= new Query("mongonv2");

    function update_limit($qr,$db,$display_type,$meter,$limit,$id)
    {
        $query= $qr->update_limit("fix_limit",$display_type,$meter,$limit,$id);
        echo $query;
        $db->get_data($query);
    }
    $arr_json = $_POST["object"]??"";
    $link_file = "../../../Data/UserData/file_draft_limit_length.json";
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
        $id = $key;
        $display_type=$arr_json[$key]['text'];
        
        $limit = $arr_json[$key]['Limit'];
        // echo $limit;
        $meter = $arr_json[$key]['Meter'];

        update_limit($qr,$db,$display_type,$meter,$limit,$id);
    
    }

?>    