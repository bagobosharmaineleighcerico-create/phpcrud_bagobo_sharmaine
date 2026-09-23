<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="login-container">

    <h1>Login</h1>
    <p>Employee Records</p>

    <input type="text" id="username" placeholder="Username">

    <input type="password" id="password" placeholder="Password">

    <div class="show-password">
        <input type="checkbox" onclick="showPassword()">
        Show Password
    </div>

    <button type="button" onclick="login()">Login</button>

</div>

<script src="script.js"></script>

</body>
</html>