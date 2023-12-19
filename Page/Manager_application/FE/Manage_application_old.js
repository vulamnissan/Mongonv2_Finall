

//-----------------------sidebar hidden function-------------------------------------- 

  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }
//-----------------------sidebar hidden function-------------------------------------- 

var notificationList = document.getElementById("notification-list");
var iconButton = document.getElementById("account-button");
iconButton.addEventListener("click", function() {
  var notificationList_acc = document.getElementById("notification-list-acc");
  if (notificationList_acc.style.display === "" || notificationList_acc.style.display === "none") {
    notificationList_acc.style.display = "grid";
  }
  else {notificationList_acc.style.display = "none";
}
})
// -----------------------------hidden function that shows notifications and accounts------------- 


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////switch tables between functions////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var btn_manage_language_apply_vehicle_display = document.getElementById('manage_language_apply_vehicle_btn')
var btn_manage_manage_adopt_of_wording = document.getElementById('manage_adopt_of_wording_btn')
var btn_btn_manage_manage_adopt_of_wording_delete = document.getElementById('btn_Manage_adopt_of_wording_delete')
btn_manage_language_apply_vehicle_display.style.display = 'flex'
btn_manage_manage_adopt_of_wording.style.display = 'none'


var  ma_spec   =    document.getElementById('Manage_application_Manage_language_apply_vehicle');
          ma_spec.addEventListener('click', function() {
            var  ma_data_table   =    document.getElementById('table_Manage_adopt_of_wording');
            var  ma_spec_table   =    document.getElementById('table_Manage_language_apply_vehicle');
            ma_spec_table.style.display = 'block';
            ma_data_table.style.display = 'none';
            btn_manage_manage_adopt_of_wording.style.display='none'
            btn_manage_language_apply_vehicle_display.style.display = 'flex'
            ma_spec_table.style.opacity = '0';
            ma_spec_table.style.transform = 'scale(0.8)';

            setTimeout(function() {
                ma_spec_table.style.opacity = '1';
                ma_spec_table.style.transform = 'scale(1)';
            }, 300);
});



var  ma_data   =    document.getElementById('Manage_application_Manage_adopt_of_wording');
        ma_data.addEventListener('click', function() {
            var  ma_data_table   =    document.getElementById('table_Manage_adopt_of_wording');
            var  ma_spec_table   =    document.getElementById('table_Manage_language_apply_vehicle');
            ma_spec_table.style.display = 'none';
            ma_data_table.style.display = 'block'; 
            btn_manage_manage_adopt_of_wording.style.display='flex'
            btn_manage_language_apply_vehicle_display.style.display = 'none'
            btn_btn_manage_manage_adopt_of_wording_delete.style.display='none'
            ma_data_table.style.opacity = '0';
            ma_data_table.style.transform = 'scale(0.8)';
            
            setTimeout(function() {
              ma_data_table.style.opacity = '1';
              ma_data_table.style.transform = 'scale(1)';
            }, 300);
            


});


var childDivs = document.querySelectorAll("#Manage_application_home_function .box");
for (var i = 0; i < childDivs.length; i++) {
  childDivs[i].addEventListener("click", function() {
    for (var j = 0; j < childDivs.length; j++) {
      childDivs[j].classList.remove("active");
    }
    this.classList.add("active");
  });
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////Addrow manage language apply vehicle////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



const button = document.getElementById('btn_Manage_language_apply_vehicle_vehicle');
const table = document.getElementById('manage_language_apply_vehicle_table');
const tbody = table.getElementsByTagName('tbody')[0];
let rowCount = 0;

function addRow() {
  const newRow = document.createElement('tr');
  rowCount++;
  newRow.id = `row${rowCount}`; 

  const firstRow = tbody.getElementsByTagName('tr')[0];
  if (firstRow) {
    const firstCell = firstRow.querySelector('td');
    const checkbox = firstCell.querySelector('input[type="checkbox"]');
    const newCell = document.createElement('td');
    const newCheckbox = checkbox.cloneNode(true);
    newCell.appendChild(newCheckbox);
    newRow.appendChild(newCell);

    const cells = firstRow.getElementsByTagName('td');
    for (let i = 1; i < cells.length; i++) {
      const cell = document.createElement('td');
      if (i === 1 || i === 3) {
        const input = document.createElement('input');
        cell.appendChild(input);
      } 
      else if (i === 2) {

        const select = document.createElement('select');
        const option1 = document.createElement('option');
        option1.value = 'option1';
        option1.text = 'Option 1';
        select.appendChild(option1);

        const option2 = document.createElement('option');
        option2.value = 'option2';
        option2.text = 'Option 2';
        select.appendChild(option2);
        
        const option3 = document.createElement('option');
        option3.value = 'option3';
        option3.text = 'Option 3';
        select.appendChild(option3);
        cell.appendChild(select);
      } 
      else {
        const select = document.createElement('select');
        const option1 = document.createElement('option');
        option1.value = 'option1';
        option1.text = 'Option 1';
        select.appendChild(option1);

        const option2 = document.createElement('option');
        option2.value = 'option2';
        option2.text = 'Option 2';
        select.appendChild(option2);

        cell.appendChild(select);
      }
      newRow.appendChild(cell);
    }
  }
  tbody.insertBefore(newRow, firstRow);
}

button.addEventListener('click', addRow);


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////addrow manage adopt of wording ////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const button_add = document.getElementById('btn_Manage_adopt_of_wording_add');
const table_add = document.getElementById('manage_adopt_of_wording_table');
const tbody_add = table_add.getElementsByTagName('tbody')[0];
let rowCount_add = 0;

function addRow_add() {
  const newRow_add = document.createElement('tr');
  rowCount_add++;
  newRow_add.id = `row${rowCount_add}`;

  const firstRow_add = tbody_add.getElementsByTagName('tr')[0];
  if (firstRow_add) {
    const firstCell_add = firstRow_add.querySelector('td');
    const checkbox_add = firstCell_add.querySelector('input[type="checkbox"]');
    const newCell_add = document.createElement('td');
    const newCheckbox_add = checkbox_add.cloneNode(true);
    newCell_add.appendChild(newCheckbox_add);
    newRow_add.appendChild(newCell_add);

    const inputCell_add = document.createElement('td');
    const input_add = document.createElement('input');
    inputCell_add.appendChild(input_add);
    newRow_add.appendChild(inputCell_add);

    const cells_add = firstRow_add.getElementsByTagName('td');
    for (let i = 2; i < cells_add.length; i++) {
      const cell_add = document.createElement('td');
      const select_add = document.createElement('select');
      const option1_add = document.createElement('option');
      const option2_add = document.createElement('option');
      
      option1_add.value = 'option1';
      option1_add.text = 'Option 1';
      option2_add.value = 'option2';
      option2_add.text = 'Option 2';
      
      select_add.appendChild(option1_add);
      select_add.appendChild(option2_add);
      cell_add.appendChild(select_add);
      newRow_add.appendChild(cell_add);
    }
  }

  tbody_add.insertBefore(newRow_add, firstRow_add);
}

button_add.addEventListener('click', addRow_add);


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////addcolumn manage adopt of wording ////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
document.getElementById("btn_Manage_adopt_of_wording_Database_of_wording").addEventListener("click", function() {
  window.location.href = "Database_of_wording/Database_of_wording.html";
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////delete ////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////


const button_delete = document.getElementById('btn_Manage_adopt_of_wording_delete');
const table_delete = document.getElementById('manage_adopt_of_wording_table');
const tbody_delete = table_delete.getElementsByTagName('tbody')[0];
let rowCount_delete = 0;

function addRow_delete() {
  const newRow_delete = document.createElement('tr');
  rowCount_delete ++;
  newRow_delete.id = `row${rowCount_delete}`;
  const firstRow_delete = tbody_delete.getElementsByTagName('tr')[0];
  if (firstRow_delete) {
    const firstCell_delete = firstRow_delete.querySelector('td');
    const checkbox_delete = firstCell_delete.querySelector('input[type="checkbox"]');
    const newCell_delete = document.createElement('td');
    const newCheckbox_delete = checkbox_delete.cloneNode(true);
    newCell_delete.appendChild(newCheckbox_delete);
    newRow_delete.appendChild(newCell_delete);
    const cells_delete = firstRow_delete.getElementsByTagName('td');
    for (let i = 1; i < cells_delete.length; i++) {
      const cell_delete = document.createElement('td');
      const input_delete = document.createElement('input');
      cell_delete.appendChild(input_delete);
      newRow_delete.appendChild(cell_delete);
    }
  }

  tbody_delete.insertBefore(newRow_delete, firstRow_delete);
}

function removeRow_delete(rowId_delete) {
  const rowToRemove_delete = document.getElementById(rowId_delete);
  if (rowToRemove_delete) {
    rowToRemove_delete.remove();
  }
}

button_delete.addEventListener('click', function(event) {
  const buttonId = event.target.id;
  if (buttonId === 'a') {
    const lastRowId = `row${rowCount_delete}`;
    removeRow_delete(lastRowId);
  } else {
    addRow_delete();
  }
});


const tableinfor = document.getElementById('manage_language_apply_vehicle_table') ;                                                                 
const checkboxes = tableinfor.querySelectorAll('input[type="checkbox"]');                                                 
checkboxes.forEach(function(checkbox) {                                                                                 
    checkbox.addEventListener('click', function() {                                                                     
        const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');                          
        if (checkedCheckboxes.length > 0) {                                                                                   

            document.getElementById('btn_Manage_language_apply_vehicle_modify').disabled = false;
            document.getElementById('btn_Manage_language_apply_vehicle_modify').classList.add('btn');
            document.getElementById('btn_Manage_language_apply_vehicle_Save').disabled = false;
            document.getElementById('btn_Manage_language_apply_vehicle_Save').classList.add('btn');
        } else {
            document.getElementById('btn_Manage_language_apply_vehicle_modify').disabled = true;
            document.getElementById('btn_Manage_language_apply_vehicle_modify').classList.remove('btn');
            document.getElementById('btn_Manage_language_apply_vehicle_Save').disabled = true;
            document.getElementById('btn_Manage_language_apply_vehicle_Save').classList.remove('btn');

        }
    });
});



document.addEventListener('DOMContentLoaded', function() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var modifyButton = document.getElementById('btn_Manage_language_apply_vehicle_modify');

  modifyButton.addEventListener('click', function() {
    for (var i = 0; i < checkboxes.length; i++) {
      var checkbox = checkboxes[i];
      var row = checkbox.parentNode.parentNode;
      var cells = row.getElementsByTagName('td');

      if (checkbox.checked) {
        for (var j = 1; j < cells.length - 1; j++) {
          if (j !== 6) { 
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

var table1 = document.getElementById('manage_language_apply_vehicle_table');
var button1 = document.getElementById('btn_Manage_language_apply_vehicle_Lange');

function addColumn() {
  document.getElementById('1').disabled = false;
  document.getElementById('1').style.borderBottom = '1px solid black';
}

button1.addEventListener('click', addColumn);







































// Lấy reference đến table và nút trong HTML bằng ID
var table2 = document.getElementById('manage_adopt_of_wording_table');
var button2 = document.getElementById('btn_Manage_adopt_of_wording_add_vehicle');

// Định nghĩa hàm để thêm một cột mới vào table
function addColumn1() {
  document.getElementById('2').disabled = false;
  document.getElementById('2').style.borderBottom = '1px solid black';
  document.getElementById('3').disabled = false;
  document.getElementById('3').style.borderBottom = '1px solid black';
}

// Gắn sự kiện click vào nút, khi nút được bấm, gọi hàm addColumn
button2.addEventListener('click', addColumn1);

























