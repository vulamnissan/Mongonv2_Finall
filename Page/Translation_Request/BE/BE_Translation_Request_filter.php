<?php
// CONTENT: CREATE TABLE TRANSLATION REQUEST
// INPUT: 
// OYTPUT: TABLE TRANSLATION REQUEST
//1. GET DATA FROM TABLE TEXTID LANGUAGE
    $filter_value = $_GET["filter_val"];
    $select_val = $_GET["select_val"];
    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
    $qr= new Query("mongonv2");
    function load_data_txtid_language($db,$qr,$filter_val,$select_val)
    {
        $result= $qr->select_data_translate_rq_filter($db,"textid_language",$filter_val,$select_val);
        if (!$result)
            {   
                die ('Query is wrong');
            }
        else
            {
                return $result;
            }
    }

?>

<!-- 2, OUTPUT TABLE TRANSLATION REQUEST -->
<html> 
<!-- input hidden -->
<p id = "link_file_json" style ="display:none"  ></p>
<!-- ===== creat table translation request ============ -->
    <table id="myTable_Translation_Request">
        <thead id ="thead_a" class="sticky-thead"> 
            <tr>
                <th id = "th_check" rowspan="3">Check</th>
                <th id="th_textid" rowspan="3">Text ID</th>
                <th id = "th_ver" rowspan="3">ver</th>
                <?php
                    $count_col=4;
                    echo "<th id= 'th_language_1_".$count_col."' >US English</th>";
                ?>
                <?php
                    $data = load_data_txtid_language($db,$qr,$filter_value,$select_val);
                    $row = mysqli_fetch_assoc($data);
                    $arr_col=array_keys($row);
                    for ($i=4;$i<count($arr_col);$i++)
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
                $data=load_data_txtid_language($db,$qr,$filter_value,$select_val);
                $count_row=0;
                while ($row = mysqli_fetch_assoc($data))
                {                   
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
                        //==============check "_text" in field=============
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
    // ============================= Function check checkbox ===========================
    $(document).ready(function()
    {
        $('input[type=checkbox]').change(function(){
            var value = this.id;
            var col = value.replace("All_","");
            let check = value.indexOf("All_");
            var last_col = <?php echo $count_col ?>;
            //===== Check all  ================
            if (value.includes("All_")==true) // check all = checked
            {
                var last_row = <?php echo $count_row ?>;
                for (i=1; i<=last_row;i++)
                {
                    if ($('#'+value).is(":checked")==true) // check all = checked
                    {
                        if ($('#cb_txt_'+i+"_1").is(":checked")==true) // check text = checked
                        {
                            $("#cb_language_" + i + "_" + col).prop("checked",true);
                        }            
                    }
                    else // check text != checked
                    {
                        $("#cb_language_" + i + "_" + col).prop("checked",false);
                    }
                }
            }
            else if (value.includes("cb_txt_")==true) // check text = checked
            {
                var split_value= value.split("_");
                var index_row = split_value[2];
                for (i=5; i<=last_col;i++)
                {
                    if ($('#cb_txt_'+index_row+"_1").is(":checked")==true) // check text = checked
                    {
                        if ($('#All_'+i).is(":checked")==true) // heck all = checked
                        {   
                            $("#cb_language_" + index_row + "_" + i).prop("checked",true); // check language = checked
                        }
                        document.getElementById("cb_language_" + index_row + "_" + i).disabled=false; // active checkbox 
                    }            
                    else // check text != checked
                    {
                        if ($('#All_'+i).is(":checked")==true) // heck all = checked
                        {  
                            $("#cb_language_" + index_row + "_" + i).prop("checked",false); // check language != checked
                        }
                        document.getElementById("cb_language_" + index_row + "_" + i).disabled=true; // disable checkbox
                    }
                }
            }
        });
    }); 
</script>


</html>



    
