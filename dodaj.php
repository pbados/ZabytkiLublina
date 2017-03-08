<?php 
session_start(); 
if (!isset($_SESSION['zalogowany'])){ 
  header("Location: adminreserved.php"); 
 exit(); 
} 
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>Wyszukiwarka zabytków Lublina</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="strona.php">ZABYTKI LUBLINA</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="strona.php">STRONA GŁÓWNA</a></li>
      <li><a href="lublin.php">LUBLIN</a></li>
      <li><a href="zabytki.php">OGÓLNIE O ZABYTKACH</a></li>
        <li><a href="lista.php">LISTA ZABYTKÓW</a></li>
        <li><a href="wyszukiwarka.php">WYSZUKIWARKA</a></li>
        <li class="active"><a href="paneladmina.php">PANEL ADMINISTRATORA</a></li>
        <li><a href="wyloguj.php">WYLOGUJ SIĘ</a></li>
    </ul>
  </div>
</nav>


<main>
    <font color="red"><b><center>Panel administratora</center></b></font>
    <center><a href="paneladmina.php">Panel główny</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="formdodaj.php">Dodaj zabytek</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="formedytuj.php">Edytuj zabytek</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="formusun.php">Usuń zabytek</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="dodajzdjecie.php">Dodaj zdjęcie</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="usunzdjecie.php">Usuń zdjęcie</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="wyloguj.php">Wyloguj się</a></center>
    <hr>
    <?php
    
$nazwa=$_POST['nazwa'];
$adres=$_POST['adres'];
$opis=$_POST['opis'];
$latabudowy=$_POST['latabudowy'];
$styl=$_POST['styl'];
$dzielnica=$_POST['dzielnica'];
$szerokosc=$_POST['szerokosc'];
$dlugosc=$_POST['dlugosc'];
$zdjecie=$_POST['zdjecie'];

$con = mysqli_connect("localhost", "pbados", "pbados", "pbados_zabytki");
mysqli_set_charset($con, 'utf8');

$que = "INSERT INTO zabytki (nazwa,adres,opis,latabudowy,styl,dzielnica,szerokosc,dlugosc,zdjecie) VALUES ('$nazwa','$adres','$opis','$latabudowy','$styl','$dzielnica','$szerokosc','$dlugosc','$zdjecie')";
mysqli_query($con, $que);


mysqli_close($con);

?><h2><center>Dodaj nowy zabytek do bazy</center></h2>
    <b>Zabytek dodano do bazy.</b><br>
    <hr>
    Wgraj zdjęcie do dodanego zabytku.<br>
    <form name = "formularz1" enctype = "multipart/form-data" action = "dodajzdj.php" method = "POST">
<table>
<tr>
<td>Nazwa pliku:</td>
<td>
<input type = "file" name = "plik" size = "300" value = "">
</td>
<td align = "left">
  <input type = "submit" name = "wyslij" value = "Wyślij plik">
</td>
</tr>
</table>
    
    
    <a href="paneladmina.php">Powrót do panelu administratora.</a>
</main>



<footer>
Patryk Bądos, praca licencjacka - UMCS, Wydział Matematyki, Fizyki i Informatyki.
</footer>


</body>
</html>