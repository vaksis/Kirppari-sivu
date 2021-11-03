<?php


require "./database/connection.php";

function getReservationBySlotNumber($slotnumber)
{
    global $pdo;

    $sql = "SELECT * FROM reservation WHERE slotnumber=?";

    $stm= $pdo->prepare($sql);
    $stm->bindValue(1,$slotnumber);
    $stm->execute();

    $slot = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $slot;
}

function addReservation($reservationData, $activeFleemarketId)
{
    global $pdo;
    $sql = "INSERT INTO reservation(userid, type, slotnumber, marketid) VALUES(?,?,?,$activeFleemarketId)";
    //echo $sql;
    //echo $reservationData;

    $stm = $pdo->prepare($sql);
    if($stm->execute($reservationData)) return TRUE;
    else return FALSE;  
}

function getAllReservations($activeMarketId)
{
    global $pdo;
    $sql = "SELECT slotnumber FROM reservation WHERE type='carslot' AND marketid=?";
    $stm= $pdo->prepare($sql);
    $stm->bindValue(1,$activeMarketId);
    $stm->execute();

    $slot = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $slot;
}
    