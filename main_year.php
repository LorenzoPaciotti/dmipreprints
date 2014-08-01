<?php
/* questo script deve visualizzare un listato diviso per anno di tutti i preprint */
?>

<html>
    <head>
        <style type="text/css">
            .row { vertical-align: top; height:auto !important; }
            .list {display:none; }
            .show {display: none; }
            .hide:target + .show {display: inline; }
            .hide:target {display: none; }
            .hide:target ~ .list {display:inline; }
            @media print { .hide, .show { display: none; } }
        </style>
    </head>
    <body>
        
        <?php
        include 'mysql/db_conn.php';
        connettiDBManager();
        selezionaSchema();

            $query = 'select * from PRINTS';
            $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
            mysqli_close($db_connect);
        ?>
        
        <div class="row">
            <a href="#hide1" class="hide" id="hide1">Expand</a>
            <a href="#show1" class="show" id="show1">Collapse</a>
            <div class="list">
                <ul>
                    <?php
                    echo '<table>';
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td>';
                        print_r($row['timestamp']);
                        echo '</td>';
                        echo '<td>';
                        print_r ('<a href="download/download.php">PDF</a>');
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    ?>
                    <li>Item 1</li>
                    <li>Item 2</li>
                    <li>Item 3</li>
                </ul>
            </div>
        </div>
        
        <?php
        
            echo '<div id="divCONT">';
            echo '<table>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>';
                
                echo '</td>';
                echo '<td>';
                print_r($row['titolo']);
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
        ?>

    </body>
</html>