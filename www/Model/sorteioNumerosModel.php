<?php
    namespace Model;
    Class sorteioNumerosModel {

        //atributos de sorteio de números 
        private $qtdnum;                //quantidade de números que serão sorteados
        private $min_num;               //valor mínimo a sortear
        private $max_num;               //valor máximo a sortear
        private $sorteado;              //flag de validação se o sorteio foi feito
        private $erro_minmax;           //flag de validação para erro de min_num > max_num
        private $erro_qtdnum;           //flag de validação para o erro qtdnum == 0
        


        public function __construct() {
            
            $this->qtdnum = 1;
            $this->min_num = 1;
            $this->max_num = 100;
            $this->sorteado = false;
            $this->erro_minmax = false;
            $this->erro_qtdnum = false;

            
        }


        /**
         * @return mixed
         */
        public function getQtdNum() {

            return $this->qtdnum;
        }

        /**
         * @param mixed 
         */
        public function setQtdNum($qtdnum) {
            $this->$qtdnum = $qtdnum;
        }

        /**
         * @return mixed
         */
        public function getMin_Num() {

            return $this->min_num;
        }

        /**
         * @param mixed 
         */
        public function setMin_Num($min_num) {
            $this->$min_num = $min_num;
        }


        /**
         * @return mixed
         */
        public function getMax_Num() {

            return $this->max_num;
        }

        /**
         * @param mixed 
         */
        public function setMax_Num($max_num) {
            $this->$max_num = $max_num;
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
        public function getErroMinMax() {

            return $this->erro_minmax;
        }

        /**
         * @param mixed 
         */
        public function setErroMinMax($erro_minmax) {
            $this->$erro_minmax = $erro_minmax;
        }

            /**
         * @return mixed
         */
        public function getErroQtdNum() {

            return $this->erro_qtdnum;
        }

        /**
         * @param mixed 
         */
        public function setErroQtdNum($erro_qtdnum) {
            $this->$erro_qtdnum = $erro_qtdnum;
        }

        

    } //fim classe sorteioNumerosModel

?>