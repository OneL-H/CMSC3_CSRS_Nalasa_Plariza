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
                        <button class="w-100 btn btn-primary text-center nav-link text-white active" href="#">Home</button>
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

    <!-- picture -->
    <div class="img_container">
        <img src="header_upmin.jpg" class="header_img">
        <div class="text_box">
            <h1>UNIVERSITY OF THE PHILIPPINES MINDANAO</h1>
            <h2>COMPUTERIZED STUDENT RECORDS SYSTEM</h2>
        </div>
    </div>

    <form class="border border-body rounded rounded-2 p-3 m-2">
        <h2 class="">Student Record Creation</h2>
        <div class="">
            <div class="row m-1">
                <div class="col-1">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="year_level">
                        <label for="SN_number">Yr. Level</label>
                    </div>
                </div>
                <div class="col-5">
                    <div class="input-group">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="SN_year" name="SN_year" placeholder="Student Number - Year" aria-label="Student Number - Year">
                            <label for="SN_year">Student Number (Year)</label>
                        </div>
                        <span class="input-group-text">-</span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="SN_number" name="SN_number" placeholder="Student Number - Number" aria-label="Student Number - Number">
                            <label for="SN_number">Student Number (Number)</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-2 row g-1 align-items-center">
                <div class="col-2 form-floating">
                    <input type="text" class="form-control" id="last_name" name="last_name">
                    <label for="last_name">Last Name</label>
                </div>
                <div class="col-3 form-floating">
                    <input type="text" class="form-control" id="first_name" name="first_name">
                    <label for="first_name">First Name</label>
                </div>
                <div class="col-2 form-floating">
                    <input type="text" class="form-control" id="middle_name" name="middle_name">
                    <label for="middle_name">Middle Name</label>
                </div>
            </div>
            <div class="row g-1 m-2">
                <div class="col-3 form-floating">
                    <input type="password" class="form-control" id="password_initial" name="password_initial">
                    <label for="password_initial">Password</label>
                </div>
                <div class="col-3 form-floating">
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    <label for="password_confirm">Confirm Password</label>
                </div>
            </div>
        </div>
    </form>

    <script src="popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>