<?php


require "./database/connection.php";

function getAllEvents()
{
    global $pdo;
    $sql = "SELECT * FROM fleemarket WHERE isactive=1";
    $stm = $pdo->query($sql);
    
    $events = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $events;
}

function addEvent($data)
{
    global $pdo;
    $sql = "INSERT INTO fleemarket (date, duration, startingtime, carslot, blanket) VALUES(?,?,?,?,?)";

    $stm=$pdo->prepare($sql);
    if($stm->execute($data)) return TRUE;
    else return FALSE;    
}

function deleteEvent($id)
{
    global $pdo;
    $sql = "DELETE FROM fleemarket WHERE marketid=?";
    $stm=$pdo->prepare($sql);
    $stm->bindValue(1,$id);
    if($stm->execute()) return TRUE;
    else return FALSE;    
}


function getEventByDate($date)
{
    global $pdo;

    $sql = "SELECT * FROM fleemarket WHERE date=?";

    $stm= $pdo->prepare($sql);
    $stm->bindValue(1,$date);
    $stm->execute();

    $date = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $date;
}

function getEventById($id)
{
    global $pdo;

    $sql = "SELECT * FROM fleemarket WHERE  marketid=?";

    $stm= $pdo->prepare($sql);
    $stm->bindValue(1,$id);
    $stm->execute();

    $date = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $date;
}

function editEvent($data)
{
    global $pdo;
    $sql = "UPDATE fleemarket SET date = ?,duration = ?, startingtime=?, carslot=?, blanket=?, isactive=? WHERE  marketid = ?";

    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}
?>