<?php
// Include the database connection file
include('../connect.php');
?>

<html>
<head>
	<title>Update/Delete Profesor</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
	<style>
		    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {

font-family: 'Poppins', sans-serif;
}
body {
background: linear-gradient(to right, #064d99, #439eff);
}
		body{
			background-color: #eee;
			padding-top:20px;
		}
		.formm{
				max-width: 800px;
    			margin:20px auto;
    			padding: 30px 45px;
    			box-shadow: 5px 25px 35px #3535356b;
    			background-color: white;
    			border-radius: 10px;"
				margin-top: 120px;
		}
		.formm label
		{text-align: center;
			font-size: 18px;
			
      text-transform: uppercase;
		}
		.formm select
		{
			font-size: 15px;
			color: #064d99;
		}
		.formm select:hover
		{
			color: #064d99;
            background: transparent;
            box-shadow: none;
            box-shadow:
                -1px -1px 5px 0px #fff,
                7px 7px 20px 0px #0003,
                4px 4px 5px 0px #0002;
		}
		.formm1{
				max-width: 800px;
    			margin:20px auto;
    			padding: 10px 15px;
    			box-shadow: 5px 25px 35px #3535356b;
    			background-color: #eee;
    			border-radius: 10px;
		}

	</style>
	</style>
<script type="text/javascript">
  $(document).ready(function(){
    // Department dependent ajax
    $("#department").on("change",function(){
      var departId = $(this).val();
      $.ajax({
        url :"action.php",
        type:"POST",
        cache:false,
        data:{depId:departId},
        success:function(data){
          $("#programee").html(data);
        }
      });
    });
    
  });
</script>

<body>
<div style="margin-top:90px;background-color:white;border-radius:10px;display:flex;justify-content:center;padding:20px;max-width:800px;" class="container">
		<h3 style="font-size:30px;font-weight:bold;color:#064d99">Update Professor</h3>
	</div>
	<div class="formm">
		<div class="sizeform">

    <br />
		<form action="<?php $_PHP_SELF ?>" method="post">
			<div class="col-auto">

				<!-- Department dropdown -->
				<label for="department">Department</label>
				<select class="form-control" id="department" name="department1">
					<option value="">Select Department</option>
					<?php
					$query = "SELECT * FROM department";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['d_id'].'">'.$row['name'].'</option>';
						}
					}else{
						echo '<option value="">Country not available</option>';
					}
					?>
				</select>
        <br />

				<!-- Programme dropdown -->
				<label for="programee">Programee</label>
				<select class="form-control" id="programee" name="programee1">
					<option value="">Select Programee</option>
				</select>
		<br/>
		        <input type="submit" value="Submit" name="Submit" class="btn btn-primary">
			</div>
		</form>
	</div>
	</div>
				</div>
</body>
</html>
<?php
error_reporting(0);
if($_SERVER['REQUEST_METHOD']=='POST'){
//echo $_POST["department1"];
//echo $_POST["programee1"];
$a=$_POST["department1"];
$b=$_POST["programee1"];

echo "
<div class='formm1'>
		<div class='sizeform1'>
		<div class='table-responsive'>

<table border='1' class='table table-hover mx-auto px-auto'>
<thead class='thead-dark'>
<th>Name</th>
<th>Regular/SFC</th>
<th>Designation</th>
<th>Type(Reg/Vis)</th>
<th>ECM</th>
<th colspan='2' class='text-center'>Actions</th>
</thead></div></div>
";

$sql="SELECT p.name,p.reg_sfc,p.designation,p.type,p.ecm FROM professor as p JOIN p_department as pd ON p.p_id=pd.p_id JOIN programme as pr ON pr.d_id=pd.d_id  WHERE pr.d_id=$a AND pr.pr_id=$b";


$result=$conn->query($sql);
//echo 'hello';
if($result){
	
while($row=$result->fetch_assoc()){
 $name=$row['name'];
 $p_id=$row['p_id'];
 //$pr_id=$row['pr_id'];
 $reg_sfc=$row['reg_sfc'];
 $desig=$row['designation'];
 $type=$row['type'];
 $ecm=$row['ecm'];

echo "<tr>
<td>".$name."</td>
<td>".$reg_sfc."</td>
<td>".$desig."</td>
<td>".$type."</td>
<td>".$ecm."</td>
<td class='text-center'><a href='update(prof).php?p_id=$p_id'><input type='button' class='btn btn-success' value='Update'></a></td>
<td class='text-center'><a href='delete.php?p1_id=$p_id'><input type='button' class='btn btn-danger' value='Delete'></a></td>
</tr>
";
}
}
}
?>