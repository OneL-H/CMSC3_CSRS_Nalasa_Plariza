<?php
    session_start();
        
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: mainpage.php");
        exit;
    }

    $mysqli = new mysqli("localhost", "root", "", "csrs");
    $query = "SELECT * FROM student_info WHERE stud_num = '{$_SESSION["studentnumber"]}'";

    $result = $mysqli -> query($query);
    $data = $result -> fetch_assoc();

    if ($data["didILoginForTheFirstTime"] == 1) {
        $_SESSION["note"] = "firstLogin";
        header('location: infochange.php');
    }
 
?>

<html lang="en">
    <head>
        <title>UP Mindanao CSRS Website</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stylesheet.css">
        <link rel="shortcut icon" href="../favicon.ico">

        <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="../scss/custom_colors.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-expand-sm body bg-primary m-3 rounded rounded-2 fixed-top" style="width: 97%">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    <img src="../logo_upmin_2.png" id="logo" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    UPMIN CSRS
                </a>
    
                <div class="navbar-collapse justify-content-end" id="">
                    <div class="row justify-content-end navbar-nav btn-group" style="width: 95%">
                        <div class="col-3">
                            <form action="../mainpage_loggedin_bootstrappified.php">
                                <button class="w-100 btn btn-primary text-center nav-link text-white" href="../mainpage_loggedin_bootstrappified.php">Home</button>
                            </form>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Sections</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="../pages_menu/about.php">about</a></li>
                                <li><a href="../pages_menu/privacy.php">privacy notice</a></li>
                                <li><a href="../pages_menu/up_email.php">up email</a></li>
                                <li><a href="../pages_menu/faq.php">faq</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle active"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Student Info</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="info.php">student details</a></li>
                                <li><a href="student_search.php">record search</a></li>
                                <li><a href="sdis.php">sdis</a></li>
                                <li><a href="prospectus.php">prospectus & grades</a></li>
                                <li><a href="sched.php">class schedule</a></li>
                                <li><a href="residency.php">residency</a></li>
                                <li><a href="matric.php">matriculation</a></li>
                                <li><a href="calendar.php">personal calendar</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Account</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="../pages_account/pwchange.php">change password</a></li>
                                <li><a href="../mainpage.php">log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="space"></div>
        
        <div class="w-50 mx-auto mt-4">
            <h1>STUDENT INFO</h1>
            <table class="table table-primary">
                <tbody>
                    <tr>
                        <td scope="row">Name</td>
                        <td class="table-light"><?php echo $data["fname"] . " " . $data["mname"] . " " . $data["lname"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Address</td>
                        <td class="table-light"><?php echo $data["address1"] . " " . $data["address2"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Sex</td>
                        <td class="table-light"><?php echo $data["sex"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Birthdate</td>
                        <td class="table-light"><?php echo $data["bdate"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">College</td>
                        <td class="table-light"><?php echo $data["college"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Degree Program</td>
                        <td class="table-light"><?php echo $data["degprog"] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Year Level</td>
                        <td class="table-light"><?php echo $data["yearlevel"] ?></td>
                    </tr>
                </tbody>
            </table>

            <a class="btn btn-primary" href="infochange.php">Update</a>

        </div>

        <footer>
            <p>Copyright © 2023 NALASA PLARIZA</p>
        </footer>

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>