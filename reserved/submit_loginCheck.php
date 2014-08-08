<?php
if(isset($_SESSION['logged'])){
    //non mostrare login perché è già autenticato
    if(isset($_SESSIONE['moderator'])){
        //sessione moderatore
    }
}else{
    //deve fare login
    
}


?>
<html>
    <head>
        <script>
            //FUNZIONI
            function ris() {
                var quer = $('#input_uid').val();
                $("#right_content").load("upload/submit_uploadForm.php", {uid: quer});
            }
            //CLICK LISTENER
            $(document).ready(function() {
                $("#button_login").click(function() {
                    ris();
                });
            });
        </script>
    </head>
    <body>

        <div id="left_content">
            <input id="input_uid" placeholder="uid">
            <button id="button_login">Login</button>
        </div>
        <div id="right_content">
            right content
        </div>


    </body>
</html>