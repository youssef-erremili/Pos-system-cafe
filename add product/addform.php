<?php

include("../config/config.php");

// this part is about update product in DATABASE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_product"])) {
    $product_name = $_POST["product_name"];
    $product_desc = $_POST["description_product"];
    $product_price = $_POST["product_price"];
    
    // Check if the product ID is valid (you might need additional validation here)
    if (isset($_GET["product-id"])) {
        $product_id = $_GET["product-id"];
        $updateSql = "UPDATE coffee SET coffee_name=?, coffee_desc=?, coffee_price=? WHERE coffee_id=?";
        $Upstmt = $serverConn->prepare($updateSql);

        // Check if the SQL statement is prepared successfully
        if ($Upstmt) {
            if ($Upstmt->execute([$product_name, $product_desc, $product_price, $product_id])) {
                header("location: ../order/order.php?status=true");
                exit();
            } else {
                header("location: ../order/order.php?status=false");
                exit();
            }
        } else {
            // Handle the case where the SQL statement preparation fails
            echo "Error preparing SQL statement.";
        }
    } else {
        // Handle the case where the product ID is not provided or empty
        echo "Product ID is invalid.";
    }
}













$maxFileSize = 12 * 1024 * 1024;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["upload_product"])) {;
        $category = $_POST["category"];
        $product_name = $_POST["product_name"];
        $product_desc = $_POST["description_product"];
        $product_price = $_POST["product_price"];
        $file_name = $_FILES["imgproduct"]["name"];
        $temp_name = $_FILES["imgproduct"]["tmp_name"];
        $file_size = $_FILES["imgproduct"]['size'];
        $file_type = $_FILES["imgproduct"]['type'];
        $file_error = $_FILES["imgproduct"]['error'];
        function folderPath()
        {
            global $file_name;
            global $category;
            return "../upload/$category/" . $file_name;
        };
        switch ($category) {
            case "coffee":
                coffee($product_name, $product_desc, $product_price, $file_name, $file_error, $file_size, $temp_name, folderPath());
                break;
            case "burgers":
                burgers($product_name, $product_desc, $product_price, $file_name, $file_error, $file_size, $temp_name, folderPath());
                break;
            case "drinks":
                drinks($product_name, $product_desc, $product_price, $file_name, $file_error, $file_size, $temp_name, folderPath());
                break;
            case "salads":
                salads($product_name, $product_desc, $product_price, $file_name, $file_error, $file_size, $temp_name, folderPath());
                break;
            default:
                echo "no category selected";
                break;
        }
    }
}


function coffee($name, $desc, $price, $img, $error, $size, $temp, $path)
{
    global $serverConn;
    global $maxFileSize;
    if ($error != 0) {
        /* Redirect with appropriate error message when there's an issue with the file upload or no picture was uploaded*/
        header("location: addproduct.php?status=upload_error");
        exit();
    }
    if ($size >= $maxFileSize) {
        // Redirect with message when size of picture is bigger than the maximum allowed size
        header("location: addproduct.php?status=size_exceeded");
        exit();
    }

    $query = "INSERT INTO coffee(coffee_name, coffee_desc, coffee_price, coffee_image) 
                VALUES(:coffee_name, :coffee_desc, :coffee_price, :coffee_image)";
    $query_exc = $serverConn->prepare($query);
    $data_insert = [
        ":coffee_name" => $name,
        ":coffee_desc" => $desc,
        ":coffee_price" => $price,
        ":coffee_image" => $img,
    ];
    $status = $query_exc->execute($data_insert);
    if ($status) {
        // Redirect with success message when product and details are uploaded successfully
        header("location: addproduct.php?status=success");
        move_uploaded_file($temp, $path);
        exit();
    } else {
        // Redirect with query error message when there's an issue in uploading product and details
        header("location: addproduct.php?status=query_error");
        exit();
    }
}






function burgers($name, $desc, $price, $img, $error, $size, $temp, $path)
{
    global $serverConn;
    global $maxFileSize;
    if ($error != 0) {
        /* Redirect with appropriate error message when there's an issue with the file upload or no picture was uploaded*/
        header("location: addproduct.php?status=upload_error");
        exit();
    }
    if ($size >= $maxFileSize) {
        // Redirect with message when size of picture is bigger than the maximum allowed size
        header("location: addproduct.php?status=size_exceeded");
        exit();
    }
    $query = "INSERT INTO burger(burger_name, burger_desc, burger_price, burger_image) 
                VALUES(:burger_name, :burger_desc, :burger_price, :burger_image)";
    $query_exc = $serverConn->prepare($query);
    $data_insert = [
        ":burger_name" => $name,
        ":burger_desc" => $desc,
        ":burger_price" => $price,
        ":burger_image" => $img,
    ];
    $status = $query_exc->execute($data_insert);
    if ($status) {
        // Redirect with success message when product and details are uploaded successfully
        header("location: addproduct.php?status=success");
        move_uploaded_file($temp, $path);
        exit();
    } else {
        // Redirect with query error message when there's an issue in uploading product and details
        header("location: addproduct.php?status=query_error");
        exit();
    }
}
function drinks($name, $desc, $price, $img, $error, $size, $temp, $path)
{
    global $serverConn;
    global $maxFileSize;
    if ($error != 0) {
        /*Redirect with appropriate error message when there's an issue with the file upload or no picture was uploaded*/
        header("location: addproduct.php?status=upload_error");
        exit();
    }
    if ($size >= $maxFileSize) {
        // Redirect with message when size of picture is bigger than the maximum allowed size
        header("location: addproduct.php?status=size_exceeded");
        exit();
    }
    $query = "INSERT INTO drinks(drink_name, drink_desc, drink_price, drink_image) 
                VALUES(:drink_name, :drink_desc, :drink_price, :drink_image)";
    $query_exc = $serverConn->prepare($query);
    $data_insert = [
        ":drink_name" => $name,
        ":drink_desc" => $desc,
        ":drink_price" => $price,
        ":drink_image" => $img,
    ];
    $status = $query_exc->execute($data_insert);
    if ($status) {
        // Redirect with success message when product and details are uploaded successfully
        header("location: addproduct.php?status=success");
        move_uploaded_file($temp, $path);
        exit();
    } else {
        // Redirect with query error message when there's an issue in uploading product and details
        header("location: addproduct.php?status=query_error");
        exit();
    }
}

function salads($name, $desc, $price, $img, $error, $size, $temp, $path)
{
    global $serverConn;
    global $maxFileSize;
    if ($error != 0) {
        /* Redirect with appropriate error message when there's an issue with the file upload or no picture was uploaded*/
        header("location: addproduct.php?status=upload_error");
        exit();
    }
    if ($size >= $maxFileSize) {
        // Redirect with message when size of picture is bigger than the maximum allowed size
        header("location: addproduct.php?status=size_exceeded");
        exit();
    }
    $query = "INSERT INTO salads(salad_name, salad_desc, salad_price, salad_image) 
                VALUES(:salad_name, :salad_desc, :salad_price, :salad_image)";
    $query_exc = $serverConn->prepare($query);
    $data_insert = [
        ":salad_name" => $name,
        ":salad_desc" => $desc,
        ":salad_price" => $price,
        ":salad_image" => $img,
    ];
    $status = $query_exc->execute($data_insert);
    if ($status) {
        // Redirect with success message when product and details are uploaded successfully
        header("location: addproduct.php?status=success");
        move_uploaded_file($temp, $path);
        exit();
    } else {
        // Redirect with query error message when there's an issue in uploading product and details
        header("location: addproduct.php?status=query_error");
        exit();
    }
}
