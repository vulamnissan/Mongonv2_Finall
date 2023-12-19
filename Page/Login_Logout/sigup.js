function togglePasswordVisibility() {
    var passwordInput = document.getElementById('pass');
    var toggleButton = document.getElementById('toggleButton');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleButton.innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
      passwordInput.type = 'password';
      toggleButton.innerHTML = '<i class="far fa-eye"></i>';
    }
  }

function togglePasswordVisibility_cf() {
    var cfpasswordInput = document.getElementById('confirm_pass');
    var toggleButton_cf = document.getElementById('toggleButton_cf');

    if (cfpasswordInput.type === 'password') {
        cfpasswordInput.type = 'text';
        toggleButton_cf.innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
        cfpasswordInput.type = 'password';
        toggleButton_cf.innerHTML = '<i class="far fa-eye"></i>';
    }

  }

// Check ID ,Pass 
$("document").ready(function(){
    $('#btn_signup2').click(function() {
      var mail = $("#email").val();
      var password = $("#pass").val();
      var passwordcf = $("#confirm_pass").val();
      var name = $("#name").val();
      var company = $("#company").val();
      var sect = $("#sect").val();
      var type_account = $("#type_acount").val();

      if (passwordcf != password)
      {
        alert("Confirm password fail !")
      }
      else 
      {
        $("document").ready(function(){
          $.post("BE/BE_sigup.php", {email : mail, pass : password, name: name, company: company, sect: sect, type_account: type_account} , function(data){
            var result = Number(data);
            if ( result === 1){
              alert("Rigister request sended to Manager ");
              location.href = "../login.php";
            }

          });
        });
      };
    });
  });