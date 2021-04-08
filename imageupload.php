<!DOCTYPE html>
<?php
include 'config.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
    <style>
    thead{
    background-color: antiquewhite;
}
tbody{
    background-color: lavender;
    
}
.main{
    margin-top: 10px;
    background-color: gainsboro;
    max-width: 400px;
}
input{
    margin: 10px;
}


</style>
</head>
<body>

<center>
<div class="main">
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Name</label>
        <input type="text" name="name"><br>
        <label for="">Price</label>
        <input type="text" name="price"><br>
        <input type="file" name="image" ><br>
        <button type="submit" name="upload" class = 'btn btn-danger mb-2'> Upload</button>
    </form>
    </div>
    </center>

    <?php
     if (isset($_POST['upload'])) {
        
        //  print_r($_FILES["image"]);
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img_loc = $_FILES['image']['tmp_name'] ;
        $img_name = $_FILES['image']['name']; 
        $img_des = "uploadImage/".$img_name;
        move_uploaded_file($img_loc,"uploadImage/". $img_name);              //image ko ek jaga sy dusari jaga uta k rakh dena p1( image tem location )p2..destination
        mysqli_query($Con,"INSERT INTO `tblcrud`(`Name`,`Price`, `Image`) VALUES('$name','$price','$img_des')");
    }
?>

            <!-- fetch data -->


        


<div class="container">
<table class = "table table-bordered text-center mt-5  " style = "margin-left: 10px">
    <thead class="thead-dark">
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Delete</th>
        <th>Update</th>
        
        
        
        
        
        
    </thead>
    <tbody>
   <?php
include 'config.php';
$pic = mysqli_query($Con,"select * from tblcrud");
   while($row = mysqli_fetch_array($pic)){
   
  
  echo " <tr>
       <td>$row[Id]</td>
       <td>$row[Name]</td>
       <td>$row[Price]</td>
       <td> <img src='$row[Image]'  height = '70px' width = '200px'/> </td>
       <td><a href='delete.php? Id= $row[Id]' class = 'btn btn-danger'>Delete</a></td>
       <td><a href='update.php? Id= $row[Id]' class = 'btn btn-danger'>Update</a></td>
  
    </tr>
    ";
    
 
}
?>
</tbody>
</table>
</div>
</body>
</html>