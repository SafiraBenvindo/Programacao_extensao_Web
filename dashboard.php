<?php
/*
    REQUIRE INICIAIS.
*/
require_once 'php/session_check.php';
require_once 'php/db.class.php';
require_once 'php/dbconnect.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Metas Padrões -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="language" content="pt-br" />
    <!-- Metas Descritivos -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="company" content="">
     <meta name="author" content="Bianca Leticia" />
    <!-- Titulo & Favicon -->
    <title>Dashboard | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Dashboard | Sistema Controle de Estoque - SCE" />
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <!-- Framework Semantic UI -->
    <link rel="stylesheet" href="assets/theme/semantic.min.css">
    <!-- Style Custom -->
    <link rel="stylesheet" href="assets/css/style_custom_dashboard.css">
    <!-- Dependecias JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/theme/semantic.min.js"></script>
    <!-- Script Custom -->
    <script src="assets/js/script_custom_dashboard.js"></script>
    <?php 
    include('menu.php'); 
    ?>
</head>

<body>
    <!-- PAINEL DE NAVEGAÇÃO EM TRILHA -->
    <div class="ui grid container segment">
        <div class="row one column">
            <div class="column">
                <div class="ui breadcrumb">
                    <a class="section active" href="dashboard.php">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FUNCÕES -->
    <div class="ui grid container segment">
        <div class="row one column">
            <div class="column">
                <div class="ui six cards stackable">
                    <div class="card">
                        <div class="content">
                            <div class="header">Broche</div>
                            <div class="meta">Sei la</div>
                            <div class="description">
                                <div class="ui statistics">
                                    <div class="statistic">
                                        <div class="value">
                                            5
                                        </div>
                                        <div class="label">
                                            Broche roxo
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="content">
                        <div class="header">Camiseta</div>
                            <div class="meta">Roupa</div>
                            <div class="description">
                                <div class="ui statistics">
                                    <div class="statistic">
                                        <div class="value">
                                            7
                                        </div>
                                        <div class="label">
                                            Camiseta PP
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DIV QUE FECHA O TEMPLATE 'MENU' -->
    </div>
</body>

</html>