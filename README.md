Em chờ anh trước cổng
Con chim sẻ của anh
Con chim sẻ tóc xù
Con chim sẻ của phố ta
Đừng buồn nữa nhá
Bác thợ mộc nói sai rồi
Nếu cuộc đời này toàn chuyện xấu xa
Tại sao cây táo lại nở hoa
Sao rãnh nước trong veo đến thế?
Con chim sẻ tóc xù ơi
Bác thợ mộc nói sai rồi.
<script>
  // Lấy danh sách tất cả các ô có class là "result_check_confirm"
  const resultCheckCells = document.querySelectorAll(".result_check_confirm");

  // Lặp qua danh sách các ô và thêm xử lý sự kiện khi người dùng click vào ô
  resultCheckCells.forEach((cell) => {
    cell.addEventListener("click", () => {
      // Kiểm tra nếu ô đã được đánh dấu là "NG"
      if (cell.innerText.trim() === "NG") {
        // Tìm ô cùng hàng có class là "reason_NG" và cho phép chỉnh sửa
        const reasonCell = cell.parentNode.querySelector(".reason_NG");
        reasonCell.contentEditable = true;
      }

      // Cho phép chỉnh sửa thông tin trong ô hiện tại
      cell.contentEditable = true;
    });
  });
</script>


<?php
$pageTitle = "Information about TEXT ID";
?>

