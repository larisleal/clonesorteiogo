<?php
    namespace Model;
    Class sorteioNomesModel {

        //atributos de sorteio de números 
        private $qtdnomes;                //quantidade de números que serão sorteados
        private $sorteado;              //flag de validação se o sorteio foi feito
        private $erro_qtdomes;          //flag de validação para o erro qtdnomes == 0
        


        public function __construct() {
            
            $this->qtdnomes = 1;
            $this->sorteado = false;
            $this->erro_qtdnomes = false;

            
        }


        /**
         * @return mixed
         */
        public function getQtdNomes() {

            return $this->qtdnomes;
        }

        /**
         * @param mixed 
         */
        public function setQtdNomes($qtdnomes) {
            $this->$qtdnomes = $qtdnomes;
        }


        /**
         * @return mixed
         */
        public function getSorteado() {

            return $this->sorteado;
        }

        /**
         * @param mixed 
         */
        public function setSorteado($sorteado) {
            $this->$sorteado = $sorteado;
        }


        /**
         * @return mixed
         */
        public function getErroQtdNomes() {

            return $this->erro_qtdnomes;
        }

        /**
         * @param mixed 
         */
        public function setErroQtdNomes($erro_qtdnomes) {
            $this->$erro_qtdnomes = $erro_qtdnomes;
        }

        

    } //fim classe sorteioNomesModel

?>