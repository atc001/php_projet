<?php ?>

<h2>Login :</h2>
<form method="post" action="function/login.php">
    <label>User :</label>
    <input type="text" name="username" required="true">

    <label>Password :</label>
    <input type="password" name="password" required="true">

    <input type="submit" value="login">
</form>

<h2>Register :</h2>
<form method="post" action="function/register.php">
    <label>User :</label>
    <input type="text" name="username" required="true">

    <label>Password :</label>
    <input type="password" name="password" required="true">

    <input type="submit" value="register">
</form>
