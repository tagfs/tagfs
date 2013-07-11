<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Programmer
 * Date: 11.06.13
 * Time: 17:19
 * To change this template use File | Settings | File Templates.
 */
class TagFilter {

    private $rootId;
    private $filter;

    function __construct($rootId) {
        $this->rootId = $rootId;
        $this->reset();
    }

    function reset() {
        $this->filter = array();
        $this->filter[] = array($this->rootId);
    }

    function import($filter) {

        $portalFilterResult = array();
        foreach ($filter['portal'] as $item) {
            $arrayItem = (array)$item;

            $portalFilterResult[] = $arrayItem['$id'];
        }
        $new[] = $portalFilterResult;

        $this->filter = $new;
    }

    function get() {
        $this->fixEmpty();
        return $this->filter;
    }



    function getCurentCondition() {
        $this->fixEmpty();
        $end = end($this->filter);
        if (is_array($end)) return $end;
        return array($end);

    }

    function add($tag) {
        $this->filter[] = $tag;
    }

    function remove($tag = false) {
        $newFilter = array();

        
        if($tag){
            $tagFound = false;
            if(count($tag)==1){
                foreach ($this->filter as $item) {
                    if ((count($item) == 1  ) and $tag[0] == $item[0]) {
                        $tagFound = true;
                    }
                    else $newFilter[] = $item;
                }
            }
            else {
                foreach ($this->filter as $item) {
                    if (count($item)>1 and $tag[0]=$item[0] and $tag[1]=$item[1]) {
                        $tagFound = true;
                        $newFilter[] = $item[0];
                    }

                    else $newFilter[] = $item;
                }
            }
            if($tagFound) {
                $this->filter = $newFilter;
            }

            return $tagFound;
        }
        else { // удаляем последний элемент
            array_pop($this->filter);
            return true;
        }
    }

    function select($tag) {
        if(count($this->filter)<2) return false;
        $this->remove($tag);
        $this->add($tag);

        return true;
    }


    function getURL() { // компилируем фильтр в get параметр
        //echo('<br><br>');
        //var_dump($this->filter);

        $this->fixEmpty();
        $filterArray = array();
        foreach ($this->filter as $item) {
            if (is_array($item)) {
                $filterArray[] = implode('-',$item);
            }
            else $filterArray[] = $item;

        }

        //echo('<br />');
        //var_dump($filterArray);
        $url = implode(':', $filterArray);



        $url = urlencode($url);
        return $url;
    }

    function loadFilter($filterString) { // извлекаем фильтр из get параметра
        $filterString = urldecode($filterString);
        $filterArray = array();
        if ($filterString) {

            $this->filter = explode(':',$filterString);
            foreach ($this->filter as $item) {
                $buffer = explode('-',$item);
                if (count($buffer > 1)) {
                    $filterArray[] = $buffer;
                }
                else $filterArray[] = $item;
            }
        }

        $this->filter = $filterArray;

    }




    function fixEmpty(){
        if(count($this->filter)==0) $this->reset();
    }

    function getSelectedURL($condition){
        $filterClone = clone $this;
        $filterClone->remove();
        $filterClone->add($condition);
        $url = $filterClone->getURL();
        unset($filterClone);
        return $url;
    }

    function addFilter() {
        $newFilter = clone $this;
        $newFilter->add($this->rootId);
        $url = $newFilter->getURL();
        unset($newFilter);
        return $url;

    }

    function getPath() { // собирает массив для хлебных крошек по фильтру
        global $db;

        $path = array();
        $filterArray = $this->get();


        foreach($filterArray as $condition){

            if(count($condition) > 1){
                $fileInfo = $db->getFileById($condition[1]);
                $tag = new MongoId($condition[0]);
                $selectedFilter = clone $this;
                $pathItem = $db->getTagInfo($tag);
                $selectedFilter->select($condition);
                $selectedFilter->remove($condition[0]);
                $pathItem['filter'] = $selectedFilter->getURL();
                $selectedFilter->remove();
                $selectedFilter->add($condition[0]);
                $pathItem['delete'] = $selectedFilter->getURL();
                unset($selectedFilter);
                $pathItem['name'] = $pathItem['name'] . ' : ' . $fileInfo['name'];
                $path[] = $pathItem;

            }

            else {
                $tag = new MongoId($condition[0]);
                $selectedFilter = clone $this;
                $pathItem = $db->getTagInfo($tag);
                $condition = array($pathItem['id']);
                $selectedFilter->select($condition);
                $pathItem['filter'] = $selectedFilter->getURL();
                $selectedFilter->remove();
                $pathItem['delete'] = $selectedFilter->getURL();
                unset($selectedFilter);
                $path[] = $pathItem;

            }
        }

        return $path;
    }

    function getBackURL() {
        global $db;
        $backfilter = clone $this;
        $current = $backfilter->getCurentCondition();
        $backfilter->remove();
        $backfilter->add($db->getParentId($current));
        $url = $backfilter->getURL();
        unset($backfilter);
        return $url;

    }

    function getDeleteURL($condition) {
        $newfilter = clone $this;
        $newfilter->remove($condition);
        $url = $newfilter->getURL();
        unset($newfilter);
        return $url;

    }


}