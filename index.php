<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Programmer
 * Date: 20.05.13
 * Time: 12:10
 * To change this template use File | Settings | File Templates.
 */
require_once('lib/Twig/Autoloader.php');
require_once('mongo_connect.php');
require_once('api/mongo_api.php');
require_once('api/TagFilter.php');
require_once('api/common_api.php');


header('Content-Type: text/html; charset=utf-8');
session_start();

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');

$twig = new Twig_Environment($loader, array(
    'cache' => 'templates/cache',
    'auto_reload' => true
));

$db = new dbAPI();

// восстанавливаем фильтр
if(!isset($_SESSION['ViewerFilter'])){
    $filter = new TagFilter($db->getRootId());
    $_SESSION['ViewerFilter'] = $filter;
}

if( $f = C::getStr('f',false) ){
    $filter = new TagFilter($db->getRootId());
    $filter->loadFilter($f);
}
else {
    $filter = $_SESSION['ViewerFilter'];
}


if (isset($_GET['id'])) $id = $_GET['id'];
else $id = $db->getRootId();

$data = array();
//if ((isset($_SESSION['id'])) and ($_SESSION['id'] <> $id)) $data['parent'] = $_SESSION['id'];
$data['parent'] = $db->getParentId($id);

$cmd = C::getStr('cmd', 'files');


    switch ($cmd) {

        /****** редактор классификатора ****/

        case 'new': // добавить новый тег
            $db->setTag($id,$_POST['name']);
            unset($_POST['name']);
            $cmd = 'main';
            break;

        case 'delete': // удалить тег
            $db->deleteTag($_POST['id']);
            $cmd = 'main';
            break;

        case 'update': // обновить тег
            $db->updateName($_GET['tag'],$_POST['name']);
            $cmd = 'main';
            break;



    }

switch ($cmd) {

    /****** редатор классификатора ****/

    case 'main': // список категорий

        $data['items'] = $db->getFirstChildren(array($id));
        $newItems = array();
        foreach ($data['items'] as $item) {
            $portal = $item;
            if (isset($item['portal'])) {
                $portalFilter = new TagFilter($db->getRootId());
                $portalFilter->import($item);

                $portal['portalfilter'] =  $portalFilter->getURL();
            }
            $newItems[] = $portal;
        }
        $data['items'] = $newItems;

        //var_dump($data['items']);
        $_SESSION['id'] = $id;
        $data['id'] = $id;
        $data['path'] = $db->getPath($id);
        $object = new MongoId($id);
        $path = (array)$db->getTagInfo($object);

        if  ($path['name'] <>'/')  $data['path'][] = $path;
        echo $twig->render('main.html', $data);
        break;

    /***** режим просмотра *****/

    case 'editor': {
        // собираем хлебные крошки
        $data['path'] = $filter->getPath();

        // получаем текуший фильтр
        $data['filter'] = $filter->getURL();
        //определяем корень
        $end = $filter->getCurentCondition();
        if ($db->getRootId() == $end[0]) $data['root_dir'] = true;
        // собираем новые фильтры для меню условий
        $data['addfilter'] = $filter->addFilter();
        $data['backfilter'] = $filter->getBackURL();
        //получаем теги
        $data['items'] = $db->getFirstChildren($filter->getCurentCondition());
        if (is_array($data['items'])) {
            foreach($data['items'] as &$item)
                $item['filter'] = $filter->getSelectedURL($item['id']);

        }


        // получаем файлы
        $data['files'] = $db->getFiles($filter->get());
        echo $twig->render('frame.html', $data);
        break;

    }

    case 'files': // список файлов (объектов)
        // собираем хлебные крошки
        $data['path'] = $filter->getPath();

        // получаем текуший фильтр
        $data['filter'] = $filter->getURL();
        //определяем корень
        $end = $filter->getCurentCondition();
        if ($db->getRootId() == $end[0]) $data['root_dir'] = true;
        // собираем новые фильтры для меню условий
        $data['addfilter'] = $filter->addFilter();
        $data['backfilter'] = $filter->getBackURL();
        //получаем теги
        $data['items'] = $db->getFirstChildren($filter->getCurentCondition());
        if (is_array($data['items'])) {
            foreach($data['items'] as &$item)
                $item['filter'] = $filter->getSelectedURL($item['id']);
        }

        // смотрим есть ли порталы и добавляем их
        $portal = $filter->getCurentCondition();
        if (count($portal) < 2) {
            $tag = new MongoId($portal[0]);
            $portalFilterArray = $db->getTagInfo($tag);
            if (isset($portalFilterArray['portal'])){
                $portalFilter = new TagFilter($db->getRootId());
                $portalFilter->import($portalFilterArray);
                $data['portals'] = $db->getFiles($portalFilter->get());
                $newPortal = array();
                foreach ($data['portals'] as $portal) {
                    $id = (array)$portal['_id'];
                    $portal['link'] = '?f=' . $filter->getURL() . "-" . $id['$id'];
                    $newPortal[] = $portal;
                }
                $data['portal'] = $newPortal;
            }
        }

        // получаем файлы
        $data['files'] = $db->getFiles($filter->get());
        echo $twig->render('index.html', $data);
        break;


    }

$_SESSION['ViewerFilter'] = $filter;



