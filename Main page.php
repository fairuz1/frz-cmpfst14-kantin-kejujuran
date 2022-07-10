<?php 
    session_start();
    $user = "Username";
    $mysqli = require __DIR__ . "/database connection.php";
    $canteen_balance = 0;
    if (isset($_SESSION["student_session"])) {
        
        $sql = "SELECT student_id, student_name FROM student_account_data WHERE student_id = {$_SESSION["student_session"]}";
        $result = $mysqli->query($sql);
        $result_data = $result->fetch_assoc();

        $sql3 = "SELECT balance FROM canteen_balance";
        $balance = $mysqli->query($sql3);
        $balance_amount = $balance->fetch_assoc();
        $canteen_balance = $balance_amount['balance'];
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;500&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="main_page.css">
    <title>Kantin Kejujuran</title>
    
</head>
<body>
    <?php if (isset($result_data)): ?>
        <?php $user = htmlspecialchars($result_data["student_name"]) ?>
        <div class="alert alert-success alert-dismissible fade show login-buy" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h4 class="alert-heading">Welcome back <?= $user ?>!</h4>
            <p> Horray. Now is time to go shopping ! And by the way, buying many different items are very recommended in here.
                <br>Also, nice to see you, we hope you have a great time in here.
            </p>
            <hr>
            <p class="mb-0"><b>KantinKejujuran</b></p>
        </div>
    
    <?php else: ?>
        <div class="alert alert-warning alert-dismissible fade show login-buy" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h4 class="alert-heading"><b>OOPS, Login Somehow Failed!</b></h4>
            <p> Unfortunately something unexpected happened. <b>You are now not logged in</b>. 
                <a href="index.php">Click here</a> to redo your login proccess.
                <br>But you can still enjoy and look arround the in the canteen.
            </p>
            <hr>
            <p class="mb-0"><b>KantinKejujuran</b></p>
        </div>
    <?php endif; ?>

     <!-- navbar -->
     <nav class="navbar navbar-expand-md sticky-top navbar-light glass">
        <div class="container-fluid">
            <a class="navbar-brand nav-link active d-md-none " href="#"><b>Student Canteen</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="navbar-brand nav-link active mx-0 d-md-block d-none" aria-current="page" href="#"><b>Student Canteen</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="student_id">
                        <?= $user ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#sell_items" onclick="check_sell_state()">Sell Items</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#withdrawbalance" onclick="check_withdraw_state()">Withdraw Balance</a></li>
                            <li><a class="dropdown-item" href="https://github.com/fairuz1/frz-cmpfst14-kantin-kejujuran/blob/main/README.md">User Manual</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Log-Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="anchor-data" class="anchor-data mb-0 mt-0"></div>
    <div class="container-fluid">
        <h1 class="h1 heading-text text-center mt-4 mb-2">Items in <span style="color: #3DB4BD;">Canteen </span> Today :</h1>
        <div class="dropdown mx-2 mb-2">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Sort items by
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#" onclick="sort_data_by_dates_ascending()">by date created (ascending)</a></li>
                <li><a class="dropdown-item" href="#" onclick="sort_data_by_dates_descending()">by date created (descending)</a></li>
                <li><a class="dropdown-item" href="#" onclick="sort_data_by_names_ascending()">by product name (ascending)</a></li>
                <li><a class="dropdown-item" href="#" onclick="sort_data_by_names_descending()">by product name (descending)</a></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid" id="container-items">
        <?php
            $sql1 = "SELECT * FROM items_data";
            $new_result = mysqli_query($mysqli, $sql1);
            $new_result_data = array();
            if (mysqli_num_rows($new_result) > 0) {
                while ($i = mysqli_fetch_assoc($new_result)) {
                    $new_result_data[] = $i;
                }
            }

            $sql2 = "SELECT COUNT('id') AS length FROM items_data";
            $new_result2 = mysqli_query($mysqli, $sql2);
            $new_result2_data = array();
            if (mysqli_num_rows($new_result2) > 0) {
                while ($i = mysqli_fetch_assoc($new_result2)) {
                    $new_result2_data[] = $i;
                }
            }

            $length = $new_result2_data[0]['length'];
            for ($i = 0; $i < $length; $i++) { 
                $id = $new_result_data[$i]['id'];
                $seller = $new_result_data[$i]['seller_name'];
                $product_name = $new_result_data[$i]['product_name'];
                $image_link = $new_result_data[$i]['picture'];
                $descriptions = $new_result_data[$i]['descriptions'];
                $weight = $new_result_data[$i]['weight'];
                $time1 = $new_result_data[$i]['time1'];
                $time2 = $new_result_data[$i]['time2'];
                $price = $new_result_data[$i]['price'];
                echo "
                <div class='row border-bottom items-background' id='{$id}'>
                    <div class='col-xl pe-0 ps-0'><img src='{$image_link}' class='img-fluid images'></div>
                    <div class='col-xl-9 align-self-center'>
                        <h1 class='h1 mb-0 mt-3 main-text'><b>{$product_name}</b> <small>{$weight}</small></h1>
                        <p  class='mt-0 description-text pe-5'>
                        {$descriptions}
                        </p>
                
                        <div class='row'>
                            <div class='col-xl-6 align-self-center mb-0'>
                                <p class='date-text mb-0'>Added by {$seller}</p>
                                <p class='date-text mb-0'>{$time1}</p>
                                <span hidden>{$time2}</span>
                            </div>
                            
                            <div class='col'>
                                <div class='row mb-3'>
                                    <div class='col-8 align-self-center'>
                                        <h1 class='h1 main-text text-end mb-0 bold'>{$price} K</h1>
                                    </div>
                                    <div class='col align-self-center'>
                                        <button class='btn button px-4 h1 mb-0 bold' data-bs-toggle='modal' data-bs-target='#buy_products' onclick='buy_items(this)'>BUY</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        ?>
    </div>

    <div class="container-fluid">
        <div class="ms-2 mb-5 mt-4">
            <h1 class="h1 heading-text mb-0">That’s All <span style="color: #3DB4BD;">the Items</span> for Today</h1>
            <p class="mt-0 mb-2 description-text">Check the cannteen’s balance from balance the box below :</p>

            <h1 class="h1 heading-text mb-5">
                <button class="btn button px-4 ms-2" data-bs-toggle="modal" data-bs-target="#balancebox" onclick="balance_box(this)">
                    <b>Balance Box</b>
                </button>
            </h1>
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
    </div>

    <!-- balance box -->
    <div class="modal fade" id="balancebox" tabindex="-1" aria-labelledby="balanceboxLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-body" id="box-modal-body">
                    <h4 class="h4 mb-0 mt-2"><b>Canteen's Balance:</b></h4>
                    <h1 class="h1 heading-text mt-0 mb-3"><b id="canteen_balance"></b></h1>

                    <div class="mb-2">
                        <button type="button" class="btn button-normal mt-2" data-bs-toggle="modal" data-bs-target="#addbalance">Add Balance</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- add balance -->
    <div class="modal fade" id="addbalance" tabindex="-1" aria-labelledby="addbalance" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="addbalance">Add Canteen's Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="add-modal-body">
                    <form action="https://frz-cmpfst14-kantin-kejujuran.herokuapp.com/Add balance.php" method="post">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" onchange="add_amount()">
                        </div>
                        <button class="btn button-normal" id="add_balance_button" disabled>Add Balance</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- withdraw balance -->
    <div class="modal fade" id="withdrawbalance" tabindex="-1" aria-labelledby="withdrawbalance" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="withdrawbalance">Withdraw Canteen's Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="withdraw-modal-body">
                    <form action="Withdraw balance.php" method="post">
                        <div class="mb-3">
                            <label for="amount_withdraw" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="amount_withdraw" name="amount_withdraw" onchange="add_withdraw_amount()">
                        </div>
                        <button class="btn" style="color: white; background-color: #0E1A18;" id="withdraw_button" disabled>Withdraw</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="color: white; background-color: #0E1A18;" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- sell items -->
    <div class="modal fade" id="sell_items" tabindex="-1" aria-labelledby="sell_items" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sell_items">Sell Items</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="sell-modal-body">
                    <form action="Sell items.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Seller Name</label>
                            <input type="text" class="form-control" id="name" value="<?= $user ?>" readonly name="name">
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product's Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">
                        </div>
                        <div class="mb-3">
                            <label for="image_link" class="form-label">Product's Picture link</label>
                            <input type="text" class="form-control" id="image_link" placeholder="make sure the picture is in 1 x 1 dimension" name="image_link">
                        </div>
                        <div class="form-group mb-3">
                            <label for="product_description">Product's Descriptions</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="3" maxlength="100" placeholder="No more than 30 words"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Product's Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight">
                        </div>
                        <div class="mb-3">
                            <label for="product_time_added1" class="form-label">Time added (complete)</label>
                            <input type="text" class="form-control" id="product_time_added1" placeholder="Ex: 2 June 2022, Thursday" name="product_time_added1">
                        </div>
                        <div class="mb-3">
                            <label for="product_time_added2" class="form-label">Time added (number)</label>
                            <input type="text" class="form-control" id="product_time_added2" placeholder="2022-06-02" name="product_time_added2">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <button type="submit" class="btn" style="background-color: #0E1A18; color: white;">Sell items</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- buy items -->
    <div class="modal fade" id="buy_products" tabindex="-1" aria-labelledby="buy_products" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buy_products">Transaction Proccess</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="buy-modal-body">
                <form action="Remove items.php" method="post">
                        <div class="mb-3">
                            <label for="buyer_name" class="form-label">Buyer</label>
                            <input type="text" class="form-control" id="buyer_name" value="<?= $user ?>" readonly name="buyer_name">
                        </div>
                        <div class="mb-3">
                            <label for="items_name" class="form-label">Items</label>
                            <input type="text" class="form-control" id="items_name" readonly name="items_name">
                        </div>
                        <div class="mb-3" hidden>
                            <label for="items_id" class="form-label">Id</label>
                            <input type="text" class="form-control" id="items_id" readonly name="items_id">
                        </div>
                        <div class="mb-3">
                            <label id="choice" class="form-label"></label>
                        </div>
                        <button type="submit" class="btn" style="background-color: #0E1A18; color: white;">Buy items</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var balance_box_amount = <?= $canteen_balance ?>;
        function balance_box(box) {
            if ("<?= $user ?>" === "Username") {
                document.getElementById("box-modal-body").innerHTML = 
                `<div class="alert alert-warning fade show" role="alert">
                    <strong>Hello there,</strong> we are so sorry but only registered student who logged in can access balance box.
                </div>`;
            } else {
                document.getElementById("canteen_balance").innerHTML = `${balance_box_amount} K`;
            }
        }

        function check_sell_state() {
            if ("<?= $user ?>" === "Username") {
                document.getElementById("sell-modal-body").innerHTML = 
                `<div class="alert alert-warning fade show" role="alert">
                    <strong>Hello there,</strong> we are so sorry but only registered student who logged in can sell items.
                </div>`;
            }
        }

        function check_withdraw_state() {
            if ("<?= $user ?>" === "Username") {
                document.getElementById("withdraw-modal-body").innerHTML = 
                `<div class="alert alert-warning fade show" role="alert">
                    <strong>Hello there,</strong> we are so sorry but only registered student who logged in can withdraw from balance box.
                </div>`;
            }
        }

        // add items in client side, currently not being used because already connected to database
        function add_items() {
            var seller = document.getElementById("name").value;
            var product_name = document.getElementById("product_name").value;
            var picture = document.getElementById("image_link").value;
            var product_description = document.getElementById("product_description").value;
            var weight = document.getElementById("weight").value;
            var time1 = document.getElementById("product_time_added1").value;
            var time2 = document.getElementById("product_time_added2").value;
            var price = document.getElementById("price").value;

            var container = document.getElementById("container-items");

            // creating container for items
            var div1 = document.createElement("div");
            div1.setAttribute('id',`created by ${seller}`);
            div1.setAttribute('class', 'row border-bottom items-background');

            div1.innerHTML = 
            `<div class="col-xl pe-0 ps-0"><img src="${picture}" class="img-fluid images"></div>

            <div class="col-xl-9 align-self-center">
                <h1 class="h1 mb-0 mt-3 main-text"><b id="benitos">${product_name}</b> <small>${weight}</small></h1>
                <p  class="mt-0 description-text pe-5">
                    ${product_description}
                </p>

                <div class="row">
                    <div class="col-xl-6 align-self-center mb-0">
                        <p class="date-text mb-0">Added by ${seller}</p>
                        <p class="date-text mb-0">${time1}</p>
                        <span hidden>${time2}</span>
                    </div>
                    
                    <div class="col">
                        <div class="row mb-3">
                            <div class="col-8 align-self-center">
                                <h1 class="h1 main-text text-end mb-0 bold">${price} K</h1>
                            </div>
                            <div class="col align-self-center">
                                <button class="btn button px-4 h1 mb-0 bold" onclick="buy_items(this)">BUY</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>`;
            container.appendChild(div1);
        }

        
        function add_amount() {
            var amount = document.getElementById("amount").value;
            if (isNaN(Number(amount))) {
                document.getElementById("add_balance_button").disabled = true;
            } else if (! isNaN(Number(amount))  && amount !== "") {
                document.getElementById("add_balance_button").disabled = false;
            } else if (amount === "") {
                document.getElementById("add_balance_button").disabled = true;
            }
        }

        function add_withdraw_amount() {
            var amount_withdraw = document.getElementById("amount_withdraw").value;
            if (isNaN(Number(amount_withdraw))) {
                document.getElementById("withdraw_button").disabled = true;
            } else if (! isNaN(Number(amount_withdraw)) && amount_withdraw !== "") {
                document.getElementById("withdraw_button").disabled = false;
            } else if (amount_withdraw === "") {
                document.getElementById("withdraw_button").disabled = true;
            }
        }

        function buy_items(items) {
            var default_user = "<?= $user ?>";

            if (default_user === "Username") {
                document.getElementById("buy-modal-body").innerHTML = 
                `<div class="alert alert-warning fade show" role="alert">
                    <strong>Hello there,</strong> we are so sorry but only registered student who logged in can buy these items.
                </div>`;
            } else {
                var container = document.getElementById("container-items");
                var parent = items.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                var parent_price = items.parentNode.parentNode;
                var items_id = parent.id;

                var items_name = parent.getElementsByTagName("b")[0].innerHTML;
                var price = parent_price.getElementsByTagName("h1")[0].innerHTML;

                document.getElementById("items_id").value = parent.id;
                document.getElementById("choice").innerHTML = `Do you want to buy <b>${items_name}</b> for <b>${price}</b> ?`;
                document.getElementById("items_name").value = items_name;
            }
            
        }

        function sort_data_by_names_ascending() {
            var data = document.getElementById("container-items");
            var data_length = data.getElementsByTagName("b").length;

            for (let i = 1; i < data_length; i++) {
                var left = i - 1;
                var now = i;

                while (left >= 0 && data.getElementsByTagName("b")[now].innerHTML < data.getElementsByTagName("b")[left].innerHTML) {
                    var x = data.getElementsByTagName("b")[now].parentNode.parentNode.parentNode;
                    var y = data.getElementsByTagName("b")[left].parentNode.parentNode.parentNode;

                    data.insertBefore(x, y);
                    left -= 1;
                    now -= 1;

                }
                
            }
        }

        function sort_data_by_names_descending() {
            var data = document.getElementById("container-items");
            var data_length = data.getElementsByTagName("b").length;

            for (let i = 1; i < data_length; i++) {
                var left = i - 1;
                var now = i;

                while (left >= 0 && data.getElementsByTagName("b")[now].innerHTML > data.getElementsByTagName("b")[left].innerHTML) {
                    var x = data.getElementsByTagName("b")[now].parentNode.parentNode.parentNode;
                    var y = data.getElementsByTagName("b")[left].parentNode.parentNode.parentNode;

                    data.insertBefore(x, y);
                    left -= 1;
                    now -= 1;

                }
                
            }
        }

        function sort_data_by_dates_ascending() {
            var data = document.getElementById("container-items");
            var data_length = data.getElementsByTagName("span").length;

            for (let i = 1; i < data_length; i++) {
                var left = i - 1;
                var now = i;

                while (left >= 0 && data.getElementsByTagName("span")[now].innerHTML < data.getElementsByTagName("span")[left].innerHTML) {
                    var x = data.getElementsByTagName("span")[now].parentNode.parentNode.parentNode.parentNode;
                    var y = data.getElementsByTagName("span")[left].parentNode.parentNode.parentNode.parentNode;

                    data.insertBefore(x, y);
                    left -= 1;
                    now -= 1;

                }
                
            }
        }

        function sort_data_by_dates_descending() {
            var data = document.getElementById("container-items");
            var data_length = data.getElementsByTagName("span").length;

            for (let i = 1; i < data_length; i++) {
                var left = i - 1;
                var now = i;

                while (left >= 0 && data.getElementsByTagName("span")[now].innerHTML > data.getElementsByTagName("span")[left].innerHTML) {
                    var x = data.getElementsByTagName("span")[now].parentNode.parentNode.parentNode.parentNode;
                    var y = data.getElementsByTagName("span")[left].parentNode.parentNode.parentNode.parentNode;

                    data.insertBefore(x, y);
                    left -= 1;
                    now -= 1;

                }
                
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>