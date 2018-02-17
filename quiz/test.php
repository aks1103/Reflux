<<?php 
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
			for ($i=0; $i <45 ; $i++) { 
			echo $questions[$i];
			echo " 		";echo $i;
			}
		?>