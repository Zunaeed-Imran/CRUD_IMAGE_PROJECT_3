<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $name2 = $_POST['name'];
  $email2 = $_POST['email'];
  $mobile2 = $_POST['mobile'];
  $password2 = $_POST['password'];
  $image2 = $_FILES['image'];

  $img_temp_name = $image2['tmp_name'];
  $img_name = $image2['name'];
  $img_destination = 'image/'.$img_name;

  // Move the uploaded image to the desired directory
  move_uploaded_file($img_temp_name, $img_destination);

  $sql = "insert into `crud` (name,email,mobile,password,image) values('$name2','$email2','$mobile2','$password2','$image2')";
  $result = mysqli_query($con, $sql);

  if ($result) {
    header('location:display.php');
  } else {
    die(mysqli_error($con));
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <form method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label>Name</label>
        <input class="form-control" type="text" name="name" placeholder="Enter your Name">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter your Email">
      </div>
      <div class="form-group">
        <label>Mobile</label>
        <input type="name" class="form-control" name="mobile" placeholder="Enter your Mobile Number">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" placeholder="Enter Password">
      </div>

      <div class="form-group">
        <label>Image</label>
        <input class="form-control" type="file" name="image" placeholder="Upload your Image">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>