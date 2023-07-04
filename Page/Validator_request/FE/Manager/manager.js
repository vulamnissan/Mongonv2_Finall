
document.addEventListener("DOMContentLoaded", function() {
    function toggleModal_re_view() {
        var modalContainer = document.getElementById("Validator_Request_view");
        modalContainer.classList.toggle("show");
    }

    function removeModalClass_review() {
        var modalContainer = document.getElementById("Validator_Request_view");
        modalContainer.classList.remove("show");
    }

    // var re_viewButton = document.getElementsByClassName("list_request");
    // re_viewButton.addEventListener("click", toggleModal_re_view);
    var re_viewButton = document.getElementsByClassName('list_request');

  // Lặp qua danh sách các phần tử và gán sự kiện click cho mỗi phần tử
  for (var i = 0; i < re_viewButton.length; i++) {
    // alert(i);
    re_viewButton[i].addEventListener("click", toggleModal_re_view);
  }

    var buttonA6 = document.getElementById("Validator_Request_view_cancel");
    buttonA6.addEventListener("click", removeModalClass_review);

    var buttonB6 = document.getElementById("Validator_Request_view_ok");
    buttonB6.addEventListener("click", function(event) {
    ////// duc //////////////////////////
    var pw = document.getElementById("vali_request_pass").value;
    var request = document.getElementById("txt_request").innerHTML;
    $(document).ready(function(){
      $.post("../../BE/BE_MANAGER_chuyen_trang.php",{pw:pw,request:request}, function(data){
          if (data == 1){
            // header("Location: ../FE/Manager/Validator_request_main_manager.php");
            window.location.href = "Validator_request_main_manager.php?request="+request;
          }
          else 
          {
            alert("Password incorect!");
          }
          
          // alert(data)
    });
    });
////// tung ////////////////////////////
    var vali_request_pass = document.getElementById("vali_request_pass");
    var lackOfInfoMsg = document.getElementById("lack_of_infor");

    lackOfInfoMsg.style.display = "none";


    if (vali_request_pass.value === "" ) {
        lackOfInfoMsg.style.display = "block";

        event.preventDefault(); // Ngăn chặn hành vi mặc định
    // } else if (vali_request_pass.value !== confirmPassInput.value) {
    //     notMatchMsg.style.display = "block";

    //     event.preventDefault(); // Ngăn chặn hành vi mặc định
    } else {
        removeModalClass_review();
       // Lắng nghe sự kiện click của nút ok set pass



    }
    });

    document.getElementById("form_Validator_Request_view").addEventListener("submit", function(event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định
      // Xử lý dữ liệu form hoặc thực hiện các hành động khác
    });
    });





    window.addEventListener('DOMContentLoaded', function() {
        var table1 = document.getElementById('myTable_Translation_Request_info_manager');
        var header1 = table1.querySelector('thead');
        var headerHeight1 = header1.offsetHeight;
    
        table1.addEventListener('scroll', function() {
        var scrollTop = this.scrollTop;
        header1.style.transform = 'translateY(' + scrollTop + 'px)';
        });
        });
        /////////////// button reject ///////////////
        var btn_reject = document.getElementById("btn_Validator_request_Reject");
        btn_reject.addEventListener("click",function(){
            // console.log("hihi");
            var request = document.getElementById("request").value
            $(document).ready(function(){
              $.post("../../BE/BE_MANAGER_REJECT.php",{request:request}, function(data){
                    // console.log(data);
                    alert(data)
                    // window.location.href = "Validator_request_list_request_manager.php";
                    // alert(data);
                    // if (data == "Successfully reject request"){
                    //     window.location.href = "";
                    // }
    
                });
            });
        })

/////////////// button send mail to validator ///////////////
var btn_send_mail = document.getElementById("btn_Validator_request_Send_Validator");
btn_send_mail.addEventListener("click",function(){
    // console.log("hihi");
    var request = document.getElementById("request").value
    var language =document.getElementById("th_language_1_9").innerHTML
    $(document).ready(function(){
        $.post("../../BE/BE_MANAGER_SEND_MAIL_VALIDATOR.php",{request:request,language:language}, function(data){
            console.log(data);
            alert(data);
            // if (data == "Successfully reject request"){
            //     window.location.href = "";
            // }

        });
    });
})




document.getElementById('btn_Validator_request_Modify_Address_and_Deadline').addEventListener('click', function() {

  // document.getElementById('input1').disabled = false;
  // document.getElementById('input2').disabled = false;
  document.getElementById('btn_Validator_request_save4').disabled = false;
  document.getElementById('btn_Validator_request_save4').classList.add('btn');


  var save4 = document.getElementById("btn_Validator_request_save4");
  save4.addEventListener("click", function(event) {
  var input_add = document.querySelectorAll("#myTable_Validator_Request_user input[type='text']");
  var mess_enter_address = document.getElementById("mess_enter_address");
  
  
  
  var isInputInvalid = false;
  input_add.forEach(function(input) {
  if (input.value === "") {
      isInputInvalid = true;
      mess_enter_address.style.display = "block";
  } else {
    mess_enter_address.style.display = "none";
    document.getElementById('btn_Validator_request_Send_Validator').disabled = false;
    // document.getElementById('btn_Validator_request_Set_Password').classList.add('btn');
    document.getElementById('btn_Validator_request_Send_Validator').style.background = "#252525";
    document.getElementById('btn_Validator_request_Send_Validator').style.border = "1px solid #D0CECE ";
    document.getElementById('btn_Validator_request_Send_Validator').style.cursor = "pointer";
    document.getElementById('btn_Validator_request_Send_Validator').style.animation = 'flashing-border 2s infinite';
  
    document.getElementById('btn_Validator_request_Send_Validator').addEventListener("click", function() {
      document.getElementById('btn_Validator_request_Send_Validator').style.animation = 'none';
    });
  
  
  }
  }
  )});
});
function show_pass_rq(id,rq){
  // console.log("duc");
  document.getElementById("txt_request").innerHTML=rq;
}