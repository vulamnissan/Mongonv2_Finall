<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>MAIL</th>
            <th>TYPE</th>
            <th>PASSWORD</th>
        </tr>
        <?php
            $json_data = file_get_contents("users.json");
            // echo $json_data; exit;
            $products = json_decode($json_data, true);
            // echo $products; exit;

            if(count($products) != 0){
                    foreach($products["users"] as $product){
                        ?>
                <tr>
                    <td> <?php echo $product['id']?> </td>
                    <td> <?php echo $product['name'] ?>  </td>
                    <td> <?php echo $product['mail'] ?>  </td>
                    <td> <?php echo $product['Type'] ?> </td>
                    <td> <?php echo $product['Password'] ?> </td>
                </tr>
                <?php
                    }
                }
            
            
                ?>

    </table>
</body>
</html>