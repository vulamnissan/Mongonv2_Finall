<?php
/*
$meter_type: "A" 
$font: "FrutigerNeueLTCom-Regular"
$lang_dict = $fake_input = array(
                    'Lam Dep Trai' => 'Text_1',
                    'Lam noi phet' => 'Text_2',
                    'Ae co ai tin Mongon Toang khong ? Tung muoi hoi' => 'Text_3',
                    'No Type in database' => 'NoText'  
                );

===> Then output will be
$output = array(
                    'Lam Dep Trai' => array('OK', '134/425'),   //sum_length/limit
                    'Lam noi phet' => array('OK', '132/487'),
                    'Ae co ai tin Mongon Toang khong ? Tung muoi hoi' => array('NG', '403/355'),
                    'No Type in database' => array('NoneType', '-1'),      //if wrong type
                )
*/
function hamidashi($meter_type, $font, $lang_dict){
    // $font_path = __DIR__ . "/fonts/$font.ttf";
    // include "../../../Data/ProjectData/".$font.".fft";
    $font_path = "../../../Data/ProjectData/Fonts/".$font.".ttf";

    if(file_exists($font_path)){
    }
    else {
        echo "Font $font does not exist !!";
    }

    $host = 'localhost';
    $username = "root";
    $password = "";
    $database = "mongonv2";
    $data_fetching = array();

    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_errno) {
        die("Failed to connect to MySQL: " . $mysqli->connect_error);
    }
    else{
        // echo "Connect database successfull";
    }

    $query = "SELECT * FROM fix_limit WHERE meter = '$meter_type';";
    $result = $mysqli->query($query);
    // echo "<br>";
    // print_r($result);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $new_array = array($row['fontsize'], $row['limit']);
            $data_fetching[$row['display_type']] = $new_array;
        }
        $result->free();
        // echo "querry ok";
    } else {
        echo "Error executing the query: " . $mysqli->error;
        return 0;
    }
    $mysqli->close();
    // // echo "<br>";
    // // print_r($data_fetching);
    // // echo "<br>";
    $output_array = array();
    $explored_size = 1000;
    $angle = 0;

    foreach ($lang_dict as $text_raw => $type) {
        if ($lang_dict[$text_raw] == "OK"){
            $result = "OK";
            $output_array[$text_raw] = array($result);
        }
        else if ($lang_dict[$text_raw] == ""){
            $result = "NoneText";
            $output_array[$text_raw] = array("NoneText", "-1");
        }
        else
        {
            if(isset($data_fetching[$type])){
                    $text = htmlspecialchars($text_raw);
                    $font_size = $data_fetching[$type][0];
                    $limit = $data_fetching[$type][1];
                    
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
                    else{}

                    if ($sum_dot > $limit){
                        $result = "NG";
                    }
                    else {
                        $result = "OK";
                    }
                    
                
                
                $output_array[$text_raw] = array($result, "$sum_dot/$limit");

            }
            else{
                $output_array[$text_raw] = array("NoneText", "-1");
            }
        }
    }
    return $output_array;

}

$arr_data = $_POST['arr_data'];
// echo "<pre>";
// print_r(($arr_data));
// echo "LAM";
$out_put = [];
for($i=0; $i<count($arr_data); $i++){
    $fake_input=[];
    // echo $arr_data[$i][2];
    if (str_replace(" ","",$arr_data[$i][2]) == ""){
        $fake_input[$i] = 'NoneText'; 
    }
    else{
        $fake_input[$arr_data[$i][2]] = 'Text_'.($i+1); 
    }
    // print_r($fake_input);
    $fake_meter = 'A';
    $fake_font = "FrutigerNeueLTCom-Regular";

    $test_dict = hamidashi($fake_meter, $fake_font, $fake_input);
    // print_r($test_dict);
    $count = 1 ;
    // $out_put[]=[];
    foreach ($test_dict as $result=>$value){
        $out_put[]=$test_dict[$result][0];
        $count=$count+1;
    }
 
}
 echo json_encode($out_put);
// print_r($out_put);
// $meter_type: "A" 
// $font: "FrutigerNeueLTCom-Regular"
// $lang_dict = $fake_input = array(
//                     'Lam Dep Trai' => 'Text_1',
//                     'Lam noi phet' => 'Text_2',
//                     'Ae co ai tin Mongon Toang khong ? Tung muoi hoi' => 'Text_3',
//                     'No Type in database' => 'NoText'  
//                 );

?>