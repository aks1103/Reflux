<?php
   include('session.php');

   $sql = "SELECT isStarted FROM enigma_participants WHERE email = '$login_session'";
   $isStarted = 0;
   $retval = $db->query($sql);
    if($retval->num_rows > 0 ){

    	$row = $retval->fetch_assoc();
    	$isStarted = $row['isStarted'];


    }else{
    	echo "Invalid credentials or session expired.";
    }


    if($isStarted == 1 ){
  		
  		header("location:quiz.php");
  		exit();

    }

    $sql = "SELECT name , email , phone FROM enigma_participants WHERE email = '$login_session'";
    $details_r = $db->query($sql);
    $details = $details_r->fetch_assoc();

    $dname = $details["name"];
    $dphone = $details["phone"];

    $demail = $details["email"];

?>
<html>
<head>
	<title>Reflux | Quiz</title>
	<style>
        .modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content/Box */
		.modal-content {
		    background-color: #fefefe;
		    margin: 15% auto; /* 15% from the top and centered */
		    padding: 20px;
		    border: 1px solid #888;
		    width: 80%; /* Could be more or less, depending on screen size */
		}

		/* The Close Button */
		.close {
		    color: #aaa;
		    float: right;
		    font-size: 28px;
		    font-weight: bold;
		}

		.close:hover,
		.close:focus {
		    color: black;
		    text-decoration: none;
		    cursor: pointer;
		}

		.footer{
			border-top: solid 2px #cccccc;
/*			background-color: #999999;
*/			z-index: 10;
			position: fixed;
			bottom:0;
			width:100%;
			height:6vh;
			padding:10px;

		}

		.btn{
			border-radius: 10px;
			padding: 5px;
			width:6vw;
			border:none;
			height:5vh;
			background-color: #fafafa;

		}
		body{
			padding:0;
			margin: 0;
			border-width:0;
		}

		.btn:active{
			border: none;
		}

		#back{
			position: fixed;
			right:12vw;
		}

		#next{
			position: fixed;
			right:3vw;
		}

		#submit{

		}

		#start{

		}

		#background{
			z-index: 0;
			height:100%;
			width:100%;
			opacity:0.16;
			position:fixed;
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
	</style>
</head>
<body>
	<div>
		<img id="background" src="quiz.jpg"/>
	</div>

	<div id="myModal" class="modal">

  	<!-- Modal content -->
		  <div class="modal-content">
		    <span class="close">&times;</span>
		    <p>By starting the quiz you agree with the following terms and conditions.</p>
		    <ol>
		    	<li>If you close the browser or refresh it or navigate to other windows then the admin carries the right to terminate the exam.</li>
		    	<li>In case your browser gets accidently closed them you can resume the quiz by login again.(But you will not be given extra time.)</li>
		    	<li>In case of any discrepancies decision taken by Team Reflux will be final.</li>

		    </ol>
		    <br>
		    <button id="iagree" onclick="nagree();">No take me back</button>
		    <button id="nagree" onclick="iagree();">I Agree</button>

		  </div>

	</div>

	

	<div id="page1" hidden>

		<center><h2 class="heading"><u>User Detail</u></h2></center>
		<center>
		<div id="gnrl_ins" >
			
				<center><h3>Name : <?php echo "$dname"; ?></h3></center>
				<center><h3>Email : <?php echo "$demail"; ?></h3></center>
				<center><h3>Phone : <?php echo "$dphone"; ?></h3></center>
				
			<br>
			<center><p>Verify your details*</p></center>
		</div>
			
	</div>

	<div id="page2" hidden>

		<center><h2 class="heading"><u>General Instruction</u></h2></center>

		<div id="gnrl_ins">
				<ul>
				
				<li>The Quiz cointains <b>45 questions</b>.</li>
				<li>First 15 questions(easy) carry +1 marks, next 15 questions(medium) carries +1.5 marks and last 15(hard) carries +2 marks</li>
				<li>All the questions are of <b>single option correct</b> type.</li>
				<li>Quiz will be for the duration of <b>30 mins</b>.</li>
				<li>You will be not be giving another chance for a given Account id.</li>
			</ul>
		</div>
	</div>

	<div id="page3" hidden>

		<center><h2 class="heading"><u>How To Answer ?</u></h2></center>

		<div id="gnrl_ins">
			<ul>
				
				<li>There is <b>no negative marking</b>.</li>
				<li>You are required to save the answer by using <button class="btn" disabled>Save And Next</button> button at the bottom right.</li>
				<li>Answers which are <b>saved will only be evaluated</b>.</li>
				<li><b>Panel </b>: You can see all the questions in the panel and the status whether they are saved or not.</li>
				<li><b>Instruction </b>: You can refer to all the general instruction using this section.</li>
				<li><b>Go to Question , Back , Next </b>: Use this questions to migrate through the questions. Note the <b>answers will not be saved using this</b>.</li>


			</ul>
		</div>
	</div>
	

	<div class="footer">
				<button class="btn" id="start" onclick="start();">Start</button>
				<button class="btn" id="back" onclick="back();">Back</button>
				<button class="btn" id="next" onclick="next();">Next</button>

				<span></span>
	</div>


	<script type="text/javascript">
		
	var page_count = 1;

	window.onload = onloadfunction();

	var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("start");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

	function onloadfunction(){

		page_count = 1;
		total = 3;
		document.getElementById("page"+page_count).hidden = false;
		document.getElementById("back").disabled = true;

	}

		function back(){
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

		};

		function next(){
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
		};

		function start(){
				
    //         var el = document.documentElement , rfs = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen;
				// rfs.call(el);

               modal.style.display = "block";
               // window.location="quiz.php";
		};

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}

		function iagree(){
			window.location = "start.php";
		}

		function nagree(){
		    modal.style.display = "none";

		}
		function submit(){

		};
	</script>
</body>
</html>
