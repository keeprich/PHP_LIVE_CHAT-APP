<?php
include_once "chatDb.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat App</title>
    <link rel="stylesheet" href="style.css" media="all">
    <!-- AJEX FUNCTION -->
    <script>
    function ajax() {
        var req = new XMLHttpRequest();

        req.onreadystatechange = function () {
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }
         req.open('GET', 'chat.php', true);
         req.send();

        //  aid chat to display on two screen
        setInterval (function(){ajax()}, 1000);
    }
    </script>
</head>
<!-- calling the ajax function in the body tag -->
<body onload="ajax();">
    <h1 style ="text-align: center;">CHAT APP</h1>
    <div id="container">
    <div id="chat_box">
        <!-- create a div tag with an id "chat", leave it empty -->
        <div id="chat"></div>
    </div>
    <form method="post" action="index.php">
    <input type="text" name="chat_userName" placeholder="enter text">
    <textarea name="chat_message" placeholder="enter message"></textarea>
    <input type="submit" name="submit" value="Send it">
    </form>

<?php
// INSERTING DATA INTO DATABASE
// check if button is clicked ie "sent it"
if (isset($_POST['submit'])) {

    // getting and storing input from the user
    $name_entered = $_POST['chat_userName'];
    $message_entered = $_POST['chat_message'];

    // WE WILL ONLY USE THE chat_userName AND chat_message BECAUSE THE ID AND THE CHAT_DATE WILL BE GENERATED FOR US
    $query = "INSERT INTO chat (chat_userName, chat_message) value ('$name_entered', ' $message_entered')";

    // run the code now
    $run = $conn->query($query);
    
    if ($run) {
        // the chat_tone.wav contain sound which will play when a message is sent. the hidden means we dont want the user to see the file also the loop is false cuz, we want it to play onec 
        echo "<embed loop ='false' scr='chat_tone.wav' hidden='true' autoplay='true'/>";
    }
}
?>

    </div>
</body>
</html>