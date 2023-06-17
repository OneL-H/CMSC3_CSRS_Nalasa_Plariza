<?php
    $mysqli = new mysqli("localhost", "root", "", "csrs");
    if (mysqli_connect_errno()) {
        echo "failed connection: " . mysqli_connect_error();
        exit();
    }

    $studnum_set = (isset($_POST['stud_num_number']) && !empty($_POST['stud_num_number'])) 
        or (isset($_POST['stud_num_year']) && !empty($_POST['stud_num_year']));
    $name_set = isset($_POST['name']) && !empty($_POST['name']) ;
    $bdate_set = (isset($_POST['bdate_exact']) && !empty($_POST['bdate_exact'])) 
        or (isset($_POST['bdate_from']) && !empty($_POST['bdate_from']))
        or (isset($_POST['bdate_to']) && !empty($_POST['bdate_to']));
    $address_set = isset($_POST['address']) && !empty($_POST['address']);

    $courses_set = !empty($_POST["courses"]);
    $colleges_set = !empty($_POST["colleges"]);
    $year_set = !empty($_POST["yr"]);

    $sex_set = $_POST['sex'] != 'B';
    
    if (isset($_POST['send'])){
        $add_or = 0;
        $query = "SELECT * FROM `student_info` WHERE ";

        $query_multipliers = array(1.1, 3, 2.75, 2.5, 2.3, 1.9, 1.7, 1.2);
        
        $studnum_query = "";
        if($studnum_set){
            if(isset($_POST['stud_num_number'], $_POST['stud_num_year'])){ // both checked!
                $studnum_query = "stud_num = '" . $_POST['stud_num_year'] . "-" . $_POST['stud_num_number'] . "'";
            }else if(isset($_POST['stud_num_number'])){
                $studnum_query = "stud_num LIKE '%" . $_POST['stud_num_number'] . "'";
                $query_multipliers[1] = 2.9;
            }else if(isset($_POST['stud_num_year'])){
                $studnum_query = "stud_num LIKE '" . $_POST['stud_num_year'] . "%'";
                $query_multipliers[1] = 1.5;
            }
        }

        $name_query = "";
        if($name_set){
            $name_query = "fname LIKE '%" . $_POST['name'] . "%' OR mname LIKE '%" . $_POST['name'] . "%'"
                . " OR lname LIKE '%" . $_POST['name'] . "%'";
        }

        $bdate_query = "";
        if($bdate_set){
            if(isset($_POST['bdate_exact'])){ // simplest case. date exactly this.
                $bdate_query = "bdate = " . $_POST['bdate_exact'];
            }else if(isset($_POST['bdate_from'], $_POST['bdate_to'])){
                $bdate_query = "bdate BETWEEN " . $_POST['bdate_from'] . " and " . $_POST['bdate_to'];
            }else if(isset($_POST['bdate_from'])){
                $bdate_query = "bdate >= " . $_POST['bdate_from'];
            }else if(isset($_POST['bdate_to'])){
                $bdate_query = "bdate <= " . $_POST['bdate_to'];
            }
        }

        $address_query = "";
        if($address_set){
            $address_query = "address1 LIKE '%" . $_POST['address'] 
                . "%' OR address2 LIKE '%" . $_POST['address'] . "%'";
        }

        $courses_query = "";
        if($courses_set){
            $courses_query = "degprog IN (";

            for($i = 0; $i < sizeof($_POST['courses']); $i++){
                if($i != 0) $courses_query .= ", ";
                $courses_query .= "'" . $_POST['courses'][$i]. "'";
                
            }

            $courses_query .= ")";
        }

        $colleges_query = "";
        if($colleges_set){
            $colleges_query = "college IN (";

            for($i = 0; $i < sizeof($_POST['colleges']); $i++){
                if($i != 0) $colleges_query .= ", ";
                $colleges_query .= "'" . $_POST['colleges'][$i] . "'";
                
            }

            $colleges_query .= ")";
        }

        $yr_query = "";
        if($year_set){
            $yr_query = "yearlevel IN (";
            for($i = 0; $i < sizeof($_POST['yr']); $i++){
                if($i != 0) $yr_query .= ", ";
                $yr_query .= $_POST['yr'][$i];
            }

            $yr_query .= ")";
        }

        $sex_query = "";
        if($sex_set){
            if($_POST['sex'] == 'M'){
                $sex_query = "sex = 'M'";
            }else{
                $sex_query = "sex = 'F'";
            }
        }
        
        $allquery = "SELECT * FROM student_info WHERE ";
        $querylist = array($sex_query, $studnum_query, $name_query, $bdate_query, $address_query, $courses_query, $colleges_query, $yr_query);
        $and_needed = false;
        foreach($querylist as $q){
            if($q == "") continue;
            if($and_needed){
                $allquery .= " AND ";
            }else{
                $and_needed = true;
            }
            $allquery .= $q;
        }
        
        
        $templatequery = "SELECT stud_num FROM student_info WHERE ";
        $matching_ids = array();
        for($j = 0; $j < 8; $j++){
            if($querylist[$j] != ""){
                $tempquery = $templatequery . $querylist[$j];
                $tempresults = $mysqli -> query($tempquery);
                while($data = $tempresults -> fetch_assoc()){
                    if(array_key_exists($data['stud_num'], $matching_ids)){
                        $matching_ids[$data['stud_num']] *= $query_multipliers[$j];
                    }else{
                        $matching_ids += [$data['stud_num'] => $query_multipliers[$j]];
                    }
                }
            }
        }

        arsort($matching_ids);
        $best_query = "SELECT * FROM student_info WHERE stud_num IN (";
        $best_ordering = ") ORDER BY FIELD (stud_num, ";
        $id_count = 0;
        $id_limit = 5;
        foreach($matching_ids as $k => $i){
            if($id_count == $id_limit) break;
            if($id_count > 0){
                $best_query .= ", ";
                $best_ordering .= ", ";
            }
            $best_query .= "'" . $k . "'";
            $best_ordering .= "'" . $k . "'";
            $id_count++;
        }
        $best_query .= $best_ordering . ")";
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
        <nav class="navbar navbar-expand-sm body bg-primary m-3 rounded rounded-2 fixed-top mx-auto" style="width: 97%">
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
                                <li><a href="prospectus.php">prospectus & grades</a></li>
                                <li><a href="calendar.php">academic calendar</a></li>
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
        <div id="morespace"></div>

        <?php
        function format_results($lname, $fname, $mname, $sex, $studnum, $college, 
                    $degprog, $yearlevel, $unitsenlisted, $bdate, $address1, $address2){
            
            $template = "<div class=\"row border border-1 rounded rounded-1 border-primary-subtle my-auto p-2 m-2\">
                    <div class=\"d-flex align-items-end\"> <h2 class=\"m-1\">";
    
            $template .= $lname;
            $template .= ",</h2> <h4 class=\"m-1\">";

            $template .= $fname . ", " . $mname;
            $template .= "</h4> <h6 class=\"m-1\">";

            $template .= "(" . $sex . ")";
            $template .= "</h6> <h6 class=\"ms-auto\">";

            $template .= $studnum;
            $template .= "</h6> </div> <hr class=\"text-black\" style=\"margin: 0.125% !important;\"> 
                <div class=\"d-flex align-items-center justify-content-around\"> <span class=\"m-1\">";

            $template .= $college . " - " . $degprog;
            $template .= "</span> <span class=\"m-1\">";

            $template .= "YEAR LEVEL: " . $yearlevel;
            $template .= "</span> <span class=\"m-1\">";

            $template .= "Units Enlisted: " . $unitsenlisted;
            $template .= "</span> </div> <hr class=\"text-black\" style=\"margin: 0.125% !important;\">
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

<<<<<<< Updated upstream
                else {

                    echo "<div class=\"border border-2 rounded rounded-2 border-primary m-2 p-3 w-75 mx-auto my-auto row-gap-2\">
                        <h1>MATCHING RECORDS</h1>";
                    while ($data = $result -> fetch_assoc()) {
                        echo "
                        <div class=\"row border border-1 rounded rounded-1 border-primary-subtle my-auto p-2 m-2 mb-2\">
                            <div class=\"d-flex align-items-end\">";
    
                        echo "<h2 class=\"m-1\">";
                        echo $data["lname"] . ",";
                        echo "</h2>";
    
                        echo "<h4 class=\"m-1\">";
                        echo $data["fname"] . ", " . $data["mname"];
                        echo "</h4>";
    
                        echo "<h6 class=\"m-1\">";
                        echo "(" . $data["sex"] . ")";
                        echo "</h6>";
    
                        echo "<h6 class=\"ms-auto\">";
                        echo $data["stud_num"];
                        echo "</h6>";
    
                        echo "</div>";
                        echo "<hr class=\"text-black\" style=\"margin: 0.125% !important;\">";
    
                        echo "<div class=\"d-flex align-items-center justify-content-around\">";
                    
                        echo "<span class=\"m-1\">";
                        echo $data["college"] . " - " . $data["degprog"];
                        echo "</span>";
    
                        echo "<span class=\"m-1\">";
                        echo "YEAR LEVEL: " . $data["yearlevel"];
                        echo "</span>";
    
                        echo "<span class=\"m-1\">";
                        echo "Units Enlisted: " . $data["units_enlisted"];
                        echo "</span></div>
                        
                        <hr class=\"text-black\" style=\"margin: 0.125% !important;\">
                        <div class=\"row\">";
    
                        echo "<span>";
                        echo "Birthdate: " . $data["bdate"];
                        echo "</span>
                        </div>
                        <div class=\"row\">
                        <span>";
    
                        echo $data["address1"];
                        echo "</span></div><div class=\"row\"><span>";
                        
                        echo $data["address2"];
                        echo "</span></div></div>";
=======
                $exact_result = $mysqli -> query($allquery);
                echo "<div class=\"border border-2 rounded rounded-2 border-primary m-2 p-3 w-75 mx-auto my-auto row-gap-2\">";
                if(mysqli_affected_rows($mysqli) == 0){
                    echo "<h3>NO EXACT MATCH. </h3>";
                }else{
                    echo "<h1>EXACT MATCH/ES: </h1>";
                    while ($data = $exact_result -> fetch_assoc()) {
                        echo format_results($data['lname'], $data['fname'], $data['mname'], $data['sex'], 
                            $data['stud_num'], $data['college'], $data['degprog'], $data['yearlevel'], 
                            $data['units_enlisted'], $data['bdate'], $data['address1'], $data['address2']);
>>>>>>> Stashed changes
                    }
                }
                echo "</div>";

                $best_result = $mysqli -> query($best_query);
                echo "<div class=\"border border-2 rounded rounded-2 border-primary m-2 p-3 w-75 mx-auto my-auto row-gap-2\">";
                if(mysqli_affected_rows($mysqli) == 0){
                    echo "<h3>NO GOOD MATCHES. </h3>";
                }else{
                    echo "<h1>BEST MATCH/ES: </h1>";
                    while ($data = $best_result -> fetch_assoc()) {
                        echo format_results($data['lname'], $data['fname'], $data['mname'], $data['sex'], $data['stud_num'], 
                            $data['college'], $data['degprog'], $data['yearlevel'], $data['units_enlisted'], $data['bdate'], 
                            $data['address1'], $data['address2']);
                    }
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

                echo "</tbody></table></div>";

                
            */
            }
        ?>

        <footer>
            <p>Copyright © 2023 NALASA PLARIZA</p>
        </footer>

        <?php echo "<script src=\"../popper.min.js\"></script>
        <script src=\"../node_modules/bootstrap/dist/js/bootstrap.min.js\"></script>";
        ?>
    </body>
</html>