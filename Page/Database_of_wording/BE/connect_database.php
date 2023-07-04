<?php
function connect_db($servername,$database,$username,$password) {
    $conn = mysqli_connect($servername, $username, $password, $database);
    // echo $conn;
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        // echo "Connected successfully";
        return $conn;
    }
}
function get_data_textid_infor($qr,$db)
{
    //=======================Lay data textid infor=================
    $query= $qr->select_data("textid_infor");
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
        $text_infor[$row['textid']]['US_English']=$row['US_English'];
        
    };
    return $text_infor;
}
function insert_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl)
{
    $query= $qr->insert_request("request",$id,$rq,$stt,$creator,$date,$dl);
    // echo $query;
    $db->get_data($query);
}

?>