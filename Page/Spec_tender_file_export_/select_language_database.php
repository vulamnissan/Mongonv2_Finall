

<?php

use JetBrains\PhpStorm\Language;

function connect_db_1($servername,$username,$password,$database){
    $conn = mysqli_connect($servername,$username,$password,$database);
    if (!$conn){
        die("connection failed: " . mysqli_connect_errno());
    }
    else{
        
        // echo "connect";
        return $conn;
        
    }
}
$connect1 = connect_db_1('localhost','root','','mongonv2');
        $sql1 = "SHOW COLUMNS FROM vehicle_language ";
        $result1 = $connect1-> query($sql1);
        $row1 = mysqli_fetch_array($result1);
        $arr1 = array();
        $arr1 = array('US_English',
'Japanese_text',	
'Arabic_text'	,
'BrazilianPortuguese_text',	
'British_text',		
'CanadianFrench_text',	
'Chinese_text',	
'Czech_text',	
'Danish_text',	
'Dutch_text',	
'Finnish_text',		
'French_text',	
'German_text',	
'Greek_text',	
'Hungarian_text',		
'Italian_text',		
'Korea_text',		
'MexicanSpanish_text',	
'Norwegian_text',	
'Polish_text',	
'Portuguese_text',	
'Russian_text',		
'Slovak_text',	
'Spanish_text',	
'Swedish_text',		
'Taiwanese_text',	
'Thai_text',	
'Turkish_text',		
'Ukrainian_text');
        // while($row1 = mysqli_fetch_array($result1)){

        //     $i1 = $i1+1;
        //     $arr1[$i1] = $row1['Field']; 
        // }
        ?>
        <table>
        <thead>
        <tr>
            <th>Database</th>
            <th>Select</th>
        </tr>
        </thead>
        <!-- <tbody> -->
        <?php
        for($i1=0;$i1<count($arr1);$i1++){
            echo "<tr>";
            echo "<td id = 'language_".$i1+1 ."' >" .$arr1[$i1] . "</td>";
            echo "<td><input type=\"checkbox\" id = '".$i1+5 ."' class='checkbox_name'></td>";
            echo "</tr>";
        }
        $connect1 -> close();
        ?>
        <!-- </tbody> -->
        </table>
        




        
        
