<?php
$redis = new Redis();
$redis->connect('redis', 6379);
$count = $redis->exists('count') ? $redis->get('count') : 1;
echo $count;
echo phpinfo();

die;