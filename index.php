<!DOCTYPE html>
<html>
    <head>
        <title>DMIPreprints</title>
    </head>
    <body>
        <?php
        //include 'auth.php';
        //echo '</br></br>Script auth concluso';
        $filename = cnf.ini;
        parse_ini_file ($filename);
        require_once 'main.php';
        ?>
    </body>
</html>
