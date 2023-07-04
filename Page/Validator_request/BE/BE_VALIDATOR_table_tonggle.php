<?php
    $arr_edited= [] ; 
    $request= $_GET['rq'];
    $jsonString_save = "../../../../Data/UserData/".$_COOKIE['ID']."/".$request."_finall.json";
    $count_hamidashi=1;
    if(file_exists($jsonString_save)==false){
        $jsonString = "../../../../Data/UserData/".$_COOKIE['ID']."/".$request.".json";
        $json = file_get_contents($jsonString);
        $jsonData = json_decode($json, true);
        foreach ($jsonData['validation_request'] as $textID=>$value1)
        {
            foreach ($jsonData['validation_request'][$textID]['language'] as $language=>$value2)
            {
                if ($value2['content'] !== "0"&& $language!=="US_English")
                {   
                    $arr_edited[$language][$textID] =  $value2['content'];
                }
            }
        }
        $count = 1;
        foreach($arr_edited as $language=>$value){
            $count_cl = 1;
            $count_r = 1;
            
            if ($count == 1)
            {
                echo "<table style ='word-wrap:break-word;' class='data_table'  id='myTable_Validator_Request_validator".$language."'>";
            }
            else
            {
                echo "<table style='display:none ;word-wrap:break-word;' class='data_table' id='myTable_Validator_Request_validator".$language."'>";
            }
            $count = $count+1;
                echo "<thead style='position:sticky, top : 0px' >";
                    echo "<tr>";
                        echo "<th rowspan='2'>Request Number</th>";
                        echo "<th rowspan='2'>Text ID</th>";
                        echo "<th rowspan='2' >What you want to convey to customers</th>";
                        echo "<th rowspan='2'>Display type</th>";
                        echo "<th rowspan='2'>Layout</th>";
                        echo "<th rowspan='2'>US English</th>";
                        echo "<th rowspan='2'>".$language."</th>";
                        echo "<th  rowspan='2'   id='result_check' >Result</th>";
                        echo "<th rowspan='2' id='reason_for_NG'  >Reason for NG</th>";
                        echo "<th  colspan='2'    >Corractly</th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<th id='Validator_wording'   >wording</th>";
                        echo "<th  id='Validator_overhang'   >Overhang</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody id ='".$language."_table'  >";

            // $count = $count +1;
                foreach($arr_edited[$language] as $textID=>$value1 ){
                    echo "<tr>";
                    echo "<td class = 'request' id='".$language.$count_r.$count_cl."'>". $request ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'textID' id='".$language.$count_r.$count_cl."'>". $textID ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'content_be' id='".$language.$count_r.$count_cl."'>". $jsonData['validation_request'][$textID]['content'] ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'display' id='".$language.$count_r.$count_cl."'>". $jsonData['validation_request'][$textID]['display_type'] ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'layout' id='".$language.$count_r.$count_cl."'>". $jsonData['validation_request'][$textID]['layout'] ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'us' id='".$language.$count_r.$count_cl."'>". $jsonData['validation_request'][$textID]['language']['US_English']['content'] ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'language' id='".$language.$count_r.$count_cl."'>".$arr_edited[$language][$textID]."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea class='result' name='".$language."' rows='10' cols='10' ></textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea class='reason' rows='10' cols='10' disabled></textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea class='word' rows='10' cols='10' disabled></textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea id = '".$count_hamidashi."' class='over' rows='10' cols='10' disabled></textarea></td>";
                    $count_hamidashi = $count_hamidashi+1;
                    $count_cl = $count_cl +1;
                    $count_r = $count_r + 1;
                    echo "</tr>";
                }
            echo "</tbody>";
            echo "</table>"; 
        }
    }
    //Json file exsits
    else 
    {
        $json = file_get_contents($jsonString_save);
        $jsonData = json_decode($json, true);
        $arr_reload = [];

        foreach($jsonData as $textID=>$value){
            foreach($jsonData[$textID] as $language=>$value1){
                if ($language<>"content" && $language<>"layout" && $language<>"display" && $language<>"us" ){
                    $arr_reload[$language][$textID]['content']=$jsonData[$textID]['content'];
                    $arr_reload[$language][$textID]['display']=$jsonData[$textID]['display'];
                    $arr_reload[$language][$textID]['layout']=$jsonData[$textID]['layout'];
                    $arr_reload[$language][$textID]['us']=$jsonData[$textID]['us'];
                    $arr_reload[$language][$textID]['text']=$jsonData[$textID][$language]['text'];
                    $arr_reload[$language][$textID]['result']=$jsonData[$textID][$language]['result'];
                    $arr_reload[$language][$textID]['reason']=$jsonData[$textID][$language]['reason'];
                    $arr_reload[$language][$textID]['word']=$jsonData[$textID][$language]['word'];
                    $arr_reload[$language][$textID]['over']=$jsonData[$textID][$language]['over'];
                }

            }
            
        }

        foreach($arr_reload as $language=>$value){
            $count_cl = 1;
            $count_r = 1;
            
            if ($count == 1)
            {
                echo "<table style ='word-wrap:break-word;' class='data_table'  id='myTable_Validator_Request_validator".$language."'>";
            }
            else
            {
                echo "<table style='display:none ;word-wrap:break-word;' class='data_table' id='myTable_Validator_Request_validator".$language."'>";
            }
            $count = $count+1;
                echo "<thead style='position:sticky, top : 0px' >";
                    echo "<tr>";
                        echo "<th rowspan='2'>Request Number</th>";
                        echo "<th rowspan='2'>Text ID</th>";
                        echo "<th rowspan='2' >What you want to convey to customers</th>";
                        echo "<th rowspan='2'>Display type</th>";
                        echo "<th rowspan='2'>Layout</th>";
                        echo "<th rowspan='2'>US English</th>";
                        echo "<th rowspan='2'>".$language."</th>";
                        echo "<th  rowspan='2'   id='result_check' >Result</th>";
                        echo "<th rowspan='2' id='reason_for_NG'  >Reason for NG</th>";
                        echo "<th  colspan='2'    >Corractly</th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<th id='Validator_wording'   >wording</th>";
                        echo "<th  id='Validator_overhang'   >Overhang</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody id ='".$language."_table'  >";

            // $count = $count +1;
                foreach($arr_reload[$language] as $textID=>$value1 ){
                    echo "<tr>";
                    echo "<td class = 'request' id='".$language.$count_r.$count_cl."'>". $request ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'textID' id='".$language.$count_r.$count_cl."'>". $textID ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'content_be' id='".$language.$count_r.$count_cl."'>".$arr_reload[$language][$textID]['content']."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'display' id='".$language.$count_r.$count_cl."'>". $arr_reload[$language][$textID]['display'] ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'layout' id='".$language.$count_r.$count_cl."'>". $arr_reload[$language][$textID]['layout'] ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'us' id='".$language.$count_r.$count_cl."'>". $arr_reload[$language][$textID]['us']."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'language' id='".$language.$count_r.$count_cl."'>".$arr_reload[$language][$textID]['text']."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea class='result' name='".$language."' rows='10' cols='10' >".$arr_reload[$language][$textID]['result']."</textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea class='reason' rows='10' cols='10' disabled>".$arr_reload[$language][$textID]['reason']."</textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea class='word' rows='10' cols='10' disabled>".$arr_reload[$language][$textID]['word']."</textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea id = '".$count_hamidashi."' class='over' rows='10' cols='10' disabled>". $arr_reload[$language][$textID]['over']."</textarea></td>";
                    $count_hamidashi = $count_hamidashi+1;
                    $count_cl = $count_cl +1;
                    $count_r = $count_r + 1;
                    echo "</tr>";
                }
            echo "</tbody>";
            echo "</table>"; 
        }


    }

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // ****** Thay doi bang du lieu theo ngon ngu ******
    $("document").ready(function(){
        $('.button_language').click(function(){
            // alert(this.id);
            var table_language =document.getElementsByClassName('data_table')
            for (var i = 0; i < table_language.length; i++) {
                    // alert(table_language[i].id) ;
                    document.getElementById(table_language[i].id).style.display = "none";
                }
            
            document.getElementById("myTable_Validator_Request_validator" +this.id).style.display = "revert";
        });
    })
    // ****** Thay doi trang thai cac cell ******
    // Lấy các phần tử có class là menu

let result_area = document.getElementsByClassName("result");
let reason = document.getElementsByClassName("reason");
let word = document.getElementsByClassName("word");
let over = document.getElementsByClassName("over");
// Lặp qua các phần tử có class là menu
for (let i = 0; i < result_area.length; i++) {
    // và đổi màu chữ thành màu đỏ
    result_area[i].onmouseout = function() {
        if (result_area[i].value.replace("\n","").toUpperCase() == "NG"){
            this.style.backgroundColor = "red";
            this.style.color = "white";
            reason[i].disabled = "";
            word[i].disabled = "";
            over[i].disabled = "";
        }
        else if (result_area[i].value.replace("\n","").toUpperCase() == "OK"){
            this.style.backgroundColor = "green";
            this.style.color = "white";
            reason[i].disabled = "disabled";
            word[i].value = "OK";
            word[i].disabled = "disabled";
            over[i].value = "OK";
            over[i].disabled = "disabled";
        }

        else{
            this.style.backgroundColor = "white";
            this.style.color = "black";
            reason[i].disabled = "disabled";
            word[i].disabled = "disabled";
            over[i].disabled = "disabled";
        }
    }
};




// Lay du lieu o cac class de luu 
let request = document.getElementsByClassName("request");
let textID = document.getElementsByClassName("textID");
let content = document.getElementsByClassName("content_be");
let display = document.getElementsByClassName("display");
let layout = document.getElementsByClassName("layout");
let us = document.getElementsByClassName("us");   
let language = document.getElementsByClassName("language"); 
  

//SAVE Json file 
let btn_Validator_request_save =document.getElementById("btn_Validator_request_save5");
btn_Validator_request_save.addEventListener("click", function(){
    var request_arr = [];
    var textID_arr = [];
    var content_arr = [];
    var display_arr = [];
    var layout_arr = [];
    var us_arr = [];
    var language_arr = [];
    var result_area_arr = [];
    var reason_arr = [];
    var word_arr = [];
    var over_arr = [];
    var language_table = [];
    // Get data in all table
    for (let k = 0; k < request.length; k++) {
        request_arr.push(request[k].innerHTML);
        textID_arr.push(textID[k].innerHTML);
        content_arr.push(content[k].innerHTML);
        display_arr.push(display[k].innerHTML);
        layout_arr.push(layout[k].innerHTML);
        us_arr.push(us[k].innerHTML);
        language_arr.push(language[k].innerHTML);
        result_area_arr.push(result_area[k].value);
        reason_arr.push(reason[k].value);
        word_arr.push(word[k].value);
        over_arr.push(over[k].value);
        language_table.push(result_area[k].name)
    }

    $("document").ready(function(){
        $.post("../../BE/BE_VALIDATOR_Save_button.php", {request_arr:request_arr,textID_arr:textID_arr,content_arr:content_arr,display_arr:display_arr,layout_arr:layout_arr,us_arr:us_arr,language_arr:language_arr,result_area_arr:result_area_arr,reason_arr:reason_arr,word_arr:word_arr,over_arr:over_arr,language_table:language_table}, function(data){
            alert(data);
            })
        })

})

//HAMIDASHI CHECK
var Hamidashi_check = document.getElementById("btn_Validator_request_Hamidashi_check")
Hamidashi_check.addEventListener("click",function(){
  $("document").ready(function(){
        var text_check = [];
        var flag_reject_send = 0;
        for (let i = 0; i < word.length; i++) {
            text_check.push(word[i].value);
        }
        // alert (text_check);
        $.post("../../BE/hamidashi_validator.php", {text_check_arr:text_check},function(data){
            console.log(data);
            for (j=1 ; j<= word.length ; j++){
                document.getElementById(j).value = data[j];
                if (data[j] == "OK"){
                    document.getElementById(j).style.backgroundColor = "green";
                    document.getElementById(j).style.color = "white";
                }  
                else if (data[j] == "NG"){
                    document.getElementById(j).style.backgroundColor = "red";
                    document.getElementById(j).style.color = "white";
                    flag_reject_send = 1;
                }   
                else if (data[j] == "NoneText"){
                    document.getElementById(j).style.backgroundColor = "gray";
                    document.getElementById(j).style.color = "white";
                    flag_reject_send = 1;
                } ; 
            }

            if (flag_reject_send == 0)
            {
                document.getElementById('btn_Validator_request_Send_result').disabled = false;
                document.getElementById('btn_Validator_request_Send_result').classList.add('btn');
            }
            else {
                document.getElementById('btn_Validator_request_Send_result').disabled = "disabled";
                document.getElementById('btn_Validator_request_Send_result').classList.remove('btn');
            }

            alert("Hamidashi check done");
        },"json")
    })
})


//SEND MAIL + Update Database

var send_output =document.getElementById("");
</script>

