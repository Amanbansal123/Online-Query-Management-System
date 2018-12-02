<?php $root="../" ; include_once '../connection.php'; ?>

<?php include 'header.php'; ?>
<?php


if(isset($_POST['send'])) {
$userReply=$_POST['user_reply'];
$email=$_SESSION['email'];
$myquery_id =$_POST['id'];

$insert_reply = "INSERT INTO reply (myReply , email, myquery_id) VALUES ('$userReply','$email','$myquery_id')";

mysqli_query($con, $insert_reply);
echo '<div style=" margin-top: 8%;margin-bottom: 15%;margin-left:20%;margin-right:20%; "><span style="color:green;text-align:center;padding-left:30%;"><b><h1>	&#10004; </h1><h3 Style="text-align:center;">
Your Reply is saved.</h3></b></span></div>';
echo ' <meta http-equiv="refresh" content="1, index.php">';
}


?>
