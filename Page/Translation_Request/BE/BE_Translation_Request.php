<?php
    include "MySql.php";
    $db = new connect_DB("localhost","mongonv2","root","");
    $qr= new Query("mongonv2");
    //=====load table translation request=====
    function load_data_txtid_language($db,$qr)
    {
        $query= $qr->select_data("textid_language");
        $result=$db->get_data($query);
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        else
        {
            return $result;
        }
    }
?>

<!-- HTML de tao table -->
<html> 

<!-- input hidden -->
<p id = "link_file_json" style ="display:none"  ></p>
<!-- ================= -->

    <table id="myTable_Translation_Request">
        <thead id ="thead_a" class="sticky-thead"> 
            <!-- Tao thead -->
            <tr>
                <th id = "th_check" rowspan="3">Check</th>
                <th id="th_textid" rowspan="3">Text ID</th>
                <th id = "th_ver" rowspan="3">ver</th>
                <?php
                    $count_col=4;
                    echo "<th id= 'th_language_1_".$count_col."' >US English</th>";
                ?>
                <?php
                    $data=load_data_txtid_language($db,$qr);
                    $row = mysqli_fetch_assoc($data);
                    $arr_col=array_keys($row);
                    for ($i=4;$i<count($arr_col);$i++)
                    {
                        $pos=strpos($arr_col[$i],"_text");
                        if ($pos !== false)
                        {
                            $count_col=$count_col+1;
                            $name_language=str_replace("_text","",$arr_col[$i]);
                            echo "<th id='th_language_1_".$count_col."' class='th_width'>".$name_language."</th>";
                            echo "<th class='th_width_select'>Select</th>";
                        }
                    }
                ?>
            </tr>
            <tr>
                <?php
                    $count_col=4;
                    $arr_col=array_keys($row);
                    echo "<th id='th_engsub'>Text</th>";
                    for ($i=4;$i<count($arr_col);$i++)
                    {
                        $pos=strpos($arr_col[$i],"_text");
                        if ($pos !== false)
                        {
                        $count_col=$count_col+1;
                        echo "<th>Text</th>";
                        echo "<th>All<input type='checkbox' id='All_".$count_col."'></th>";
                        }
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $data=load_data_txtid_language($db,$qr);
                $count_row=0;
                // ==========Chay dung dong databse de dien thong tin vao table===========
                while ($row = mysqli_fetch_assoc($data))
                {                   
                    // echo "<pre>";
                    // print_r($row);
                    $count_col=0;   
                    $count_row=$count_row+1;
                    $count_col=$count_col+1;
                    echo "<tr>";
                    echo "<td><input type='checkbox' id = 'cb_txt_".$count_row."_".$count_col."'></td>";
                    $count_col=$count_col+1;
                    echo "<td id='textid_".$count_row."_".$count_col."'>".$row["textid"]."</td>";
                    $count_col=$count_col+1;
                    echo "<td id='ver_".$count_row."_".$count_col."'>".$row["ver"]."</td>";
                    $count_col=$count_col+1;
                    echo "<td id='td_language_".$count_row."_".$count_col."'>".$row["US_English"]."</td>";
                    foreach ($row as $key=>$value)
                    {
                        //==============Kiem tra neu ten cot co "_text" thi la cot in4 language============= 
                        $pos=strpos($key,"_text");
                        if ($pos !== false)
                        {
                            $count_col=$count_col+1;
                            if (empty($value)!==True)
                            {
                                echo "<td id='td_language_".$count_row."_".$count_col."'>";
                                echo $value;
                                echo "</td>";
                                echo "<td><input type='checkbox' id = 'cb_language_".$count_row."_".$count_col."' disabled></td>";
                            }
                            else
                            {
                                echo "<td class='blank' id='td_language_".$count_row."_".$count_col."'></td>";
                                echo "<td><input type='checkbox' id = 'cb_language_".$count_row."_".$count_col."' disabled ></td>";
                            }
                        }                     
                    }
                    echo "</tr>";
                }                                      
            ?>
        </tbody>
    </table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // =============================Function check checkbox===========================
    $(document).ready(function()
    {
        $('input[type=checkbox]').change(function(){
            var value = this.id;
            var col = value.replace("All_","");
            let check = value.indexOf("All_");
            var last_col = <?php echo $count_col ?>;
            //=====Check xem co phai tick all k================
            if (value.includes("All_")==true) // Neu tick all
            {
                var last_row = <?php echo $count_row ?>;
                for (i=1; i<=last_row;i++)
                {
                    if ($('#'+value).is(":checked")==true) // all duoc tick
                    {
                        if ($('#cb_txt_'+i+"_1").is(":checked")==true) // neu text id duoc tick
                        {
                            $("#cb_language_" + i + "_" + col).prop("checked",true);
                        }            
                    }
                    else // text id bo tick
                    {
                        $("#cb_language_" + i + "_" + col).prop("checked",false);
                    }
                }
            }
            else if (value.includes("cb_txt_")==true) // Neu tick chon text id
            {
                var split_value= value.split("_");
                var index_row = split_value[2];
                // console.log(index_col);
                for (i=5; i<=last_col;i++)
                {
                    if ($('#cb_txt_'+index_row+"_1").is(":checked")==true) // neu text id duoc tick
                    {
                        // console.log("ads");
                        if ($('#All_'+i).is(":checked")==true) // neu all dang duoc tick
                        {   
                            $("#cb_language_" + index_row + "_" + i).prop("checked",true); // tick language 
                        }
                        document.getElementById("cb_language_" + index_row + "_" + i).disabled=false; // active checkbox 
                    }            
                    else // text id bo tick
                    {
                        if ($('#All_'+i).is(":checked")==true) // neu all dang duoc tick
                        {  
                            $("#cb_language_" + index_row + "_" + i).prop("checked",false); // bo tick language
                        }
                        document.getElementById("cb_language_" + index_row + "_" + i).disabled=true; // disable checkbox
                    }
                }
            }
        });
    }); 
</script>
<script>
    // ===============================Nut save===========================
    var btn_save = document.getElementById("btn_Translation_Request_save");
    btn_save.addEventListener("click",function()
    {
        var link_json=document.getElementById("link_file_json").innerHTML;
        var last_row= <?php echo $count_row ?>;
        var last_col= <?php echo $count_col ?>;
        // var last_row=document.querySelectorAll("table#myTable_Translation_Request > tbody >tr");
        // var last_col=9999;
        // console.log(last_row);
        var data_json={
            "translation_request":{
                
            }
        };
        // console.log(data_json);
        // console.log(document.getElementById("textid_1_2").innerHTML);
        for (i=1;i<=last_row;i++) // chay tung dong
        {
            if ($('#cb_txt_'+i+"_1").is(":checked")==true) 
            {
                var text_id=document.getElementById("textid_"+i+"_2").innerHTML;
                var ver = document.getElementById("ver_"+i+"_3").innerHTML;
                if ( (text_id) in data_json["translation_request"])
                {
                    // console.log("ok");
                }
                else
                {
                    data_json["translation_request"][text_id]={};
                    data_json["translation_request"][text_id]["language"]={};
                    data_json["translation_request"][text_id]["language"]["US_English"]={};
                    data_json["translation_request"][text_id]["language"]["US_English"]['content']='';
                    data_json["translation_request"][text_id]["language"]["US_English"]['ver']=ver;
                }
                for (j=5;j<=last_col;j++) //chay tung cot
                {
                    
                    var country = document.getElementById("th_language_1_"+j).innerHTML
                    if ( (country) in data_json["translation_request"][text_id]["language"]) // language da co trong textid
                    {
                        console.log("co");
                        if ($('#cb_language_'+i+"_"+j).is(":checked")==true) // neu language duoc tick
                        {
                            data_json["translation_request"][text_id]["language"][country]={};
                            data_json["translation_request"][text_id]["language"][country]['content']="1";
                            data_json["translation_request"][text_id]["language"][country]['ver']=ver;
                        }
                        else
                        {
                            // khong lam gi
                        }
                    }
                    else
                    {
                        if ($('#cb_language_'+i+"_"+j).is(":checked")==true) // neu language duoc tick
                        {
                            data_json["translation_request"][text_id]["language"][country]={};
                            data_json["translation_request"][text_id]["language"][country]['content']="1";
                            data_json["translation_request"][text_id]["language"][country]['ver']=ver;
                        }
                        else
                        {
                            data_json["translation_request"][text_id]["language"][country]={};
                            data_json["translation_request"][text_id]["language"][country]['content']="0";
                            data_json["translation_request"][text_id]["language"][country]['ver']=ver;
                        }
                    }
                }
            }
        }
        console.log(data_json);
        $(document).ready(function(){
            $.post("../BE/file_json.php", {arr:data_json,link:link_json}, function(data){
                // console.log("asd");
                // console.log(data);
                
                if (data =="Fail")
                {
                    alert("Fail to save");
                }
                else
                {
                    document.getElementById('btn_Translation_Request_Confirm_translation').disabled = false;
                    document.getElementById('btn_Translation_Request_Confirm_translation').classList.add('btn');
                    $('#link_file_json').html(data);
                    alert("Save successfully");
                }
                // if (data ==="Save successfully")
                // {
                //     document.getElementById('btn_Translation_Request_Confirm_translation').disabled = false;
                //     document.getElementById('btn_Translation_Request_Confirm_translation').classList.add('btn');
                // }
            });

        });  
    })
</script>
<!-- ===================Nut confirm translation================= -->
<script>
    // =================== button confirm translation request======================================
    var btn_confirm = document.getElementById("btn_Translation_Request_Confirm_translation");
    btn_confirm.addEventListener("click",function()
    {
        var link = document.getElementById("link_file_json").innerHTML;
        $(document).ready(function()
        {
            $.get("../BE/BE_Confirm_Translation.php", {link_file:link,checkshow:"new"}, function(data){
            $('#Wraper_table_Translation_Request_info').html(data);
            // alert(data);
        });
        document.getElementById('btn_Translation_Request_Set_Password').disabled = false;
        document.getElementById('btn_Translation_Request_Set_Password').classList.add('btn');
        

    });
    
    });
</script>

</html>



    
