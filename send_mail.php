<?php
$firstName = $_POST["username"];
$email = $_POST["user_mail"];
$message = $_POST["user_message"];

// begin validating name
if(empty($firstName))
{
    echo "
    <div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times</a>Pleasse enter your name...!
    </div>
    ";
    exit();
}
else
{
    //validate method for fields
    $firstName = test_input($firstName);
    // check if name contains letters and white space
    if(!preg_match("/^[a-zA-Z ]*$/", $firstName))
    {
        echo "
        <div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times</a>This $firstName is not valid...!
        </div>
        ";
        exit();
    }
}
// begin validating email
if(empty($email))
{
    echo "
    <div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times</a>Please enter your email...!
    </div>
    ";
    exit();
}
else
{
    //validate method for field
    $email = test_input($email);
    // check if name contains letters and white space
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "
        <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times</a>This $email is not valid.
        </div>
        ";
        exit();
    }
}
// end validating email

if (empty($message))
{
    echo "
    <div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times</a>Please tell me a litle about your project.
    </div>
    ";
    exit();
}

// validate fields
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$to = "mcmalindi@gmail.com";
$subject = "My Projects";
$from = "From: ".$email."\r\n";
$user_message = "
<html>
<head>
<title>Hello </title>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
body
{
color: #505962;
font-family: 'Roboto', sans-serif;
padding: 50px;
}
.names
{
font-weight: 300;
text-transform: bold;
color: green;
}

</style>
</head>
<body>
<div>
<h2 style='text-align: center'>My Projects</h2>
<table>
<tr><td>From: <span class='names'>$from</span></td></tr>
<tr><td>Name: <span class='names'>$firstName</span></td></tr>
</table>
<p>
$message
</p>
</div>
</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= $from;

$sent = mail($to, $subject, $user_message, $headers);
if($sent)
{
    echo "
    <div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>Message send successfully, I'll contact you soon. Thanky'
    </div>
    ";
}
else
{
    echo "
    <div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>There has been an error sending your message. Please try again later.'
    </div>
    ";
}
?>