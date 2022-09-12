<?php
  include("function.php");

  $objCrudAdmin=new crudApp();
 
  $students=$objCrudAdmin->display_data();

  if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id=$_GET['id'];
        $returndata=$objCrudAdmin->display_data_by_id($id);
    }
  }

  if(isset($_POST['another_add_imf'])){
    $msg=$objCrudAdmin->updateData($_POST);
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CRUD APP</title>
  </head>
  <body>
    
    <div class="container my-4 p-4 shadow">
      <h2><a style="text-decoration: none;" href="index.php">Student DataBase</a></h2>

      <form class="form" action="" method="POST" enctype="multipart/form-data">
        
        <?php if(isset($msg)){echo $msg;}?>
        <input class="form-control mb-2" type="text" name="anothername" value="<?php echo $returndata['Name'];?>">

        <input class="form-control mb-2" type="number" name="anotherroll" value="<?php echo $returndata['Roll'];?>">

        <label for="image">Upload Your Image</label>
        <input class="form-control mb-2" type="file" name="anotherimage">

        <input type="hidden" name="std_id" value="<?php echo
        $returndata['ID'];?>">

        <input class="form-control bg-warning" type="submit" value="Update Information" name="another_add_imf">

      </form>
    </div>

   


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>