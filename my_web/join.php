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
                input[type="password"],
                input[type="email"] {
                        padding: 8px;
                        width: 200px;
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
                <h2>회원가입</h2>
                <form method="get" action="join_action.php">
                        <p>ID: <input type="text" name="id"></p>
                        <p>PW: <input type="password" name="pw"></p>
                        <p>Email: <input type="email" name="email"></p>
                        <input type="submit" value="회원가입">
                </form>
        </div>
</body>
</html>
