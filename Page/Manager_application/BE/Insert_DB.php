<?php
    // CONTENT: UPDATE TABLE vehicle language
    // INPUT:$arr_data,$new_language
    // OUTPUT: 

    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
    $qr= new Query("mongonv2");
    //1. INPUT HANDLE
    $arr_data=$_POST["arr"]??"";
    $new_language=$_POST["new_lan"]??"";
    //2.UPDATE TABLE VIHICLE LANGUAGE
    //2.1 CHECK AND ADD NEW LANGUAGE TO TABLE VIHICLE LANGUAGE
    if ($new_language=="") 
        {
            //nothing
        }
    else
        {
            // ADD COL TO TABLE TEXTID_LANGUAGE, VEHICLE_LANGUAGE
            if (preg_match('/[^a-zA-Z0-9]/', $new_language)) // Check valid column name
                {
                    echo "The new language is not valid. Plase check again!";
                    exit;
                } 
            else 
                {
                    $result= $qr->get_name_field_vehicle_language($db);
                    $columnNames = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $columnNames[] = $row['Field'];
                    }
                    $columnNames = array_map('strtoupper', $columnNames);
                    if (in_array(strtoupper($new_language), $columnNames)) // check vhicle name already exists
                    {
                        echo "Language '".$new_language."' already exists";
                        exit;
                    } else {
                        
                    }
                    add_new_language($db, $qr, $new_language);
                    $language=$new_language."_text";
                    $transcode=$new_language."_TransCode";
                    $translator=$new_language."_Translator";
                    $transdate=$new_language."_TranslaDate";
                    $validator=$new_language."_Validator";
                    $validate=$new_language."_ValiDate";
                    add_textid_language($db, $qr, $language, $transcode, $translator, $transdate, $validator, $validate);
            }
        }

    //2.2 UPDATE TABLE VIHICLE LANGUAGE
    //=============== GET VAME VEHICLE ============
    $arr_vehicle=[];
    $count_vehicle_language = load_count_vehicle_language($db,$qr);
    while ($row = mysqli_fetch_assoc($count_vehicle_language))
        {
            $arr_vehicle[]=$row['Vehicle'];
        }

    //===========================GET VALUE=================================
    foreach($arr_data as $key=>$value)
        {   
            $str_name_field="id,Vehicle,Base,meter_type,";
            foreach($arr_data[$key]['language'] as $key1 =>$value1)
                {
                    $str_name_field=$str_name_field.$key1.",";
                }
            break;
        }
        $str_name_field=trim($str_name_field,","); // STRING NAME FEILD 
    foreach($arr_data as $key=>$value)
        {
            
            $value_add=$key.",";
            if (in_array($key, $arr_vehicle)) // VEHICLE EXIST = TRUE
            {   
                $id_vehicle=get_id_vehicle($db,$qr,$key);
                $str_set="id = ".$id_vehicle.",Vehicle = '".$key."',Base ='".$arr_data[$key]['base']."',meter_type = '".$arr_data[$key]['meter']."',";
                foreach($arr_data[$key]['language'] as $key1 =>$value1)
                    {
                        if ($arr_data[$key]['language'][$key1]=="X")
                            {
                                $change_value=0;
                            }
                        else
                            {
                                $change_value=1;
                            }
                        $str_set=$str_set.$key1." = ".$change_value.",";
                    }
                    $str_set=trim($str_set,",");
                    update_vehicle_language($db,$qr,$str_set,$key);
            }
            else// VEHICLE EXIST = FALSE => INSERT VEHICLE
            {
                if (preg_match('/[^a-zA-Z0-9]/', $key))// Check valid column name
                {
                    echo "The new vehicle is not valid. Plase check again!";
                    exit;
                } 
                else 
                {
                    $id_vehicle=get_id_max_vehicle_language($db,$qr)+1;
                    $value_add=$id_vehicle.",'".$key."','".$arr_data[$key]['base']."','".$arr_data[$key]['meter']."',";
                    foreach($arr_data[$key]['language'] as $key1 =>$value1)
                    {
                    
                        if ($arr_data[$key]['language'][$key1]=="X")
                        {
                            $change_value=0;
                        }
                        else
                        {
                            $change_value=1;
                        }
                        $value_add=$value_add.$change_value.",";
                    }
                    $value_add=trim($value_add,",");
                    add_vehicle_language($db,$qr,$str_name_field,$value_add);
                    add_textid_vehicle($db,$qr,$key);
                }
                    
            }
        }
    echo "Save successfully";
    //GET ID MAX TABLE VEHICLE LANGUAGE
    function get_id_max_vehicle_language($db,$qr)
        {
            $result= $qr->find_max_id($db,"vehicle_language");
            while ($row = mysqli_fetch_assoc($result))
            {
                    return $row['MAX(id)'];
            };
        }

    //GET ID VEHICLE
    function get_id_vehicle($db,$qr,$vehicle)
        {
            $result= $qr->select_id_vehicle($db,"vehicle_language",$vehicle);
            while ($row = mysqli_fetch_assoc($result))
            {
                    return $row['id'];
            };
        }

    //GET DATA TABLE VEHICLE
    function load_data_vehicle_language($db,$qr)
        {
            $result= $qr->select_data($db,"vehicle_language");
            return $result;
        }

    // COUNT VEHICLE 
    function load_count_vehicle_language($db,$qr)
        {
            $result= $qr->select_vehicle($db,"vehicle_language");
            return $result;
        }

    // GET DATA FROM TABLE TEXT ID VEHICLE
    function load_data_textid_vehicle($db,$qr)
        {
            $result= $qr->select_data($db,"textid_vehicle");
            return $result;
        }

    //FIND MAX ID VEHICLE LANGUAGE
    function find_max_id($db,$qr)
        {
            $result= $qr->select_data($db,"vehicle_language");
            return $result;
        }

    //ADD VEHICLE LANGUAGE
    function add_vehicle_language($db,$qr,$fiedl,$record)
        {
            $query= $qr->insert_vehicle_language($db,"vehicle_language",$fiedl,$record);
        }

    //ADD FIELD TABLE VEHICLE LANGUAGE
    function add_new_language($db,$qr,$new_field)
        {
            $query= $qr->add_field_vehicle_language($db,"vehicle_language",$new_field);
        }

    //ADD FIELD TO TABLE TEXTID LANGUAGE
    function add_textid_language($db,$qr,$language,$transcode,$translator,$transdate,$validator,$validate)
        {
            $query= $qr->add_field_textid_language($db,"textid_language",$language,$transcode,$translator,$transdate,$validator,$validate);
        }

    //ADD FILED TO TABLE TEXTID VEHICLE
    function add_textid_vehicle($db,$qr,$vehicle)
        {
            $query= $qr->add_field_textid_vehicle($db,"textid_vehicle",$vehicle);
        }

    //UPDATE VEHICLE LANGUAGE
    function update_vehicle_language($db,$qr,$data,$vehicle)
        {
            $query= $qr->update_veh_language($db,"vehicle_language",$data,$vehicle);
        }
?>

