<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
    $(document).ready(function(){
        $("#btn_Information_about_TEXT_ID_modify").click(function(){
            $("#btn_Information_about_TEXT_ID_modify").load("limit_length.php", function(responseTxt, statusTxt, jqXHR){
                if(statusTxt == "success"){
                }
                if(statusTxt == "error"){
                    alert("Error: " + jqXHR.status + " " + jqXHR.statusText);
                }
            });
        });
    });
</script>
</body>
</html>