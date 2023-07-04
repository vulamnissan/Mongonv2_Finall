<?php
    $request=$_GET['rq'];
    $id_validator= $_COOKIE['ID'];
    $link_file_json_validator = "../../../../Data/UserData/".$id_validator."/".$request.".json";
    $jsonString = file_get_contents($link_file_json_validator);
    $jsonData = json_decode($jsonString, true);

    // check cac ngon ngu da duoc tick dich
    $arr_col=[];
    $arr_language=[];
 
    foreach ($jsonData['validation_request'] as $text=>$value1)
    {
        foreach ($jsonData['validation_request'][$text]['language'] as $language=>$value2)
        {
            if ($value2['content'] !== "0"&& $language!=="US_English")
            {   
                // echo $language;
                if (in_array($language,$arr_language)==false)
                {
                    // echo $language;
                    echo "<button  id= '".$language."' class = 'button_language' >".$language."</button>";
                    array_push($arr_language,$language);
                }
                $arr_col[$language][$text]= $value2['content'];
            }
        }
    }
// print_r($arr_language);
?>
<button></button>

