///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////The Function Change Page/////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//home.php

$("document").ready(function(){
  $('#startButton').click(function() {
    var page = $('#title').text();
    var type = $('#account_type').text();
    var page_value = String(page);
    var type_value = String(type);

    if (page_value == "Database of wording" && type_value == "user"){
      location.href = "../Database_of_wording/FE/Information about TEXT ID/Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_user.php";
    }
    else if (page_value == "Database of wording" && type_value == "manager"){
      location.href = "../Database_of_wording/FE/Information about TEXT ID/Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_manager.php";
    };

    if (page_value == "Translation request" && type_value == "user" ){
      location.href = "../Translation_Request/FE/Translation_request_list_request_manager/Translation_request_list_request_user.php";
    }
    else if (page_value == "Translation request" && type_value == "manager" ){
      location.href = "../Translation_Request/FE/Translation_request_list_request_manager/Translation_request_list_request_manager.php";
    }
    else if (page_value == "Translation request" && type_value == "translator" ){
      location.href = "../Translation_Request/FE/Translation_request_list_request_manager/Translation_request_list_request_manager.php";
    };

    if (page_value == "Spec tender File Export"){
      location.href = "../Spec_tender_file_export_/Spec_tender_file_export.php";
    };

    if (page_value == "Validator request" && type_value == "user"){
      location.href = "../Validator_request/FE/User/Validator_request_list_request.php";
    }
    else if (page_value == "Validator request" && type_value == "manager" ){
      location.href = "../Validator_request/FE/Manager/Validator_request_list_request_manager.php";
    }
    else if (page_value == "Validator request" && type_value == "validator" ){
      location.href = "../Validator_request/FE/Validator/Validator_request_list_request_validator.php";
    };

    if ( page_value == "Vehicle manage"){
      location.href = "";
    };


  })
})


// Translate Request
// $("document").ready(function(){
//   $('#btn_Translation_Request_Confirm_translation').click(function() {

//       location.href = "../Database_of_wording/FE/Database of wording.php";

//   })
// })

//.php


