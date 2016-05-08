<?php
error_reporting(-1);
ini_set('display_errors', 'On');



require_once('/Applications/MAMP/htdocs/includes/msqli_connect.php');

if (isset($_POST['submit'])){

	
	
			foreach ($_POST["question"] as $i =>$question) {

				$question = mysqli_real_escape_string($mysqli,$question);
				$wrong_answer1[$i] = mysqli_real_escape_string($mysqli, $_POST["wrong_answer1"][$i]);
				$wrong_answer2[$i] = mysqli_real_escape_string($mysqli, $_POST["wrong_answer2"][$i]);
				$wrong_answer3[$i] = mysqli_real_escape_string($mysqli, $_POST["wrong_answer3"][$i]);
				$correct_answer[$i] = mysqli_real_escape_string($mysqli, $_POST["correct_answer"][$i]);

				 if(!mysqli_query($mysqli,"INSERT INTO questions(questionid, name, choice1, choice2, choice3, answer)VALUES(
				 	NULL, 
				 	'".$question."',
				 	'".$wrong_answer1[$i]."',
				 	'".$wrong_answer2[$i]."',
				 	'".$wrong_answer3[$i]."',
				 	'".$correct_answer[$i]."')"))
				 {
				 	echo("Error description: " . mysqli_error($mysqli));
				  }

				


				
			}

				

			
	

/*

 if(!mysqli_query($mysqli,"INSERT INTO questions(questionid, name, choice1, choice2, choice3, answer)VALUES(NULL, '".$question."','".$wrong_answer1."','".$wrong_answer2."','".$wrong_answer3."','".$correct_answer."')"))
 {
 	echo("Error description: " . mysqli_error($mysqli));
  }
if(!mysqli_query($mysqli,"INSERT INTO questions(choice1) 
					VALUES ("$wrong_answer1")"))


			echo $question,

				"<br />",

				$wrong_answer1[]= mysqli_real_escape_string( $_POST["wrong_answer1"][$i]), "<br />",
				
				$_POST["wrong_answer2"][$i], "<br />",
				$_POST["wrong_answer3"][$i], "<br />",
				$_POST["correct_answer"][$i], "<br />"; 

*/


/* close connection */
$mysqli->close();

}

?>