<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> About - Client area</title>

</head>
<script>
    function game() {
        window.location.href = "dashboard.php";
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
    }

    .button:hover {
        background-color: #3e8e41
    }

    .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    body {
        background-image: url("image/about.png");
        background-size: cover;
    }

    .buttonGrid {
        display: flex;
        justify-content: center;
        margin-top: 275px;
        margin-left: 20%;
    }
</style>

<body>


    <div class="buttonGrid">
        <div>
            <a href="levels.php"><input type="button" class="button button1" value="START" ></br></br></a>
            <span></span>
            <span></span>

            <a href="how_to_play.php"><input type="button" class="button button1" value="HOW TO PLAY"></br></br></a>
            <span></span>
            <span></span>
            <a href="lboard.php"><input type="button" class="button button1" value="LEADER BOARD"></br></br></a>
            <span></span>
            <span></span>
            <p><a href="home.php"><input type="button" class="button button1" value="LOGOUT">
                </a></p>
        </div>

    </div>

</body>

</html>