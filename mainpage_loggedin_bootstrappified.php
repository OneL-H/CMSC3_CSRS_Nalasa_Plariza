<?php
    session_start();
    
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: mainpage.php");
        exit;
    }

    $mysqli = new mysqli("localhost", "root", "", "csrs");

    if (mysqli_connect_errno()) {
        echo "failed connection: " . mysqli_connect_error();
        exit();
    }

    $query = "SELECT * FROM student_info WHERE stud_num = '{$_SESSION["studentnumber"]}'";

    $result = $mysqli -> query($query);
    $data = $result -> fetch_assoc();

    $yr = mb_substr($_SESSION["studentnumber"], 0, 4);
    $aystart = 2022;
    $yr = $aystart - $yr + 1;
    $query = "UPDATE student_info SET `yearlevel` = $yr WHERE stud_num = '{$_SESSION["studentnumber"]}'";
    
    $mysqli -> query($query);

    if ($data["didILoginForTheFirstTime"] == 1) {
        $_SESSION["note"] = "firstLogin";
        header('location: pages_student_info/infochange.php');
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
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="pages_menu/about.php">about</a></li>
                                <li><a href="pages_menu/privacy.php">privacy notice</a></li>
                                <li><a href="pages_menu/up_email.php">up email</a></li>
                                <li><a href="pages_menu/faq.php">faq</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Student Info</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="pages_student_info/info.php">student details</a></li>
                                <li><a href="pages_student_info/student_search.php">record search</a></li>
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
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="pages_account/pwchange.php">change password</a></li>
                                <li><a href="logout.php">log out</a></li>
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

        <div class="container-fluid">

            <div class="row">

                <div class="announcements col-8">

                    <h1>ANNOUNCEMENTS</h1>

                    <div>
                        <h1>ATTENTION: CONTINUING STUDENTS</h1>
                        <p>You may directly go to <a href="https://bit.ly/RequestForStudentRecords2022">this link</a> for your
                            requests on the following:</p>
                        <ol type="1">
                            <li>Request for True copy of grades and Certificate of No Contract; and </li>
                            <li>Certificate of Good Moral: <a href="mailto: osa.upmindanao@up.edu.ph">osa.upmindanao@up.edu.ph</a>
                            </li>
                        </ol>
                    </div>

                    <div>
                        <h1>ATTENTION: ALL STUDENTS</h1>
                        <p>MIN STUD 1 (C) HAS BEEN DISSOLVED.</p>
                    </div>

                    <div>
                        <h1>ATTENTION: ALL STUDENTS</h1>
                        <p>PLEASED BE INFORMED THAT THE FOLLOWING SECIONS IN PE 1 HAS BEEN DISSOLVED: PE 1 (F), PE 1 (G), PE 1 (GH)
                            and PE 1 (WX)</p>
                    </div>

                    <div>
                        <h1>NEW SECTIONS</h1>
                        <p>The following PE sections have been approved:</p>
                        <ul>
                            <li>PHILIPPINE GAMES MON 4:00PM-6:00PM</li>
                            <li>VB MON-FRI 5:00PM-6:00PM</li>
                            <li>CHESS MON-FRI 7:00AM-9:00AM</li>
                            <li>PC WF 7:30AM-8:30AM</li>
                            <li>PG MON 10:00AM-12:00NN</li>
                            <li>SCR MON 8:00AM-10:00AM</li>
                        </ul>
                    </div>

                    <div>
                        <h1>ALL STUDENTS with INC’s and 4.0’s INCURRED during SECOND SEM. 2018-2019 and 1st sem 2019-2020</h1>
                        <p>Please be informed that you have to complete/remove your Academic Deficiencies <strong>before the first
                                day of the regular registration period for the SECOND semester, AY 2020-2021 (24 February 2021) or
                                22 Jan. 2021</strong> (deadline submissions of grades). If you fail to meet the deadline, you will
                            have to re-enroll the said subject/s.</p>
                    </div>

                    <div>
                        <h1>ATTENTION: BSBIO STUDENTS</h1>
                        <p>The 6 units of Free Electives in the BS Bio Curriculum can be selected from any 3-unit non-Biology
                            courses that are offered in the University. A student is 'free' to choose from the offerings across
                            colleges, provided that if a course has a prerequisite, such must have been satisfied first before
                            he/she can officially enlist/enroll in that elective.</p>
                    </div>

                    <div>
                        <h1>For DMPCS registration / enrollment concerns</h1>
                        <p>For DMPCS registration / enrollment concerns please join our <a
                                href="https://join.slack.com/t/dmpcspreregistration/shared_invite/zt-gftp4yr7-2NWhfqVqrgVPtk9RlmmRaQ">slack
                                workspace</a>.
                            <br><br>For Physics 3 prerog concerns, once you have joined our worskspace please join the channel
                            <strong>physics3_prerog</strong>.
                            <br><br>Thank you.
                        </p>
                    </div>

                    <div>
                        <h1>ATTENTION 3BSFT Students</h1>
                        <p>You are to take FST 164 (pre-req FST 140 and FST 141) instead of FST 151 this 1st sem 2020-2021.</p>
                    </div>

                    <div>
                        <h1>ATTENTION: all concerned students</h1>
                        <p>Enrolment Period:</p>
                        <ul>
                            <li>January 8, 2020 = Student Number 2019</li>
                            <li>January 9, 2020 = Student Number 2018</li>
                            <li>January 10, 2020 = Student Number 2015 and older, transferees, Cross-Registrants</li>
                        </ul>
                        <p><br>Kindly follow the Enrolment Flow for the 2nd Semester AY 2019-2020 <a
                                href="https://www.facebook.com/registrar.upmindanao/">as posted</a>.</p>
                    </div>

                    <div>
                        <h1>ATTENTION: all students</h1>
                        <p>You may now view the final examinations schedule for First Semester AY 2019-2020.</p>
                    </div>

                    <div>
                        <h1>ATTENTION: all students</h1>
                        <p>PhilArts 1 - Section D and Arts 1 - Section O have been dissolved.</p>
                    </div>

                    <footer class="mainpage_footer">
                        <p>Copyright © 2023 NALASA PLARIZA</p>
                    </footer>
                </div>

                <div class="sidebar col-4 ">
                
                    <h1 id="personalannouncements">Hello, <?php echo $data["fname"] ?>!</h4>

                    <div class="afterh1">
                        <h1>Announcement 1</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos laborum placeat esse inventore
                            corporis vel a quisquam? Incidunt aliquam laborum asperiores quis cupiditate pariatur consequuntur minus
                            libero reprehenderit, nobis molestias?</p>
                    </div>

                    <div>
                        <h1>Announcement 2</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos laborum placeat esse inventore
                            corporis vel a quisquam? Incidunt aliquam laborum asperiores quis cupiditate pariatur consequuntur minus
                            libero reprehenderit, nobis molestias?</p>
                    </div>

                    <div>
                        <h1>Announcement 3</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, perferendis iste ex itaque non quo minus
                            eius aliquid quibusdam sint similique aperiam corrupti tempore est provident dolore enim excepturi
                            sapiente.
                            <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet nostrum inventore quis numquam
                            exercitationem est necessitatibus voluptate quam. Nesciunt aliquid ducimus dolore placeat similique,
                            quod possimus nostrum sint repudiandae earum.
                            <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, minus corporis rerum
                            ratione nihil nobis totam, sit cumque amet, numquam porro laboriosam aliquam assumenda impedit
                            recusandae. Explicabo animi amet ad.
                        </p>
                    </div>

                </div>
            </div>

        </div>

        <script src="popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>

</html>