<?php 
    SESSION_START();
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
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
    <?php include "layout/header.html" ?>

    <h3>Selamat Datang <?= $_SESSION["username"] ?></h3>

    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">logout</button>
    </form>

    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
 

    <?php include "layout/footer.html" ?>

    <style>
        body {
            background: url("https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80") no-repeat center center fixed;
            background-size: cover;
        }     
        
button {
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

button::after {
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
button::before {
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

button:hover::before {
    opacity: 1;
}

button:active::after {
    background: transparent;
}

button:active {
    color: black;
    font-weight: bold;
}
    </style>
</body>
</html>