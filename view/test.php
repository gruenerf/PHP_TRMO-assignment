<?php

include "../config.php";
use EntryModel as Entry;
use UserModel as User;
use CategoryModel as Category;
use ErrorModel as Error;
use TopicModel as Topic;


/*$admin = new User('admin1','passwort1','admin');
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
$entry->delete();*/

//$cat = CategoryRepository::getInstance()->getById(58);
//$top = TopicRepository::getInstance()->getAllTopicByCategory($cat);
//var_dump($top);
//$quak = EntryRepository::getInstance()->getAllEntryByTopic($top[0]);
//var_dump($quak);
/*ErrorRepository::getInstance()->create('asdasdasdasd');
$usr = UserRepository::getInstance()->create('adminasdasdasd1232','asdasd','admin');

EntryRepository::getInstance()->create('tit123el1', 'asdasdsdsdsdasdasdasd', $usr, $top);*/

$top= TopicRepository::getInstance()->searchForTopic('top');
var_dump($top);

$entry = EntryRepository::getInstance()->searchForEntry('1');
var_dump($entry);