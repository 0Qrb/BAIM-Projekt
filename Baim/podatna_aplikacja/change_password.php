<?php
//ini_set('session.cookie_samesite', 'Strict');
//ini_set('session.cookie_httponly', 1);

session_start();

// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$host = 'localhost';
$dbname = 'baim';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

$message = '';

// Jeśli formularz został przesłany metodą POST, wykonaj zmianę hasła
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'];
    $user_id = $_SESSION['user_id'];

    // Aktualizacja hasła użytkownika w bazie danych
    $stmt = $pdo->prepare("UPDATE users SET pass = :new_password WHERE id = :user_id");
    $stmt->execute(['new_password' => $new_password, 'user_id' => $user_id]);

    $message = "Hasło zostało pomyślnie zmienione.";
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zmień Hasło</title>
</head>
<body>
    <h1>Zmień Hasło</h1>
    
    <?php if ($message): ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="change_password.php" method="POST">
        <label for="new_password">Nowe Hasło:</label>
        <input type="password" name="new_password" id="new_password" required>
        <button type="submit">Zmień hasło</button>
    </form>
	<a href="victim.php">Back</a><br>
</body>
</html>