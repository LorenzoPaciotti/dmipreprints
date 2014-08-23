<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/dmipreprints/' . 'mysql/db_select.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dmipreprints/' . 'mysql/db_update.php';
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
                    idTgt = idTgt.replace('"', '');
                    if (confirm("Eliminare?")) {
                        $("#cont_feedback").load("reserved/submit_removeFilePHP.php", {id: idTgt});
                        location.reload();
                    }
                } else {
                    if (cmd === "appr") {
                        var idTgt = event.target.id.substring(6);
                        idTgt = idTgt.replace('"', '');
                        if (confirm("Approvare?")) {
                            $("#cont_feedback").load("reserved/submit_approvePaper.php", {id: idTgt});
                            location.reload();
                        }
                    }
                }
            }
        });
    });
</script>
<div id="contenitore">
    <div>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/dmipreprints/' . 'reserved/submit_uploadForm.php'; ?>
    </div>
    <div>
        <h2>preprint caricati</h2>
        <?php stampaTabellaCompleta(interrogaPerUID($_SESSION['uid']), 1) ?>
        <h2>tutti i preprint nel database</h2>
        <?php stampaTabellaCompleta(interrogaWhole(), 1); ?>
    </div>
</div>
<div id="cont_feedback">

</div>