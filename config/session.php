<?php
function startSession(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function addToSession(string $key, $value){
    $_SESSION[$key]=$value;
}