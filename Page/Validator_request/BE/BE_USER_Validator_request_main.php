<?php
// Start the session
session_start();
?>
<?php
    // $_COOKIE['ID'] =4;
    $flag= $_GET['flag'];
    
    // echo $flag;
    if($flag == "1")
    {
        $request = $_GET['rq'];
        // echo  $request;
        $link_file_json= "../../../Data/UserData/" . $_COOKIE['ID'] ."/". $request.".json";
    }
    if($flag == "0")
    {
        $request=$_SESSION['request'];
        $link_file_json = $_SESSION['link_file_json'];
    }

    $path = "../".$link_file_json;
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

<html>
    <div id= "duc"></div>
    <!-- <input type="hidden" id="link_file_json" value = "< $link_file_json ?>"> -->
</html>
<input type="hidden" id="request" value="<?php echo $request; ?>">
<input type="hidden" id="flag" value="<?php echo $flag; ?>">
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
            $.post("../../BE/BE_USER_AJAX_table_tonggle.php", {language_btn : language_btn, rq: "<?php echo $request; ?>", flag:"<?php echo $flag ?>"}, function(data){
                //  console.log(data);
                $("#Wraper_table_Validator_Request_vali").html(data);
                // $("#duc").html(data);
            })
        });
        
    });

    //////////nut save //////////////////
    var btn_save =document.getElementById("btn_Validator_request_save3")
    btn_save.addEventListener("click",function()
    {
        var arr_language =document.getElementsByClassName("button_tonggle");
        var api_list = {};
        var language =document.getElementById("th_language_1_9").innerHTML
            api_list[language]= {};
            api_list[language]['mail']=document.getElementById(language + "_mail").value;
            api_list[language]['deadline']=document.getElementById(language + "_deadline").value;
        $(document).ready(function(){
            $.post("../../BE/BE_USER_Json_add.php", {api_list:api_list,rq: "<?php echo $request; ?>", flag:"<?php echo $flag ?>"}, function(data){
                // alert("Save successfully");
                alert(data)
                // console.log(data);
            });
        document.getElementById('btn_Validator_request_Set_Password').disabled = false;
        document.getElementById('btn_Validator_request_Set_Password').classList.add('btn');
        }); 
    });


    // ================== button set password OK============================
    // $("#Validator_Request_Set_password_ok").click(function()
    // {
    //     alert("duc");
    //     // var id = this.id;
    //     // var language_btn = $("#"+ id).text();
    //     // // var link_file_json =document.getElementById("link_file_json").value
        
    //     // // alert(arr_col);
    //     // $(document).ready(function(){
    //     //     $.post("../../BE/BE_USER_AJAX_table_tonggle.php", {language_btn : language_btn, rq: "< echo $request; ?>", flag:"< echo $flag ?>"}, function(data){
    //     //         //  console.log(data);
    //     //         $("#Wraper_table_Validator_Request_vali").html(data);
    //     //         // $("#duc").html(data);
    //     //     })
    //     // });
        
    // });
    // var btn_password_ok =document.getElementById("btn_back_to_home")
    // btn_password_ok.disabled = false;
    // btn_password_ok.classList.add('btn');
    // btn_password_ok.addEventListener("click",function()
    // {
    //     alert("duc");
    // });
   
    // var btn_password_ok = document.getElementById("Validator_Request_Set_password_ok");
    // btn_password_ok.addEventListener("click",function(){
    // //   var pw= $("#create_pass").val();
    // //   var confirm_pw=$("#conf_pass").val();
    // //   var confirm_pw=$("#conf_pass").val();
    // //   var link = document.getElementById("link_file_json").innerHTML;
    // //   console.log(link);
    // alert("duc");
    // alert(pw)
    // //   if (pw==confirm_pw)
    // //   {
    // //     $(document).ready(function(){
    // //         $.post("../../BE/BE_USER_SAVE_PASS.php", {pw:pw,rq: "< echo $request; ?>", flag:"< echo $flag ?>"}, function(data){
                
    // //             alert(data);
    // //     });
    // //     });
    // //   }
    // })


</script> 
