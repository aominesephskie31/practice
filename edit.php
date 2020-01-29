<?php 
function __autoload($class)
{
    require_once "classes/$class.php";
}

if(isset($_GET['id'])){
    $uid = $_GET['id'];

    $user = new users();
    
    $result = $user->selectOne($uid);

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
    $id = $_POST['id'];
    $users = new users();
    $users->update($fields,$id);

}



?>
<html>
    <head>
        <title>UserRegistration</title>
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
         
          
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        

       
        <div>
            <form action="" method = "post">
                <div class = "container mt-4">
                    <div class ="row">
                    <div class = "col-lg-12">
                        <input type="hidden" name="id" value ="<?php echo $result['id'] ; ?>">
                        <div class="form-group">
                       
                        <label for="firstname"><b>First Name</b></label>
                        <input class = "form-control" type="text" name="firstname" placeholder="Firstname" 
                        value ="<?php echo $result['firstname'] ; ?>" >
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                        <label for="lastname"><b>Last Name</b></label>
                        <input class = "form-control" type="text" name="lastname" placeholder="Lastname"
                        value ="<?php echo $result['lastname'] ; ?>" >
                        </div>
                        <div class="form-group">
                        <label for="email"><b>Email Address</b></label>
                        <input class = "form-control" type="email" name="email" placeholder="Email Address"
                        value ="<?php echo $result['email'] ; ?>" >
                        </div>
                        <div class="form-group">
                        <label for="phonenumber"><b>Phone Number</b></label>
                        <input class = "form-control" type="text" name="phonenumber" placeholder="Phone Number(+639)"
                        value ="<?php echo $result['phonenumber'] ; ?>" >
                        </div>

                        <div class="form-group">
                        <label for="username"><b>Username</b></label>
                        <input class = "form-control" type="text" name="username" placeholder="Username"
                        value ="<?php echo $result['user'] ; ?>" >
                        </div>
                        
                        <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <input class = "form-control" type="password" name="password" placeholder="Password"
                        value ="<?php echo $result['password'] ; ?>" >
                        </div>
                        <input class = "btn btn-primary" type="submit" name = "submit" >
                        </form>  
                        </div>
                    </div>
                </div>
            
            
        </div>
    </div>  
    </html>