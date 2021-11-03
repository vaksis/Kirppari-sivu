<?php


require "./database/connection.php";

function getAllUsers()
{
    global $pdo;
    $sql = "SELECT * FROM user";
    $stm = $pdo->query($sql);
    
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function addUser($data)
{
    global $pdo;
    $sql = "INSERT INTO user(username, email, password) VALUES(?,?,?)";

    $stm = $pdo->prepare($sql);
    if($stm->execute($data)) return TRUE;
    else return FALSE; 
}
 
function deleteUser($id)
{
    global $pdo;
    $sql = "DELETE FROM user WHERE userid=?";
    $stm=$pdo->prepare($sql);
    $stm->bindValue(1,$id);
    if($stm->execute()) return TRUE;
    else return FALSE;    
}


function loginUser($username, $password)
{
    global $pdo;

    $sql = "SELECT userid,username, password FROM user WHERE username=?";

    $stm= $pdo->prepare($sql);
    $stm->bindValue(1,$username);
    $stm->execute();

    $user = $stm->fetchAll(PDO::FETCH_ASSOC);
    if($user) {
        if(password_verify($password,$user[0]["password"])) {
            return TRUE;
        } else return FALSE;
    } else return FALSE;
}

function getUserByName($username)
{
    global $pdo;

    $sql = "SELECT * FROM user WHERE username=?";

    $stm= $pdo->prepare($sql);
    $stm->bindValue(1,$username);
    $stm->execute();

    $user = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $user;
}

function getUserById($id)
{
    global $pdo;

    $sql = "SELECT * FROM user WHERE userid=?";

    $stm= $pdo->prepare($sql);
    $stm->bindValue(1,$id);
    $stm->execute();

    $users = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function editUser($data)
{
    global $pdo;
    $sql = "UPDATE user SET username = ?,email = ? WHERE userid = ?";

    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}
?>