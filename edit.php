<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP OOP CRUD TUTORIAL</title>
  </head>
  <body>

  <?php 
 $nameErr = $emailErr = $mobileErr = $addressErr = "";
 $name = $emailid = $mobile = $address= "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["name"])) {
$nameErr = "Name is required";
} else {
$name = $_POST["name"];
if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
$nameErr = "Only letters and white space allowed";
 }
}

if (empty($_POST["emailid"])) {
      $emailErr = "Email is required";
    } 
 else {
   $emailid = $_POST["emailid"];
  if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
  }
}

if (empty($_POST["mobile"])) {  
$mobileErr = "Mobile no is required";  
 } else {  
  $mobile = $_POST["mobile"]; 
  if (!preg_match ("/^[0-9]*$/", $mobile) ) {  
$mobileErr = "Only numeric value is allowed.";  
 }  
if (strlen ($mobile) != 10) {  
$mobileErr = "Contact no must contain 10 digits.";  
}  
}  

if (empty($_POST["address"])) {
$addressErr = "Address is required";
} else {
   $address = $_POST["address"];
}
}
?>


    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">PHP OOP CRUD - EDIT RECORD</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php

              include 'functions.php';
              $myClass = new myClass();
              $id = $_REQUEST['id'];
              $row = $myClass->edit($id);

              if (isset($_POST['update'])) {
                if (isset($_POST['name']) && isset($_POST['emailid']) && isset($_POST['mobile']) && isset($_POST['address'])) {
                  if (!empty($_POST['name']) && !empty($_POST['emailid']) && !empty($_POST['mobile']) && !empty($_POST['address']) ) {
                    
                    $data['id'] = $id;
                    $data['name'] = $_POST['name'];
                    $data['mobile'] = $_POST['mobile'];
                    $data['emailid'] = $_POST['emailid'];
                    $data['address'] = $_POST['address'];

                    $update = $myClass->update($data);

                    if($update){
                      echo "<script>alert('record update successfully');</script>";
                      echo "<script>window.location.href = 'display.php';</script>";
                    }else{
                      echo "<script>alert('record update failed');</script>";
                      echo "<script>window.location.href = 'display.php';</script>";
                    }

                  }else{
                    //echo "<script>alert('empty');</script>";
                    //header("Location: edit.php?id=$id");
                  }
                }
              }

          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
              <span class="error" style="color:red;"><?php echo $nameErr;?></span>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="emailid" name="emailid" value="<?php echo $row['emailid']; ?>" class="form-control">
              <span class="error" style="color:red;"><?php echo $emailErr;?></span>
            </div>
            <div class="form-group">
              <label for="">Mobile No.</label>
              <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control">
              <span class="error" style="color:red;"><?php echo $mobileErr;?></span>
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <textarea name="address" id="" cols="" rows="3" class="form-control"><?php echo $row['address']; ?></textarea>
              <span class="error" style="color:red;"><?php echo $addressErr;?></span>
            </div>
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>