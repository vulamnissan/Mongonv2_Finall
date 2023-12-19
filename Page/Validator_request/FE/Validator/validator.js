/////////pop up enter password request
document.addEventListener("DOMContentLoaded", function() {
    function toggleModal_re_view() {
        var modalContainer = document.getElementById("Validator_Request_view");
        modalContainer.classList.toggle("show");
        document.getElementById("name_request").innerHTML=this.innerHTML;
    }

    function removeModalClass_review() {
        var modalContainer = document.getElementById("Validator_Request_view");
        modalContainer.classList.remove("show");
    }

    var re_viewButton = document.getElementsByClassName('list_request');

    for (var i = 0; i < re_viewButton.length; i++) {
      re_viewButton[i].addEventListener("click", toggleModal_re_view);
    }
    
    var buttonA6 = document.getElementById("Validator_Request_view_cancel");
    buttonA6.addEventListener("click", removeModalClass_review);
    
    var buttonB6 = document.getElementById("Validator_Request_view_ok");
    buttonB6.addEventListener("click", function(event) {
        var rq = document.getElementById("name_request").innerHTML;
        var pw = document.getElementById("vali_request_pass").value;
        $(document).ready(function(){
            $.post("../../BE/BE_VALIDATOR_chuyen_trang.php",{pw:pw ,rq:rq}, function(data){
              if (data == 1){
                window.location.href = "Validator_request_main_validator.php?rq="+rq;
              }
              else
              {
                window.alert("Password fail!");
              }
          });
        });

        var vali_request_pass = document.getElementById("vali_request_pass");
        var lackOfInfoMsg = document.getElementById("lack_of_infor");
        lackOfInfoMsg.style.display = "none";
        if (vali_request_pass.value === "" ) {
            lackOfInfoMsg.style.display = "block";
            event.preventDefault();
        } 
        else {
            removeModalClass_review();
        }
    });

    document.getElementById("form_Validator_Request_view").addEventListener("submit", function(event) {
      event.preventDefault(); 
    });
    });
    

/*
///////////////////////////

The function reports red deadline
    
///////////////////////// 
    
*/
function highlightNearDeadline() {
    var currentDate = new Date(); 
    var rows = document.querySelectorAll("#myTable_Translation_Request_info_validator tbody tr");
  
    rows.forEach(function(row) {
      var deadlineCell = row.querySelector("td:last-child"); 
      var deadlineDateParts = deadlineCell.innerText.split("/");
      var deadlineDate = new Date(deadlineDateParts[2], deadlineDateParts[1] - 1, deadlineDateParts[0]);

      if (
        deadlineDate.getDate() == currentDate.getDate() + 1 &&
        deadlineDate.getMonth() == currentDate.getMonth() &&
        deadlineDate.getFullYear() == currentDate.getFullYear()
      ) {
        deadlineCell.style.color = "red"; 
      }
    });
  }
  
  highlightNearDeadline();
  

/*
///////////////////////////
The function reports red deadline
    
///////////////////////// 
    
*/



window.addEventListener('DOMContentLoaded', function() {
    var table = document.getElementById('myTable_Validator_Request_validator');
    var header = table.querySelector('thead');
    var headerHeight = header.offsetHeight;

    table.addEventListener('scroll', function() {
    var scrollTop = this.scrollTop;
    header.style.transform = 'translateY(' + scrollTop + 'px)';
    });
});



    window.addEventListener('DOMContentLoaded', function() {
    var table1 = document.getElementById('myTable_Translation_Request_info_validator');
    var header1 = table1.querySelector('thead');
    var headerHeight1 = header1.offsetHeight;

    table1.addEventListener('scroll', function() {
    var scrollTop = this.scrollTop;
    header1.style.transform = 'translateY(' + scrollTop + 'px)';
    });
    });

    ////////////////////////// sticky thead////////////////////////////
var resultCheckInputs = document.querySelectorAll('.result_check_confirm input');


resultCheckInputs.forEach(function(input) {
  input.addEventListener('input', function() {

    if (this.value.trim().toUpperCase() === 'NG') {

      this.parentNode.classList.add('highlight-red');


      var reasonNGCell = this.parentNode.nextElementSibling;

      reasonNGCell.contentEditable = true;

      reasonNGCell.classList.add('highlight-border');


      var wordingCell = this.parentNode.parentNode.querySelector('.wording');

      wordingCell.contentEditable = true;

      wordingCell.classList.add('highlight-border');
    } else {

      this.parentNode.classList.remove('highlight-red');


      var reasonNGCell = this.parentNode.nextElementSibling;

      reasonNGCell.textContent = '';

      reasonNGCell.contentEditable = false;

      reasonNGCell.classList.remove('highlight-border');


      var wordingCell = this.parentNode.parentNode.querySelector('.wording');

      wordingCell.textContent = '';

      wordingCell.contentEditable = false;

      wordingCell.classList.remove('highlight-border');
    }
  });
});


//Check to see if you missed any fields
var validateButton = document.getElementById('btn_Validator_request_save5');
validateButton.addEventListener('click', validateForm);
var Hamidashi_check = document.getElementById('btn_Validator_request_Hamidashi_check');
Hamidashi_check.addEventListener('click', validateForm);
var Send_result = document.getElementById('btn_Validator_request_Send_result');
Send_result.addEventListener('click', validateForm);

function validateForm() {
  var resultCheckCells = document.querySelectorAll('.result_check_confirm');
  var missingFields = [];

  resultCheckCells.forEach(function(cell) {
    var resultCheckInput = cell.querySelector('input');
    var reasonNGCell = cell.nextElementSibling;
    var wordingCell = cell.parentNode.querySelector('.wording');


    if (resultCheckInput.value.trim() === '') {
      missingFields.push(resultCheckInput);
    }


    if (resultCheckInput.value.trim().toUpperCase() === 'NG' && (reasonNGCell.textContent.trim() === '' || !reasonNGCell.contentEditable)) {
      missingFields.push(reasonNGCell);
    }


    if (resultCheckInput.value.trim().toUpperCase() === 'NG' && (wordingCell.textContent.trim() === '' || !wordingCell.contentEditable)) {
      missingFields.push(wordingCell);
    }
  });

  var messageValidator = document.getElementById('mess_validator_info_check');

  if (missingFields.length > 0) {

    messageValidator.style.display = 'block';
    document.getElementById('btn_Validator_request_Send_result').disabled = true;
    document.getElementById('btn_Validator_request_Send_result').classList.remove('btn');
  } 
  

  else {

    messageValidator.style.display = 'none';
  }
}

//Check to see if you missed any fields
// check if result values are ok or not (whether entered incorrectly)
var saveButton = document.getElementById('btn_Validator_request_save5');
saveButton.addEventListener('click', validateInputs);

function validateInputs() {
  var tdList = document.getElementsByClassName('result_check_confirm');
  var errorMessage = document.getElementById('mess_validator_info_check_OK_NG');
  var invalidInputs = [];


  for (var i = 0; i < tdList.length; i++) {
    var td = tdList[i];
    var input = td.querySelector('input');
    var inputValue = input.value.trim().toUpperCase();

    if (inputValue !== 'NG' && inputValue !== 'OK'&& inputValue !== '') {
      invalidInputs.push(td);
    }
  }


  if (invalidInputs.length > 0) {
    errorMessage.style.display = 'block';
    document.getElementById('btn_Validator_request_Send_result').disabled = true;
    document.getElementById('btn_Validator_request_Send_result').classList.remove('btn');

    invalidInputs.forEach(function(td) {
      td.style.border = '1px solid green';
    });
  } else {
    errorMessage.style.display = 'none';

    for (var i = 0; i < tdList.length; i++) {
      var td = tdList[i];
      td.style.border = '';
    }
  }
}

// check if result values are ok or not (whether entered incorrectly)
// Function to enable hamidashi button when all NGs are filled in

var inputs = document.querySelectorAll('#myTable_Validator_Request_validator input');
var condition_send_result = false;

function checkInputs() {
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].value === '') {
      return false; 
    }
  }
  return true; 
}


for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('input', function() {
    if (checkInputs()) {
      condition_send_result = true;
      var resultCheckInputs1 = document.querySelectorAll('.result_check_confirm input');
      resultCheckInputs1.forEach(function(input) {
        if (input.value.trim().toUpperCase() == 'NG') {
          document.getElementById('btn_Validator_request_Hamidashi_check').classList.add('btn');
          document.getElementById('btn_Validator_request_Send_result').disabled = true;
          document.getElementById('btn_Validator_request_Send_result').classList.remove('btn');
        }
      });
    }
  });
}
// Function to enable hamidashi button when all NGs are filled in
//turn on the Send_result button when all is ok

var save5 = document.getElementById('btn_Validator_request_save5');
save5.addEventListener('click', function checkConditionAndShowAlert() {
var flag_send = false;
  var resultCheckInputs = document.querySelectorAll('.result_check_confirm input');
  var allOk = true;
  // Check all inputs in td cells whose class is result_check_confirm
  resultCheckInputs.forEach(function(input) {
    if (input.value.trim().toUpperCase() !== 'OK') {
      allOk = false;
    }
  });

  // Check condition_send_result and all inputs have value 'Ok'
  if (condition_send_result && allOk  ) {
    document.getElementById('btn_Validator_request_Hamidashi_check').classList.remove('btn');
    document.getElementById('btn_Validator_request_Send_result').disabled = false;
    document.getElementById('btn_Validator_request_Send_result').classList.add('btn');
    flag_send = true;
  }
});

//turn on the Send_result button when all is ok














