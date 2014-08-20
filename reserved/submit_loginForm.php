<!DOCTYPE html>
<html>
    <head>
        <script>
            //FUNZIONI
            function ris() {
                var uidV = $('#input_uid').val();
                var pwV = $('#input_pw').val();
                $("#left_content").load("reserved/submit_loginCheck.php", {uid: uidV, pw: pwV}, function() {
                    $("#right_content").load("reserved/submit_loginChooser.php");
                    location.reload(true);
                });
            }
        </script>
    </head>
    <body>

        <div id="left_content">
            <input id="input_uid" placeholder="uid">
            <input id="input_pw" placeholder="password">
            <button id="button_login" onclick="ris()">Login</button>
        </div>
        <div id="right_content">
            right content
        </div>


    </body>
</html>