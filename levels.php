<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Instruction - Client area</title>

</head>
<script>
    function easy() {
        window.location.href = "easy.php";
    }

    function med() {
        window.location.href = "med.php";
    }

    function hard() {
        window.location.href = "hard.php";
    }
</script>
<style>
    .button {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        margin: 5px;
    }

    .button:hover {
        background-color: #3e8e41
    }

    .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);

    }

    .button-73 {
        appearance: none;
        background-color: #FFFFFF;
        border-radius: 40em;
        border-style: none;
        box-shadow: #ADCFFF 0 -12px 6px inset;
        box-sizing: border-box;
        color: #000000;
        cursor: pointer;
        display: inline-block;
        font-family: -apple-system, sans-serif;
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: -.24px;
        margin: 0;
        outline: none;
        padding: 1rem 1.3rem;
        quotes: auto;
        text-align: center;
        text-decoration: none;
        transition: all .15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    body {
        background-image: url("image/ready.png");
        background-size: cover;
    }

    .buttonGrid {
        display: flex;
        justify-content: center;
        margin-top: 290px;
        margin-left: 27%;

    }

    .userName {
        margin-top: 155px;
        margin-left: 25%;
    }
</style>


<body>
    <div class="userName">
        <p><b>
                <h2>Hey I'm, <?php echo $_SESSION['username']; ?>!</h2>
            </b></p>

    </div>
    <div class="buttonGrid">

        <input type="button" class="button button1" value="EASY" onclick="easy()"></br></br>
        <input type="button" class="button button1" value="MEDIUM" onclick="med()"></br></br>
        <input type="button" class="button button1" value="HARD" onclick="hard()">
    </div>
</body>

</html>
<h3><a href="about.php"><button class="button-73" role="button">Back</button></a></h3>