
  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }

//-----------------------sidebar hidden function--------------------------------------


//-----------------------------hidden function that shows notifications and accounts-----
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
///////////////////////////////////////////////////////////////////////
//All this code is just for smooth table scrolling/////////////////////
///////////////////////////////////////////////////////////////////////
// Lấy thẻ th đầu tiên
window.addEventListener('load', function() {
  const table = document.getElementById('myTable_Database_of_wording');
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
  var table = document.getElementById('myTable_Database_of_wording');
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



  // Lắng nghe sự kiện nhấn nút
  document.getElementById("btn_Information_about_TEXT_ID").addEventListener("click", function() {
    // Chuyển hướng đến trang HTML khác
    window.location.href = "Information about TEXT ID/Information_about_TEXT_ID.php";
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
