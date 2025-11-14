<?php
namespace Model;

class Pessoa {

    private $nome;
    private $sobrenome;
    private $email;
    private $cidade;
    private $estado;

    public function __construct($nome, $sobrenome, $email, $cidade, $estado) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    // GETTERS
    public function getNome() { return $this->nome; }
    public function getSobrenome() { return $this->sobrenome; }
    public function getEmail() { return $this->email; }
    public function getCidade() { return $this->cidade; }
    public function getEstado() { return $this->estado; }

    // SETTERS
    public function setNome($v) { $this->nome = $v; }
    public function setSobrenome($v) { $this->sobrenome = $v; }
    public function setEmail($v) { $this->email = $v; }
    public function setCidade($v) { $this->cidade = $v; }
    public function setEstado($v) { $this->estado = $v; }

    // OPERAÇÕES
    public function getNomeCompleto() {
        return $this->nome . " " . $this->sobrenome;
    }

    public function toJSON() {
        return json_encode([
            "nome" => $this->nome,
            "sobrenome" => $this->sobrenome,
            "email" => $this->email,
            "cidade" => $this->cidade,
            "estado" => $this->estado
        ], JSON_PRETTY_PRINT);
    }
}
