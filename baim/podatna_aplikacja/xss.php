<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona podatna na XSS</title>
</head>
<body>
    <h1>Formularz kontaktowy</h1>
    <form action="xss.php" method="POST">
        <label for="message">Wiadomość:</label><br>
        <textarea name="message" id="message" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Wyślij">
    </form>

    <h2>Ostatnia wiadomość:</h2>
    <div id="output">
        <?php
            if (isset($_POST['message'])) {
                echo $_POST['message']; // Bez zabezpieczeń - podatność na XSS!
            }
        ?>
    </div>
    <a href="victim.php">Back</a>
</body>
</html>