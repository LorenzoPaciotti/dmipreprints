<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/dmipreprints/' . 'mysql/db_select.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dmipreprints/' . 'search/main_tabella.php';
print_r(" Logged in as: ");
print_r($_SESSION['nome']);
print_r(" UID: " . $_SESSION['uid']);
print_r($_SESSION['logged_type']);
?>

<button onclick="logout()" id="button_logout">logout</button>
<script>
    $(document).ready(function() {
        $("button").click(function(event) {
            if (event.target.id !== "button_logout") {
                var cmd = event.target.id.substring(0, 4);
                if (cmd === "elim") {
                    var idTgt = event.target.id.substring(6);
                    idTgt = idTgt.replace('"','');
                    if (confirm("Eliminare?")) {
                        $("#cont_feedback").load("reserved/submit_removeFilePHP.php", {id: idTgt});
                        location.reload();
                    }
                }
            }
        });
    });
</script>
<div id="contenitore">
    <form enctype="multipart/form-data" action="reserved/submit_uploadPHP.php" method="POST">
        <ul>
            <li>
                <h2>Submit a Preprint</h2>
                <!--<span class="required_notification">* Denotes Required Field</span>-->
            </li>
            <li>
                <!-- identità e dati -->
                <label for="uid">Titolo:</label>
                <input type="text" name="titolo"/>
                <label for="abstract">Abstract:</label>
                <input type="text" name="abstract"/>
                <label for="collaboratori">Collaboratori:</label>
                <input type="text" name="collaboratori"</label>
            </li>
            <li>
                <!-- parte file -->
                <!-- MAX_FILE_SIZE deve precedere campo di input del nome file -->
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <!-- Il nome dell'elemento di input determina il nome nell'array $_FILES -->
                File da allegare: <input name="userfile" type="file" />
            </li>
            <li>
                <input type="submit" value="Send File" />
            </li>
        </ul>
    </form>
    <div>
        <h2>Your Preprints</h2>
        <?php stampaTabellaCompleta(interrogaPerUID($_SESSION['uid']),0); ?>
    </div>
</div>
<div id="cont_feedback">

</div>