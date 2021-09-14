<?php
    namespace Controller;
    include_once('Model/sorteioNumerosModel.php');
    use Model\sorteioNumerosModel;
    include_once('Model/sorteioNomesModel.php');
    use Model\sorteioNomesModel;


    class indexController {


         //---------------------------------- FUNÇÕES ----------------------------------//

        //função de sorteio de números
        public function sortearNumeros() {
            
            if(isset($_POST['sorteianumero'])) {
                 

                $qtdnum = $_POST['qtdnum'];     
                $min_num = $_POST['min_num'];   
                $max_num = $_POST['max_num'];


                $numerosorteado = array();      
                $sorteado = false;
                $erro_minmax = false;           
                $erro_qtdnum = false;         
                

                if($min_num > $max_num) {
                    $erro_minmax = true;                 
                    $_SESSION['erro_minmax'] = serialize($erro_minmax);
                } //fim if de validação de entrada min_num > max_num

                if($qtdnum == 0) {
                    $erro_qtdnum = true;                 
                    $_SESSION['erro_qtdnum'] = serialize($erro_qtdnum);
                } //fim if de validação de entrada qtdnum == 0

                else {

                    for($indice = 0; $indice < $qtdnum; $indice++) {
                        array_push($numerosorteado, (rand($min_num, $max_num)));
                    }

                    $sorteado = true;
                    $_SESSION['numerosorteado'] = serialize($numerosorteado);
                    $_SESSION['sorteado'] = serialize($sorteado);
                    
                } //fim else

                $_SESSION['qtdnumeros'] = serialize($qtdnum);
                include('View/sorteionumeros.php');
                
               
            } //fim if [sorteianumero]
        } //fim função sortearNumeros


        //função de sorteio de nomes
        public function sortearNomes() {
            
            if(isset($_POST['sorteianomes'])) {
                
                $qtdnomes = $_POST['qtdnomes'];     //quantidade de nomes que serão sorteados
                $nomes = $_POST['nomes'];           //nomes a sortear
                $nomesorteado = array();            //array de nomes sorteados
                $sorteado = false;                  //flag de validação se o sorteio foi feito
                $erro_qtdnomes = false;             //flag de validação para o erro qtdnomes == 0


                if($qtdnomes == 0) {
                    $erro_qtdnomes = true;                 
                    $_SESSION['erro_qtdnomes'] = serialize($erro_qtdnomes);
                } //fim if de validação de entrada qtdnomes == 0

                else {
                   
                    $arrayNomes = preg_split('/\s+/', $nomes);

                    for($indice = 0; $indice < $qtdnomes; $indice++) {
                        $indicesorteado = rand(0, count($arrayNomes)-1);
                        array_push($nomesorteado, $arrayNomes[$indicesorteado]);
                       unset($arrayNomes[$indicesorteado]);
                    }
                    

                    $sorteado = true;
                    $_SESSION['nomesorteado'] = serialize($nomesorteado);
                    $_SESSION['sorteado'] = serialize($sorteado);
                    
                } //fim else
                
                $_SESSION['qtdnomes'] = serialize($qtdnomes);
                include('View/sorteionomes.php');
                
               
            } //fim if [sorteianomes]
        } //fim função sortearNomes


        //---------------------------------- ROTAS ----------------------------------//

        //encaminhamento para home.php
        public function goHome() {
            require('View/home.php');
        }

        //encaminhamento para sorteionumeros.php
        public function goSorteioNumeros() {

            $sorteioNumero = new sorteioNumerosModel();

            //instanciação de variáveis para primeira execução da tela
            $qtdnum = $sorteioNumero->getQtdNum();
            $min_num = $sorteioNumero->getMin_Num();
            $max_num = $sorteioNumero->getMax_Num();
            $sorteado = $sorteioNumero->getSorteado();
            $erro_minmax = $sorteioNumero->getErroMinMax();
            $erro_qtdnum = $sorteioNumero->getErroQtdNum();


            $_SESSION['qtdnum'] = serialize($qtdnum);
            $_SESSION['min_num'] = serialize($min_num);
            $_SESSION['max_num'] = serialize($max_num);
            $_SESSION['sorteado'] = serialize($sorteado);
            $_SESSION['erro_minmax'] = serialize($erro_minmax);
            $_SESSION['erro_qtdnum'] = serialize($erro_qtdnum);

            require('View/sorteionumeros.php');
        }

        //encaminhamento para sorteionomes.php
        public function goSorteioNomes() {

            $sorteioNome = new sorteioNomesModel();

            //instanciação de variáveis para a primeira execução da tela
            $qtdnomes = $sorteioNome->getQtdNomes();
            $sorteado = $sorteioNome->getSorteado();
            $erro_qtdnomes = $sorteioNome->getErroQtdNomes();


            $_SESSION['qtdnomes'] = serialize($qtdnomes);
            $_SESSION['sorteado'] = serialize($sorteado);
            $_SESSION['erro_qtdnomes'] = serialize($erro_qtdnomes);

            require('View/sorteionomes.php');
        }

        //encaminhamento para sorteioamigo.php
        public function goSorteioAmigo() {
            require('View/sorteioamigo.php');
        }







    } //fim indexController
    
?>