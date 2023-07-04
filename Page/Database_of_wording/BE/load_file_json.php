
    <table>
        <?php
            $json_data = file_get_contents("test123.json");
            $products = json_decode($json_data, true);
            $ind = 0;
            $arr_data = array();
            if(count($products) != 0){
                    
                    foreach($products as $key => $value){
                        $arr_data[$ind] = $key;
                        $ind = $ind +1;
                    }
                    $index = 0;
                    for($i=0;$i < count($arr_data);$i++){
                        foreach($products as $key => $value){
                            foreach($products[$key] as $keys => $values){
                                $arr_data[$i][$index] = $values;
                                $index = $index + 1;
                            }
                            
                        }
                    
                    }
                    print_r($arr_data);
            }
                        ?>
                

    </table>