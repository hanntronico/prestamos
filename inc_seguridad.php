<?php 

session_start(); 

    // echo "cod: ".$_SESSION["s_cod"];
    // echo "tipo: ".$_SESSION["s_tipo"];
    // exit();

    if (!isset($_SESSION["s_cod"]))
    {
        // header("location: ../../");
        header("location: index.php");
        exit;
    }
    if (!isset($_SESSION["s_tipo"]))
    {
        // header("location: ../../");
        header("location: index.php");
        exit;
    }
?>