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

    function format_results($lname, $fname, $mname, $sex, $studnum, $college, 
                $degprog, $yearlevel, $unitsenlisted, $bdate, $address1, $address2, $showbutton){
        
        $template = "<div class=\"row border border-1 rounded rounded-1 border-primary-subtle shadow-sm my-auto p-2 m-2 mb-3\">
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
            <div class=\"container d-flex\"> <div class=\"col-auto\"> <div class=\"row\"> <span>";

        $template .= "Birthdate: " . $bdate;
        $template .= "</span> </div> <div class=\"row\"> <span>";

        $template .= $address1;
        $template .= "</span> </div> <div class=\"row\"> <span>";
            
        $template .= $address2;
        $template .= "</span> </div> </div>";

        if($showbutton){
            $template .= "<div class=\"d-flex col flex-column align-self-end align-items-end\">
                    <form method=\"POST\" action=\"delete.php\">
                    <button type=\"submit\" value=\"{$studnum}\"class=\"btn btn-danger\" name=\"delete_confirm\">Confirm</button>
                    </form>
                </div>";
        }
        
                
        $template .= "</div> </div>";

        return $template;
    }

    if(isset($_POST['rec_delete'])){
        $query = "SELECT * FROM student_info WHERE stud_num = '{$_POST['rec_delete']}'"; // set this
    }

    if(isset($_POST['delete_confirm'])){
        $query = "SELECT * FROM student_info WHERE stud_num = '{$_POST['delete_confirm']}'"; // set this
    }
    

    $result = $mysqli -> query($query);
    $data = $result -> fetch_assoc();

    $del_success = false;
    if(isset($_POST['delete_confirm'])){
        $del_query = "DELETE FROM student_info WHERE stud_num = '{$_POST['delete_confirm']}'";
        if($mysqli -> query($del_query) === TRUE){
            $del_success = TRUE;
        }
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
        
        <a class="fixed-top btn btn-primary m-3" style="width: 5%" href="student_search.php">Back</a>

        <div class="position-absolute row w-100 h-100">
            <div class="border border-3 rounded rounded-2 border-light-subtle bg-light shadow m-2 p-3 w-75 mx-auto my-auto">
                <?php
                    if(!isset($_POST['delete_confirm'])){
                        echo "<h2>Do you want to delete {$_POST['rec_delete']}?</h2>";
                    }else{
                        if($del_success){
                            echo "<h2>The following record has been deleted.</h2>";
                        }else{
                            echo "<h2>Error deleting record. {$mysqli->error}</h2>";
                        }
                    }
                    
                    echo format_results($data['lname'], $data['fname'], $data['mname'], $data['sex'], 
                                $data['stud_num'], $data['college'], $data['degprog'], $data['yearlevel'], 
                                $data['units_enlisted'], $data['bdate'], $data['address1'], $data['address2'], !isset($_POST['delete_confirm']));
                ?>
                <form method="POST">
                    <button class="btn btn-success" value="<?php echo $_POST['delete'] ?>" name="remove">Yes</button>
                    <button class="btn btn-danger" name="exit">No</button>
                </form>
            </div>
        </div>

        <?php
        echo "<script src=\"../popper.min.js\"></script>
        <script src=\"../node_modules/bootstrap/dist/js/bootstrap.min.js\"></script>";

        $mysqli -> close(); ?>

    </body>
</html>