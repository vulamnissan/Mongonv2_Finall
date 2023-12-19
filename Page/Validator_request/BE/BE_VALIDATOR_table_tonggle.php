<?php
    $arr_edited= [] ; 
    $request= $_GET['rq'];
    $jsonString_save = "../../../../Data/UserData/".$_SESSION['ID']."/".$request."_finall.json";
    $count_hamidashi=1;
    if(file_exists($jsonString_save)==false){
        $jsonString = "../../../../Data/UserData/".$_SESSION['ID']."/".$request.".json";
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
                    $firstUnderscorePos = strpos($textID, '_');
                    $secondUnderscorePos = strpos($textID, '_', $firstUnderscorePos + 1);
                    $pic_name = substr($textID, 0, $secondUnderscorePos);
                    $link_pic_layout = "../../../../Data/ProjectData/Layout_pic/" . $pic_name . ".PNG";
                    echo "<td class = 'layout' id='".$language.$count_r.$count_cl."'>"."<img id = 'layout_pic' height = '60px' src='".$link_pic_layout."'>"."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'us' id='".$language.$count_r.$count_cl."'>". $jsonData['validation_request'][$textID]['language']['US_English']['content'] ."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'language' id='".$language.$count_r.$count_cl."'>".$arr_edited[$language][$textID]."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><select class='result' name='".$language."' style = 'font-size:15px'>";
                        echo "<option value='OK' selected>OK</option>";
                        echo "<option value = 'NG'>NG</option>";
                    echo "</select></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea class='reason' rows='8' cols='8' style='font-size : 15px' disabled></textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea id='".$language."word' class='word' rows='8' cols='8' style='font-size : 15px' disabled></textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><p id = '".$count_hamidashi."' class='over' style='font-size:15px'  disabled>". $arr_reload[$language][$textID]['over']."</p></td>";
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
		if ($textID != "translator"){
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
                        echo "<th rowspan='2' class='language_main'>".$language."</th>";
                        echo "<th  rowspan='2' id='result_check' >Result</th>";
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

                    $firstUnderscorePos = strpos($textID, '_');
                    $secondUnderscorePos = strpos($textID, '_', $firstUnderscorePos + 1);
                    $pic_name = substr($textID, 0, $secondUnderscorePos);
                    $link_pic_layout = "../../../../Data/ProjectData/Layout_pic/" . $pic_name . ".PNG";
                    echo "<td class = 'layout' id='".$language.$count_r.$count_cl."'>"."<img id = 'layout_pic' height = '60px' src='".$link_pic_layout."'>"."</td>";
                    
                    $count_cl = $count_cl +1;
                    echo "<td class = 'us' id='".$language.$count_r.$count_cl."'>". $arr_reload[$language][$textID]['us']."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td class = 'language' id='".$language.$count_r.$count_cl."'>".$arr_reload[$language][$textID]['text']."</td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><select class='result' name='".$language."' style = 'font-size:15px'>";
                    if ($arr_reload[$language][$textID]['result'] == "OK"){
                        echo "<option value='OK' selected>".$arr_reload[$language][$textID]['result']."</option>";
                        echo "<option value='NG' >NG</option>";
                    }
                    else 
                    {
                        echo "<option value='NG' selected>".$arr_reload[$language][$textID]['result']."</option>";
                        echo "<option value='OK'>OK</option>"; 
                    }
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea class='reason' rows='8' cols='8' style='font-size : 15px' disabled>".$arr_reload[$language][$textID]['reason']."</textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><textarea id='".$language."word' class= 'word' rows='8' cols='8' style='font-size : 15px' disabled>".$arr_reload[$language][$textID]['word']."</textarea></td>";
                    $count_cl = $count_cl +1;
                    echo "<td id='".$language.$count_r.$count_cl."'><p id = '".$count_hamidashi."' class='over' style='font-size:15px'  disabled>". $arr_reload[$language][$textID]['over']."</p></td>";
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
    $("document").ready(function(){
        $('.button_language').click(function(){
            var table_language =document.getElementsByClassName('data_table')
            for (var i = 0; i < table_language.length; i++) {
                    document.getElementById(table_language[i].id).style.display = "none";
                }
            
            document.getElementById("myTable_Validator_Request_validator" +this.id).style.display = "revert";
        });
    })

let result_area = document.getElementsByClassName("result");
let reason = document.getElementsByClassName("reason");
let word = document.getElementsByClassName("word");
let over = document.getElementsByClassName("over");
for (let i = 0; i < result_area.length; i++) {
    result_area[i].onmouseout = function() {
        if (result_area[i].value.replace("\n","").toUpperCase() == "NG"){
            this.style.color = "red";
            reason[i].disabled = "";
            word[i].disabled = "";
	    word[i].value = "";
        }
        else if (result_area[i].value.replace("\n","").toUpperCase() == "OK"){
            this.style.color = "green";
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


// get data class 
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
    var language_text = [];
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
        language_text.push(language[k].innerHTML);
        language_arr.push(word[k].id);
        result_area_arr.push(result_area[k].options[result_area[k].selectedIndex].text);
        reason_arr.push(reason[k].value);
        word_arr.push(word[k].value);
        over_arr.push(over[k].innerHTML);
        language_table.push(result_area[k].name)
    }
    $("document").ready(function(){
        $.post("../../BE/BE_VALIDATOR_Save_button.php", {request_arr:request_arr,textID_arr:textID_arr,content_arr:content_arr,display_arr:display_arr,layout_arr:layout_arr,us_arr:us_arr,language_arr:language_arr,result_area_arr:result_area_arr,reason_arr:reason_arr,word_arr:word_arr,over_arr:over_arr,language_table:language_table,language_text:language_text}, function(data){
            alert(data);
            })
        })

})

//HAMIDASHI CHECK
var language_main = document.getElementsByClassName("language_main")
var Hamidashi_check = document.getElementById("btn_Validator_request_Hamidashi_check")
Hamidashi_check.addEventListener("click",function(){
  $("document").ready(function(){
        var text_check = [];
        var language_main_arr = [];
        var display_arr = [];
        var flag_reject_send = 0;
        var textID_arr_js = [];
    
        for (let i = 0; i < word.length; i++) {
            text_check.push(word[i].value);
            display_arr.push(display[i].innerHTML);
            language_main_arr.push(word[i].id.slice(0,word[i].id.length-4));
            textID_arr_js.push(textID[i].innerHTML);

        }
        //AJAX :Hamidashi check and Spelling check 
        $.post("../../BE/hamidashi_validator.php", {textID_arr:textID_arr_js,text_check_arr:text_check,language_main:language_main_arr,display_api:display_arr},function(data){
            console.log(data);
            for (j=1 ; j<= word.length ; j++){
                document.getElementById(j).innerHTML = data[j];
                if (data[j] == "OK"){
                    document.getElementById(j).style.color = "green";
                }  
                else if (data[j] == "NoneText"){
                    document.getElementById(j).style.color = "gray";
                    flag_reject_send = 1;
                } 
                else {
                    document.getElementById(j).style.color = "red";
                    flag_reject_send = 1;
                }   ; 
            }

            if (flag_reject_send == 0)
                {
                    document.getElementById('btn_Validator_request_Send_result').disabled = false;
                    document.getElementById('btn_Validator_request_Send_result').classList.add('btn');
                }
            else 
                {
                    document.getElementById('btn_Validator_request_Send_result').disabled = "disabled";
                    document.getElementById('btn_Validator_request_Send_result').classList.remove('btn');
                }

            alert("Hamidashi check done");
        },"json")
    })
})


//SEND MAIL + Update Database
var send_output =document.getElementById("btn_Validator_request_Send_result");
send_output.addEventListener("click", function(){
    $("document").ready(function(){
        var request_arr = [];
        var textID_arr = [];
        var content_arr = [];
        var display_arr = [];
        var layout_arr = [];
        var us_arr = [];
        var language_text = [];
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
            language_text.push(language[k].innerHTML);
            language_arr.push(word[k].id);
            result_area_arr.push(result_area[k].options[result_area[k].selectedIndex].text);
            reason_arr.push(reason[k].value);
            word_arr.push(word[k].value);
            over_arr.push(over[k].innerHTML);
            language_table.push(result_area[k].name)
        };

        $.post("../../BE/BE_VALIDATOR_Save_button.php", {request_arr:request_arr,textID_arr:textID_arr,content_arr:content_arr,display_arr:display_arr,layout_arr:layout_arr,us_arr:us_arr,language_arr:language_arr,result_area_arr:result_area_arr,reason_arr:reason_arr,word_arr:word_arr,over_arr:over_arr,language_table:language_table,language_text:language_text}, function(data){   
        });

        $.post("../../BE/BE_VALIDATOR_send_update.php", {rq:request[0].innerHTML},function(data){
                alert(data);
            });  
       })
    
})
</script>

