<?php
session_start();

#############################
// Change your password here:
#############################
$passwort = "Birthday";

// If you want to implement a logout button into your HTML file use "index.php?logout=1"
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if (isset($_POST['password'])) {
    if ($_POST['password'] === $passwort) {
        $_SESSION['authenticated'] = true;
    } else {
        $error = "Falsches Passwort!";
    }
}

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    ?>
    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>System Locked</title>
        <style>
            body { background-color: #1e1e2e; color: #cdd6f4; font-family: 'JetBrains Mono', monospace; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
            .login-box { background-color: #181825; padding: 40px; border: 2px solid #303446; border-left: 6px solid #cba6f7; box-shadow: 0 10px 30px rgba(0,0,0,0.5); text-align: center; }
            .title { color: #cba6f7; margin-bottom: 20px; font-weight: bold; letter-spacing: 2px; }
            input { padding: 10px; margin-bottom: 15px; background: transparent; border: none; border-bottom: 1px solid #303446; color: #a6e3a1; outline: none; text-align: center; letter-spacing: 2px; font-family: inherit; }
            input:focus { border-bottom-color: #a6e3a1; }
            button { background: transparent; border: 1px solid #303446; color: #cdd6f4; padding: 8px 15px; font-family: inherit; cursor: pointer; text-transform: uppercase; transition: all 0.2s; }
            button:hover { background-color: #303446; color: #a6e3a1; border-color: #a6e3a1; }
        </style>
    </head>
    <body>
        <div class="login-box">
            <div class="title">> SYSTEM_AUTH_REQUIRED_</div>
            <?php if(isset($error)) echo "<div style='color: #f38ba8; font-size: 12px; margin-bottom: 10px;'>[ ERROR: $error ]</div>"; ?>
            <form method="POST">
                <input type="password" name="password" placeholder="PASSWORD" autofocus autocomplete="current-password">
                <br>
                <button type="submit">Unlock</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}
##############################
// Insert your HTML File here:
// Dont forget to block the file in .htaccess !
##############################
include('yourfile.html');
?>