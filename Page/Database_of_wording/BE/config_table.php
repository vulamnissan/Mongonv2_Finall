<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
        include "connect_database.php"
?>

<body>
<div id = "myTable_Database_of_wording"></div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
        $(document).ready(function(){
            $("#btn_filter").click(function(){        
                var filterValue = $("#filter").val();
                var type_filter = $("#type_filter").val();
                console.log(type_filter);
                $(document).ready(function(){
                    $.post("../BE/filter_textid.php", {filter_value: filterValue, type_filter: type_filter}, function(data){
                        $("#myTable_Database_of_wording").html(data);
                    });
                });
            });
        });
                $(document).ready(function(){
                    var filterValue = $("#filter").val();
                    $.post("../BE/filter_textid.php", {filter_value: filterValue}, function(data){
                        $("#myTable_Database_of_wording").html(data);
                    });
                });

    document.getElementById("btn_Information_about_TEXT_ID").addEventListener("click", function() {
        var rows = document.querySelectorAll('table#myTable_Database_of_wording > tbody > tr');
        var last_row = rows.length; //last row of table in HTML
        var last_col= 10;
        var temp = {};//object contains the information on the table after the checked
        var temp_size = 0;
        for (i = 1;i <= last_row; i++)
            {
                if ($('#' + i + 'db').is(":checked")==true)
                    {
                        var temp_size = 1;
                        var key_id=i + 'db_1';
                        var key = document.getElementById(key_id).innerHTML;
                        var temp_size = temp_size+1;
                        var id_s = String(i) + 'db_' + String(1);
                        var temp_value = document.getElementById(id_s).innerHTML;
                        temp[i] = temp_value;
                    }
            }
        $(document).ready(function(){
            $.post("../BE/object_textid_select.php", {flag: temp}, function(data){
                console.log(data);
            });
        });
    });
</script>
</html>