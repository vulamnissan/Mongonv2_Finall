<?php



function connect_db($servername,$username,$password,$database){
    $conn = mysqli_connect($servername,$username,$password,$database);
    if (!$conn){
        die("connection failed: " . mysqli_connect_errno());
    }
    else{
        
        // echo "connect";
        return $conn;
        
    }
}

$connect = connect_db('localhost','root','','mongonv2');
        $add_sql="SELECT * FROM vehicle_language ";
        $result = $connect -> query($add_sql);
        $arr = array();
        if ($result->num_rows>0){
            while ($row = $result -> fetch_assoc()){
                $count = 0;
                $ind = 0;
                foreach($row as $keys => $data){
                    $status = "";
                    $arr[$ind] = $data;
                    $ind = $ind +1;
                }
                echo "<pre>";
                    $i=1;
                    $count_col =$count_col+1;
                    
                    echo "<option id = 'vehicle_".$count_col."' class = '". $status ."' >" . $arr[$i] . "</option>"; 

    
                }}
            
                
    ?> 


            
        
        
