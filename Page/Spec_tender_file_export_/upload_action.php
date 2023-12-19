<?php
  //TOKEN check 
  $token = filter_input(INPUT_POST, 'token');
  if (empty($_SESSION['csrf_token']) || $token !== $SESSION['csrf_token']) {
    die('Token is not valid. Please use the official screen.');
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "update_to_the_spec_file/";

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["excelFile"]["name"]);
    $_SESSION["file_upload"] = htmlspecialchars(basename($_FILES["excelFile"]["name"]));
    $_SESSION["uploads_file"] = htmlspecialchars(basename($_FILES["excelFile"]["name"]));

    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if ($fileType == "xls" || $fileType == "xlsx") {
        if (move_uploaded_file($_FILES["excelFile"]["tmp_name"], $target_file)) {
            echo "File " . htmlspecialchars(basename($_FILES["excelFile"]["name"])) . " is uploaded successfully.";
        } else {
            echo "Warning : File is not uploaded.";
        }
    } else {
        echo "Only accept excel file with format : .xls or .xlsx.";
    }
}
?>
