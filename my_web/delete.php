<?php
    $connect = mysqli_connect('localhost', 'user1', '1234', 'my_web_db') or die("fail");

    $number = $_GET['number']; // 삭제할 게시글의 번호

    // 게시글 삭제 쿼리
    $query = "DELETE FROM board WHERE number = '$number'";

    $result = $connect->query($query);

    if ($result) {
        // 삭제가 성공하면 알림을 표시하고 목록 페이지로 이동
        echo '<script>alert("게시글이 삭제되었습니다.");</script>';
        echo '<script>location.replace("./index.php");</script>';
    } else {
        // 삭제가 실패하면 알림을 표시
        echo '<script>alert("게시글 삭제에 실패했습니다.");</script>';
    }

    mysqli_close($connect);
?>
