<?php $root="../" ; include_once '../connection.php'; ?>
<?php include '../user_session.php'; ?>

<?php include 'header.php'; ?>

    <hr style="margin-left: 3%;">

  <head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch_query.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });


});
</script>

      <link href="style.css" type="text/css" rel="stylesheet" />




</head>

<div class="container">
 <div class="row" style="margin:25px 0px 40px 0px">


<?php
$email = $_SESSION['email'];
$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$result2 = mysqli_query($con, $sql);
$row2 = mysqli_fetch_array($result2);
$_SESSION['firstname']=$row2['firstname'];
$_SESSION['lastname']=$row2['lastname'];
$_SESSION['city']=$row2['city'];
$_SESSION['country']=$row2['country'];
$_SESSION['dob']=$row2['dob'];

 ?>
 <!---------------Profile section--------------------------------------->
  <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
      <div class="text-center" style="background-color:white ;border: 1px solid #b9b0b0;border-radius:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding-bottom:5px;margin-bottom:5px;" class="link_box">
        <h4 class="text-center" class="w3-center">My Profile</h4>
        <p ><img src="../avatar3.png" class="avator" style="height:106px;width:106px; vertical-align: middle; border-radius: 50%;" alt="Avatar"></p>
        <hr>
        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></p>
        <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION['city'] ?> <?php echo $_SESSION['country'] ?></p>
        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION['dob'] ?></p>
      </div><br>

     <div>
         <form action='pastReply.php'>  <button href="pastReply.php" style="width: 100%;">Your Replied Query</button></form>
         <form action='pastFeedback.php'><button href="pastFeedback.php" style="width: 100%;">Your Liked Query</button></form>
         <form action='index.php'><button href="pastQuery.php" style="width: 100%;">Your Query</button></form>


     </div>

  </div>
  <!---------------Mid Column --------------------------------------------->



<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
    <div style="background-color:white ;border: 1px solid #b9b0b0;border-radius:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding-bottom:5px;margin-bottom:5px;">
    <!--  <form role="form" method="POST" id="reused_form" action="query_db.php" >
    --><div style="margin:5px">
           <h4 class="text-center">Search Query</h4>
                   <div class="row">
                   <div class="col-sm-12 col-lg-12 form-group">
                    <!-- <input class="form-control" type="text" name="comments1" id="comments" placeholder="Your Query" maxlength="300" onkeyup="getStates(this.value)"/>-->

                      <div class="input-group">
                       <input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" />
                       <span class="input-group-addon">Search</span>
                      </div>

                     <div class="input-group" id="result"></div>


                   </div>

                  <!--     <button type="submit" name="send1" class="button" style="margin:0px">Search</button>
-->
               </div>
            </div>
          <!-- </form> -->

    </div>




  <div style="margin:10px">

          <h2 class="text-center">Your Query</h2>
             </div>


               <?php
                 $result=mysqli_query($con,"SELECT * FROM `query` WHERE `email` = '$email'");
                 $i=1;
                # $email='ab@gmail.com';


                   while($row=mysqli_fetch_array($result))
                   {    $j=0;
                            //if($row['email']==$email)
													if($row['email']==$email)
                         {

                           $myquery_id = $row['myquery_id'];
                           $type = -1;


                                        // Checking user status
                          $status_query = "SELECT count(*) as cntStatus,type FROM feedback WHERE email='$email' and  myquery_id=".$myquery_id;
                                          $status_result = mysqli_query($con,$status_query);

                                          $status_row = mysqli_fetch_array($status_result);
                                          $count_status = $status_row['cntStatus'];
                                      #    echo 'Ok'.$status_row['feedback_id'].'';
                                          if($count_status > 0){
                                              $type = $status_row['type'];
                                          }

                           $like_query = "SELECT COUNT(*) AS cntLikes FROM feedback WHERE type=1 and myquery_id=".$row["myquery_id"];
                                          $like_result = mysqli_query($con,$like_query);
                                          $like_row = mysqli_fetch_array($like_result);
                                          $total_likes = $like_row['cntLikes'];

                           $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM feedback WHERE type=0 and myquery_id=".$row["myquery_id"];
                                          $unlike_result = mysqli_query($con,$unlike_query);
                                          $unlike_row = mysqli_fetch_array($unlike_result);
                                          $total_unlikes = $unlike_row['cntUnlikes'];
                   echo '
                          <div style="background-color:white ;border: 1px solid #b9b0b0;border-radius:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding-bottom:5px;margin-bottom:25px;">

                     <form class="form-horizontal" method="POST" action="reply_db.php" class="text-center border ">';
                     $email2=$row['email'];
                     $name2 = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email2'"));


                echo '   <div style="margin-left:10px; margin-top:10px">
                   <img src="../avatar3.png" class="avator" style="height:25px;width:25px; vertical-align: middle; border-radius: 50%;" alt="Avatar">
                     &nbsp<b>'.$name2['firstname'].'&nbsp'.$name2['lastname'].'</b><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="#909090">'.$row['query_time'].'</font><br>
                   '.$row['myQuery'].'
                 </div>';?>


                      <div class="post">

                                         <div class="post-action">

                                              <input type="button" value="Like" id="like_<?php echo $myquery_id; ?>" class="like" style="<?php if($type == 1){ echo "color: #247404;"; } ?>" />&nbsp;(<span id="likes_<?php echo $myquery_id; ?>"><?php echo $total_likes; ?></span>)&nbsp;

                                              <input type="button" value="Unlike" id="unlike_<?php echo $myquery_id; ?>" class="unlike" style="<?php if($type == 0){ echo "color: #f21608;"; } ?>" />&nbsp;(<span id="unlikes_<?php echo $myquery_id; ?>"><?php echo $total_unlikes; ?></span>)

                                          </div></div>

              <?php echo' <div class="text-center">   <button type="button"  style="background-color: #333333;" class="btn  btn-success btn-sm" position: absolute;right:0;top:0" data-toggle="modal" data-target="#myModal'.$row["myquery_id"].'">View Query</button></div>
                       <div class="modal fade" id="myModal'.$row["myquery_id"].'" role="dialog">
                    <div class="modal-dialog">

                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                   <b>Query&nbsp;:</b>
                   <div style="margin-left:10px; margin-top:10px">
                      <img src="../avatar3.png" class="avator" style="height:25px;width:25px; vertical-align: middle; border-radius: 50%;" alt="Avatar">
                        &nbsp<b>'.$name2['firstname'].'&nbsp'.$name2['lastname'].'</b><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="#909090">'.$row['query_time'].'</font><br>
                      '.$row['myQuery'].'
                    </div>
                       ';
                       ?>
                       <div class="post">
                                           <div class="post-action">

                                               <input type="button" value="Like" id="like1_<?php echo $myquery_id; ?>" class="like0" style="<?php if($type == 1){ echo "color: #247404;"; } ?>" />&nbsp;(<span id="likes1_<?php echo $myquery_id; ?>"><?php echo $total_likes; ?></span>)&nbsp;

                                               <input type="button" value="Unlike" id="unlike1_<?php echo $myquery_id; ?>" class="unlike0" style="<?php if($type == 0){ echo "color: #f21608;"; } ?>" />&nbsp;(<span id="unlikes1_<?php echo $myquery_id; ?>"><?php echo $total_unlikes; ?></span>)

                                           </div>

                       </div>
          <?php
              echo '
                 <div class="modal-body">
                 <b>Reply&nbsp;:</b>

                 <form class="form-horizontal" method="POST" action="reply_db.php" class="text-center border ">
                  <div class="modal-body">
                ';


                $result1=mysqli_query($con,"select * from reply order by myquery_id");

                   while($row1=mysqli_fetch_array($result1)){
                     if($row1['myquery_id']==$row["myquery_id"]){
                       $email1=$row1['email'];
                       $name=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email1'"));


                     echo'<div>
                     <img src="../avatar3.png" class="avator" style="height:25px;width:25px; vertical-align: middle; border-radius: 50%;" alt="Avatar">
                       &nbsp<b>'.$name['firstname'].'&nbsp'.$name['lastname'].'</b><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="#909090">'.$row1['reply_time'].'</font><br>
                     '.$row1['myReply'].'
                     </div><hr>';
                     }
                   }

					              echo '</div><b>Do Reply &nbsp;:</b> </div><div style="background-color:white;
					              border: 0px solid #b9b0b0;
					              border-radius:8px;
					              box-shadow: 2px 8px 20px 0px rgba(0, 0, 0, 0.3);padding-bottom:5px;padding-left:5px ;margin:10px ;margin-bottom:20px;">
					                  <input type="hidden" name="id" value="'.$row['myquery_id'].'" >

					                     <textarea  class="form-control" type="textarea" name="user_reply" id="user_reply" placeholder="Your Comments" maxlength="6000" rows="3" ></textarea>
					                     <button type="submit"  style="background-color: #333333;margin-top:5px;" class="btn  btn-success btn-md button" name="send"  >Reply</button>

					                      </div>';
					                echo  '</form>
					                <div class="modal-footer">
					                <button type="button" style="background-color: #333333;" class="btn  btn-success btn-md button" data-dismiss="modal">Close</button>
					                </div>
					               </div>
                              </div>
					             </div>
					             </div>

					           </form>

                     </div>
					           ';

					              }
                        $i=$i+1;
					            }
					           ;
					          ?>

</div>
 <!----Ask Query Question section---------------------------->

  <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
    <div style="background-color:white ;border: 1px solid #b9b0b0;border-radius:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding-bottom:5px;margin-bottom:0px;" class="link_box">
      <form role="form" method="POST" id="reused_form" action="query_db.php" >
          <div style="margin:10px">
           <h3>Ask Query</h3>
                   <div class="row">
                   <div class="col-sm-12 form-group">
                       <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Query" maxlength="6000" rows="4" autofocus required></textarea>
                   </div>
              </div>
              <div class="row" >
                   <div class="col-sm-12 form-group" >
                       <button type="submit" name="send" class="button" >Ask</button>
                   </div>
               </div>
            </div>
           </form>
         </div>
</div>
</div>
</div>
