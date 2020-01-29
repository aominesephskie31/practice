<?php 
function __autoload($class)
{
    require_once "classes/$class.php";
}
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $users = new users();
    $users -> destroy($id);
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>All Users</title>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Registration.php">REGISTER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
          
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        


        
    <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron">
                        <h4 class ="mb-4">All Users</h4>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $users = new users();
                                $rows = $users->select();
                              
                                foreach($rows as $row){
                                    ?>
                                    <tr>
                                    <th scope="row"><?php echo $row['id'];  ?></th>
                                    <td><?php echo $row['firstname'];?></td>
                                    <td><?php echo $row['lastname'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['phonenumber'];?></td>
                                    <td><?php echo $row['user'];?></td>
                                    <td><?php echo $row['password'];?></td>
                                    
                                    <td><a class= "btn btn-sm btn-primary" href="edit.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;<a class= "btn btn-sm btn-danger" href="CRUD.php?del=<?php echo $row['id'];?>">Delete</a></td>
                                    </tr>              
                          <?php     
                                }
                           ?>     
                           



                               </tr>
                                </tbody>
                            </table>
                            
                    </div>
                </div>
            </div>

        </div>



        
   </body>
</html>