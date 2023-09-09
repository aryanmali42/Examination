<?php
error_reporting(0);
// Include the database connection file
include('../connect.php');


$p_id=$_GET['p_id'];
$sql = "select*from professor where p_id='$p_id'";
$result = $conn->query($sql);
if ($result) {
  $row = $result->fetch_assoc();
  $name = $row['name'];
  //$pr_id=$row['pr_id'];
  $reg_sfc = $row['reg_sfc'];
  $desig = $row['designation'];
  $type = $row['type'];
  $ecm = $row['ecm'];
}

if ($_POST['Submit'] == true) {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $ecm = $_POST['ecm'];
  $desig = $_POST['designation'];
  $reg_sfc = $_POST['reg_sfc'];
  $sql = "update professor set name='$name',type='$type',ecm='$ecm',designation='$desig',reg_sfc='$reg_sfc' where p_id='$p_id'";
  $result = $conn->query($sql);
  if ($result) {
    #die("Data updated succesfully");
    echo "
  <script>
  alert('Data Updated Sucessfully');
  </script>
  ";
    header("refresh:0.5; url=index1.php");
  } else {
    die("ERROR");
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Professor Form</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/587a7128aa.js" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <style>
    *{
      font-family: 'Poppins', sans-serif;
    }
    body {
      background:linear-gradient(to right, #064d99, #439eff);;
    }

    .formm{
      max-width: 700px;
    			margin:20px auto;
    			padding: 30px 45px;
    			box-shadow: 5px 25px 35px #3535356b;
    			background-color: white;
    			border-radius: 10px;"
				margin-top: 50px;
    
    }
    
    .formm input[type="text"]:hover
		{
			color: #064d99;
            background: transparent;
            box-shadow: none;
            box-shadow:
                -1px -1px 5px 0px #fff,
                7px 7px 20px 0px #0003,
                4px 4px 5px 0px #0002;
		}

 
  </style>
</head>

<body>

<div style="margin-top:50px;background-color:white;border-radius:10px;display:flex;justify-content:center;padding:20px;max-width:700px;" class="container">
		<h3 style="font-size:30px;font-weight:bold;color:#064d99">Update Professor</h3>
	</div>
  
<div class="formm">
            <form action="<?php $_PHP_SELF ?>" method="post" class="form-group">





              <div style="padding:10px" class="div">
                <h3 style="font-size: 18px;font-weight:bold;">Name:-</h3>
                <input style="padding:" type="text" class="form-control" id="name" name="name" placeholder="Name" VALUE=<?php
                echo $name;
                ?>>
              </div>
          
            
              <div style="padding:10px" class="div">
                <h3 style="font-size: 18px;font-weight:bold;">Type:-</h3>
                <label style="font-weight:bold; class="radio-inline"><input type="radio" name="type" value="R" <?php if ($type == 'R') {
                  echo 'checked';
                } ?>>Regular</label>
                <label style="font-weight:bold; class="radio-inline"><input type="radio" name="type" VALUE="V" <?php if ($type == 'V') {
                  echo 'checked';
                } ?>>Visiting</label>

              </div>
              


              <div style="padding:10px" class="div">
                <h3 style="font-size: 18px;font-weight:bold;">Exam committee member:-</h3>
                <label style="font-weight:bold; class="radio-inline"><input type="radio" name="ecm" value="yes" <?php if ($ecm === 'yes') {
                  echo 'checked';
                } ?>>Yes</label>
                <label style="font-weight:bold; class="radio-inline"><input type="radio" name="ecm" value="no" <?php if ($ecm === 'no') {
                  echo 'checked';
                } ?>>No</label>

              </div>
              

              <div style="padding:10px" class="div">
                <h3 style="font-size: 18px;font-weight:bold;">Designation:-</h3>
                <input type="text" class="form-control" name="designation" placeholder="Designation" value=<?php
                echo $desig;
                ?>>
              </div>
          


              <div style="padding:10px" class="div">
                <h3 style="font-size: 18px;font-weight:bold;">Regular/SFC:-</h3>
                <label style="font-weight:bold;" class="radio-inline"><input type="radio" name="reg_sfc" VALUE="reg" <?php if ($reg_sfc === 'reg') {
                  echo 'checked';
                } ?>>Regular</label>
                <label style="font-weight:bold; class="radio-inline"><input type="radio" name="reg_sfc" value="sfc" <?php if ($reg_sfc === 'sfc') {
                  echo 'checked';
                } ?>>SFC</label>
                <label style="font-weight:bold; class="radio-inline"><input type="radio" name="reg_sfc" value="both" <?php if ($reg_sfc === 'both') {
                  echo 'checked';
                } ?>>Both</label>
                <br>
              </div>
          




              <div style="display:flex;justify-content:center;" class="form-group">
                <input type="submit" value="Update" name="Submit" class="btn btn-primary">
              </div>
          
            </form>
            </div>
        
</body>

</html>