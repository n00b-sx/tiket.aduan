<?php
// Ganti 'Rahasia123' dengan password yang Anda inginkan
$password_baru = 'admin';
echo password_hash($password_baru, PASSWORD_DEFAULT);
?>