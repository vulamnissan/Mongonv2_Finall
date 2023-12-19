///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////The Function Change Page/////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*****************/ 
//CONTROL PAGE HOME
/*****************/ 
$("document").ready(function(){
  $('#startButton').click(function() {
    var page = $('#title').text();
    var type = $('#account_type').text();

    var page_value = String(page);
    var type_value = String(type);

    // DATABASE OF WORDING
    if (page_value == "Database of wording" && type_value == "user"){
      location.href = "../Database_of_wording/FE/Information about TEXT ID/Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_user.php";
    }
    else if (page_value == "Database of wording" && type_value == "manager"){
      location.href = "../Database_of_wording/FE/Information about TEXT ID/Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_manager.php";
    }
    else if (page_value == "Database of wording" && type_value == "validator"){
      alert("Pemission denied");
      location.href="../home/home.php";
    }
    else if (page_value == "Database of wording" && type_value == "translator"){
      alert("Pemission denied");
      location.href="../home/home.php";
    };

    // TRANSLATE REQUEST
    if (page_value == "Translation request" && type_value == "user" ){
      location.href = "../Translation_Request/FE/Translation_request_list_request_manager/Translation_request_list_request_user.php";
    }
    else if (page_value == "Translation request" && type_value == "manager" ){
      location.href = "../Translation_Request/FE/Translation_request_list_request_manager/Translation_request_list_request_manager.php";
    }
    else if (page_value == "Translation request" && type_value == "translator" ){
      location.href = "../Translation_Request/FE/Translation_request_list_request_manager/Translation_request_list_request_manager.php";
    }
    else if (page_value == "Translation request" && type_value == "validator" ){
      alert("Pemission denied translate request");
      location.href="../home/home.php";
    };

    // SPEC TENDER FILE EXPORT
    if (page_value == "Spec tender File Export"){
      location.href = "../Spec_tender_file_export_/Spec_tender_file_export.php";
    };

    // VALIDATOR REQUEST
    if (page_value == "Validator request" && type_value == "user"){
      location.href = "../Validator_request/FE/User/Validator_request_list_request.php";
    }
    else if (page_value == "Validator request" && type_value == "manager" ){
      location.href = "../Validator_request/FE/Manager/Validator_request_list_request_manager.php";
    }
    else if (page_value == "Validator request" && type_value == "validator" ){
      location.href = "../Validator_request/FE/Validator/Validator_request_list_request_validator.php";
    }
    else if (page_value == "Validator request" && type_value == "translator" ){
      alert("Pemission denied");
      location.href="../home/home.php";
    };

    //VEHICLE MANAGER
    if ( page_value == "Vehicle manage"){
      location.href = "../Manager_application/FE/Manage_application.php";
    };

  })
})




