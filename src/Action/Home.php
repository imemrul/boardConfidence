<?php
namespace BoardConfidence\Action;

use BoardConfidence\Model\Quiz;

class Home {

    public function _construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function __invoke()
    {

    }

}
