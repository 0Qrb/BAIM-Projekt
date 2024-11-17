<?php
//ini_set('session.cookie_samesite', 'Strict');
//ini_set('session.cookie_httponly', 1);

session_start();

// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION['user_id'])) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go na stronę logowania
    header('Location: index.php');
    exit;
}

// Pobierz nazwę użytkownika i ID z sesji
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Strona Ofiara</title>
</head>
<body>
    <h1>Witaj, <?php echo $username; ?>!</h1>
    <p>Twój ID: <?php echo $user_id; ?></p>

    <form action="change_password.php" method="GET">
        <button type="submit">Zmień hasło</button>
    </form>
    <a href="xss.php">Xss</a><br>
    <a href="cookie_aes.php">Szyfrowane ciasteczka</a>
</body>
</html>