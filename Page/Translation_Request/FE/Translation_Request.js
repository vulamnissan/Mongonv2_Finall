//sidebar hidden function--------------------------------------
function toggleSidebar() {
  var sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('open');
}
//sidebar hidden function--------------------------------------

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
//-----------------------------hidden function that shows notifications and accounts-----

///////////////////////////////////////////////////////////////////////
//All this code is just for smooth table scrolling/////////////////////
///////////////////////////////////////////////////////////////////////
window.addEventListener('load', function() {
const table = document.getElementById('myTable_Translation_Request');
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
var table = document.getElementById('myTable_Translation_Request');
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


/////////////////////////////////////////////////////////////////////////
// Hide buttons according to the correct account type/////////////////////////////
////////////////////////////////////////////////////////////////////////

var accountType = document.getElementById("account_type");
var TranModify = document.getElementById("btn_Translation_Request_Modify");
var TranSave = document.getElementById("btn_Translation_Request_save");
var TranSetPassword = document.getElementById("btn_Translation_Request_Set_Password");
var TranSetappro = document.getElementById("btn_Translation_Request_Set_Approval");
var Confirmtranslation = document.getElementById("btn_Translation_Request_Confirm_translation");
var TranSend_Approval = document.getElementById("btn_Translation_Request_Send_Approval");
var TranSet_Deadline = document.getElementById("btn_Translation_Set_Deadline");
var TranReject = document.getElementById("btn_Translation_Request_Reject");
var TranCheck_Translation = document.getElementById("btn_Translation_Request_Check_Translation");
var Send_request_to_Maruboshi = document.getElementById("btn_Translation_Request_Send_request_to_Maruboshi");
var TranHamidashi_check = document.getElementById("btn_Translation_Request_Hamidashi_check");
var TranSend_result = document.getElementById("btn_Translation_Request_Send_result");
var Wraper_table_Translation_Request_info = document.getElementById('Wraper_table_Translation_Request_info')
var Wraper_table_Translation_Request_Translator = document.getElementById('Wraper_table_Translation_Request_Translator')
var Wraper_table_Translation_Request = document.getElementById('Wraper_table_Translation_Request')
var messtran1 = document.getElementById('mess_tran');
var messtran2 = document.getElementById('mess_tran2');
var messtran3 = document.getElementById('mess_tran3');

var flag = Number(document.getElementById("choose_page").innerHTML);
var id = document.getElementById("choose_id").innerHTML;
var rq_ = document.getElementById("choose_rq").innerHTML;
if (flag == 1 ){
      Wraper_table_Translation_Request.style.display="none";
      Wraper_table_Translation_Request_info.style.display="flex";
      TranSave.style.display = "none";
      Confirmtranslation.style.display = "none";
      TranCheck_Translation.style.display="none";
      document.getElementById('btn_Translation_Request_save_translator').style.display = "none";
      $(document).ready(function()
      {
          $.get("../BE/BE_Confirm_Translation.php", {checkshow:"request",id_user:id,rq:rq_}, function(data){
          $('#Wraper_table_Translation_Request_info').html(data);
      });})
}


//open old request
Confirmtranslation.addEventListener("click", function() {
  var filter_box = document.getElementById("filter_box");
  var status = document.getElementById("Validator_Status_content");
  filter_box.style.display = "none";
  status.style.display = "none";
  if (Confirmtranslation.style.display === "" || Confirmtranslation.style.display === "block") {
    TranSetPassword.style.display = "block";
    TranSetappro.style.display = "block";
    TranSend_Approval.style.display = "block";
    TranSave.style.display = "none";
    Confirmtranslation.style.display = "none";
  } else {
    notificationList.style.display = "none";
  }
});


var filter_box = document.getElementById("filter_box");
var status_box = document.getElementById("Validator_Status_content");
if (accountType.textContent.includes("user")) {
  if (flag == 1 ){
    filter_box.style.display = "none";
    status_box.style.display = "none";
   }
  else
  {
    TranSave.style.display = "block";
    Confirmtranslation.style.display = "block";
    TranSetPassword.style.display = "none";
    TranSend_Approval.style.display = "none";
    TranSet_Deadline.style.display = "none";
    TranReject.style.display = "none";
    TranCheck_Translation.style.display = "none"
    Send_request_to_Maruboshi.style.display = "none";
    TranHamidashi_check.style.display = "none";
    TranSend_result.style.display = "none";
    messtran1.style.display = "none";
    messtran2.style.display = "none";
    messtran3.style.display = "none";
  }

}
else if (accountType.textContent.includes("manager")) {

  filter_box.style.display = "none";
  status_box.style.display = "none";
  TranSave.style.display = "none";
  TranSet_Deadline.style.display = "block";
  TranReject.style.display = "block";
  Send_request_to_Maruboshi.style.display = "block";
  document.getElementById('btn_Translation_Set_Deadline').disabled = false;
  document.getElementById('btn_Translation_Set_Deadline').classList.add('btn');
  document.getElementById('btn_Translation_Request_Reject').disabled = false;
  document.getElementById('btn_Translation_Request_Reject').classList.add('btn');
  TranCheck_Translation.style.display = "block"
  document.getElementById('btn_Translation_Request_Check_Translation').classList.add('btn');
  Wraper_table_Translation_Request_info.style.display = "flex";
  Wraper_table_Translation_Request.style.display = "none";
  messtran1.style.display = "block";
  messtran2.style.display = "none";
  messtran3.style.display = "none";



} 
else if (accountType.textContent.includes("translator")) {
  filter_box.style.display = "none";
  status_box.style.display = "none";
  TranHamidashi_check.style.display = "block";
  TranSave.style.display = "none";
  TranSend_result.style.display = "block";
  TranCheck_Translation.style.display = "none"
  messtran1.style.display = "none";
  messtran2.style.display = "block";
  messtran3.style.display = "none";
  Wraper_table_Translation_Request_Translator.style.display = "flex";
  Wraper_table_Translation_Request.style.display = "none";
  Wraper_table_Translation_Request_info.style.display = "none";
  document.getElementById('btn_Translation_Request_Hamidashi_check').disabled = false;
  document.getElementById('btn_Translation_Request_Hamidashi_check').classList.add('btn');


} 



/////////////////////////////////////////////////////////////////////////
// Hide buttons according to the correct account type/////////////////////////////
////////////////////////////////////////////////////////////////////////



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
          document.getElementById('btn_Translation_Request_save').disabled = false;
          document.getElementById('btn_Translation_Request_save').classList.add('btn');
          document.getElementById('btn_Translation_Request_Modify').disabled = false;
          document.getElementById('btn_Translation_Request_Modify').classList.add('btn');
          document.getElementById('btn_Translation_Set_Deadline').disabled = false;
          document.getElementById('btn_Translation_Set_Deadline').classList.add('btn');
          document.getElementById('btn_Translation_Request_Reject').disabled = false;
          document.getElementById('btn_Translation_Request_Reject').classList.add('btn');
          document.getElementById('btn_Translation_Request_Set_Password').disabled = false;
          document.getElementById('btn_Translation_Request_Set_Password').classList.add('btn');

      } else {
          document.getElementById('btn_Translation_Request_save').disabled = true;
          document.getElementById('btn_Translation_Request_save').classList.remove('btn');
          document.getElementById('btn_Translation_Request_Modify').disabled = true;
          document.getElementById('btn_Translation_Request_Modify').classList.remove('btn');
          document.getElementById('btn_Translation_Request_Confirm_translation').disabled = true;
          document.getElementById('btn_Translation_Request_Confirm_translation').classList.remove('btn');
          document.getElementById('btn_Translation_Request_Set_Password').disabled = true;
          document.getElementById('btn_Translation_Request_Set_Password').classList.remove('btn');
          document.getElementById('btn_Translation_Request_Set_Approval').disabled = true;
          document.getElementById('btn_Translation_Request_Set_Approval').classList.remove('btn');

          document.getElementById('btn_Translation_Request_Send_Approval').disabled = true;
          document.getElementById('btn_Translation_Request_Send_Approval').classList.remove('btn');
          document.getElementById('btn_Translation_Set_Deadline').disabled = true;
          document.getElementById('btn_Translation_Set_Deadline').classList.remove('btn');

          document.getElementById('btn_Translation_Request_Reject').disabled = true;
          document.getElementById('btn_Translation_Request_Reject').classList.remove('btn');
          document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').disabled = true;
          document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').classList.remove('btn');


          document.getElementById('btn_Translation_Request_Reject').disabled = true;
          document.getElementById('btn_Translation_Request_Reject').classList.remove('btn');
          document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').disabled = true;
          document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').classList.remove('btn');
          
          document.getElementById('btn_Translation_Request_Hamidashi_check').disabled = true;
          document.getElementById('btn_Translation_Request_Hamidashi_check').classList.remove('btn');
          document.getElementById('btn_Translation_Request_Send_result').disabled = true;
          document.getElementById('btn_Translation_Request_Send_result').classList.remove('btn');
          
          
      }
  });
});

document.getElementById('btn_Translation_Request_save').addEventListener('click', function() {
document.getElementById('btn_Translation_Request_Confirm_translation').disabled = false;
document.getElementById('btn_Translation_Request_Confirm_translation').classList.add('btn');
document.getElementById('btn_Translation_Request_Hamidashi_check').disabled = false;
document.getElementById('btn_Translation_Request_Hamidashi_check').classList.add('btn');
document.getElementById('btn_Translation_Request_Set_Password').disabled = false;
document.getElementById('btn_Translation_Request_Set_Password').classList.add('btn');
});


document.getElementById('btn_Translation_Request_Confirm_translation').addEventListener('click', function() {
// Bật nút 6 và thay đổi màu nền thành xám
document.getElementById('btn_Translation_Request_save').style.display = 'none';
document.getElementById('btn_Translation_Request_Confirm_translation').style.display = 'none';
document.getElementById('btn_Translation_Request_Set_Password').style.display = 'block';
document.getElementById('btn_Translation_Request_Set_Approval').style.display = 'block';
document.getElementById('btn_Translation_Request_Send_Approval').style.display = 'block';
});



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to set the order in which buttons are pressed/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to display popup for Set password////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

window.addEventListener('DOMContentLoaded', function() {
  var table1 = document.getElementById('myTable_Translation_Request');
  var header1 = table1.querySelector('thead');
  var headerHeight1 = header1.offsetHeight;

  table1.addEventListener('scroll', function() {
  var scrollTop = this.scrollTop;
  header1.style.transform = 'translateY(' + scrollTop + 'px)';
  });
  });
var id_= document.getElementById("choose_id").innerHTML;
var request= document.getElementById("choose_rq").innerHTML;
  function toggleModalSet_Approval10() {
      var modalContainer20 = document.getElementById("Translation_Request_Check_Translation");
      modalContainer20.classList.toggle("show");
      var path = '../../../Data/UserData/'+id_+'/'+rq_+'.json';
      path=path.replace(/ /g,"");
    fetch(path)
      .then(response => response.json())
      .then(data => {
        document.getElementById("tran_name_input").innerHTML=data['translator']['name'];
        document.getElementById("tran_sect_input").innerHTML=data['translator']['sect'];
        document.getElementById("tran_mail_input").innerHTML=data['translator']['mail'];
        document.getElementById("tran_compny_input").innerHTML=data['translator']['company'];
      })
      .catch(error => {
        console.error('Fail load json:', error);
      });
    }

    function removeModalClassSet_Approval10() {
    var modalContainer20 = document.getElementById("Translation_Request_Check_Translation");
    modalContainer20.classList.remove("show");
    }

    var Set_ApprovalButton = document.getElementById("btn_Translation_Request_Check_Translation");
    Set_ApprovalButton.addEventListener("click", toggleModalSet_Approval10);

    var buttonA20 = document.getElementById("Translation_Request_Check_Translation_cancel");
    buttonA20.addEventListener("click", removeModalClassSet_Approval10);
    var buttonb20 = document.getElementById("Translation_Request_Check_Translation_ok");
    buttonb20.addEventListener("click", save_change_tran);

    var td_name_tran=document.getElementById("tran_name_input");
    var td_mail_tran=document.getElementById("tran_mail_input");
    var td_sect_tran=document.getElementById("tran_sect_input");
    var td_company_tran=document.getElementById("tran_compny_input");

    var id_= document.getElementById("choose_id").innerHTML;
    var request= document.getElementById("choose_rq").innerHTML;

    var btn_edit_tran=document.getElementById("Translation_Request_Check_Translation_Eddit");
    btn_edit_tran.addEventListener("click", edit_tran);
    function edit_tran()
    {
      td_name_tran.contentEditable="true";
      td_mail_tran.contentEditable="true";
      td_sect_tran.contentEditable="true";
      td_company_tran.contentEditable="true";
    }

    function save_change_tran()
    {
      if (td_company_tran.innerHTML!="" || td_mail_tran.innerHTML!="" || td_name_tran.innerHTML !="" || td_sect_tran.innerHTML!="")
      {
        $(document).ready(function(){
        $.post("../BE/Manager_check_translator.php", {id:id_,rq:request,name:td_name_tran.innerHTML,sect:td_sect_tran.innerHTML,mail:td_mail_tran.innerHTML,com:td_company_tran.innerHTML}, function(data){
            alert (data);
            if (data=="Change Translator Complete")
            {
              removeModalClassSet_Approval10();
            }
          });
        });
      }
      else
      {
        alert("Please provide complete information.");
      }
  
    }