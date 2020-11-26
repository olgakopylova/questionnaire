<?php
require_once "class/Tpl.php";
require_once "class/DB.php";
require_once "class/Questionnaire.php";

if(!isset($db)) $db = new DB();
if(!isset($questionnaire)) $questionnaire = new Questionnaire();

$data = $_POST;

if(!isset($data['type'])){
    $select = Tpl::generateOptions($questionnaire->getCities());
    $form = Tpl::render('form', ['select' => $select]);

    $header = Tpl::render('header');
    $footer = Tpl::render('footer');

    echo Tpl::render('main', ['header' => $header, 'body' => $form, 'footer' => $footer]);
}else{
    $errors = $questionnaire->checkErrors($data);
    if(empty($errors)){
        if($data['user_patronymic']=='')
            unset($data['user_patronymic']);
        $questionnaire->saveForm($data);
        echo json_encode(['content' => Tpl::render('end')]);
    }else{
        $formData = array_merge($errors, $data);
        $formData['select'] = Tpl::generateOptions($questionnaire->getCities());
        echo json_encode(['content' => Tpl::render('form', $formData)]);
    }
}

