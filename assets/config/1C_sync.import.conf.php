<?php
/**
 * Created by PhpStorm.
 * User: Tanzirev
 * Date: 02.02.2016
 * Time: 16:53
 * E-mail: tanzirev@mail.ru
 */

//тип контента (documents|products)
$cf_config['content_type'] = 'documents';

//разбивка столбцов импортируемого файла
$cf_config['content_row'] = array(
    0 => array('Категория',array(13,'category')),
    1 => array('Подкатегория',array(14,'category')),
    2 => array('Наименование товара',array('pagetitle','content')),
    3 => array('Артикул',array(80,'tv')),
    4 => array('Описание товара',array('content','content')),
    5 => array('Цена для розницы',array(45,'tv')),
    6 => array('Акционная цена для розницы',array(12,'tv')),
    7 => array('Цена для оптовиков',array(77,'tv')),
    8 => array('Акционная цена для оптовиков',array(29,'tv')),
    9 => array('Наличие товара',array(7,'tv')),
    10 => array('Статус товара',array(8,'tv'))
);
//значения ресурса по умолчанию при импорте и проверка на соответствие при экспорте
$cf_config['imp_content_default'] = array(
    'content' => array(
      'published' => 1,
      'template' => 12,
      'createdon' => strtotime("now")
      //'publishedon' => strtotime("now")
      //'pub_date' => strtotime("now")
      //'editedby' => 1
      //'editedon' => strtotime("now")
    ),
    'tv' => array(
      //7 => 0
    )
);

//первая строка - названия полей
$cf_config['include_captions'] = true;

//разбивать по категориям
$cf_config['include_categories'] = true;

//создавать категории
$cf_config['add_category'] = true;

//Обновлять товары. false - создавать новые, всегда.
$cf_config['imp_update'] = true;

//по какому полю проверять соответствие товара при обновлении. false - не проверять (очистка категории при обновлении).
$cf_config['imp_chk_field'] = 'pagetitle';

//проверять соответствие товара при обновлении по значению TV. Указать ID TV. false - не проверять (очистка категории при обновлении).
$cf_config['imp_chk_tvid_val'] = false;

//автоматически генерировать псевдоним (alias) при импорте
//false - выключено; true - генерировать с переводом в транслит; 'notranslit' - генерировать без перевода в транслит.
$cf_config['imp_autoalias'] = true;

//Имя импортируемого файла
//Загрузите файл в папку import
$cf_config['import_file_name'] = 'import.csv';

// Кол-во строк в группе импорта значений
$cf_config['insert_group'] = 200;

//тестирование конфигурации (без записи в БД)
$cf_config['imp_testmode'] = false;

//функция для фильтрации значений при ИМПОРТЕ
function filter_import($value_arr){
    $output_arr = $value_arr;
    /*
    if(isset($output_arr['content']['pagetitle']))
        $output_arr['content']['pagetitle'] = mb_strtoupper($output_arr['content']['pagetitle'], 'UTF-8');
    */
    return $output_arr;
}


//функция для фильтрации значений при ЭКСПОРТЕ
function filter_export($value_arr,$doc_id=0){
    $output_arr = $value_arr;
    //var_dump($value_arr,$output_arr);
    //exit;
    /*
    if(isset($output_arr['price']))
        $output_arr[1] = floatval($output_arr[1]) - 200;
    */
    return $output_arr;
}