<?php
    session_start();
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jeremy Dulon">
    <title>Nov'yperplanning</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/css/index.css" rel="stylesheet">
</head>

<?php if (isset($_SESSION['user']))
    include_once 'view/gestion.php';

else
    include_once 'view/login.php'; ?>