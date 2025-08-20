<?php
session_start();

$erro = false;

if (isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include('lib/conexao.php');

    $email = $mysqli->escape_string($_POST['email']);
    $senha = $mysqli->escape_string($_POST['senha']);

    $sql_query = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'") or die($mysqli->error);
    $usuario = $sql_query->fetch_assoc();

    
    if ($usuario && isset($usuario['senha']) && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario['id'];
        $_SESSION['admin'] = $usuario['admin'];
        header("Location: index.php");
        exit();
    } else {
        $erro = "Email e/ou senha inválidos";
    }
} else if ($_POST) {
    
    if (empty($_POST['email']) || empty($_POST['senha'])) {
        $erro = "Preencha todos os campos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Entrar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
     
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
     
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
     
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
     
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
     
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="fix-menu">
     
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

   

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                   
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form method="POST" class="md-float-material">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Entrar</h3>
                                    </div>
                                </div>
                                <hr />

                                <?php if ($erro !== false) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $erro; ?>
                                    </div>
                                <?php } ?>

                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" placeholder="Seu e-mail">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" name="senha" class="form-control" placeholder="Sua senha">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-25 text-left">

                                    <div class="col-sm-12 col-xs-12 forgot-phone text-right">
                                        <a href="resetar_senha.php" class="text-right f-w-600 text-inverse"> Esqueceu sua senha?</a>
                                    </div>

                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Acessar</button>
                                    </div>
                                </div>


                            </div>
                        </form>
                         
                    </div>
                   
                </div>
                
            </div>
            
        </div>
        
    </section>

    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>