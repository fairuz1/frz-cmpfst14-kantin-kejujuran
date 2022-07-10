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
        if (empty($_POST["amount"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>No Amount were added</b></h4>
                    <p> When adding balance, the amount should be specified and not to be leaved empty.
                        Please go back and fill the balance amount.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        $balance = $_POST["amount"];
        $mysqli = require __DIR__ . "/database connection.php";
    
        $sql = "SELECT balance FROM canteen_balance";
        $current_balance = $mysqli->query($sql);
        $current_balance_amount = $current_balance->fetch_assoc();
    
        $current_amount = $current_balance_amount['balance'];
        $added_balance = intval($balance) + intval($current_amount);
    
        $sql1 = "UPDATE canteen_balance SET balance = {$added_balance} WHERE balance = {$current_amount}";
        $new_balance = $mysqli->query($sql1);
        echo '
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Balance Added, Thank You Very Much!</h4>
            <p> Thank you for the generous amount of balance that you have added.
            <a href="Main page.php">Click here</a> to go back to main page and continue shopping.
            </p>
            <hr>
            <p class="mb-0">Adding balance create a healthy envronment for the canteen.</p>
        </div>

        ';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>