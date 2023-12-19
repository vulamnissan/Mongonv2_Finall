<?php
$request_arr = $_POST['request_arr'];
$textID_arr = $_POST['textID_arr'];
$content_arr = $_POST['content_arr'];
$display_arr = $_POST['display_arr'];
$layout_arr = $_POST['layout_arr'];
$us_arr = $_POST['us_arr'];
$language_text = $_POST['language_text'];
$language_arr = $_POST['language_arr'];
$result_area_arr = $_POST['result_area_arr'];
$reason_arr = $_POST['reason_arr'];
$word_arr = $_POST['word_arr'];
$over_arr = $_POST['over_arr'];
$language_table = $_POST['language_table'];

$arr_data = [];
for ($i=0 ; $i < count($request_arr); $i++ ){
    $arr_data[$textID_arr[$i]]['content'] = $content_arr[$i];
    $arr_data[$textID_arr[$i]]['display'] = $display_arr[$i];
    $arr_data[$textID_arr[$i]]['layout'] = $layout_arr[$i];
    $arr_data[$textID_arr[$i]]['us'] = $us_arr[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['text'] = $language_text[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['result'] = $result_area_arr[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['reason'] = $reason_arr[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['word'] = $word_arr[$i];
    $arr_data[$textID_arr[$i]][$language_table[$i]]['over'] = $over_arr[$i];
}

//GET INFOR ABOUT TRANSLATETOR
$jsonString_trans_info = "../../../Data/UserData/".$_SESSION['ID']."/".$request_arr[0].".json";
$json = file_get_contents($jsonString_trans_info);
$jsonData = json_decode($json, true);
$arr_data["translator"]["name"] = $jsonData["translator"]["name"];
$arr_data["translator"]["request"] = $jsonData["translator"]["request"];
$arr_data["translator"]["date"] = $jsonData["translator"]["date"];
//-------------------------------------------------------------------
$link_file_json = "../../../Data/UserData/".$_SESSION['ID']."/".$request_arr[0]."_finall.json";
$jsonString_validator = json_encode($arr_data, JSON_PRETTY_PRINT);
if (file_put_contents($link_file_json,$jsonString_validator)) 
    {
        echo "Save successfull";
    }
else
    {
        echo "Fail to save";
    }
?>
