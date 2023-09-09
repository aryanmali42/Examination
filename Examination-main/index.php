<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/9e5ba2e3f5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

</head>

<body>
  <?php
  require "connect.php";
  if (isset($_POST['u_name'])) {
    session_start();
    $_SESSION['username'] = $_POST['u_name'];
    $u_name = $_SESSION['username'];
    $pass = $_POST['pass'];
    $sql = "select * from login where username='$u_name' and
password='$pass'";
    $q = $conn->query($sql);
    $count = mysqli_num_rows($q);
    if ($count) {
      $userdata = mysqli_fetch_array($q);
      if ($userdata['type'] === "A") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; ">
    <strong>Sucess!</strong> Login Successful as admin.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
        // echo "<script>alert('');</script>";
        echo '<META HTTP-EQUIV="Refresh" Content="0.5; URL=info-1.php">';
      } else {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width:100%; position: fixed; top: 0; left: 0; ">
      <strong>Sucess!</strong> Login Successful.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        // echo"<script> alert ('Login successful')</script>" ;
        echo '<META HTTP-EQUIV="Refresh" Content="0.5;URL=info-1.php">';
      }
    } else {
      echo "<script>alert('unable to Login.. ');</script>";
    }
  }
  ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="login">
          <div class="wrapper">
            <div class="form-container sign-in">
              <form name="login" method="post" action="index.php">
                <h1>Login</h1>
                <!-- UserName -->
                <div class="form-group">
                  <input type="name" class="form-control" id="u_name" name="u_name" required>
                  <i class="fas fa-user"></i>
                  <label for="">Username</label>
                </div>
                <!-- Password -->
                <div class="form-group ">
                  <input type="password" class="password" id="pass" name="pass" required>
                  <i class="fas fa-lock"></i>
                  <label for="">Password</label>
                  <label for="">Password</label>
                  <i class="fas fa-lock"></i>
                 
                </div>
                <div class="okay"><i class="eyee uil uil-eye-slash"></i></div>
                
                <script>
                  eyee = document.querySelector(".eyee"),
                  input =document.querySelector(".password"); 


                  eyee.addEventListener("click", function(){
                    if(input.type==='password'){
                      input.setAttribute('type','text');
                      eyee.classList.replace("uil-eye-slash","uil-eye");
                    }else{
                      input.setAttribute('type','password');
                      eyee.classList.replace("uil-eye","uil-eye-slash");
                    }
                  })

                </script>
                <!-- <script>
  var state= false;
  function toggle(){
    if(state){
      document.getElementById("pass").setAttribute("type","password");
      document.getElementById("eye").style.color='#7a797e';
      state = false;
    }
    else{
      document.getElementById("pass").setAttribute("type","text");
      document.getElementById("eye").style.color='#5887ef';
      state = true;
    }
  }
</script> -->
          <!-- FORGET PASSWORD -->
                <div class="forgot-pass">
                  <a href="#">forgot password?</a>
                </div>
                <!-- SubmitButton -->
                <br>
                <button type="submit" class="btn btn-lg btn-block btn-success">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {

      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(to right, #064d99, #439eff);
    }

    .login {
      padding: 15px;
      background-color: white;
      padding-bottom: 15px;
      padding-top: 15px;
      border-radius: 10px;

      text-align: center;
      text-transform: uppercase;
      margin-top: 140px;

    }

  .eyee{
    font-size:30px;
    cursor:pointer;
    }

    .okay{
      cursor:pointer;
      position:absolute;
      right:140px;
      transform:translate(0,-50%);
      top:65%;


    }

    
    .login h1 {
      margin-top: 30px;
      font-weight: bold;
      font-size: 60px;
      letter-spacing: 3px;
      color: #064d99;
    }

    .login form {
      max-width: 510px;
      margin: 30px auto;
    }

    .wrapper .form-container {
      align-items: center;
      justify-content: center;
      border-radius: .5rem;
    }

    .wrapper .form-container form .form-group {
      position: relative;
      margin: 3rem 0;
    }

    .wrapper .form-container form .form-group i,
    .wrapper .form-container form .form-group label {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.6rem;
      text-transform: capitalize;
      color: #333333;
      padding: 0 .5rem;
      pointer-events: none;
      transition: all .5s ease;
    }

    .wrapper .form-container form .form-group i {
      left: .5rem;
    }

    .wrapper .form-container form .form-group label {
      left: 2.5rem
    }

    .wrapper .form-container form .form-group input {
      width: 100%;
      height: 4rem;
      padding: 0 1rem;
      border-radius: .5rem;
      border: none;
      outline: none;
      border: .1rem solid #333333;
      font-size: 1.6rem;
      color: #333333;
      background: transparent;
    }

    form .form-group input:focus~label,
    form .form-group input:valid~label,
    form .form-group input:focus~i,
    form .form-group input:valid~i {
      top: 0 !important;
      font-size: 1.2rem !important;
      background-color: #ffffff;
      color: #064d99 !important;
    }

    .wrapper .form-container form .forgot-pass {
      margin: -1.5rem 0 1.5rem;
    }

    .wrapper .form-container form .forgot-pass a {
      color: #333333;
      text-decoration: none;
      font-size: 1.4rem;
      text-transform: capitalize;
      transform: all .5s ease;
    }

    .wrapper .form-container form .forgot-pass a:hover {
      color: #064d99;
    }

    .wrapper .form-container form .btn {
      background: linear-gradient(to right, #064d99, #62aeff);
      color: #ffffff;
      text-transform: capitalize;
      width: 100%;
      height: 4rem;
      font-size: 1.6rem;
      font-weight: 500;
      outline: none;
      border: none;
      border-radius: .5rem;
      cursor: pointer;
      box-shadow: 0 .2rem 1rem rgba(0, 0, 0, 0.4);
    }
  </style>
</body>

</html>