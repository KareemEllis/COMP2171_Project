<?php

session_start();

//Check if user is logged in. If logged in, redirect to dashboard.
// if(!isset($_SESSION['id'])){
//     session_destroy();
//     header('Location: index.php');
//     exit;
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/login.css">

    <script src="./js/login.js"></script>
</head>
<body>
    <div class="container">
        <main>

            <section class="left">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player class="svg" src="https://assets2.lottiefiles.com/private_files/lf30_m6j5igxb.json"  background="transparent"  speed="1"  style="width: 80%; height: 80%;"  loop  autoplay></lottie-player>
            </section>

            <section class="right">
                <img src="../resources/logo.png" alt="George Alleyne Hall logo">
                <h1>Sign In</h1>

                <form method="post">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                    <div class="msg username-msg hide">
                        <i class="material-icons">&#xe000;</i>
                        <p>Enter a username</p>
                    </div>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <div class="msg password-msg hide">
                        <i class="material-icons">&#xe000;</i>
                        <p>Enter a password</p>
                    </div>

                    <div class="msg general-msg hide">
                        <i class="material-icons">&#xe000;</i>
                        <p>Username or Password Inccorect</p>
                    </div>

                    <button type="submit">
                        <p>Sign In</p>
                        <svg class="loading hide" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <style>
                                .spinner_GmWz{animation:spinner_Ctle .8s linear infinite;animation-delay:-.8s}.spinner_NuDr{animation-delay:-.65s}.spinner_OlQ0{animation-delay:-.5s}@keyframes spinner_Ctle{93.75%,100%{opacity:.2}}
                            </style><rect class="spinner_GmWz" x="1" y="4" width="6" height="14"/><rect class="spinner_GmWz spinner_NuDr" x="9" y="4" width="6" height="14"/>
                            <rect class="spinner_GmWz spinner_OlQ0" x="17" y="4" width="6" height="14"/>
                        </svg>

                    </button>
                </form>

                <div class="link">
                    <p>Apply for Accomodation</p>
                    <a href="./applicationForm.php">here</a>
                </div>

            </section>

        </main>
    </div>
</body>
</html>

