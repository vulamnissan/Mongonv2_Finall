///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////function to get the content from the box tag and pass it to the center div///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function changeContent(index, url) {
    var titles = ["Spec tender File Export", "Database of wording", "Manage application", "Translation request", "Validator request","Vehicle manage"];
    var descriptions = [
      "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
      "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
      "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
      "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
      "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas",
      "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas"
    ];

    // Đánh dấu tiêu đề được chọn
    var boxes = document.getElementsByClassName("box");
    for (var i = 0; i < boxes.length; i++) {
      if (i + 1 === index) {
        boxes[i].classList.add("active");
      } else {
        boxes[i].classList.remove("active");
      }
    }

    // Thay đổi nội dung của tiêu đề và mô tả
    document.getElementById("title").innerText = titles[index - 1];
    document.getElementById("description").innerText = descriptions[index - 1];
    
    // Gán liên kết vào nút "start"
    var startButton = document.getElementById("startButton");
    startButton.setAttribute("data-url", url);
  }

  function goToPage() {
    var startButton = document.getElementById("startButton");
    var url = startButton.getAttribute("data-url");
    window.location.href = url;
        // Ban dau link se dan den function1
        if (!url) {
            url = '';
                  }

                  window.location.href = url
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
var notificationList = document.getElementById("notification-list");
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








///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////switch tables between functions////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var  ma_spec   =    document.getElementById('Manager_application_Spec_tender_File_Export');
          ma_spec.addEventListener('click', function() {
            var  ma_vali_table   =    document.getElementById('table_Validator_request');
            var  ma_tran_table   =    document.getElementById('table_Translation_request');
            var  ma_data_table   =    document.getElementById('table_Database_of_wording');
            var  ma_spec_table   =    document.getElementById('table_Spec_tender_File_Export');
            ma_spec_table.style.display = 'flex';
            ma_data_table.style.display = 'none';
            ma_tran_table.style.display = 'none';
            ma_vali_table.style.display = 'none';

// Áp dụng hiệu ứng phóng to từ nhỏ
ma_spec_table.style.opacity = '0';
ma_spec_table.style.transform = 'scale(0.8)';

setTimeout(function() {
  ma_spec_table.style.opacity = '1';
  ma_spec_table.style.transform = 'scale(1)';
}, 300);






});
var  ma_data   =    document.getElementById('Manager_application_Database_of_wording');
        ma_data.addEventListener('click', function() {
            var  ma_vali_table   =    document.getElementById('table_Validator_request');
            var  ma_tran_table   =    document.getElementById('table_Translation_request');
            var  ma_data_table   =    document.getElementById('table_Database_of_wording');
            var  ma_spec_table   =    document.getElementById('table_Spec_tender_File_Export');
            ma_spec_table.style.display = 'none';
            ma_data_table.style.display = 'flex';
            ma_tran_table.style.display = 'none';
            ma_vali_table.style.display = 'none';

            ma_data_table.style.opacity = '0';
            ma_data_table.style.transform = 'scale(0.8)';
            
            setTimeout(function() {
              ma_data_table.style.opacity = '1';
              ma_data_table.style.transform = 'scale(1)';
            }, 300);
            


});
var  ma_tran   =    document.getElementById('Manager_application_Translation_request');
            ma_tran.addEventListener('click', function() {
            var  ma_vali_table   =    document.getElementById('table_Validator_request');
            var  ma_tran_table   =    document.getElementById('table_Translation_request');
            var  ma_data_table   =    document.getElementById('table_Database_of_wording');
            var  ma_spec_table   =    document.getElementById('table_Spec_tender_File_Export');
            ma_spec_table.style.display = 'none';
            ma_data_table.style.display = 'none';
            ma_tran_table.style.display = 'flex';
            ma_vali_table.style.display = 'none';

            ma_tran_table.style.opacity = '0';
            ma_tran_table.style.transform = 'scale(0.8)';
            
            setTimeout(function() {
              ma_tran_table.style.opacity = '1';
              ma_tran_table.style.transform = 'scale(1)';
            }, 300);

});
var  ma_vali   =    document.getElementById('Manager_application_Validator_request');
            ma_vali.addEventListener('click', function() {
            var  ma_vali_table   =    document.getElementById('table_Validator_request');
            var  ma_tran_table   =    document.getElementById('table_Translation_request');
            var  ma_data_table   =    document.getElementById('table_Database_of_wording');
            var  ma_spec_table   =    document.getElementById('table_Spec_tender_File_Export');
            ma_spec_table.style.display = 'none';
            ma_data_table.style.display = 'none';
            ma_tran_table.style.display = 'none';
            ma_vali_table.style.display = 'flex';

            ma_vali_table.style.opacity = '0';
            ma_vali_table.style.transform = 'scale(0.8)';
            
            setTimeout(function() {
              ma_vali_table.style.opacity = '1';
              ma_vali_table.style.transform = 'scale(1)';
            }, 300);

});


// Lấy tất cả các thẻ div con
var childDivs = document.querySelectorAll("#Manager_application_home_function .box");

// Gắn sự kiện click cho mỗi thẻ div con
for (var i = 0; i < childDivs.length; i++) {
  childDivs[i].addEventListener("click", function() {
    // Xóa lớp "active" khỏi tất cả các thẻ div con
    for (var j = 0; j < childDivs.length; j++) {
      childDivs[j].classList.remove("active");
    }

    // Thêm lớp "active" vào thẻ div được click
    this.classList.add("active");
  });
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////switch tables between functions////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////