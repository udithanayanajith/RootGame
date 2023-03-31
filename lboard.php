<?php 
  $con = mysqli_connect("localhost","root","admin","rootDB");
	$sql = "SELECT * FROM `leaderboard` ";
	$result = mysqli_query($con, $sql);
?>
<style>
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
</style>


<html>
<head>
	<title>Leader Board</title>
	<link rel="stylesheet" type="text/css" href="css/styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	    <p><a href="about.php"><button class="button-73" role="button">Back</button></a></p>
	<header>
		<nav>
			<h1>Leader Board</h1>
			<ul id="navli">
			<li><a class="homeblack" href="index.html"><span style="color:rgb(71, 14, 4);">Home</span></a></li>

				<li><a class="homered" ><span style="color:rgb(71, 14, 4);">Score</span></a></li>
						</ul>
		</nav>
	</header>
	<div class="divider"></div>
	<div id="divimg">
	<div>

		    	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Root Gamers Leaderboard </h2>
    	<table>

			<tr bgcolor="#000">
				<th align = "center">Count</th>
				<th align = "center">Name</th>
				<th align = "center">Marks</th>
				<th align = "center">Level</th>
				

			</tr>
		

			<?php
				$seq = 1;
				$rank=0;
				$row=0;
				$last_score=false;
				while ($employee = mysqli_fetch_assoc($result)) {
					$row++;
					if($last_score!=$employee['marks']){
						$last_score=$employee['marks'];
						$rank=$row;
					}

					echo "<tr>";
					// echo "<td>".$rank."</td>";
					echo "<td>".$employee['ID']."</td>";
					echo "<td>".$employee['userName']."</td>";
					
					echo "<td>".$employee['marks']."</td>";
					
					echo "<td>".$employee['level']."</td>";
					
					$seq+=1;
				}


			?>

		</table>
	</div>
	</h2>		
	</div>
</body>
</html>