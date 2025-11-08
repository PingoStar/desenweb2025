<?php
    $_SESSION = new session();
    if ($SESSION->iniciasessao()) {
        echo "sessão iniciada com sucesso.";

    $usuario = new usuario();
    $usuario->setnome("Anderson");
    $usuario->setlogin("pingo");
    $usuario->setpass("senha123");
    


    }


?>