<?php
include("../config/config.php");


if (isset($_GET["id"])) {
    $id_product = $_GET["id"];
    $category_product = $_GET["category"];
    $name_product = $_GET["name"];
    $query = "DELETE FROM $category_product WHERE $name_product = :id";
    $statement = $serverConn->prepare($query);
    $statement->bindParam(':id', $id_product, PDO::PARAM_INT);
    if ($statement->execute()) {
        header("location: ../order/order.php?status=deleted");
        exit();
    }
    if ($statement->execute()) {
        header("location: ../order/order.php?status=false");
        exit();
    }
}
