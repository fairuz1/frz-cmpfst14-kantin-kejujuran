<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;500&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index_style.css">
    <title>Kantin Kejujuran</title>
    <?php
        $is_invalid = false;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $mysqli = require __DIR__ . "/database connection.php";

            
            $sql = sprintf("SELECT student_id, password FROM student_account_data WHERE student_id = '%s'", $mysqli->real_escape_string($_POST["student_id_login"]));
            $result = $mysqli->query($sql);

            $result_data = $result->fetch_assoc();

            if ($result_data) {
                if (password_verify($_POST["password_login"], $result_data["password"])) {
                    session_start();
                    session_regenerate_id();

                    $_SESSION["student_session"] = $result_data["student_id"];
                    header("Location: Main page.php");
                    exit;
                } else {
                    $is_invalid = true;
                }
            } else {
                $is_invalid = true;
            } 
        }
    ?>
</head>
<body>
    <?php if ($is_invalid): ?>  
        <div class="alert alert-warning alert-dismissible fade show warning-login" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h4 class="alert-heading"><b>Login Failed!</b></h4>
            <p> Something is not right with your login data, please check your login data again.</p>
            <hr>
            <p class="mb-0"><b>KantinKejujuran</b></p>
        </div>
    <?php endif; ?>
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-md sticky-top navbar-light glass">
        <div class="container-fluid">
            <a class="navbar-brand nav-link active d-md-none ps-0" href="#"><b>Student Canteen</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="color: #0E1A18;">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="navbar-brand nav-link active mx-0 d-md-block d-none" aria-current="page" href="#"><b>Student Canteen</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Main page.php">Get Inside</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main section -->
    <div class="container-fluid">
        <div class="row">
            <!-- images1 -->
            <div class="col-xl pe-0 ps-0"><img src="https://images2.imgbox.com/68/54/UWq7JUpL_o.jpg" class="img-fluid" alt="images 1"></div>
            
            <!-- text1 -->
            <div class="col-xl align-self-center" id="main1">
                <h1 class="h1 main-text">SNACKS? CHIPS? COLA? YOU NAME IT!</h1>
                <p class="supporter-text">We got many sort of foods and beverages on stocks in these canteen. Take a closer look !</p>
                <button class="btn btn-page mb-4" data-bs-toggle="modal" data-bs-target="#login">BUY NOW !</button>
            </div>
        </div>
        

        <!-- seperator1 -->
        <div class="row text-center align-self-center pt-2 pb-2" style="background-color: #3DB4BD; color: white;" id="sep1">
            <h1 class="h1 seperator-text">ALL YOU WANTED</h1>
        </div>

        <div class="row text-center align-self-center pt-2 pb-2" style="background-color: #0E1A18; color: white;" id="sep2">
            <h1 class="h1 seperator-text">IN KANTIN KEJUJURAN</h1>
        </div>

        <div class="row">
            <!-- text2 -->
            <div class="col-xl align-self-center" id="main2">
                <h1 class="h1 main-text mt-4">JUST TAP IT, BUY IT, AND ENJOY !</h1>
                <p class="supporter-text">We value your honesty and thus you could just come, buy, and pay it yourself.</p>
            </div>

            <!-- images2 -->
            <div class="col-xl ps-0 pe-0"><img src="https://images2.imgbox.com/81/69/Aw6yRsly_o.jpg" class="img-fluid" alt="images 2"></div>
        </div>
        

        <!-- seperator2 -->
        <div class="row text-center pt-2 pb-2" style="background-color: #3DB4BD; color: white;" id="sep3">
            <h1 class="h1 seperator-text">ACCESABLE FOR ALL STUDENT</h1>
        </div>

        <div class="row">
            <!-- images3 -->
            <div class="col-xl ps-0 pe-0"><img src="https://images2.imgbox.com/fb/cc/tBalgg5O_o.jpg" class="img-fluid" alt="images 3"></div>
            
            <!-- text3 -->
            <div class="col-xl align-self-center" id="main3">
                <h1 class="h1 main-text">SOLD AND BOUGHT BY STUDENT THEM SELF</h1>
                <p class="supporter-text">In Kantin kejujuran, you could sell and buy a products at the same time. It is a canteen design for student. </p>
                <button class="btn btn-page mb-4" data-bs-toggle="modal" data-bs-target="#register">REGISTER NOW !</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <section class="row p-4 border-bottom justify-content-center">
            <div class="col text-center text-reset align-self-center" style="font-size: calc(1em + 0.75vw);">
                <span><b>Kantin Kejujuran</b></span>
                <br><span>a student canteen by student</span>
            </div>
        </section>
        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 StudentCanteen All Right Reserved
        </div>
    </footer>

    <!-- modal register -->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="register">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="Register proccess.php" method="post" id="register_form">
                        <!-- student ID -->
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student Id</label>
                            <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Insert 5 digit student ID" onchange="verification()" maxlength="5">
                            <div id="student_id_validation" class="form-text validation-text"></div>
                        </div>

                        <!-- student name -->
                        <div class="mb-3">
                            <label for="student_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="student_name" name="student_name" onchange="verification()">
                        </div>

                        <!-- password -->
                        <div class="mb-3">
                            <label for="password_register" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password_register" name="password_register" onchange="check_password()" disabled>
                        </div>

                        <!-- password confirmation -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Repeat Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" onchange="check_password()" disabled>
                            <div id="password_validation" class="form-text validation-text"></div>
                        </div>

                        <button type="submit" class="btn" id="register_submit" disabled>Register</button> 
                        <button type="reset" class="btn mx-2" onclick="reset_register_data()">Reset</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <small><b>Kantin Kejujuran</b></small>
                </div>
            </div>
        </div>
    </div>
    
    <!-- modal login -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="post" id="login_form">                  
                        <!-- student ID -->
                        <div class="mb-3">
                            <label for="student_id_login" class="form-label">Student Id</label>
                            <input type="text" class="form-control" id="student_id_login" name="student_id_login" placeholder="Insert 5 digit student ID" onchange="login_verification()" maxlength="5" value="<?= htmlspecialchars($_POST["student_id_login"] ?? "") ?>">
                            <div id="student_login_id_validation" class="form-text validation-text"></div>
                        </div>

                        <!-- password -->
                        <div class="mb-3">
                            <label for="password_login" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password_login" name="password_login" onchange="login_verification()">
                        </div>

                        <button type="submit" class="btn" id="login_submit" disabled>Login</button> 
                        <button type="reset" class="btn mx-2" onclick="reset_login_data()">Reset</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <small><b>Kantin Kejujuran</b></small>
                </div>
            </div>
        </div>
    </div>
    
    <script src="index_script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>