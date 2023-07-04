<?php
    // ======================== can truyen vao ==========================
    $id=($_GET["id_user"]??"");
    $request=($_GET["rq"]??"");
    $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');
    //===================================================================

    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    // echo "<pre>";
    // print_r($jsonData);

    // check cac ngon ngu da duoc tick dich
    $arr_col=[];
    $arr_col['US_English']="1";
    foreach ($jsonData['translation_request'] as $text=>$value1)
    {
        foreach ($jsonData['translation_request'][$text]['language'] as $language=>$value2)
        {
            if ($value2['content'] !== "0")
            {   
                // echo $value2;
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
    // echo "<pre>";
    // print_r($arr_col);
?>

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
                $count_col=7;
                foreach ($arr_col as $key=>$value)
                {
                    if ($key !== "US_English"){
                        $count_col=$count_col+1;
                        echo "<th class = 'language_trans' id= 'th_language_1_".$count_col."' >".$key."</th>";
                    }
                    else{
                        $count_col=$count_col+1;
                        echo "<th id= 'th_language_1_".$count_col."' >".$key."</th>";
                    }

                }
            ?>
        </thead>
        <tbody>
               <?php
                    $count_row=1;
                    
                    foreach ($jsonData['translation_request'] as $text=>$value1)
                    {
                        // echo "<pre>";
                        // print_r($text);
                        $count_col=1;
                        echo "<tr>";
                        echo "<td id='td_request_".$count_row."_".$count_col."'>".$request."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_textid_".$count_row."_".$count_col."'>".$text."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_content_".$count_row."_".$count_col."'>".$value1['content']."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_displaytype_".$count_row."_".$count_col."'>".$value1['display_type']."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_kayout_".$count_row."_".$count_col."'>".$value1['layout']."</td>";
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
                                // echo ($value1['language'][$key]);
                                if ($value1['language'][$key]['content'] !== "0")
                                {
                                    if ($value1['language'][$key]['content'] === "1")
                                    {
                                        echo "<td id='td_language_".$count_row."_".$count_col."' class='text_trans' contenteditable=\"true\" style='color:white'> </td>";
                                    }
                                    else
                                    {
                                        echo "<td id='td_language_".$count_row."_".$count_col."' class='text_trans' contenteditable=\"true\" style='color:white'>".$value1['language'][$key]['content']." </td>";
                                        
                                    }
                                }
                                else
                                {
                                        echo "<td id='td_language_".$count_row."_".$count_col."' ></td>";
                                    }
                                        
                            }
                        }
                        echo "</tr>";
                        $count_row=$count_row+1;
                    }
               ?>
        </tbody>
    </table>

    <!-- <style>
    td,th{
        border:2px solid black;
    }
    .blank{
        background-color: yellow ;
    }
    </style> -->

</html>
