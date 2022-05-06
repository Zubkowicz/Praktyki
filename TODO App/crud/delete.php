<?php
    session_start();
    require_once __DIR__.'/../config/database.php';

    if(!isset($_SESSION['logged_id'])){
        header('Location: ../index.php');
    }
    if(!isset($_SESSION['todoid'])){
        header('Location: ../index.php');
    }
    $id=$_GET['id'];
    $deleteQuery=$pdo->query("DELETE FROM todos WHERE id='$id'");
    $deleteQuery->execute();

    header('Location: /TODO App/index.php');
    exit();
