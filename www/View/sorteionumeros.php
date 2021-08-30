<?php 

    if(isset($_SESSION['numerosorteado'])) {
        $numerosArray = unserialize($_SESSION['numerosorteado']);
    }

    if(isset($_SESSION['qtdnumeros'])) {
        $qtdnum = unserialize($_SESSION['qtdnumeros']);
    }

    
    if(isset($_SESSION['sorteado'])) {
        $sorteadoFlag = unserialize($_SESSION['sorteado']);
    }

    if(isset($_SESSION['erro_minmax'])) {
        $erro_minmax = unserialize($_SESSION['erro_minmax']);
    }

    if(isset($_SESSION['erro_qtdnum'])) {
        $erro_qtdnum = unserialize($_SESSION['erro_qtdnum']);
    }

    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="SorteioGram, sorteios rápidos para Instagram! Rápido, fácil e confiável." />
    <meta name="author" content="SorteioGram" />
    <title>Sorteio de Números - SorteioGram</title>

    <!-- Favicon-->
    <!-- <link rel="icon" type="image/x-icon" href="" /> -->
    <!-- Font Awesome icons -->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Includes CSS -->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg bg-orange fixed-top" id="mainNav">
        <div class="container">
            <a href="<?php echo DIRPAGE . "/home" ?>">
                <img src="./assets/logo.png" alt="Logo SorteioGram" width="120" height="17.5"></img>
            </a>
            <button class="navbar-toggler font-weight-bold bg-orange text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo DIRPAGE . "/sorteionumeros" ?>">Sorteio de Números</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo DIRPAGE . "/sorteionomes" ?>">Sorteio de Nomes</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo DIRPAGE . "/sorteioamigo" ?>">Amigo Secreto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Apresentação-->
    <header class="presentation bg-orange text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Apresentação Heading-->
            <h1 class="presentation-heading text-capitalize mb-0">SorteioGram</h1>
        </div>
    </header>

    <!-- Sorteio de Números Section-->
    <section class="page-section portfolio" id="numeros">
        <div class="container">
            <!-- Sorteio de Números Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-strongorange mb-0">Sorteio de Números</h2>
            <!-- Icon -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-sort-numeric-up"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Sorteio de Números Form-->
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="card bg-light">
                        <div class="card-header text-center bg-light">
                            <h2>Sortear Números</h2>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">
                                Crie o sorteio de números facilmente utilizando essa opção, você poderá salvar o sorteio
                                e compartilhar o link com outras pessoas.
                            </h6>
                            <br />
                            <form method="POST" action="<?php echo DIRPAGE . "/sortearnumeros" ?>">
                                <div class="form-group">
                                    <small id="qtdnum_Help" class="form-text text-muted">Quantos números terá o sorteio?</small>
                                    <input type="number" class="form-control" id="qtdnum" name="qtdnum" required>
                                </div>
                                <div class="form-group">
                                    <small id="min-num_Help" class="form-text text-muted">Entre</small>
                                    <input type="number" class="form-control" id="min_num" name="min_num" placeholder="Valor mínimo no sorteio" required>
                                </div>
                                <div class="form-group">
                                    <small id="max-num_Help" class="form-text text-muted">e</small>
                                    <input type="number" class="form-control" id="max_num" name="max_num" placeholder="Valor máximo no sorteio" required>
                                </div>
                                <br />
                                <div style="text-align: center;">
                                    <button type="submit" name="sorteianumero"
                                        class="btn btn-lg bg-strongorange text-uppercase">Sortear Números</button>
                                </div>
                                <br/>

                            </form>

                            <!-- Mensagem de erro caso o min_num > max_num -->
                            <?php if($erro_minmax == true) { ?>
                                <div class="alert alert-danger text-center" role="alert">
                                   O valor mínimo do sorteio deve ser menor do que o valor máximo. Tente novamente, por gentileza.
                                </div>

                            <?php 
                                    } //fim if min_num > max_num
                            ?>

                            <!-- Mensagem de erro caso qtdnum == 0 -->
                            <?php if($erro_qtdnum == true) { ?>
                                <div class="alert alert-danger text-center" role="alert">
                                   A quantidade de números do sorteio deve ser maior do que zero. Tente novamente, por favor.
                                </div>

                            <?php 
                                    } //fim if min_num > max_num
                            ?>

                            <!-- Instanciando array de números sorteados e imprimindo -->
                            <?php if($sorteadoFlag == true) { ?>        
                                    
                                    <div class="alert alert-success" role="alert">
                                        <h5 class="text-center">Resultado: </h5>
                                        <?php for($i = 0; $i < $qtdnum; $i++) { ?>
                                                <?php   if($i == ($qtdnum-1)) {
                                                            echo($numerosArray[$i]);
                                                        }        
                                                        else {
                                                            echo($numerosArray[$i].' — ');
                                                        }
                                                ?> 
                                        <?php } //fim for numerosArray ?>
                                        <hr>
                                        <p class="mb-0">Link do sorteio:</p>
                                    </div>
                            <?php   
                                }   //fim if sorteadoFlag   
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Sites Parceiros-->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Sites Parceiros</h4>
                    <a class="text-light" href="https://growsocial.com.br/?ref=link_sorteiogram.com" target="_blank">Ganhe mais seguidores no Instagram</a><br />
                    <a class="text-light" href="https://linkna.bio/?ref=link_sorteiogram.com" target="_blank">Crie seu Link na Bio</a><br />
                    <a class="text-light" href="https://sorteiotok.com/?ref=link_sorteiogram.com" target="_blank">Sorteio no TikTok</a><br />
                </div>
                <!-- Mapa do Site-->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Mapa do Site</h4>
                    <a class="text-light" href="<?php echo DIRPAGE . "/sorteionumeros" ?>">Sorteio de Números</a><br />
                    <a class="text-light" href="<?php echo DIRPAGE . "/sorteionomes" ?>">Sorteio de Nomes</a><br />
                    <a class="text-light" href="<?php echo DIRPAGE . "/sorteioamigo" ?>">Amigo Secreto</a><br />
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Todos os direitos reservados &copy; SorteioGram 2021</small></div>
    </div>


    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>