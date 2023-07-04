<?php
    include "MySql.php";
    $db = new connect_DB("localhost","mongonv2","root","");
    $qr= new Query("mongonv2");
    //=====load db textid request=====
    function load_data_txtid_language($db,$qr)
    {
        $query= $qr->select_data("textid_language");
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
    <!-- tao table -->
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
                //===== doc gia tri tu file json========
                // $json_data = file_get_contents("../../../Data/UserData/0/TR490.json");
                // $json_in = json_decode($json_data, true);
                // echo "<pre>";
                // print_r($json_in) ;

                $folderPath = '../../../../Data/UserData/0';
                // Lấy danh sách tệp trong thư mục
                $fileList = scandir($folderPath);
                // Loại bỏ các tệp "." và ".."
                $fileList = array_diff($fileList, array('.', '..'));
                $list_file_json=[];
                // In danh sách tên tệp
                $rq_all['translation_request']=[];
                foreach ($fileList as $file) 
                {
                    $pos=strpos($file,".json"); 
                    $pos1=strpos($file,"TR"); 
                   
                    if ($pos !== false && $pos1 !==false) // neu dung la file json  thi add vao mang
                    {
                        $json_data = file_get_contents($folderPath."/".$file);
                        $json_in = json_decode($json_data, true);
                        echo "<pre>";
                            foreach ($json_in['translation_request'] as $txtid=>$value)
                            {
                                // $rq_all['translation_request'][$txtid] = $json_in['translation_request'][$txtid];
                                foreach ($json_in['translation_request'][$txtid]['language'] as $language=>$value )
                                {
                                    if ($json_in['translation_request'][$txtid]['language'][$language]['content'] !== "0" || array_key_exists($language,$rq_all['translation_request'][$txtid]['language']) == false){
                                        $rq_all['translation_request'][$txtid]['language'][$language]['content'] = $json_in['translation_request'][$txtid]['language'][$language]['content'];
                                        $rq_all['translation_request'][$txtid]['language'][$language]['ver'] = $json_in['translation_request'][$txtid]['language'][$language]['ver'];
                                    }        
                                }
                            }

                    }
                    
                }
                
                // echo "ALL REQUEST";

                // print_r($rq_all);
                $data=load_data_txtid_language($db,$qr);
                $count_row=0;

                // ==========Chay dung dong databse de dien thong tin vao table===========
                while ($row = mysqli_fetch_assoc($data))
                {   
                    $tsuika=False;
                    if ($txt_before != $row["textid"])
                    {
                        foreach($rq_all["translation_request"][$txt_before]["language"] as $language=>$value)
                        {   
                            if ( $language != "US_English")
                            {
                                if ($rq_all["translation_request"][$txt_before]["language"][$language]["content"]!= "0" && gettype($rq_all["translation_request"][$txt_before]["language"][$language]["content"]) != NULL )
                                {
                                    $tsuika = True;
                                }
                            }
                        }
                    }
                    if ($tsuika == True ){
                        echo "<tr>";
                        $count_col=0; 
                        $count_row=$count_row+1;
                        $count_col=$count_col+1;
                        $ver_moi =$ver+1;
                        echo "<td><input type='checkbox'  id = 'cb_txt_".$count_row."_".$count_col."'></td>";
                        $count_col=$count_col+1;
                        echo "<td id='textid_".$count_row."_".$count_col."'>".$txt_before."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='ver_".$count_row."_".$count_col."'>".$ver_moi."</td>";
                        $count_col=$count_col+1;
                        echo "<td id='td_language_".$count_row."_".$count_col."'>".$rq_all['translation_request'][$txt_before]['language']['US_English']['content']."</td>";
                        //============ chay mangr tsuika trun gian===============
                        foreach($rq_all['translation_request'][$txt_before]['language'] as $key_language =>$value_language)
                        {
                            if ($key_language !== "US_English"){
                                if ($rq_all['translation_request'][$txt_before]['language'][$key_language]['content'] == "0"){
                                    $count_col=$count_col+1;
                                    echo "<td id='td_language_".$count_row."_".$count_col."'></td>";
                                    echo "<td><input type='checkbox' id = 'cb_language_".$count_row."_".$count_col."' disabled></td>";
                                }
                                else
                                {
                                    $count_col=$count_col+1;
                                    echo "<td id='td_language_".$count_row."_".$count_col."'>".$rq_all['translation_request'][$txt_before]['language'][$key_language]['content']."</td>";
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
                    echo "<tr>";
                    echo "<td><input type='checkbox'  id = 'cb_txt_".$count_row."_".$count_col."'></td>";
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
                            //check ver language de tsuika_row
                            $ver=$row["ver"];
                            $name_language = str_replace("_text","",$key);
                            $gtri_laguage_json =$rq_all["translation_request"][$row["textid"]]["language"][$name_language]["content"];
                            $gtri_ver_json =$rq_all["translation_request"][$row["textid"]]["language"][$name_language]["ver"];
                            if ($gtri_laguage_json !== "0" ){
                                $arr_tsuika_row_info[$name_language] = $gtri_laguage_json;
                                // $tsuika = True;
                            }
                            else
                            {
                                $arr_tsuika_row_info[$name_language]= "";
                            }
                            // gia tri theo cot khac rong
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
                            // gia tri theo cot rong
                                $ver=$row["ver"];
                                $name_language = str_replace("_text","",$key);
                                $gtri_laguage_json = $rq_all["translation_request"][$row["textid"]]["language"][$name_language]["content"];
                                $rq_all["translation_request"][$row["textid"]]["language"][$name_language]["content"] ="0";
                                $gtri_ver_json =$rq_all["translation_request"][$row["textid"]]["language"][$name_language]["ver"];
                                // them vao o ma ko them hang moi
                                if($gtri_laguage_json !== "0" && $name_language!=="US_English" )
                                    { 
                                        echo "<td id='td_language_".$count_row."_".$count_col."'>".$gtri_laguage_json."</td>";
                                        // echo "LAM".$rq_all["translation_request"][$row["textid"]]["language"][$name_language]["content"] ;
                                        $rq_all["translation_request"][$row["textid"]]["language"][$name_language]["content"] = "0" ;  
                                    } 
                                
                                    else
                                    {
                                        echo "<td id='td_language_".$count_row."_".$count_col."'></td>";
                                    }
                                    echo "<td><input type='checkbox' id = 'cb_language_".$count_row."_".$count_col."' disabled ></td>";
                                    
                            }
                        }        
                    }                  
                    echo "</tr>";
                    // gan bien check txt khac nhau
                $txt_before = $row["textid"];
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
                            $("#td_language_" + i + "_" + col).css({"background-color":"red"});
                        }            
                    }
                    else // text id bo tick
                    {
                        $("#cb_language_" + i + "_" + col).prop("checked",false);
                        $("#td_language_" + i + "_" + col).css({"background-color": "#252525"});
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
                            $("#td_language_" + index_row + "_" + i).css({"background-color":"red"}); 
                        }
     
                        document.getElementById("cb_language_" + index_row + "_" + i).disabled=false; // active checkbox
                        
                    }            
                    else // text id bo tick
                    {
                        if ($('#All_'+i).is(":checked")==true) // neu all dang duoc tick
                        {  
                            $("#cb_language_" + index_row + "_" + i).prop("checked",false); // bo tick language
                            $("#td_language_" + index_row + "_" + i).css({"background-color": "#252525"});
                        }
                        document.getElementById("cb_language_" + index_row + "_" + i).disabled=true; // disable checkbox
                    }
                }
            }
            //tich chon tung o checkbox
            else if(value.includes("cb_language_")==true)
            {
                
                var split_value= value.split("_");
                var index_row = split_value[2];
                for (i=5; i<=last_col;i++)
                {
                    if ( $("#cb_language_" + index_row + "_" + i).is(":checked")==true) 
                    {
                       
                        
                        $("#cb_language_" + index_row + "_" + i).prop("checked",true); // tick language
                        $("#td_language_" + index_row + "_" + i).css({"background-color":"red"});
                            
                    }
                    else
                    {
                        $("#cb_language_" + index_row + "_" + i).prop("checked",false); // tick language
                        $("#td_language_" + index_row + "_" + i).css({"background-color": "#252525"});
                    }
                }
            }
        });
    }); 
</script>

<script>
    // ============= Nut Save request ===========
    var btn_save =document.getElementById("btn_Validator_request_save2")
    btn_save.addEventListener("click",function()
    {
        var last_row= <?php echo $count_row ?>;
        var last_col= <?php echo $count_col ?>;
        var data_json={
            "validation_request":{
                
            }
        };
        // console.log(data_json);
        // alert (data_json);
        for (i=1;i<=last_row;i++) // chay tung dong
        {
            if ($('#cb_txt_'+i+"_1").is(":checked")==true) 
            {
                var text_id=document.getElementById("textid_"+i+"_2").innerHTML;
                var ver =document.getElementById("ver_"+i+"_3").innerHTML;
                var contentEng = document.getElementById("td_language_"+i+"_4").innerHTML;
                if ( (text_id) in data_json["validation_request"])
                {
                    // console.log("ok");
                }
                else
                {
                    data_json["validation_request"][text_id]={};
                    data_json["validation_request"][text_id]["language"]={};
                    data_json["validation_request"][text_id]["language"]["US_English"]={};
                    data_json["validation_request"][text_id]["language"]["US_English"]['content']= contentEng;
                    data_json["validation_request"][text_id]["language"]["US_English"]["ver"]=ver;
                    
                }
                
                
                for (j=5;j<=last_col;j++) //chay tung cot
                {
                    
                    var country = document.getElementById("th_language_1_"+j).innerHTML
                    var content =document.getElementById("td_language_"+i+"_"+j).innerHTML
                 
                    if ( (country) in data_json["validation_request"][text_id]["language"]) // language da co trong textid
                    {
                        console.log("co");
                        if ($('#cb_language_'+i+"_"+j).is(":checked")==true) // neu language duoc tick
                        {
                            
                            data_json["validation_request"][text_id]["language"][country]={};
                            data_json["validation_request"][text_id]["language"][country]["content"]=content;
                            data_json["validation_request"][text_id]["language"][country]["ver"]=ver;
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
                    // console.log(data_json);
                }
            }
        }
        $(document).ready(function(){
            $.post("../../BE/BE_USER_Json.php", {arr:data_json}, function(data){
                alert("Save successfully");
            });

        });   
    })
</script>






</html>