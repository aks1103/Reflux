<?php
   include('session.php');

if(1){

echo "Will be announced soon !!";
exit();
}

   $sql = "SELECT DISTINCT email , time , q1, q2 , q3, q4, q5 ,q6 , q7 , q8 ,q9, q10, q11, q12, q13, q14, q15, q16, q17, q18, q19, q20, q21, q22,q23, q24, q25, q26, q27, q28, q29, q30, q31, q32, q33, q34, q35, q36, q37, q38, q39, q40, q41 , q42, q43, q44, q45,r1, r2 , r3, r4, r5 ,r6 , r7 , r8 ,r9, r10, r11, r12, r13, r14, r15, r16, r17, r18, r19, r20, r21, r22,r23, r24, r25, r26, r27, r28, r29, r30, r31, r32, r33, r34, r35, r36, r37, r38, r39, r40, r41 , r42, r43, r44, r45  FROM `participants` WHERE time!='0'";
  
   $retval = $db->query($sql);
    if($retval->num_rows > 0 ){


    	while($row = $retval->fetch_assoc()){

    		$email = $row['email'];

    		$marks = 0.0 ;

    		for($i=1; $i<=45; $i++){
    			$quesnum = "q$i";
    			$quesid = $row[$quesnum];

    			$resnum = "r$i";
    			$response = $row[$resnum];
    			$sql =  "SELECT answer FROM quiz_questions WHERE id ='$quesid'";

    			$ans_r = $db->query($sql);
    			$ans_row = $ans_r->fetch_assoc();

    			$answer = $ans_row['answer'];

    			if($response == $answer){
    				if($i<=15)
    					$marks += 1.0;
    				if($i>15 && $i<=30)
    					$marks += 1.5;
    				if($i>30 && $i<=45)
    					$marks += 2.0;

    			}



    		}

    		$s = "INSERT INTO result_paheli ( email , score) VALUES ( '$email' , '$marks')";
    		$db->query($s);

    		echo "$email   $marks <br>";
    	}
    	// $isStarted = $row['isStarted'];


    }else{
    	echo "Invalid credentials or session expired.";
    }


?>	