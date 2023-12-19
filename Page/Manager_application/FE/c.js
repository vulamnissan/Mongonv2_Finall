//code prevents adding vehicle and textid at the same time
  document.getElementById('btn_Manage_adopt_of_wording_add').addEventListener('click', function() {
    document.getElementById('btn_Manage_adopt_of_wording_Save').disabled = false;
    document.getElementById('btn_Manage_adopt_of_wording_Save').classList.add('btn');
  });
  
  document.getElementById('btn_Manage_adopt_of_wording_add_vehicle').addEventListener('click', function() {

    document.getElementById('btn_Manage_adopt_of_wording_Save').disabled = false;
    document.getElementById('btn_Manage_adopt_of_wording_Save').classList.add('btn');
  });
  

  var add_vehicle_btn = document.getElementById('btn_Manage_adopt_of_wording_add_vehicle');
  var add_text = document.getElementById('btn_Manage_adopt_of_wording_add');
  var save_adopt = document.getElementById('btn_Manage_adopt_of_wording_Save');

  add_vehicle_btn.addEventListener('click', function() {
    add_text.disabled = true;
    add_text.classList.remove('btn');
        save_adopt.addEventListener('click',function() {
            add_text.disabled = false;
            add_text.classList.add('btn');
        })
  })

  add_text.addEventListener('click', function() {
    add_vehicle_btn.disabled = true;
    add_vehicle_btn.classList.remove('btn');
        save_adopt.addEventListener('click',function() {
            add_vehicle_btn.disabled = false;
            add_vehicle_btn.classList.add('btn');
        })
  })
  //code prevents adding vehicle and textid at the same time