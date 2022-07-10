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
        if (empty($_POST["name"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Seller Name should not be empty</b></h4>
                    <p> We need to know the seller name so that later on the buyer could contact the seller.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if ($_POST["name"] === "Username") {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Sorry, Only Registered Student can Sell Items.</b></h4>
                    <p> Please register yourself to sell or buy something in the canteen.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (empty($_POST["product_name"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Your Items Need a Name!</b></h4>
                    <p> Please go back and add the item a name so that it easier to identify.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (empty($_POST["image_link"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Your Items Need an Images!</b></h4>
                    <p> Please go back and add the item a image link so that it easier to identify.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (empty($_POST["product_description"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Items Has No Descriptions!</b></h4>
                    <p> Please go back and add short descriptions of your items so that buyer can easly know your products.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (empty($_POST["weight"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Items Weight is Empty!</b></h4>
                    <p> Please go back and your items weight.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (empty($_POST["product_time_added1"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Time Added is Empty!</b></h4>
                    <p> Please go back specify the time you sell your items.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (empty($_POST["product_time_added2"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Time Added is Empty!</b></h4>
                    <p> Please go back specify the time you sell your items.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        if (empty($_POST["price"])) {
            die('
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><b>Items Has No Price!</b></h4>
                    <p> Please go back specify the price of your items.
                    </p>

                    <hr>
                    <p class="mb-0"><b>KantinKejujuran</b></p>
                </div>
            ');
        }

        $mysqli = require __DIR__ . "/database connection.php";
    
        $sql = "INSERT INTO items_data(seller_name, product_name, picture, descriptions, weight, time1, time2, price) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->stmt_init();

        if ( ! $stmt->prepare($sql)) {
            die("SQL error:" . $mysqli->error);
        }

        $stmt->bind_param("sssssssi", $_POST["name"], $_POST["product_name"], $_POST["image_link"], $_POST["product_description"], $_POST["weight"], $_POST["product_time_added1"], $_POST["product_time_added2"], $_POST["price"]);
        mysqli_stmt_execute($stmt);
        echo '
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Items Sold! Thank You Very Much!</h4>
            <p> Thank you for participating in Kantin Kejujuran, your items should be visible in the canteen by now. We hope your items will be bought very soon >_<
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