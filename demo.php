<?php
/*
This is just a demo script to see how to use the library
and also for using it as an acceptance test.
*/
require __DIR__.'/vendor/autoload.php';
$client = \Namelivia\Wallapophp\ServiceProvider::build();
echo 'User method:';
var_dump($client->user('40000000'));

echo 'User received:';
var_dump($client->userReviewsReceived('40000000'));

echo 'User sent:';
var_dump(json_decode($client->userReviewsSent('40000000')));

echo 'User items published:';
var_dump(json_decode($client->userItemsPublished('40000000')));

echo 'User items sold:';
var_dump(json_decode($client->userItemsSold('40000000')));

echo 'Search';
var_dump(json_decode($client->search('40.24', '3.41', 'Dreamcast')));
