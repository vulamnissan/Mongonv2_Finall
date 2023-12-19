//-----------------------sidebar hidden function--------------------------------------
  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }

//-----------------------sidebar hidden function--------------------------------------


//-----------------------------hidden function that shows notifications and accounts-----


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




///////////////////////////////////////////////////////////////////////
//All this code is just for smooth table scrolling/////////////////////
///////////////////////////////////////////////////////////////////////

window.addEventListener('DOMContentLoaded', function() {
  const table = document.getElementById('myTable_Validator_request');
  const firstColumn = table.getElementsByTagName('th')[0];
  const secondColumn = table.getElementsByTagName('th')[1];
  const thirdColumn = table.getElementsByTagName('th')[2];

  const firstColumnWidth = firstColumn.offsetWidth;
  const secondColumnWidth = secondColumn.offsetWidth;
  const thirdColumnWidth = thirdColumn.offsetWidth;

  const a = firstColumnWidth ;
  const b = firstColumnWidth + secondColumnWidth -1;
  const c = firstColumnWidth + secondColumnWidth + thirdColumnWidth -1;
  const d = c + 3;
  const h = a - 2;
  document.documentElement.style.setProperty('--a', a + 'px');
  document.documentElement.style.setProperty('--b', b + 'px');
  document.documentElement.style.setProperty('--c', c + 'px');
  document.documentElement.style.setProperty('--d', d + 'px');
  document.documentElement.style.setProperty('--h', h + 'px');
});




window.addEventListener('DOMContentLoaded', function() {
  var table = document.getElementById('myTable_Validator_request');
  var thead = table.querySelector('thead');
  var tableRect = table.getBoundingClientRect();
  var theadRect = thead.getBoundingClientRect();

  function updateStickyThead() {
    if (window.pageYOffset > tableRect.top && window.pageYOffset < (tableRect.top + tableRect.height - theadRect.height)) {
      thead.classList.add('sticky-thead');
    } else {
      thead.classList.remove('sticky-thead');
    }
  }

  window.addEventListener('scroll', updateStickyThead);
});

///////////////////////////////////////////////////////////////////////
//All this code is just for smooth table scrolling/////////////////////
///////////////////////////////////////////////////////////////////////












//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to set the order in which buttons are pressed/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const checkboxes2 = document.querySelectorAll('input[type="checkbox"]');                                                 
checkboxes2.forEach(function(checkbox) {                                                                                 
    checkbox.addEventListener('click', function() {                                                                     
        const checkedCheckboxes2 = document.querySelectorAll('input[type="checkbox"]:checked');                          
        if (checkedCheckboxes2.length > 0) {                                                                                   

            document.getElementById('btn_Validator_request_save2').disabled = false;
            document.getElementById('btn_Validator_request_save2').classList.add('btn');


        } else {

            document.getElementById('btn_Validator_request_save2').disabled = true;
            document.getElementById('btn_Validator_request_save2').classList.remove('btn');

            
            
        }
    });
});


document.getElementById('btn_Validator_request_save2').addEventListener('click', function() {

  document.getElementById('btn_Validator_request_Confirm_translation').disabled = false;
  document.getElementById('btn_Validator_request_Confirm_translation').classList.add('btn');

});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to set the order in which buttons are pressed/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function chuyenTrang() {
  window.location.href = '../Validator_request/Validator_request_main.html';
}

document.addEventListener('DOMContentLoaded', function() {
  var nut = document.getElementById('btn_Validator_request_Confirm_translation');
  nut.addEventListener('click', chuyenTrang);
});


















