<?php

#richiesta anni nel db
require_once getcwd().'/../mysql/db_select.php';
$lista_anni = listaAnni();


?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <style>
            #left{
                max-width: 20%;
                text-align: center;
            }
            #right{
                max-width: 40%;
                text-align: center;
            }
            #keyword_container{
                display: table-row;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <script>
            //FUNZIONI
            function ris(quer) {
                $("#right_content").load("search/main_year_content.php", {query : quer});
            }
        </script>
        <div id="keyword_container">
            <div id="left">
                <div id="left_content">
                    <ul>
                    <?php
                    while ($row = mysqli_fetch_array($lista_anni)){
                        $annoRiga = $row['anno'];
                        echo '<li>';
                        echo '<a href="#" onclick=(ris('.$annoRiga.'))>';
                        print $row['anno'];
                        echo '</a>';
                        echo '</li>';
                    }
                    
                    ?>
                    </ul>
                </div>

            </div>
            <div id="right">
                <div id="right_content">
                    right content
                </div>
            </div>
        </div>


    </body>
</html>
