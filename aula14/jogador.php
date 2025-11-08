<?php 
    class jogador {

        private $nome;
        private $posicao;
        private $datadenascimento;

        public function getnome() {     
            return $this->nome;
        }
        public function setnome($nome) {
            $this->nome = $nome; 
        } 
        public function getposicao() {
            return $this->posicao;
        }
        public function setposicao() {
            $this->posicao = $posicao;
        }
        public function getdatadenascimento() {
            return $this->datadenascimento;
        }
        public function setdatadenascimento() {
            $this->datadenascimento = $datadenascimento;
        }

    }

?>