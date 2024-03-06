<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test</h1>

    <form action="login.php" method="post">
        <h2>Login</h2>

        <p>
            <label for="login-username">Username</label>
            <input type="text" name="login[username]" id="login-username">
        </p>

        <p>
            <label for="login-password">Password</label>
            <input type="password" name="login[password]" id="login-password">
        </p>

        <p>
            <button type="submit">Login</button>
        </p>
    </form>
</body>
</html>