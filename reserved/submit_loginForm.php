<html>
    <head>
        <script>
            //FUNZIONI
            function ris() {
                var uidV = $('#input_uid').val();
                var pwV = $('#input_pw').val();
                $("#left_content").load("reserved/submit_loginCheck.php", {uid: uidV, pw:pwV});
                $("#right_content").load("reserved/submit_loginChooser.php");
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
            <input id="input_pw" placeholder="password">
            <button id="button_login">Login</button>
        </div>
        <div id="right_content">
            right content
        </div>


    </body>
</html>