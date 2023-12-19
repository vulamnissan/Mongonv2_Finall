// CONTENT: Script button js
// OUTPUT: Script button js
// ================== button set password OK============================
    
    var btn_ok_password = document.getElementById("Validator_Request_Set_password_ok");
    btn_ok_password.addEventListener("click",function(){
      var pw= $("#create_pass").val();
      var confirm_pw=$("#conf_pass").val();
      var flag = document.getElementById("flag").value;
      var request = document.getElementById("request").value;
      var link_file_json_add = document.getElementById("link_file").innerHTML
      if (pw==confirm_pw)
      {
        $(document).ready(function(){
            $.post("../../BE/BE_USER_SAVE_PASS.php", {pw:pw,flag:flag,request:request,link_file_json_add:link_file_json_add}, function(data){
                alert(data);
        });
        });
        document.getElementById('btn_Validator_request_Set_Approval').disabled = false;
        document.getElementById('btn_Validator_request_Set_Approval').classList.add('btn');
      }
    });

// ================== button set approval ok ========================
    var btn_set_approval = document.getElementById("Validator_request_Set_Approval_ok");
        btn_set_approval.addEventListener("click",function(){
            var flag = document.getElementById("flag").value;
            var request = document.getElementById("request").value;
            var name_mrg = document.getElementById("name_mgr").value;
            var sect_mgr = document.getElementById("sect_mgr").value;
            var mail_mgr = document.getElementById("mail_mgr").value;
            var company_mgr = document.getElementById("company_mgr").value;
            var name_validator = document.getElementById("name_validator").value;
            var sect_validator = document.getElementById("sect_validator").value;
            var mail_validator = document.getElementById("mail_validator").value;
            var company_validator = document.getElementById("company_validator").value;
            var link_file_json_add = document.getElementById("link_file").innerHTML;
            var language_th =document.getElementById("th_language_1_9").innerHTML;
            $(document).ready(function()
                {
                $.post("../../BE/BE_USER_APPROVAL.php", {name_mrg:name_mrg,sect_mgr:sect_mgr,mail_mgr:mail_mgr
                    ,name_validator:name_validator,sect_validator:sect_validator,mail_validator:mail_validator,company_mgr:company_mgr,company_validator:company_validator,flag:flag,request:request,link_file_json_add:link_file_json_add}, function(data){
                        if(data.trim() == "Set approval successfully")
                            {
                                alert(data); 
                                document.getElementById(language_th + "_mail").value=document.getElementById("mail_validator").value
                            }
                        else
                            {
                                alert(data);
                            }
                    });
                });
        });   
     
     //============= button send mail creator to manager===================
     var btn_send_mail = document.getElementById("btn_Validator_request_Send_Approval");
     btn_send_mail.addEventListener("click",function(){
        var flag = document.getElementById("flag").value;
        var request = document.getElementById("request").value;
        var link_file_json_add = document.getElementById("link_file").innerHTML
        var language_th =document.getElementById("th_language_1_9").innerHTML
        var mail = document.getElementById(language_th + "_mail").value
        var deadline = document.getElementById(language_th + "_deadline").value
         $(document).ready(function(){
            $.post("../../BE/BE_USER_SEND_MAIL.php",{flag:flag,request:request,link_file_json_add:link_file_json_add,language_th:language_th,mail:mail,deadline:deadline}, function(data){
                alert(data);
            });
         });
        document.getElementById('btn_Validator_request_Set_Password').disabled = true;
        document.getElementById('btn_Validator_request_Set_Password').classList.remove('btn');
        document.getElementById('btn_Validator_request_Set_Approval').disabled = true;
        document.getElementById('btn_Validator_request_Set_Approval').classList.remove('btn');
        document.getElementById('btn_Validator_request_Send_Approval').disabled = true;
        document.getElementById('btn_Validator_request_Send_Approval').classList.remove('btn');
        document.getElementById('btn_Validator_request_Send_Approval').style.animation = 'none';
        document.getElementById('btn_Validator_request_Send_Approval').style.background = 'var(--button_background_dis)';
     });
