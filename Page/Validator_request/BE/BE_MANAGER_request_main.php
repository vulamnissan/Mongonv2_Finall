
<?php
session_start();
?>
<?php

    // $request=$_SESSION['request'];
    // $id_manager = $_SESSION['id_manager'];
    // $link_file_json_manager = $_SESSION['link_file_json_manager'];
    $request = $_GET["request"]??"";
    $id_manager = $_COOKIE['ID'] ;
    $link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";

    // $link_file_json = $_SESSION['link_file_json'];
    $path = "../".$link_file_json_manager;
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    // echo $link_file_json;
    // echo "<pre>";
    // print_r($jsonData);

    // check cac ngon ngu da duoc tick dich
    $arr_col=[];

    foreach ($jsonData['validation_request'] as $text=>$value1)
    {
        foreach ($jsonData['validation_request'][$text]['language'] as $language=>$value2)
        {
            if ($value2['content'] !== "0"&& $language!=="US_English")
            {   
                // echo $value2;
                $arr_col[$language][$text]= $value2['content'];
            }
        }
    }
    // echo "<pre>";
    // print_r($arr_col);
?>

<?php
    $count_col=0;
    foreach ($arr_col as $key=>$value)
    { 
    $count_col=$count_col+1;
    echo"<button id= 'button_tonggle_".$count_col."' class = 'button_tonggle'>".$key."</button>";
    }
?>

<!-- <html>
    <div id= "duc"></div>
</html> -->

<input type="hidden" id="request" value="<?php echo $request; ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    /////// cac nut ngon ngu///////////
    $(".button_tonggle").click(function()
    {
        var id = this.id;
        var language_btn = $("#"+ id).text();
        // var link_file_json =document.getElementById("link_file_json").value
        
        // alert(arr_col);
        $(document).ready(function(){
            $.post("../../BE/BE_MANAGER_AJAX_table_tonggle.php", {language_btn : language_btn ,request:"<?php echo $request; ?>"}, function(data){
                //  console.log(data);
                $("#Wraper_table_Validator_Request_Translator").html(data);
                // $("#duc").html(data);
            })
        });
        
    });

    ////////nut save //////////////////
    var btn_save =document.getElementById("btn_Validator_request_save4")
    btn_save.addEventListener("click",function()
    {
    //     $link_file_json = "../../../../Data/UserData/data.json";
    //     $jsonString = json_encode($arr_col, JSON_PRETTY_PRINT);
    //     file_put_contents($link_file_json,$jsonString)
        var arr_language =document.getElementsByClassName("button_tonggle");
        var api_list = {};
        var language =document.getElementById("th_language_1_9").innerHTML
            api_list[language]= {};
            api_list[language]['mail']=document.getElementById(language + "_mail").value;
            api_list[language]['deadline']=document.getElementById(language + "_deadline").value;
    
        $(document).ready(function(){
            $.post("../../BE/BE_MANAGER_Json_add.php", {api_list:api_list,request:"<?php echo $request; ?>"}, function(data){
                // alert("duc");
                // console.log(data);
                alert(data);
            });

        }); 
    });
</script> 

