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

// Xử lý sự kiện click trên cả trang
document.addEventListener("click", function(event) {
  var targetElement = event.target;
  var isClickedInside = notificationList_acc.contains(targetElement) || iconButton.contains(targetElement);

  if (!isClickedInside) {
    notificationList_acc.style.display = "none";
    isDropdownOpen = false;
  }
});

///////////////////////////////////////////hidden code show and check input data for popup////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
  function toggleModal_re_view() {
      var modalContainer = document.getElementById("Information_about_TEXT_ID_view");
      modalContainer.classList.toggle("show");
  }

  function removeModalClass_review() {
      var modalContainer = document.getElementById("Information_about_TEXT_ID_view");
      modalContainer.classList.remove("show");
  }

  var re_viewButton = document.getElementsByClassName('list_request');

  for (var i = 0; i < re_viewButton.length; i++) {
    re_viewButton[i].addEventListener("click", toggleModal_re_view);
  }

  var buttonA6 = document.getElementById("Information_about_TEXT_ID_view_cancel");
  buttonA6.addEventListener("click", removeModalClass_review);

  var buttonB6 = document.getElementById("Information_about_TEXT_ID_view_ok");
  buttonB6.addEventListener("click", function(event) {
  var vali_request_pass = document.getElementById("Information_about_TEXT_ID_pass");
  var lackOfInfoMsg = document.getElementById("lack_of_infor");

  lackOfInfoMsg.style.display = "none";


  if (vali_request_pass.value === "" ) {
      lackOfInfoMsg.style.display = "block";

      event.preventDefault(); 
  } else if (vali_request_pass.value !== confirmPassInput.value) {
      notMatchMsg.style.display = "block";

      event.preventDefault(); 
  } else {
      removeModalClass_review();

  }
  });

  document.getElementById("form_Information_about_TEXT_ID_view").addEventListener("submit", function(event) {
    event.preventDefault(); 
  });
  });


  window.addEventListener('DOMContentLoaded', function() {
      var table1 = document.getElementById('myTable_Information_about_TEXT_ID_info_manager');
      var header1 = table1.querySelector('thead');
      var headerHeight1 = header1.offsetHeight;
  
      table1.addEventListener('scroll', function() {
      var scrollTop = this.scrollTop;
      header1.style.transform = 'translateY(' + scrollTop + 'px)';
      });
      });

      
///////////////////////////////////////////hidden code show and check input data for popup////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////