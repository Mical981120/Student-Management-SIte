<?php include 'settings.php'; //include settings ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	

	<style>
		main{
  position: relative;
	font-family: "Poppins", sans-serif;
  min-height: 80vh;
  background: linear-gradient(to bottom, #ffffff 0%, #ff0000 30%);
  display: flex;
  
  align-items: center;
  justify-content: center;
}

main::before{
  content:"";
  position: absolute;
  top: 0%;
  bottom: 0%;
  left: 0%;
  right: 0%;
  background-image: url(images/1.png);
  background-repeat: no-repeat;
  background-size: cover;
  opacity: 0.75;
  
}

ain{
  position: relative;
	font-family: "Poppins", sans-serif;
  min-height: 80vh;
  background: linear-gradient(to bottom, #ffffff 0%, #ff0000 30%);
  display: flex;
  align-items: center;
  justify-content: center;
}

main::before{
  content:"";
  position: absolute;
  top: 0%;
  bottom: 0%;
  left: 0%;
  right: 0%;
  background-image: url(images/1.png);
  background-repeat: no-repeat;
  background-size: cover;
  opacity: 0.50;
  
}


.glass{
  
  margin-right: 700px;
  background: white;
  min-height: 50vh;
  width: 30%;
  background: linear-gradient(
    to right bottom,
    rgba(255, 255, 255, 0.7),
    rgba(255, 255, 255, 0.3)
  );
  border-radius: 2rem;
  z-index: 2;
  backdrop-filter: blur(2rem);
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  
}

label{
  
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-weight: bold;
  display: inline-block;
  width: 100px;
}

.loginbtn, .Addbtn{
    display: inline-block;
    background: darkblue;
    color: #fff;
    padding: 5px 15px;
    margin-left: 150px;
    margin-top: 20px;
    transition: background 0.5s;
    
}
	</style>
	<script type="text/javascript">
function validate()
{
var user_id = document.myform.user_id;
var password = document.myform.password;
if(Emptyfield(user_id,password,conpassword,user_type)){
	{
alert("Fields should not be empty ");
   
return false;
	}
}
}



function Emptyfield(user_id,password)
{ 
var user_id_len = user_id.value.length;
var password_len = password.value.length;


if (user_id_len == 0 || password_len == 0)
{
alert("Fields should not be empty ");
   
return false;
}
else
{
return true;
}
}// end of Emptyfield

</script>
</head>
<body>
<header>
<h1>ABC INSTITUTE STUDENT MANEGEMENT SYSTEM</h1>
	
</header>
<hr class="line">
<main>
	
	<section class="glass">
		<div class="Dashboard">
			<center>
				<h1 style="margin-bottom: 30px;  border:2px solid darkblue; width: 50%; ">Sing In</h1>
			</center>
			<form name="myform" method="POST" onsubmit="return validate()" action="includes/login.php" >
			

				<label>User ID:</label>
				<input name="login" type="text" id="inputEmail" class="form-control" placeholder="User ID" required autofocus><br>
				<label>Password:</label>
				<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required><br>

        <?php if (isset($_GET['error'])) { ?>
     	<center><p class="error"><?php echo $_GET['error']; ?></p></center>	
     	<?php } ?>
				<button type="submit" class="loginbtn" name="submit">Log In</button>
				<button type="reset" class="resetbtn">Clear</button>
			</form>
     
		</div>
		
	</section>
	
</main>
<hr class="line1">
<footer>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-1">
				<h3>Find Our Place</h3>	
				<ul>
			<li>No. 36 De Kretser Pl, Colombo</li>
			<li>0114 777 666</li>
			<li>www.ABC.com</li>
			</ul></div>
				<div class="col-2">
				<h3 style="text-align:center;">Follow Us</h3>
		<a href="wwww.facebook.com">	<img src="images/FB.png" width="40px" height="40px" alt=""></a>
		<a href="wwww.twitter.com">	<img src="images/TW.png" width="40px" height="40px" alt=""></a>
		<a href="wwww.instagram.com">	<img src="images/IG.png" width="40px" height="40px" alt=""></a>
		<a href="wwww.youtube.com"> 	<img src="images/YT.png" width="40px" height="40px" alt=""></a>
			</div>
				<div class="col-3"></div>
			</div>
			<hr>
        <p class="copyright">- Copyright 2022 - </p>
		</div>
	</div>
</footer>

</body>
</html>