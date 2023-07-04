///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////function to get the content from the box tag and pass it to the center div///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
  var boxes = document.getElementsByClassName("box");
  for (var i = 0; i < boxes.length; i++) {
    boxes[i].addEventListener("click", function() {
      var index = Array.from(boxes).indexOf(this) + 1;
      var url = this.getAttribute("data-url");
      changeContent(index, url);
    });
  }
});

function changeContent(index, url) {
  var titles = ["Spec tender File Export", "Database of wording", "Manage application", "Translation request", "Validator request", "Vehicle manage"];
  var descriptions = [
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas"
  ];

  var boxes = document.getElementsByClassName("box");
  for (var i = 0; i < boxes.length; i++) {
    if (i + 1 === index) {
      boxes[i].classList.add("active");
    } else {
      boxes[i].classList.remove("active");
    }
  }

  document.getElementById("title").innerText = titles[index - 1];
  document.getElementById("description").innerText = descriptions[index - 1];

  var startButton = document.getElementById("startButton");
  startButton.setAttribute("data-url", url);
}

function goToPage() {
  var startButton = document.getElementById("startButton");
  var url = startButton.getAttribute("data-url");

  if (url) {
    window.location.href = url;
  }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////function to get the content from the box tag and pass it to the center div///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//-----------------------sidebar hidden function-------------------------------------- 

  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }
//-----------------------sidebar hidden function-------------------------------------- 


// -----------------------------hidden function that shows notifications and accounts------------- 




var iconButton = document.getElementById("account-button");

iconButton.addEventListener("click", function() {

var notificationList_acc = document.getElementById("notification-list-acc");

if (notificationList_acc.style.display === "" ||notificationList_acc.style.display === "none") {
  notificationList_acc.style.display = "grid";

  
} else {
  notificationList_acc.style.display = "none";
}
});
// -----------------------------hidden function that shows notifications and accounts------------- 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////The function to disable the functions is the account type that is not accessible/////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Lấy tham chiếu đến các thẻ div trong thẻ có id home_function
var divs = document.querySelectorAll('#home_function > div.box');

// Lấy tham chiếu đến thẻ p có id account_type
var accountType = document.getElementById('account_type');

// Kiểm tra nội dung của thẻ p account_type
if (accountType.textContent === 'User') {
  // Với User, vô hiệu hóa click cho các thẻ div trừ Database_of_wording và Validator_request
  for (var i = 0; i < divs.length; i++) {
    if (divs[i].id !== 'Database_of_wording' && divs[i].id !== 'Spec_tender_File_Export' && divs[i].id !== 'Translation_request' && divs[i].id !== 'Validator_request' && divs[i].id !== 'Vehicle_manage') {
      divs[i].style.pointerEvents = 'none';
      divs[i].classList.add('disabled'); // Thêm lớp .disabled
      divs[i].style.color = '#444444';   
    }
  }
} 
else if (accountType.textContent === 'Manager') {
  // Với Manager, bỏ vô hiệu hóa click cho tất cả các thẻ div
  for (var i = 0; i < divs.length; i++) {
    divs[i].style.pointerEvents = 'auto';
    divs[i].classList.remove('disabled'); // Xóa lớp .disabled (nếu có)
  }
} 
// else if (accountType.textContent === 'Translator') {
//   // Với abc, chỉ cho phép click vào thẻ div có id Vehicle_manage
//   for (var i = 0; i < divs.length; i++) {
//     if (divs[i].id !== 'Translation_request') {
//       divs[i].style.pointerEvents = 'none';
//       divs[i].classList.add('disabled'); // Thêm lớp .disabled
//       divs[i].style.color = '#444444';  
//     }
//   }
// }
// else if (accountType.textContent === 'Validator') {
//   // Với abc, chỉ cho phép click vào thẻ div có id Vehicle_manage
//   for (var i = 0; i < divs.length; i++) {
//     if (divs[i].id !== 'Validator_request') {
//       divs[i].style.pointerEvents = 'none';
//       divs[i].classList.add('disabled'); // Thêm lớp .disabled
//       divs[i].style.color = '#444444';  
//     }
//   }
// }
if (accountType.textContent === 'Validator') {
  var home_function = document.getElementById('home_function');
  var home_container = document.getElementById('home_container');
  var viewbox = document.getElementById('viewbox');
  // Thay đổi nội dung của thẻ div có id viewbox
  var viewbox = document.getElementById('viewbox');
  var validatorRequestDiv = document.getElementById('Validator_request');
  var validatorRequestTitle = validatorRequestDiv.innerText;
  var validatorRequestDescription = 'Mày là Validator';

  var titleElement = viewbox.querySelector('h1#title');
  var descriptionElement = viewbox.querySelector('p#description');
  var startButton = viewbox.querySelector('button#startButton');

  titleElement.innerText = validatorRequestTitle;
  descriptionElement.innerText = validatorRequestDescription;
  startButton.setAttribute('onclick', "window.location.href = 'ffff.html'");
  home_container.style.justifyContent = 'center';
  viewbox.style.marginInlineStart = '0';
  home_function.style.display = 'none';

}
if (accountType.textContent === 'Translator') {
  var home_function = document.getElementById('home_function');
  var home_container = document.getElementById('home_container');
  var viewbox = document.getElementById('viewbox');
  // Thay đổi nội dung của thẻ div có id viewbox
  var viewbox = document.getElementById('viewbox');
  var validatorRequestDiv = document.getElementById('Translation_request');
  var validatorRequestTitle = validatorRequestDiv.innerText;
  var validatorRequestDescription = 'Mày là translator';

  var titleElement = viewbox.querySelector('h1#title');
  var descriptionElement = viewbox.querySelector('p#description');
  var startButton = viewbox.querySelector('button#startButton');

  titleElement.innerText = validatorRequestTitle;
  descriptionElement.innerText = validatorRequestDescription;
  startButton.setAttribute('onclick', "window.location.href = 'ffgggff.html'");
  home_container.style.justifyContent = 'center';
  viewbox.style.marginInlineStart = '0';
  home_function.style.display = 'none';

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////The function to disable the functions is the account type that is not accessible/////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


