<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manageprofessor info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<!--  -->

<body>
    <style>
        body {
            background: #eee;

        }

        .content {
            max-width: 1200px;
            margin: auto;
            padding: 10px;
            margin-top: -110px;
        }

        .frame {
            justify-content: center;
            margin: 40px auto;
            text-align: center;
            padding: 15px;
            text-align: center;
            text-transform: uppercase;
            margin-top: 150px;
        }

        button {
            margin: 20px;
        }

        .custom-btn {
            color: #fff;
            font-family: 'Lato', sans-serif;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
                7px 7px 20px 0px rgba(0, 0, 0, .1),
                4px 4px 5px 0px rgba(0, 0, 0, .1);
            outline: none;
        }

        .btn-5 {
            border-radius: 10px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
            font-size: 20px;
            white-space: normal;
            padding: 36px;
            background: linear-gradient(to right, #064d99, #439eff);
        }

        .btn-5:hover {
            color: #064d99;
            background: transparent;
            box-shadow: none;
        }

        .btn-5:before,
        .btn-5:after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            height: 2px;
            width: 0;
            background: #064d99;
            box-shadow:
                -1px -1px 5px 0px #fff,
                7px 7px 20px 0px #0003,
                4px 4px 5px 0px #0002;
            transition: 400ms ease all;
        }

        .btn-5:after {
            right: inherit;
            top: inherit;
            left: 0;
            bottom: 0;
        }

        .btn-5:hover:before,
        .btn-5:hover:after {
            width: 100%;
            transition: 800ms ease all;
        }
    </style>
    <!-- BACKGROUND IMG -->
    <!-- <div class="bg-image" 
style="   background-image: url('https://mdbootstrap.com/img/new/fluid/nature/011.jpg');

       height: 100vh"> -->
    <?php
    require "connect.php";

    $query = mysqli_query($conn, "SELECT * FROM `login` WHERE username='" . $_SESSION['username'] . "'");
    while ($row = mysqli_fetch_array($query)) {
        $ecm = $row['type'];
    }
    if ($ecm == 'A') {
        ?>
        <div class="content container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="frame">
                        <form>
                            <div>
                                <!-- Feed TimeTable -->
                                <a href="table/index2.php" <button class="custom-btn btn-5 btn btn-lg btn-block"><span>Feed
                                        Time
                                        Table</span></button></a><br><br>
                                <!-- Manage Professor Duty -->
                                <a href="professor/manageprof.html" <button
                                    class="custom-btn btn-5 btn btn-lg btn-block"><span>Manage Professor
                                        Duty</span></button></a><br><br>
                                <!-- Allocate Duty -->
                                <a href="" <button class="custom-btn btn-5 btn btn-lg btn-block"><span>Allocate
                                        duty</span></button></a><br><br>
                                <!-- Display SuperVision Chart -->
                                <a href="" <button class="custom-btn btn-5 btn btn-lg btn-block"><span>Display supervision
                                        chart</span></button></a><br><br>
                            </div>
                            <!-- Manage User Info -->
                            <div><a href="user/manageuser.html" <button
                                    class="custom-btn btn-5 btn btn-lg btn-block"><span>Manage User
                                        Info</span></button></a><br>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    <?php } else { ?>
        <div class="content container ">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="frame">
                        <form>
                            <br>
                            <div>
                                <!-- Feed TimeTable -->

                                <a href="table/index2.php" <button class="custom-btn btn-5 btn btn-lg btn-block"><span>Feed
                                        Time
                                        Table</span></button></a><br><br>
                                <!-- Manage Professor Duty -->

                                <a href="professor/manageprof.html" <button
                                    class="custom-btn btn-5 btn btn-lg btn-block"><span>Manage Professor
                                        Duty</span></button></a><br><br>
                                <!-- Allocate Duty -->

                                <a href="" <button class="custom-btn btn-5 btn btn-lg btn-block"><span>Allocate
                                        duty</span></button></a><br><br>
                                <!-- Display SuperVision Chart -->

                                <a href="" <button class="custom-btn btn-5 btn btn-lg btn-block"><span>Display supervision
                                        chart</span></button></a><br><br>
                            </div>

                        </form>
                    <?php } ?>
</body>

</html>