<?php
        $connect = mysqli_connect('localhost', 'user1', '1234', 'my_web_db') or die("fail");

        $id = $_GET['id'];
        $pw = $_GET['pw'];
        $email = $_GET['email'];

        $date = date('Y-m-d H:i:s');
        if (empty($id) || empty($pw) || empty($email)) {
                echo "<script>alert('입력값을 모두 채워주세요.');
                history.back();</script>";
        } else {
        // 아이디 중복 검사
        $query = "SELECT COUNT(*) AS count FROM member WHERE id = '$id'";
        $result = $connect->query($query);
        
if ($result) {
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count > 0) {
        // 이미 존재하는 아이디인 경우
        echo "<script>alert('이미 존재하는 아이디입니다.');</script>";
        echo "<script>location.replace('./join.php');</script>";
        exit();
    } else {
        // 존재하지 않는 아이디인 경우, 회원 가입 처리
        $query = "INSERT INTO member (id, pw, email, date, permit) VALUES ('$id', '$pw', '$email', '$date', 0)";
        $result = $connect->query($query);

        if ($result) {
            // 가입이 완료된 경우
            echo "<script>alert('가입되었습니다.');</script>";
            echo "<script>location.replace('./login.php');</script>";
            exit();
        } else {
            // 가입 실패한 경우
            echo "<script>alert('가입에 실패하였습니다.');</script>";
            echo "<script>location.replace('./join.php');</script>";
            exit();
        }
    }
} else {
    echo "쿼리 실행 오류: " . $connect->error;
}

mysqli_close($connect);
        }
?>