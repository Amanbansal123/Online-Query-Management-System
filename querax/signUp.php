<?php include 'header.php'; ?>



<?php

$conn = mysqli_connect('localhost','root','','querax');
/*$conn = new PDO("mysql:host=localhost;dbname=dss", 'root', ''); */


if(isset($_POST['register-submit'])) {

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$city = $_POST['city'];
$country = $_POST['country'];
$day = $_POST['Birthday_day'];
$month = $_POST['Birthday_Month'];
$year = $_POST['Birthday_Year'];
$email = $_POST['email'];
$password = $_POST['password'];
$dob=$month.' '.$day.', '.$year;

$insert_query = "INSERT INTO users (firstname , lastname, email, password, city, country, dob )
                            VALUES ('$firstname','$lastname','$email','$password', '$city', '$country', '$dob')";

   mysqli_query($conn, $insert_query);
  echo '<div style=" margin-top: 2%;margin-left:20%;margin-right:20%; "><span style="color:green;text-align:center;padding-left:30%;"><b><h1>	&#10004; </h1><h3 Style="text-align:center;">
  You have been registered successfully.</h3></b></span></div>';

echo ' <meta http-equiv="refresh" content="2,logIn.php">';
}

?>



	<body style="background-image: url('images/bg.jpg');height: 100%; background-position: center;  background-repeat: no-repeat   background-size: cover;">

			<div class="container" style="margin-top:10%; opacity:0.55;">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div style="font:14px; text-color: #555; ">
							Create an Account
						</div>
						<hr>
					</div>
					<div class="panel-body">


								<form id="register-form" action="" method="post" role="form" style="display: block;">

                  <div class="form-group">
									<tr>
                    <td>
										<input type="text" style="border-color: #97a7a2; border-style: inset; width: 48%;" name="firstname" id="firstname" tabindex="1"  placeholder="Firstname" value="" />
									</td>
                  <td>
										<input type="text" style="border-color: #97a7a2; border-style: inset; width: 48%;" name="lastname" id="lastname" tabindex="1"  placeholder="Lastname" value=""/>
									</td>
                </tr></div>
                  <!----- Date Of Birth -------------------------------------------------------->
                  <div class="form-group">
<tr style="border-color: #97a7a2; border-style: inset;">
<td>DOB : </td>

<td>
<select name="Birthday_day" id="Birthday_Day">
<option value="-1">Day:</option>
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
<option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>
<option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
<option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
<option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option>
<option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
<option value="29">29</option><option value="30">30</option><option value="31">31</option>
</select>

<select id="Birthday_Month" name="Birthday_Month">
<option value="-1">Month:</option><option value="January">Jan</option><option value="February">Feb</option>
<option value="March">Mar</option><option value="April">Apr</option><option value="May">May</option><option value="June">Jun</option>
<option value="July">Jul</option><option value="August">Aug</option><option value="September">Sep</option>
<option value="October">Oct</option><option value="November">Nov</option><option value="December">Dec</option>
</select>

<select name="Birthday_Year" id="Birthday_Year">

<option value="-1">Year:</option>
<option value="2010">2018</option><option value="2009">2017</option>
<option value="2008">2016</option><option value="2007">2015</option><option value="2006">2014</option><option value="2005">2013</option>
<option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option>
<option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option>
<option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option>
<option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option>
<option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option>
<option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option>
<option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option>
<option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option>
</select>
</td>
</tr>
</div>

<div class="form-group">
<tr>
  <td>
  <input type="text" style="border-color: #97a7a2; border-style: inset; width: 48%;" name="city" id="city" tabindex="1"  placeholder="City" value="" />
</td>
<td>
  <input type="text" style="border-color: #97a7a2; border-style: inset; width: 48%;" name="country" id="country" tabindex="1"  placeholder="Country" value=""/>
</td>
</tr></div>


									<div class="form-group">
										<input type="email"  style="border-color: #97a7a2; border-style: inset; width:97%" name="email" id="email" tabindex="1"  placeholder="Email Address" value="">
									</div>

									<div class="form-group">

                    <tr><td>
                      <input type="password"  style="border-color: #97a7a2; border-style: inset; width:100%;" name="password" id="password" tabindex="2" placeholder="Password">
                    </td>

                  </tr>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  style="border-color: black;border-style: solid;" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
                      <div class="text-center">
                        <a href="logIn.php" tabindex="5" class="forgot-password">Want to Log In?</a>
                      </div>

					</div>
				</div>
			</div>
		</div>
	</div>

	</body>
