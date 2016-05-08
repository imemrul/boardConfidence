<?php
include('includes/header.html');

?>


<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$rightAnswer = 0;
$wrongAnswer = 0;


require_once('/Applications/MAMP/htdocs/quiz.php');

require_once('/Applications/MAMP/htdocs/includes/functions.php');




if (isset($_POST['submit'])){
  foreach($_POST['response'] as $key => $value){
      if($correctAnswerArray[$key] == $value){
          $rightAnswer++;
      } else {
          $wrongAnswer++;
      }
  }
}

//Display result-->

       if ($rightAnswer > 0){ ?>
           <h2><span class="label label-success">You have <?php echo $rightAnswer; ?> correct answers</span></h2>
           <?php }
        if ($wrongAnswer > 0) { ?>
           <h2><span class="label label-danger">You have <?php echo $wrongAnswer; ?> wrong answers</span></h2>
           <?php
        }
   ?>


<br /><br />

<?php
include('includes/footer.html');

?>

    