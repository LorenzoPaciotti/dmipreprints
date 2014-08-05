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
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->

    </head>
    <body>
        <!-- JAVASCRIPT -->
        <script>
            //CLICK LISTENER
            $(document).ready(function() {
                $("#bottone_anno").click(function() {
                    vistaAnno();
                });
            });
            $(document).ready(function() {
                $("#bottone_keyword").click(function() {
                    vistaKeyword();
                });
            });
            //FUNZIONI
            function vistaAnno() {
                $("#contenitore_dinamico").load("main_year.php");
            }

            function vistaKeyword() {
                $("#contenitore_dinamico").load("main_keyword.php");
            }

        </script>
        <!-- -->



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
        <div id="header-wrapper" text-align="center">
            <div class="container">
                <div class="row">
                    <div class="12u">
                        <ul>
                            <li><button id="bottone_anno">list by year</li>
                            <li><button id="bottone_keyword">search by keyword</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="contenitore_dinamico">
        </div>

        <footer>

        </footer>

    </body>
</html>