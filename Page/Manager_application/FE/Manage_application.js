

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

document.addEventListener("click", function(event) {
  var targetElement = event.target;
  var isClickedInside = notificationList_acc.contains(targetElement) || iconButton.contains(targetElement);

  if (!isClickedInside) {
    notificationList_acc.style.display = "none";
    isDropdownOpen = false;
  }
});

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


var  ma_spec = document.getElementById('Manage_application_Manage_language_apply_vehicle');
          ma_spec.addEventListener('click', function() {
            var  ma_data_table = document.getElementById('table_Manage_adopt_of_wording');
            var  ma_spec_table = document.getElementById('table_Manage_language_apply_vehicle');
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



var  ma_data = document.getElementById('Manage_application_Manage_adopt_of_wording');
        ma_data.addEventListener('click', function() {
            var  ma_data_table = document.getElementById('table_Manage_adopt_of_wording');
            var  ma_spec_table = document.getElementById('table_Manage_language_apply_vehicle');
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


var cb_select_base;
const button = document.getElementById('btn_Manage_language_apply_vehicle_vehicle');
const table = document.getElementById('manage_language_apply_vehicle_table');
const tbody = table.getElementsByTagName('tbody')[0];
let rowCount = 0;

function addRow()
{

  if (document.querySelectorAll('.text_vehicle_name').length<1)
  {
    const newRow = document.createElement('tr');
    rowCount++;
    newRow.id = `row${rowCount}`; 

    const firstRow = tbody.getElementsByTagName('tr')[0];
    if (firstRow) 
    {
      const firstCell = firstRow.querySelector('td');
      const checkbox = firstCell.querySelector('input[type="checkbox"]');
      const newCell = document.createElement('td');
      const newCheckbox = checkbox.cloneNode(true);
      newCheckbox.setAttribute('id', "cb_new_vehicle")
      newCell.classList.add('language_apply1');
      newCell.appendChild(newCheckbox);
      newRow.appendChild(newCell);

      const cells = firstRow.getElementsByTagName('td');
      for (let i = 1; i < cells.length; i++) {
        const cell = document.createElement('td');
        if (i === 1 ) {
          cell.classList.add('language_apply' +(i+1));
          const input = document.createElement('input');
          input.classList.add('text_vehicle_name');
          
          cell.appendChild(input);
        } 
        else if( i === 3) 
        {
          cell.classList.add('language_apply' +(i+1));
          const input = document.createElement('input');
          input.classList.add('text_meter_type');
          input.setAttribute('id', "td_meter_type");
          cell.appendChild(input);
        }
        else if (i === 4) {
          cell.classList.add('language_apply5');
          const select = document.createElement('select');
          select.classList.add('select_value_base');
          const option1 = document.createElement('option');
          option1.value = 'O';
          option1.text = 'O';
          select.appendChild(option1);

          const option2 = document.createElement('option');
          option2.value = 'X';
          option2.text = 'X';
          select.appendChild(option2);

          cell.appendChild(select);

        }
        else if (i === 5) {
          cell.classList.add('language_apply6');
          const select = document.createElement('select');
          select.classList.add('select_value_base');
          const option1 = document.createElement('option');
          option1.value = 'O';
          option1.text = 'O';
          select.appendChild(option1);

          const option2 = document.createElement('option');
          option2.value = 'X';
          option2.text = 'X';
          select.appendChild(option2);

          cell.appendChild(select);

        }
        else if (i === 6) {
          cell.classList.add('add_language');

        }
        else if (i === 2) {

          $(document).ready(function()
          {
              $.post("../BE/Get_base.php", {}, function(data){
                var arr_vehicle= data.replace('["',"");
                arr_vehicle=arr_vehicle.replace('"]',"");
                arr_vehicle=arr_vehicle.split('","');
                console.log(arr_vehicle);

                cell.classList.add('language_apply3');
                const select = document.createElement('select');
                select.classList.add('select_base');
                option1 = document.createElement('option');
                option1.value = "Select Base";
                option1.text = "Select Base";
                select.appendChild(option1);
                for (i=0;i<arr_vehicle.length;i++)
                {
                  option1 = document.createElement('option');
                  option1.value = arr_vehicle[i];
                  option1.text = arr_vehicle[i];
                  select.appendChild(option1);
                }
                
                select.setAttribute('id', "cb_base");
                cell.appendChild(select);

                cb_select_base = document.getElementById('cb_base')
                var table1 = document.getElementById('manage_language_apply_vehicle_table');
                var last_row = table1.rows.length;
                var last_col = table1.rows[0].cells.length;
                var select_new_language = document.querySelectorAll('.select_value_base'); 
                cb_select_base.addEventListener("change",
                function ()
                {
                  for (i=1;i<last_row-1;i++)
                  {
                    
                    if (document.getElementById("td_veh_"+i+"_2").innerHTML==cb_select_base.value)
                    {
                      document.getElementById("td_meter_type").value=document.getElementById("td_meter_"+i+"_4").innerHTML
                      for (j=5;j<last_col;j++)
                      {
                          select_new_language[j-5].value = String(document.getElementById("select_"+i+"_"+j).value);
                      }
                      break;
                    }
                  }
                })
          });
        });
          
        } 
        
        else {
          const select = document.createElement('select');
          select.classList.add('select_value_base');
          const option1 = document.createElement('option');
          option1.value = 'O';
          option1.text = 'O';
          select.appendChild(option1);

          const option2 = document.createElement('option');
          option2.value = 'X';
          option2.text = 'X';
          select.appendChild(option2);

          cell.appendChild(select);
        }
        newRow.appendChild(cell);
      }
    
    tbody.insertBefore(newRow, firstRow);

    }
    const checkboxes = tableinfor.querySelectorAll('input[type="checkbox"]');                                                 
    checkboxes.forEach(function(checkbox) {                                                                                 
        checkbox.addEventListener('click', function() {                                                                  
            const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');                          
            if (checkedCheckboxes.length > 0) {                                                                                   
                document.getElementById('btn_Manage_language_apply_vehicle_Save').disabled = false;
                document.getElementById('btn_Manage_language_apply_vehicle_Save').classList.add('btn');
            } else {

                document.getElementById('btn_Manage_language_apply_vehicle_Save').disabled = true;
                document.getElementById('btn_Manage_language_apply_vehicle_Save').classList.remove('btn');

            }
        });
    });
  }
}

button.addEventListener('click', addRow);


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////addrow manage adopt of wording ////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////addcolumn manage adopt of wording ////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



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


const tableinfor = document.getElementById('manage_language_apply_vehicle_table');                                                                 
const checkboxes = tableinfor.querySelectorAll('input[type="checkbox"]');                                                 
checkboxes.forEach(function(checkbox) {                                                                                 
    checkbox.addEventListener('click', function() {                                                                  
        const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');                          
        if (checkedCheckboxes.length > 0) {                                                                                   
            document.getElementById('btn_Manage_language_apply_vehicle_Save').disabled = false;
            document.getElementById('btn_Manage_language_apply_vehicle_Save').classList.add('btn');
        } else {

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


var button10 = document.getElementById('btn_Manage_language_apply_vehicle_Lange');

function toggleColumn() {
  var column = document.getElementsByClassName("add_language");
  for (var i = 0; i < column.length; i++) {
      if (column[i].style.display === "" || column[i].style.display === "none") {
          column[i].style.display = "table-cell";
      } else {
          column[i].style.display = "none";
          document.getElementById("1").value='';
      }
  }
}
button10.addEventListener('click', toggleColumn);



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////addcolumn manage adopt of wording ////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////































