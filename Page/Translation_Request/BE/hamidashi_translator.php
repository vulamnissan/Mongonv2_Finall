<?php
use function PHPSTORM_META\type;
function hamidashi($meter_type, $font, $font_size,$limit,$lang_dict){
    $font_path = "../../../Data/ProjectData/Fonts/".$font.".ttf";

    if (file_exists($font_path)){
    }
    else {
        echo "Font $font does not exist !!";
    }

    $output_array = array();
    $explored_size = 1000;
    $angle = 0;
    foreach ($lang_dict as $text_raw => $type) {
        if ($lang_dict[$text_raw] == "NoneText"){
            $result = "NoneText";
            $output_array[$text_raw] = array("NoneText", "-1");
        }
        else
        {
            $text = htmlspecialchars($text_raw); 
            $hingle_dot = imagettfbbox($explored_size, $angle, $font_path, $text);
            $hingle_dot = $hingle_dot[2]*12.6*$font_size/3.5/$explored_size;
            $sum_dot = 0;
            for($i = 0; $i < strlen($text); ++$i){
                $char = htmlspecialchars($text[$i]);
                $char_box = imagettfbbox($explored_size, $angle, $font_path, $char);
                $char_px = $char_box[2]*12.6*$font_size/3.5/$explored_size;
                if ($char == " "){
                    $char_px += 1;
                }
                else {
                    $char_ascii = ord($char);
                    if (65 <= $char_ascii and $char_ascii <= 90){
                        $char_px += 0.5;
                    }
                    else {
                        $char_px -= 0.05;
                    }
                }
                $char_px_round = round($char_px);
                $sum_dot += $char_px_round;
            }

            if ($sum_dot - $hingle_dot > $hingle_dot/strlen($text)){
                $sum_dot = round($hingle_dot);
            }
            else{
                //nothing
            }

            if ($sum_dot > $limit){
                $result = "NG";
            }
            else {
                $result = "OK";
            }
        $output_array[$text_raw] = array($result, $sum_dot/$limit);
        }
    }
    return $output_array;

}

// SPELLING CHECK : 
function spell_check($text, $language){
    if ($text != ""){
        $lang_Dict = array(
            "Japanese" => "ja",
            "US_English" => "en-US",
            "British" => "en-GB",
            "CanadianFrench" => "fr-CA",
            "MexicanSpanish" => "es-MX",
            "French" => "fr",
            "German" => "de",
            "Dutch" => "nl",
            "Italian" => "it",
            "Portuguese" => "pt",
            "Spanish" => 'es',
            "Turkish" => "tr",
            "Russian" => "ru",
            "ChineseMandarin" => "zh-CN",
            "Korea" => "ko",
            "Taiwanese" => "zh-TW",
            "Thai" => "th",
            "BrazilianPortuguese" => "pt-BR",
            "Arabic" => "ar",
            "Finnish" => "fi",
            "Swedish" => "sv",
            "Czech" => "cs",
            "Hungarian" => "hu",
            "Greek" => "el",
            "Norwegian" => "no",
            "Danish" => "da",
            "Polish" => "pl",
            "Slovak" => "sk",
        );
        $apiEndpoint = 'https://api.languagetool.org/v2/check';
        if (array_key_exists($language, $lang_Dict)){
            $lang_code = $lang_Dict[$language];
                $payload = array(
                    'text' => $text,
                    'language' => $lang_code,
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error: ' . curl_error($ch);
                }
                curl_close($ch);
                $result = json_decode($response, true);
                if (!empty($result['matches'])) {
                    $match = $result['matches'][0];
                    $text_result_ar = array("NG", $match['message']);

                } else {
                    $text_result_ar = array("OK", "Correct");
                }
        } else {
                $text_result_ar = array("None", "Not support language $language");
        }
    }
    else{
        $text_result_ar = array("NoneText", "Blank");
    }
        
    return $text_result_ar;

}
// END Function SPELLING check -----------------------------------------------------

//-----------------------------MAIN RUN-------------------------------------------
// 1. RUN HAMIDASHI CHECK AND SPELLING CHECK 
// 1.0 INPUT HANDLE
$font_size_arr = [];
$limit_arr = [];
include "MySql.php";
$db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
$qr= new Query("mongonv2");
$arr_data = $_POST['arr_data'];
$hamidashi_result_arr = [];
// 1.1.A RUN HAMIDASHI CHECK
for($i=0; $i<count($arr_data); $i++){
    $hamidashi_input=[];
    if (str_replace(" ","",$arr_data[$i][2]) == ""){
        $hamidashi_input[$i] = 'NoneText'; 
    }
    else{
        $hamidashi_input[$arr_data[$i][2]] = $arr_data[$i][0]; 
    }

    //1.1 GET METER TYPE
    $result_meter= $qr->get_meter($db,$arr_data[$i][3],$arr_data[$i][0]);
    if (!$result_meter)
    {
        die ('Query Wrong');
    }
    else
    {
        //nothing
    }

    while ($row = mysqli_fetch_assoc($result_meter))
    {
        $meter_type_arr[$i]=$row['meter_type'];
    };

    // GET FONT SIZE + LIMIT
    
    $result_font= $qr->get_font_limit($db,$meter_type_arr[$i],$arr_data[$i][0]);
    if (!$result_font)
    {
        die ('Query Wrong');
    }
    else
    {
        //nothing
    }
    while ($row = mysqli_fetch_assoc($result_font))
    {
        $font_size_arr[$i] = $row['fontsize'];
        $limit_arr[$i] = $row['limit'];
    };

    $font = "FrutigerNeueLTCom-Regular";
    $hamidashi_result = hamidashi($meter_type_arr[$i], $font,$font_size_arr[$i],$limit_arr[$i],$hamidashi_input);
    $count_hamidashi = 1 ;
    foreach ($hamidashi_result as $result=>$value){
        $hamidashi_result_arr['hamidashi'][]=$hamidashi_result[$result][0];
        $count_hamidashi=$count_hamidashi+1;
    }
}
// 1.1.B RUN SPELLING CHECK
// $count_spelling = 1 ;
// $spelling_result_arr = [];
// for ($i=0 ; $i<count($arr_data); $i++){
//     $spelling_result_arr['spelling'][$count_spelling] = spell_check($arr_data[$i][2],$arr_data[$i][1]);
//     $count_spelling =$count_spelling +1;
// }

//2. OUTPUT
$out_put = [];
$count = 1 ; 
for($i=0 ; $i<count($hamidashi_result_arr['hamidashi']); $i++){
    // $out_put[$count]=$hamidashi_result_arr['hamidashi'][$i]."-".$spelling_result_arr['spelling'][$i+1][0];
    $out_put[$count]=$hamidashi_result_arr['hamidashi'][$i];
    $count=$count+1;
}
echo json_encode($out_put);

?>
