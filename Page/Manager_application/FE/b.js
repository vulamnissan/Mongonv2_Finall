
const button_b = document.getElementById('btn_Manage_adopt_of_wording_add');
const table_b = document.getElementById('manage_adopt_of_wording_table');
const tbody_b = table_b.getElementsByTagName('tbody')[0];
let rowCount_b = 0;

function addRow1() {
    const newRow = document.createElement('tr');
    rowCount_b++;
    newRow.id = `row${rowCount_b}`; // Create New ID for row 
    const firstRow = tbody_b.getElementsByTagName('tr')[0];
    if (firstRow) {
        const firstCell = firstRow.querySelector('td');
        const checkbox = firstCell.querySelector('input[type="checkbox"]');
        const newCell = document.createElement('td');
        const newCheckbox = checkbox.cloneNode(true);
        newCheckbox.setAttribute('id','cb_new_textid');//new change
        newCell.classList.add('adopt1');
        newCell.appendChild(newCheckbox);
        newRow.appendChild(newCell);

        const cells = firstRow.getElementsByTagName('td');
        for (let i = 1; i < cells.length; i++) {
            const cell = document.createElement('td');
            if (i === 1 ) {
                    cell.classList.add('adopt2');
                    const input = document.createElement('input');
                    cell.appendChild(input);

            } 
            else if(i === 2 ){
                    cell.classList.add('add_language1');
                }
            else {
                    const select = document.createElement('select');
                    const option1 = document.createElement('option');
                    option1.value = 'O';
                    option1.text = 'O';
                    select.classList.add('class_select_new');
                    select.appendChild(option1);

                    const option2 = document.createElement('option');
                    option2.value = 'X';
                    option2.text = 'X';
                    select.appendChild(option2);

                    cell.appendChild(select);
            }
            newRow.appendChild(cell);
        }
    }
tbody_b.insertBefore(newRow, firstRow);
}

button_b.addEventListener('click', addRow1);

var button101 = document.getElementById('btn_Manage_adopt_of_wording_add_vehicle');
function toggleColumn1() {
    var column1 = document.getElementsByClassName("add_language1");

    for (var i = 0; i < column1.length; i++) {
        if (column1[i].style.display === "" || column1[i].style.display === "none") {
            column1[i].style.display = "table-cell";
        } 
        else {
          column1[i].style.display = "none";
        }
    }
}

button101.addEventListener('click', toggleColumn1);

const tableinfor1 = document.getElementById('manage_adopt_of_wording_table') ;                                                                 
const checkboxes1 = tableinfor1.querySelectorAll('input[type="checkbox"]');                                                 
checkboxes1.forEach(function(checkbox) {                                                                                 
    checkbox.addEventListener('click', function() {                                                                     
        const checkedCheckboxes1 = document.querySelectorAll('input[type="checkbox"]:checked');                          
        if (checkedCheckboxes1.length > 0) {                                                                                   
            document.getElementById('btn_Manage_adopt_of_wording_Save').disabled = false;
            document.getElementById('btn_Manage_adopt_of_wording_Save').classList.add('btn');
        } else {
            document.getElementById('btn_Manage_adopt_of_wording_Save').disabled = true;
            document.getElementById('btn_Manage_adopt_of_wording_Save').classList.remove('btn');
        }
    });
});

document.getElementById('btn_Manage_adopt_of_wording_add').addEventListener('click', function() {
    document.getElementById('btn_Manage_adopt_of_wording_Save').disabled = false;
    document.getElementById('btn_Manage_adopt_of_wording_Save').classList.add('btn');
  });
  
document.getElementById('btn_Manage_adopt_of_wording_add_vehicle').addEventListener('click', function() {
    document.getElementById('btn_Manage_adopt_of_wording_Save').disabled = false;
    document.getElementById('btn_Manage_adopt_of_wording_Save').classList.add('btn');
  });
  