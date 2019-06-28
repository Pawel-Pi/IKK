<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
 <header id="header">
   <div class="container">
     <h1><?php echo SITENAME; ?></h1>
     <a href="<?php echo URLROOT.'/users/register'; ?>">Rejestracja</a> 
     <a href="<?php echo URLROOT.'/users/login'; ?>">Logowanie</a>
   </div>
 </header>
 <?php include_once APPROOT.'/views/inc/navbar.php'; ?>
 
 
    
