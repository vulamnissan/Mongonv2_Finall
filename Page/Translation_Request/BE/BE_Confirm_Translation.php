<?php
// CONTENT: CREATE TABLE COMFIRM TRANSLATION
// INPUT: $check_show
// OUTPUT: TABLE CONFIRM TRANSLATION 
// 1. INPUT HANDLE
// 1.1. CHECK NEW REQUEST OR OLD REQUEST
    $check_show=$_GET["checkshow"]??"";
    if ($check_show=="request")
    {
        $id=$_GET["id_user"]??"";
        $request=$_GET["rq"]??"";
        $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');
    }
    else{
        $path=$_GET["link_file"]??"";
        $arr_path=explode("/",$path);
        $request=$arr_path[count($arr_path)-1];
        $request=str_replace(".json","",$request);
    }
   
// 1.2. GET DATA FROM FILE JSON
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
// 1.3. CHECK REQUEST TRANSLATED
    $arr_col=[];
    $arr_col['US_English']="1";
    foreach ($jsonData['translation_request'] as $text=>$value1)
    {
        foreach ($jsonData['translation_request'][$text]['language'] as $language=>$value2)
        {
            if ($value2['content'] !== "0")
            {   
                if(array_key_exists($language, $arr_col))
                {

                }
                else
                {
                    $arr_col[$language]="1";
                }
            }
        }
    }
?>
<!-- 2. OUTPUT TABLE CONFIRM TRANSLATION -->
<html>
    <table id="myTable_Translation_Request_info">
        <thead>
            <th id = 'th_requestnumber_1_1'>Request Number</th>
            <th id ='th_textid_1_2'>Text ID</th>
            <th id='th_content_1_3'>What you want to convey to customers</th>
            <th id ="th_dislplay_1_4">Display Type</th>
            <th id='th_layout_1_5'>Layout</th>
            <th id ="th_limitlenght_1_6">Limit lenght</th>
            <th id="th_numberoflines_1_7">Number of lines</th>
            <?php
                $count_col=8;
                foreach ($arr_col as $key=>$value)
                {
                    $count_col=$count_col+1;
                    echo "<th id= 'th_language_1_".$count_col."' >".$key."</th>";
                }
            ?>
        </thead>
        <tbody>
               <?php
                    $count_row=1;
                    $count_col=1;
                    foreach ($jsonData['translation_request'] as $text=>$value1)
                    {
                        echo "<tr>";
                        echo "<td id='td_request_".$count_row."_".$count_col."'>".$request."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_textid_".$count_row."_".$count_col."'>".$text."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_content_".$count_row."_".$count_col."'>".$value1['content']."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_displaytype_".$count_row."_".$count_col."'>".$value1['display_type']."</td>";
                        $count_col=$count_col+1;

                        $firstUnderscorePos = strpos($text, '_');
                        $secondUnderscorePos = strpos($text, '_', $firstUnderscorePos + 1);
                        $pic_name = substr($text, 0, $secondUnderscorePos);
                        $link_pic_layout = "../../../Data/ProjectData/Layout_pic/" . $pic_name . ".PNG";
                        echo "<td id='td_layout_".$count_row."_".$count_col."'>"."<img id = 'layout_pic' height = '80px' src='".$link_pic_layout."'>"."</td>";

                        $count_col=$count_col+1;
                        echo "<td id='td_limitlenght_".$count_row."_".$count_col."'>".$value1['limit_lenght']."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_numberofline_".$count_row."_".$count_col."'>".$value1['number_line']."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_language_".$count_row."_".$count_col."'>".$value1['language']['US_English']['content']."</td>";

                        foreach ($arr_col as $key=>$value)
                        {
                            if ($key==="US_English")
                            {

                            }
                            else
                            {
                                $count_col=$count_col+1;
                                if ($value1['language'][$key]['content']=== "1")
                                {
                                    echo "<td id='td_language_".$count_row."_".$count_col."' class='blank'></td>";
                                }
                                else if  ($value1['language'][$key]['content']=== "0")
                                {
                                
                                    echo "<td id='td_language_".$count_row."_".$count_col."' class='gray'></td>";
                                }
                                else
                                {
                                    echo "<td id='td_language_".$count_row."_".$count_col."' >".$value1['language'][$key]['content']."</td>";
                                }
                                    
                            }
                        }
                        echo "</tr>";
                        $count_row=$count_row+1;
                    }
               ?>
        </tbody>
    </table>
</html>
