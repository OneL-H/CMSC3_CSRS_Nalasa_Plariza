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
<?php
    /*
        query = SELECT * FROM `studentinfo` WHERE ...

        conditionlist = array();

        // one for each thingy
        if(isset($_POST["stud_num"])){
            conditionlist.append("yearlevel = $_POST["stud_num"]")
        }

        // append to query
        for($i = 0; $i < condiionlist.length(); $i++){
            query .= conditionlist
            if($i != conditionlist.length() - 1) query .= " OR "
        }

        // something something loop through results
    
    */

?>

<body>
    <div class="" style="height: 10%;">
        <a class="fixed-top btn btn-primary m-3 w-25 text-start"
            href="../mainpage_loggedin_bootstrappified.php">Back</a>
    </div>
    <div class="position-absolute row w-100 h-100">
        <form method="POST" action="student_search.php"
            class="border border-2 rounded rounded-2 border-primary m-2 p-3 w-75 mx-auto my-auto">
            <h2>Record Search:</h2>
            <div class="container py-2 px-2">
                <div class="row m-1 p-2 border border-1 border-primary rounded-2">
                    <div class="col col-2 m-2">
                        <label class="form-label" for="stud_num">Student Number:</label>
                        <input class="form-control border border-1 border-primary-subtle" type="text" name="stud_num">
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label" for="year_level">Year Level:</label>
                        <input class="form-control border border-1 border-primary-subtle" type="number"
                            name="year_level">
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label">Sex:</label>
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="M" id="male" name="male" checked aria-checked="true">
                            <label class="form-check-label" for="flexCheckDefault">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="F" id="female" name="female" checked aria-checked="true">
                            <label class="form-check-label" for="flexCheckDefault">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row m-1 p-2 border border-1 border-primary rounded-2"><!--select colleges to hit-->
                    <div class="row">
                        <h4>Select Courses:</h2>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BA Communication and Media Arts" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BA Communication and Media Arts
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BA English" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BA English
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Agribusiness Economics" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Agribusiness Economics
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Anthropology" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Anthropology
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Applied Mathematics" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Applied Mathematics
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Architecture" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Architecture
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Biology
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Computer Science" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Computer Science
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Food Technology" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Food Technology
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Sports Science" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Sports Science
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-1 p-2 border border-1 border-primary rounded-2 align-items-center">
                    <div class="col-auto">
                        <h4>Select Colleges:</h4>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="CSM" id="CSM" name="CSM">
                            <label class="form-check-label" for="CSM">
                                CSM
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="CHSS" id="CHSS" name="CHSS">
                            <label class="form-check-label" for="CHSS">
                                CHSS
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="SOM" id="SOM" name="SOM">
                            <label class="form-check-label" for="SOM">
                                SOM
                            </label>
                        </div>
                    </div>
                    <div class="d-flex col flex-column align-self-end align-items-end">
                        <button type="submit" class="btn btn-secondary" name="send">Submit</button>
                    </div>
                </div>
                <div class="row m-1">
                    
                </div>
            </div>
        </form>
    </div>

    <script src="../popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>