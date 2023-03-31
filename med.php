<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Root Game</title>
</head>

<style>
    body {
        background-image: url("image/medium.png");
        background-size: cover;
    }

    .timing {
        margin-left: 276px;
        margin-top: -93px;
        font-size: xxx-large;
    }

    .questPhoto {
        margin-left: 45%;
        margin-top: 160px;
    }

    .solution {
        margin-top: 92px;
        margin-left: 95px;
    }

    .showMarks {
        margin: 20px;
        margin-left: 445px;
        margin-top: 22px;
        font-size: xxx-large;
    }

    .div {
        text-align: center;
        font-size: 30px;
        color: white;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 500px;
        width: 30%;
    }

    .one {

        float: left;
        margin-top: 20%;
    }

    .two {

        float: right;
        margin-top: 13%;
        margin-right: 150px;
    }

    .three {

        float: inline-end;

    }

    .inputAns {
        outline-style: none;
        fill: none;
        opacity: 0.5;
        font-size: xxx-large;
        height: 56px;
        width: 180px;
        border-radius: 32px;
    }



    /* CSS */
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

    .button-73:hover {
        background-color: #FFC229;
        box-shadow: #FF6314 0 -6px 8px inset;
        transform: scale(1.125);
    }

    .button-73:active {
        transform: scale(1.025);
    }

    @media (min-width: 768px) {
        .button-73 {
            font-size: 1.5rem;
            padding: .75rem 2rem;
        }
    }


    /* CSS */
    .button-92 {
        --c: #fff;
        /* text color */
        background: linear-gradient(90deg, #0000 33%, #fff5, #0000 67%) var(--_p, 100%)/300% no-repeat,
            #004dff;
        /* background color */
        color: #0000;
        border: none;
        transform: perspective(500px) rotateY(calc(20deg*var(--_i, -1)));
        text-shadow: calc(var(--_i, -1)* 0.08em) -.01em 0 var(--c),
            calc(var(--_i, -1)*-0.08em) .01em 2px #0004;
        outline-offset: .1em;
        transition: 0.3s;
    }

    .button-92:hover,
    .button-92:focus-visible {
        --_p: 0%;
        --_i: 1;
    }

    .button-92:active {
        text-shadow: none;
        color: var(--c);
        box-shadow: inset 0 0 9e9q #0005;
        transition: 0s;
    }

    .button-92 {
        font-weight: bold;
        font-size: 2rem;
        margin: 0;
        cursor: pointer;
        padding: .1em .3em;
    }
</style>

<body>
    <p><a href="levels.php"><button class="button-73" role="button">Back</button></a></p>


    <div class="one">
        <div class="timing">
            <div id="timer">
                15 seconds
            </div>
        </div>

        <div class="solution">
            <input class="inputAns" type="number" id="myInput" />

            <button class="button-92" role="button" onclick="checkAnswer()">Check</button>

        </div>
        <div class="showMarks">
            <div id="marks">
                0
            </div>
        </div>
    </div>
    <div class="two">
         <div> <h2 class="h2-62" id="note">Root quest is ready</h2></div>
        <div id="question"></div>
    </div>


    <script>
        loadGame();
        var count = 4;
        var timerElement = document.getElementById("timer");
        var markcElement = document.getElementById("marks");
        var timeLeft = 15;
        var answer = 0;
        var marks = 0;

        function updateTimer() {
            var input = document.getElementById("myInput");
            if (count > 0) {
                timeLeft -= 1;
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);

                    timerElement.textContent = "0" + " seconds";
                    resetTimer();
                } else {
                    timerElement.textContent = timeLeft + " seconds";
                }
            } else {
                timerElement.textContent = "0" + " seconds";
                timerElement.textContent = "Time is up!";
                input.value = "";
                input.disabled = true;
            }
        }
        var timerInterval = setInterval(updateTimer, 1000);

        function resetTimer() {
            var input = document.getElementById("myInput");
            timeLeft = 15;
            count--;
            if (count > 0 || timeLeft == 0) {
                loadGame();
                clearInterval(timerInterval);
                timerInterval = setInterval(updateTimer, 1000);
                timerElement.textContent = timeLeft + " seconds";
            } else {
                timerElement.textContent = "Game Over!";
                input.value = "";
                input.disabled = true;
                 setTimeout(scorePage, 2000)
            }
        }

        function loadGame() {
            var note = document.getElementById("note");
            note.innerHTML = "Quest is ready.";
            let api = "https://marcconrad.com/uob/smile/api.php";
            let questionDiv = document.getElementById("question");
            fetch(api)
                .then((response) => response.json())
                .then((data) => {
                    questionDiv.innerHTML = "<img src='" + data.question + "'>";
                    answer = data.solution;
                    console.log(data);
                });
        }

        function checkAnswer() {
            var input = document.getElementById("myInput").value;
            var note = document.getElementById("note");
            if (input == answer) {
                 note.innerHTML = 'Correct!';
                marks++;
                markcElement.textContent = marks + "/4";
                resetTimer();
            } else {
                note.innerHTML = 'Incorrect!, try again ';
            }
        }

        function scorePage() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.href = "lboard.php";
                }
            };
            finalScore=marks+"/4";
            xhttp.open("POST", "insertScore.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var data = "finalMarks=" + finalScore + "&finalLevel=" + "Medium";
            xhttp.send(data);
          
        }
    </script>
    <div class="three">

    </div>

</body>

</html>