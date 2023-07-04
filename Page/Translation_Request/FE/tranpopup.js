document.addEventListener("DOMContentLoaded", function() {
    function toggleModalSet_pass() {
        var modalContainer = document.getElementById("Translation_Request_Set_password");
        modalContainer.classList.toggle("show");
    }

    function removeModalClassSet_pass() {
        var modalContainer = document.getElementById("Translation_Request_Set_password");
        modalContainer.classList.remove("show");
    }

    var Set_PasswordButton = document.getElementById("btn_Translation_Request_Set_Password");
    Set_PasswordButton.addEventListener("click", toggleModalSet_pass);

    var buttonA1 = document.getElementById("Translation_Request_Set_password_cancel");
    buttonA1.addEventListener("click", removeModalClassSet_pass);

    var buttonB1 = document.getElementById("Translation_Request_Set_password_ok");
    buttonB1.addEventListener("click", function(event) {
    var createPassInput = document.getElementById("create_pass");
    var confirmPassInput = document.getElementById("conf_pass");
    var lackOfInfoMsg = document.getElementById("lack_of_infor");
    var notMatchMsg = document.getElementById("not_macth");
    var header_setpass = document.getElementById("header_setpass");

    lackOfInfoMsg.style.display = "none";
    notMatchMsg.style.display = "none";

    if (createPassInput.value === "" || confirmPassInput.value === "") {
        lackOfInfoMsg.style.display = "block";
        header_setpass.style.display = "none";
        event.preventDefault(); // Ngăn chặn hành vi mặc định
    } else if (createPassInput.value !== confirmPassInput.value) {
        notMatchMsg.style.display = "block";
        header_setpass.style.display = "none";
        event.preventDefault(); // Ngăn chặn hành vi mặc định
    } else {
        removeModalClassSet_pass();
       // Lắng nghe sự kiện click của nút ok set pass


    document.getElementById('btn_Translation_Request_Set_Approval').disabled = false;
    document.getElementById('btn_Translation_Request_Set_Approval').classList.add('btn');
 

    }
    });

    document.getElementById("form_Translation_Request_Set_password").addEventListener("submit", function(event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định
      // Xử lý dữ liệu form hoặc thực hiện các hành động khác
    });
    });






    function toggleModalSet_Approval1() {
    var modalContainer2 = document.getElementById("Translation_Request_Set_Approval");
    modalContainer2.classList.toggle("show");
    }

    function removeModalClassSet_Approval1() {
    var modalContainer2 = document.getElementById("Translation_Request_Set_Approval");
    modalContainer2.classList.remove("show");
    }

    var Set_ApprovalButton = document.getElementById("btn_Translation_Request_Set_Approval");
    Set_ApprovalButton.addEventListener("click", toggleModalSet_Approval1);

    var buttonA2 = document.getElementById("Translation_Request_Set_Approval_cancel");
    buttonA2.addEventListener("click", removeModalClassSet_Approval1);

    var buttonB2 = document.getElementById("Translation_Request_Set_Approval_ok");
    buttonB2.addEventListener("click", function(event) {
    var nameInputs = document.querySelectorAll("#table_Translation_Request_Set_Approval input[type='text']");
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
    document.getElementById('btn_Translation_Request_Send_Approval').disabled = false;
    document.getElementById('btn_Translation_Request_Send_Approval').classList.add('btn');
    }
    });
// hieenr thi table sau khi bam nut confirm

var Wraper_table_Translation_Request_info = document.getElementById('Wraper_table_Translation_Request_info')
var Wraper_table_Translation_Request = document.getElementById('Wraper_table_Translation_Request')
var confim_info = document.getElementById('btn_Translation_Request_Confirm_translation')

confim_info.addEventListener("click", function() {
    if (Wraper_table_Translation_Request_info.style.display === "" || Wraper_table_Translation_Request_info.style.display === "none") {
        Wraper_table_Translation_Request_info.style.display = "flex";
        Wraper_table_Translation_Request.style.display = "none";

    } 
    });







// hieenr thi table sau khi bam nut confirm


    function toggleModalSet_dealine() {                                                                          
    var modalContainer = document.getElementById("Translation_Request_Set_dealine");
    modalContainer.classList.toggle("show");
    }

    function removeModalClassSet_dealine() {
    var modalContainer = document.getElementById("Translation_Request_Set_dealine");
    modalContainer.classList.remove("show");
    }

    var Set_Deadline= document.getElementById("btn_Translation_Set_Deadline");
    Set_Deadline.addEventListener("click", toggleModalSet_dealine);

    var buttonA3 = document.getElementById("Translation_Request_Set_dealine_cancel");
    buttonA3.addEventListener("click", removeModalClassSet_dealine);

    var buttonB3 = document.getElementById("Translation_Request_Set_dealine_ok");
    buttonB3.addEventListener("click", function(event) {
    var nameInputs3 = document.querySelectorAll("#modal_Translation_Request_Set_dealine input[type='text']");
    var lackOfInfoMsg3 = document.getElementById("lack_of_infor3");

    lackOfInfoMsg3.style.display = "none";

    var isInputInvalid3 = false;
    nameInputs3.forEach(function(input) {
    if (input.value === "") {
        isInputInvalid3 = true;
        input.classList.add("invalid");
    } else {
        input.classList.remove("invalid");
        document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').disabled = false;
        document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').classList.add('btn');
    }
    });

    if (isInputInvalid3) {
    lackOfInfoMsg3.style.display = "block";
      event.preventDefault(); // Ngăn chặn hành vi mặc định
    } else {
        removeModalClassSet_dealine();


    }
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
const button = document.getElementById('idbutton');
const table = document.getElementById('idtable');
// const tbody = table.getElementsByTagName('tbody')[0]; Hoang

let rowCount = 0;

function addRow() {
  const newRow = document.createElement('tr');
  rowCount++;

  newRow.id = `row${rowCount}`; // Tạo ID mới cho hàng

  const firstRow = tbody.getElementsByTagName('tr')[0];
  if (firstRow) {
    const cells = firstRow.getElementsByTagName('td');
    for (let i = 0; i < cells.length; i++) {
      const cell = document.createElement('td');
      const input = document.createElement('input');
      cell.appendChild(input);
      newRow.appendChild(cell);
    }
  }

  tbody.insertBefore(newRow, firstRow);
}

button.addEventListener('click', addRow);
