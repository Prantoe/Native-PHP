<?php
include_once("functions.php");
?>

<?php
if (!in_array($mod, array('login', 'home', '', 'hasil')) && !_session('login'))
    $mod = 'login';

if (file_exists($mod . '.php'))
    include $mod . '.php';
else
    include 'pages.php';
?>