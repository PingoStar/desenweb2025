<?php 
    
    require_once "jogador.php";

    class timedefutebol {

        private $nome;
        private $anofundacao;
        private $jogadores = array();

        public function setnome ($nome) {
            $this->nome = $nome;
        }
        public function addjogador($nome, $posicao, $datadenascimento){
            $jogador = new jogador();
            $jogador->setnome($nome);
            $jogador->setposicao($posicao);
            $jogador->setdatadenascimento($datadenascimento);

            array_push($this->jogadores, $jogador);
        }
        public function listajogadores() {
            foreach ($this->jogadores as $jogador) {
                echo "Nome;" . $jogador->getnome() . "<br>";
                echo "Posicao;" . $jogador->getposicao() . "<br>";
                echo "Data de Nascimento; " . $jogador->getdatadenascimento() . "<br>"; 
                echo "----------------------------------------<br>";
            }
        }


    }

?>