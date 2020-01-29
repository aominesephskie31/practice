<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "crud";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
        //check field value 
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
            //select database through select query
                $query = "SELECT * FROM r_users WHERE user = :user AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'user'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                  //take username in session
                     $_SESSION["user"] = $_POST["user"];  
                     header("location:CRUD.php");  
                }  
                else  
                {  
                     $message  = "Invalid Username or Password";
                     echo "<script type='text/javascript'>alert('$message');</script>";'<label>Username OR Password is wrong</label>';  
                }  
           }  
      }
      
  
     if(isset($_POST['register'])){
         header("location:Registration.php");
     }         
} 
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Login</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /> 
            <h3 align="center">Please Login!</h3><br /> 
           <div class="container" style="width:500px; height: 280px; border: 2px solid red; margin-top: 3px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                 
                <form method="post">  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-primary btn-block" value="Login" />  
                     <input type="submit" name="register" class="btn btn-primary btn-block" value="Register"  /> 
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  