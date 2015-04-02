<?php

include "../config.php";
use EntryModel as Entry;
use UserModel as User;
use CategoryModel as Category;
use ErrorModel as Error;
use TopicModel as Topic;


$admin = new User('admin1','passwort1','admin');
$admin->save();
$admin->setName('asdasdd');
$admin->save();
$admin->delete();

$category = new Category('cat1');
$category->save();
$category->setName('asdasdasd');
$category->save();
$category->delete();

$topic = new Topic('top1', $category->getId());
$topic->save();
$topic->setName('asdasdasdasd');
$topic->save();
$topic->delete();

$error = new Error('message1');
$error->save();
$error->setErrormessage('asdasdasdasdas');
$error->save();
$error->delete();

$entry = new Entry("entry2211","contasdjaklsdjlkasjdlkasjdkljasdljaskldjaksdjkasdj", $admin->getId(), $topic->getId());
$entry->save();
$entry->setTitle('blaaaaa');
$entry->save();
$entry->delete();

$rep = new CategoryRepository();
$obj = $rep->create('hallo');

$array = $rep->getAll();

var_dump($array);