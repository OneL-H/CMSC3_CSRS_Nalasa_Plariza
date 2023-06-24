<?php
    session_start();
    
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: mainpage.php");
        exit;
    }

    $mysqli = new mysqli("localhost", "root", "", "csrs");

    if (mysqli_connect_errno()) {
        echo "failed connection: " . mysqli_connect_error();
        exit();
    }

    $query = "SELECT * FROM admin_info WHERE admin_num = '{$_SESSION["adminnumber"]}'";

    $result = $mysqli -> query($query);
    $data = $result -> fetch_assoc();
    
    $mysqli -> query($query);

    if ($data["didILoginForTheFirstTime"] == 1) {
        $_SESSION["note"] = "firstLogin";
        header('location: namechange.php');
    }

    // redirect to set name
?>

<!DOCTYPE html>
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
        <nav class="navbar navbar-expand-sm body bg-primary m-3 rounded rounded-2 fixed-top mx-auto" style="width: 97%">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    <img src="../logo_upmin_2.png" id="logo" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    ADMIN PAGE
                </a>
                <div class="navbar-collapse justify-content-end" id="">
                    <div class="row justify-content-end navbar-nav btn-group" style="width: 95%">
                        <div class="col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white active" href="#">Home</button>
                        </div>
                        <div class="col-3">
                            <form action="add.php">
                                <button class="w-100 btn btn-primary text-center nav-link text-white">Add Record</button>
                            </form>
                        </div>
                        <div class="col-3">
                            <form action="student_search.php">
                                <button class="w-100 btn btn-primary text-center nav-link text-white">Search Records</button>
                            </form>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Account</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="namechange.php">change name</a></li>
                                <li><a href="pwchange.php">change password</a></li>
                                <li><a href="../logout.php">log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="space"></div>
        <div id="morespace"></div>

        <?php
        function format_results($lname, $fname, $mname, $sex, $studnum, $college, 
                    $degprog, $yearlevel, $unitsenlisted, $bdate, $address1, $address2){
            
            $template = "<div class=\"row border border-1 rounded rounded-1 border-primary-subtle shadow-sm my-auto p-2 m-2 mb-2\">
                    <div class=\"d-flex align-items-end\"> <h2 class=\"m-1\">";
    
            $template .= $lname;
            $template .= ",</h2> <h4 class=\"m-1\">";

            $template .= $fname . ", " . $mname;
            $template .= "</h4> <h6 class=\"m-1\">";

            $template .= "(" . $sex . ")";
            $template .= "</h6> <h6 class=\"ms-auto\">";

            $template .= $studnum;
            $template .= "</h6> </div> <hr class=\"text-black\" style=\"margin: 0.125% !important;\"> 
                <div class=\"container align-items-center\"> <div class=\"row py-2\"> <div class=\"col-sm-5\"> <span>";

            $template .= $college . " - " . $degprog;
            $template .= "</span> </div> <div class=\"col-sm-4\"> <span>";

            $template .= "YEAR LEVEL: " . $yearlevel;
            $template .= "</span> </div> <div class=\"col-sm-3\"> <span>";

            $template .= "Units Enlisted: " . $unitsenlisted;
            $template .= "</span> </div> </div> </div> <hr class=\"text-black\" style=\"margin: 0.125% !important;\">
                <div class=\"container d-flex\"> <div class=\"col\"> <div class=\"row\"> <span>";

            $template .= "Birthdate: " . $bdate;
            $template .= "</span> </div> <div class=\"row\"> <span>";

            $template .= $address1;
            $template .= "</span> </div> <div class=\"row\"> <span>";
                
            $template .= $address2;
            $template .= "</span> </div> </div>";

            $template .= "<div class=\"d-flex row float-end align-items-end\">
                        <div class=\"col\">
                        <form method=\"POST\" action=\"infochange.php\" class=\"col\">
                            <button type=\"submit\" value=\"{$studnum}\"class=\"btn btn-primary\" name=\"rec_update\">Update</button>
                        </form>
                        </div>
                        <div class=\"col\">
                        <form method=\"POST\" action=\"delete.php\">
                            <button type=\"submit\" value=\"{$studnum}\"class=\"btn btn-danger\" name=\"rec_delete\">Delete</button>
                        </form>
                        </div>
                        
                    </div> </div> </div>";

            return $template;
        }

        echo "<div class=\"border border-2 rounded rounded-2 border-primary shadow m-2 mb-5 p-3 w-75 mx-auto my-auto row-gap-2\">";
                $query = "SELECT * FROM `student_info` WHERE 1";
                $results = $mysqli -> query($query);
                echo "<h1>RECORDS: </h1>";
                while ($data = $results -> fetch_assoc()) {
                    echo format_results($data['lname'], $data['fname'], $data['mname'], $data['sex'], 
                        $data['stud_num'], $data['college'], $data['degprog'], $data['yearlevel'], 
                        $data['units_enlisted'], $data['bdate'], $data['address1'], $data['address2']);
                }

        $mysqli -> close();
        
        ?>

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>

</html>