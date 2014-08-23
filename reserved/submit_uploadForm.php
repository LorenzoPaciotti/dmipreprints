<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="/css/uploadForm.css"/>

    </head>
    <body id="upload_body">
        <div id="contenitore">
            <form enctype="multipart/form-data" action="upload/submit_uploadPHP.php" method="POST">
                <ul>
                    <li>
                        <h2>Submit a Preprint</h2>
                        <!--<span class="required_notification">* Denotes Required Field</span>-->
                    </li>
                    <table>
                        <tr>
                            <td>
                                <label for="uid">Titolo:</label>
                                <input type="text" name="titolo"/>
                            </td>
                            <td>
                                <label for="abstract">Abstract:</label>
                                <input type="text" name="abstract"/>
                            </td>
                        </tr>
                    </table>
                    <li>
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                        File da allegare: <input class= "bottoni" name="userfile" type="file" />
                    </li>
                    <li>
                        <input type="submit" class="bottoni" value="Send File" />
                    </li>
                </ul>
            </form>
        </div>
    </body>
</html>