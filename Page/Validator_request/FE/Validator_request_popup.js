// show popup Validator_Request_Set_password
document.addEventListener("DOMContentLoaded", function() {
    function toggleModalSet_pass() {
        var modalContainer = document.getElementById("Validator_Request_Set_password");
        modalContainer.classList.toggle("show");
    }

    function removeModalClassSet_pass() {
        var modalContainer = document.getElementById("Validator_Request_Set_password");
        modalContainer.classList.remove("show");
    }

    var Set_PasswordButton = document.getElementById("btn_Validator_request_Set_Password");
    Set_PasswordButton.addEventListener("click", toggleModalSet_pass);

    var buttonA1 = document.getElementById("Validator_Request_Set_password_cancel");
    buttonA1.addEventListener("click", removeModalClassSet_pass);
    var buttonA2 = document.getElementById("Validator_Request_Set_password_ok");
    buttonA2.addEventListener("click", removeModalClassSet_pass);

    });
// show popup Validator_Request_Set_password
// show popup Validator_request_Set_Approval
    function toggleModalSet_Approval1() {
    var modalContainer2 = document.getElementById("Validator_request_Set_Approval");
    modalContainer2.classList.toggle("show");
    }

    function removeModalClassSet_Approval1() {
    var modalContainer2 = document.getElementById("Validator_request_Set_Approval");
    modalContainer2.classList.remove("show");
    }

    var Set_ApprovalButton = document.getElementById("btn_Validator_request_Set_Approval");
    Set_ApprovalButton.addEventListener("click", toggleModalSet_Approval1);

    var buttonA2 = document.getElementById("Validator_request_Set_Approval_cancel");
    buttonA2.addEventListener("click", removeModalClassSet_Approval1);

    var buttonB2 = document.getElementById("Validator_request_Set_Approval_ok");
    buttonB2.addEventListener("click", function(event) {
    var nameInputs = document.querySelectorAll("#table_Validator_request_Set_Approval input[type='text']");
    var lackOfInfoMsg2 = document.getElementById("lack_of_infor2");

    lackOfInfoMsg2.style.display = "none";

    var isInputInvalid = false;
    nameInputs.forEach(function(input) {
    if (input.value === "") {
        isInputInvalid = true;
        input.classList.add("invalid");
    } else {
        input.classList.remove("invalid");
    }
    });

    if (isInputInvalid) {
    lackOfInfoMsg2.style.display = "block";
      event.preventDefault(); 
    } else {
    removeModalClassSet_Approval1();
    document.getElementById('btn_Validator_request_Send_Approval').disabled = false;

    document.getElementById('btn_Validator_request_Send_Approval').style.background = "var(--button_background)";
    document.getElementById('btn_Validator_request_Send_Approval').style.border = "1px solid #D0CECE ";
    document.getElementById('btn_Validator_request_Send_Approval').style.cursor = "pointer";
    document.getElementById('btn_Validator_request_Send_Approval').style.animation = 'flashing-border 2s infinite';

    document.getElementById('btn_Validator_request_Send_Approval').addEventListener("click", function() {
    document.getElementById('btn_Validator_request_Set_Password').style.animation = 'none';
    });







    }
    });
// show popup Validator_request_Set_Approval




// show table àter click confirm

var Wraper_table_Validator_Request_Translator = document.getElementById('Wraper_table_Validator_Request_Translator')
var Wraper_table_Validator_request = document.getElementById('Wraper_table_Validator_request')
var confim_info = document.getElementById('btn_Validator_request_Confirm_translation')

confim_info.addEventListener("click", function() {
        Wraper_table_Validator_Request_Translator.style.display = "block";
        Wraper_table_Validator_request.style.display = "none";


    });
// show table àter click confirm







//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////hamidashi/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    document.getElementById('btn_Translation_Request_Hamidashi_check').addEventListener('click', function() {
        var table12 = document.getElementById('myTable_Translation_Request_Translator');
        var rows12 = table12.getElementsByTagName('tr');
        var hasNG12 = false;

        for (var i = 0; i < rows12.length; i++) {
            var cells = rows12[i].getElementsByTagName('td');
            for (var j = 0; j < cells.length; j++) {
            if (cells[j].classList.contains('NG')) {
                hasNG12 = true;
                break;
            }
            }
            if (hasNG12) {
            break;
            }
        }

        var message = document.getElementById('mess_tran3');
        if (hasNG12) {
            message.style.display = 'block';
        } else {
            message.style.display = 'none';
            document.getElementById('btn_Translation_Request_Send_result').disabled = false;
            document.getElementById('btn_Translation_Request_Send_result').classList.add('btn');
        }
        });

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////hamidashi/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



