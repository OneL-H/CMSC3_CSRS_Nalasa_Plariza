<?php
    session_start();
    $error = "";
        
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

    if ($data["didILoginForTheFirstTime"] == 0) {
        $_SESSION["note"] = "";
    }

    if (isset($_POST['send'])) {
        $query = "UPDATE admin_info SET `fname` = '{$_POST['firstName']}',
        `mname` = '{$_POST['middleName']}', `lname` = '{$_POST['lastName']}',
        `didILoginForTheFirstTime` = 0 WHERE admin_num = '{$_SESSION["adminnumber"]}'";
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
        
        <a class="fixed-top btn btn-primary m-3" style="width: 5%<?php if ($data["didILoginForTheFirstTime"] == 1) echo "; display: none" ?>" href="adminlanding.php">Back</a>

        <div class="position-absolute row w-100 h-100">
            <form method="POST" action="namechange.php" class="border border-2 rounded rounded-2 border-primary m-2 p-3 w-75 mx-auto my-auto was-validated">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-sm">
                            <?php
                                if ($_SESSION["note"] == "firstLogin") echo "<h2 class=\"mb-3\">This is your first time logging in! Please enter your name.</h2>";
                                else echo "<h2 class=\"mb-3\">Update Name</h2>";
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