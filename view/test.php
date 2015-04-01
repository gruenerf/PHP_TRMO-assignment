<?php

include "../config.php";
use EntryModel as Entry;
use AdminModel as Admin;
use CategoryModel as Category;
use ErrorModel as Error;
use TopicModel as Topic;
use WriterModel as Writer;

$entry = new Entry("entry2211","contasdjaklsdjlkasjdlkasjdkljasdljaskldjaksdjkasdj");
$entry->save();
$entry->setTitle('blaaaaa');
$entry->save();
$entry->delete();

$admin = new Admin('admin1','passwort1');
$admin->save();
$admin->setName('asdasdd');
$admin->save();
$admin->delete();

$category = new Category('cat1');
$category->save();
$category->setName('asdasdasd');
$category->save();
$category->delete();

$error = new Error('message1');
$error->save();
$error->setErrormessage('asdasdasdasdas');
$error->save();
$error->delete();

$topic = new Topic('top1');
$topic->save();
$topic->setName('asdasdasdasd');
$topic->save();
$topic->delete();

$writer = new Writer('wrtier1', 'pass2');
$writer->save();
$writer->setName('asdasdasd');
$writer->save();
$writer->delete();

$rep = new CategoryRepository();
$obj = $rep->create('hallo');

$array = $rep->getAll();

var_dump($array);