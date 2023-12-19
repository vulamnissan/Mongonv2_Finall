<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  // -------------delete file json when select reset-------------------
    document.getElementById("btn_Information_about_TEXT_ID_reset").addEventListener("click", function() {
        $(document).ready(function(){
          $.post("../../BE/delete-json.php", {rq: "<?php echo $_GET['rq_old']; ?>",link_file:" <?php echo ('../../../Data/UserData/'.$_SESSION["ID"].'/'.$_GET['rq_old'].'.json' );?>"  }, function(data){
            });
          });
    });

    $(document).ready(function() {
        $('#Meter_Display_type_remove').click(function() {
            $.ajax({
                url: '../../BE/delete-json_add_limit.php',
                type: 'POST',
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log('Error deleting JSON file');
                }
            });
        });
    });
</script>