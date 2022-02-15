<?php

require_once('config/db.php');

$sql = "select * FROM menu where category = ? or category = ?";
$query = $database->prepare($sql);

$categories = ['Soups', 'Salads'];

$query->bindValue(1, $categories[0]);
$query->bindValue(2, $categories[1]);
$query->execute();

$menuItems = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($menuItems as $menuItem) {
        increaseMenuItemPriceByPercentage($menuItem->itemName, $menuItem->price, 2.25);
    }
}

/**
 * @param string $itemName
 * @param $price
 * @param $percentage
 */
function increaseMenuItemPriceByPercentage(string $itemName, $price, $percentage)
{
    global $database;

    $numberToAdd = ($price / 100) * $percentage;
    $newPrice = $price + $numberToAdd;

    $updateQuery = $database->prepare('update menu SET price = :reprice where itemName = :itemName');
    $updateQuery->bindParam(':reprice', $newPrice);
    $updateQuery->bindParam(':itemName', $itemName);

    $updateQuery->execute();
}