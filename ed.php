<?php 


// Incluid Database Connection Hear
include('fun.php');
$obConnect = new testApp();
$student = $obConnect->showData();





if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id = $_GET['id'];
        $student = $obConnect->display_data($id);
    }
}









?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <h1 class="text-danger text-center">Table Created with PHP for Test </h1>    
            <?php if(isset($return_msg)){ echo $return_msg; } ?>
            <form action="" method="post"  enctype="multipart/form-data" class="shadow p-3 mb-5 bg-white rounded">
                
                <label class="form-label" for="name">Name:</label>
                <input class="form-control" value="<?php echo $student['name']; ?>" type="text" name="u_name">

                <label class="form-label" for="num">Number:</label>
                <input class="form-control" value="<?php echo $student['number']; ?>" type="number" name="u_num">

                <label class="form-label" for="email">Email:</label>
                <input class="form-control" value="<?php echo $student['email']; ?>" type="email" name="u_email">

                <label class="form-label" for="img">Image:</label>
                <input class="form-control" value="<?php echo $student['img']; ?>" type="file" name="u_img">
                <img src="upload/<?php echo $student['img']; ?>" alt="" class="my-3" style="height:100px; width:50%">
                <input type="submit" value="Update Information" class="btn btn-warning form-control my-2" name="u_add_info">
            </form>
        </div>
    </div>

</body>
</html>