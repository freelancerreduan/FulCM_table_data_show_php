<?php 


// Incluid Database Connection Hear
include('fun.php');

// Connection Page Class Ar Object Create hear;
$obConnect = new testApp();

// From Data Submited from Btn name click 
if(isset($_POST['add-info'])){
  $return_msg = $obConnect->add_data($_POST);
}

// CONNECTION SUCCESSFULLY END HRAR======================================

// display data show coded start hear
$student = $obConnect->showData();


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
                <input class="form-control" type="text" name="name">

                <label class="form-label" for="num">Number:</label>
                <input class="form-control" type="number" name="num">

                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" name="email">

                <label class="form-label" for="img">Image:</label>
                <input class="form-control" type="file" name="img">

                <input type="submit" value="Add Information" class="btn btn-warning form-control my-2" name="add-info">
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h1 class="text-danger text-center">NPI Collage Student List </h1>    
            

            <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>



            <tbody>
            <?php while($reciveData = mysqli_fetch_assoc($student)){ ?>
          <tr>
            <th scope="row"> <?php echo $reciveData['id']; ?> </th>
            <td> <?php echo $reciveData['name']; ?> </td>
            <td><?php echo $reciveData['number']; ?></td>
            <td><?php echo $reciveData['email']; ?></td>
            <td>
              <img src="upload/<?php echo $reciveData['img']; ?>" alt="" style="height: 50px; width :100%">
            </td>
            
            <td>
              <a href="ed.php?status=edit&&id=<?php echo $reciveData['id'];?>" class="btn btn-warning">Edite</a>
              <a href="" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php } ?>   
            </tbody>




            <!-- <tbody>
                <?php while($students = mysqli_fetch_assoc($students)){ ?>
                    <tr>
                        <td scope="row"> <?php echo $students['id']; ?> </td>
                        <td><?php echo $students['name']; ?> </td>
                        <td><?php echo $students['number']; ?></td>
                        <td><?php echo $students['email']; ?></td>
                        <td><img src="upload/<?php echo $students['img_name']; ?>" alt="" style="height: 50px;" ></td>
                        <td>
                            <a href="" class="btn btn-warning">Edite</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>    
            </tbody> -->
            </table>
        </div>
    </div>
















</body>
</html>