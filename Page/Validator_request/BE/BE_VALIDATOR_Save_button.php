<?php
$request_arr = $_POST['request_arr'];
$textID_arr = $_POST['textID_arr'];
$content_arr = $_POST['content_arr'];
$display_arr = $_POST['display_arr'];
$layout_arr = $_POST['layout_arr'];
$us_arr = $_POST['us_arr'];
$language_arr = $_POST['language_arr'];
$result_area_arr = $_POST['result_area_arr'];
$reason_arr = $_POST['reason_arr'];
$word_arr = $_POST['word_arr'];
$over_arr = $_POST['over_arr'];
$language_table = $_POST['language_table'];

$arr_data = [];
for ($i=0 ; $i < count($request_arr); $i++ ){
    $arr_data[$textID_arr[$i]]['content']= $content_arr[$i];
    $arr_data[$textID_arr[$i]]['display']= $display_arr[$i];
    $arr_data[$textID_arr[$i]]['layout']= $layout_arr[$i];
    $arr_data[$textID_arr[$i]]['us']= $us_arr[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['text']=$language_arr[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['result']=$result_area_arr[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['reason']=$reason_arr[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['word']=$word_arr[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['over']=$over_arr[$i];
}

$link_file_json = "../../../Data/UserData/".$_COOKIE['ID']."/".$request_arr[1]."_finall.json";
$jsonString_validator = json_encode($arr_data, JSON_PRETTY_PRINT);

// echo "<pre>";
// print_r($arr_data);
if (file_put_contents($link_file_json,$jsonString_validator)) 
{
    echo "Save successfull";
}
else
{
    echo "Fail to save";
   
}
?>