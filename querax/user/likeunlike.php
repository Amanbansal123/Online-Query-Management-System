
<?php $root="../" ; include_once '../connection.php'; ?>
<?php


// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$userid =  $_SESSION['email'];
$postid = $_POST['postid'];
$type = $_POST['type'];

// Check entry within table

$query = "SELECT COUNT(*) AS cntpost FROM feedback WHERE email='$userid' and myquery_id=".$postid;
$result = mysqli_query($con,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

$pretype="SELECT * FROM feedback WHERE email='$userid' and myquery_id=".$postid;
$pretype1= mysqli_query($con,$pretype);
$pretype2 = mysqli_fetch_array($pretype1);

$likes = "SELECT likes FROM query WHERE  myquery_id=".$postid;


if($count == 0){
    $insertquery = "INSERT INTO feedback(email,myquery_id,type) values('$userid','$postid','$type')";
    if($type==1){
           $updatelikes = "UPDATE query SET likes=(likes+1) where myquery_id=" . $postid;
           mysqli_query($con,$updatelikes);
    }
    mysqli_query($con,$insertquery);
}else {
  $updatequery = "UPDATE feedback SET type='$type' where email='$userid' and myquery_id=" . $postid;
    if($type==1 AND $pretype2['type']==0 ){
      $updatelikes = "UPDATE query SET likes=(likes+1) where myquery_id=" . $postid;
    }
    if($type==0 AND $pretype2['type']==1  ){
        $updatelikes = "UPDATE query SET likes=(likes-1) where myquery_id=" . $postid;
    }
  mysqli_query($con,$updatequery);
  mysqli_query($con,$updatelikes);
}


// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM feedback WHERE type=1 and myquery_id=".$postid;
$result = mysqli_query($con,$query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM feedback WHERE type=0 and myquery_id=".$postid;
$result = mysqli_query($con,$query);
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];


$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

echo json_encode($return_arr);
