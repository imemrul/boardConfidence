<?php
namespace BoardConfidence\Model;

use PDO;

class Quiz
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getQuestionsFromDb()
    {
        $query = "select * from questions";
        $sth = $this->pdo->prepare($query);
        $sth->execute();
        return $this->fetchAll;
    }

    public function getQuestions($questions)
    {
        $result = [];
        foreach ($questions as $q) {
          $result[$q['questionId']] = $q['name'];
        }
        return $result;
    }

    public function getChoices($questions)
    {
        //Build the choices array from query result
        $choices = array();
        foreach ($questions as $row) {
            $choices[$row['questionid']] = array($row['choice1'], $row['choice2'], $row['choice3'], $row['answer']);
        }
        return $choices;
    }
}
