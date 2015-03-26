<?php

include "../model/interface/BaseModelInterface.php";
include "../model/interface/EntryModelInterface.php";
require "../model/Database.php";
include "../model/EntryModel.php";

$entry = new EntryModel("entry1","contasdjaklsdjlkasjdlkasjdkljasdljaskldjaksdjkasdj");
$entry->setTitle('blaaaaa');
$entry->delete();