<?php
setcookie(
    'LOGGED_USER', //nom de cookies
    '', //email
    [
        'expires' => time() + 365*24*3600, //3600 sec 1h
        'secure' => true,
        'httponly' => true,
    ]
);