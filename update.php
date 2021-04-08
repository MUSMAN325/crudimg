<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .main {
            margin-top: 10px;
            background-color: gainsboro;
            max-width: 400px;
        }

        input {
            margin: 10px;
        }
    </style>
</head>

<body>

    <!-- php code -->

    <?php
    include 'config.php';
    echo $ID = $_GET['Id'];
    $RData = mysqli_query($Con, "select * from tblcrud where Id = $ID");
    $Record = mysqli_fetch_array($RData);
    ?>

    <center>
        <div class="main">
        
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="">Name</label>
                <input type="text" value="<?php echo $Record['Name'] ?>" name="name" id=""><br>
                <label for="">Price</label>
                <input type="text" value="<?php echo $Record['Price'] ?>" name="price" id=""><br>
                <td><input type="file" name="image" value="<?php echo $Record['Image'] ?>" alt="">
                <img src="<?php echo $Record['Image'] ?>" width='200px'></td><br>
                <input type="hidden" name="Id" value="<?php echo $Record['Id'] ?>">
                <button type="submit" name="update" class='btn btn-danger my-2'> Update</button>
            </form>
        </div>
    </center>

    <!-- php code -->

    <?php
    if (isset($_POST["update"])) {

            // get data from form
            
        $ID = $_GET['Id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];

        $img_des = "uploadImage/" . $img_name;
        move_uploaded_file($img_loc, "uploadImage/" . $img_name);              //image ko ek jaga sy dusari jaga uta k rakh dena p1( image tem location )p2..destination



        mysqli_query($Con, "UPDATE `tblcrud` SET `Name`='$name',`Price`='$price',`Image`='$img_des' WHERE Id = '$ID'");
        header("location:image upload.php");
    }
    ?>

</body>

</html>