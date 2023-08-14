<?php 


// Incluid Database Connection Hear
include('fun.php');

// Connection Page Class Ar Object Create hear;
$obConnect = new testApp();
// display data show coded start hear
$student = $obConnect->showData();

$rtn =$obConnect->displayDataEdit($_GET);

if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id = $_GET['id'];
        $student =$obConnect -> displayDataEdit($id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <div class="row">
            <h1 class="text-danger text-center">Table Created with PHP for Test </h1>    
            <?php if(isset($return_msg)){ echo $return_msg; } ?>
            <form action="" method="post"  enctype="multipart/form-data" class="shadow p-3 mb-5 bg-white rounded">
                
                <label class="form-label" for="name">Name:</label>
                <input class="form-control" value="<?php  $rtn['name']?>" type="text" name="u_name">

                <label class="form-label" for="num">Number:</label>
                <input class="form-control" value="<?php  $rtn['name']?>" type="number" name="u_num">

                <label class="form-label" for="email">Email:</label>
                <input class="form-control" value="<?php  $rtn['name']?>" type="email" name="u_email">

                <label class="form-label" for="img">Image:</label>
                <input class="form-control" value="<?php  $rtn['name']?>" type="file" name="u_img">

                <input type="submit" value="Update Information" class="btn btn-warning form-control my-2" name="u_add_info">
            </form>
        </div>
    </div>

</body>
</html>