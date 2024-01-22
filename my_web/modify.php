<?php
$connect = mysqli_connect("localhost", "user1", "1234", "my_web_db") or die("connect fail");
$id = $_GET['id'];
$number = $_GET['number'];
$query = "select title, content, date, id from board where number=$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$title = $rows['title'];
$content = $rows['content'];
$usrid = $rows['id'];

session_start();

$URL = "./index.php";

if (!isset($_SESSION['userid'])) {
    ?>
    <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>
    <?php
} else if ($_SESSION['userid'] == $usrid) {
    ?>
    <html>
    <head>
        <meta charset='utf-8'>
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
                margin-top: 50px;
            }

            h2 {
                text-align: center;
            }

            form {
                margin-top: 50px;
            }

            table {
                width: 100%;
                margin-top: 20px;
            }

            table tr {
                border-bottom: 1px solid #ccc;
            }

            table td {
                padding: 10px;
                vertical-align: top;
            }

            .submit-btn {
                text-align: center;
                margin-top: 20px;
            }

            input[type="text"],
            textarea {
                width: 100%;
                padding: 8px;
            }

            input[type="submit"] {
                padding: 8px 16px;
                background-color: #57A0EE;
                color: #ffffff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #2E8AE6;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <form method="get" action="modify_action.php">
            <table style="padding-top:0px" align=center width=700 border=0 cellpadding=2>
                <tr>
                    <td height=20 align=center bgcolor=#ccc><font color=white> 글수정</font></td>
                </tr>
                <tr>
                    <td bgcolor=white>
                        <table class="table2">
                            <tr>
                                <td>작성자</td>
                                <td><input type="hidden" name="id" value="<?= $_SESSION['userid'] ?>"><?= $_SESSION['userid'] ?></td>
                            </tr>
                            <tr>
                                <td>제목</td>
                                <td><input type=text name=title size=60 value="<?= $title ?>"></td>
                            </tr>
                            <tr>
                                <td>내용</td>
                                <td><textarea name=content cols=85 rows=15><?= $content ?></textarea></td>
                            </tr>
                        </table>
                        <center>
                            <input type="hidden" name="number" value="<?= $number ?>">
                            <input type="submit" value="수정">
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </body>
    </html>
    <?php
} else {
    ?>
    <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>
    <?php
}
?>
