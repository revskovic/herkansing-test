<?php
session_start();
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welkom op mijn onderwijsplatform.">
    <meta name="robots" content="index, follow">
    <title>Welkom bij Mijn Onderwijsplatform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: inline-block;
        }
        nav a:hover {
            background-color: #575757;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Homepagina</a>
        <a href="cursussen.php">Cursussen</a>
        <a href="studenten.php">Studenten</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div class="container">
        <h1>Welkom bij Mijn Onderwijsplatform</h1>
        <p>Gebruik de navigatie om door de verschillende secties van het platform te bladeren. Hier kunt u cursussen beheren, studenten bijhouden en inschrijvingen beheren.</p>
        <img src="images/education.jpg" alt="Onderwijs" style="width:100%; height:auto;">
    </div>
</body>
</html>

