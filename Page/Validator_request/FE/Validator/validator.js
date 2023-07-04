
document.addEventListener("DOMContentLoaded", function() {
    function toggleModal_re_view() {
        var modalContainer = document.getElementById("Validator_Request_view");
        modalContainer.classList.toggle("show");
        document.getElementById("name_request").innerHTML=this.innerHTML;
    }

    function removeModalClass_review() {
        var modalContainer = document.getElementById("Validator_Request_view");
        modalContainer.classList.remove("show");
    }

    var re_viewButton = document.getElementsByClassName('list_request');

    // Lặp qua danh sách các phần tử và gán sự kiện click cho mỗi phần tử
    for (var i = 0; i < re_viewButton.length; i++) {
      re_viewButton[i].addEventListener("click", toggleModal_re_view);
    }
    

    var buttonA6 = document.getElementById("Validator_Request_view_cancel");
    buttonA6.addEventListener("click", removeModalClass_review);
    
    var buttonB6 = document.getElementById("Validator_Request_view_ok");
    buttonB6.addEventListener("click", function(event) {
        var rq = document.getElementById("name_request").innerHTML;
        var pw = document.getElementById("vali_request_pass").value;
        $(document).ready(function(){
            $.post("../../BE/BE_VALIDATOR_chuyen_trang.php",{pw:pw ,rq:rq}, function(data){
              if (data == 1){
                window.location.href = "Validator_request_main_validator.php?rq="+rq;
              }
              else
              {
                window.alert("Password fail!");
              }
          });
        });

          /////// tung ///////
        var vali_request_pass = document.getElementById("vali_request_pass");
        var lackOfInfoMsg = document.getElementById("lack_of_infor");

        lackOfInfoMsg.style.display = "none";


        if (vali_request_pass.value === "" ) {
            lackOfInfoMsg.style.display = "block";

            event.preventDefault(); // Ngăn chặn hành vi mặc định
        // } else if (vali_request_pass.value !== confirmPassInput.value) {
        //     notMatchMsg.style.display = "block";

        //     event.preventDefault(); // Ngăn chặn hành vi mặc định
        } 
        else {
            removeModalClass_review();
          // Lắng nghe sự kiện click của nút ok set pass



        }
    });

    document.getElementById("form_Validator_Request_view").addEventListener("submit", function(event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định
      // Xử lý dữ liệu form hoặc thực hiện các hành động khác
    });
    });
    

/*
///////////////////////////

Hàm báo đỏ dealine
    
///////////////////////// 
    
*/
function highlightNearDeadline() {
    var currentDate = new Date(); // Lấy ngày hiện tại
    var rows = document.querySelectorAll("#myTable_Translation_Request_info_validator tbody tr");
  
    rows.forEach(function(row) {
      var deadlineCell = row.querySelector("td:last-child"); // Ô td chứa ngày hết hạn
  
      // Chuyển đổi định dạng ngày tháng từ ô td thành đối tượng Date
      var deadlineDateParts = deadlineCell.innerText.split("/");
      var deadlineDate = new Date(deadlineDateParts[2], deadlineDateParts[1] - 1, deadlineDateParts[0]);
  
      // So sánh ngày, tháng và năm giữa ngày hết hạn và ngày hiện tại
      if (
        deadlineDate.getDate() == currentDate.getDate() + 1 &&
        deadlineDate.getMonth() == currentDate.getMonth() &&
        deadlineDate.getFullYear() == currentDate.getFullYear()
      ) {
        deadlineCell.style.color = "red"; // Đặt màu sắc của ngày thành màu đỏ
      }
    });
  }
  
  highlightNearDeadline();
  

/*
///////////////////////////

Hàm báo đỏ dealine
    
///////////////////////// 
    
*/



window.addEventListener('DOMContentLoaded', function() {
    var table = document.getElementById('myTable_Validator_Request_validator');
    var header = table.querySelector('thead');
    var headerHeight = header.offsetHeight;

    table.addEventListener('scroll', function() {
    var scrollTop = this.scrollTop;
    header.style.transform = 'translateY(' + scrollTop + 'px)';
    });
});



    window.addEventListener('DOMContentLoaded', function() {
    var table1 = document.getElementById('myTable_Translation_Request_info_validator');
    var header1 = table1.querySelector('thead');
    var headerHeight1 = header1.offsetHeight;

    table1.addEventListener('scroll', function() {
    var scrollTop = this.scrollTop;
    header1.style.transform = 'translateY(' + scrollTop + 'px)';
    });
    });

// Lấy danh sách tất cả các ô input có class là "result_check_confirm"
var resultCheckInputs = document.querySelectorAll('.result_check_confirm input');

// Gắn kết sự kiện "oninput" vào từng ô input
resultCheckInputs.forEach(function(input) {
  input.addEventListener('input', function() {
    // Kiểm tra nếu giá trị nhập vào là "NG"
    if (this.value.trim().toUpperCase() === 'NG') {
      // Thêm lớp CSS "highlight-red" vào ô td cha
      this.parentNode.classList.add('highlight-red');

      // Tìm ô td cùng hàng có class là "reason_NG"
      var reasonNGCell = this.parentNode.nextElementSibling;
      // Kích hoạt ô td "reason_NG" để cho phép chỉnh sửa thông tin
      reasonNGCell.contentEditable = true;
      // Thêm lớp CSS "highlight-border" vào ô td "reason_NG"
      reasonNGCell.classList.add('highlight-border');

      // Tìm ô td cùng hàng có class là "wording"
      var wordingCell = this.parentNode.parentNode.querySelector('.wording');
      // Kích hoạt ô td "wording" để cho phép chỉnh sửa thông tin
      wordingCell.contentEditable = true;
      // Thêm lớp CSS "highlight-border" vào ô td "wording"
      wordingCell.classList.add('highlight-border');
    } else {
      // Xóa lớp CSS "highlight-red" khỏi ô td cha
      this.parentNode.classList.remove('highlight-red');

      // Tìm ô td cùng hàng có class là "reason_NG"
      var reasonNGCell = this.parentNode.nextElementSibling;
      // Xóa thông tin trong ô td "reason_NG"
      reasonNGCell.textContent = '';
      // Vô hiệu hóa chỉnh sửa ô td "reason_NG"
      reasonNGCell.contentEditable = false;
      // Xóa lớp CSS "highlight-border" khỏi ô td "reason_NG"
      reasonNGCell.classList.remove('highlight-border');

      // Tìm ô td cùng hàng có class là "wording"
      var wordingCell = this.parentNode.parentNode.querySelector('.wording');
      // Xóa thông tin trong ô td "wording"
      wordingCell.textContent = '';
      // Vô hiệu hóa chỉnh sửa ô td "wording"
      wordingCell.contentEditable = false;
      // Xóa lớp CSS "highlight-border" khỏi ô td "wording"
      wordingCell.classList.remove('highlight-border');
    }
  });
});












//kiểm tra xem có bỏ sót ô thông tin nào không
//kiểm tra xem có bỏ sót ô thông tin nào không
//kiểm tra xem có bỏ sót ô thông tin nào không
//kiểm tra xem có bỏ sót ô thông tin nào không


var validateButton = document.getElementById('btn_Validator_request_save5');
validateButton.addEventListener('click', validateForm);
var Hamidashi_check = document.getElementById('btn_Validator_request_Hamidashi_check');
Hamidashi_check.addEventListener('click', validateForm);
var Send_result = document.getElementById('btn_Validator_request_Send_result');
Send_result.addEventListener('click', validateForm);

function validateForm() {
  var resultCheckCells = document.querySelectorAll('.result_check_confirm');
  var missingFields = [];

  resultCheckCells.forEach(function(cell) {
    var resultCheckInput = cell.querySelector('input');
    var reasonNGCell = cell.nextElementSibling;
    var wordingCell = cell.parentNode.querySelector('.wording');

    // Kiểm tra ô input
    if (resultCheckInput.value.trim() === '') {
      missingFields.push(resultCheckInput);
    }

    // Kiểm tra ô reason_NG
    if (resultCheckInput.value.trim().toUpperCase() === 'NG' && (reasonNGCell.textContent.trim() === '' || !reasonNGCell.contentEditable)) {
      missingFields.push(reasonNGCell);
    }

    // Kiểm tra ô wording
    if (resultCheckInput.value.trim().toUpperCase() === 'NG' && (wordingCell.textContent.trim() === '' || !wordingCell.contentEditable)) {
      missingFields.push(wordingCell);
    }
  });

  var messageValidator = document.getElementById('mess_validator_info_check');

  if (missingFields.length > 0) {
    // Nếu có ô trống, hiển thị thẻ <p>
    messageValidator.style.display = 'block';
    document.getElementById('btn_Validator_request_Send_result').disabled = true;
    document.getElementById('btn_Validator_request_Send_result').classList.remove('btn');
  } 
  

  else {
    // Nếu không có ô trống, ẩn thẻ <p>
    messageValidator.style.display = 'none';
  }
}
//kiểm tra xem có bỏ sót ô thông tin nào không
//kiểm tra xem có bỏ sót ô thông tin nào không
//kiểm tra xem có bỏ sót ô thông tin nào không
//kiểm tra xem có bỏ sót ô thông tin nào không










// kiểm tra các giá trị réult có phải là ok hay ng ko( có bị nhập sai không)
// kiểm tra các giá trị réult có phải là ok hay ng ko( có bị nhập sai không)
// kiểm tra các giá trị réult có phải là ok hay ng ko( có bị nhập sai không)
// kiểm tra các giá trị réult có phải là ok hay ng ko( có bị nhập sai không)
// kiểm tra các giá trị réult có phải là ok hay ng ko( có bị nhập sai không)
var saveButton = document.getElementById('btn_Validator_request_save5');
saveButton.addEventListener('click', validateInputs);

function validateInputs() {
  var tdList = document.getElementsByClassName('result_check_confirm');
  var errorMessage = document.getElementById('mess_validator_info_check_OK_NG');
  var invalidInputs = [];

  // Kiểm tra giá trị nhập vào của từng ô td
  for (var i = 0; i < tdList.length; i++) {
    var td = tdList[i];
    var input = td.querySelector('input');
    var inputValue = input.value.trim().toUpperCase();

    if (inputValue !== 'NG' && inputValue !== 'OK'&& inputValue !== '') {
      invalidInputs.push(td);
    }
  }

  // Xử lý ô nhập sai giá trị
  if (invalidInputs.length > 0) {
    errorMessage.style.display = 'block';
    document.getElementById('btn_Validator_request_Send_result').disabled = true;
    document.getElementById('btn_Validator_request_Send_result').classList.remove('btn');
    // Đặt border xanh cho các ô nhập sai giá trị
    invalidInputs.forEach(function(td) {
      td.style.border = '1px solid green';
    });
  } else {
    errorMessage.style.display = 'none';

    // Xóa border xanh cho tất cả các ô
    for (var i = 0; i < tdList.length; i++) {
      var td = tdList[i];
      td.style.border = '';
    }
  }
}

// kiểm tra các giá trị réult có phải là ok hay ng ko( có bị nhập sai không)
// kiểm tra các giá trị réult có phải là ok hay ng ko( có bị nhập sai không)
// kiểm tra các giá trị réult có phải là ok hay ng ko( có bị nhập sai không)
// kiểm tra các giá trị réult có phải là ok hay ng ko( có bị nhập sai không)



// Hamf để bật nút hamidashi khi tất cả NG được điền thông tin
// Hamf để bật nút hamidashi khi tất cả NG được điền thông tin
// Hamf để bật nút hamidashi khi tất cả NG được điền thông tin
// Hamf để bật nút hamidashi khi tất cả NG được điền thông tin

// Lấy tất cả các phần tử input trong bảng
var inputs = document.querySelectorAll('#myTable_Validator_Request_validator input');
var condition_send_result = false;
// Lặp qua tất cả các input và kiểm tra nếu chưa nhập giá trị
function checkInputs() {
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].value === '') {
      return false; // Trả về false nếu còn input chưa nhập giá trị
    }
  }
  return true; // Trả về true nếu tất cả các input đã được nhập giá trị
}

// Gọi hàm kiểm tra inputs khi mỗi lần input thay đổi
for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('input', function() {
    if (checkInputs()) {
      condition_send_result = true;


      var resultCheckInputs1 = document.querySelectorAll('.result_check_confirm input');

      // Kiểm tra tất cả các input trong các ô td có class là result_check_confirm
      resultCheckInputs1.forEach(function(input) {
        if (input.value.trim().toUpperCase() == 'NG') {

          // document.getElementById('btn_Validator_request_Hamidashi_check').disabled = false;
          document.getElementById('btn_Validator_request_Hamidashi_check').classList.add('btn');

          document.getElementById('btn_Validator_request_Send_result').disabled = true;
          document.getElementById('btn_Validator_request_Send_result').classList.remove('btn');
      



        }
    
    
      });
    



    }




  });
}
// Hamf để bật nút hamidashi khi tất cả NG được điền thông tin
// Hamf để bật nút hamidashi khi tất cả NG được điền thông tin
// Hamf để bật nút hamidashi khi tất cả NG được điền thông tin
// Hamf để bật nút hamidashi khi tất cả NG được điền thông tin












var save5 = document.getElementById('btn_Validator_request_save5');
save5.addEventListener('click', function checkConditionAndShowAlert() {
var flag_send = false;
  var resultCheckInputs = document.querySelectorAll('.result_check_confirm input');
  var allOk = true;


  // Kiểm tra tất cả các input trong các ô td có class là result_check_confirm
  resultCheckInputs.forEach(function(input) {
    if (input.value.trim().toUpperCase() !== 'OK') {
      allOk = false;



    }


  });

  // Kiểm tra điều kiện condition_send_result và tất cả các input có giá trị 'Ok'
  if (condition_send_result && allOk  ) {
    // document.getElementById('btn_Validator_request_Hamidashi_check').disabled = true;
    document.getElementById('btn_Validator_request_Hamidashi_check').classList.remove('btn');

    document.getElementById('btn_Validator_request_Send_result').disabled = false;
    document.getElementById('btn_Validator_request_Send_result').classList.add('btn');
    flag_send = true;

  }

});

















