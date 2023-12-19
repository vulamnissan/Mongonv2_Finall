

// ================== button set password OK============================
    
    var btn_ok_password = document.getElementById("Translation_Request_Set_password_ok");
    btn_ok_password.addEventListener("click",function(){
      var pw= $("#create_pass").val();
      var confirm_pw=$("#conf_pass").val();
      var confirm_pw=$("#conf_pass").val();
      var link = document.getElementById("link_file_json").innerHTML;
      if (pw===confirm_pw)
      {
        $(document).ready(function(){
        $.get("../BE/Save_pass.php", {pass:pw,link_file:link}, function(data){
            alert(data);
        });
        });
        document.getElementById('btn_Translation_Request_Set_Approval').disabled = false;
        document.getElementById('btn_Translation_Request_Set_Approval').classList.add('btn');
      }
    })

// ================== button show set approval ========================
    var btn_set_approval = document.getElementById("btn_Translation_Request_Set_Approval");
    btn_set_approval.addEventListener("click",function(){
        var link = document.getElementById("link_file_json").innerHTML;

        $(document).ready(function(){
            $.post("../BE/Save_set_approval.php", {check:"show_name_creator",link_file:link}, function(data){
                $('#name_creator').html(data);
            });
            $.post("../BE/Save_set_approval.php", {check:"show_sect_creator",link_file:link}, function(data){
                $('#sect_creator').html(data);
            });
            $.post("../BE/Save_set_approval.php", {check:"show_mail_creator",link_file:link}, function(data){
                $('#mail_creator').html(data);
            });
            $.post("../BE/Save_set_approval.php", {check:"show_company_creator",link_file:link}, function(data){
                $('#company_creator').html(data);
            });
        });
    })   
       
// ================== button set approval OK===========================
    var btn_ok_approval = document.getElementById("Translation_Request_Set_Approval_ok");
    btn_ok_approval.addEventListener("click",function()
        {
            var link = document.getElementById("link_file_json").innerHTML;
            var name_translator = $("#name_translator").val();
            var sect_translator = $("#sect_translator").val();
            var mail_translator = $("#mail_translator").val();
            var company_translator= $("#company_translator").val();
            var name_mrg = $("#name_mrg").val();
            var sect_mrg = $("#sect_mrg").val();
            var mail_mrg = $("#mail_mrg").val();
            var company_mrg = $("#company_mrg").val(); 

            if (name_translator !=="" && sect_translator !=="" && mail_translator !== "" && company_mrg !=="" && name_mrg !=="" && sect_mrg !=="" && mail_mrg !=="" && company_translator !=="")
                {
                    $(document).ready(function(){
                    $.post("../BE/Save_set_approval.php", {check:"ok",name_tran:name_translator,sect_tran:sect_translator,mail_tran:mail_translator,com_tran:company_translator,
                                                            name_m:name_mrg,sect_m:sect_mrg,mail_m:mail_mrg,com_m:company_mrg,link_file:link}, function(data)
                                                                {
                                                                    alert(data);
                                                                });
                                                });
                                                document.getElementById('btn_Translation_Request_Send_Approval').disabled = false;
                                                document.getElementById('btn_Translation_Request_Send_Approval').classList.add('btn');
                }
            })

    // ================== button set deadline OK===========================
    var btn_ok_deadline = document.getElementById("Translation_Request_Set_dealine_ok");
    btn_ok_deadline.addEventListener("click",function(){
    var set_deadline= ($("#Translation_Request_set_deadline").val());
    var id_= document.getElementById("choose_id").innerHTML;
    var request= document.getElementById("choose_rq").innerHTML;
    if (set_deadline !=="")
    {
        $(document).ready(function(){
        $.get("../BE/Save_deadline.php", {deadline:set_deadline,id:id_,rq:request}, function(data){
            alert(data);
            if (data =="Set deadline successfully")
            {
                
                document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').disabled = false;
                document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').classList.add('btn');
            }
        });
        });
    }
    })

    //================ button reject =================================
    var btn_reject = document.getElementById("btn_Translation_Request_Reject");
    var TranSet_Deadline = document.getElementById("btn_Translation_Set_Deadline");
    var TranReject = document.getElementById("btn_Translation_Request_Reject");
    var TranCheck_Translation = document.getElementById("btn_Translation_Request_Check_Translation");
    btn_reject.addEventListener("click",function(){
        var id_= document.getElementById("choose_id").innerHTML;
        var request= document.getElementById("choose_rq").innerHTML;
        $(document).ready(function(){
        $.get("../BE/Reject_request.php", {id:id_,rq:request}, function(data){
            alert(data);
            if (data =="Successfully reject request")
            {
                document.getElementById('btn_Translation_Set_Deadline').disabled = true;
                document.getElementById('btn_Translation_Set_Deadline').classList.remove('btn');
                document.getElementById('btn_Translation_Request_Reject').disabled = true;
                document.getElementById('btn_Translation_Request_Reject').classList.remove('btn');
                document.getElementById('btn_Translation_Request_Check_Translation').disabled = true;
                document.getElementById('btn_Translation_Request_Check_Translation').classList.remove('btn');
                document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').disabled = true;
                document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').classList.remove('btn');
            }
        });
        });
    })

    //============= button send mail translator to manager===================
    var btn_send_tr = document.getElementById("btn_Translation_Request_Send_Approval");
    btn_send_tr.addEventListener("click",function(){
        var link = document.getElementById("link_file_json").innerHTML;
        $(document).ready(function(){
        $.post("../BE/Send_mail_translate_request.php", {link_file:link}, function(data){
            alert (data);
        });
        });
    })
    
    //========== button send mail maruboshi ==================================
    var Send_request_to_Maruboshi = document.getElementById("btn_Translation_Request_Send_request_to_Maruboshi");
    Send_request_to_Maruboshi.addEventListener("click",function(){
        var id_= document.getElementById("choose_id").innerHTML;
        var request= document.getElementById("choose_rq").innerHTML;
        $(document).ready(function(){
        $.post("../BE/Send_mail_Maruboshi.php", {id:id_,rq:request}, function(data){
            alert(data);
            if (data != "Fail to send mail")
            {
                document.getElementById('btn_Translation_Set_Deadline').disabled = true;
                document.getElementById('btn_Translation_Set_Deadline').classList.remove('btn');
                document.getElementById('btn_Translation_Request_Reject').disabled = true;
                document.getElementById('btn_Translation_Request_Reject').classList.remove('btn');
                document.getElementById('btn_Translation_Request_Check_Translation').disabled = true;
                document.getElementById('btn_Translation_Request_Check_Translation').classList.remove('btn');
                document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').disabled = true;
                document.getElementById('btn_Translation_Request_Send_request_to_Maruboshi').classList.remove('btn');
            }
        });
        });
    })

// ==================user authorization================================
    var accountType = document.getElementById("account_type");
    var flag =Number( document.getElementById("choose_page").innerHTML);
    var btn_filter = document.getElementById("btn_filter");

    // ===FILTER===
    var filter_text = document.getElementById("filter_text");
    btn_filter.addEventListener("click",function(){
        var filter_value =filter_text.value;
        var select_element = document.getElementById("filter_select");
        var select_value = select_element.options[select_element.selectedIndex].text;
        var select_value = select_value.trim();

        if (accountType.textContent.includes("user")) 
        {
            if (flag != 1)
            {
                $(document).ready(function()
                {
                    $.get("../BE/BE_Translation_Request_filter.php", {filter_val:filter_value, select_val:select_value}, function(data){
                    $('#Wraper_table_Translation_Request').html(data);
                });
                document.getElementById('btn_Translation_Request_save').disabled = false;
                document.getElementById('btn_Translation_Request_save').classList.add('btn');
                document.getElementById('btn_Translation_Request_save_translator').style.display = "none";
            });
            }
            else
            {
                //Nothing
            }
        }
    })


    if (accountType.textContent.includes("user")) 
    {
        if (flag != 1)
        {
            $(document).ready(function()
            {
                $.get("../BE/BE_Translation_Request.php", {}, function(data){
                $('#Wraper_table_Translation_Request').html(data);
            });
            document.getElementById('btn_Translation_Request_save').disabled = false;
            document.getElementById('btn_Translation_Request_save').classList.add('btn');
            document.getElementById('btn_Translation_Request_save_translator').style.display = "none";
        });
        }
        else
        {
            //Nothing
        }
    }
    var id_ = document.getElementById("choose_id").innerHTML;
    var rq_ = document.getElementById("choose_rq").innerHTML;
    if (accountType.textContent.includes("manager")) {
        $(document).ready(function()
        {
            $.get("../BE/BE_Confirm_Translation.php", {checkshow:"request",id_user:id_,rq:rq_}, function(data){
            $('#Wraper_table_Translation_Request_info').html(data);
        });
        document.getElementById('btn_Translation_Request_save_translator').style.display = "none";
        });
    } 
    if (accountType.textContent.includes("translator")) {   
        $(document).ready(function()
        {
            
            $.get("../BE/Translator_translation.php", {checkshow:"request",id_user:id_,rq:rq_}, function(data){
            $('#Wraper_table_Translation_Request_Translator').html(data);
        });
        
    });
    } 
    
    //========== button save translator ==================================
    var btn_save_translaor=document.getElementById("btn_Translation_Request_save_translator");
    btn_save_translaor.addEventListener("click",function(){
        var table = document.getElementById('myTable_Translation_Request_info');
        var last_row = table.rows.length;
        var last_col = table.rows[0].cells.length
        var path = '../../../Data/UserData/'+id_+'/'+rq_+'.json';
        path=path.replace(/ /g,"");
        // console.log(path);
        fetch(path)
        .then(response => response.json())
        .then(data => {
          for (i=1;i<=last_row-1;i++)
          {
            for(j=9;j<=last_col;j++)
            {
                var id_cell = String("td_language_"+String(i)+"_"+String(j));
                var id_txt = String("td_textid_"+String(i)+"_2");
                var id_language =String("th_language_1_"+String(j))
                var value_td = (document.getElementById(id_cell).innerHTML);
                var value_th = (document.getElementById(id_language).innerHTML);
                var value_txt = (document.getElementById(id_txt).innerHTML);
                data['translation_request'][value_txt]['language'][value_th]['content']=value_td;
        }
      }
      $(document).ready(function()
      {
          $.post("../BE/Translator_save_json.php?", {link:path,content:data}, function(data){
            alert(data);
      });
  });

      
    })
    .catch(error => {
      console.error('fail load json:', error);
    });
});
//========== button  translator send mail==================================
var btn_translator_send_mail=document.getElementById("btn_Translation_Request_Send_result");
btn_translator_send_mail.addEventListener("click",function(){

    //=======save file json =====

    var table = document.getElementById('myTable_Translation_Request_info');
    var last_row = table.rows.length;
    var last_col = table.rows[0].cells.length
    var path = '../../../Data/UserData/'+id_+'/'+rq_+'.json';
    path=path.replace(/ /g,"");
    // console.log(path);
    fetch(path)
    .then(response => response.json())
    .then(data => {
      for (i=1;i<=last_row-1;i++)
      {
        for(j=9;j<=last_col;j++)
        {
            var id_cell = String("td_language_"+String(i)+"_"+String(j));
            var id_txt = String("td_textid_"+String(i)+"_2");
            var id_language = String("th_language_1_"+String(j))
            var value_td = ((document.getElementById(id_cell).innerHTML));
            var value_th = (document.getElementById(id_language).innerHTML);
            var value_txt = (document.getElementById(id_txt).innerHTML);
            data['translation_request'][value_txt]['language'][value_th]['content']=value_td;
    }
  }
    $(document).ready(function()
    {
        $.post("../BE/Translator_save_json.php?", {link:path,content:data}, function(data){
            // alert(data);
    });
    });

    
    })
    .catch(error => {
    console.error('fail load json:', error);
    });
    //============
    $(document).ready(function()
      {
          $.post("../BE/Translator_send_mail.php?", {id:id_,rq:rq_}, function(data){
            alert(data);
      });
  });
});

//HAMIDAHI CHECK + SPELLING CHECK
var TranHamidashi_check = document.getElementById("btn_Translation_Request_Hamidashi_check");
var TranSend_result = document.getElementById("btn_Translation_Request_Send_result");
var Text_trans = document.getElementsByClassName("text_trans");
var language_trans = document.getElementsByClassName("language_trans");

TranHamidashi_check.addEventListener("click",function(){
    //=======save file json =====

    var table = document.getElementById('myTable_Translation_Request_info');
    var last_row = table.rows.length;
    var last_col = table.rows[0].cells.length
    var path = '../../../Data/UserData/'+id_+'/'+rq_+'.json';
    path=path.replace(/ /g,"");
    // console.log(path);
    fetch(path)
    .then(response => response.json())
    .then(data => {
    for (i=1;i<=last_row-1;i++)
    {
        for(j=9;j<=last_col;j++)
        {
            var id_cell = String("td_language_"+String(i)+"_"+String(j));
            var id_txt = String("td_textid_"+String(i)+"_2");
            var id_language =String("th_language_1_"+String(j))
            var value_td = (document.getElementById(id_cell).innerHTML);
            var value_th = (document.getElementById(id_language).innerHTML);
            var value_txt = (document.getElementById(id_txt).innerHTML);
            data['translation_request'][value_txt]['language'][value_th]['content']=value_td;
    }
    }
    $(document).ready(function()
    {
        $.post("../BE/Translator_save_json.php?", {link:path,content:data}, function(data){
            // alert(data);
    });
    });

    
    })
    .catch(error => {
    console.error('fail load json:', error);
    });
    //============
    var table = document.getElementById('myTable_Translation_Request_info');
    var last_row = table.rows.length;
    var last_col = table.rows[0].cells.length;
    arr_data=[];
    for (i = 1 ; i<last_row ; i++)
    {
        for (j=9 ;j<=last_col; j++)
        {
            arr_sub=[];
            var display_type=document.getElementById("td_displaytype_"+i+"_4").innerHTML;
            var language=document.getElementById("th_language_1_"+j).innerHTML;
            var content =document.getElementById("td_language_"+i+"_"+j).innerHTML;
            var text_id =document.getElementById("td_textid_"+i+"_2").innerHTML;
            arr_sub.push(display_type.trim());
            arr_sub.push(language.trim());
            arr_sub.push(content.trim());
            arr_sub.push(text_id.trim());
            arr_data.push(arr_sub);

        }
    }
    //console.log(arr_data);
    $(document).ready(function(){
        $.post("../BE/hamidashi_translator.php", {arr_data:arr_data},function(data){
            console.log(data);
            ubound_data=data.length;
            count = 1;
            for (i = 1 ; i<last_row ; i++)
            {
                for (j=9 ;j<=last_col; j++)
                {
                    var content =document.getElementById("td_language_"+i+"_"+j);
                    // console.log(data[count]);
                    if (String(content.classList) !== 'gray'){
                        if (data[count] == "OK")
                        {
                            content.classList.remove('blank');
                            content.classList.remove('NG');
                            content.classList.add('OK');
                        }
                        else if (data[count] == "NoneText")
                        {
                            content.classList.add('blank');
                            content.classList.remove('OK');
                            content.classList.remove('NG');
                        }
                        else
                        {
                            content.classList.add('NG');
                            content.classList.remove('blank');
                            content.classList.remove('OK');
                        }
                    }
                    count = count +1;
                }
            }
            
            var elements1 = document.getElementsByClassName('NG');
            var elements2 = document.getElementsByClassName('blank');

            var count1 = elements1.length;
            var count2 = elements2.length;
            console.log(count);
            if (count1 === 0 && count2===0)
            {
                TranSend_result.disabled = false;
                TranSend_result.classList.add('btn');
            }
            else
            {
                TranSend_result.disabled = "disabled";
                TranSend_result.classList.remove('btn');
            }
            alert("Hamidashi check done");
        },"json")
    });
});
//CHECK DEADLINE
var deadline = document.getElementById("Translation_Request_set_deadline");
deadline.addEventListener("change",function(){
    var now_date = Date.now();
    var deadline_day = deadline.value;
    const dateObj = new Date(now_date);
    const day = dateObj.getDate();
    const month = dateObj.getMonth() + 1;
    const year = dateObj.getFullYear();
    const formattedDate = `${year}-${month < 10 ? '0' + month : month}-${day < 10 ? '0' + day : day}`;
    if(deadline_day<formattedDate){
        alert("Please set dealine again ! (Deadline is before today )");
        deadline.value = "";
    }
})
