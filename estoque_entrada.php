<?php
/*
    REQUIRE INICIAIS.
*/
require_once 'php/db.class.php';
require_once 'php/dbconnect.php';
/*
    CONEXÃO COM A BASE DE DADOS.
*/
$objDB = new db();
$objDB->dbConnect($strServer, $strUser, $strPass, $strDB);
$strTable = "produto";
$SQL = "*";
$where = "WHERE status_produto = '1'";
$objDB->dbSelect($strTable, $SQL, $where);
$numTotal = mysqli_num_rows($objDB->resultado);
/*
    VERIFICO SE A QUERY RETORNOU ALGUM RESULTADO.
*/
if ($numTotal > 0) {
    /*
        INICIO MINHA TABELA COMO VAZIA.
    */
    $table = "";
    /*
        LAÇO QUE ORGANIZA O RESULTADO DA QUERY,
        E MOSTRA NA TABELA.
    */
    for ($i = 0; $i < $numTotal; $i++) {
        $id = $objDB->mysqli_result($objDB->resultado, $i, "id_produto");
        $nome =  $objDB->mysqli_result($objDB->resultado, $i, "nome_produto");
        $qtd =  $objDB->mysqli_result($objDB->resultado, $i, "qtd_produto");
        $preco =  $objDB->mysqli_result($objDB->resultado, $i, "preco_produto");
        $cat =  $objDB->mysqli_result($objDB->resultado, $i, "categoria_produto");
        $hdID = base64_encode($id);
        $table .="<tr>
                    <td>$nome</td>
                    <td>$qtd</td>
                    <td>$preco</td>
                    <td>$cat</td>
                    <td class=\"center aligned\">
                    <div class=\"ui buttons\">
                        <form action=\"entrada_produto.php\" method=\"GET\" id=\"editUser\">
                            <input type=\"hidden\" name=\"id\" value=\"$hdID\">
                            <button class=\"ui button yellow submit\">Entrada</button>
                        </form>       
                        <div class=\"or\" data-text=\"OU\"></div>
                        <form action=\"saida_produto.php\" method=\"GET\" id=\"editUser\">
                            <input type=\"hidden\" name=\"id\" value=\"$hdID\">
                            <button class=\"ui button negative submit\" >Saída</button>
                    </div>
                    </td>
                </tr>";
    }
}
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
    <title>Estoque - Entrada/Saída | Sistema Controle de Estoque - SCE</title>
    <meta name="title" content="Estoque - Entrada | Sistema Controle de Estoque - SCE" />
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
    <script src="assets/js/DataTable.js"></script>
    <!--Scripts DataTable-->
    <script src="assets/plugins/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/DataTables/DataTables-1.10.21/js/dataTables.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/DataTables/Responsive-2.2.5/js/responsive.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <!-- SCRIPTS SEM USO NO MOMENTO
    <script src="assets/plugins/DataTables/Buttons-1.6.2/js/buttons.semanticui.min.js"></script>
    <script src="assets/plugins/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="assets/plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="assets/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script> 
    -->
    <!--Styles DataTable-->
    <link rel="stylesheet" href="assets/plugins/DataTables/DataTables-1.10.21/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="assets/plugins/DataTables/Responsive-2.2.5/css/responsive.semanticui.min.css">
    <!-- STYLE SEM USO NO MOMENTO
    <link rel="stylesheet" href="assets/plugins/DataTables/Buttons-1.6.2/css/buttons.semanticui.min.css">
    -->
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
                    <a class="section" href="dashboard.php">Dashboard</a>
                    <i class="right arrow icon divider"></i>
                    <a class="section active">Estoque - Entrada/Saída</a>
                </div>
            </div>
        </div>
    </div>
    <!-- TABELA DE DADOS -->
    <div class="ui grid container segment">
        <div class="row one column">
            <div class="column">
                <h2 class="ui dividing header">Estoque - Entrada/Saída</h2>
                <table class="ui striped celled table display responsive nowrap unstackable grey-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>PRODUTO</th>
                            <th>QUANTIDADE</th>
                            <th>VALOR UNIDADE</th>
                            <th>CATEGORIA</th>
                            <th>AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $table; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- DIV QUE FECHA O TEMPLATE 'MENU' -->
    </div>
</body>

</html>