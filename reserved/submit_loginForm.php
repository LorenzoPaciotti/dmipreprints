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

        <div id="left_content" class="contenitore">
            <table width="10%" style="margin: 0 auto">
                <tr>
                    <td>
                        <input id="input_uid" class="textbox" placeholder="uid">
                    </td>
                    <td>
                        <input id="input_pw" class="textbox" placeholder="password">
                    </td>
                </tr>
            </table>
            <div style="margin: 0 auto">
                <button id="button_login" class="bottoni" onclick="ris()">Login</button>
            </div>
            
            
        </div>
        <div id="right_content">
            right content
        </div>


    </body>
</html>