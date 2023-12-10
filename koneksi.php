<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'tafull');
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($db, 'utf8');

function easter_data($data)
{
    global $db;
    if (get_magic_quotes_gpc()) $data = stripslashes($data);
    return mysqli_real_escape_string(trim($data), $db);
}
if (mysqli_connect_errno()) {
    echo "koneksi gagal : " . mysqli_connect_error();
}
