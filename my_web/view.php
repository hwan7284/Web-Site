<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #444444;
        margin-top: 30px;
    }
    .title {
        height: 30px;
        text-align: center;
        background-color: #cccccc;
        color: white;
        width: 100%;
        line-height: 30px;
    }
    .info-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        background-color: #eeeeee;
    }
    .info-row span {
        font-weight: bold;
    }
    .content {
        padding: 20px;
        border-top: 1px solid #444444;
        min-height: 300px;
    }
    .btn-container {
        text-align: center;
        margin-top: 20px;
    }
    .btn {
        padding: 8px 16px;
        background-color: #57A0EE;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin-right: 10px;
    }
    .btn:hover {
        background-color: #2E8AE6;
    }
    .div-with-horizontal-line {
        border-bottom: 1px solid #444444;
    }
    .div-with-vertical-line {
        border-left: 1px solid #444444;
    }
</style>
</head>
<body>
    <div class="container">
        <?php
            $connect = mysqli_connect('localhost', 'user1', '1234', 'my_web_db');
            $number = $_GET['number'];
            session_start();
            $query = "select title, content, date, hit, id from board where number = $number";
            $result = $connect->query($query);
            $rows = mysqli_fetch_assoc($result);
            $hit = "update board set hit=hit+1 where number=$number";

            $connect->query($hit);
        ?>

        <div class="div-with-horizontal-line"></div>
        <div class="title"><?php echo $rows['title']?></div>
        <div class="div-with-horizontal-line"></div>
        <div class="info-row">
            <span>| 작성자 |</span>
            <span><?php echo $rows['id']?></span>
            
            <span>| 조회수 |</span>
            <span><?php echo $rows['hit']?></span>
        </div>
        <div class="content">
            <?php echo $rows['content']?>
        </div>
        <div class="btn-container">
            <button class="btn" onclick="location.href='./index.php'">목록으로</button>
            <?php if (isset($_SESSION['userid'])) { ?>
                <button class="btn" onclick="location.href='./modify.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">수정</button>
                <button class="btn" onclick="location.href='./delete.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
            <?php } ?>
        </div>
    </div>
</body>
</html>