<?php
//CONTENT: CREATE TABLE VEHICLE LANGUAGE
//INPUT:
//OUTPUT: TABLE VEHICLE LANGUAGE

//1. GET DATA FROM TABLE VEHICLE LANGUAGE
include "MySql.php";
$db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
$qr= new Query("mongonv2");

function load_data_vehicle_language($db,$qr)
{
    $result= $qr->select_data($db,"vehicle_language");
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
<!-- 2. CREATE TABLE VEHICLE LANGUAGE -->
        <thead > 
            <!-- NAME COLUMN -->
            <tr>
                <?php
                    $data=load_data_vehicle_language($db,$qr);
                    $row = mysqli_fetch_assoc($data);
                    $arr_col=array_keys($row);
                    $count_col=1;
                    echo "<th  id='th_check' >Check</th>";
                    echo "<th id='th_vehicle'  >Vehicle</th>"; 
                    echo "<th id='th_base'  >Base</th>";                  
                    echo "<th id='th_meter'  >Meter type</th>";
                    echo "<th id='th_jap'  >Japanese</th>";
                    echo "<th  id='th_eng' >US_English</th>";
                    echo "<th  id=\"language_add\" class=\"add_language\"><input id=\"1\" type=\"text\" placeholder=\"New language\" disabled ></th>";
                    $count_col=7;
                    for ($i=6;$i<count($arr_col);$i++)
                    {
                        echo "<th id='th_0_".$count_col."'  class=\"th_width\" >".$arr_col[$i]."</th>";
                        $count_col=$count_col+1;
                    }
                   
                ?>
            </tr>
        </thead>
        <tbody>
            <!-- BODY TABLE -->
            <?php
                $data=load_data_vehicle_language($db,$qr);
                $count_row=1;
                while ($row = mysqli_fetch_assoc($data))
                {                   
                    $count_col=1;
                    echo "<tr>";
                    echo " <td class=\"language_apply1\" ><input type=\"checkbox\" class=\"checkbox_Active cb_vehicle\" id = 'cb_".$count_row."_".$count_col."' onchange =\"check_vehicle(this.id)\"></td>";
                    $count_col=$count_col+1;
                    echo "<td class=\"language_apply2\"  id = 'td_veh_".$count_row."_".$count_col."' >".$row['Vehicle']."</td>";
                    $count_col=$count_col+1;
                    echo "<td class=\"language_apply3\"  id = 'td_base_".$count_row."_".$count_col."' >".$row['Base']."</td>";
                    $count_col=$count_col+1;
                    echo "<td class=\"language_apply4\"  id = 'td_meter_".$count_row."_".$count_col."' >".$row["meter_type"]."</td>";
                    $count_col=$count_col+1;
                    $value_vehicle_jpn=$row["Japanese"];
                    echo"<td  class=\"language_apply5\">";
                    echo "<select  id='select_".$count_row."_".$count_col."' class='class_select class_select_en'>";
                    if ($value_vehicle_jpn== "1")
                        {
                            echo "<option selected>O</option>";
                            echo "<option >X</option>";
                        }
                    else
                        {
                            echo "<option >O</option>";
                            echo "<option selected>X</option>";
                        }
                    echo"</td>";

                    $count_col=$count_col+1;
                    $value_vehicle_jpn=$row["US_English"];
                    echo"<td  class=\"language_apply6\">";
                    echo "<select  id='select_".$count_row."_".$count_col."' class='class_select class_select_en'>";
                    if ($value_vehicle_jpn== "1")
                        {
                            echo "<option selected>O</option>";
                            echo "<option >X</option>";
                        }
                    else
                        {
                            echo "<option >O</option>";
                            echo "<option selected>X</option>";
                        }
                    echo"</td>";

                    // COLUMN NEW LANGUAGE
                    echo "</select>";
                    echo "</td>";
                    echo "<td class=\"add_language\"   >";
                    echo "<select  id='select_".$count_row."_0' class='class_select add_lang'>";
                    echo "<option selected>O</option>";
                    echo "<option >X</option>";
                    echo "</select>";
                    echo "</td>";
                   
                    foreach ($row as $key=>$value)
                    { if ($key !="id" && $key !="Vehicle" && $key !="Base" && $key !="meter_type" && $key !="Japanese" && $key !="US_English" )
                        {
                            $count_col=$count_col+1;
                            echo "<td>";
                            echo "<select  id='select_".$count_row."_".$count_col."' class='class_select class_select_en'>";
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
                    }
                    echo"</tr>";
                    $count_row=$count_row+1;
                }                                      
            ?>
        </tbody>
