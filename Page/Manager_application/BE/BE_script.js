

// disable all select 
    var selectElements = document.querySelectorAll('.class_select_en'); // Lấy tất cả các thẻ select
    for (var i = 0; i < selectElements.length; i++) {
        selectElements[i].disabled = true;
    }
//=============================

// ========== enable Checkbox===============
    var table1 = document.getElementById('manage_language_apply_vehicle_table');
    var last_row = table1.rows.length;
    var last_col = table1.rows[0].cells.length
    console.log(last_col);
    function check_vehicle(value)
    {
        var row = value.split("_")[1];
        if ($('#'+value).is(":checked")==true)
        {
            for (i=5;i<last_col;i++)
            {
                document.getElementById('select_'+row+'_'+i).disabled = false;
            }
        }
        else
        {
            for (i=5;i<last_col;i++)
            {
                document.getElementById('select_'+row+'_'+i).disabled = true;
            }
        }
    };  
// ===================================

//================ Button Save =========================
var new_language;
var new_vehicle;
var button_save = document.getElementById('btn_Manage_language_apply_vehicle_Save');
button_save.addEventListener("click",function()
{
    arr_data={};
    for(i=1 ; i<last_row;i++)
    {
        vehicle=document.getElementById("td_veh_"+i+"_2").innerHTML;
        base=document.getElementById("td_base_"+i+"_3").innerHTML;
        meter=document.getElementById("td_meter_"+i+"_4").innerHTML;
 
        if ($('#cb_'+i+'_1').is(":checked")==true)
        {
            check="1";
        }
        else
        {
            check = "0";
        }  
        if (check =="1")
        {
            arr_data[vehicle]={};
            arr_data[vehicle]['check']=check;
            arr_data[vehicle]['base']=base;
            arr_data[vehicle]['meter']=meter;
            arr_data[vehicle]['language']={};
            arr_data[vehicle]['language']['Japanese']=document.getElementById("select_"+i+"_5").value;
            arr_data[vehicle]['language']['US_English']=document.getElementById("select_"+i+"_6").value;
            for (j=7; j<last_col;j++)
            {       
                language=document.getElementById("th_0_"+j).innerHTML;
                selectElement = document.getElementById("select_"+i+"_"+j).value;
                arr_data[vehicle]['language'][language]=selectElement;
            }
            // Check new langguage
            var language_add=document.getElementById("1").value;
            if (language_add!="")
            {
                selectElement1 = document.getElementById("select_"+i+"_0").value;
                arr_data[vehicle]['language'][language_add]=selectElement1;
                // new_language=language_add;
            }
            else
            {
                // new_language="";
            }
        }
    }
    try
    {
    new_vehicle=document.querySelector(".text_vehicle_name").value;
    new_vehicle=new_vehicle.trim();
    if (new_vehicle =="") 
    {
        //nothing
    }
    else
    {

        if ($('#cb_new_vehicle').is(":checked")==true)
        {
            check="1";
        }
        else
        {
            check = "0";
        }
        if (check == "1")
        {
            arr_data[new_vehicle]={};
            arr_data[new_vehicle]['check']=check;
            arr_data[new_vehicle]['base']=document.querySelector('.select_base').value;
            arr_data[new_vehicle]['meter']=document.querySelector('.text_meter_type').value;
            arr_data[new_vehicle]['language']={};
            
            var arr_value_vehicle = document.querySelectorAll('.select_value_base');
            arr_data[new_vehicle]['language']['Japanese']=arr_value_vehicle[0].value;
            arr_data[new_vehicle]['language']['US_English']=arr_value_vehicle[1].value;
            // console.log(arr_value_vehicle.length);
            for (var i = 2; i < arr_value_vehicle.length; i++) {
                var value_vehicle = arr_value_vehicle[i].value;
                language=document.getElementById("th_0_"+(i+5)).innerHTML;
                arr_data[new_vehicle]['language'][language]=value_vehicle;
            }
            new_language="";
        }
    }}
    catch
    {
        //nothing
    }

// Ajax SAVE DATABASE

    if (typeof new_vehicle !== "undefined") //  THERE IS NEW VEHICLE 
    {
        $(document).ready(function()
        {
            $.post("../BE/Check_vehicle_exits.php", {new_veh:new_vehicle}, function(data){
                if (data =="OK") // VEHICLE EXITS
                {   
                    alert("Vehicle '" + new_vehicle + "' already exists ") 
                    
                }
                else 
                {
                    $(document).ready(function()
                    {
                        $.post("../BE/Insert_DB.php", {arr:arr_data,new_lan:language_add}, function(data){
                            alert(data);
                            // Set time delay
                            var delayInMilliseconds = 3000; //2 second
                            setTimeout(function() {
                            //your code to be executed after 2 second
                            }, delayInMilliseconds);
                            if (data.trim() =="Save successfully")
                            {
                                location.reload();
                            }
                        });
                    });
                    
                }
            });
        })
    }
    else //THERE ISN'T NEW VEHICLE 
    {
        $(document).ready(function()
        {
            $.post("../BE/Insert_DB.php", {arr:arr_data,new_lan:language_add}, function(data){
                alert(data);
                // Set time delay
                var delayInMilliseconds = 3000; //2 second
                setTimeout(function() {
                //your code to be executed after 2 second
                }, delayInMilliseconds);
                if (data.trim() =="Save successfully")
                {
                    location.reload();
                }
            });
        });
    }
})
//===================================================
var add_language = document.getElementsByClassName('add_lang')
var add_language_button = document.getElementById('btn_Manage_language_apply_vehicle_Lange')

add_language_button.addEventListener("click",function(){
    for (i=0 ; i< add_language.length ; i++){
        add_language[i].disabled = "";
        } 
    })