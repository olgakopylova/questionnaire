<?php

class DB
{
    private $host = '127.0.0.1';
    private $log = 'root';
    private $pass = 'root';
    private $db;

    public function __construct()
    {
        try {
            $this->db = new mysqli($this->host, $this->log, $this->pass, 'questionnaire');
            $this->db->query("SET NAMES 'utf8' ");
        } catch (Exception $ex) {
            var_dump($ex);
        }
    }

    /**
     * Запрос к БД
     */
    public function query(){
        $args = func_get_args();
        call_user_func_array(array($this->db, "query"), $args);
    }

    /**
     * Получение всех данных запроса
     * @param $sql - Текст запроса
     * @return array
     */
    public function getAllData($sql){
        $result = $this->db->query($sql) or die("Ошибка " . $this->db->error);
        $array = [];
        while($row = $result->fetch_assoc())
            array_push($array,$row);
        return $array;
    }

    /**
     * Получение одной записи из БД
     * @param $sql - Текст запроса
     * @return array|null
     */
    public function getOneData($sql){
        $result = $this->db->query($sql) or die("Ошибка " . $this->db->error);
        $res=$result->fetch_assoc();
        return $res;
    }

    /**
     * Получение ИД последней добавленной записи
     * @return mixed
     */
    public function getLastInserted(){
        $sql="SELECT LAST_INSERT_ID() id";
        return $this->getOneData($sql)['id'];
    }

}