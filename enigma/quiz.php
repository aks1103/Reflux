<?php 
$questions = array();
for($i=1; $i<=40; $i++) {
				# code...
			

				
				
				$numbers = range(1, 150);
    			shuffle($numbers);
    			array_slice($numbers, 0, 40);

				
				$q = $numbers[$i];


				array_push($questions, $q);
				
				

			}
			for ($i=41; $i <46 ; $i++) { 
				# code...
				$numbers = range(1, 69);
    			shuffle($numbers);
    			array_slice($numbers, 0, 5);

				
				$q = $numbers[$i];


				array_push($questions, $q);
				
			}
		?>
		

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FrontEnd Quiz</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" href="reveal/css/reveal.min.css">
	<link rel="stylesheet" href="reveal/css/theme/default.css" id="theme">
	<link rel="stylesheet" href="talk.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<style type="text/css">
		
		
	.greenAns{
		color:#33aa77;
	}

		.footer{
			border-top: solid 2px #cccccc;
			background-color: #bababa;
			z-index: 10;
			position: fixed;
			bottom:0;
			width:100%;
			height:6vh;
			padding:10px;

		}

		.space{
			
			height:13vh;
			


		}

		.btn{
			border-radius: 10px;
			padding: 7px;
			width:9vw;
			border:none;
			height:5vh;
			background-color: #fafafa;
			margin-left: 3px;

		}

		.btn2{
			border-radius: 10px;
			padding: 4px;
			width:9vw;
			border:none;
			height:5vh;
			background-color: #fafafa;
			margin-left: 3px;

		}

		.btn3{
			border-radius: 10px;
			padding: 4px;
			width:12vw;
			border:none;
			height:5vh;
			background-color: #fafafa;
			margin-left: 3px;

		}

		.btn2:active{
			border: none;
		}

		.question_ctrl{
			position:fixed;
			bottom: 12vh;
			right:1vw;
			border:solid 2px #039BE5;
			border-radius: 4px;

		}

		body{
			padding:0;
			margin: 0;
			border-width:0;
			background-color: #ffffff;
			overflow-x: hidden;	
		}

/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 0px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}

		.btn :active{
			border: none;
		}

		#back{
			position: fixed;
			right:23vw;
		}

		#next{
			position: fixed;
			right:13vw;
		}

		#submitBtn{
			position: fixed;
			right:3vw;
			bottom:3vh;
		}
		   #montainer {
        width: 800px;
        
        overflow: scroll;
        background-color: #ccc;         
    }

    #montainer .image-montainer {
        
        vertical-align: middle;
        
    }

    #montainer .image-montainer img {
        /*max-height: 300px;*/
               
    }

		#start{

		}

	

		#gnrl_ins{
			position:fixed;
			left: 7vw;

		}

		#gnrl_ins ul li{
			color: #229955;
			font-size: 3vh;
			margin: 10px;

		}
		.heading{
			padding-top: 10px;
			margin:0;
			color: #229955;

		}

		.question{
			margin-top:10px;
			margin-left:10px;

		}


		.timer{
			position: relative;
			left:10vw;
			font-size:20px;
			color: #dd5522; 
		}

		.panelbtn_red{
			border:none;
			background-color: #ff2242;
			color: #fafafa;
			width:40px;
			height:40px;
			margin:10px;
			border-radius: 10px;
			font-size: 16px;
		}

		.panelbtn_green{
			border:none;
			background-color: #22ff42;
			color: #fafafa;
			width:40px;
			height:40px;
			margin:10px;
			border-radius: 10px;
			font-size: 16px;
		}

		.answer{
			border:none;
			width:20vw;
			border-bottom: solid 2px #cacaca;
			height:5vh;
			padding:4px;
			margin-left: 8px;
		}
	
	.blink {
		-webkit-animation-duration: 1s;
		-webkit-animation-name: blink;
		-webkit-animation-iteration-count: infinite;
		-webkit-animation-direction: alternate;
		-webkit-animation-timing-function: ease-in-out;
	}
	@-webkit-keyframes blink {
		from {
			opacity: 1;
		}
		to {
			opacity: 0;
		}
	}

	.data-background{
		opacity: 1;
	}
</style>


<script type="text/javascript">
	var next;
	var back;
	var myleft = function(){back();};
	var myright = function(){next()};

</script>
<!-- For syntax highlighting -->
<link rel="stylesheet" href="reveal/lib/css/zenburn.css">
</head>
<body class="data-background" style="background-image: url(login_back.jpg);
    background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center;">
	<div class="reveal">
		<div class="slides">

			<section  backgroundTransition='slide'>
				<h1 style="font-family:verdana;">

					ENIGMA 
				</h1>
				<div>
					<br>
				</div>

			</section>
			<section  backgroundTransition='slide'>
					<div class="instruction" id="instruction">
				<center>
				<h2 class="heading"> General Instruction </span></u></h2></center>
				<ul>
					<li><font size="5">Fill your answer in the space provided corresponding to each question.</font></li>
					<li><font size="5"><button class="btn" disabled="">Panel</button> will show all questions and their status whether they are saved or not.
					<br> <button class="panelbtn_red" disabled>1</button> shows a unanswered question and,<br>
					<button class="panelbtn_green" disabled >2</button> shows a saved question.</font></li>
					<li><font size="5"><button class="btn" disabled="">Submit</button> will become active only after 10 min of quiz start. This <b>will directly submit all your saved answer</b>.<br></font></li>
					<li><font size="5"><button class="btn2" disabled>Save And Next</button> use this to Save the question and continue.<b>Only the saved questions will be evaluted.</b></font></li>
					<li><font size="5"><b>Do not refresh the page or close the browser.</b> In case your browser is accidently closed, your saved answer will be preserved but will not show up on the interface.</font></li>
					
					<li><font size="5">Press the right arrow key on your keyboard proceed.</font></li>

				</ul>


				
	</div>
			</section>
			<?php
			
			for($i=0;$i<=39;$i++){
				// read the question no enigma  participant

				// 

					$k=$questions[$i];
				echo "<section  backgroundTransition='slide'> <section> <h6>Question $i</h6> <div> <br> <div id='montainer'> <div class='image-montainer'> <img width=100% src='ques/".md5("refE_".$k)."' alt='hello' /> </div> </div>​ </div><div class='row'><label class='container'>One <input type='radio' name='answer'> <span class='checkmark'></span> </label> <label class='container'>Two <input type='radio' name='answer' > <span class='checkmark'></span> </label></div><div class='row'><label class='container'>Three <input type='radio' name='answer' > <span class='checkmark'></span> </label><label class='container'>Four <input type='radio' name='answer'> <span class='checkmark'></span> </label><script type='text/javascript'> var page_count=$k;document.write(page_count);</script><!DOCTYPE html> <html> <head> <title></title> </head> <body> <button class='navigate-left enabled my_left' onclick='myleft();'>left</button> <button class='my_right' onclick='myright();'>right</button></body> </html> </div><div class='question_ctrl'><button name='saveques' class='btn2' id='saveques' onclick='submitQues(page_count)'>Save And Next</button></div></section> <section> <div><div class='panel' id='panel' align='center'> <center><h2 class='heading'> Question Panel </span></u></h2></center><br/><br/> <div id='question_row1'> <button class='panelbtn_red' id='bpanel1' value='1' onclick='gotoId(1);'>1</button> <button class='panelbtn_red' id='bpanel2' value='2' onclick='gotoId(2);'>2</button> <button class='panelbtn_red' id='bpanel3' value='3' onclick='gotoId(3);'>3</button> <button class='panelbtn_red' id='bpanel4' value='4' onclick='gotoId(4);'>4</button> <button class='panelbtn_red' id='bpanel5' value='5' onclick='gotoId(5);'>5</button> <button class='panelbtn_red' id='bpanel6' value='6' onclick='gotoId(6);'>6</button> <button class='panelbtn_red' id='bpanel7' value='7' onclick='gotoId(7);'>7</button> <button class='panelbtn_red' id='bpanel8' value='8' onclick='gotoId(8);'>8</button> <button class='panelbtn_red' id='bpanel9' value='9' onclick='gotoId(9);'>9</button> <button class='panelbtn_red' id='bpanel10' value='10' onclick='gotoId(10);'>10</button> </div> <div id='question_row2'> <button class='panelbtn_red' id='bpanel11' value='11' onclick='gotoId(11);'>11</button> <button class='panelbtn_red' id='bpanel12' value='12' onclick='gotoId(12);'>12</button> <button class='panelbtn_red' id='bpanel13' value='13' onclick='gotoId(13);'>13</button> <button class='panelbtn_red' id='bpanel14' value='14' onclick='gotoId(14);'>14</button> <button class='panelbtn_red' id='bpanel15' value='15' onclick='gotoId(15);'>15</button> <button class='panelbtn_red' id='bpanel16' value='16' onclick='gotoId(16);'>16</button> <button class='panelbtn_red' id='bpanel17' value='17' onclick='gotoId(17);'>17</button> <button class='panelbtn_red' id='bpanel18' value='18' onclick='gotoId(18);'>18</button> <button class='panelbtn_red' id='bpanel19' value='19' onclick='gotoId(19);'>19</button> <button class='panelbtn_red' id='bpanel20' value='20' onclick='gotoId(20);'>20</button> </div> <div id='question_row3'> <button class='panelbtn_red' id='bpanel21' value='21' onclick='gotoId(21);'>21</button> <button class='panelbtn_red' id='bpanel22' value='22' onclick='gotoId(22);'>22</button> <button class='panelbtn_red' id='bpanel23' value='23' onclick='gotoId(23);'>23</button> <button class='panelbtn_red' id='bpanel24' value='24' onclick='gotoId(24);'>24</button> <button class='panelbtn_red' id='bpanel25' value='25' onclick='gotoId(25);'>25</button> <button class='panelbtn_red' id='bpanel26' value='26' onclick='gotoId(26);'>26</button> <button class='panelbtn_red' id='bpanel27' value='27' onclick='gotoId(27);'>27</button> <button class='panelbtn_red' id='bpanel28' value='28' onclick='gotoId(28);'>28</button> <button class='panelbtn_red' id='bpanel29' value='29' onclick='gotoId(29);'>29</button> <button class='panelbtn_red' id='bpanel30' value='30' onclick='gotoId(30);'>30</button> </div> <div id='question_row4'> <button class='panelbtn_red' id='bpanel31' value='31' onclick='gotoId(31);'>31</button> <button class='panelbtn_red' id='bpanel32' value='32' onclick='gotoId(32);'>32</button> <button class='panelbtn_red' id='bpanel33' value='33' onclick='gotoId(33);'>33</button> <button class='panelbtn_red' id='bpanel34' value='34' onclick='gotoId(34);'>34</button> <button class='panelbtn_red' id='bpanel35' value='35' onclick='gotoId(35);'>35</button> <button class='panelbtn_red' id='bpanel36' value='36' onclick='gotoId(36);'>36</button> <button class='panelbtn_red' id='bpanel37' value='37' onclick='gotoId(37);'>37</button> <button class='panelbtn_red' id='bpanel38' value='38' onclick='gotoId(38);'>38</button> <button class='panelbtn_red' id='bpanel39' value='39' onclick='gotoId(39);'>39</button> <button class='panelbtn_red' id='bpanel40' value='40' onclick='gotoId(40);'>40</button> </div> <div id='question_row5'> <button class='panelbtn_red' id='bpanel41' value='41' onclick='gotoId(41);'>41</button> <button class='panelbtn_red' id='bpanel42' value='42' onclick='gotoId(42);'>42</button> <button class='panelbtn_red' id='bpanel43' value='43' onclick='gotoId(43);'>43</button> <button class='panelbtn_red' id='bpanel44' value='44' onclick='gotoId(44);'>44</button> <button class='panelbtn_red' id='bpanel45' value='45' onclick='gotoId(45);'>45</button> </div> </div></div> </section> </section>"; } ?>

		
			<?php 
			for($i=40;$i<=44;$i++){
				// read the question no enigma  participant

				// 
				$k=$questions[$i];

				echo "<section  backgroundTransition='slide'> <section> <h2>Question #$i</h2> <div> <br> <div id='montainer'> <div class='image-montainer'> <img src='ques/".md5("refH_".$k)."' alt='hello' /> </div> </div>​ </div><div class='row'><label class='container'>One <input type='radio' name='answer'> <span class='checkmark'></span> </label> <label class='container'>Two <input type='radio' name='answer' > <span class='checkmark'></span> </label></div><div class='row'><label class='container'>Three <input type='radio' name='answer' > <span class='checkmark'></span> </label><label class='container'>Four <input type='radio' name='answer'> <span class='checkmark'></span> </label><script type='text/javascript'> var page_count=$k;document.write(page_count);</script><!DOCTYPE html> <html> <head> <title></title> </head> <body> <div class='navigate-left enabled my_left'>left</div> <button class='my_right' onclick='alert('dawdawd');'>right</button></body> </html> </div><div class='question_ctrl'><button name='saveques' class='btn2' id='saveques' onclick='submitQues(page_count)'>Save And Next</button></div></section> <section> <div><div class='panel' id='panel' align='center'> <center><h2 class='heading'> Question Panel </span></u></h2></center><br/><br/> <div id='question_row1'> <button class='panelbtn_red' id='bpanel1' value='1' onclick='gotoId(1);'>1</button> <button class='panelbtn_red' id='bpanel2' value='2' onclick='gotoId(2);'>2</button> <button class='panelbtn_red' id='bpanel3' value='3' onclick='gotoId(3);'>3</button> <button class='panelbtn_red' id='bpanel4' value='4' onclick='gotoId(4);'>4</button> <button class='panelbtn_red' id='bpanel5' value='5' onclick='gotoId(5);'>5</button> <button class='panelbtn_red' id='bpanel6' value='6' onclick='gotoId(6);'>6</button> <button class='panelbtn_red' id='bpanel7' value='7' onclick='gotoId(7);'>7</button> <button class='panelbtn_red' id='bpanel8' value='8' onclick='gotoId(8);'>8</button> <button class='panelbtn_red' id='bpanel9' value='9' onclick='gotoId(9);'>9</button> <button class='panelbtn_red' id='bpanel10' value='10' onclick='gotoId(10);'>10</button> </div> <div id='question_row2'> <button class='panelbtn_red' id='bpanel11' value='11' onclick='gotoId(11);'>11</button> <button class='panelbtn_red' id='bpanel12' value='12' onclick='gotoId(12);'>12</button> <button class='panelbtn_red' id='bpanel13' value='13' onclick='gotoId(13);'>13</button> <button class='panelbtn_red' id='bpanel14' value='14' onclick='gotoId(14);'>14</button> <button class='panelbtn_red' id='bpanel15' value='15' onclick='gotoId(15);'>15</button> <button class='panelbtn_red' id='bpanel16' value='16' onclick='gotoId(16);'>16</button> <button class='panelbtn_red' id='bpanel17' value='17' onclick='gotoId(17);'>17</button> <button class='panelbtn_red' id='bpanel18' value='18' onclick='gotoId(18);'>18</button> <button class='panelbtn_red' id='bpanel19' value='19' onclick='gotoId(19);'>19</button> <button class='panelbtn_red' id='bpanel20' value='20' onclick='gotoId(20);'>20</button> </div> <div id='question_row3'> <button class='panelbtn_red' id='bpanel21' value='21' onclick='gotoId(21);'>21</button> <button class='panelbtn_red' id='bpanel22' value='22' onclick='gotoId(22);'>22</button> <button class='panelbtn_red' id='bpanel23' value='23' onclick='gotoId(23);'>23</button> <button class='panelbtn_red' id='bpanel24' value='24' onclick='gotoId(24);'>24</button> <button class='panelbtn_red' id='bpanel25' value='25' onclick='gotoId(25);'>25</button> <button class='panelbtn_red' id='bpanel26' value='26' onclick='gotoId(26);'>26</button> <button class='panelbtn_red' id='bpanel27' value='27' onclick='gotoId(27);'>27</button> <button class='panelbtn_red' id='bpanel28' value='28' onclick='gotoId(28);'>28</button> <button class='panelbtn_red' id='bpanel29' value='29' onclick='gotoId(29);'>29</button> <button class='panelbtn_red' id='bpanel30' value='30' onclick='gotoId(30);'>30</button> </div> <div id='question_row4'> <button class='panelbtn_red' id='bpanel31' value='31' onclick='gotoId(31);'>31</button> <button class='panelbtn_red' id='bpanel32' value='32' onclick='gotoId(32);'>32</button> <button class='panelbtn_red' id='bpanel33' value='33' onclick='gotoId(33);'>33</button> <button class='panelbtn_red' id='bpanel34' value='34' onclick='gotoId(34);'>34</button> <button class='panelbtn_red' id='bpanel35' value='35' onclick='gotoId(35);'>35</button> <button class='panelbtn_red' id='bpanel36' value='36' onclick='gotoId(36);'>36</button> <button class='panelbtn_red' id='bpanel37' value='37' onclick='gotoId(37);'>37</button> <button class='panelbtn_red' id='bpanel38' value='38' onclick='gotoId(38);'>38</button> <button class='panelbtn_red' id='bpanel39' value='39' onclick='gotoId(39);'>39</button> <button class='panelbtn_red' id='bpanel40' value='40' onclick='gotoId(40);'>40</button> </div> <div id='question_row5'> <button class='panelbtn_red' id='bpanel41' value='41' onclick='gotoId(41);'>41</button> <button class='panelbtn_red' id='bpanel42' value='42' onclick='gotoId(42);'>42</button> <button class='panelbtn_red' id='bpanel43' value='43' onclick='gotoId(43);'>43</button> <button class='panelbtn_red' id='bpanel44' value='44' onclick='gotoId(44);'>44</button> <button class='panelbtn_red' id='bpanel45' value='45' onclick='gotoId(45);'>45</button> </div> </div></div> </section> </section>"; } ?>
				<section>
			<h2>THE END</h2>
			<div class="panel" id="panel" align="center">
				<center><h2 class="heading"> Question Panel </span></u></h2></center><br/><br/>
				<form action="thanks.php" method="post">
				<button	type="submit" class="btn" id="submitBtn" >Submit</button>
				</form>
				</div>

				<div id="question_row1">
					<button class="panelbtn_red" id="bpanel1" value="1" onclick="gotoId(1);">1</button>
					<button class="panelbtn_red" id="bpanel2" value="2" onclick="gotoId(2);">2</button>
					<button class="panelbtn_red" id="bpanel3" value="3" onclick="gotoId(3);">3</button>
					<button class="panelbtn_red" id="bpanel4" value="4" onclick="gotoId(4);">4</button>
					<button class="panelbtn_red" id="bpanel5" value="5" onclick="gotoId(5);">5</button>
					<button class="panelbtn_red" id="bpanel6" value="6" onclick="gotoId(6);">6</button>
					<button class="panelbtn_red" id="bpanel7" value="7" onclick="gotoId(7);">7</button>
					<button class="panelbtn_red" id="bpanel8" value="8" onclick="gotoId(8);">8</button>
					<button class="panelbtn_red" id="bpanel9" value="9" onclick="gotoId(9);">9</button>
					<button class="panelbtn_red" id="bpanel10" value="10" onclick="gotoId(10);">10</button>

				</div>
				<div id="question_row2">
					<button class="panelbtn_red" id="bpanel11" value="11" onclick="gotoId(11);">11</button>
					<button class="panelbtn_red" id="bpanel12" value="12" onclick="gotoId(12);">12</button>
					<button class="panelbtn_red" id="bpanel13" value="13" onclick="gotoId(13);">13</button>
					<button class="panelbtn_red" id="bpanel14" value="14" onclick="gotoId(14);">14</button>
					<button class="panelbtn_red" id="bpanel15" value="15" onclick="gotoId(15);">15</button>
					<button class="panelbtn_red" id="bpanel16" value="16" onclick="gotoId(16);">16</button>
					<button class="panelbtn_red" id="bpanel17" value="17" onclick="gotoId(17);">17</button>
					<button class="panelbtn_red" id="bpanel18" value="18" onclick="gotoId(18);">18</button>
					<button class="panelbtn_red" id="bpanel19" value="19" onclick="gotoId(19);">19</button>
					<button class="panelbtn_red" id="bpanel20" value="20" onclick="gotoId(20);">20</button>
				</div>
				<div id="question_row3">
					<button class="panelbtn_red" id="bpanel21" value="21" onclick="gotoId(21);">21</button>
					<button class="panelbtn_red" id="bpanel22" value="22" onclick="gotoId(22);">22</button>
					<button class="panelbtn_red" id="bpanel23" value="23" onclick="gotoId(23);">23</button>
					<button class="panelbtn_red" id="bpanel24" value="24" onclick="gotoId(24);">24</button>
					<button class="panelbtn_red" id="bpanel25" value="25" onclick="gotoId(25);">25</button>
					<button class="panelbtn_red" id="bpanel26" value="26" onclick="gotoId(26);">26</button>
					<button class="panelbtn_red" id="bpanel27" value="27" onclick="gotoId(27);">27</button>
					<button class="panelbtn_red" id="bpanel28" value="28" onclick="gotoId(28);">28</button>
					<button class="panelbtn_red" id="bpanel29" value="29" onclick="gotoId(29);">29</button>
					<button class="panelbtn_red" id="bpanel30" value="30" onclick="gotoId(30);">30</button>
				</div>
				<div id="question_row4">
					<button class="panelbtn_red" id="bpanel31" value="31" onclick="gotoId(31);">31</button>
					<button class="panelbtn_red" id="bpanel32" value="32" onclick="gotoId(32);">32</button>
					<button class="panelbtn_red" id="bpanel33" value="33" onclick="gotoId(33);">33</button>
					<button class="panelbtn_red" id="bpanel34" value="34" onclick="gotoId(34);">34</button>
					<button class="panelbtn_red" id="bpanel35" value="35" onclick="gotoId(35);">35</button>
					<button class="panelbtn_red" id="bpanel36" value="36" onclick="gotoId(36);">36</button>
					<button class="panelbtn_red" id="bpanel37" value="37" onclick="gotoId(37);">37</button>
					<button class="panelbtn_red" id="bpanel38" value="38" onclick="gotoId(38);">38</button>
					<button class="panelbtn_red" id="bpanel39" value="39" onclick="gotoId(39);">39</button>
					<button class="panelbtn_red" id="bpanel40" value="40" onclick="gotoId(40);">40</button>
				</div>
				<div id="question_row5">
					<button class="panelbtn_red" id="bpanel41" value="41" onclick="gotoId(41);">41</button>
					<button class="panelbtn_red" id="bpanel42" value="42" onclick="gotoId(42);">42</button>
					<button class="panelbtn_red" id="bpanel43" value="43" onclick="gotoId(43);">43</button>
					<button class="panelbtn_red" id="bpanel44" value="44" onclick="gotoId(44);">44</button>
					<button class="panelbtn_red" id="bpanel45" value="45" onclick="gotoId(45);">45</button>
					
				</div>


	</div>
		</section>
	</div>


	<script src="reveal/lib/js/head.min.js"></script>
	<script src="reveal/js/reveal.min.js"></script>

	<script>

			// Full list of configuration options available here:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				controls: true,
				progress: true,
				history: true,
				center: true,

				theme: Reveal.getQueryHash().theme || 'night', // available themes are in /css/theme
				transition: Reveal.getQueryHash().transition || 'fade', // default/cube/page/concave/zoom/linear/fade/none

				// Optional libraries used to extend on reveal.js
				dependencies: [
				{ src: 'reveal/reveal/lib/js/classList.js', condition: function() { return !document.body.classList; } },
				{ src: 'reveal/plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
				{ src: 'reveal/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
				{ src: 'reveal/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
					// { src: 'reveal/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
					{ src: 'reveal/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
					// { src: 'plugin/search/search.js', async: true, condition: function() { return !!document.body.classList; } }
					// { src: 'plugin/remotes/remotes.js', async: true, condition: function() { return !!document.body.classList; } }
					]
				});

			</script>

		</div>
		<script type="text/javascript">	
	


	window.onload = onloadfunction();

	function onloadfunction(){

		

		var time  = <?php echo "10"; ?> ;
		
		// page_count = 1;
		total = 30;
		document.getElementById("page"+page_count).hidden = false;
		document.getElementById("panel").hidden = true;
		document.getElementById("instruction").hidden = true;

		document.getElementById("gobacktoques").disabled = true;
		document.getElementById("back").disabled = true;




	}

	$(document).ready(function(){

		$("input:radio[answer]").click(function(){
			this.toggleClass("greenAns");
		}); 

	});

		back = function(){
			if(page_count>1){
				document.getElementById("page"+page_count).hidden = true;	
				page_count--;
				document.getElementById("page"+page_count).hidden = false;
				document.getElementById("next").disabled = false;

				if(page_count==1)
				{
					document.getElementById("back").disabled = true;

				}

			}else{
				document.getElementById("back").disabled= true;
				

			}

		}

		next = function(){
			if(page_count<total){
				document.getElementById("page"+page_count).hidden = true;	
				page_count++;
				document.getElementById("page"+page_count).hidden = false;
				document.getElementById("back").disabled= false;
				if(page_count==total)
				{
					document.getElementById("next").disabled = true;
					

				}

			}else{
				document.getElementById("next").disabled = true;

			}
		}

		function submitQues(value){
			
			var quesnum = page_count;
			alert(quesnum);
			$selectq = 'input:text[name=answer'+ quesnum +']'
			var response = $($selectq).val();

			
			var email = "a@a.com";
		    $.post("saveques.php",
		    {
		        email: email,
		        quesnum: quesnum,
		        response : response
		       },

		    function(data, status){
		        if(status.toLowerCase() == "success"){

		        	$("#bpanel"+quesnum).removeClass("panelbtn_red");
		        	$("#bpanel"+quesnum).addClass("panelbtn_green");

		        };
		    	
		    });

		    next();
		}

			
		


	

		function startTimer() 
		{
    	


		    // var diff = <?php echo $time_left ?>;
		    var diff = 100;

		    function timer(){
		    	if(diff <= 0){
		    		window.location = "http://quiz.reflux.in/thanks.php";
		    	}
		    	if(diff < 300){
		    		document.getElementById('msgover').hidden = false;
		    	}
		    	if(diff < 3000){
		    		document.getElementById('submitBtn').disabled = false;
		    	}
		    	
		    	diff--;
		    	minutes = parseInt(diff / 60);
		    	seconds = diff % 60;
		    	time = ""+minutes+":"+seconds+"";
		    	document.getElementById('time').innerHTML = time;
		    }

		    timer();
		    setInterval(timer, 1000);
}



window.onload = function () {
	
    startTimer();

};






function gotoId(value)
{
	document.getElementById("panel").hidden = true;
	document.getElementById("instruction").hidden = true;
	
	document.getElementById("page" + value).hidden = false;

					document.getElementById("next").disabled = false;
					document.getElementById("back").disabled = false;


	if(value==total)
				{
					document.getElementById("next").disabled = true;
					

				}

	if(value==1)
				{
					document.getElementById("back").disabled = true;

				}
	page_count = value;	

	document.getElementById("panelbtn").disabled = false;
	document.getElementById("instructbtn").disabled = false;
	document.getElementById("gobacktoques").disabled = true;

}




function panel()
{

	document.getElementById("page"+page_count).hidden = true;	
	document.getElementById("panel").hidden = false;
	document.getElementById("instruction").hidden = true;

	document.getElementById("panelbtn").disabled = true;
	document.getElementById("instructbtn").disabled = false;
	document.getElementById("gobacktoques").disabled = false;

	document.getElementById("next").disabled = true;
	document.getElementById("back").disabled = true;


}

function instruct()
{

	document.getElementById("page"+page_count).hidden = true;	
	document.getElementById("panel").hidden = true;
	document.getElementById("instruction").hidden = false;

	document.getElementById("panelbtn").disabled = false;
	document.getElementById("instructbtn").disabled = true;
	document.getElementById("gobacktoques").disabled = false;

	document.getElementById("next").disabled = true;
	document.getElementById("back").disabled = true;


}

function gobacktoques(){

	document.getElementById("next").disabled = false;
	document.getElementById("back").disabled = false;

	document.getElementById("page"+page_count).hidden = false;	
	document.getElementById("panel").hidden = true;
	document.getElementById("instruction").hidden = true;

	if(page_count == 1)
	document.getElementById("back").disabled = true;
	
	if(page_count == total)
	document.getElementById("next").disabled = true;

	document.getElementById("gobacktoques").disabled = true;
	document.getElementById("panelbtn").disabled = false;
	document.getElementById("instructbtn").disabled = false;

}


var aa = function() {
	console.log("dawdw");
	alert("dawda");
};
	
	// body...
$('.my_right').click(function() {
	alert("dawd");
});


</script>
</body>
</html>
	
