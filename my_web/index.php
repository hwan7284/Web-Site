<!DOCTYPE html>
<html>
<head>
        <meta charset='utf-8'>
        <style>
                body {
                        font-family: Arial, sans-serif;
                        background-color: #f1f1f1;
                }
                h2 {
                        text-align: center;
                        margin-top: 20px;
                }
                .container {
                        max-width: 800px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                        border: 1px solid #444444;
                }
                .login-btn {
                        float: right;
                }
                .greeting {
                        float: right;
                        margin-right: 10px;
                }
                table {
                        border-collapse: collapse;
                        width: 100%;
                        margin-top: 20px;
                }
                th {
                        background-color: #efefef;
                        border: 1px solid #444444;
                        padding: 10px;
                }
                td {
                        border: 1px solid #444444;
                        padding: 10px;
                }
                .even {
                        background: #efefef;
                }
                .text {
                        text-align: center;
                        padding-top: 20px;
                        color: #000000;
                }
                .text:hover {
                        text-decoration: underline;
                }
                a:link,
                a:visited {
                        color: #57A0EE;
                        text-decoration: none;
                }
                a:hover {
                        text-decoration: underline;
                }
                .write-link {
                        text-align: center;
                        margin-top: 20px;
                }
                .write-link a {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #57A0EE;
                        color: #ffffff;
                        border-radius: 4px;
                        text-decoration: none;
                }
                .write-link a:hover {
                        background-color: #2E8AE6;
                }
        </style>
</head>
<body>
        <div class="container">
                <h1 align=center>영화 동호회 사이트</h1>
                <hr>
                <?php
                        $connect = mysqli_connect('localhost', 'user1', '1234', 'my_web_db') or die("connect fail");
                        $query = "select * from board order by number desc";
                        $result = $connect->query($query);
                        $total = mysqli_num_rows($result);
                        session_start();
                        if (isset($_SESSION['userid'])) {
                                echo '<div class="login-btn">';
                                echo '<button onclick="location.href=\'./logout.php\'">로그아웃</button>';
                                echo '</div>';
                                echo '<div class="greeting">' . $_SESSION['userid'] . ' 님 안녕하세요</div>';
                                echo '<br/>';
                        } else {
                                echo '<div class="login-btn">';
                                echo '<button onclick="location.href=\'./login.php\'">로그인</button>';
                                echo '</div>';
                                echo '<br />';
                        }
                ?>
                <h2>영화후기 게시판</h2>
                <table>
                        <thead>
                                <tr>
                                        <th width="50">번호</th>
                                        <th width="500">제목</th>
                                        <th width="100">작성자</th>
                                        <th width="200">날짜</th>
                                        <th width="50">조회수</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php
                                while ($rows = mysqli_fetch_assoc($result)) {
                                        if ($total % 2 == 0) {
                                ?>
                                                <tr class="even">
                                        <?php
                                        } else {
                                        ?>
                                                <tr>
                                        <?php
                                        }
                                        ?>
                                        <td width="50"><?php echo $total ?></td>
                                        <td width="500">
                                                <a href="view.php?number=<?php echo $rows['number'] ?>">
                                                        <?php echo $rows['title'] ?>
                                                </a>
                                        </td>
                                        <td width="100"><?php echo $rows['id'] ?></td>
                                        <td width="200"><?php echo $rows['date'] ?></td>
                                        <td width="50"><?php echo $rows['hit'] ?></td>
                                        </tr>
                                <?php
                                        $total--;
                                }
                                ?>
                        </tbody>
                </table>
                <div class="write-link">
                    <a href="./write.php">글쓰기</a>
            </div>
    </div>
    </body>
</html>