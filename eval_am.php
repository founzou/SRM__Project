<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <!-- Bootstrap -->
        <link href="asset/vendors/bootstrap/dist/css/bootstrap.min.css"
              rel="stylesheet">
        <!-- Font Awesome -->
        <link href="asset/vendors/font-awesome/css/font-awesome.min.css"
              rel="stylesheet">
        <!-- NProgress -->
        <link href="asset/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="asset/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link
            href="asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
            rel="stylesheet">
        <!-- JQVMap -->
        <link href="asset/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
        <!-- bootstrap-daterangepicker -->
        <link href="asset/vendors/bootstrap-daterangepicker/daterangepicker.css"
              rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="asset/build/css/custom.min.css" rel="stylesheet">
        <!-- Datatables -->
        <link
            href="asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"
            rel="stylesheet">
        <link
            href="asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
            rel="stylesheet">
        <link
            href="asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
            rel="stylesheet">
        <link
            href="asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
            rel="stylesheet">
        <link
            href="asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
            rel="stylesheet">

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                <?php
                if (empty($_GET['frn'])) {
                    header('location: frn_am.php');
                }

                include 'template.php';
                ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="clearfix"></div>
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Evaluation en Amont</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                                    data-toggle="dropdown" role="button" aria-expanded="false"><i
                                                        class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Settings 1</a></li>
                                                    <li><a href="#">Settings 2</a></li>
                                                </ul></li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <form method="post" action="Controlleurs/add_eam.php">
                                            <input type="hidden" name="idfrn" value="<?php echo $_GET['frn']; ?>"/>
                                            <table border="1" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Domaine</th>
                                                        <th> Poids accordé % </th>
                                                        <th>Critère</th>
                                                        <th>Indicateurs </th>
                                                        <th>Prise en compte</th>
                                                        <th>Importance</th>
                                                        <th>Pondération</th>
                                                        <th>Notation</th>
                                                        <th>Note</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $tab = array("Chiffre d'affaires du fournisseur", "Capital du fournisseur", "Expérience", "Références  clients", " Portefeuille clients", "Nombre d'employés", "Distance",
                                                        "Stratégie et Culture d’entreprise", "Métiers et compétence", "politique RH", " % du CA dédié à la R&D ", "Qualité de la gestion et organisation",
                                                        "Démarche contrôle qualité", "Certifications", "Moyens de productions", "Respect des normes d’environnement reconnus", "Respect des normes d’hygiène  reconnus", "Respect des normes de Sécurité reconnus",
                                                        "Respect du code du travail marocain", "Respect de la législation Marocaine", "évolution de CA", "Achats/Ventes/dotations aux amortissements/charges de personnel", "trésorerie nette", "Résultat net",
                                                        "La Valeur Ajoutée ", "Actionnariat", "Qualification des interlocuteurs"
                                                    );
                                                    $i = 0;
                                                    foreach ($tab as $v) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                if ($i < 12) {
                                                                    $val = "Notoriété";
                                                                } else if ($i >= 12 && $i < 14) {
                                                                    $val = "Qualité";
                                                                } else if ($i >= 14 && $i < 15) {
                                                                    $val = "Logistique";
                                                                } else if ($i >= 15 && $i < 20) {
                                                                    $val = "HSE-SST";
                                                                } else if ($i >= 20 && $i < 26) {
                                                                    $val = "Economique";
                                                                } else if ($i >= 26) {
                                                                    $val = "Commercial";
                                                                }
                                                                echo $val;
                                                                ?>
                                                                <input type="hidden" name="domaine_<?php echo $i; ?>" value="<?php echo $val; ?>"/>

                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($i < 12) {
                                                                    echo "20%";
                                                                    ?>
                                                                    <input type="hidden" name="poids_<?php echo $i; ?>" id="poids_<?php echo $i; ?>" value="20"/>
                                                                    <?php
                                                                } else if ($i >= 12 && $i < 14) {
                                                                    echo "15%";
                                                                    ?>
                                                                    <input type="hidden" name="poids_<?php echo $i; ?>" id="poids_<?php echo $i; ?>" value="15"/>
                                                                    <?php
                                                                } else if ($i >= 14 && $i < 15) {
                                                                    echo "15%";
                                                                    ?>
                                                                    <input type="hidden" name="poids_<?php echo $i; ?>" id="poids_<?php echo $i; ?>" value="15"/>
                                                                    <?php
                                                                } else if ($i >= 15 && $i < 20) {
                                                                    echo "15%";
                                                                    ?>
                                                                    <input type="hidden" name="poids_<?php echo $i; ?>" id="poids_<?php echo $i; ?>" value="15"/>
                                                                    <?php
                                                                } else if ($i >= 20 && $i < 26) {
                                                                    echo "20%";
                                                                    ?>
                                                                    <input type="hidden" name="poids_<?php echo $i; ?>" id="poids_<?php echo $i; ?>" value="20"/>
                                                                    <?php
                                                                } else if ($i >= 26) {
                                                                    echo "15%";
                                                                    ?>
                                                                    <input type="hidden" name="poids_<?php echo $i; ?>" id="poids_<?php echo $i; ?>" value="15"/>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($i < 9) {
                                                                    $val = "Donnée d'entreprise";
                                                                } else if ($i >= 9 && $i < 10) {
                                                                    $val = "RH";
                                                                } else if ($i >= 10 && $i < 11) {
                                                                    $val = "R&D";
                                                                } else if ($i >= 11 && $i < 12) {
                                                                    $val = "Organisation";
                                                                } else if ($i >= 12 && $i < 14) {
                                                                    $val = "Niveau a priori";
                                                                } else if ($i >= 14 && $i < 15) {
                                                                    $val = "Production";
                                                                } else if ($i >= 15 && $i < 16) {
                                                                    $val = "Enviromennemt ";
                                                                } else if ($i >= 16 && $i < 17) {
                                                                    $val = "Hygiène";
                                                                } else if ($i >= 17 && $i < 18) {
                                                                    $val = "Sécurité";
                                                                } else if ($i >= 18 && $i < 20) {
                                                                    $val = "Juridique ";
                                                                } else if ($i >= 20 && $i < 26) {
                                                                    $val = "Santé financière";
                                                                } else if ($i >= 26) {
                                                                    $val = "Relationnel";
                                                                }
                                                                echo $val;
                                                                ?>
                                                                <input type="hidden" name="critere_<?php echo $i; ?>" value="<?php echo $val; ?>"/>

                                                            </td>
                                                            <td><?php echo $v; ?>
                                                                <input type="hidden" name="indecateur_<?php echo $i; ?>" value="<?php echo $v; ?>" />
                                                            </td>
                                                            <td>
                                                                <select name="prise_cmpt_<?php echo $i; ?>" id="prise_cmpt_<?php echo $i; ?>" onchange="notation(<?php echo $i; ?>)">
                                                                    <option value="Oui" selected="">Oui</option>
                                                                    <option value="Non">Non</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="importance_<?php echo $i; ?>" id="importance_<?php echo $i; ?>" onchange="amont(<?php echo $i; ?>)">
                                                                    <option value="Extrême importance" selected="">Extrême importance</option>
                                                                    <option value="Grande importance">Grande importance</option>
                                                                    <option value="Moyenne importance">Moyenne importance</option>
                                                                    <option value="Faible importance">Faible importance</option>
                                                                </select>
                                                            </td>
                                                            <td >
                                                                <input style="width: 100%" type="number" name="ponderation_<?php echo $i; ?>" value="4" id="ponderation_<?php echo $i; ?>" readonly=""/>
                                                            </td>
                                                            <td><input type="number" name="notation_<?php echo $i; ?>" id="notation_<?php echo $i; ?>" min="0" max="5" value="0" onkeyup="notation(<?php echo $i; ?>)" onchange="notation(<?php echo $i; ?>)"/></td>
                                                            <td >
                                                                <input style="width: 100%" type="text" name="note_<?php echo $i; ?>" value="0" id="note_<?php echo $i; ?>" readonly=""/>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                <input type="hidden" value="<?php echo $i; ?>" name="indice" id="indice">
                                                </tbody>
                                            </table>

                                            <div class="ln_solid"></div>
                                            <div class="form-horizontal form-label-left" id="resultat">
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                           for="score_finale">Note finale<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input class="form-control col-md-7 col-xs-12"
                                                               name="score_finale" readonly="" id="score_finale" type="text">
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                           for="classe">Classe<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input class="form-control col-md-7 col-xs-12"
                                                               name="classe" id="classe" readonly="" type="text" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 col-md-offset-3">
                                                        <button type="reset" class="btn btn-primary">Cancel</button>
                                                        <button id="calc_am" type="button" class="btn btn-success">Calculer</button>
                                                        <button type="submit" class="btn btn-success" id="save" disabled="">Enregistrer</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        FCA <a href="#"></a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
