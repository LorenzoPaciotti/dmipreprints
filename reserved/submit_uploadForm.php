<div id="upload_form_div" style="margin: 20px auto;width: 100%;display: table">
    <div id="upload_table" style="margin: 0 auto;width: 100%;display: table">
        <form style="width: 50%;margin: 0 auto" enctype="multipart/form-data" action="reserved/submit_uploadPHP.php" method="POST" >
            <h2>Submit a Preprint</h2>
            <ul>
                <li>
                    <label for="uid">Titolo</label>
                </li>
                <li>
                    <textarea maxlength="100" cols="50" rows="2" type="text" class="textbox" name="titolo"></textarea>
                </li>
                <li>
                    <label for="abstract">Abstract</label>
                </li>
                <li>
                    <textarea cols="50" rows="10" maxlength="500" name="abstract" class="textbox"></textarea>
                </li>
                <li>
                    <input name="userfile" type="file" />
                </li>
                <li style="text-align: right">
                    <input type="submit" class="bottoni" value="Send File" />
                </li>
            </ul>
        </form>
    </div>
</div>