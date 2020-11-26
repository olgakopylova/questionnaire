<?php
require_once "DB.php";

class Questionnaire
{
    private $db;

    public function __construct(){
        $this->db = new DB();
    }


    public function saveForm($data){
        try{
            $this->db->query("START TRANSACTION;");

            $this->db->query(sprintf("INSERT INTO user(user_family, user_name, user_sex, user_age, 
                user_living_town, user_question) VALUES ('%s', '%s', %d, %d, '%s', '%s')",
                $data['user_family'], $data['user_name'], $data['user_sex'], $data['user_age'],
                $data['user_living_town'], $data['user_question']));

            if(isset($data['user_patronymic'])){
                $id = $this->db->getLastInserted();
                $this->db->query(sprintf("UPDATE user SET user_patronymic='%s' WHERE id=%d", $data['user_patronymic'], $id));
            }
            $this->db->query("COMMIT;");
            return ['code'=> 0];
        }catch (Exception $exception){
            $this->db->query("ROLLBACK;");
            return ['code' => '-1', 'error' => $exception->getTraceAsString()];
        }
    }

    /**
     * Получение списка городов
     * @return array - Города
     */
    public function getCities(){
        return$this->db->getAllData("SELECT value FROM dictionary WHERE id_type=1");
    }

    /**
     * Проверка на наличение ошибок
     * @param $data - Массив данных для сохранения
     * @return array - Ошибки
     */
    public function checkErrors($data){
        $errors=[];
        if($this->isCorrectString($data['user_family'])!=1&&$data['user_family'])
            $errors['user_family_err'] = 'Недопустимый символ';
        if($this->isCorrectString($data['user_name'])!=1&&$data['user_name'])
            $errors['user_name_err'] = 'Недопустимый символ';
        if($this->isCorrectString($data['user_patronymic'])!=1&&$data['user_patronymic'])
            $errors['user_patronymic_err'] = 'Недопустимый символ';
        if($this->isCorrectString($data['user_question'])!=1&&$data['user_question'])
            $errors['user_question_err'] = 'Недопустимый символ';
        if(is_numeric($data['user_age'])){
            if($data['user_age'] <= 0)
                $errors['user_age_err'] = 'Возраст не может быть меньше нуля';
            if($data['user_age'] > 150)
                $errors['user_age_err'] = 'Слишком большой возраст';
        }
        else{
            $errors['user_age_err'] = 'Возраст должен быть числовым значением';
        }

        return $errors;
    }

    /**
     * Проверка строки
     * @param $str - Проверяемая строка
     * @return bool
     */
    private function isCorrectString($str) {
        $reg = '/^[A-Za-zА-Яа-яЁё0-9\s\,\.\:№"«»\(\)]+$/u';
        return preg_match ($reg,$str)==1;
    }

}