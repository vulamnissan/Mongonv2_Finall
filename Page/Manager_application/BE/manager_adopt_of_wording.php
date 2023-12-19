<table id = "manage_adopt_of_wording_table">

<?php
    $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
    $qr= new Query("mongonv2");

    function get_textid_vehicle($qr,$db)
    {
        $result= $qr->select_data($db,"textid_vehicle");
        if (!$result)
            {
                die ('Query is wrong');
            }
        else
            {
                $textid_vehicle_data=[];
                while ($row = mysqli_fetch_assoc($result))
                    {
                        $data_key = array_keys($row);
                        $textid_vehicle_data[$row[$data_key[0]]] =[];
                        for($i = 1; $i < count($data_key); $i++){
                            $textid_vehicle_data[$row[$data_key[0]]][$data_key[$i]] = $row[$data_key[$i]];
                        }
                    }
            }
        return $textid_vehicle_data;
    }
    function get_vehicle_language($qr,$db)
        {
            $result= $qr->select_data($db,"vehicle_language");
            if (!$result)
                {
                    die ('Query is wrong');
                }
            else
                {
                    //nothing to do
                }
            $vehicle_language_data=[];
            while ($row = mysqli_fetch_assoc($result))
                {   
                    $data_vehicle_language_key = array_keys($row);
                    $vehicle_language_data[$row[$data_vehicle_language_key[0]]] =[];
                    for($i = 1; $i < count($data_vehicle_language_key); $i++){
                        $vehicle_language_data[$row[$data_vehicle_language_key[0]]][$data_vehicle_language_key[$i]] = $row[$data_vehicle_language_key[$i]];
                    }
                }

            return $vehicle_language_data;
        }

    $vehicle_language_data = get_vehicle_language($qr,$db);
    $vehicle_language_data_value = array_values($vehicle_language_data);
    $vehicle_language_data_key = array_keys($vehicle_language_data);

    $textid_vehicle_data = get_textid_vehicle($qr,$db);
    $textid_vehicle_data_value = array_values($textid_vehicle_data);
    $textid_vehicle_data_key = array_keys($textid_vehicle_data);
    echo "<thead>";
    echo "<tr>";
    echo "<th id=\"th_check\" rowspan=\"2\" >CK</th>";
    echo "<th id='th_textid2' rowspan='2' >Text_ID</th>";
    echo "<th id='vehicle_add' class='add_language1'  ><input id='2' type='text' placeholder='New vehicle' ></th>";
    for($i = 1; $i <= count($vehicle_language_data);$i++){
        echo "<th class='th_width' id='th$i'>" . $vehicle_language_data[$i]['Vehicle'] . "</th>"; 
    }
    echo "</tr>";
    echo "<tr>";
    echo "<th  id=\"meter_add\" class=\"add_language1\"  ><input id=\"3\" type=\"text\" placeholder=\"New meter\" ></th>";
   
    for($i = 1; $i <= count($vehicle_language_data);$i++){
        echo "<th class='th_width'>" . $vehicle_language_data[$i]['meter_type'] . "</th>"; 
    }
    echo "</tr>";
    echo "</thead>";

    echo "<tbody>";
    $count_row=1;
    for($i = 0;$i < count($textid_vehicle_data_value);$i++){
        $count_col=1;
        echo "<tr>";
        echo "<td class=\"adopt1\" ><input id='check_".$count_row."' type=\"checkbox\" class=\"checkbox_Active\"  onchange='cb_selcet_1(this.id)'></td>";
        echo "<td class=\"adopt2\"  id='".$count_row."_".$count_col."'>" . $textid_vehicle_data_key[$i] . "</td>";
        echo "<td  class='add_language1'><select class='class_select '><option selected>O</option><option selected>X</option></td>";
        foreach($textid_vehicle_data_value[$i] as $key => $value)
            { 
                $count_col=$count_col+1;
                echo "<td>";
                echo "<select  id='select_after".$count_row."_".$count_col."' class='class_select class_select_en_adopt'>";
                if ($value== "1")
                {
                    echo "<option selected>O</option>";
                    echo "<option >X</option>";
                }
                else
                {
                    echo "<option >O</option>";
                    echo "<option selected>X</option>";
                }
            
                echo "</select>";
                echo "</td>";
            }

        echo "</tr>";
        $count_row=$count_row+1;
    }
    echo "</tbody>";


?>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var button_save = document.getElementById('btn_Manage_adopt_of_wording_Save')//Save table after changed
button_save.addEventListener("click",function(){
    var rows = document.querySelectorAll('table#manage_adopt_of_wording_table > tbody > tr')
    var last_row = rows.length
    var tableElement = document.getElementById("manage_adopt_of_wording_table")
    var add_col_vehicle = document.getElementById("2").value
    var add_col_meter = document.getElementById("3").value
    var rows = tableElement.getElementsByTagName("tr")
    var lastColumnValues = []
    var isEmpty = true;

    var textid_new = document.querySelectorAll('td.adopt2 > input')
    arr_data={}
    //UPDATE ROW IN TABLE HTML
    for (var i = 0; i < rows.length - 2; i++) {
        var cells = rows[i+2].getElementsByTagName("td")
        break
    }
    last_col = cells.length;
    for( var i=1 ; i<last_row;i++)
        {
            textid = document.getElementById(i+"_1").innerHTML
            arr_data[textid]={};
            if ($('#check_'+i).is(":checked")==true)
                {
                    check="1"
                }
            else
                {
                    check = "0"
                }
            if(check == 1){
                arr_data[textid]['check']=check
                console.log(last_col)
                for (j=1; j<last_col-2;j++)
                    {       
                        var vehicle=document.getElementById("th" + j).innerHTML
                        var selectElement = document.getElementById("select_after"+i+"_"+(j+1)).value
                        if(selectElement === 'X'){
                            selectElement = "0"
                        }
                        if(selectElement === 'O'){
                            selectElement = "1"
                        }
                        arr_data[textid][vehicle]=selectElement
                    }
            }
        }

    if(textid_new.length ==! 0)
        {
            var check_1 = document.querySelectorAll('select.class_select_new')
            var th_add = document.querySelectorAll('th#vehicle_add')
            var textid_new = document.querySelectorAll('td.adopt2 > input')
            temp_textid_new = textid_new[0].value
            temp_check = check_1[0].value
                for(t = 0; t < textid_new.length; t++){
                    temp_textid_new = textid_new[t].value
                    arr_data[temp_textid_new] = {}

                    if ($('#cb_new_textid').is(":checked")==true) //checked checkbox
                        {
                            check="1"
                        }
                    else
                        {
                            check = "0"
                        } 
                    if(check == 1){
                        arr_data[temp_textid_new]['check']=check
                        for(i = 0; i < check_1.length; i++){
                            var vehicle=document.getElementById("th" + (i+1)).innerHTML
                            if(check_1[i].value === 'X'){
                                value_up = "0"
                            }
                            if(check_1[i].value === 'O'){
                                value_up = "1"
                            }
                            arr_data[temp_textid_new][vehicle]=value_up
                        }
                    }
                }
        }


    for (var key in arr_data) 
        {
            if (Object.keys(arr_data[key]).length !== 0) 
                {
                    isEmpty = false;
                    break;
                }
        }
    if (isEmpty) 
        {
                //nothing
        } 

    else {
        $(document).ready(function(){
            $.post("../BE/update_db.php", {object_data: arr_data}, function(data){
                alert(data)
                // Set time delay
                var delayInMilliseconds = 3000; //2 second
                setTimeout(function() {
                //your code to be executed after 2 second
                }, delayInMilliseconds);
            location.reload();
            })
        })
    }

    //UPDATE COLUMN IN TABLE HTML
    if(add_col_vehicle !== "" && add_col_meter !== ''){
        var value_th_add = document.querySelectorAll("th > input[type = 'text']")
        vehicle_add = add_col_vehicle
        meter_add = add_col_meter
        var object_add_col = {}
        object_add_col[vehicle_add]={}
        var value_tbody_add = document.querySelectorAll("td.add_language1 > select.class_select")
        for(i = 0; i < value_tbody_add.length; i++){
            j = i +1
            var textid = document.getElementById(j + '_1').innerHTML
            if(value_tbody_add[i].value === 'X'){
                    value_add = "0"
            }
            
            if(value_tbody_add[i].value === 'O'){
                value_add = "1"
            }
            object_add_col[vehicle_add][textid] = value_add
        }
        $(document).ready(function(){
            $.post("../BE/update_col.php", {arr_data_add_col : object_add_col,meter_add: meter_add,vehicle_add: vehicle_add }, function(data){
                alert(data)
                // Set time delay
                var delayInMilliseconds = 3000; //2 second
                setTimeout(function() {
                //your code to be executed after 2 second
                    }, delayInMilliseconds);
                location.reload();
            })
        })
    }
})
</script>

<script>
     var selectElements = document.querySelectorAll('.class_select_en_adopt'); // Get all select
    for (var i = 0; i < selectElements.length; i++) {
        selectElements[i].disabled = true;
    }
    // ========== enable cac hang duoc Check===============
    var table2 = document.getElementById('manage_adopt_of_wording_table');
    var last_row = table2.rows.length;
    var last_col = table2.rows[0].cells.length
    
    function cb_selcet_1(value)
    { 
        var row = value.split("check_")[1];
        if ($('#'+value).is(":checked")==true)
        {
            for (i=2;i< last_col-1;i++)
            {
                document.getElementById('select_after'+row+'_'+i).disabled = false;
            }
        }
        else
        {

            for (i=2;i< last_col-1;i++)
            {
                document.getElementById('select_after'+row+'_'+i).disabled = true;
            }
        }
    };  
// ===================================
</script>