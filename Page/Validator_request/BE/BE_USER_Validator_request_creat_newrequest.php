
<?php
// CONTENT: user send mail
// INPUT: $request
// OUTPUT: user send mail
    //include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
    $qr= new Query("mongonv2");
    //=====load db textid request=====
    function load_data_txtid_language($db,$qr)
    {
        $query= $qr->select_data_valdator_rq($db,"textid_language");
        $result=$db->get_data($query);
        if (!$result)
            {
                die ('InCorrect');
            }
        else
            {
                return $result;
            }
        
    } 
?>

<html> 
    <table id="myTable_Validator_request"  >
        <thead id ="thead_a" class="sticky-thead"> 
       
            <tr>
                <th id = "th_check" rowspan="3">Check</th>
                <th id="th_textid" rowspan="3">Text ID</th>
                <th id = "th_ver" rowspan="3">ver</th>
                <?php
                    $count_col=4;
                    echo "<th id= 'th_language_1_".$count_col."' >US_English</th>";
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
                                    echo "<th>All<input type='checkbox' name ='myCheckbox' id='All_".$count_col."'></th>";
                                }
                        }
                ?>
            </tr>

        </thead>  
        <tbody>
            <?php
                $folderPath = '../../../../Data/UserData/0';
                $fileList = scandir($folderPath);
                $fileList = array_diff($fileList, array('.', '..'));
                $list_file_json=[];
                $rq_all['translation_request']=[];
                foreach ($fileList as $file) 
                {
                    $pos=strpos($file,".json"); 
                    $pos1=strpos($file,"TR"); 
                   
                    if ($pos !== false && $pos1 !==false) // neu dung la file json  thi add vao mang
                    {
                        $json_data = file_get_contents($folderPath."/".$file);
                        $json_in = json_decode($json_data, true);
                        foreach ($json_in['translation_request'] as $txtid=>$value)
                        {
                            // $rq_all['translation_request'][$txtid] = $json_in['translation_request'][$txtid];
                            foreach ($json_in['translation_request'][$txtid]['language'] as $language=>$value )
                            {
                                if ($json_in['translation_request'][$txtid]['language'][$language]['content'] !== "0" || array_key_exists($language,$rq_all['translation_request'][$txtid]['language']) == false ){
                                    $rq_all['translation_request'][$txtid]['language'][$language]['content'] = $json_in['translation_request'][$txtid]['language'][$language]['content'];
                                    $rq_all['translation_request'][$txtid]['language'][$language]['ver'] = $json_in['translation_request'][$txtid]['language'][$language]['ver'];
                                }        
                            }
                        }
                    } 
                }
                $data=load_data_txtid_language($db,$qr);
                $count_row=0;
                $arr_key_txt =array_keys($rq_all["translation_request"]);
                // ==========databse write table===========
                while ($row = mysqli_fetch_assoc($data))
                {   
                    $tsuika=False;
                    if ($txt_before != $row["textid"])
                    {
                        foreach($rq_all["translation_request"][$txt_before]["language"] as $language=>$value)
                        {   
                            if ( $language != "US_English")
                                {
                                    if ($rq_all["translation_request"][$txt_before]["language"][$language]["content"]!= "0" && $rq_all["translation_request"][$txt_before]["language"][$language]["content"]!= "" && gettype($rq_all["translation_request"][$txt_before]["language"][$language]["content"]) != NULL )
                                    {
                                        $tsuika = True;
                                    }
                                }
                        }
                    }
                    if ($tsuika == True ){
                        $count_col=0; 
                        $count_row=$count_row+1;
                        echo "<tr id = '".$count_row."'>";
                        $count_col=$count_col+1;
                        $ver_moi =$ver+1;
                        echo "<td><input type='checkbox'  id = 'cb_txt_".$count_row."_".$count_col."'></td>";
                        $count_col=$count_col+1;
                        echo "<td id='textid_".$count_row."_".$count_col."'>".$txt_before."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='ver_".$count_row."_".$count_col."'>".$ver_moi."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_language_".$count_row."_".$count_col."'>".$rq_all['translation_request'][$txt_before]['language']['US_English']['content']."</td>";
                        //============ arr tsuika ===============
                        foreach($rq_all['translation_request'][$txt_before]['language'] as $key_language =>$value_language)
                        {
                            if ($key_language !== "US_English"){
                                if ($rq_all['translation_request'][$txt_before]['language'][$key_language]['content'] == "0" ){
                                    $count_col=$count_col+1;
                                    echo "<td class = 'blank'  id='td_language_".$count_row."_".$count_col."'></td>";
                                    echo "<td><input type='checkbox' id = 'cb_language_".$count_row."_".$count_col."' disabled></td>";
                                }
                                else
                                {
                                    $count_col=$count_col+1;
                                    echo "<td class = 'normal' id='td_language_".$count_row."_".$count_col."'>".$rq_all['translation_request'][$txt_before]['language'][$key_language]['content']."</td>";
                                    echo "<td><input type='checkbox' id = 'cb_language_".$count_row."_".$count_col."' disabled></td>";
                                }

                            }
                        }
                        echo "</tr>";
                    }
                    $arr_tsuika_row_info = [];
                    $count_col=0;   
                    $count_row=$count_row+1;
                    $count_col=$count_col+1;
                    echo "<tr id = '".$count_row."'>";
                    echo "<td><input type='checkbox'  id = 'cb_txt_".$count_row."_".$count_col."'></td>";
                    $count_col=$count_col+1;
                    echo "<td id='textid_".$count_row."_".$count_col."'>".$row["textid"]."</td>";
                    $count_col=$count_col+1;
                    echo "<td id='ver_".$count_row."_".$count_col."'>".$row["ver"]."</td>";
                    $count_col=$count_col+1;
                    echo "<td id='td_language_".$count_row."_".$count_col."'>".$row["US_English"]."</td>";
                   
                    foreach ($row as $key=>$value)
                    {
                        //==============Check column "_text" thi la cot in4 language============= 
                        $pos=strpos($key,"_text");
                        if ($pos !== false)
                        {
                            $ver=$row["ver"];
                            $name_language = str_replace("_text","",$key);
                            $gtri_laguage_json =$rq_all["translation_request"][$row["textid"]]["language"][$name_language]["content"];
                            $gtri_ver_json =$rq_all["translation_request"][$row["textid"]]["language"][$name_language]["ver"];
                            if ($gtri_laguage_json !== "0" )
                                {
                                    $arr_tsuika_row_info[$name_language] = $gtri_laguage_json;
                                }
                            else
                                {
                                    $arr_tsuika_row_info[$name_language]= "";
                                }
                            $count_col=$count_col+1;
                            if ($value!="")
                                {
                                
                                    echo "<td class = 'full' id='td_language_".$count_row."_".$count_col."'>";
                                    echo $value;
                                    echo "</td>";
                                    echo "<td><input type='checkbox' id = 'cb_language_".$count_row."_".$count_col."' disabled></td>";
                                }
                            else
                            {   
                                $ver=$row["ver"];
                                $name_language = str_replace("_text","",$key);
                                $gtri_laguage_json = $rq_all["translation_request"][$row["textid"]]["language"][$name_language]["content"];
                                $rq_all["translation_request"][$row["textid"]]["language"][$name_language]["content"] ="0";
                                $gtri_ver_json =$rq_all["translation_request"][$row["textid"]]["language"][$name_language]["ver"];

                                if(in_array($row["textid"],$arr_key_txt))
                                    {
                                        
                                        if($gtri_laguage_json !== "0" && $gtri_laguage_json !== "" && $name_language!=="US_English" )
                                            { 
                                                echo "<td class = 'normal'  id='td_language_".$count_row."_".$count_col."'>".$gtri_laguage_json."</td>";
                                                $rq_all["translation_request"][$row["textid"]]["language"][$name_language]["content"] = "0" ;  
                                            } 
                                    else
                                            {
                                                echo "<td class = 'blank' id='td_language_".$count_row."_".$count_col."'></td>";
                                            }
                                            echo "<td><input type='checkbox' id = 'cb_language_".$count_row."_".$count_col."' disabled ></td>";
                                    }
                                else
                                    {
                                        echo "<td class = 'blank' id='td_language_".$count_row."_".$count_col."'></td>";
                                        echo "<td><input type='checkbox' id = 'cb_language_".$count_row."_".$count_col."' disabled ></td>";
                                    }
                                
                                    
                            }
                        }        
                        
                    }                  
                    echo "</tr>";
                $txt_before = $row["textid"];
                }     
                                               
            ?>
        </tbody>
    </table>
    <p id= "count_rows" style="display: none;"><?php echo $count_row; ?></p>

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
            //=====Check click all ================
            if (value.includes("All_")==true) // Tick all
            {
                var last_row = <?php echo $count_row ?>;
                for (i=1; i<=last_row;i++)
                {
                    if ($('#'+value).is(":checked")==true) // all tick
                    {
                        if ($('#cb_txt_'+i+"_1").is(":checked")==true) 
                        {
                            $("#cb_language_" + i + "_" + col).prop("checked",true);
                        }            
                    }
                    else 
                    {
                        $("#cb_language_" + i + "_" + col).prop("checked",false);
                    }
                }
            }
            else if (value.includes("cb_txt_")==true) // text id
            {
                var split_value= value.split("_");
                var index_row = split_value[2];
                for (i=5; i<=last_col;i++)
                {
                    if ($('#cb_txt_'+index_row+"_1").is(":checked")==true) //  text id  tick
                    {
                        if ($('#All_'+i).is(":checked")==true) //  all tick
                        {   
                           
                            $("#cb_language_" + index_row + "_" + i).prop("checked",true); // tick language
                        }
     
                        document.getElementById("cb_language_" + index_row + "_" + i).disabled=false; // active checkbox
                        
                    }            
                    else 
                    {
                        if ($('#All_'+i).is(":checked")==true) 
                        {  
                            $("#cb_language_" + index_row + "_" + i).prop("checked",false); 
                        }
                        document.getElementById("cb_language_" + index_row + "_" + i).disabled=true; // disable checkbox
                    }
                }
            }
            //click each cell checkbox
            else if(value.includes("cb_language_")==true)
            {
                
                var split_value= value.split("_");
                var index_row = split_value[2];
                for (i=5; i<=last_col;i++)
                {
                    if ( $("#cb_language_" + index_row + "_" + i).is(":checked")==true) 
                    {
                        $("#cb_language_" + index_row + "_" + i).prop("checked",true); // tick language 
                    }
                    else
                    {
                        $("#cb_language_" + index_row + "_" + i).prop("checked",false); // tick language
                    }
                }
            }
        });
    }); 
</script>

<script>
    // ============= Save request ===========
    var btn_save =document.getElementById("btn_Validator_request_save2")
    btn_save.addEventListener("click",function()
    {
        var last_row= <?php echo $count_row ?>;
        var last_col= <?php echo $count_col ?>;
        var data_json={
            "validation_request":{
                
            }
        };
        for (i=1;i<=last_row;i++) //run rows
        {
            if ($('#cb_txt_'+i+"_1").is(":checked")==true) 
            {
                var text_id=document.getElementById("textid_"+i+"_2").innerHTML;
                var ver =document.getElementById("ver_"+i+"_3").innerHTML;
                var contentEng = document.getElementById("td_language_"+i+"_4").innerHTML;
                if ( (text_id) in data_json["validation_request"])
                    {
                        // nothing
                    }
                else
                    {
                        data_json["validation_request"][text_id]={};
                        data_json["validation_request"][text_id]["language"]={};
                        data_json["validation_request"][text_id]["language"]["US_English"]={};
                        data_json["validation_request"][text_id]["language"]["US_English"]['content']= contentEng;
                        data_json["validation_request"][text_id]["language"]["US_English"]["ver"]=ver;
                    }
                
                for (j=5;j<=last_col;j++) //run columns
                {
                    
                    var country = document.getElementById("th_language_1_"+j).innerHTML
                    var content =document.getElementById("td_language_"+i+"_"+j).innerHTML
                 
                    if ( (country) in data_json["validation_request"][text_id]["language"]) // language exist into textid
                        {
                            console.log("co");
                            if ($('#cb_language_'+i+"_"+j).is(":checked")==true) // language click
                                {
                                    
                                    data_json["validation_request"][text_id]["language"][country]={};
                                    data_json["validation_request"][text_id]["language"][country]["content"]=content;
                                    data_json["validation_request"][text_id]["language"][country]["ver"]=ver;
                                }
                            else
                                {
                                    //nothing to do 
                                }
                        }
                    else
                        {
                            if ($('#cb_language_'+i+"_"+j).is(":checked")==true) 
                                {
                                    data_json["validation_request"][text_id]["language"][country]={};
                                    data_json["validation_request"][text_id]["language"][country]["content"]=content;
                                    data_json["validation_request"][text_id]["language"][country]["ver"]=ver;
                                }
                            else
                                {
                                    data_json["validation_request"][text_id]["language"][country]={};
                                    data_json["validation_request"][text_id]["language"][country]["content"]="0";
                                    data_json["validation_request"][text_id]["language"][country]["ver"]="0";
                                }
                        }
                }
            }
        }
        $(document).ready(function(){
            $.post("../../BE/BE_USER_Json.php", {arr:data_json}, function(data){
                console.log(data)
                alert(data);
            });

        });   

    })
        //============= Filter button ====================================
    
        var btn_filter = document.getElementById("btn_filter");
        btn_filter.addEventListener("click", function(){
            var count_rows = document.getElementById("count_rows").innerHTML;
            var filter_input = document.getElementById("filter_text");
            var select_element = document.getElementById("filter_select");

            var select_value = select_element.options[select_element.selectedIndex].value;
            var select_value = select_value.trim();
            var filter_value = filter_input.value;

            for (var i= 1; i<= count_rows; i++){
                var row_element =document.getElementById(i);
                if (filter_value == ""){
                    row_element.style.display = "";
                }
                else {
                    if (select_value == "2"){
                        var cells_element = document.getElementById("textid_" + i + "_2" );
                        var cells_value = cells_element.innerHTML;
                        console.log(cells_value.indexOf(filter_value));
                        if (cells_value.indexOf(filter_value)== -1){
                            row_element.style.display = "none";
                        }
                        else{
                            row_element.style.display = "";
                        }
                    }
                    else{
                        var cells_element = document.getElementById("td_language_" + i + "_" + select_value);
                        var cells_value = cells_element.innerHTML;
                        console.log(cells_value.indexOf(filter_value));
                        if (cells_value.indexOf(filter_value)== -1){
                            row_element.style.display = "none";
                        }
                        else{
                            row_element.style.display = "";
                        }
                    }
                }

            }
            })
</script>
</html>