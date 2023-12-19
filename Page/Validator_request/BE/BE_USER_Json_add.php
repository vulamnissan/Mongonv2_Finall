<?php
session_start();
?>
<?php
// /////////////////////////////////////////////////////////////////////
$flag= $_POST['flag'];
if($flag == "1")
{
    $request = $_POST['rq'];
    $link_file_json= "../../../Data/UserData/". $_SESSION['ID'] ."/".$request .".json";
    
}
if($flag == "0")
{
    $request = $_SESSION['request'];
    $link_file_json = $_SESSION['link_file_json'];
   
}

$jsonString = file_get_contents($link_file_json);
$jsonData = json_decode($jsonString, true);

$arr_language=[];
foreach ($jsonData['validation_request'] as $text=>$value1)
{
    foreach ($jsonData['validation_request'][$text]['language'] as $language=>$value2)
    {
        $arr_language[]= $language;
    }
}
$folderPath = '../../../Data/UserData/0';
    $fileList = scandir($folderPath);
    $fileList = array_diff($fileList, array('.', '..'));
    $list_file_json=[];
    $rq_all['translation_request']=[];
    foreach ($fileList as $file) 
    {
        $pos=strpos($file,".json"); 
        $pos1=strpos($file,"TR"); 
        
        if ($pos !== false && $pos1 !==false) 
        {
            $json_data = file_get_contents($folderPath."/".$file);
            $json_in = json_decode($json_data, true);
            $translator_name = $json_in["translator"]["name"];
            $translator_sect = $json_in["translator"]["sect"];
            $translator_mail = $json_in["translator"]["mail"];
            $translator_company = $json_in["translator"]["company"];
            $translator_date = $json_in["date"];
            $translator_request = $json_in["name_request"];
        }
        
    }

// lget data

$user_mail=$_SESSION['email'];
$user_name=$_SESSION['name'];
$user_sect="abcdgroup";
$user_company="NISSAN";
$request_arr = $_POST['request_arr'];
$content_arr = $_POST['content_arr'];
$textid_arr = $_POST['textid_arr'];
$display_arr = $_POST['display_arr'];
$layout_arr = $_POST['layout_arr'];
$limitlenght_arr = $_POST['limitlenght_arr'];
$numberofline_arr = $_POST['numberofline_arr'];
$us_arr = $_POST['us_arr'];
$language_tonggle_arr = $_POST['language_tonggle_arr'];
$language_th = $_POST['language_th'];
$mail = $_POST['mail'];
$deadline = $_POST['deadline'];


$arr_data = [];
$arr_data["validation_request"]= [];
for ($i=0 ; $i < count($request_arr); $i++ ){
    $arr_data["validation_request"][$textid_arr[$i]]['language']=[];
    for($j=0; $j <count($arr_language); $j++)
    {
        $arr_data["validation_request"][$textid_arr[$i]]['language'][$arr_language[$j]]=[];
        if($arr_language[$j]=="US_English")
        {
            $arr_data["validation_request"][$textid_arr[$i]]['language'][$arr_language[$j]]['content']=$us_arr[$i];
            $arr_data["validation_request"][$textid_arr[$i]]['language'][$arr_language[$j]]['ver']="";
        }
        else
        {
            if($arr_language[$j]==$language_th)
            {
                $arr_data["validation_request"][$textid_arr[$i]]['language'][$arr_language[$j]]['content']=$language_tonggle_arr[$i];
                $arr_data["validation_request"][$textid_arr[$i]]['language'][$arr_language[$j]]['ver']="";
            }
            else 
            {
                $arr_data["validation_request"][$textid_arr[$i]]['language'][$arr_language[$j]]['content']="0";
                $arr_data["validation_request"][$textid_arr[$i]]['language'][$arr_language[$j]]['ver']="";
            }
        }
  
    }
    $arr_data["validation_request"][$textid_arr[$i]]['content']= $content_arr[$i];
    $arr_data["validation_request"][$textid_arr[$i]]['display_type']= $display_arr[$i];
    $arr_data["validation_request"][$textid_arr[$i]]['number_line']= $numberofline_arr[$i];
    $arr_data["validation_request"][$textid_arr[$i]]['layout']= $layout_arr[$i];
    $arr_data["validation_request"][$textid_arr[$i]]['limit_lenght']= $limitlenght_arr[$i];
    $arr_time=getdate();
    $time_now=$arr_time['mday']."/".$arr_time['mon']."/".$arr_time['year'];
    $arr_data['date']=$time_now;
    
}
$arr_data['password']="";
$arr_data['creator']=[];
$arr_data['creator']['name']=$user_name;
$arr_data['creator']['sect']=$user_sect;
$arr_data['creator']['mail']=$user_mail;
$arr_data['creator']['company']=$user_company;
$arr_data['mgr']['name']="";
$arr_data['mgr']['sect']="";
$arr_data['mgr']['mail']="";
$arr_data['mgr']['company']="";
$arr_data['validator']['name']="";
$arr_data['validator']['sect']="";
$arr_data['validator']['mail']="";
$arr_data['validator']['company']="";
$arr_data['translator']['name']= $translator_name;
$arr_data['translator']['sect']=$translator_sect;
$arr_data['translator']['mail']=$translator_mail;
$arr_data['translator']['company']=$translator_company;
$arr_data['translator']['date']=$translator_date;
$arr_data['translator']['request']=$translator_request;
$arr_data['mail']= $mail;
$arr_data['deadline']= $deadline;

$link_file_json_add = "../../../Data/UserData/".$_SESSION['ID']."/".$request_arr[0]."_".$language_th.".json";
$jsonString_validator = json_encode($arr_data, JSON_PRETTY_PRINT);

if (file_put_contents($link_file_json_add,$jsonString_validator)) 
{
    echo $link_file_json_add;

}
else
{
    echo "Fail to save";
   
}
?>



