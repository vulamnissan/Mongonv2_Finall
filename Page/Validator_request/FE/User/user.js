
window.addEventListener('DOMContentLoaded', function() {
    var table1 = document.getElementById('myTable_validator_Request_info');
    var header1 = table1.querySelector('thead');
    var headerHeight1 = header1.offsetHeight;

    table1.addEventListener('scroll', function() {
    var scrollTop = this.scrollTop;
    header1.style.transform = 'translateY(' + scrollTop + 'px)';
    });
    });

    window.addEventListener('DOMContentLoaded', function() {
        var table1 = document.getElementById('myTable_Validator_Request_user');
        var header1 = table1.querySelector('thead');
        var headerHeight1 = header1.offsetHeight;
    
        table1.addEventListener('scroll', function() {
        var scrollTop = this.scrollTop;
        header1.style.transform = 'translateY(' + scrollTop + 'px)';
        });
        });















//
var save3 = document.getElementById("btn_Validator_request_save3");
save3.addEventListener("click", function(event) {
var input_add = document.querySelectorAll("#myTable_Validator_Request_user input[type='text']");
var mess_enter_address = document.getElementById("mess_enter_address");



var isInputInvalid = false;
input_add.forEach(function(input) {
if (input.value === "") {
    isInputInvalid = true;
    mess_enter_address.style.display = "block";
} else {
  mess_enter_address.style.display = "none";
  // document.getElementById('btn_Validator_request_Set_Password').disabled = false;
  // document.getElementById('btn_Validator_request_Set_Password').classList.add('btn');
  document.getElementById('btn_Validator_request_Set_Password').style.background = "#252525";
  document.getElementById('btn_Validator_request_Set_Password').style.border = "1px solid #D0CECE ";
  document.getElementById('btn_Validator_request_Set_Password').style.cursor = "pointer";
  document.getElementById('btn_Validator_request_Set_Password').style.animation = 'flashing-border 2s infinite';

  // document.getElementById('btn_Validator_request_Set_Password').addEventListener("click", function() {
  // document.getElementById('btn_Validator_request_Set_Password').style.animation = 'none';
  // });


}
}
)});

