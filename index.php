<?php
session_start();


require_once "env.php";

if(isset($_GET["action"])) $action = $_GET["action"];
else $action ="index";

$method = strtolower($_SERVER["REQUEST_METHOD"]);


require "./controllers/usercontroller.php";
require "./helpers/auth.php";

switch($action) {
    case "index":
    indexcontroller();
    break;

    case "register":
    if($method=="get") require "./views/registerform.view.php";
    else postregister();
    break;

    case "login":
    if($method=="get") require "./views/loginform.view.php";
    else postlogin();
    break;

    case "logout":
    if(islogged()) logout();
    else indexcontroller();
    break;


    case "admin":
    if(islogged()) 
    admincontroller();
    else require "./views/loginform.view.php";
    break;

    case "delete":
    //echo $_SESSION["id"];
    //echo $_SESSION["ip"];
    if(islogged()) deletecontroller();
    else require "./views/loginform.view.php";
    break;

    case "edit":
    if(islogged()) {
        if($method=="get")
        geteditcontroller();
        else posteditcontroller();
    }
    else require "./views/loginform.view.php";
    break;

    case "events":
    eventcontroller();
    break;

    case "reservation":
        if(islogged($method=="get")) reservationcontroller();
        else indexcontroller();
    break;

    case "products":
    productController();
    break;



    default:
    echo "404";
}
