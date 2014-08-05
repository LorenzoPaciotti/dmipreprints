<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <style>
            #left{
                max-width: 20%;
                text-align: left;
            }
            #right{
                max-width: 40%;
                text-align: right;
            }
            #keyword_container{
                display: table-row;
            }
        </style>
    </head>
    <body>
        <script>
            //FUNZIONI
            function ris() {

                var quer = $('#input_keyword').val();
                alert(quer);
                $("#right_content").load("main_keyword_content.php", {query : quer});
            }
            //CLICK LISTENER
            $(document).ready(function() {
                $("#button_cerca_keyword").click(function() {
                    alert('button_cerca_keyword');
                    ris();
                });
            });


        </script>
        <div id="keyword_container">
            <div id="left">
                <div id="left_content">
                    <ul>
                        <li>
                            <input placeholder="keyword" id="input_keyword">
                            <button id="button_cerca_keyword">Search</button>
                        </li>
                    </ul>
                </div>

            </div>
            <div id="right">
                <div id="right_content">
                    right content
                </div>
            </div>
        </div>


    </body>
</html>