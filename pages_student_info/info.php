<?php
    session_start();
        
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: mainpage.php");
        exit;
    }

    $mysqli = new mysqli("localhost", "root", "", "csrs");
    $query = "SELECT * FROM student_info WHERE stud_num = '{$_SESSION["studentnumber"]}'";

    if ($result = $mysqli -> query($query)) {
        while ($row = $result -> fetch_assoc()) {
            if ($row["didILoginForTheFirstTime"] == 1) {
                $_SESSION["note"] = "firstLogin";
                header('location: infochange.php');
            }

            echo $row["stud_num"];
            echo $row["fname"];
            echo $row["mname"];
            echo $row["lname"];
            echo $row["address1"];
            echo $row["address2"];
            echo $row["bdate"];
            echo $row["college"];
            echo $row["degprog"];
            echo $row["sex"];
        }
    }
?>