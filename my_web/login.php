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
                        max-width: 400px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                        border: 1px solid #444444;
                        margin-top: 100px;
                }
                h2 {
                        text-align: center;
                }
                form {
                        text-align: center;
                }
                form p {
                        margin-bottom: 10px;
                }
                input[type="text"],
                input[type="password"] {
                        padding: 8px;
                        width: 200px;
                }
                input[type="submit"],
                button {
                        padding: 8px 16px;
                        background-color: #57A0EE;
                        color: #ffffff;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                }
                input[type="submit"]:hover,
                button:hover {
                        background-color: #2E8AE6;
                }
                #join {
                        margin-top: 20px;
                        display: inline-block;
                        background-color: transparent;
                        color: #57A0EE;
                        border: none;
                        cursor: pointer;
                        text-decoration: underline;
                }
        </style>
</head>
<body>
        <div class="container">
                <h2>로그인</h2>
                <form method="get" action="login_action.php">
                        <p>ID: <input name="id" type="text"></p>
                        <p>PW: <input name="pw" type="password"></p>
                        <input type="submit" value="로그인">
                </form>
                <br/>
                <button id="join" onclick="location.href='./join.php'">회원가입</button>
        </div>
</body>
</html>