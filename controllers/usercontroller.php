<?php
require "./database/models/product.php";
require "./database/models/reservation.php";
require "./database/models/fleemarket.php";
require "./database/models/user.php";
require "./helpers/helper.php";


//Products controllers
function productController()
{
    $products= getAllProducts();
    require "./views/products.view.php";
}


//Index controllers
function  indexcontroller()
{
    $users = getAllUsers();
    require "./views/index.view.php";
}

//Event controllers
function eventcontroller()
{
    $events = getAllEvents();
    require "./views/events.php";

}


//reservation controllers
function reservationcontroller()
{
    $MarketInfo = getAllEvents();
    $activeMarketId = $MarketInfo[0]["marketid"];
    $allreserved =  getAllReservations($activeMarketId);
    
    if(isset($_SESSION["userid"], $_POST["type"], $_POST["slotnumber"]))
    {
        $userid = $_SESSION["userid"];
        $type = sanit($_POST["type"]);
        $slotnumber = sanit($_POST["slotnumber"]);

        $reservationData = array($userid, $type, $slotnumber);
        //var_dump($reservationData, $MarketInfo);
        //KESKEN VIEL TEE VARAUKSEN POISTO
        try{
            if(addReservation($reservationData, $activeMarketId)){
                require "./views/signedUser.view.php";
            }else {
                $message="varauksen liääminen kantaan ei onnistu";
                require "./views/reservation.view.php";
            }
            } catch (PDOException $e) {
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();

            $message ="lomakkeen tiedot eivät ole kunnossa";
            require "./views/reservation.view.php";
        }
        
    }else {
        require "./views/reservation.view.php";
    }
    
}


function postregister()
{
    if(isset($_POST["username"], $_POST["email"], $_POST["password"], $_POST["password2"]) && $_POST["password"]==$_POST["password2"])
    {
        $username = sanit($_POST["username"]);
        $email = sanit($_POST["email"]);
        $password = password_sanit($_POST["password"]);

        $data = array($username, $email, $password);
        //var_dump($data);

        if(addUser($data)){
            indexcontroller();
        }else {
            $message="käyttäjän liääminen kantaan ei onnistu";
            require "./views/registerform.view.php";
        }
    }else{
        $message ="lomakkeen tiedot eivät ole kunnossa";
        require "./views/registerform.view.php";
    }
    
}


function postlogin()
{
    //echo "post login controller";
    if(isset($_POST["username"],$_POST["password"])) {
        $username = sanit($_POST["username"]);
        //echo $username;
        $password = trim($_POST["password"]);
        //echo $password;

        //haetaan kannasta tietue, jossa ovat samat
        $ok = loginUser($username,$password);
        if($ok) {
            $username = getUserByName($username);
            $id = $username[0]["userid"];
            $ip = $_SERVER["REMOTE_ADDR"];


            $_SESSION["userid"] = $id;
            $_SESSION["ip"] = $ip;

            $users = getAllUsers();
            require "./views/signedUser.view.php";
        } else {
            $message ="Käyttäjää ei löydy";
            require "./views/loginform.view.php";
        }


    } else {
        $message ="Käyttäjätunnus tai salasana puuttuu!";
        require "./views/loginform.view.php";
    }
}

function logout()
{
    if(isset($_SESSION["ip"],$_SESSION["userid"]))
    {
        session_unset(); //poistaa kaikki istuntomuuttujat
        session_destroy(); //poistaa koko istunnon
        header("Location:./index.php");
    }
}
