<?php
session_start();



$json = $_POST["tiedot"];
$tiedot = json_decode($json, false);
$firstname = $tiedot->firstname;
$lastname = $tiedot->lastname;
$username = $tiedot->username;
$password = $tiedot->password;
$password2 = $tiedot->password2;
$ok = "Kaikki meni hyvin!!!!";


    $con = mysqli_connect("localhost","trtkp20a3","trtkp20a3passwd");
if(!$con){
    die("Ei voida yhdistää tietokantaan:" .mysql_error());
}
    $db = mysqli_select_db($con, "trtkp20a3");


if(!isset($firstname) || !isset($lastname) || !isset($username) || !isset($password) || !isset($password2) ||
empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($password2)){
    $ok = "Ole hyvä ja täytä kaikki kentät!";
    print $ok;
    return;
}

if ($password != $password2) {
	$ok = "Salasanat eivät täsmää!!";
    print $ok;
    return;
  }

   $user_check_query = "SELECT * FROM laura_register WHERE username='$username' LIMIT 1";
   $result = mysqli_query($con, $user_check_query);
	$row = mysqli_fetch_assoc($result);

	if ($row['username'] == $username) {
		$ok = "Käyttäjänimi on jo olemassa!!!";
       		print $ok;
         	return;
}
 
 if($password == $password2){
    $password1 = md5($password);

  	$query = "INSERT INTO laura_register(username, pw, firstname, lastname) 
  			  VALUES(? , ? , ? , ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $username, $password1, $firstname, $lastname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
  
  	// $_SESSION['username'] = $username;
  	// $_SESSION['success'] = "Olet nyt rekisteröitynyt!!";
	 $ok ="index.html";
     print $ok;
 
     
 }








?>