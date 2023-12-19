
<?php
// CONTENT: table list request main
// INPUT: request, id_mânger
// OUTPUT: table list request main 
    $request = $_GET["request"]??"";
    $id_manager = $_SESSION['ID'] ;
    $link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";
    $path = "../".$link_file_json_manager;
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);

    // check language
    $arr_col=[];

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


<input type="hidden" id="request" value="<?php echo $request; ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    /////// ajax button language///////////
    $(".button_tonggle").click(function()
    {
        var id = this.id;
        var language_btn = $("#"+ id).text();
        $(document).ready(function(){
            $.post("../../BE/BE_MANAGER_AJAX_table_tonggle.php", {language_btn : language_btn , request:"<?php echo $request; ?>"}, function(data){
                $("#Wraper_table_Validator_Request_Translator").html(data);

            })
        });
        
    });

    ////////button save //////////////////
    var btn_save =document.getElementById("btn_Validator_request_save4")
    btn_save.addEventListener("click", function()
        {
            var language_th =document.getElementById("th_language_1_9").innerHTML
            var mail =document.getElementById(language_th + "_mail").value;
            var deadline = document.getElementById(language_th + "_deadline").value;
            $(document).ready(function(){
                $.post("../../BE/BE_MANAGER_Json_add.php", {language_th:language_th, mail:mail, deadline:deadline, request:"<?php echo $request; ?>"}, function(data){
                    alert(data);
                });

            }); 
        });
</script> 

