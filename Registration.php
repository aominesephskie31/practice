<?php 
function __autoload($class)
{
    require_once "classes/$class.php";
}
if(isset($_POST['submit'])){
    //$_POST to send all the datas to the database
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $fields =[
        
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'email'=>$email,
        'phonenumber'=>$phonenumber,
        'user'=>$username,
        'password'=>$password
    ];

    $users = new users();
    $users->insert($fields);
}
?>
<html>
    <head>
        <title>User Registration</title>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="CRUD.php">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="CRUD.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
          
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        

        <div>
        
        </div>
        <div>
            <form action="" method = "post">
                <div class = "container">
                    <div class ="row">
                    <div class = "col-sm-3">
                        <h1>Registration</h1>
                        <p>Fill up the form with correct values.</p>
                        <hr class = "mb-4">
                        
                        <label for="firstname"><b>First Name</b></label>
                        <input class = "form-control" type="text" name="firstname" placeholder="Firstname" required>
                        <label for="lastname"><b>Last Name</b></label>
                        <input class = "form-control" type="text" name="lastname" placeholder="Lastname" required>
                        <label for="email"><b>Email Address</b></label>
                        <input class = "form-control" type="email" name="email" placeholder="Email Address" required>
                        <label for="phonenumber"><b>Phone Number</b></label>
                        <input class = "form-control" type="text" name="phonenumber" placeholder="Phone Number(+639)" required>
                        <label for="username"><b>Username</b></label>
                        <input class = "form-control" type="text" name="username" placeholder="Username" required>
                        <label for="password"><b>Password</b></label>
                        <input class = "form-control" type="password" name="password" placeholder="Password" required>
                        
                        <hr class = "mb-3">
                        <input class = "btn btn-primary" type="submit" name = "submit" >
                        
                        </div>
                    </div>
                </div>
           </form>  
            
        </div>
    </div>  
    </html>