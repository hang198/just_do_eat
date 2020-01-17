<?php
session_start();
if ($_SESSION['position'] !== 'admin') {
    header("location: ../../index.php ");
}

?>