<?php

//foreach (glob("src/model/*.php") as $filename){
//    require_once($filename);
//}
//var_dump($filename);

require_once('src/interface/activeRecord.php');
require_once('src/util/db.php');
require_once('src/abstract/activeRecord.php');
require_once('src/model/user.php');
require_once('src/model/tweet.php');
require_once('src/model/comment.php');
require_once('src/model/message.php');
