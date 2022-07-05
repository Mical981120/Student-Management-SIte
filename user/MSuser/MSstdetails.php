<?php 
      include 'settings.php';
      include 'function.php';
      
	  include_once("config.php");
	  
	  $result1 = mysqli_query($mysqli, "SELECT * FROM events ORDER BY id DESC");
      include_once("config.php");
	  $result = mysqli_query($conn, "SELECT * FROM stdetails ORDER BY login ASC"); 

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MS ST Details page</title>
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
           <a class="profilebtn" href="MSprofile.php">Profile</a>
               <a class="logoutbtn" href="../../includes/logout.php">Logout</a>
           </div>
       </div>
   </header>
   <hr class="line"> 
   <main>
       <section class="glassright">
       <nav class="nav">
       <ul class="nav-list">
       <li><a href="MSprofile.php"  class="functionkey">Profile</a></li>
       <li><a href="MSregdetails.php"  class="functionkey">Register New Student</a></li>
	   <li><a href="MSstdetails.php"  class="functionkey">Students Details</a></li>
	   <li><a href="MSstudentregister.php"  class="functionkey">Student Register</a></li>
               <li><a href="MSsearch.php"  class="functionkey">Search Students Details</a></li>
               
               <li><a href="Event.php"  class="functionkey">Event Details</a></li>
           </ul>
       </nav>
       </section>
     <section class="glassmiddle">
           <div class="Dashboard">
			<center>
				<h1 style="margin-bottom: 30px;  border:2px solid darkblue; width: 50%; 
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; ">Add Student Details</h1>
			</center>

			<a href="MSregdetails.php"  class="functionketCT">Register New Student</a>
			<table>
	<thead>
	<th>Student Id</th>
	<th>Full Name</th>
	<th>Batch</th>
	<th>Course Index</th>
	<th>Time Diuration</th>
	<th>Join Date</th>
    <th>Update</th>
	<th>Delete</th>
	<th>Update</th>
	
	</thead>
	<tbody>
	<?php 
	
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['id']."</td>";
		echo "<td bgcolor=''>".$res['Fname']."</td>";
		echo "<td>".$res['BatchN']."</td>";
		echo "<td>".$res['CourseI']."</td>";
		echo "<td>".$res['Pdtime']."</td>";
		echo "<td>".$res['Jday']."</td>";
		echo "<td>".$res['Course']."</td>";
		echo "<td>".$res['Branch']."</td>";
		echo "<td><a  class='updatetbtn' href='MSupstdetails.php?id=$res[id]'>Update</a>";  
		         
	} 
	?>
	</tbody>
</table>

		</div>
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