
<thead>
    <th>Check</th>
    <th>Text ID</th>
    <th>Content</th>
    <th>Display type</th>
    <th>Meter type</th>
    <th>Number of lines</th>
    <th>US English</th>
    <th>Japanese</th>
    <th>Vehicle already applied</th>
    <th>Manager approval status</th>
    <th>Date</th>
</thead>

<tbody id="table_manager">
    <?php
        $json_data = file_get_contents("../../../../Data/UserData/file_draft_change_value_text_id.json");
        $products = json_decode($json_data, true); 
        $data = array_values($products);
        $k = 0;
        if(count($products) != 0){
            foreach($products as $key => $value){  
                echo "<tr>";
                $k = $k + 1;
                echo "<td><input type = \"checkbox\" class = \"checkbox_Active;\"/></td> ";
                echo "<td class = \"checkbox_Active\" >" . $key . "</td>"; 
                for($i = $k - 1;$i < count($data); $i++){      
            ?>
                    <td  > <?php echo $data[$i]['Content'] ?>  </td>
                    <td > <?php echo $data[$i]['Display type'] ?> </td>
                    <td > <?php echo $data[$i]['Meter type'] ?> </td>
                    <td > <?php echo $data[$i]['Number of lines']?> </td>
                    <td > <?php echo $data[$i]['US English'] ?>  </td>
                    <td > <?php echo $data[$i]['Japanese'] ?>  </td>
                    <td > <?php echo $data[$i]['Vehicle already applied'] ?> </td> 
                    <td > <?php echo $data[$i]['Manager approval status'] ?> </td> 
                    <td > <?php echo $data[$i]['Date'] ?> </td>
                </tr>
            <?php
                    break;
                }
            }
        }         
?>
</tbody>