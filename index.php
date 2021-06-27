<?php
$count=false;
$insert=false;
if(isset($_POST['name'])){ 
 $username="root";
 $password="";
 $server="localhost";
 $con=mysqli_connect($server,$username,$password);
 if(!$con){
     die("Connection to this database failed due to".mysqli_connect_error());
 }
//  echo "Success";
$name=$_POST['name'];
$clgName=$_POST['clgName'];
$branch=$_POST['branch'];
$email=$_POST['email'];
$msg=$_POST['msg'];
$sql="INSERT INTO `nss`.`form` (`Name`, `College Name`, `Email`, `Branch`, `Mesage`) VALUES ('$name', '$clgName', '$branch', '$email', '$msg');";

// echo $sql;
if($con->query($sql) == true){
    $insert=true;
}
else{
    $count=true;
}
$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Recursive&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
   <link rel="stylesheet" href="./style.css">
    <style>
      *{
        margin: 0;
        padding:0;
        box-sizing: border-box;
      }
      html{
        font-size:16px;
      }
      .submit-message{
        display:flex;
        justify-content:center;
      }
      .msg-sub{
        color:green;
        font-size:2rem;
      }
      .error{
        color:red;
        font-size:2rem;
      }
      .msg-sub,.error{
          font-weight:bold;
        }
      @media screen and (max-width:1054px){
        .msg-sub,.error{
          font-size:10px;
        }
      }
      @media only screen and (max-width:680px){
        
        .msg-sub,.error{
          font-size:5px;
        }
        
      }
      .logo {
        display:block;
    width: 11vw;
    height: auto;
    border-radius: 50%;
    max-height: 1.75rem;
}
      
    </style>
    <title>NSS-MMMUT FORM</title>
</head>


<body>
    <!-- navbar -->
   
    <nav class="navbar is-dark " role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item " href="http://www.mmmut.ac.in/NCC-NSS">
      
      <h4 class="m-1 ">Hiring Problem Setters</h4>
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Home
      </a>
          <a class="navbar-item">
            Contact
          </a>
          
          
        </div>
      </div>
    </div>

    
  </div>
</nav>

<!-- message -->
<div class="submit-message">
  <?php
    if($insert){
      echo "<p class='msg-sub'>Thanks for submitting the form. We're Happy to see you in Team soon.</p>";
    }else if($count){
      echo "<p class='error'>There is some error in your form submit again!.</p>";
    }
  ?>
</div>
<!-- form here -->
<div class="container m-2 ">
  <form action="./index.php" method="POST" >
    <div class="field">
      <label class="label">Name</label>
      <div class="control">
        <input class="input" type="text" id="name" name="name" placeholder="Enter Your Name">
      </div>
    </div>
    <div class="field">
      <label class="label">College Name</label>
      <div class="control">
        <input class="input" id="clgName" name="clgName" type="text" placeholder="Enter Your College Name">
      </div>
    </div>
    
    
    
    <div class="field">
      <label class="label" >Email</label>
      <div class="control has-icons-left has-icons-right">
        <input class="input "id="email" name="email" type="email" placeholder="Enter your email" value="">
        <span class="icon is-small is-left">
          <i class="fas fa-envelope"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
      </div>
     
    </div>
    
    <div class="field">
      <label class="label ">Branch</label>
      <div class="control">
        <div class="select" id="branch">
          <select name="branch"> 
            <option >Select</option>
            <option>CSE</option>
            <option>IT</option>
            <option>ECE</option>
            <option>CHE</option>
            <option>ME</option>
            <option>EE</option>
            <option>CE</option>
            <option>Other</option>
          </select>
        </div>
      </div>
    </div>
    
    <div class="field">
      <label class="label">Why do you want to be problem setter?</label>
      <div class="control">
        <textarea class="textarea" id="msg" name="msg" placeholder="Write your explanation"></textarea>
      </div>
    </div>
    
    
    <div class="field is-grouped">
      <div class="control">
        <button class="button is-link" type="submit" id="btn">Submit</button>
      </div>
      
    </div>
  </form>
</div>


</body>
</html>