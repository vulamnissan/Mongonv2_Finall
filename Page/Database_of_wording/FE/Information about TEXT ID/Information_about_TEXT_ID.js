// Kiểm tra nếu trang đã được tải lại trước đó
if (!sessionStorage.getItem('reloaded')) {
  // Chưa được tải lại trước đó, tiến hành tải lại trang
  sessionStorage.setItem('reloaded', 'true');
  location.reload();
} else {
  // Đã được tải lại trước đó, xóa thông tin khỏi sessionStorage
  sessionStorage.removeItem('reloaded');
}

  
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////sidebar hidden function///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////sidebar hidden function///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////hidden function that shows notifications and accounts//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



var iconButton = document.getElementById("account-button");

iconButton.addEventListener("click", function() {
var notificationList = document.getElementById("notification-list");
var notificationList_acc = document.getElementById("notification-list-acc");

if (notificationList_acc.style.display === "" ||notificationList_acc.style.display === "none") {
  notificationList_acc.style.display = "grid";

  
} else {
  notificationList_acc.style.display = "none";
}
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////hidden function that shows notifications and accounts//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function setFullHeight() {
  var windowHeight = window.innerHeight + 'px';
  document.body.style.height = windowHeight;
  document.querySelector('.container').style.minHeight = windowHeight;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////It is not allowed to press the button more than once//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Lấy danh sách tất cả các phần tử có lớp "myButton"
var buttons = document.getElementsByClassName("btn");

// Gán sự kiện cho từng nút button
for (var i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", handleClick);
}

function handleClick() {
  var button = this;
  
  // Vô hiệu hóa nút button
  button.disabled = true;

  // Thực hiện hành động của bạn ở đây

  // Kích hoạt lại nút button sau một khoảng thời gian ( 10 giây)
  setTimeout(function() {
    button.disabled = false;
  }, 10000);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////It is not allowed to press the button more than once//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to display popup for Meter Display type//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function toggleModal() {
  var modalContainer = document.getElementById("Information_about_TEXT_ID_Meter_Display_type");
  modalContainer.classList.toggle("show");
}

function removeModalClass() {
  var modalContainer = document.getElementById("Information_about_TEXT_ID_Meter_Display_type");
  modalContainer.classList.remove("show");
}

var modifyButton = document.getElementById("btn_Information_about_TEXT_ID_Limit_length_Manage");
modifyButton.addEventListener("click", toggleModal);

var addButton = document.getElementById("Meter_Display_type_add");
var removeButton = document.getElementById("Meter_Display_type_remove");
var okButton = document.getElementById("Meter_Display_type_ok");
var rowCount = 0;
var inputFilled = false;
addButton.addEventListener("click", function() {//bam Add them input
  var tbody = document.querySelector("#table_Meter_Display_type tbody");

  // Create a new row with empty input fields
  var newRow = document.createElement("tr");
  newRow.classList.add("tr_input_new");

  // Create the cells with empty input fields
  for (var i = 0; i < 3; i++) {
    var cell = document.createElement("td");
    var input = document.createElement("input");
    input.type = "text";
    input.value = "";
    // input.innerHTML = "";
    // input.id = "test_input";
    cell.appendChild(input);
    newRow.appendChild(cell);
  }

  // Insert the new row at the beginning of the table
  tbody.insertBefore(newRow, tbody.firstChild);

  // Increment the rowCount
  rowCount++;

  // Show the remove button
  removeButton.style.display = "inline-block";
  addButton.style.marginRight = "0"
});

// var kiemtra =document.getElementById("test");
// var test_input = document.getElementById("test_input");
// kiemtra.addEventListener("click",function(){
//   alert(test_input.value);
  
// });

removeButton.addEventListener("click", function() {
  var tbody = document.querySelector("#table_Meter_Display_type tbody");
  addButton.style.marginRight = "auto";
  // Remove the last rowCount number of rows
  for (var i = 0; i < rowCount; i++) {
    tbody.removeChild(tbody.firstChild);
  }

  // Reset the rowCount
  rowCount = 0;

  // Hide the remove button
  removeButton.style.display = "none";


  // Reset the inputFilled state
  inputFilled = false;

  // Show the lack of information message
  var lackOfInfo = document.getElementById("lack_of_infor4");
  lackOfInfo.style.display = "none";
});

var cancelButton = document.getElementById("Meter_Display_type_cancel");
cancelButton.addEventListener("click", removeModalClass);

okButton.addEventListener("click", function() {
  var inputs = document.querySelectorAll("#table_Meter_Display_type input");

  // Check if all inputs are filled
  var allFilled = true;
  inputs.forEach(function(input) {
    if (input.value.trim() === "") {
      allFilled = false;
      return;
    }
  });

  if (allFilled) {
    // Perform your desired action here

    // Remove the modal class
    removeModalClass();
  } else {
    // Show the lack of information message
    var lackOfInfo = document.getElementById("lack_of_infor4");
    lackOfInfo.style.display = "block";
  }
});

// Listen for input changes
var inputs = document.querySelectorAll("#table_Meter_Display_type input");
inputs.forEach(function(input) {
  input.addEventListener("input", function() {
    var allFilled = true;
    inputs.forEach(function(input) {
      if (input.value.trim() === "") {
        allFilled = false;
        return;
      }
    });

    if (allFilled) {
      // Hide the lack of information message
      var lackOfInfo = document.getElementById("lack_of_infor4");
      lackOfInfo.style.display = "none";

      // Set the inputFilled state to true
      inputFilled = true;
    } else {
      // Set the inputFilled state to false
      inputFilled = false;
    }
  });

// moi them vao
// Lắng nghe sự kiện "input" trên các input
// var inputs = document.querySelectorAll("#table_Meter_Display_type input");
// inputs.forEach(function(input) {
//   input.addEventListener("input", function() {
//     // Cập nhật giá trị nhập vào thuộc tính "value" của input
//     input.value = this.value;
//   });
// });
// var data_arr = []; // Mảng để lưu trữ dữ liệu

// function getDataFromInputs() {
//   var inputs = document.querySelectorAll("#table_Meter_Display_type tbody tr.tr_input_new input");
//   var rowData = [];

//   // Lặp qua tất cả các input trong hàng mới được tạo
//   inputs.forEach(function(input) {
//     rowData.push(input.value); // Lấy giá trị từ input và thêm vào mảng rowData
//   });

//   return rowData;
// }

// function addDataToStorage() {
//   var rowData = getDataFromInputs();
//   if (rowData.length > 0) {
//     data_arr.push(rowData); // Thêm mảng rowData vào mảng data
//   }
// }

// okButton.addEventListener("click", function() {
//   // Lấy dữ liệu từ hàng mới và thêm vào mảng khi người dùng nhấp vào nút "OK"
//   addDataToStorage();

//   // In mảng dữ liệu ra console log
//   console.log(data_arr);
// });








});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to display popup for Meter Display type//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to display popup for Set Approval//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// function toggleModalSet_Approval() {
//   var modalContainer = document.getElementById("Information_about_TEXT_ID_Set_Approval");
//   modalContainer.classList.toggle("show");
// }

// function removeModalClassSet_Approval() {
//   var modalContainer = document.getElementById("Information_about_TEXT_ID_Set_Approval");
//   modalContainer.classList.remove("show");
// }

// var modifyButton = document.getElementById("btn_Information_about_TEXT_ID_Set_Approval_route");
// modifyButton.addEventListener("click", toggleModalSet_Approval);

// var buttonA = document.getElementById("Set_Approval_cancel");
// buttonA.addEventListener("click", removeModalClassSet_Approval);

// var buttonB = document.getElementById("Set_Approval_ok");
// buttonB.addEventListener("click", removeModalClassSet_Approval);


function toggleModalSet_Approval1() {
  var modalContainer2 = document.getElementById("Information_about_TEXT_ID_Set_Approval");
  modalContainer2.classList.toggle("show");
  }

  function removeModalClassSet_Approval1() {
  var modalContainer2 = document.getElementById("Information_about_TEXT_ID_Set_Approval");
  modalContainer2.classList.remove("show");
  }

  var Set_ApprovalButton = document.getElementById("btn_Information_about_TEXT_ID_Set_Approval_route");
  Set_ApprovalButton.addEventListener("click", toggleModalSet_Approval1);

  var buttonA2 = document.getElementById("Set_Approval_cancel");
  buttonA2.addEventListener("click", removeModalClassSet_Approval1);

  var buttonB2 = document.getElementById("Set_Approval_ok");
  buttonB2.addEventListener("click", function(event) {
  var nameInputs = document.querySelectorAll("#table_Set_Approval input[type='text']");
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
  document.getElementById('btn_Information_about_TEXT_ID_Send').disabled = false;
  document.getElementById('btn_Information_about_TEXT_ID_Send').classList.add('btn');
  }
  });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to display popup for Set Approval////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to set the order in which buttons are pressed/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Lắng nghe sự kiện checkbox được click        


const tableinfor = document.getElementById('myTable') ;                                                                 
const checkboxes = tableinfor.querySelectorAll('input[type="checkbox"]');                                                 
checkboxes.forEach(function(checkbox) {                                                                                 
    checkbox.addEventListener('click', function() {                                                                     
        const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');                          
        if (checkedCheckboxes.length > 0) {                                                                                   
            // Có ít nhất một checkbox được chọn
            // Bật nút 1, 3, 4 và thay đổi màu nền thành xám
            document.getElementById('btn_Information_about_TEXT_ID_modify').disabled = false;
            document.getElementById('btn_Information_about_TEXT_ID_modify').classList.add('btn');
            document.getElementById('btn_Information_about_TEXT_ID_Limit_length_Manage').disabled = false;
            document.getElementById('btn_Information_about_TEXT_ID_Limit_length_Manage').classList.add('btn');
            document.getElementById('btn_Information_about_TEXT_ID_reset').disabled = false;
            document.getElementById('btn_Information_about_TEXT_ID_reset').classList.add('btn');
            document.getElementById('btn_Information_about_TEXT_ID_save').disabled = false;
            document.getElementById('btn_Information_about_TEXT_ID_save').classList.add('btn');
            document.getElementById('btn_Information_about_TEXT_ID_Reject').disabled = false;
            document.getElementById('btn_Information_about_TEXT_ID_Reject').classList.add('btn');

            // Kiểm tra xem có checkbox có class là "checkbox_Active" hay không
            const activeCheckboxes = document.querySelectorAll('input.checkbox_Active:checked');
            if (activeCheckboxes.length > 0) {
                // Có ít nhất một checkbox có class "checkbox_Active" được chọn
                // Bật nút Approval và thay đổi màu nền thành xám
                document.getElementById('btn_Information_about_TEXT_ID_Approval').disabled = false;
                document.getElementById('btn_Information_about_TEXT_ID_Approval').classList.add('btn');
            } else {
                // Không có checkbox nào có class "checkbox_Active" được chọn
                // Tắt nút Approval và loại bỏ màu nền xám
                document.getElementById('btn_Information_about_TEXT_ID_Approval').disabled = true;
                document.getElementById('btn_Information_about_TEXT_ID_Approval').classList.remove('btn');
            }





        } else {
            // Không có checkbox nào được chọn
            // Tắt nút 1, 3, 4 và loại bỏ màu nền xám
            document.getElementById('btn_Information_about_TEXT_ID_modify').disabled = true;
            document.getElementById('btn_Information_about_TEXT_ID_modify').classList.remove('btn');
            document.getElementById('btn_Information_about_TEXT_ID_Limit_length_Manage').disabled = true;
            document.getElementById('btn_Information_about_TEXT_ID_Limit_length_Manage').classList.remove('btn');
            document.getElementById('btn_Information_about_TEXT_ID_reset').disabled = true;
            document.getElementById('btn_Information_about_TEXT_ID_reset').classList.remove('btn');
            document.getElementById('btn_Information_about_TEXT_ID_save').disabled = true;
            document.getElementById('btn_Information_about_TEXT_ID_save').classList.remove('btn');
            document.getElementById('btn_Information_about_TEXT_ID_Reject').disabled = true;
            document.getElementById('btn_Information_about_TEXT_ID_Reject').classList.remove('btn');
        }
    });
});

// });
document.getElementById('btn_Information_about_TEXT_ID_save').addEventListener('click', function() {

  document.getElementById('btn_Information_about_TEXT_ID_Set_Approval_route').disabled = false;
  document.getElementById('btn_Information_about_TEXT_ID_Set_Approval_route').classList.add('btn');
});


// Lắng nghe sự kiện click của nút save doi voi manager
document.getElementById('btn_Information_about_TEXT_ID_save').addEventListener('click', function() {
  // Bật nút 6 và thay đổi màu nền thành xám
  document.getElementById('btn_Information_about_TEXT_ID_Approval').disabled = false;
  document.getElementById('btn_Information_about_TEXT_ID_Approval').classList.add('btn');
});


document.getElementById('btn_Information_about_TEXT_ID_reset').addEventListener('click', function() {
// location.reload();
// ---------son-------------
// const xhr = new XMLHttpRequest();
// xhr.open('GET', 'delete-json.php', true);
// xhr.onreadystatechange = function() {
//   if (xhr.readyState === 4 && xhr.status === 200) {
//     console.log(xhr.responseText);
//   }
// };
// xhr.send();
//-----------------------

});



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to set the order in which buttons are pressed/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Edit Table/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    document.addEventListener('DOMContentLoaded', function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      var modifyButton = document.getElementById('btn_Information_about_TEXT_ID_modify');

      modifyButton.addEventListener('click', function() {
        for (var i = 0; i < checkboxes.length; i++) {
          var checkbox = checkboxes[i];
          var row = checkbox.parentNode.parentNode;
          var cells = row.getElementsByTagName('td');

          if (checkbox.checked) {
            for (var j = 1; j < cells.length - 1; j++) {
              if (j !== 6) { // Cột thứ 7 (chỉ số 6) không được chỉnh sửa
                cells[j].contentEditable = 'true';
              }
            }
          } else {
            for (var j = 1; j < cells.length - 1; j++) {
              cells[j].contentEditable = 'false';
            }
          }
        }
      });
    });




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Edit Table/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



  // Lấy thẻ <p> có id là "account_type"
  var accountType = document.getElementById("account_type");

  // Lấy các button cần điều chỉnh hiển thị
  var rejectButton = document.getElementById("btn_Information_about_TEXT_ID_Reject");
  var approvalButton = document.getElementById("btn_Information_about_TEXT_ID_Approval");
  var limitLengthButton = document.getElementById("btn_Information_about_TEXT_ID_Limit_length_Manage");
  var resetButton = document.getElementById("btn_Information_about_TEXT_ID_reset");
  var SetApprovalroute = document.getElementById("btn_Information_about_TEXT_ID_Set_Approval_route");
  var Send = document.getElementById("btn_Information_about_TEXT_ID_Send");

  // Kiểm tra nếu account_type chứa chữ "Manager"
  if (accountType.textContent.includes("Manager")) {
    // Hiển thị rejectButton và approvalButton
    rejectButton.style.display = "block";
    approvalButton.style.display = "block";
    
    // Ẩn limitLengthButton và resetButton
    limitLengthButton.style.display = "none";
    resetButton.style.display = "none";
    SetApprovalroute.style.display = "none";
    Send.style.display = "none";
  }

/*
bat nut appro khi nut có class checkbox active dc chon
*/






/*
bat nut appro khi nut có class checkbox active dc chon
*/