<?php


require "./database/connection.php";

function getAllProducts()
{
    global $pdo;
    $sql = "SELECT * FROM product";
    $stm = $pdo->query($sql);
    
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function addProduct($data)
{
    global $pdo;
    $sql = "INSERT INTO product(img, price, description, category) VALUES(?,?,?,?)";

    $stm = $pdo->prepare($sql);
    if($stm->execute($data)) return TRUE;
    else return FALSE; 
}
 
function deleteProduct($id)
{
    global $pdo;
    $sql = "DELETE FROM product WHERE productid=?";
    $stm=$pdo->prepare($sql);
    $stm->bindValue(1,$id);
    if($stm->execute()) return TRUE;
    else return FALSE;    
}


function getProductByPrice($price)
{
    global $pdo;

    $sql = "SELECT * FROM product WHERE price=?";

    $stm= $pdo->prepare($sql);
    $stm->bindValue(1,$price);
    $stm->execute();

    $product = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $product;
}

function getProductById($id)
{
    global $pdo;

    $sql = "SELECT * FROM product WHERE productid=?";

    $stm= $pdo->prepare($sql);
    $stm->bindValue(1,$id);
    $stm->execute();

    $product = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $product;
}

function editProduct($data)
{
    global $pdo;
    $sql = "UPDATE product SET img=?, price=?, description=?, category=? WHERE productid=?";

    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}
?>