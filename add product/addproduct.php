<?php
include("../config/config.php");
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_product"])) {
    $product_name = $_POST["product_name"];
    $product_desc = $_POST["description_product"];
    $product_price = $_POST["product_price"];
    
    // Check if the product ID is valid (you might need additional validation here)
    if (isset($_GET["product-id"])) {
        $product_id = $_GET["product-id"];
        echo $product_id;
        // $updateSql = "UPDATE coffee SET coffee_name=?, coffee_desc=?, coffee_price=? WHERE coffee_id=?";
        // $Upstmt = $serverConn->prepare($updateSql);

        // // Check if the SQL statement is prepared successfully
        // if ($Upstmt) {
        //     if ($Upstmt->execute([$product_name, $product_desc, $product_price, $product_id])) {
        //         header("location: ../order/order.php?status=true");
        //         exit();
        //     } else {
        //         header("location: ../order/order.php?status=false");
        //         exit();
        //     }
        // } else {
        //     // Handle the case where the SQL statement preparation fails
        //     echo "Error preparing SQL statement.";
        // }
    }
}











?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add product</title>
    <link rel="stylesheet" href="../assests/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <div class="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <a href="../order/order.php">
                    <h2>pos system <span> errehub</span></h2>
                </a>
            </div>
            <div class="form">
                <form action="" method="">
                    <input type="text" name="search" id="search" placeholder="Search">
                    <input type="submit" name="searchBtn" value="Search">
                </form>
            </div>
            <div class="user">
                <h3><?php echo $_SESSION["user_name"] ?></h3>
                <p>admin</p>
            </div>
        </div>
    </header>
    <main>
        <div class="secondBar">
            <div class="xmark">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <i class="fa-solid fa-plus"></i>
                        <a href="addproduct.php">add product</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-pen-to-square"></i>
                        <a href="../order/order.php">products</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <a href="../log out/logout.php">log out</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="model">
            <form action="addform.php" method="post" id="formlContainer" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="containerAdd">
                    <div class="col box1">
                        <div class="boxWithBor">
                            <i class="fa-solid fa-upload"></i>
                            <h2 class="title">drop files or upload</h2>
                            <input type="file" accept="image/png, image/jpeg, image/jpg" class="input_form" name="imgproduct" id="picfile">
                        </div>
                    </div>
                    <div class="col box2">
                        <div class="addPro">
                            <h2>add a new product</h2>
                        </div>
                        <label for="product_name">product name :</label>
                        <input type="text" name="product_name" class="input_form" placeholder="product name" id="product_name">
                        <label for="product_price">product price :</label>
                        <input type="text" name="product_price" class="input_form" placeholder="product price" id="product_price">
                        <label for="description_product">product description :</label>
                        <input type="text" name="description_product" class="input_form" id="description_product" placeholder="product description">
                        <label for="description_product">product category :</label>
                        <div class="type">
                            <select name="category" class="input_form" id="category">
                                <option hidden>--select category--</option>
                                <option value="coffee">coffee</option>
                                <option value="burgers">burgers</option>
                                <option value="drinks">drinks</option>
                                <option value="salads">salads</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="btnProcut">
                    <section>
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <input type="submit" value="upload product" name="upload_product" class="btn_hytr" id="upload_file">
                    </section>
                    <section>
                        <i class="fa-solid fa-pen-to-square"></i>
                        <input type="submit" formaction="addproduct.php" value="update product" name="update_product" class="btn_hytr" id="update_file">
                    </section>
                </div>
            </form>
        </div>
    </main>


    <script src="../assests/main.js"></script>
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/25ae13bf53.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>

</html>