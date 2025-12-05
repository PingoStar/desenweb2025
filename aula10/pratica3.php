<?php
session_start();
logout(); // destrói sessão
header("Location: login.php"); // volta para a página de login
exit;
