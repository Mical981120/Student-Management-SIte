<?php 
      include 'settings.php';
      include 'function.php';
      include_once("config.php");
      $result1 = mysqli_query($mysqli, "SELECT * FROM events ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST Profile page</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script type="text/javascript">
function validate()
{
var user_id = document.myform.user_id;
var password = document.myform.password;
var conpassword = document.myform.conpassword;
var user_type = document.myform.user_type;

if(Emptyfield(user_id,password,conpassword,user_type))
{    
	var p1=password.value;
	var p2=conpassword.value;
	
	if(matchpass(p1,p2))
	{
	return true;
	}
}
return false;
} //end of formValidation

function Emptyfield(user_id,password,conpassword,user_type)
{ 
var user_id_len = user_id.value.length;
var password_len = password.value.length;
var conpassword_len = conpassword.value.length;
var user_type_len = user_type.value.length;

if (user_id_len == 0 || password_len == 0|| conpassword_len== 0|| user_type_len == 0)
{
alert("Fields should not be empty ");
   
return false;
}
else
{
return true;
}
}// end of Emptyfield

function matchpass(password,conpassword){

if(password==conpassword){
return true;
}
else
{
  alert("password must be same");
  
    return false;
}
}
</script>
</head>
<body>
   <header>
       <div class="header">
           <div class="header-row1">
           <img src="images/logo.png" class="logoimg"  alt="">
           <h1 class="titleM">ABC INSTITUTE STUDENT MANEGEMENT SYSTEM</h1>
           </div>
           <div class="header-row2">
               <p><?php $ufunc->UserName(); //Show name who is in session user?></p>
               <a class="profilebtn" href="STprofile.php">Profile</a>
               <a class="logoutbtn" href="../../includes/logout.php">Logout</a>
           </div>
       </div>
   </header>
   <hr class="line"> 
   <main>
       <section class="glassright">
       <nav class="nav">
       <ul class="nav-list">
       <li><a href="STupdatedetails.php"  class="functionkey">Update Profile</a></li>
               <li><a href="STsubass.php"  class="functionkey">Assigment</a></li>
               <li><a href="STasslist.php"  class="functionkey">Assigment Submission</a></li>
               <li><a href="STviewas.php"  class="functionkey">Assignment Records</a></li>
               <li><a href="STresult.php"  class="functionkey">View Result</a></li>
               <li><a href="STpaymentlis.php"  class="functionkey">Payment </a></li>
               <li><a href="STpaymentrecords.php"  class="functionkey">Payment Records</a></li>
               
           </ul>
       </nav>
       </section>
     <section class="glassmiddle">
           <div class="Dashboard">
			<center>
				<h1 style="margin-bottom: 30px;  border:2px solid darkblue; width: 50%; 
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; ">Profile</h1>
			</center>
			<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
                
    
                
 
      <tr>
      
                <label>User ID:</label>
                <label><?php $ufunc->Userid(); //Show name who is in session user?></label><br><br>
			        	<label>User Name:</label>   
                <label><?php $ufunc->UserName(); //Show name who is in session user?></label><br><br>
                <label>First Name:</label>   
                <label><?php $ufunc->UserFname(); //Show name who is in session user?></label><br><br>
                <label>NIC:</label>   
                <label><?php $ufunc->Usernic(); //Show name who is in session user?></label><br><br>
                <label>Password:</label>   
                <label><?php $ufunc->UserPass(); //Show name who is in session user?></label><br><br>
                <label>Email:</label>  
                <label><?php $ufunc->UserEmail(); //Show name who is in session user?></label><br><br>
                <label>Mobile:</label>   
                <label><?php $ufunc->UserMobile(); //Show name who is in session user?></label><br><br>
                <label>Address:</label>  
                <label><?php $ufunc->UserAddress(); //Show name who is in session user?></label><br><br>
                <label>Role:</label> 
                <label><?php $ufunc->UserRole(); //Show name who is in session user?></label><br><br>
				        <label>Picture:</label>
                <label><?php $ufunc->UserPname(); //Show name who is in session user?></label><br><br>  
     </tr>
     
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
       </section>
       </section>
       <section class="glassleft">
       <div class="container" style="width: 400px;, align-items: center;,
      justify-content: center;">
      <center>
				<h1 style="margin-bottom: 30px;  border:2px solid darkblue; width: 50%; 
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; ">Notice Board</h1>
			</center>
       <table class="table1">
<thead>
    
<th class="tableh">Event</th>
    <th class="tableh">Start Date</th>
    <th class="tableh">End Time</th>
    
    
    
</thead>
<tbody>
<?php 
	
	while($res = mysqli_fetch_array($result1)) { 		
		echo "<tr>";
		
        echo "<td class='table1'>".$res['title']."</td>";
		echo "<td class='table2'>".$res['start_event']."</td>";
		echo "<td class='table2'>".$res['end_event']."</td>";
		
		
	}
	?>
</tbody>
</table>
</di>
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
				<img src="images/logo.png" class="logoimgF"  alt="">
			</div>
				<div class="col-3">
                <h3 style="text-align:center;">Follow Us</h3>
		<a href="wwww.facebook.com">	<img src="images/FB.png" width="40px" height="40px" alt=""></a>
		<a href="wwww.twitter.com">	    <img src="images/TW.png" width="40px" height="40px" alt=""></a>
		<a href="wwww.instagram.com">	<img src="images/IG.png" width="40px" height="40px" alt=""></a>
		<a href="wwww.youtube.com"> 	<img src="images/YT.png" width="40px" height="40px" alt=""></a>
                </div>
			</div>
			<hr>
        <p class="copyright">- Copyright 2022 - </p>
		</div>
	</div>
</footer>
</body>
</html>