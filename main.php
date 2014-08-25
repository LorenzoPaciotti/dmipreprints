<!DOCTYPE html>
<html>
    <head>
        <title>DMIPreprints</title>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script src="js/config.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-panels.min.js"></script>
        <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
        </noscript>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/tabelle.css">
        <link rel="stylesheet" type="text/css" href="css/controlli.css">
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->

    </head>
    <body>
        <script>
            //FUNZIONI
            function vistaAnno() {
                $("#contenitore_dinamico").load("search/main_year.php");
            }

            function vistaKeyword() {
                $("#contenitore_dinamico").load("search/main_keyword.php");
            }

        </script>
        <div id="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="12u">
                        <header id="header">
                            <h1><a href="#" id="logo">DMI Preprints</a></h1>
                            <nav id="nav">
                                <a href="main.php" class="current-page-item">Search a Preprint</a>
                                <a href="reserved.php">Reserved Area</a>
                            </nav>
                        </header>

                    </div>
                </div>
            </div>
        </div>
        <div id="div_menu_ricerca" class="contenitore">
            <div>
                <table>
                    <tr>
                        <td>
                            <button id="bottone_anno" class="bottoni" onclick="vistaAnno()">list by year</button>
                        </td>
                        <td>
                            <button id="bottone_keyword" class="bottoni" onclick="vistaKeyword()">search by keyword</button>
                        </td>
                    </tr>
                </table>
            </div>

        </div>

        <div id="contenitore_dinamico" class="contenitore">
        </div>

        <footer>

        </footer>

    </body>
</html>
