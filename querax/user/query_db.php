<?php $root="../" ; include_once '../connection.php'; ?>

<?php include 'header.php'; ?>
<?php

if(isset($_POST['send'])) {

$myQuery = $_POST['comments'];
$email= $_SESSION['email'];
$insert_query = "INSERT INTO query (myQuery , email) VALUES ('$myQuery','$email')";

   mysqli_query($con, $insert_query);
  echo '<div style=" margin-top: 8%;margin-bottom: 15%;margin-left:20%;margin-right:20%; "><span style="color:green;text-align:center;padding-left:30%;"><b><h1>	&#10004; </h1><h3 Style="text-align:center;">
  Your Query is filed.</h3></b></span></div>';

echo ' <meta http-equiv="refresh" content="1,index.php">';
}

?>
