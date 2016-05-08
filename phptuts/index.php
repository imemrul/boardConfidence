<?php
include('includes/header.html');

?>

<?

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once('/Applications/MAMP/htdocs/quiz.php');
require_once('/Applications/MAMP/htdocs/result.php');
require_once('/Applications/MAMP/htdocs/includes/functions.php');






?>


<!--Display form-->
<form action="result.php" method="post">

    <?php
    foreach($questions as $id => $question) {
        echo "<div class=\"form-group\">";
        echo "<h4> $question</h4>"."<ol>";//display the question

        //Display multiple choices
        $randomChoices = $choices[$id];
        $randomChoices = shuffle_assoc($randomChoices);
        foreach ($randomChoices as $key => $values){
            echo '<li><input type="radio" name="response['.$id.'] id="'.$id.'" value="' .$values.'"/>';
        ?>
            <label for="question-<?php echo($id); ?>"><?php echo($values);?></label></li>
    <?php

        }
            echo("</ul>");
            echo("</div>");
        }
       ?>

    <input type="submit" name="submit" class="btn btn-primary" value="Submit Quiz" />
</form>
<br /><br />
<div>
<?php
include('includes/footer.html');

?>
</div>
<script>
   

</script>
</body>
</html>
