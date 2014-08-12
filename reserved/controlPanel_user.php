<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body id="body">
        <script>
            function backToHome(){
                $("#body").load("reserved/logout.php");
                $("#body").load("reserved.php");
            }
        </script>
        pannello controllo utente
        <button onclick="backToHome()">logout</button>
    </body>
</html>