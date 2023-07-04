<?php
$link_file = "../../../Data/UserData/file_draft_limit_length_add_new.json";
$fileToDelete = $link_file; // Đường dẫn tới tệp tin JSON cần xóa

if (unlink($fileToDelete)) {
    echo 'Tệp tin JSON đã được xóa thành công.';
} else {
    echo 'Lỗi xóa tệp tin JSON.';
}
?>