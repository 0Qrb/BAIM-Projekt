<?php

$key = '12345678901234567890123456789012'; // 32 znaki dla AES-256
$iv = substr(hash('sha256', 'my_iv_secret'), 0, 16); 


function encrypt_cookie($data, $key, $iv) {
    return base64_encode(openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv));
}


function decrypt_cookie($encryptedData, $key, $iv) {
    return openssl_decrypt(base64_decode($encryptedData), 'AES-256-CBC', $key, 0, $iv);
}


$cookieValue = "ProjektBaim";
$encryptedValue = encrypt_cookie($cookieValue, $key, $iv);
setcookie("secure_cookie", $encryptedValue, time() + (86400 * 30), "/"); // Ciasteczko na 30 dni

// Odczyt i odszyfrowanie ciasteczka
if (isset($_COOKIE['secure_cookie'])) 
{
    $decryptedValue = decrypt_cookie($_COOKIE['secure_cookie'], $key, $iv);
} 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Strona Ofiara</title>
</head>
<body>
    <h1>ciasteczko odszyfrowane, <?php echo $decryptedValue; ?>!</h1>
    <h1>ciasteczko zaszyfrowane, <?php echo $encryptedValue; ?>!</h1>
    
    <a href="victim.php">Back</a>
</body>
</html>