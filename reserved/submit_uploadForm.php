<div id="upload_form_div">
    <div>
        <form class="contact_form" enctype="multipart/form-data" action="reserved/submit_uploadPHP.php" method="POST" >
            <ul style="width: 100%; display:table; margin:0 auto;">
                <li>
                    <h2>Submit a Preprint</h2>
                </li>
                <li>
                    <label for="uid">Titolo:</label>
                                <input type="text" class="textbox" name="titolo"/>
                </li>
                <li>
                    <label for="abstract">Abstract:</label>
                                <input type="text" class="textbox" name="abstract"/>
                </li>
                <li>
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                    File da allegare: <input name="userfile" type="file" />
                </li>
                <li>
                    <input type="submit" class="bottoni" value="Send File" />
                </li>
            </ul>
        </form>
    </div>
</div>