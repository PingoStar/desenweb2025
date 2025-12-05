<?php
    class session {
         
        private $status;
        private $usiario;
        private $datahorainicio;
        private $datahoraultimoacesso;

        public function iniciasessao() {
            session_start();
            $this->sessionid = session_id();
            if ($this->getdadosessao("datahorainicio"))
        }


    }


?>