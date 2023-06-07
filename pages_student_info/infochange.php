<?php
    session_start();
    $error = "";
        
    /*
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: ../mainpage.php");
        exit;
    }
    */
    $mysqli = new mysqli("localhost", "root", "", "csrs");

    $sendBtnValue = $_POST["send"];
    if (isset($sendBtnValue)) {
        if (mysqli_connect_errno()) {
            echo "failed connection: " . mysqli_connect_error();
            exit();
        }

        $query = "SELECT * FROM student_info WHERE stud_num = '{$_SESSION["studentnumber"]}'";
        $result = $mysqli -> query($query);
        $data = $result -> fetch_assoc();

        $data['fname'] = $_POST['firstName'];
        $data['mname'] = $_POST['middleName'];
        $data['lname'] = $_POST['lastName'];
        $data['address1'] = $_POST['address1'];
        $data['address2'] = $_POST['address2'];
        $data['bdate'] = $_POST['birthdate'];
        $data['college'] = $_POST['college'];
        $data['degprog'] = $_POST['degreeProgram'];
        $data['sex'] = $_POST['sex'];
        $data['didILoginForTheFirstTime'] = 1;
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
            <form method="POST" action="infochange.php" class="border border-2 rounded rounded-2 border-primary m-2 p-3 w-75 mx-auto my-auto was-validated">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-sm">
                            <?php
                                if ($_SESSION["note"] == "firstLogin") {
                                    echo "<h2 class=\"mb-3\">This is your first time logging in! Please enter your student details.</h2>";
                                }
                                else {
                                    echo "<h2 class=\"mb-3\">Change Info for ";
                                    echo htmlspecialchars($_SESSION["studentnumber"]);
                                    echo "</h2>";
                                }
                            ?>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-sm-5">
                            <input class="form-control is-invalid" id="firstName" name="firstName" type="text" required>
                            <label class="form-text mb-2" for="firstName">First Name</label>
                        </div>
                        <div class="col-sm">
                            <input class="form-control is-invalid" id="middleName" name="middleName" type="text" required>
                            <label class="form-text mb-2" for="middleName">Middle Name</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control is-invalid" id="lastName" name="lastName" type="text" required>
                            <label class="form-text mb-2" for="lastName">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <input class="form-control is-invalid" id="address1" name="address1" type="text" required>
                            <label class="form-text mb-2" for="address1">Address Line 1</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <input class="form-control" id="address2" name="address2" type="text">
                            <label class="form-text mb-2" for="address2">Address Line 2</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-7">
                            <input class="form-control is-invalid" id="birthdate" name="birthdate" type="date" required>
                            <label class="form-text mb-2" for="birthdate">Birthdaedede</label>
                        </div>
                        <div class="col-sm">
                            <select class="form-select is-invalid" id="sex" name="sex" required>
                                <option selected disabled hidden value="">Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label class="form-text mb-2" for="sex">Sex</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <select class="form-select is-invalid" id="college" name="college" required>
                                <option selected disabled hidden value="">Choose...</option>
                                <option value="CHSS">College of Humanities and Social Sciences</option>
                                <option value="CSM">College of Science and Mathematics</option>
                                <option value="SOM">School of Management</option>
                            </select>
                            <label class="form-text mb-2" for="college">College</label>
                        </div>
                        <div class="col-sm">
                            <select class="form-select is-invalid" id="degreeProgram" name="degreeProgram" required>
                                <option selected disabled hidden value="">Choose...</option>
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

                    <br><span class="form-text mb-4 text-danger"><?php echo $error; ?></span>

                    <div class="row">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-secondary" value="sneed "name="send">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>