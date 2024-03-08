<?php 
    require_once 'classes/user.class.php';

    if(isset($_POST['login'])) {
        $user = find_user($_POST['login']['username']);
        
        if($user && $user->checkPassword($_POST['login']['password'])) {
            // inlog gelukt
        } else {
            // Inlog mislukt
            $login_error = TRUE;
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>2SWD-PHP7 les 3</h1>

    <?php 
        if(isset($login_error)) {
            ?>
            <p>Login failed</p>
            <?php
        } elseif(isset($user)) {
            ?>
            <p>Login success, welcome: <?php echo $user->username; ?></p>
            <?php
        }
    ?>

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