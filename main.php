<!DOCTYPE html>
<html>
    <head>
        <title>DMIPreprints</title>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.0.js"></script>
        <script src="js/config.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-panels.min.js"></script>
        <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    </head>
    <body>
        <!-- JAVASCRIPT/JQUERY -->
        <script>
            //listener click
            $(document).ready(function() {
                $("#cerca_autore_button").click(function() {
                    vistaAutore();
                });
            });
            $(document).ready(function() {
                $("#cerca_anno_button").click(function() {
                    vistaAnno();
                });
            });
            
            //FUNZIONI
            function apriContenitoreDinamico() {

                $("#contenitore_dinamico").toggleClass("contenitore_dinamico_espanso");
                var className = $('#contenitore_dinamico').attr('class');
                if (className === "contenitore_dinamico_base") {
                    $("#contenitore_dinamico").empty();
                }
            }
            function vistaAutore() {
                //apriContenitoreDinamico();
                //var className = $('#contenitore_dinamico').attr('class');
                $("#container_dinamico").load("main_autore.php");
                /*
                 * if (className !== "contenitore_dinamico_base") {
                    //$("#contenitore_dinamico").load("cruscotto_gestioneFornitori.php");
                }
                */
                return true;
            }
            function vistaAnno(){
                $("#container_dinamico").load("main_year.php");
            }
        

        </script>

        <div id="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="12u">

                        <header id="header">
                            <h1><a href="#" id="logo">DMI Preprints</a></h1>
                            <nav id="nav">
                                <a href="main.php" class="current-page-item">Search Preprint</a>
                                <a href="submit.php">Submit Preprint</a>
                            </nav>
                        </header>

                    </div>
                </div>
            </div>
        </div>
        <div id="container_parametri_ric">
            <div id="parametri" class="container">
                <div class="row">
                    <div class="12u">

                        <header id="header">
                            <h1><a href="#" id="logo">preprint search</a></h1>
                            <nav id="nav">
                                <input type="button" content="list by year" id="cerca_anno_button" class="current-page-item">
                                <input type="button" id="cerca_autore_button">search by author
                                <input type="button" id="cerca_keyword_button">search by keyword
                            </nav>
                        </header>

                    </div>
                </div>
            </div>
        </div>
        <div id="container_dinamico">
            container_dinamico
        </div>
        <footer>

        </footer>
    </body>
</html>
