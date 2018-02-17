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
		    <p>By starting the quiz you are agreeing with the following terms and conditions.Are you sure you want to start the Quiz?</p>
		    <ol>
		    	<li>If you close the browser or navigate to other windows or exit the fullscreen then the admin carries the right to terminate the exam.</li>
		    	<li>In case your browser gets accidently closed them you can resume the quiz by login again.(But you will not be given extra time.)</li>
		    	<li>In case of any discrepancies decision taken by Teamm Reflux will be final.</li>

		    </ol>
		    <br>
		    <button id="iagree" onclick="iagree();">I Agree</button>
		    <button id="nagree" onclick="nagree();">No take me back</button>

		  </div>

	</div>

	

	<div id="page1" hidden>

		<center><h2 class="heading"><u>General Instructions</u></h2></center>

		<div id="gnrl_ins" >
			<ul>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
			</ul>
		</div>
	</div>

	<div id="page2" hidden>

		<center><h2 class="heading"><u>General Instructions</u></h2></center>

		<div id="gnrl_ins">
			<ul>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
			</ul>
		</div>
	</div>

	<div id="page3" hidden>

		<center><h2 class="heading"><u>General Instructions</u></h2></center>

		<div id="gnrl_ins">
			<ul>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
				<li>Some of the common instruction will br here.</li>
			</ul>
		</div>
	</div>
	

	<div class="footer">
				<button class="btn" id="start" onclick="start();">Start</button>
				<button	class="btn" id="submit" hidden onclick="submit();">Submit</button>
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
				
            var el = document.documentElement , rfs = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen;
				rfs.call(el);

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
			window.location = "quiz.php";
		}

		function nagree(){
		    modal.style.display = "none";

		}
		function submit(){

		};
	</script>
</body>
</html>