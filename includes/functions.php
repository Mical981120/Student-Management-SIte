<?php
class Login {
  public function LoginSystem() {
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (!isset($_POST['submit'])) {
      if (empty($_POST['login']) || empty($_POST['password'])) {
        header("Location: index.php?error=User ID is required");
	    exit();
      }
    } else {
      include 'connect.php';
      // Define $username and $password
      $username = $_POST['login'];
      $password = ($_POST['password']);
      // SQL query to fetch information of registerd users and finds user match.
      $query = "SELECT login, password FROM users WHERE login=? AND password=? LIMIT 1";
      // To protect MySQL injection for Security purpose
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      $stmt->bind_result($username, $password);
      $stmt->store_result();
      if($stmt->fetch()) { //fetching the contents of the row 
        $_SESSION['login'] = $username; // Initializing Session
      }
      mysqli_close($conn); // Closing Connection


      
    }
      
  }
  public function SessionVerify() {
    if(isset($_SESSION['login'])){
    header("location: includes/checkuser.php"); // Check user session and role
    }
  }
  public function SessionCheck() {
    global $conn;
    session_start();// Starting Session
    // Storing Session
    $user_check = $_SESSION['login'];
    // SQL Query To Fetch Complete Information Of User
    
    

    $query = "SELECT * FROM users WHERE login = '$user_check'";
    $ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $_SESSION["login"] = $row["login"];
    $_SESSION["id"] = $row["id"];
    $_SESSION["name"] = $row["name"];
    $_SESSION["role"] = $row["role"];
    $_SESSION["NIC"] = $row["NIC"];
    $_SESSION["Pname"] = $row["Pname"];
    $_SESSION["Fname"] = $row["Fname"];
    $_SESSION["Address"] = $row["Address"];
    $_SESSION["Mobile"] = $row["Mobile"];
    $_SESSION["Email"] = $row["Email"];
    $_SESSION["password"] = $row["password"];
  }
  public function UserType() {
    //if user role is 1, redirect to admin page
    if ($_SESSION["role"] == "P") {
      header("Location:../user/PCuser/PCprofile.php");
    }
    //if user role is 0, redirect to user page
    else if ($_SESSION["role"] == "S") {
      header("Location:../user/STuser/STprofile.php");
    }
    else if ($_SESSION["role"] == "M") {
      header("Location:../user/Msuser/MSprofile.php");
    }
    else {
       header("Location: ../index.php?error=Invalid User ID or Password!");
	    exit();
    }
  }
}

class UserFunctions{
  public function UserName() {
    $username = $_SESSION["name"];
    echo $username;
    
  }
  public function Userid() {
    $Userid = $_SESSION["login"];
    echo $Userid;
  }
  public function Usernic() {
    $Usernic = $_SESSION["NIC"];
    echo $Usernic;
  }
  public function UserFname() {
    $UserFname = $_SESSION["Fname"];
    echo $UserFname;
  }
  public function UserAddress() {
    $UserAddress = $_SESSION["Address"];
    echo $UserAddress;
    
  }
  public function UserMobile() {
    $UserMobile = $_SESSION["Mobile"];
    echo $UserMobile;
  }
  public function UserPass() {
    $UserPass = $_SESSION["password"];
    echo $UserPass;
  }
  public function UserEmail() {
    $UserEmail = $_SESSION["Email"];
    echo $UserEmail;
  }
  public function UserRole() {
    $UserRole = $_SESSION["role"];
    echo $UserRole;
  }
  public function UserPname() {
    $UserPname = $_SESSION["Pname"];
    echo $UserPname;
  }
  public function UserIDI() {
    $UserIDI = $_SESSION["id"];
    echo $UserIDI;
  }
}

