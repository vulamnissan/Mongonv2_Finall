
    var add_vehicle_btn1 = document.getElementById('btn_Manage_language_apply_vehicle_vehicle'); //vehicle
    var add_text1 = document.getElementById('btn_Manage_language_apply_vehicle_Lange'); // language
    var save_adopt1 = document.getElementById('btn_Manage_language_apply_vehicle_Save'); //save
    var add_language = document.getElementById('language_add');

    // add_vehicle_btn1.addEventListener('click', function() {
    //     add_text1.disabled = true;
    //     add_text1.classList.remove('btn');
    //     save_adopt1.addEventListener('click',function() {
    //             add_text1.disabled = false;
    //             add_text1.classList.add('btn');
    //         })
    // })

    // add_text1.addEventListener('click', function() {
    //     if (add_language.style.display !== "none"){
    //         add_vehicle_btn1.disabled = true;
    //         add_vehicle_btn1.classList.remove('btn');

    //         // save_adopt1.addEventListener('click',function() {
    //         //     add_vehicle_btn1.disabled = false;
    //         //     add_vehicle_btn1.classList.add('btn');
    //         //     });
    //     }

    //     else {
    //         add_vehicle_btn1.disabled = false;
    //         add_vehicle_btn1.classList.add('btn');
    //     }
    // })

    add_text1.addEventListener('click', function() {
        flag= document.getElementById("flag_btn").innerHTML;
        if (flag.trim()=="")
        {
            add_vehicle_btn1.disabled = true;
            add_vehicle_btn1.classList.remove('btn');
            document.getElementById("flag_btn").innerHTML="new_language";
        }
        else 
        {
            add_vehicle_btn1.disabled = false;
            add_vehicle_btn1.classList.add('btn');
            document.getElementById("flag_btn").innerHTML="";
        }
    })

    add_vehicle_btn1.addEventListener('click', function() {
        flag= document.getElementById("flag_btn").innerHTML;
        if (flag.trim()=="")
        {
            add_text1.disabled = true;
            add_text1.classList.remove('btn');
            document.getElementById("flag_btn").innerHTML="new_vehicle";
        }
        else 
        {
            add_text1.disabled = false;
            add_text1.classList.add('btn');
            document.getElementById("flag_btn").innerHTML="";
            var tb = document.getElementById("manage_language_apply_vehicle_table");
            // Remove the last rowCount number of rows
            tb.deleteRow(1);
            
        }
    })
