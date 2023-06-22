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

    if (isset($_POST['rec_update'])) {
        $_SESSION["studentnumbertochange"] = $_POST['rec_update'];
        $query = "SELECT * FROM student_info WHERE stud_num = '{$_SESSION["studentnumbertochange"]}'";
        $result = $mysqli -> query($query);
        $data = $result -> fetch_assoc();
    }

    if (isset($_POST['send'])) {
        $query = "UPDATE student_info SET `fname` = '{$_POST['firstName']}',
        `mname` = '{$_POST['middleName']}', `lname` = '{$_POST['lastName']}',
        `address1` = '{$_POST['address1']}', `address2` = '{$_POST['address2']}',
        `bdate` = '{$_POST['birthdate']}', `college` = '{$_POST['college']}',
        `degprog` = '{$_POST['degreeProgram']}', `sex` = '{$_POST['sex']}',
        `didILoginForTheFirstTime` = 0 WHERE stud_num = '{$_SESSION["studentnumbertochange"]}'";
        $mysqli -> query($query);
        header("location: adminlanding.php");
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
        <a class="fixed-top btn btn-primary m-3" style="width: 5%;" href="adminlanding.php">Back</a>

        <div class="position-absolute row w-100 h-100">
            <form method="POST" action="infochange.php" class="border border-2 rounded rounded-2 border-primary m-2 p-3 w-75 mx-auto my-auto was-validated">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-sm">
                            <?php
                                echo "<h2 class=\"mb-3\">Update Student Info for ";
                                echo htmlspecialchars($_SESSION["studentnumbertochange"]);
                                echo "</h2>";
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <input class="form-control" id="firstName" name="firstName" type="text" <?php echo "value=\"{$data["fname"]}\"" ?> required>
                            <label class="form-text mb-2" for="firstName">First Name</label>
                        </div>
                        <div class="col-sm">
                            <input class="form-control" id="middleName" name="middleName" type="text" <?php echo "value=\"{$data["mname"]}\"" ?> required>
                            <label class="form-text mb-2" for="middleName">Middle Name</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" id="lastName" name="lastName" type="text" <?php echo "value=\"{$data["lname"]}\"" ?> required>
                            <label class="form-text mb-2" for="lastName">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <input class="form-control" id="address1" name="address1" type="text" maxlength="99" <?php echo "value=\"{$data["address1"]}\"" ?> required>
                            <label class="form-text mb-2" for="address1">Address Line 1</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <input class="form-control" id="address2" name="address2" type="text" maxlength="99" <?php echo "value=\"{$data["address2"]}\"" ?>>
                            <label class="form-text mb-2" for="address2">Address Line 2</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-7">
                            <input class="form-control" id="birthdate" name="birthdate" type="date" <?php echo "value=\"{$data["bdate"]}\"" ?> required>
                            <label class="form-text mb-2" for="birthdate">Birthdatede</label>
                        </div>
                        <div class="col-sm">
                            <select class="form-select" id="sex" name="sex" required>
                                <?php if ($data["didILoginForTheFirstTime"] == 1) echo "<option disabled selected hidden value=\"\">Choose...</option>"; ?>
                                <option value="Male" <?php if($data["sex"] == 'M') echo 'selected' ?>>Male</option>
                                <option value="Female" <?php if($data["sex"] == 'F') echo 'selected' ?>>Female</option>
                            </select>
                            <label class="form-text mb-2" for="sex">Sex</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <select class="form-select" id="college" name="college" required>
                                <?php if ($data["didILoginForTheFirstTime"] == 1) echo "<option disabled selected hidden value=\"\">Choose...</option>"; ?>
                                <option value="CHSS" <?php if($data["college"] == 'CHSS') echo 'selected' ?>>College of Humanities and Social Sciences</option>
                                <option value="CSM" <?php if($data["college"] == 'CSM') echo 'selected' ?>>College of Science and Mathematics</option>
                                <option value="SOM" <?php if($data["college"] == 'SOM') echo 'selected' ?>>School of Management</option>
                            </select>
                            <label class="form-text mb-2" for="college">College</label>
                        </div>
                        <div class="col-sm">
                            <select class="form-select" id="degreeProgram" name="degreeProgram" required>
                                <?php if ($data["didILoginForTheFirstTime"] == 1) echo "<option disabled selected hidden value=\"\">Choose...</option>"; ?>
                                <option <?php if($data["degprog"] == 'BA Communication and Media Arts') echo 'selected' ?> value="BA Communication and Media Arts">BA Communication and Media Arts</option>
                                <option <?php if($data["degprog"] == 'BA English') echo 'selected' ?> value="BA English">BA English</option>
                                <option <?php if($data["degprog"] == 'BS Agribusiness Economics') echo 'selected' ?> value="BS Agribusiness Economics">BS Agribusiness Economics</option>
                                <option <?php if($data["degprog"] == 'BS Anthropology') echo 'selected' ?> value="BS Anthropology">BS Anthropology</option>
                                <option <?php if($data["degprog"] == 'BS Applied Mathematics') echo 'selected' ?> value="BS Applied Mathematics">BS Applied Mathematics</option>
                                <option <?php if($data["degprog"] == 'BS Architecture') echo 'selected' ?> value="BS Architecture">BS Architecture</option>
                                <option <?php if($data["degprog"] == 'BS Biology') echo 'selected' ?> value="BS Biology">BS Biology</option>
                                <option <?php if($data["degprog"] == 'BS Computer Science') echo 'selected' ?> value="BS Computer Science">BS Computer Science</option>
                                <option <?php if($data["degprog"] == 'BS Food Technology') echo 'selected' ?> value="BS Food Technology">BS Food Technology</option>
                                <option <?php if($data["degprog"] == 'BS Sports Science') echo 'selected' ?> value="BS Sports Science">BS Sports Science</option>
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

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <?php $mysqli -> close(); ?>

    </body>
</html>