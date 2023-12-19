// Check if the page has been reloaded before
if (!sessionStorage.getItem('reloaded')) {
  // Chưa được tải lại trước đó, tiến hành tải lại trang
  sessionStorage.setItem('reloaded', 'true');
  location.reload();
} else {
  // Previously reloaded, remove information from sessionStorage
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
var notificationList_acc = document.getElementById("notification-list-acc");
var isDropdownOpen = false;

iconButton.addEventListener("click", function(event) {
  event.stopPropagation();

  if (!isDropdownOpen) {
    notificationList_acc.style.display = "grid";
    isDropdownOpen = true;
  } else {
    notificationList_acc.style.display = "none";
    isDropdownOpen = false;
  }
});

// Xử lý sự kiện click trên cả trang
document.addEventListener("click", function(event) {
  var targetElement = event.target;
  var isClickedInside = notificationList_acc.contains(targetElement) || iconButton.contains(targetElement);

  if (!isClickedInside) {
    notificationList_acc.style.display = "none";
    isDropdownOpen = false;
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

var buttons = document.getElementsByClassName("btn");


for (var i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", handleClick);
}

function handleClick() {
  var button = this;
  button.disabled = true;

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
addButton.addEventListener("click", function() {
  var tbody = document.querySelector("#table_Meter_Display_type tbody");

  // Create a new row with empty input fields
  var newRow = document.createElement("tr");
  newRow.classList.add("tr_input_new");

  // Create the cells with empty input fields
  for (var i = 0; i < 4; i++) {
    var cell = document.createElement("td");
    var input = document.createElement("input");
    input.type = "text";
    input.value = "";
    input.setAttribute('id', "new_display_type")
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



});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to display popup for Meter Display type//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to display popup for Set Approval//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



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


const tableinfor = document.getElementById('myTable') ;                                                                 
const checkboxes = tableinfor.querySelectorAll('input[type="checkbox"]');                                                 
checkboxes.forEach(function(checkbox) {                                                                                 
    checkbox.addEventListener('click', function() {                                                                     
        const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');                          
        if (checkedCheckboxes.length > 0) {                                                                                   
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
            // Check if there is a checkbox with the class "checkbox_Active"
            const activeCheckboxes = document.querySelectorAll('input.checkbox_Active:checked');
            if (activeCheckboxes.length > 0) {
                // There is at least one checkbox with the class "checkbox_Active" selected
                // Enable the Approval button and change the background color to gray
                document.getElementById('btn_Information_about_TEXT_ID_Approval').disabled = false;
                document.getElementById('btn_Information_about_TEXT_ID_Approval').classList.add('btn');
            } else {
                // There are no checkboxes with class "checkbox_Active" selected
                // Disable the Approval button and remove the gray background color
                document.getElementById('btn_Information_about_TEXT_ID_Approval').disabled = true;
                document.getElementById('btn_Information_about_TEXT_ID_Approval').classList.remove('btn');
            }

        } else {
            // No checkbox is checked
            // Disable buttons 1, 3, 4
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

document.getElementById('btn_Information_about_TEXT_ID_save').addEventListener('click', function() {

  document.getElementById('btn_Information_about_TEXT_ID_Set_Approval_route').disabled = false;
  document.getElementById('btn_Information_about_TEXT_ID_Set_Approval_route').classList.add('btn');
});


// Listen to the click event of the save button doi voi manager
document.getElementById('btn_Information_about_TEXT_ID_save').addEventListener('click', function() {
  // Turn on button 6
  document.getElementById('btn_Information_about_TEXT_ID_Approval').disabled = false;
  document.getElementById('btn_Information_about_TEXT_ID_Approval').classList.add('btn');
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
              if (j !== 0) { // Cột thứ 7 (chỉ số 6) không được chỉnh sửa
                cells[j].contentEditable = 'true';
              }
            }
          } 
          else {
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


  // show button with account as manager
  var accountType = document.getElementById("account_type");
  var rejectButton = document.getElementById("btn_Information_about_TEXT_ID_Reject");
  var approvalButton = document.getElementById("btn_Information_about_TEXT_ID_Approval");
  var limitLengthButton = document.getElementById("btn_Information_about_TEXT_ID_Limit_length_Manage");
  var resetButton = document.getElementById("btn_Information_about_TEXT_ID_reset");
  var SetApprovalroute = document.getElementById("btn_Information_about_TEXT_ID_Set_Approval_route");
  var Send = document.getElementById("btn_Information_about_TEXT_ID_Send");

  if (accountType.textContent.includes("manager")) {
    rejectButton.style.display = "block";
    approvalButton.style.display = "block";
    limitLengthButton.style.display = "none";
    resetButton.style.display = "none";
    SetApprovalroute.style.display = "none";
    Send.style.display = "none";
  }
//show button with account as manager