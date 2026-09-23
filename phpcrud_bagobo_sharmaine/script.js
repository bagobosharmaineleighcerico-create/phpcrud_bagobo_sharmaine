function showPassword() {
    var x = document.getElementById("password");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username === "leigh" && password === "041005") {
        alert("Login Successful! Welcome " + username + "!");
        window.location.href = "index.php";
    } else {
        alert("Invalid Username or Password");
    }
}