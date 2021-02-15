<?php

session_start();

if(isset($_SESSION["loggedIn"])){
    header(string: "Location: hidden.php");
    exit();
}

if (isset($_POST["logIn"])) {
    $connection= new mysqli(host: "localhost", username:"trtkp20a3", password:"trtkp20a3passwd", dbname: "trtkp20a3");
    $username = ($connection->real_escape_string($_POST["usernamePHP"]));
    $password = ($connection->real_escape_string($_POST["passwordPHP"]));

    $data = $connection->query(query: "SELECT ID FROM sampo20100_register WHERE username="$username" AND password ="$password"");
    if ($data->num_rows >0){
        $_SESSION["username"] = $username;
		$_SESSION["loggedIn"] = 1;


        exit("Onnistui");
    }else{
        exit("Epäonnistui");

  


}
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="login.php" method="POST">

<input type="text" name="username" id="username">
<input type="password" name="password" id="password">

<input type="submit" name="submit" value="login" id="login">


</form>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript">

$(document).ready(function(){

$("#login").on('click', function(){
    var username = $("#username").val();
    var password = $("#password").val();

    if (username == "" || password == "")
        alert("Täytä kentät");
    else{
    $.ajax(
    {
            url: "login.php",
            method:"POST",
            data:{
                login: 1,
                usernamePHP: username,
                passwordPHP: password



            },
            success: function(response){
                $("#response").html(response);

                if(response.indexOf('success') >=0)
                    window.location='hidden.php';
                    

            },
            dataType: 'text'


    }

);
}
});
});



</script>



</body>
</html>