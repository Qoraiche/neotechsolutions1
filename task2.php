<?php

require_once('config/db.php');

$sql = "select * from recipes where exists (select * from ingredients where recipes.id = ingredients.recipeId) and name = :name";
$query = $database->prepare($sql);
$name = 'tuna';

$query->bindParam(':name', $name);
$query->execute();

$recipes = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($recipes as $recipe) {
        increaseRecipeCost($recipe->id, $recipe->cost, 2.00);
    }
}

/**
 * @param int $id
 * @param int $cost
 * @param int $percentage
 */
function increaseRecipeCost(int $id, int $cost, int $increase)
{
    global $database;

    $additionalCost = $cost + $increase;

    $updateQuery = $database->prepare('update recipes SET cost = :additionalcost where id = :id');
    $updateQuery->bindParam(':additionalcost', $additionalCost);
    $updateQuery->bindParam(':id', $id);

    $updateQuery->execute();
}