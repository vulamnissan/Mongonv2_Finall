<?php
//==luu db user=========

$arr_user = get_user_data($qr,$db);
$link_file = "../../../../Data/UserData/user.json";
$jsonString = json_encode($arr_user, JSON_PRETTY_PRINT);
// $a = file_put_contents($link_file, $jsonString);
if (file_put_contents($link_file, $jsonString)) 
{
    // echo "Save successfully";
}
else
{
    // echo "Fa`il to save";
}
//========================
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var sender_info = document.querySelectorAll('input.sender');
    var  name_sender= sender_info[0].defaultValue;
    var  sect_sender= sender_info[1].defaultValue;
    var  mail_sender= sender_info[2].defaultValue;
    var user_id = "<?php echo $user_id; ?>";
    var rq = "<?php echo $rq; ?>";
    document.getElementById("Set_Approval_ok").addEventListener("click", function() {
      var name = document.getElementById("name_mgr").value;
      var sect = document.getElementById("sect_mgr").value;
      var mail = document.getElementById("mail_mgr").value;
      var link_json =document.querySelectorAll('p#link_file_json');
      console.log(link_json[0].innerHTML);
      document.getElementById("btn_Information_about_TEXT_ID_Send").addEventListener("click", function() {
        $(document).ready(function(){
          $.post("../../BE/user_send_mail.php", {user_id:user_id,rq:rq,name_address: name, sect_address: sect,mail_address: mail, name_sender: name_sender, sect_sender: sect_sender, mail_sender: mail_sender }, function(data){
          // console.log(data);
          alert(data); 
            });
          });
        });
     });
 </script>