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
    window.location.href = url;
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

// -----------------------------hidden function that shows notifications and accounts------------- 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////The function to disable the functions is the account type that is not accessible/////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var divs = document.querySelectorAll('#home_function > div.box');
var accountType = document.getElementById('account_type');

if (accountType.textContent === 'User') {
  for (var i = 0; i < divs.length; i++) {
    if (divs[i].id !== 'Database_of_wording' && divs[i].id !== 'Spec_tender_File_Export' && divs[i].id !== 'Translation_request' && divs[i].id !== 'Validator_request' && divs[i].id !== 'Vehicle_manage') {
      divs[i].style.pointerEvents = 'none';
      divs[i].classList.add('disabled'); 
      divs[i].style.color = '#444444';   
    }
  }
} 
else if (accountType.textContent === 'Manager') {
  for (var i = 0; i < divs.length; i++) {
    divs[i].style.pointerEvents = 'auto';
    divs[i].classList.remove('disabled'); 
  }
} 

if (accountType.textContent === 'Validator') {
  var home_function = document.getElementById('home_function');
  var home_container = document.getElementById('home_container');
  var viewbox = document.getElementById('viewbox');
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
  var viewbox = document.getElementById('viewbox');
  var validatorRequestDiv = document.getElementById('Translation_request');
  var validatorRequestTitle = validatorRequestDiv.innerText;
  var validatorRequestDescription = 'translator';

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









//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Function to display popup for Meter Display type//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function toggleModal() {                                                                          
  var modalContainer = document.getElementById("Information_about_TEXT_ID_Meter_Display_type");
  modalContainer.classList.toggle("show");
}

function removeModalClass() {
  var modalContainer = document.getElementById("Information_about_TEXT_ID_Meter_Display_type");
  modalContainer.classList.remove("show");
}

var modifyButton = document.getElementById("btn_table_Spec_tender_file_export_Select_language");
modifyButton.addEventListener("click", toggleModal);

var buttonA = document.getElementById("Meter_Display_type_cancel");
buttonA.addEventListener("click", removeModalClass);

var buttonB = document.getElementById("Meter_Display_type_ok");
buttonB.addEventListener("click", removeModalClass);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Select file input//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



document.addEventListener('DOMContentLoaded', function() {

  var fileSelect = document.getElementById('btn_table_Spec_tender_file_export_Select_wording_list');

  var fileInput = document.getElementById('fileInput');




  fileSelect.addEventListener('click', function() {

    fileInput.click();

  });



  fileInput.addEventListener('change', function() {

    var selectedFile = fileInput.files[0];

    var fileDisplay = document.getElementById('btn_table_Spec_tender_file_export_Select_wording_list_display');

    fileDisplay.innerHTML = selectedFile ? selectedFile.name : '';

  });

});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Select language //////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var text_display = document.getElementById('btn_table_Spec_tender_file_export_Select_language_display');
var language_display = document.getElementById('language_display');
// var link = "update_to_the_spec_file/Spec_tender_table.php?language=";
var link="";
/////checkbox////
  buttonB.addEventListener("click",function(){
     link = "update_to_the_spec_file/Update_Spec_tender_file_export.php?language=";
    var arr_language = "";

    // link ="";
    for (let i = 5; i <= 33; i++) {
      if (document.getElementById(i).checked){
        language_display.style.display='flex'
        text_display.style.display='none'
        document.getElementById("language_display_"+i).style.display='flex'
        // language.push(document.getElementById("language_display_"+i).innerHTML);
        link = link + document.getElementById("language_display_"+i).innerHTML + "_0_";
        arr_language=arr_language +  document.getElementById("language_display_"+i).innerHTML + "_0_";
      }
      else{
        document.getElementById("language_display_" +i).style.display='none';
      }
    }
  });

  
  document.getElementById("btn_Spec_tender_file_export_Start_comparison").addEventListener("click", function() {
    var check_ouput_version_number = document.getElementById("btn_table_Spec_tender_file_export_Output_version_number_input");
    var check_select_language = document.getElementById('btn_table_Spec_tender_file_export_Select_language_display');

    var check_select_project = document.getElementById('select_project');
    let select_project = check_select_project.options[check_select_project.selectedIndex].text;

    if (check_ouput_version_number.value != "" && link != "" && select_project != "Select Car" ){
      link = link + "_@_" + check_ouput_version_number.value + "_@_" + select_project ;
      window.location.href = link;
    }
  });
  



