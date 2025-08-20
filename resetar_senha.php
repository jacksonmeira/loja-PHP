<?php

$msg = false;
if (isset($_POST['email'])) {

    include('lib/conexao.php');
    include('lib/generateRamdomString.php');
    include('lib/enviarEmail.php');

    $email = $mysqli->escape_string($_POST['email']);
    $sql_query = $mysqli->query("SELECT id, nome FROM usuarios WHERE email= '$email'") or die($mysqli->error);
    $result = $sql_query->fetch_assoc();

    if ($result && isset($result['id'])) {

        $nova_senha = generateRandomString(6);
        $nova_senha_criptografada = password_hash($nova_senha, PASSWORD_DEFAULT);
        $id_usuario = $result['id'];
        $mysqli->query("UPDATE usuarios SET senha = '$nova_senha_criptografada' WHERE id = '$id_usuario'");

        enviarEmail(
            $email,
            "Sua nova senha na plataforma",
            " <h1>Olá " . $result['nome'] . "</h1>
        <p>Uma nova senha foi definida para sua conta.</p>
        <p><b>Nova senha:</b> $nova_senha </p>"
        );

        $msg = "Se o seu e-mail existir no bamco de dados, uma nova senha sera enviado para ele.";
    } else {
        $msg = "Se o seu e-mail existir no bamco de dados, uma nova senha sera enviado para ele.";
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
                                        <h3 class="text-left txt-primary">Esqueceu sua senha?</h3>
                                    </div>
                                </div>
                                <hr />

                                <?php if ($msg !== false) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $msg; ?>
                                    </div>
                                <?php } ?>

                                <p style="color: black;">Digite seu e-mail e a senha será enviada para ele.</p>

                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" placeholder="Seu e-mail">
                                    <span class="md-line"></span>
                                </div>


                                <div class="col-sm-12 col-xs-12 forgot-phone text-left">
                                    <a href="login.php" class="text-right f-w-600 text-inverse">Voltar</a>
                                </div>

                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-Secondary btn-md btn-block waves-effect text-center m-b-20">Enviar minha senha</button>
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