<?php

include('lib/conexao.php');

include('lib/protect.php');
protect(1);

 if (!isset($_SESSION))
        session_start();


$sql_usuarios = "SELECT * FROM usuarios";
$sql_query = $mysqli->query($sql_usuarios) or die($mysqli->error);
$num_usuarios = $sql_query->num_rows;

?>



<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">

                <div class="d-inline">
                    <h4>Gerenciar Usuários</h4>
                    <span>Administre os usuarios cadastrados no sistema</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Gerenciar Usuários</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
 

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">

            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'editado') { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Cadastro atualizado com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deletado') { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Cadastro deletado com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

            <div class="card">
                <div class="card-header">
                    <h5>Todos os usuários</h5>
                    <span><a href="index.php?p=cadastrar_usuario">Clique aqui para cadastrar um usuário</a> </span>

                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Créditos</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if ($num_usuarios == 0) { ?>

                                    <tr>

                                        <td colspan="5">Nenhum usuário cadastrado</td>
                                    </tr>

                                    <?php } else {

                                    while ($usuario = $sql_query->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $usuario['id']; ?></th>
                                            <td><?php echo $usuario['nome']; ?></td>
                                            <td><?php echo $usuario['email']; ?></td>
                                            <td>R$ <?php echo number_format($usuario['creditos'], 2, ',', '.'); ?></td>
                                            <td><a href="index.php?p=editar_usuario&id=<?php echo $usuario['id']; ?>">Editar</a> | <a href="index.php?p=deletar_usuario&id=<?php echo $usuario['id']; ?>">Deletar</a></td>
                                        </tr>

                                <?php }
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>