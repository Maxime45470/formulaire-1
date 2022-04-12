<?php


if(isset($_POST["submit"])){
$hostname='localhost';
$username='';
$password='';
}  
try {
$dbh = new PDO("mysql:host=$hostname;dbname=db_formulaire;charset=utf8", $username,$password);
  
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 
$stmt -> bindParam(':nom', $_POST["nom"]);
$stmt -> bindParam(':prenom', $_POST["prenom"]);
$stmt -> bindParam(':email', $_POST["email"]);
$stmt -> bindParam(':tel', $_POST["tel"]);
$stmt -> bindParam(':sexe', $_POST["sexe"]);
$stmt -> bindParam(':sujet', $_POST["sujet"]);
$stmt -> bindParam(':mess', $_POST["mess"]);

$stmt->execute();

$stmt = $dbh->prepare("INSERT INTO contact (nom,  prenom, email, tel, sexe, sujet, mess) VALUES (:nom, :prenom, :email, :tel, :sexe, :sujet, :mess)");


 
if ($dbh->query($stmt)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}
 
$dbh = null;




?>
 

 
