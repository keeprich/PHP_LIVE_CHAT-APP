<?php
// this help ajax to auto refresh the page
include 'chatDb.php';

// selecting and displaying all data from the database and looping through them

// $query = "SELECT * FROM chat;";
// $run =  mysqli_query($conn, $query);
// if (mysql_num_rows($run) > 0) {

 
// }
$sql = "SELECT * FROM chat;";
$result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) :
        // echo $row["chat_message"]. "<br>";
    
// } 


?>

    <div id="chat_data">
    <span style="color: red;"><?php echo $row["chat_userName"]; ?></span> :
    <span style="color: green;"><?php echo $row["chat_message"]; ?></span>
    <span style="float: right;"><?php echo formate_date($row["chat_date"]);?></span>
    </div>
    
    <?php endwhile ?>