<html lang="en">

<head>
    <title>UP Mindanao CSRS Website</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" href="favicon.ico">

    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="scss/custom_colors.css" rel="stylesheet">
</head>

<body>

    <!--navbar, logged in-->
    <nav class="navbar navbar-expand-sm body bg-primary m-3 rounded rounded-2 fixed-top" style="width: 97%">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">
                <img src="logo_upmin_2.png" id="logo" alt="Logo" width="30" height="30"
                    class="d-inline-block align-text-top">
                UPMIN CSRS
            </a>
            <div class="navbar-collapse justify-content-end" id="">
                <div class="row justify-content-end navbar-nav btn-group" style="width: 95%">
                    <div class="col-3">
                        <button class="w-100 btn btn-primary text-center nav-link text-white active"
                            href="#">Home</button>
                    </div>
                    <div class="dropdown col-3">
                        <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false" href="#">Sections</button>
                        <ul class="dropdown-menu dropdown-menu-start w-auto p-1">
                            <li><a href="pages_menu/about.php">about</a></li>
                            <li><a href="pages_menu/privacy.php">privacy notice</a></li>
                            <li><a href="pages_menu/up_email.php">up email</a></li>
                            <li><a href="pages_menu/faq.php">faq</a></li>
                        </ul>
                    </div>
                    <div class="dropdown col-3">
                        <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false" href="#">Student Info</button>
                        <ul class="dropdown-menu dropdown-menu-start w-auto p-1">
                            <li><a href="pages_student_info/sdis.php">sdis</a></li>
                            <li><a href="pages_student_info/prospectus.php">prospectus & grades</a></li>
                            <li><a href="pages_student_info/sched.php">class schedule</a></li>
                            <li><a href="pages_student_info/residency.php">residency</a></li>
                            <li><a href="pages_student_info/matric.php">matriculation</a></li>
                            <li><a href="pages_student_info/calendar.php">personal calendar</a></li>
                        </ul>
                    </div>
                    <div class="dropdown col-3">
                        <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false" href="#">Account</button>
                        <ul class="dropdown-menu dropdown-menu-start w-auto p-1">
                            <li><a href="pages_account/pwchange.php">change password</a></li>
                            <li><a href="mainpage.php">log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="img_container">
        <img src="header_upmin.jpg" class="header_img">
        <div class="text_box">
            <h1>UNIVERSITY OF THE PHILIPPINES MINDANAO</h1>
            <h2>COMPUTERIZED STUDENT RECORDS SYSTEM</h2>
        </div>
    </div>

    <div class="border border-2 rounded rounded-2 border-primary m-2 p-3 w-75 mx-auto">
        <div class="gx-4">
            <span class="col fs-2 fw-bold">StudentName</span>
            <span class="col fs-5 fw-lighter">YYYY-#####</span>
            <span class="col fs-6 float-end">Student Year #</span>
        </div>
        <hr>
        <div class="">
            <span>REGISTRATION STATUS: XXX</span>
            <span class="float-end">UNITS ENLISTED: ##</span>
        </div>
        <hr>
        <div class="">
            <span>CLASSES ENLSTED:</span>
            <!--insert php coding here where its just the tables bullshit all over again-->
        </div>

        <!--TODO: another fukcing form where it just adds to the string i guess.-->

    </div>

    <script src="popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>