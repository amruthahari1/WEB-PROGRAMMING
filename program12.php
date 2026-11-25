<?php
$errors = [];
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$phone = $_POST["phone"] ?? "";
$password = $_POST["password"] ?? "";
$confirm = $_POST["confirm"] ?? "";
if (empty(trim($name)))
    $errors["name"] = "Name is required";
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors["email"] = "Enter valid email";
if (!preg_match("/^[0-9]{10}$/", $phone))
    $errors["phone"] = "Enter 10 digits";
if (strlen($password) < 6)
    $errors["password"] = "Minimum 6 characters required";
if ($password != $confirm)
    $errors["confirm"] = "Password does not match";
if (empty($errors))
    $success = "Registration Successful!";
}
?>
<html>
<head>
<title>Registration Form</title>
<style>
body {font-family: Arial;background:#F8FAFC;
}
form {background: white;width: 350px;margin: 50px auto;padding: 20px;border: 1px solid gray;border-radius: 10px;
}
h2 {color: #1E293B;text-align: center;
}
input {width: 95%;padding: 7px;margin: 5px 0;
}
.error {
color: red;font-size: 12px;
}
.success {color: #1E293B;text-align: center;
}
button {background: #1E293B;color: white;padding: 8px;border: none;width: 100%;
}
</style>
</head>
<body>
<form method="POST" onsubmit="return validateForm()">
<h2>Registration Form</h2>
<h3 class="success"><?php echo $success; ?></h3>
Name:<br>
<input type="text" name="name" id="name"
onblur="checkName()">
<span class="error" id="nameError">
<?php echo $errors["name"] ?? ""; ?>
</span><br>
Email:<br>
<input type="text" name="email" id="email"
onblur="checkEmail()">
<span class="error" id="emailError">
<?php echo $errors["email"] ?? ""; ?>
</span><br>
Phone:<br>
<input type="text" name="phone" id="phone"
maxlength="10" onblur="checkPhone()">
<span class="error" id="phoneError">
<?php echo $errors["phone"] ?? ""; ?>
</span><br>
Password:<br>
<input type="password" name="password" id="password"
onblur="checkPassword()">
<span class="error" id="passwordError">
<?php echo $errors["password"] ?? ""; ?>
</span><br>
Confirm Password:<br>
<input type="password" name="confirm" id="confirm"
onblur="checkConfirm()">
<span class="error" id="confirmError">
<?php echo $errors["confirm"] ?? ""; ?>
</span><br><br>
<button type="submit">Register</button>
</form>
</body>
</html>
