<!DOCTYPE>
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
                <?php
                session_start();
                $URL = "./index.php";
                if (!isset($_SESSION['userid'])) {
                        echo "<script>
                                alert('로그인이 필요합니다');
                                location.replace('$URL');
                            </script>";
                }
                ?>
                <form method="get" action="write_action.php">
                        <table align="center">
                                <tr>
                                        <td colspan="2" bgcolor="#ccc" align="center">
                                                <font color="white">글쓰기</font>
                                        </td>
                                </tr>
                                <tr>
                                        <td>작성자</td>
                                        <td>
                                                <input type="hidden" name="name" value="<?= $_SESSION['userid'] ?>">
                                                <?= $_SESSION['userid'] ?>
                                        </td>
                                </tr>
                                <tr>
                                        <td>제목</td>
                                        <td><input type="text" name="title" size="60"></td>
                                </tr>
                                <tr>
                                        <td>내용</td>
                                        <td><textarea name="content" cols="85" rows="15"></textarea></td>
                                </tr>
                        </table>
                        <div class="submit-btn">
                                <input type="submit" value="작성">
                        </div>
                </form>
        </div>
</body>
</html>