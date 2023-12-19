
<?php
// CONTENT: user main
// INPUT: $request,flag
// OUTPUT: user main
// Start the session
session_start();
?>

<?php
// get button language from json
    $flag= $_GET['flag'];
    
    if($flag == "1")
        {
            $request = $_GET['rq'];
            $link_file_json= "../../../Data/UserData/" . $_SESSION['ID'] ."/". $request.".json";
        }
    if($flag == "0")
        {
            $request=$_SESSION['request'];
            $link_file_json = $_SESSION['link_file_json'];
        }

    $path = "../".$link_file_json;
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);

    $arr_col=[];
    $arr_language = [];
    foreach ($jsonData['validation_request'] as $text=>$value1)
        {
            foreach ($jsonData['validation_request'][$text]['language'] as $language=>$value2)
                {
                    if ($value2['content'] !== "0"&& $language!=="US_English")
                        {   
                            $arr_col[$language][$text]= $value2['content'];
                        }
                }
        }

?>

<?php
    $count_col=0;
    foreach ($arr_col as $key=>$value)
        { 
            $count_col=$count_col+1;
            echo"<button id= 'button_tonggle_".$count_col."' class = 'button_tonggle'>".$key."</button>";
        }
?>
<p style="display:none" id="link_file"></p>
<input type="hidden" id="request" value="<?php echo $request; ?>">
<input type="hidden" id="flag" value="<?php echo $flag; ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    /////// button language///////////
    $(".button_tonggle").click(function()
    {
        var id = this.id;
        var language_btn = $("#"+ id).text();
        var link_file_json_add = document.getElementById("link_file").innerHTML
        $(document).ready(function(){
            $.post("../../BE/BE_USER_AJAX_table_tonggle.php", {language_btn : language_btn, rq: "<?php echo $request; ?>", flag:"<?php echo $flag ?>",link_file_json_add:link_file_json_add }, function(data){
                $("#Wraper_table_Validator_Request_vali").html(data);
            })
        });
        
    });

    var btn_save =document.getElementById("btn_Validator_request_save3")
    btn_save.addEventListener("click",function()
    {
        var request = document.getElementsByClassName("request");
        var textid = document.getElementsByClassName("textid");
        var content = document.getElementsByClassName("content_");
        var display = document.getElementsByClassName("displaytype");
        var layout = document.getElementsByClassName("layout");
        var limitlenght = document.getElementsByClassName("limitlenght");   
        var numberofline = document.getElementsByClassName("numberofline"); 
        var us = document.getElementsByClassName("us"); 
        var language_tonggle = document.getElementsByClassName("language_tonggle");
        var language_th =document.getElementById("th_language_1_9").innerHTML
        var mail =document.getElementById(language_th + "_mail").value;
        var deadline = document.getElementById(language_th + "_deadline").value;
        var request_arr = [];
        var textid_arr = [];
        var content_arr = [];
        var display_arr = [];
        var layout_arr = [];
        var limitlenght_arr = [];
        var numberofline_arr = [];
        var us_arr = [];
        var language_tonggle_arr = [];
        // Get data in all table
        for (let k = 0; k < request.length; k++) {
            request_arr.push(request[k].innerHTML);
            textid_arr.push(textid[k].innerHTML);
            content_arr.push(content[k].innerHTML);
            display_arr.push(display[k].innerHTML);
            layout_arr.push(layout[k].innerHTML);
            limitlenght_arr.push(limitlenght[k].innerHTML);
            numberofline_arr.push(numberofline[k].innerHTML);
            us_arr.push(us[k].innerHTML);
            language_tonggle_arr.push(language_tonggle[k].innerHTML);
        }
        $("document").ready(function(){
        $.post("../../BE/BE_USER_Json_add.php", {request_arr:request_arr,textid_arr:textid_arr,content_arr:content_arr,display_arr:display_arr,layout_arr:layout_arr,limitlenght_arr:limitlenght_arr,numberofline_arr:numberofline_arr,us_arr:us_arr,language_tonggle_arr:language_tonggle_arr,mail:mail,deadline:deadline,language_th:language_th,rq: "<?php echo $request; ?>", flag:"<?php echo $flag ?>"}, function(data){
            if(data.trim()=='Fail to save')
                {
                    alert(data);
                }
            else
                {
                    document.getElementById("link_file").innerHTML = data
                    alert("Save successfull")
                }
            })
        document.getElementById('btn_Validator_request_Set_Password').disabled = false;
        document.getElementById('btn_Validator_request_Set_Password').classList.add('btn');
        })
    });

</script> 
