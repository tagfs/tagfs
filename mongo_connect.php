<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pavel Kupreev
 * Date: 20.05.13
 * Time: 11:43
 */

$mongo = new Mongo();
$mongo = $mongo->selectCollection('tag','tags');

$mongo_objects = new Mongo();
$mongo_objects = $mongo_objects->selectCollection('tag','objects');
