<?php
//ini_set('session.cookie_samesite', 'Strict');


session_start();
$host = 'localhost';
$dbname = 'baim';
$user = 'root'; // Domyślny użytkownik MySQL w XAMPP
$password = ''; // Domyślne hasło jest puste w XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user = :username AND pass = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['user'];
        header('Location: victim.php');
        exit;
    } else {
        $error = 'Niepoprawna nazwa użytkownika lub hasło';
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>
<body>
    <h1>Logowanie</h1>
    <form action="index.php" method="POST">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Hasło:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <button type="submit">Zaloguj się</button>
    </form>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>