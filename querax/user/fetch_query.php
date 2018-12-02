
<?php $root="../" ; include_once '../connection.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script  type="text/javascript">
     $(document).ready(function(){

         // like and unlike click
         $(".likeS, .unlikeS").click(function(){
             var id = this.id;   // Getting Button id
             var split_id = id.split("1_");

             var text = split_id[0];
             var postid = split_id[1];  // postid

             // Finding click type
             var type = 0;
             if(text == "like"){
                 type = 1;
             }else{
                 type = 0;
             }

             // AJAX Request
             $.ajax({
                 url: 'likeunlike.php',
                 type: 'post',
                 data: {postid:postid,type:type},
                 dataType: 'json',
                 success: function(data){
                     var likes = data['likes'];
                     var unlikes = data['unlikes'];

                     $("#likes1_"+postid).text(likes);        // setting likes
                     $("#unlikes1_"+postid).text(unlikes);    // setting unlikes

                     if(type == 1){
                         $("#like1_"+postid).css("color","#247404");
                         $("#unlike1_"+postid).css("color","lightseagreen");
                     }

                     if(type == 0){
                         $("#unlike1_"+postid).css("color","#f21608");
                         $("#like1_"+postid).css("color","lightseagreen");
                     }

                 }
             });

         });

     });
     </script><script  type="text/javascript">
          $(document).ready(function(){

              // like and unlike click
              $(".like0, .unlike0").click(function(){
                  var id = this.id;   // Getting Button id
                  var split_id = id.split("1_");

                  var text = split_id[0];
                  var postid = split_id[1];  // postid

                  // Finding click type
                  var type = 0;
                  if(text == "like"){
                      type = 1;
                  }else{
                      type = 0;
                  }

                  // AJAX Request
                  $.ajax({
                      url: 'likeunlike.php',
                      type: 'post',
                      data: {postid:postid,type:type},
                      dataType: 'json',
                      success: function(data){
                          var likes = data['likes'];
                          var unlikes = data['unlikes'];

                          $("#likes1_"+postid).text(likes);        // setting likes
                          $("#unlikes1_"+postid).text(unlikes);    // setting unlikes

                          if(type == 1){
                              $("#like1_"+postid).css("color","#247404");
                              $("#unlike1_"+postid).css("color","lightseagreen");
                          }

                          if(type == 0){
                              $("#unlike1_"+postid).css("color","#f21608");
                              $("#like1_"+postid).css("color","lightseagreen");
                          }

                      }
                  });

              });

          });
          </script>


          <script  type="text/javascript">
               $(document).ready(function(){

                   // like and unlike click
                   $(".like, .unlike").click(function(){
                       var id = this.id;   // Getting Button id
                       var split_id = id.split("_");

                       var text = split_id[0];
                       var postid = split_id[1];  // postid

                       // Finding click type
                       var type = 0;
                       if(text == "like"){
                           type = 1;
                       }else{
                           type = 0;
                       }

                       // AJAX Request
                       $.ajax({
                           url: 'likeunlike.php',
                           type: 'post',
                           data: {postid:postid,type:type},
                           dataType: 'json',
                           success: function(data){
                               var likes = data['likes'];
                               var unlikes = data['unlikes'];

                               $("#likes_"+postid).text(likes);        // setting likes
                               $("#unlikes_"+postid).text(unlikes);    // setting unlikes

                               if(type == 1){
                                   $("#like_"+postid).css("color","#247404");
                                   $("#unlike_"+postid).css("color","lightseagreen");
                               }

                               if(type == 0){
                                   $("#unlike_"+postid).css("color","#f21608");
                                   $("#like_"+postid).css("color","lightseagreen");
                               }

                           }
                       });

                   });

               });
               </script>



  <?php
  $output = '';
  if(isset($_POST["query"]))
  {
   $search = mysqli_real_escape_string($con, $_POST["query"]);
   $query = "  SELECT * FROM query  WHERE lower(myQuery) LIKE '%".strtolower($search)."%' ";

  $result = mysqli_query($con, $query);
  if(mysqli_num_rows($result) > 0)
  {
    $email = $_SESSION['email'];


   while($row = mysqli_fetch_array($result))
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
    <div>
    <form class="form-horizontal" method="POST" action="reply_db.php" class="text-center border ">
    <a href="#">
    <div type="button"  style="background-color: white;border: 1px solid #b9b0b0;border-radius:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" data-toggle="modal" data-target="#myModal1'.$row["myquery_id"].'">
    &nbsp &nbsp'.$row["myQuery"].'</div></a>
    <div class="modal fade" id="myModal1'.$row["myquery_id"].'" role="dialog">
    <div class="modal-dialog">

    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
    <b>Query&nbsp;:</b>';
    $email2=$row['email'];
    $name2 = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email2'"));
    echo '
    <div style="margin-left:10px; margin-top:10px">
       <img src="../avatar3.png" class="avator" style="height:25px;width:25px; vertical-align: middle; border-radius: 50%;" alt="Avatar">
         &nbsp<b>'.$name2['firstname'].'&nbsp'.$name2['lastname'].'</b><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="#909090">'.$row['query_time'].'</font><br>
       '.$row['myQuery'].'
     </div>
    ';
    ?>

    <div class="post">
                        <div class="post-action">

                            <input type="button" value="Like" id="like1_<?php echo $myquery_id; ?>" class="likeS" style="<?php if($type == 1){ echo "color: #247404;"; } ?>" />&nbsp;(<span id="likes1_<?php echo $myquery_id; ?>"><?php echo $total_likes; ?></span>)&nbsp;

                            <input type="button" value="Unlike" id="unlike1_<?php echo $myquery_id; ?>" class="unlikeS" style="<?php if($type == 0){ echo "color: #f21608;"; } ?>" />&nbsp;(<span id="unlikes1_<?php echo $myquery_id; ?>"><?php echo $total_unlikes; ?></span>)

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

     echo '</div><b>Do Reply &nbsp;:</b>
     <div style="background-color:white;   border: 0px solid #b9b0b0;   border-radius:8px;   box-shadow: 2px 8px 20px 0px rgba(0, 0, 0, 0.3);padding-bottom:5px;padding-left:5px ;margin:10px ;margin-bottom:20px;">
         <input type="hidden" name="id" value="'.$row['myquery_id'].'" >
            <textarea  class="form-control" type="textarea" name="user_reply" id="user_reply" placeholder="Your Comments" maxlength="6000" rows="3" ></textarea>
            <button type="submit"  style="background-color: #333333;margin-top:5px;" class="btn  btn-success btn-md button" name="send"  >Reply</button>

             </div>
             </form>
       <div class="modal-footer">
       <button type="button" style="background-color: #333333;" class="btn  btn-success btn-md button" data-dismiss="modal">Close</button>
       </div>
      </div>

      </div>
    </div>
    </div>
    </form></div>';
  #-----------------------
   }

  }
  }

  ?>
