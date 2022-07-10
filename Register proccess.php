<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;500&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration</title>
    <style>
        * {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>
<body>
    <?php
        if (empty($_POST["student_id"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Student ID is Empty!</b></h4>
                    <p>Student ID Should not be leaved empty. Please go back to the register page and fill the form correctly!</p>
                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (empty($_POST["student_name"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Student Name is Empty!</b></h4>
                    <p>Student Name Should not be leaved empty. Please go back to the register page and fill the form correctly!</p>
                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (strlen($_POST["password_register"]) < 8) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Password is Less Than 8 Characters or Empty!</b></h4>
                    <p> Password Should be more than 8 characters and should not be leaved empty.
                        Please go back to the register page and fill the form correctly!</p>
                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (! preg_match("/[a-z]/i", $_POST["password_register"]) || ! preg_match("/[0-9]/i", $_POST["password_register"]) ) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Password is Not Unique!</b></h4>
                    <p> Password Should be combined with at least 1 letter and 1 number.
                        Please go back to the register page and fill the form correctly!</p>
                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if ($_POST["password_confirmation"] !== $_POST["password_register"]) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Password Confirmation is Unrocognized!</b></h4>
                    <p> Password Confirmation Should be the same with original the password. 
                        Please go back to the register page and fill the form correctly!</p>
                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        $password_encryption = password_hash($_POST["password_register"], PASSWORD_DEFAULT);
        $student_id = $_POST["student_id"];
        $student_name = $_POST["student_name"];
        $mysqli = require __DIR__ . "/database connection.php";

        $sql = "SELECT student_id FROM student_account_data";
        $data = mysqli_query($mysqli, $sql);
        $student_id_data = array();
        if (mysqli_num_rows($data) > 0) {
            while ($i = mysqli_fetch_assoc($data)) {
                $student_id_data[] = $i;
            }
        }
        
        for ($i=0; $i < count($student_id_data); $i++) { 
            if ($student_id_data[$i]["student_id"] == $student_id) {
                die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Student ID is Already Registered!</b></h4>
                    <p> Same student ID cannot be used to register twice. 
                        Please go back to the register page and fill the form with another student ID!
                        <br><a href="index.php">Click here</a> to go back to the main page.
                    </p>
                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
            }
        }

        $sql = "INSERT INTO student_account_data(student_id, student_name, password) VALUES(?, ?, ?)";
        $stmt = $mysqli->stmt_init();

        if ( ! $stmt->prepare($sql)) {
            die("SQL error:" . $mysqli->error);
        }

        $stmt->bind_param("iss", $student_id, $student_name, $password_encryption);
        mysqli_stmt_execute($stmt);
        echo '
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Congratulation!</h4>
            <p> You have been <b>registered</b> to Kantin Kejujuran. Now you could buy and sell anything food related in Kantin Kejujuran.
            <a href="index.php">Click here</a> to go back and login with your registered account.
            </p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
         </div>
        ';

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>