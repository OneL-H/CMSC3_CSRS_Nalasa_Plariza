<?php
    $mysqli = new mysqli("localhost", "root", "", "csrs");
    if (mysqli_connect_errno()) {
        echo "failed connection: " . mysqli_connect_error();
        exit();
    }

    if (isset($_POST['send'])) {
        $add_or = 0;
        $query = "SELECT * FROM `student_info` WHERE ";

        if (isset($_POST['stud_num'])) {
            $query .= "stud_num = '{$_POST['stud_num']}'";
            $add_or = 1;
        }

        if (isset($_POST['male'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "sex = 'M'";
            $or = 1;
        }

        if (isset($_POST['female'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "sex = 'F'";
            $or = 1;
        }

        if (isset($_POST['BACMA'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BA Communication and Media Arts'";
            $or = 1;
        }

        if (isset($_POST['BAE'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BA English'";
            $or = 1;
        }

        if (isset($_POST['ABE'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Agribusiness Economics'";
            $or = 1;
        }

        if (isset($_POST['ANTHRO'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Anthropology'";
            $or = 1;
        }

        if (isset($_POST['AMATH'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Applied Mathematics'";
            $or = 1;
        }

        if (isset($_POST['ARKI'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Architecture'";
            $or = 1;
        }

        if (isset($_POST['BIO'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Biology'";
            $or = 1;
        }

        if (isset($_POST['CS'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Computer Science'";
            $or = 1;
        }

        if (isset($_POST['FT'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Food Technology'";
            $or = 1;
        }

        if (isset($_POST['SS'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Sports Science'";
            $or = 1;
        }

        if (isset($_POST['CSM'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "college = 'CSM'";
            $or = 1;
        }

        if (isset($_POST['CHSS'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "college = 'CHSS'";
            $or = 1;
        }

        if (isset($_POST['SOM'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "college = 'SOM'";
        }
        
        $result = $mysqli -> query($query);
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

        <?php
            if(isset($_POST['send'])) {
                if (mysqli_affected_rows($mysqli) == 0) { echo "<div class=\"w-75 mx-auto mt-4\"><h1>There are no records that match.</h1></div>";}

                else {
                        echo "
                        <div class=\"w-75 mx-auto mt-4\"><h1>MATCHING RECORDS</h1>
                            <table class=\"table table-primary\">
                                <thead>
                                    <tr>
                                        <th scope=\"col\" class=\"col-sm-4\">Name</th>
                                        <th scope=\"col\" class=\"col-sm-1\">Sex</th>
                                        <th scope=\"col\" class=\"col-sm-1\">Year Level</th>
                                        <th scope=\"col\" class=\"col-sm-2\">College</th>
                                        <th scope=\"col\" class=\"col-sm-4\">Degree Program</th>
                                    </tr>
                                </thead>
                                <tbody class=\"table-light\">
                    ";
                    
                    while ($data = $result -> fetch_assoc()) {
                        echo "<tr><td scope=\"col\">";
                        echo $data["fname"] . " " . $data["mname"] . " " . $data["lname"];
                        echo "</td>";

                        echo "<td scope=\"col\">";
                        echo $data["sex"];
                        echo "</td>";

                        echo "<td scope=\"col\">";
                        echo $data["yearlevel"];
                        echo "</td>";

                        echo "<td scope=\"col\">";
                        echo $data["college"];
                        echo "</td>";

                        echo "<td scope=\"col\">";
                        echo $data["degprog"];
                        echo "</td></tr>";
                    }

                    echo "</tbody></table></div>";
                }
            }  
        ?>

        <footer>
            <p>Copyright © 2023 NALASA PLARIZA</p>
        </footer>

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>