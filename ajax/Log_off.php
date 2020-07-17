<?php 
session_start();
// Очистить массив $_SESSION полностью
session_unset();
 
// Удалить сессионную переменную
unset($_SESSION['id_user']);
 
// Удалить временное хранилище (файл сессии) на сервере
session_destroy();
?>