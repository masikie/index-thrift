<?php
    include "service/database.php";
    SESSION_START();

    $register_message = "";

    if(isset($_SESSION['is_login'])) {
    header("Location: dashboard.php");
    } 

    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];


        try{
            $sql = "INSERT INTO absen (username, password) VALUES ('$username', '$password')";

            if($db->query($sql)) {
                 $register_message = "Akun berhasil dibuat. Silakan masuk.";
            }else { 
                $register_message = "Gagal membuat akun" ;
            }
        }catch(mysqli_sql_exception) {
            $register_message = "username sudah terdaftar, silahkan ganti yang lain";
        }
        $db->close();
        
    }
          
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="Login-box">
        <h1>Daftar Akun</h1>

        <?php include "layout/header.html" ?>
        <i>     <?= $register_message?></i>
        <form action="register.php" method="POST">
        <div class="usr">    
            <input type="text" placholder="username" name="username" required/><br><br>
            <input type="password" placholder="password" name="password" required/>
        </div><br><br><br>
        <div>
            <button type="submit" name="register" class="btn-login">Daftar Sekarang</button>
        </div><br><br><br><br>
        <div class="forgot">
            <label for="check"><input type="checkbox" id="check">Remember me</label>
                <a href="#">lupa pasword kah...?</a>
        </div>

            <?php include "layout/footer.html" ?>
        </form>
    </div>

    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url(way.jpg) ;
    background-position: center;
    background-size: cover;
    background-position: center;
}

.Login-box {
    width: 400px;
    background: transparent ;
    border: 2px solid #6e768f;
    color: #fff;
    border-radius: 10px;
    padding: 30px 40px;
}

.Login-box h1 {
    text-align: center;
    font-size: 50px;
}

.Login-box .usr {
    width: 100%;
    height: 40px;
    margin: 30px 0;
} 

.usr input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid #8c90aa;
    border-radius: 40px;
    font-size: 16px;
    color: #fff;
    padding: 20px 45px 20px 20px;
}

.usr input::placeholder {
    color: #fff;
}

.Login-box .forgot {
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
}

.forgot input label {
    accent-color: #fff;
    margin-right: 3px;
}

.forgot a {
    color: #fff;
    text-decoration: none;
}

.forgot a:hover {
    text-decoration: underline;
}

.btn-login {
    width: 100%;
    height: 40px;
    border: none;
    outline: none;
    color: #fff;
    font-size: 25px;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 12px;
}

.btn-login::after {
    content: "";
    z-index: -1;
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: #7b7c83;
    left: 0;
    top: 0;
    border-radius: 10px;
}

/* glow */
.btn-login::before {
    content: "";
    background: linear-gradient(45deg, #ff0000, #00ff00, #6363b1, #ffff00, #ff00ff, #00ffff, #ff7300, #ff0073 );
    position: absolute;
    top: -2px;
    left: -2px;
    background-size: 600%;
    z-index: -1;
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    filter: blur(8px);
    animation: glowing 20s linear infinite;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
    opacity: 1;
}

@keyframes glowing {
    0% {background-position: 0% 0%;}
    50% {background-position: 400% 0%;}
    100% {background-position: 0% 0%;}
}

.btn-login:hover::before {
    opacity: 1;
}

.btn-login:active::after {
    background: transparent;
}

.btn-login:active {
    color: black;
    font-weight: bold;
}


@media (max-width: 600px) {
    .Login-box {
        width: 90%;
        height: auto;
        padding: 20px;
    }

    .Login-box h2 {
        font-size: 24px;
    }

    .input-text, .btn-login {
        padding: 8px;
        margin: 8px 0;
    }
}

@media (max-width: 400px) {
    .Login-box {
        width: 100%;
        height: auto;
        padding: 15px;
    }

    .Login-box h2 {
        font-size: 20px;
    }

    .input-text, .btn-login {
        padding: 6px;
        margin: 6px 0;
    }
}

@media (max-width: 300px) {
    .Login-box {
        width: 100%;
        height: auto;
        padding: 10px;
    }

    .Login-box h2 {
        font-size: 18px;
    }

    .input-text, .btn-login {
        padding: 5px;
        margin: 5px 0;
    }
}

@media (max-width: 200px) {
    .Login-box {
        width: 100%;
        height: auto;
        padding: 5px;
    }

    .Login-box h2 {
        font-size: 16px;
    }

    .input-text, .btn-login {
        padding: 4px;
        margin: 4px 0;
    }
}

@media (max-width: 100px) {
    .Login-box {
        width: 100%;
        height: auto;
        padding: 2px;
    }

    .Login-box h2 {
        font-size: 14px;
    }

    .input-text, .btn-login {
        padding: 2px;
        margin: 2px 0;
    }
}

@media (max-width: 50px) {
    .Login-box {
        width: 100%;
        height: auto;
        padding: 1px;
    }

    .Login-box h2 {
        font-size: 12px;
    }

    .input-text, .btn-login {
        padding: 1px;
        margin: 1px 0;
    }
}

@media (max-width: 25px) {
    .Login-box {
        width: 100%;
        height: auto;
        padding: 0;
    }

    .Login-box h2 {
        font-size: 10px;
    }

    .input-text, .btn-login {
        padding: 0;
        margin: 0;
    }
}

@media (max-width: 10px) {
    .Login-box {
        width: 100%;
        height: auto;
        padding: 0;
    }

    .Login-box h2 {
        font-size: 8px;
    }

    .input-text, .btn-login {
        padding: 0;
        margin: 0;
    }
}


    </style>
</body>
</html>