<?php
  include("function.php");

  $objCrudAdmin=new crudApp();

  if(isset($_POST['add_imf'])){
    $return_msg=$objCrudAdmin->add_data($_POST);
  }

  $students=$objCrudAdmin->display_data();

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
        <?php if(isset($return_msg)){echo $return_msg;}?>
        <input class="form-control mb-2" type="text" name="name" placeholder="Enter Your Name">

        <input class="form-control mb-2" type="number" name="roll" placeholder="Enter Your Roll">

        <label for="image">Upload Your Image</label>
        <input class="form-control mb-2" type="file" name="image">


        <input class="form-control bg-warning" type="submit" value="Add Information" name="add_imf">

      </form>
    </div>

    <div class="container my-4 p-4 shadow">
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php while($student=mysqli_fetch_assoc($students)){?>
          <tr>
            <td><?php echo $student['ID']?></td>
            <td><?php echo $student['Name']?></td>
            <td><?php echo $student['Roll']?></td>
            <td><img style="height: 100px;" src="upload/<?php echo $student['Image']?>" alt=""></td>
            <td>
              <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student['ID']?>">Edit</a>
              <a class="btn btn-warning" href="#">Delete</a>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>