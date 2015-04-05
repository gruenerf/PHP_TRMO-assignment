<?php


$user = UserRepository::getInstance()->create('user1234567','password123','admin');
$category = CategoryRepository::getInstance()->create('category3', $user);
$topic = TopicRepository::getInstance()->create('topic3', $category, $user);


//$cat = CategoryRepository::getInstance()->getById(58);
//$top = TopicRepository::getInstance()->getAllTopicByCategory($cat);
//var_dump($top);
//$quak = EntryRepository::getInstance()->getAllEntryByTopic($top[0]);
//var_dump($quak);
/*ErrorRepository::getInstance()->create('asdasdasdasd');
$usr = UserRepository::getInstance()->create('adminasdasdasd1232','asdasd','admin');

EntryRepository::getInstance()->create('tit123el1', 'asdasdsdsdsdasdasdasd', $usr, $top);*/


//$topic = TopicRepository::getInstance()->getTopicsPopularity('asc');
