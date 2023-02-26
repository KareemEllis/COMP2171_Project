<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submission</title>

    <style>
        @import url("https://fonts.googleapis.com/css?family=Lato:400,700");
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: 'Lato', sans-serif;
        }
        div{
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .svg{
            width: 100%;
            height: 200px;
        }
    </style>
</head>
<body>
    <div>
        <lottie-player class="svg" src="https://assets3.lottiefiles.com/packages/lf20_pqnfmone.json"  background="transparent"  speed="1" autoplay></lottie-player>
        <h1>Thank you!</h1>
        <p>Your application has been submitted.</p>

        <a href="./index.php">Go back to Home</a>
    </div>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>