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
        $items = $_POST["items_name"];
        $id = $_POST["items_id"];
        
        $mysqli = require __DIR__ . "/database connection.php";
        $sql = "DELETE FROM items_data WHERE id = '{$id}' AND product_name = '{$items}'";
        mysqli_query($mysqli, $sql);

        echo '
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Successfuly Bought an Items</h4>
            <p> Thank you for buying this items. I hope the items that you bought could make you happy.
            After buying Items, Please do add balance to BalanceBox as a payment.
            <a href="Main page.php">Click here</a> to go back to main page and continue shopping.
            </p>
            <hr>
            <p class="mb-0">Adding balance create a healthy envronment for the canteen.</p>
        </div>';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>