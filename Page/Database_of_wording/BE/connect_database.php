<?php
function connect_db($servername, $database, $username, $password) {
    $conn = mysqli_connect($servername,  $username,  $password,  $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        return $conn;
    }
}
function get_data_textid_infor($qr, $db)
{
    //=======================get data table textid infor=================
    $result= $qr->select_data($db, "textid_infor");
    if (!$result)
        {
            die ('The query is wrong');
        }
    else
        {
            //nothing to do
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
function insert_request($qr, $db, $id, $rq, $stt, $creator, $date, $dl) // function insert to table request
    {
        $query= $qr->insert_request($db, "request", $id, $rq, $stt, $creator, $date, $dl);
    }

?>