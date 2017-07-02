<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <title>Hallur Chat</title>
        <style>
            #wrapper{
                text-align: center;
            }
            textarea{
                font-size: 30px;
                height: 500px;
                width: 80vw;
            }
            #hideForm{
                display: none;
            }
            /* for the phone*/
            @media (max-width:545px) {
                textarea{
               width: 100vw;  
               height: 300px;
            }
            #usr{
                font-size: 40px;
            }
            #subm1, #subm2{
                font-size: 30px;
            }
            #msg{
                height: 60px;
                width: 80%;
                border: solid;
            }
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <p id="usr">
            <?php
            $var = $_SESSION["name"];
            echo "user: {$var}"
            ?></p>
            <form action="nameSession.php" name="auto" id="hideForm" method="post">
                <input id="name" type="text" name="name">
                <input type="submit">
            </form>
            <form action="insertMsg.php" method="POST">
                <input id="msg" type="text" name="msg"> <br>
                <input type="submit" id="subm1" value="Send Message">
            </form>
            <form id="delForm" onsubmit="del()" method="post">
                <input type="hidden" id="psw" name="psw">
                <input type="submit" id="subm2" value="Delete All Messages">
            </form>
            <textarea id="chat">refreshing...</textarea><br><br>
            <h1>Made By: Hallur við Neyst</h1>
        </div>

        <script>

            var session = "<?php
            error_reporting(0);
            echo $_SESSION['name'];
            ?>";
            if (session === "") {
                document.getElementById("name").value = prompt("what's your name?");
                window.onload = function () {
                    document.forms['auto'].submit();

                };

            }
            function del(){
                var a = prompt("you need a password to do this");
                document.getElementById("psw").value = a;
                document.getElementById("delForm").action = "deleteMessages.php";
                
            }
            var timeout = setInterval(reloadChat, 1000);
            var timeout2 = setTimeout(scrollDown, 2100);
            function reloadChat() {
                $('#chat').load('chat.php');
            }
            function scrollDown() {
                var textarea = document.getElementById('chat');
                textarea.scrollTop = textarea.scrollHeight;
            }
        </script>   
    </body>
</html>
