<?php
    session_start();
        
    /*
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: ../mainpage.php");
        exit;
    }
    */
    $mysqli = new mysqli("localhost", "root", "", "csrs");
    if (mysqli_connect_errno()) {
        echo "failed connection: " . mysqli_connect_error();
        exit();
    }

    if (isset($_POST['send'])) {
        $query = "INSERT INTO `student_info` (`stud_num`, `password`, `didILoginForTheFirstTime`, `yearlevel`, 
        `fname`, `mname`, `lname`, `address1`, `address2`, `bdate`, `college`, `degprog`, `sex`)
        VALUES ('{$_POST['stud_num']}', '{$_POST['password']}', 0, '{$_POST['yearlevel']}', 
        '{$_POST['firstName']}', '{$_POST['middleName']}', '{$_POST['lastName']}',
        '{$_POST['address1']}', '{$_POST['address2']}', '{$_POST['birthdate']}', '{$_POST['college']}',
        '{$_POST['degreeProgram']}', '{$_POST['sex']}')";
        $mysqli -> query($query);
    }
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
        <a class="fixed-top btn btn-primary m-3" style="width: 5%" href="../mainpage_loggedin_bootstrappified.php">Back</a>

        <div class="position-absolute row w-100 h-100">
            <form method="POST" action="add.php" class="border border-2 rounded rounded-2 border-primary m-2 p-3 w-75 mx-auto my-auto was-validated">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-sm">
                            <h2 class="mb-3">Add Student Record</h2>
                        </div>
                    </div>
                    <?php
                            if(mysqli_affected_rows($mysqli) != 0){
                                echo "<div class=\"row\"> <div class=\"col-sm\"> 
                                <h4 class=\"mb-3\">Record with Student Number: {$_POST['stud_num']} successfully added</h4>
                                </div> </div>";
                            }
                            
                    ?>
                    <div class="row">
                        <div class="col-sm-2">
                            <input class="form-control" id="stud_num" name="stud_num" type="text" maxlength="10" required>
                            <label class="form-text mb-2" for="stud_num">Student Number</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" id="password" name="password" type="password" required>
                            <label class="form-text mb-2" for="password">Password</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" id="yearlevel" name="yearlevel" type="number" required>
                            <label class="form-text mb-2" for="yearlevel">Year Level</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <input class="form-control" id="firstName" name="firstName" type="text">
                            <label class="form-text mb-2" for="firstName">First Name</label>
                        </div>
                        <div class="col-sm">
                            <input class="form-control" id="middleName" name="middleName" type="text">
                            <label class="form-text mb-2" for="middleName">Middle Name</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" id="lastName" name="lastName" type="text">
                            <label class="form-text mb-2" for="lastName">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <input class="form-control" id="address1" name="address1" type="text" maxlength="99">
                            <label class="form-text mb-2" for="address1">Address Line 1</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <input class="form-control" id="address2" name="address2" type="text" maxlength="99">
                            <label class="form-text mb-2" for="address2">Address Line 2</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-7">
                            <input class="form-control" id="birthdate" name="birthdate" type="date">
                            <label class="form-text mb-2" for="birthdate">Birthdate</label>
                        </div>
                        <div class="col-sm">
                            <select class="form-select" id="sex" name="sex">
                                <option value="" selected>--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label class="form-text mb-2" for="sex">Sex</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <select class="form-select" id="college" name="college">
                                <option value="">--</option>
                                <option value="CHSS">College of Humanities and Social Sciences</option>
                                <option value="CSM">College of Science and Mathematics</option>
                                <option value="SOM">School of Management</option>
                            </select>
                            <label class="form-text mb-2" for="college">College</label>
                        </div>
                        <div class="col-sm">
                            <select class="form-select" id="degreeProgram" name="degreeProgram">
                                <option value="">--</option>
                                <option value="BA Communication and Media Arts">BA Communication and Media Arts</option>
                                <option value="BA English">BA English</option>
                                <option value="BS Agribusiness Economics">BS Agribusiness Economics</option>
                                <option value="BS Anthropology">BS Anthropology</option>
                                <option value="BS Applied Mathematics">BS Applied Mathematics</option>
                                <option value="BS Architecture">BS Architecture</option>
                                <option value="BS Biology">BS Biology</option>
                                <option value="BS Computer Science">BS Computer Science</option>
                                <option value="BS Food Technology">BS Food Technology</option>
                                <option value="BS Sports Science">BS Sports Science</option>
                            </select>
                            <label class="form-text mb-2" for="degreeProgram">Degree Program</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-secondary" name="send">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <?php echo "
        <script src=\../popper.min.js\"></script>
        <script src=\"../node_modules/bootstrap/dist/js/bootstrap.min.js\"></script>";
        
        $mysqli -> close(); ?>

    </body>
</html>