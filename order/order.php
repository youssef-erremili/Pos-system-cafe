<?php
include("../config/config.php");
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location: ../login.php");
    exit;
}

function fetchDataFromDB($option)
{
    global $serverConn;
    global $sql;
    global $stmt;

    $sql = "SELECT * FROM $option";
    $stmt[$option] = $serverConn->prepare($sql);
    $stmt[$option]->execute();
}

function displayOrders($stmt, $product_id, $name, $desc, $price, $img, &$products)
{
    while ($fetch = $stmt->fetch()) {
        $product = array(
            "id" => $fetch[$product_id],
            "name" => $fetch[$name],
            "description" => $fetch[$desc],
            "price" => $fetch[$price],
            "image" => $fetch[$img]
        );
        $products[] = $product;
    }
}

$products_coffee = array();
$products_burger = array();
$products_drink = array();
$products_salads = array();


fetchDataFromDB("coffee");
displayOrders($stmt["coffee"], "coffee_id", "coffee_name", "coffee_desc", "coffee_price", "coffee_image", $products_coffee);

fetchDataFromDB("burger");
displayOrders($stmt["burger"], "burger_id", "burger_name", "burger_desc", "burger_price", "burger_image", $products_burger);

fetchDataFromDB("drinks");
displayOrders($stmt["drinks"], "drink_id", "drink_name", "drink_desc", "drink_price", "drink_image", $products_drink);

fetchDataFromDB("salads");
displayOrders($stmt["salads"], "salad_id", "salad_name", "salad_desc", "salad_price", "salad_image", $products_salads);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pos System - errehub</title>
    <link rel="stylesheet" href="../assests/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <meta name="description" content="weater ">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <div class="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <a href="order.php">
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
                        <a href="../add product/addproduct.php">add product</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-pen-to-square"></i>
                        <a href="order.php">products</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <a href="../log out/logout.php">log out</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="side left">
                <div class="list">
                    <h3 class="result">choose :</h3>
                    <form action="" method="get">
                        <ul>
                            <li><button type="button" class="choosebtn active">coffee</button></li>
                            <li><button type="button" class="choosebtn">burger</button></li>
                            <li><button type="button" class="choosebtn">drinks</button></li>
                            <li><button type="button" class="choosebtn">salads</button></li>
                        </ul>
                    </form>
                </div>
                <div class="containerOrder">
                    <div class="order coffee display">
                        <?php
                        foreach ($products_coffee as $coffee) {
                            $id_element = $coffee["id"];
                            $name_element = $coffee["name"];
                            $desc_element = $coffee["description"];
                            $price_element = $coffee['price'];
                            $image_element = $coffee['image'];
                            echo "
                            <div class='box box1'>
                                <div class='orderContent'>
                                    <div class='imgProdcut'>
                                    <img class='image' src='../upload/coffee/$image_element' alt='coffee'>
                                </div>
                                <div class='content'>
                                    <h4 id=''>$name_element</h4>
                                    <p class='descr'>$desc_element</p>
                                    <div class='colflex'>
                                        <section>
                                            <h5>quantity :</h5>
                                            <div class='quantity'>
                                                <button type='button' class='descrease'>-</button>
                                                <input type='text' name='quantit' class='input_value' maxlength='99' value='1'>
                                                <button type='button' class='increase'>+</button>
                                            </div>
                                        </section>
                                        <section>
                                            <h5>Price :</h5>
                                            <p>$price_element DH</p>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class='addCard'>
                                <button type='button' class='addBtn'>
                                    <i class='fa-solid fa-cart-shopping'></i>
                                    add to card
                                </button>
                                <section>
                                    <a href='../add product/addproduct.php?product-id=$id_element&name=$name_element&price=$price_element&desc=$desc_element&image=upload/coffee/$image_element' class='cr884 editBtn'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                        edit
                                    </a>
                                    <a href='../delete/delete.php?id=$id_element&category=coffee&name=coffee_id' class='cr884 delBtn'>
                                        <i class='fa-solid fa-trash'></i>
                                        delete
                                    </a>
                                </section>
                            </div>
                        </div>";
                        }
                        ?>
                    </div>
                    <div class="order burger">
                        <?php
                        foreach ($products_burger as $burger) {
                            $id_element = $burger["id"];
                            $name_element = $burger["name"];
                            $desc_element = $burger["description"];
                            $price_element = $burger['price'];
                            $image_element = $burger['image'];
                            echo "
                            <div class='box box1'>
                                <div class='orderContent'>
                                    <div class='imgProdcut'>
                                    <img class='image' src='../upload/burgers/$image_element' alt='burger'>
                                </div>
                                <div class='content'>
                                    <h4 id=''>$name_element</h4>
                                    <p class='descr'>$desc_element</p>
                                    <div class='colflex'>
                                        <section>
                                            <h5>quantity :</h5>
                                            <div class='quantity'>
                                                <button type='button' class='descrease'>-</button>
                                                <input type='text' name='quantit' class='input_value' maxlength='99' value='1'>
                                                <button type='button' class='increase'>+</button>
                                            </div>
                                        </section>
                                        <section>
                                            <h5>Price :</h5>
                                            <p>$price_element MAD</p>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class='addCard'>
                                <button type='button' class='addBtn'>
                                    <i class='fa-solid fa-cart-shopping'></i>
                                    add to card
                                </button>
                                <section>
                                    <a href='../add product/addproduct.php?product-id=$id_element&name=$name_element&price=$price_element&desc=$desc_element&image=upload/burgers/$image_element' class='cr884 editBtn'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                        edit
                                    </a>
                                    <a href='../delete/delete.php?id=$id_element&category=burger&name=burger_id' class='cr884 delBtn'>
                                        <i class='fa-solid fa-trash'></i>
                                        delete
                                    </a>
                                </section>
                            </div>
                        </div>";
                        }
                        ?>
                    </div>
                    <div class="order drinks">
                        <?php
                        foreach ($products_drink as $drink) {
                            $id_element = $drink["id"];
                            $name_element = $drink["name"];
                            $desc_element = $drink["description"];
                            $price_element = $drink['price'];
                            $image_element = $drink['image'];
                            echo "
                            <div class='box box1'>
                                <div class='orderContent'>
                                    <div class='imgProdcut'>
                                    <img class='image' src='../upload/drinks/$image_element' alt='drinks'>
                                </div>
                                <div class='content'>
                                    <h4 id=''>$name_element</h4>
                                    <p class='descr'>$desc_element</p>
                                    <div class='colflex'>
                                        <section>
                                            <h5>quantity :</h5>
                                            <div class='quantity'>
                                                <button type='button' class='descrease'>-</button>
                                                <input type='text' name='quantit' class='input_value' maxlength='99' value='1'>
                                                <button type='button' class='increase'>+</button>
                                            </div>
                                        </section>
                                        <section>
                                            <h5>Price :</h5>
                                            <p>$price_element MAD</p>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class='addCard'>
                                <button type='button' class='addBtn'>
                                    <i class='fa-solid fa-cart-shopping'></i>
                                    add to card
                                </button>
                                <section>
                                    <a href='../add product/addproduct.php?product-id=$id_element&name=$name_element&price=$price_element&desc=$desc_element&image=upload/burgers/$image_element' class='cr884 editBtn'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                        edit
                                    </a>
                                    <a href='../delete/delete.php?id=$id_element&category=drinks&name=drink_id' class='cr884 delBtn'>
                                        <i class='fa-solid fa-trash'></i>
                                        delete
                                    </a>
                                </section>
                            </div>
                        </div>";
                        }
                        ?>
                    </div>
                    <div class="order salads">
                        <?php
                        foreach ($products_salads as $salad) {
                            $id_element = $salad["id"];
                            $name_element = $salad["name"];
                            $desc_element = $salad["description"];
                            $price_element = $salad['price'];
                            $image_element = $salad['image'];
                            echo "
                            <div class='box box1'>
                                <div class='orderContent'>
                                    <div class='imgProdcut'>
                                    <img class='image' src='../upload/salads/$image_element' alt='salad'>
                                </div>
                                <div class='content'>
                                    <h4 id=''>$name_element</h4>
                                    <p class='descr'>$desc_element</p>
                                    <div class='colflex'>
                                        <section>
                                            <h5>quantity :</h5>
                                            <div class='quantity'>
                                                <button type='button' class='descrease'>-</button>
                                                <input type='text' name='quantit' class='input_value' maxlength='99' value='1'>
                                                <button type='button' class='increase'>+</button>
                                            </div>
                                        </section>
                                        <section>
                                            <h5>Price :</h5>
                                            <p>$price_element MAD</p>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class='addCard'>
                                <button type='button' class='addBtn'>
                                    <i class='fa-solid fa-cart-shopping'></i>
                                    add to card
                                </button>
                                <section>
                                    <a href='../add product/addproduct.php?product-id=$id_element&name=$name_element&price=$price_element&desc=$desc_element&image=upload/salads/$image_element' class='cr884 editBtn'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                        edit
                                    </a>
                                    <a href='../delete/delete.php?id=$id_element&category=salads&name=salad_id' class='cr884 delBtn'>
                                        <i class='fa-solid fa-trash'></i>
                                        delete
                                    </a>
                                </section>
                            </div>
                        </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="side right sidebar">
                <div class="head_title">
                    <span id="sizes">0</span>
                    <h2>orders</h2>
                    <p>panding orders</p>
                </div>
                <div class="Total">
                    <input type="button" class="conform" name="confirm" value="confirm">
                    <section>
                        <span class="totalPrice">0.00</span>
                        <span class="priceSign">DH</span>
                    </section>
                </div>
            </div>
        </div>
    </main>


    <script src="../assests/main.js"></script>
    <script src="https://kit.fontawesome.com/25ae13bf53.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>

</html>