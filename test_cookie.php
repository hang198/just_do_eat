<?php
setcookie('test', 10, time() + 3000);
var_dump($_COOKIE['test']);