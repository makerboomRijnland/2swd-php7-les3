<?php

require_once './models/user.class.php';

$login = $_POST['login'] ?? array();

if(isset($login['username']) && isset($login['password'])) {
    
    // In toekomst User opzoeken met username in database.
    $user = new User('admin', password_hash("admin123", PASSWORD_DEFAULT));

    // Wachtwoord controle
    if($user->checkPassword($_POST['login']['password'])) {
        header('Location: index.php');
    } else {
        $error = "Gebruikersnaam / Wachtwoord incorrect";
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

    <form action="login.php" method="post">
        <h2>Login</h2>

        <?php if(isset($login['error'])) { ?>

            <p><?= $login['error']; ?></p>
                
        <?php } ?>

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