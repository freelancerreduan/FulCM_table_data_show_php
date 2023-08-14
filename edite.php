<?php
include('function.php');
$obCreate = new apptest();

if(isset($_POST['add_info'])){
    $rtn_msg = $obCreate->app_data($_POST);
  }
$dataRecive = $obCreate -> display_data();




 if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id = $_GET['id'];
        $reviceDAta = $obCreate -> display_data_by_id($id);
    }
 }






?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hello, world!</title>
  </head>
  <body>
    



<div class="container shadow  my-5 bg-body rounded">
  <h2 class="text-danger">Updated Information For Student </h2>
  <form action=" "  method="post" enctype="multipart/form-data">
  <?php  if(isset($rtn_msg)){
    echo "<h5 class = 'text-center text-danger'> $rtn_msg </h5>"; } ?>
    <label for="name" class="form-label">Update Name: </label>
    <input type="text" class="form-control" value="<?php echo $reviceDAta['name'] ?>"  name="u_name">
  
    <label for="number" class="form-label">Update Number</label>
    <input type="number"  class="form-control" value="<?php echo $reviceDAta['phone'] ?>" name="u_phone">
  
    <label for="email" class="form-label">Update Email </label>
    <input type="email"  class="form-control" value="<?php echo $reviceDAta['email'] ?>" name="u_email">
  
    <label class="form-check-label">Please Enter Update Img </label>
    <input type="file"  class="form-control" value=""  name="u_img">
    <img src="upload/<?php echo $reviceDAta['img']; ?>" alt="edite img" class="w-100 img-fluid my-3" style = "width: 50%; height: 90px;" >

    <button type="submit" class=" btn-warning form-control my-3 " name="u_add_info">Update Information </button>
  </form>
</div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>