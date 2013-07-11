<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pavel Kupreev
 * Date: 20.05.13
 * Time: 12:02
 * To change this template use File | Settings | File Templates.
 */





class dbAPI {


    // Files // $mongo_objects
    function getRootId() {
        global $mongo;
        $result = $mongo->findOne(array('root' => true), array('_id'));

        if($result) return $result['_id']->__toString();

        return false;
    }

    function getFiles($aFilter) { // выбрать файлы по фильтру

        $mongoFilter = array();
        foreach($aFilter as $condition){

            if(count($condition) > 1){
                $filterItem = array();
                 foreach ($condition as $item) {
                     $filterItem[] = new MongoId($item);
                 }
                $mongoFilter[] = $filterItem;
            }

            else {
                $mongoFilter[] = new MongoId($condition[0]);

            }
        }


        $files = array();
        $mongoQuery = array();

        // собираем запрос на выборку файлов по тегам и их потомкам
        foreach($mongoFilter as $condition){

            if(!$subNodes = $this->getChildren($condition))
                $subNodes = array();

            $subNodes[] = $condition;
            $mongoQuery['$and'][] = array('relations' => array('$in' => $subNodes));
        }



        global $mongo_objects;
        $res = $mongo_objects->find($mongoQuery);
        foreach ($res as $file) $files[] = $file;
/*
        $tag = $this->getChildren($id);
        $children = array();

        if (!isset($tag[0])) return $files;
        foreach ($tag as $item)  $children[] = $item;

        foreach ($children as $item) {
            $tag = new MongoId($item['id']);
            $res = $mongo_objects->find(array('relations' => $tag));
            foreach ($res as $file) $files[] = $file;
        }
*/
        return $files;
    }

    function setFile($name,$link,$relations) {
        global $mongo_objects;
        $mongo_objects->insert(array('name'      => $name,
                                     'link'      => $link,
                                     'relations' => $relations ));
    }

    function updateFile($id,$name,$link, $relations) {
        global $mongo_objects;
        $file = new MongoId($id);
        $mongo_objects->update(array('_id' => $file),
                               array('$set' => array('name'       => $name,
                                                     'link'       => $link,
                                                      'relations' => $relations )));

    }

    function delFile($id) {
        global $mongo_objects;
        $file = new MongoId($id);
        $mongo_objects->remove(array('_id' => $file));
    }

    function pushRelationToFile($id,$relations) {
        global $mongo_objects;
        $file = new MongoId($id);
        $mongo_objects->update(array('_id' => $file),
                               array('$push' => array('relations' => $relations)));

    }

    function pullRelationToFile($id,$relations) {
        global $mongo_objects;
        $file = new MongoId($id);
        $mongo_objects->update(array('_id' => $file),
                               array('$pull' => array('relations' => $relations)));
    }

    function getFileById($id) {
        global $mongo_objects;
        $file = new MongoId($id);
        $result = $mongo_objects->findOne(array('_id' => $file));
        if (!isset($result)) return false;
        return $result;
    }

    function getRelationsFileById($id) {
        global $mongo_objects;
        $file = new MongoId($id);
        $result = $mongo_objects->findOne(array('_id' => $file));
        if (!isset($result)) return false;
        return $result['relations'];
    }

    function getTagsConnectedToFile($id) {
        global $mongo_objects;
        $file = new MongoId($id);
        $result = $mongo_objects->findOne(array('_id' => $file));
        if (!isset($result)) return false;
        $tags = array();
        foreach ($result as $item) {
            $tags[] = $this->getTagInfo($item);
        }
        return $tags;
    }



    //---------------

    function setTag($parentId,$name) {
        global $mongo;
        // Добавляем элемент
        $parent = new MongoId($parentId);


        $mongo->insert(array('name'   => $name,
                             'parent' => $parent));
        // Определяем новый обьект
        $tag = $mongo->findOne(array('name' => $name));



        // Добавляем его в children родителям
        $parent = new MongoId($parentId);
        $parent = $mongo->findOne(array('_id' => $parent));
        $parent['children'][] = $tag['_id'];
        $mongo->save($parent);
        $mongo->update(array('children' => $parent['_id']),
                       array('$push' => array('children' => $tag['_id'])),
                       array("multiple" => true));

    }

    function pullChildrenToTag($id,$children) {
        global $mongo;
        $tag = new MongoId($id);
        $mongo->update(array('_id' => $tag),
                       array('$push' => array('children' => $children)));

    }

    function deleteTag($id) {
        global $mongo;
        $tag = new MongoId($id);
        $mongo->remove(array('_id' => $tag));
        $mongo->update(array('children' => $tag),
                       array('$pull' => array('children' => $tag)),
                       array("multiple" => true));
        }
    function updateName($id,$name) {
        global $mongo;
        $tag = new MongoId($id);
        $mongo->update(array('_id' => $tag),
                       array('$set' => array('name' => $name)));
    }

    function getChildrenId($id) {
        global $mongo;
        $tag = new MongoId($id);
        $object = $mongo->findOne(array('_id' => $tag));
        if (!isset($object['children'])) return false;
        return $object['children'];
    }
    function getChildren($id) {
        global $mongo;
        $tag = new MongoId($id);
        $object = $mongo->findOne(array('_id' => $tag));
        if (!isset($object['children'])) return array();
        return $object['children'];
    }

    function getParentId($condition) {
        $id = $condition[0];
        if (count($condition) > 1) {
            $select = new MongoId($id);
            $parent = $this->getTagInfo($select);
        }
        else {
            $select = new MongoId($id);
            $tag = $this->getTagInfo($select);
            if ($tag == 0) return false;
            $parent = $this->getTagInfo($tag['parent']);
        }
        return $parent['id'];
    }

    function getFirstChildren($condition) {
        global $mongo;
        $id = $condition[0];
        if (count($condition) > 1) {

        }
        else {

            $tag = new MongoId($id);
            $object = $mongo->findOne(array('_id' => $tag));
            $result = array();





            if (!isset($object['children'])) return false;
            foreach ($object['children'] as $item) {
                if ($object['parent'] = $tag)  {
                    $row = $this->getTagInfoByParent($item,$tag);
                    if ($row) $result[] = $row;
                }
            }
            return $result;
        }

    }
    function getTagInfoByParent($tag,$parent) {
        global $mongo;
        $object = $mongo->findOne(array('_id'    => $tag,
                                        'parent' => $parent));
        if (!$object) return false;
        $tagId = (array)$object['_id'];
        $tagId = $tagId['$id'];
        $result['id'] = $tagId;
        $result['name'] = $object['name'];
        $result['parent'] = $object['parent'];
        if (isset($object['portal'])) $result['portal'] = $object['portal'];
        return $result;
    }
    function getTagInfo($tag) {
        global $mongo;
        $object = $mongo->findOne(array('_id' => $tag));
        if (!$object) return false;
        $tagId = (array)$object['_id'];
        $tagId = $tagId['$id'];
        $result['id'] = $tagId;
        $result['name'] = $object['name'];
        $result['parent'] = $object['parent'];
        if (isset($object['portal'])) $result['portal'] = $object['portal'];

        return $result;
    }
    function getPath($id) {
        global $mongo;
        $tag = new MongoId($id);
        $objects = $mongo->find(array('children' => $tag));
        if (!$objects) return false;
        $result = array();
        foreach ($objects as $item) {
            if ($item['name']  <> '/') {
                $row = (array)$item;
                $row['id'] = $item['_id'];
                $result[] = $row;
            }
        }

        return $result;
    }


}


