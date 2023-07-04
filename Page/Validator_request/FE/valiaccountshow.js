  // Lấy thẻ <p> có id là "account_type"
  var accountType = document.getElementById("account_type");

  // Lấy các button cần điều chỉnh hiển thị
  var valinewrequest= document.getElementById("btn_Validator_request_new_request");
  var valiSave2 = document.getElementById("btn_Validator_request_save2");
  var valiSave3 = document.getElementById("btn_Validator_request_save3");
  var valiSave4 = document.getElementById("btn_Validator_request_save4");
  var valiSave5 = document.getElementById("btn_Validator_request_save5");
  var valiback = document.getElementById("btn_Validator_request_back");
  // var valiSetPassword = document.getElementById("btn_Validator_request_Set_Password");
  var valiSetappro = document.getElementById("btn_Validator_request_Set_Approval");
  var Confirmtranslation = document.getElementById("btn_Validator_request_Confirm_translation");
  var valiSend_Approval = document.getElementById("btn_Validator_request_Send_Approval");
  var valiReject = document.getElementById("btn_Validator_request_Reject");
  var valiHamidashi_check = document.getElementById("btn_Validator_request_Hamidashi_check");
  var valiSend_result = document.getElementById("btn_Validator_request_Send_result");
  var valiSend_Validator = document.getElementById("btn_Validator_request_Send_Validator");
  var valibtn_Validator_request_Modify_Address_and_Deadline = document.getElementById("btn_Validator_request_Modify_Address_and_Deadline");
  var Wraper_table_Validator_request_info = document.getElementById('Wraper_table_Validator_Request_info')
  var Wraper_table_Validator_request_Translator = document.getElementById('Wraper_table_Validator_request_Translator')
  var Wraper_table_Validator_request = document.getElementById('Wraper_table_Validator_request')
  var Wraper_table_Validator_request_vali = document.getElementById('Wraper_table_Validator_request_vali')
  var containerbox1 = document.getElementById('containerbox1')
  var containerbox2 = document.getElementById('containerbox2')
  var containerbox3 = document.getElementById('containerbox3')
  var containerbox4 = document.getElementById('containerbox4')
  var containerbox5 = document.getElementById('containerbox5')
  // var input1 = document.getElementById('input1')
  // var input2 = document.getElementById('input2')




  // Kiểm tra nếu account_type chứa chữ "Manager"
  if (accountType.textContent.includes("User")) {
    // Hiển thị rejectButton và approvalButton
    valinewrequest.style.display = "flex";
    TranSave.style.display = "none";
    Confirmtranslation.style.display = "none";

    // Ẩn limitLengthButton và resetButton
    valinewrequest.style.display = "block";
    valiSave.style.display = "none";
    valiSave2.style.display = "none"; 
    valiSave3.style.display = "none";
    valiback.style.display = "none"; 
    valiSetPassword.style.display = "none"; 
    valiSetappro.style.display = "none"; 
    Confirmtranslation.style.display = "none"; 
    valiSend_Approval.style.display = "none"; 
    valiReject.style.display = "none";
    valiHamidashi_check.style.display = "none";
    valiSend_result.style.display = "none"; 
    valiSend_Validator.style.display = "none"; 
    valibtn_Validator_request_Modify_Address_and_Deadline.style.display = "none"; 
    Wraper_table_Validator_request_info.style.display =  "flex";
    Wraper_table_Validator_request_Translator.style.display = "none";
    Wraper_table_Validator_request.style.display = "none"; 
    Wraper_table_Validator_request_vali.style.display = "none";

  }
  else if (accountType.textContent.includes("manager")) {
    containerbox4.style.display = "flex";

  document.getElementById('btn_Validator_request_Modify_Address_and_Deadline').addEventListener('click', function() {

    document.getElementsByClassName('input1').disabled = false;
    document.getElementById('input2').disabled = false;
    document.getElementById('btn_Validator_request_save4').disabled = false;
    document.getElementById('btn_Validator_request_save4').classList.add('btn');


    var save4 = document.getElementById("btn_Validator_request_save4");
    save4.addEventListener("click", function(event) {
    var input_add = document.querySelectorAll("#myTable_Validator_Request_Translator input[type='text']");
    var mess_enter_address = document.getElementById("mess_enter_address");
    
    
    
    var isInputInvalid = false;
    input_add.forEach(function(input) {
    if (input.value === "") {
        isInputInvalid = true;
        mess_enter_address.style.display = "block";
    } else {
      mess_enter_address.style.display = "none";
      document.getElementById('btn_Validator_request_Send_Validator').disabled = false;
      // document.getElementById('btn_Validator_request_Set_Password').classList.add('btn');
      document.getElementById('btn_Validator_request_Send_Validator').style.background = "#252525";
      document.getElementById('btn_Validator_request_Send_Validator').style.border = "1px solid #D0CECE ";
      document.getElementById('btn_Validator_request_Send_Validator').style.cursor = "pointer";
      document.getElementById('btn_Validator_request_Send_Validator').style.animation = 'flashing-border 2s infinite';
    
      document.getElementById('btn_Validator_request_Send_Validator').addEventListener("click", function() {
        document.getElementById('btn_Validator_request_Send_Validator').style.animation = 'none';
      });
    
    
    }
    }
    )});
    
    





  
  });
  


  } 
  else if (accountType.textContent.includes("Validator")) {
    containerbox5.style.display = "block";



  } 






  function setupButtonListeners() {
    const modifyButton1 = document.getElementById("btn_Validator_request_Modify_Address_and_Deadline");
    const sendButton1 = document.getElementById("btn_Validator_request_Send_Validator");
    const saveButton1 = document.getElementById("btn_Validator_request_save4");
  
    modifyButton1.addEventListener("click", function() {
      sendButton1.disabled = true;
      sendButton1.classList.remove('btn');
    });
  
    saveButton1.addEventListener("click", function() {
      if (input.value  !== ""){
      sendButton1.disabled = false;
      sendButton1.classList.add('btn');
      }
    });

  }
  
  // Gọi hàm setupButtonListeners để thiết lập lắng nghe sự kiện cho các nút
  setupButtonListeners();
  






  