<?php
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$message = $_REQUEST['message'];


$myUrl = "https://htmlprojekti.000webhostapp.com/#"

if (empty($name) || empty($email) || empty($message))
  {
      echo ('Please fill all the fields');
  }  
else
{
    mail("jeres.angels123@gmail.com", "Lomailu Message", $message , "From: $name  <$email>" );
    echo "<script type='text/javascript'>alert('Your message was sent succsefully!');
    window.location.href = '$myUrl';
    </script>";
}
?>