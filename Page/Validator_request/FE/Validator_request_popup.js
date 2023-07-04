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

    // var buttonB1 = document.getElementById("Validator_Request_Set_password_ok");
    // buttonB1.addEventListener("click", function(event) {
    // var createPassInput = document.getElementById("create_pass");
    // var confirmPassInput = document.getElementById("conf_pass");
    // var lackOfInfoMsg = document.getElementById("lack_of_infor");
    // var notMatchMsg = document.getElementById("not_macth");
    // var header_setpass = document.getElementById("header_setpass");

    // lackOfInfoMsg.style.display = "none";
    // notMatchMsg.style.display = "none";

    // if (createPassInput.value === "" || confirmPassInput.value === "") {
    //     lackOfInfoMsg.style.display = "block";
    //     header_setpass.style.display = "none";
    //     event.preventDefault(); // Ngăn chặn hành vi mặc định
    // } else if (createPassInput.value !== confirmPassInput.value) {
    //     notMatchMsg.style.display = "block";
    //     header_setpass.style.display = "none";
    //     event.preventDefault(); // Ngăn chặn hành vi mặc định
    // } else {
    //     removeModalClassSet_pass();
    //    // Lắng nghe sự kiện click của nút ok set pass


    // document.getElementById('btn_Validator_request_Set_Approval').disabled = false;
    // // document.getElementById('btn_Validator_request_Set_Approval').classList.add('btn');
    // document.getElementById('btn_Validator_request_Set_Approval').style.background = "#252525";
    // document.getElementById('btn_Validator_request_Set_Approval').style.border = "1px solid #D0CECE ";
    // document.getElementById('btn_Validator_request_Set_Approval').style.cursor = "pointer";
    // document.getElementById('btn_Validator_request_Set_Approval').style.animation = 'flashing-border 2s infinite';

    // document.getElementById('btn_Validator_request_Set_Approval').addEventListener("click", function() {
    // document.getElementById('btn_Validator_request_Set_Approval').style.animation = 'none';});


    
    
 

    // }
    // });

    // document.getElementById("form_Validator_Request_Set_password").addEventListener("submit", function(event) {
    //   event.preventDefault(); // Ngăn chặn hành vi mặc định
    //   // Xử lý dữ liệu form hoặc thực hiện các hành động khác
    // });
    });






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
      event.preventDefault(); // Ngăn chặn hành vi mặc định
    } else {
    removeModalClassSet_Approval1();
    document.getElementById('btn_Validator_request_Send_Approval').disabled = false;
    // document.getElementById('btn_Validator_request_Send_Approval').classList.add('btn');

    document.getElementById('btn_Validator_request_Send_Approval').style.background = "#252525";
    document.getElementById('btn_Validator_request_Send_Approval').style.border = "1px solid #D0CECE ";
    document.getElementById('btn_Validator_request_Send_Approval').style.cursor = "pointer";
    document.getElementById('btn_Validator_request_Send_Approval').style.animation = 'flashing-border 2s infinite';

    document.getElementById('btn_Validator_request_Send_Approval').addEventListener("click", function() {
    document.getElementById('btn_Validator_request_Set_Password').style.animation = 'none';
    });







    }
    });
// hieenr thi table sau khi bam nut confirm

var Wraper_table_Validator_Request_Translator = document.getElementById('Wraper_table_Validator_Request_Translator')
var Wraper_table_Validator_request = document.getElementById('Wraper_table_Validator_request')
var confim_info = document.getElementById('btn_Validator_request_Confirm_translation')

confim_info.addEventListener("click", function() {

        Wraper_table_Validator_Request_Translator.style.display = "block";
        Wraper_table_Validator_request.style.display = "none";


    });








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



