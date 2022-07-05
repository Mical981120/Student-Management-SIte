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
    <title>MS Event</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <script type="text/javascript">
$(document).ready(function() {
  var calendar = $('#calendar').fullCalendar({
   editable:true,
   header:{
    left:'prev,next today',
    center:'title',
    right:'month,agendaWeek,agendaDay'
   },
   events: 'load.php',
   selectable:true,
   selectHelper:true,
   select: function(start, end, allDay)
   {
    var title = prompt("Enter Event Title");
    if(title)
    {
     var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
     $.ajax({
      url:"insert.php",
      type:"POST",
      data:{title:title, start:start, end:end},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Added Successfully");
      }
     })
    }
   },
   editable:true,
   eventResize:function(event)
   {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
    var title = event.title;
    var id = event.id;
    $.ajax({
     url:"update.php",
     type:"POST",
     data:{title:title, start:start, end:end, id:id},
     success:function(){
      calendar.fullCalendar('refetchEvents');
      alert('Event Update');
     }
    })
   },

   eventDrop:function(event)
   {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
    var title = event.title;
    var id = event.id;
    $.ajax({
     url:"update.php",
     type:"POST",
     data:{title:title, start:start, end:end, id:id},
     success:function()
     {
      calendar.fullCalendar('refetchEvents');
      alert("Event Updated");
     }
    });
   },

   eventClick:function(event)
   {
    if(confirm("Are you sure you want to remove it?"))
    {
     var id = event.id;
     $.ajax({
      url:"delete.php",
      type:"POST",
      data:{id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Removed");
      }
     })
    }
   },

  });
 });
</script>
</head>
<body>
   <header>
       <div class="header">
           <div class="header-row1">
           <h1 style=" color: darkblue; ">ABC INSTITUTE STUDENT MANEGEMENT SYSTEM</h1>
           </div>
           <div class="header-row2">
             
           <p><?php $ufunc->UserName(); //Show name who is in session user?></p>
           
           <a class="profilebtn" style="padding: 5px 15px; " href="PCprofile.php">Profile</a>
               <a class="logoutbtn" style=" padding: 5px 15px; " href="../../includes/logout.php">Logout</a>
           </div>
       </div>
   </header>
   <hr class="line"> 
   <main style="display:flex;">
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
				<h1 style="color: darkblue; font-size: x-large; margin-bottom: 30px;  border:2px solid darkblue; width: 50%; 
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; ">Add Event</h1>
			</center>
			<div class="container" style="width: 600px;">
   <div id="calendar"></div>
</div>


       </section>
       <section class="glassleft" style="width: 450px;">
       <div class="container" style="width: 400px;, align-items: center;,
      justify-content: center;">
      <center>
				<h1 style=" color: darkblue; font-size: x-large; margin-bottom: 30px;  border:2px solid darkblue; width: 50%; 
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif, ">Notice Board</h1>
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
				<h3 style="text-align:center;">Follow Us</h3>
		<a href="wwww.facebook.com">	<img src="images/FB.png" width="40px" height="40px" alt=""></a>
		<a href="wwww.twitter.com">	    <img src="images/TW.png" width="40px" height="40px" alt=""></a>
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