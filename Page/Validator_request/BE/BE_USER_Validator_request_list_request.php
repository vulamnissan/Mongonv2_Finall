<?php
// CONTENT: user list request
// INPUT: $request
// OUTPUT: user list request
    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
    $qr= new Query("mongonv2");
    //=====load table  request=====
    function load_data_request($db,$qr)
    {
        $query= $qr->select_request_user($db,"request",$_SESSION['ID']);
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
    <table id="myTable_validator_Request_info" style= "border-collapse:collapse;" border =1px; >
        <thead id ="thead_a" class="sticky-thead"> 
                <th>NO</th>
                <th>Request_Number</th>
                <th>Status</th>
                <th>Requester</th>
                <th>Date Issue</th>
        </thead>
        <tbody>
             <?php
                $data=load_data_request($db,$qr);

                $count_row=0;     
                $count_col=0; 
                while ($row = mysqli_fetch_assoc($data))
                    {              
                        $count_row=$count_row+1;
                        $count_col=$count_col+1;
                        echo "<tr>";
                        foreach ($row as $key=>$value)
                        {
                            //==============table list valist ============= 
                            if($key!=="user"&&$key!=="deadline" && strpos($row['requestnumber'],"VL")!==false){
                                if ($key == 'requestnumber'){

                                    $query= $qr->count_all_VL($db,$value);
                                    $count_all_rq=$db->get_data($query)->num_rows;

                                    $query= $qr->count_close_VL($db,$value);
                                    $count_close_rq=$db->get_data($query)->num_rows;
                                    echo "<td><a href ='Validator_request_main.php?flag=1&rq=".$value."'id ='test".$count_row."_".$count_col."'>".$value."</a></td>";
                                }
                                else
                                    {

                                        if ($key == 'status')
                                            {
                                                if($count_all_rq -1 == $count_close_rq && $count_all_rq != 1 )
                                                    {
                                                        echo "<td id ='test".$count_row."_".$count_col."'>"."Close"."</td>";
                                                    }
                                                else 
                                                    {
                                                        echo "<td id ='test".$count_row."_".$count_col."'>"."Open"."</td>";
                                                    }
                                            }
                                        else
                                            {
                                                echo "<td id ='test".$count_row."_".$count_col."'>".$value."</td>";
                                            }
                                        
                                    }
                            }
                        }                  
                        echo "</tr>";
                    }

            ?> 
            
        </tbody>
    </table>
</html> 



