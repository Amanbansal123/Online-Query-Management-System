<?php include 'header.php'; ?>



<?php
session_start();
$conn = mysqli_connect('localhost','root','','querax');


if(isset($_POST['login-submit'])) {

$email = $_POST['email'];
$password = $_POST['password'];



$status_query = "select email from users where email='".$email."' and password='".$password."'";
                $status_result = mysqli_query($conn,$status_query);

                $status_row = mysqli_fetch_array($status_result);


            #    echo 'Ok'.$status_row['feedback_id'].'';
                if($status_row > 0){
                   echo 'Hello';
									$_SESSION['id']="@user$";
									$_SESSION['email'] = $email;

                echo ' <meta http-equiv="refresh" content="0,user/index.php">';
                }
                else
        {
            $message = "Invalid email or password!!";
				       echo 'Ok';
        }


}

?>

	<body style="background-image: url('images/bg.jpg');height: 100%; background-position: center;  background-repeat: no-repeat   background-size: cover;">

			<div class="container" style="margin-top:10%; opacity:0.55; ">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login" >
					<div class="panel-heading">
					Log In
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group" >
										<input type="text" style="border-color: black;border-style: solid;" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password"style="border-color: black;border-style: solid;" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" style="border-color: black;border-style: solid;" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="signUp.php" tabindex="5" class="forgot-password">Not Resitered Yet?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</body>
