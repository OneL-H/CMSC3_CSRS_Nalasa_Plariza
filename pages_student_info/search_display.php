<?php
    $mysqli = new mysqli("localhost", "root", "", "csrs");
    if (mysqli_connect_errno()) {
        echo "failed connection: " . mysqli_connect_error();
        exit();
    }

    $studnum_set = (isset($_POST['stud_num_number']) && !empty($_POST['stud_num_number'])) 
        or (isset($_POST['stud_num_year']) && !empty($_POST['stud_num_year']));
    $name_set = isset($_POST['name']) && !empty($_POST['name']);
    $exact_checker = isset($_POST['bdate_exact']) && !empty($_POST['bdate_exact']);
    $from_checker = isset($_POST['bdate_from']) && !empty($_POST['bdate_from']);
    $to_checker = isset($_POST['bdate_to']) && !empty($_POST['bdate_to']);
    $bdate_set = ($exact_checker or $from_checker or $to_checker);
    $address_set = isset($_POST['address']) && !empty($_POST['address']);

    $courses_set = !empty($_POST["courses"]);
    $colleges_set = !empty($_POST["colleges"]);
    $year_set = !empty($_POST["yr"]);

    $sex_set = $_POST['sex'] != 'B';
    
    if (isset($_POST['send'])){
        $add_or = 0;
        $query = "SELECT * FROM `student_info` WHERE ";

        if (isset($_POST['stud_num'])) {
            $query .= "stud_num = '{$_POST['stud_num']}'";
            $add_or = 1;
        }

        if (isset($_POST['male'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "sex = 'M'";
            $add_or = 1;
        }

        $bdate_query = "";
        if($bdate_set){
            if($exact_checker == 1) $bdate_query = "bdate = '{$_POST['bdate_exact']}'";
            else if($from_checker == 1 && $to_checker == 1) $bdate_query = "bdate BETWEEN '{$_POST['bdate_from']}' and '{$_POST['bdate_to']}'";
            else if($from_checker == 1) $bdate_query = "bdate >= '{$_POST['bdate_from']}'";
            else if($to_checker == 1) $bdate_query = "bdate <= '{$_POST['bdate_to']}'";
        }

        if (isset($_POST['BACMA'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BA Communication and Media Arts'";
            $add_or = 1;
        }

        if (isset($_POST['BAE'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BA English'";
            $add_or = 1;
        }

        if (isset($_POST['ABE'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Agribusiness Economics'";
            $add_or = 1;
        }

        if (isset($_POST['ANTHRO'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Anthropology'";
            $add_or = 1;
        }

        if (isset($_POST['AMATH'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Applied Mathematics'";
            $add_or = 1;
        }

        if (isset($_POST['ARKI'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Architecture'";
            $add_or = 1;
        }

        if (isset($_POST['BIO'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Biology'";
            $add_or = 1;
        }

        if (isset($_POST['CS'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Computer Science'";
            $add_or = 1;
        }

        if (isset($_POST['FT'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "degprog = 'BS Food Technology'";
            $add_or = 1;
        }

        $sex_query = "";
        if($sex_set){
            if($_POST['sex'] == 'M'){
                $sex_query = "sex = 'M'";
            }else if ($_POST['sex'] == 'F'){
                $sex_query = "sex = 'F'";
            }
        }
        
        $allquery = "SELECT * FROM student_info";
        $querylist = array($sex_query, $studnum_query, $name_query, $bdate_query, $address_query, $courses_query, $colleges_query, $yr_query);
        $and_needed = false;
        $firstinsert = 0;
        foreach($querylist as $q){
            if($q == "") continue;
            if($and_needed){
                $allquery .= " AND ";
            }else{
                if($firstinsert == 0) {
                    $allquery .= " WHERE ";
                    $firstinsert = 1;
                }
                $and_needed = true;
            }
            $allquery .= $q;
        }

        if (isset($_POST['CHSS'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "college = 'CHSS'";
            $add_or = 1;
        }

        if (isset($_POST['SOM'])) {
            if ($add_or == 1) $query .= " OR ";
            $query .= "college = 'SOM'";
        }
        
        $query .= "ORDER BY `sex` DESC, `lname` ASC";
        
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
                <div class=\"row\"> <span>";

            $template .= "Birthdate: " . $bdate;
            $template .= "</span> </div> <div class=\"row\"> <span>";

            $template .= $address1;
            $template .= "</span></div><div class=\"row\"><span>";
                
            $template .= $address2;
            $template .= "</span></div></div>";

            return $template;
        }
            if(isset($_POST['send'])) {
                if (mysqli_affected_rows($mysqli) == 0) { echo "<div class=\"w-75 mx-auto mt-4\"><h1>There are no records that match.</h1></div>";}

                $exact_result = $mysqli -> query($allquery);
                echo "<div class=\"border border-2 rounded rounded-2 border-primary shadow m-2 p-3 w-75 mx-auto my-auto row-gap-2\">";
                if(mysqli_affected_rows($mysqli) == 0){
                    echo "<h3>NO EXACT MATCH. </h3>";
                }else{
                    echo "<h1>EXACT MATCHES: </h1>";
                    while ($data = $exact_result -> fetch_assoc()) {
                        echo format_results($data['lname'], $data['fname'], $data['mname'], $data['sex'], 
                            $data['stud_num'], $data['college'], $data['degprog'], $data['yearlevel'], 
                            $data['units_enlisted'], $data['bdate'], $data['address1'], $data['address2']);
                    }
                    echo "</div>";

                    /*
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
                }
                echo "</div>";
            }
        ?>

        <footer>
            <p>Copyright © 2023 NALASA PLARIZA</p>
        </footer>
      
        <?php echo "<script src=\"../popper.min.js\"></script>
        <script src=\"../node_modules/bootstrap/dist/js/bootstrap.min.js\"></script>";
        ?>

        <?php $mysqli -> close(); ?>
    </body>
</html>