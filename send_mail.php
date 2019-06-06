<?php

$email = $_POST["user_mail"];
$message = $_POST["user_message"];

// begin validating email
if(empty($email))
{
    echo "
    <div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times</a><b>Please enter your email...!</b>
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
        <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times</a><b>This $email is not valid.</b>
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
    <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times</a><b>Please tell me a litle about your project.</b>
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
?>