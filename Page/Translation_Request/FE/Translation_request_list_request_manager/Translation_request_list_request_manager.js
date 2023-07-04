
  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }

//-----------------------sidebar hidden function--------------------------------------


//-----------------------------hidden function that shows notifications and accounts-----



var iconButton = document.getElementById("account-button");

iconButton.addEventListener("click", function() {
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

///////////////////////////////////////////////////////////////////////
//All this code is just for smooth table scrolling/////////////////////
///////////////////////////////////////////////////////////////////////




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to set the order in which buttons are pressed/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////xu ly popup////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
  function toggleModal_re_view() {
      var modalContainer = document.getElementById("Translation_request_view");
      modalContainer.classList.toggle("show");
  }

  function removeModalClass_review() {
      var modalContainer = document.getElementById("Translation_request_view");
      modalContainer.classList.remove("show");
  }

  var re_viewButton = document.getElementsByClassName('list_request');

  // Lặp qua danh sách các phần tử và gán sự kiện click cho mỗi phần tử
  for (var i = 0; i < re_viewButton.length; i++) {
    // alert(i);
    re_viewButton[i].addEventListener("click", toggleModal_re_view);
  }
  


  var buttonA6 = document.getElementById("Translation_request_view_cancel");
  buttonA6.addEventListener("click", removeModalClass_review);

  var buttonB6 = document.getElementById("Translation_request_view_ok");
  buttonB6.addEventListener("click", function(event) { // khi an nut ok de kiem tra password
  var vali_request_pass = document.getElementById("Translation_request_pass");
  var lackOfInfoMsg = document.getElementById("lack_of_infor");
  var accountType = document.getElementById("account_type");

  lackOfInfoMsg.style.display = "none";
 // ============ Hoang check pass =============
    if (vali_request_pass.value === "" ) {
          lackOfInfoMsg.style.display = "block";
    
          event.preventDefault(); // Ngăn chặn hành vi mặc định
      }
    else{
      // check pass
      var request=document.getElementById("txt_request").innerHTML;
      var user_ID = document.getElementById("user_ID").innerHTML;
      // var result ="";
      $(document).ready(function(){
        $.post("../../BE/Check_pass_manager.php", {pass:vali_request_pass.value ,rq:request}, function(data){
          // result = data;
          if(data == "ok" && accountType.textContent.includes("manager")) // pass dung 
          {
              window.location.href = "../../FE/Translation_Request.php?flag=2&rq="+request+"&id_user="+user_ID+"&checkshow=request";
          }
          else if (accountType.textContent.includes("translator") && data=="ok")
          {
              window.location.href = "../../FE/Translation_Request.php?flag=2&rq="+request+"&id_user="+user_ID+"&checkshow=request" ;   
          }
          else
          {
            alert("Password not correct. Please check again!");
          }
        });})
      
    }


  });

  document.getElementById("form_Translation_request_view").addEventListener("submit", function(event) {
    event.preventDefault(); // Ngăn chặn hành vi mặc định
    // Xử lý dữ liệu form hoặc thực hiện các hành động khác
  });
  });





  window.addEventListener('DOMContentLoaded', function() {
      var table1 = document.getElementById('myTable_Translation_request_info_manager');
      var header1 = table1.querySelector('thead');
      var headerHeight1 = header1.offsetHeight;
  
      table1.addEventListener('scroll', function() {
      var scrollTop = this.scrollTop;
      header1.style.transform = 'translateY(' + scrollTop + 'px)';
      });
      });


//=========== Hoang JS=============

    function show_pass_rq(id,rq){
      document.getElementById("txt_request").innerHTML=rq;
    }

    // buttonB6.addEventListener("click", function(event) {
    //     var pass = document.getElementById("Translation_request_pass").innerHTML;
    //     console.log(pass);
    // })