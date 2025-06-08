<?php
function escape($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function toUpperCase($string) {
    return strtoupper($string);
}

function capitalize($string) {
    return ucwords(strtolower($string));
}

function setCookieCustom($name, $value, $expire) {
    setcookie($name, $value, time() + $expire, "/");
}
function getCookieCustom($name) {
    return $_COOKIE[$name] ?? null;
}
?>