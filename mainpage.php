<?php
    $error = "";
    if (isset($_POST['login'])) {
        $sn = $_POST['studentNumber'];
        $pw = $_POST['studentPassword'];
        $mysqli = new mysqli("localhost", "root", "", "csrs");

        if (mysqli_connect_errno()) {
            echo "failed connection: " . mysqli_connect_error();
            exit();
        }

        $query = "SELECT * FROM student_info";

        if ($result = $mysqli -> query($query)) {
            while ($row = $result -> fetch_assoc()) {
                if ($sn == $row["stud_num"] && $pw == $row["password"]) {
                    session_start();
                    $_SESSION["studentnumber"] = $sn;
                    $_SESSION["loggedin"] = true;
                    $_SESSION["error"] = "";
                    header('location: mainpage_loggedin_bootstrappified.php');
                }

                else $error = "login failed";
            }
        }
    }
?>

<!DOCTYPE html>
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
        <!--navbar, not logged in-->
        <nav class="navbar navbar-expand-sm body bg-primary m-3 rounded rounded-2 fixed-top mx-auto" style="width: 97%">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    <img src="logo_upmin_2.png" id="logo" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    UPMIN CSRS
                </a>
                <div class="navbar-collapse justify-content-end" id="">
                    <form method="POST" class="row m-2">
                        <div class="col-auto">
                            <span><?php echo $error; ?></span>
                        </div>
                        <div class="col-auto">
                            <label class="visually-hidden" for="studentNumber">Student Number</label>
                            <input type="text" class="form-control form-control-sm" id="studentNumber" name="studentNumber" placeholder="Student Number">
                        </div>
                        <div class="col-auto">
                            <label class="visually-hidden" for="studentPassword">Password</label>
                            <input type="password" class="form-control form-control-sm" id="studentPassword" name="studentPassword" placeholder="Password"> 
                        </div>
                        <button type="submit" name="login" class="col-auto btn btn-secondary btn-sm">Log In</button>
                    </form>
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

        <div class="container-fluid">

            <div class="row">

                <div class="announcements col-8">

                    <h1>ANNOUNCEMENTS</h1>

                    <div class="accordion" id="ann1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col1" aria-expanded="true" aria-controls="head1">
                                    <h1>ATTENTION: CONTINUING STUDENTS</h1>
                                </button>
                            </h2>
                            <div id="col1" class="accordion-collapse show shadow-sm" data-bs-parent="#ann1">
                                <div class="accordion-body">
                                    <p>You may directly go to <a href="https://bit.ly/RequestForStudentRecords2022">this link</a> for your
                                    requests on the following:</p>
                                    <ol type="1">
                                        <li>Request for True copy of grades and Certificate of No Contract; and </li>
                                        <li>Certificate of Good Moral: <a href="mailto: osa.upmindanao@up.edu.ph">osa.upmindanao@up.edu.ph</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann2">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col2" aria-expanded="true" aria-controls="head2">
                                    <h1>ATTENTION: ALL STUDENTS</h1>
                                </button>
                            </h2>
                            <div id="col2" class="accordion-collapse show shadow-sm" data-bs-parent="#ann2">
                                <div class="accordion-body">
                                    <p>MIN STUD 1 (C) HAS BEEN DISSOLVED.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann3">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col3" aria-expanded="true" aria-controls="head2">
                                    <h1>ATTENTION: ALL STUDENTS</h1>
                                </button>
                            </h2>
                            <div id="col3" class="accordion-collapse show shadow-sm" data-bs-parent="#ann3">
                                <div class="accordion-body">
                                    <p>PLEASED BE INFORMED THAT THE FOLLOWING SECIONS IN PE 1 HAS BEEN DISSOLVED: PE 1 (F), PE 1 (G), PE 1 (GH)
                                and PE 1 (WX)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann4">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col4" aria-expanded="true" aria-controls="head2">
                                    <h1>NEW SECTIONS</h1>
                                </button>
                            </h2>
                            <div id="col4" class="accordion-collapse show shadow-sm" data-bs-parent="#ann4">
                                <div class="accordion-body">
                                    <p>The following PE sections have been approved:</p>
                                        <ul>
                                            <li>PHILIPPINE GAMES MON 4:00PM-6:00PM</li>
                                            <li>VB MON-FRI 5:00PM-6:00PM</li>
                                            <li>CHESS MON-FRI 7:00AM-9:00AM</li>
                                            <li>PC WF 7:30AM-8:30AM</li>
                                            <li>PG MON 10:00AM-12:00NN</li>
                                            <li>SCR MON 8:00AM-10:00AM</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann5">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col5" aria-expanded="true" aria-controls="head2">
                                    <h1>ALL STUDENTS with INC’s and 4.0’s INCURRED during SECOND SEM. 2018-2019 and 1st sem 2019-2020</h1>
                                </button>
                            </h2>
                            <div id="col5" class="accordion-collapse show shadow-sm" data-bs-parent="#ann5">
                                <div class="accordion-body">
                                    <p>Please be informed that you have to complete/remove your Academic Deficiencies <strong>before the first
                                    day of the regular registration period for the SECOND semester, AY 2020-2021 (24 February 2021) or
                                    22 Jan. 2021</strong> (deadline submissions of grades). If you fail to meet the deadline, you will
                                    have to re-enroll the said subject/s.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann6">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col6" aria-expanded="true" aria-controls="head2">
                                    <h1>ATTENTION: BSBIO STUDENTS</h1>
                                </button>
                            </h2>
                            <div id="col6" class="accordion-collapse show shadow-sm" data-bs-parent="#ann6">
                                <div class="accordion-body">
                                    <p>The 6 units of Free Electives in the BS Bio Curriculum can be selected from any 3-unit non-Biology
                                    courses that are offered in the University. A student is 'free' to choose from the offerings across
                                    colleges, provided that if a course has a prerequisite, such must have been satisfied first before
                                    he/she can officially enlist/enroll in that elective.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann7">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col7" aria-expanded="true" aria-controls="head2">
                                    <h1>For DMPCS registration / enrollment concerns</h1>
                                </button>
                            </h2>
                            <div id="col7" class="accordion-collapse show shadow-sm" data-bs-parent="#ann7">
                                <div class="accordion-body">
                                    <p>For DMPCS registration / enrollment concerns please join our <a
                                    href="https://join.slack.com/t/dmpcspreregistration/shared_invite/zt-gftp4yr7-2NWhfqVqrgVPtk9RlmmRaQ">slack
                                    workspace</a>.
                                    <br><br>For Physics 3 prerog concerns, once you have joined our worskspace please join the channel
                                    <strong>physics3_prerog</strong>.
                                    <br><br>Thank you.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann8">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col8" aria-expanded="true" aria-controls="head2">
                                    <h1>ATTENTION 3BSFT Students</h1>
                                </button>
                            </h2>
                            <div id="col8" class="accordion-collapse show shadow-sm" data-bs-parent="#ann8">
                                <div class="accordion-body">
                                    <p>You are to take FST 164 (pre-req FST 140 and FST 141) instead of FST 151 this 1st sem 2020-2021.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann9">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col9" aria-expanded="true" aria-controls="head2">
                                    <h1>ATTENTION: all concerned students</h1>
                                </button>
                            </h2>
                            <div id="col9" class="accordion-collapse show shadow-sm" data-bs-parent="#ann9">
                                <div class="accordion-body">
                                <p>Enrolment Period:</p>
                                    <ul>
                                        <li>January 8, 2020 = Student Number 2019</li>
                                        <li>January 9, 2020 = Student Number 2018</li>
                                        <li>January 10, 2020 = Student Number 2015 and older, transferees, Cross-Registrants</li>
                                    </ul>
                                    <p><br>Kindly follow the Enrolment Flow for the 2nd Semester AY 2019-2020 <a
                                            href="https://www.facebook.com/registrar.upmindanao/">as posted</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann10">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col10" aria-expanded="true" aria-controls="head2">
                                    <h1>ATTENTION: all students</h1>
                                </button>
                            </h2>
                            <div id="col10" class="accordion-collapse show shadow-sm" data-bs-parent="#ann10">
                                <div class="accordion-body">
                                    <p>You may now view the final examinations schedule for First Semester AY 2019-2020.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="ann11">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-light border border-primary-subtle shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#col11" aria-expanded="true" aria-controls="head2">
                                    <h1>ATTENTION: all students</h1>
                                </button>
                            </h2>
                            <div id="col11" class="accordion-collapse show shadow-sm" data-bs-parent="#ann11">
                                <div class="accordion-body">
                                    <p>PhilArts 1 - Section D and Arts 1 - Section O have been dissolved.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="mainpage_footer">
                        <p>Copyright © 2023 NALASA PLARIZA</p>
                    </footer>
                </div>

                <div class="sidebar col-4">
                    <!-- ABOUT -->
                    <div class="border rounded p-3 shadow-sm">
                        <p>The Computerized Student Records System (CSRS) is a project of the Information Technology Office through the initiative of Engr. Ronald A. Barriga (2005-2010 IT Director) under the University of the Philippines Mindanao Integrated Information Management System (UPMIIMS) project in 2006.
                        <br><br>In partnership with:
                        </p>

                        <ul style="list-style-type: disc">
                            <li>Office of the Registrar,</li>
                            <li>Offices of the College Secretary,</li>
                            <li>Office of the Student Affairs,</li>
                            <li>Cash Office,</li>
                            <li>All academic departments,</li>
                            <li>Students of UP Mindanao</li>
                        </ul>
                            
                        <p><br>Computer Science Special Problems:</p>
                            
                        <ul style="list-style-type: disc">
                            <li>Lastimado, R.G.P. 2006. Computerized Student Records System (CSRS)</li>
                            <li>Mendez, R.E. 2007. Registration System (RegSys)</li>
                            <li>Ytac, E.M. 2007. Cash Office Information System</li>
                        </ul>

                        <p><br>For continuing students, please contact your respective Office of the College Secretary (OCS):</p>

                        <ul style="list-style-type: disc">
                            <li>College of Humanities and Social Sciences (CHSS): <a href="mailto: chsscs.upmindanao@up.edu.ph">chsscs.upmindanao@up.edu.ph</a></li>
                            <li>College of Science and Mathematics (CSM): <a href="mailto: csmcs.upmindanao@up.edu.ph">csmcs.upmindanao@up.edu.ph</a></li>
                            <li>School of Management (SOM): <a href="mailto: somcs.upmindanao@up.edu.ph">somcs.upmindanao@up.edu.ph</a></li>
                        </ul>
                            
                        <p><br>For incoming first year students, please contact the Office of the University Registrar: <a href="mailto: registrar.upmindanao@up.edu.ph">registrar.upmindanao@up.edu.ph</a></p>
                    </div>

                    <!-- FAQ -->
                    <div class="border rounded p-3 shadow-sm">
                        <h1>Who are the CSRS Administrators?</h1>
                        <ul style="list-style-type: disc">
                            <li>Office of the Registrar</li>
                            <li>Offices of the College Secretary</li>
                        </ul>
                    </div>

                    <div class="border rounded p-3 shadow-sm">
                        <h1>What if I forgot my password?</h1>
                        <p>Go to your adviser, department chair or to the Office of the College Secretary and ask them to change your password.
                            <br>You may contact your respective Office of the College Secretary through the following email addresses:<br><br></p>

                        <ul style="list-style-type: none">
                            <li>CHSS OCS <a href="mailto: chsscs.upmindanao@up.edu.ph">chsscs.upmindanao@up.edu.ph</a></li>
                            <li>CSM OCS <a href="mailto: csmcs.upmindanao@up.edu.ph">csmcs.upmindanao@up.edu.ph</a></li>
                            <li>SOM OCS <a href="mailto: somcs.upmindanao@up.edu.ph">somcs.upmindanao@up.edu.ph</a></li>
                        </ul>

                        <p><br><strong>TIP:</strong> It's good to establish and maintain good communication lines with your registration adviser.</p>
                    </div>

                    <div class="border rounded p-3 shadow-sm">
                        <h1>Who is my registration adviser?</h1>
                        <p>Registration advisers are assigned by your respective department chairs.</p>
                    </div>
                </div>
            </div>
        </div>

        <script src="popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>