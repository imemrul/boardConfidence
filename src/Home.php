<?php
namespace BoardConfidence;

use BoardConfidence\Model\Quiz;

class Home {

    public function _construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function __invoke()
    {
        $questDb = $this->quiz->getQuestionsFromDb();

        $questions = $this->quiz->getQuestions($questDb());
        $choices = $this->quiz->getChoices($questDb));

        $content = require('view/home.phtml');

        require 'view/template/default.phtml';
    }

}
