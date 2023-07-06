<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "select * from `crud` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
//database variable
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];
$image = $row['image'];


//variable in code
if (isset($_POST['submit'])) {
  $name2 = $_POST['name'];
  $email2 = $_POST['email'];
  $mobile2 = $_POST['mobile'];
  $password2 = $_POST['password'];
  $image2 = $_FILES['image'];

  $img_temp_name = $image2['tmp_name'];
  $img_name = $image2['name'];
  $img_destination = 'image/' . $img_name;

  $sql = "update `crud` set id='$id',name='$name2', email='$email2', mobile = '$mobile2', password = '$password2', image = $image2 where id = $id";

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

  <div class="container my-5">
    <form action="" method="post">
      <div class="form-group">
        <label>Name</label>
        <input value="<?php echo $name ?>" class="form-control" type="name" name="name" placeholder="Enter your Name">
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" value="<?php echo $email; ?>" name="email" placeholder="Enter your Email">
      </div>
      <div class="form-group">
        <label>Mobile</label>
        <input class="form-control" value="<?php echo $mobile; ?>" type="name" name="mobile" placeholder="Enter your Mobile Number">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input class="form-control" value="<?php echo $password; ?>" type="password" name="password" placeholder="Enter Password">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input class="form-control" value="<?php echo $image ?>" type="file" name="image" placeholder="Upload your Image">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>