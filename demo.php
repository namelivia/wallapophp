<?php
/*
This is just a demo script to see how to use the library
and also for using it as an acceptance test.
*/
require __DIR__.'/vendor/autoload.php';
$client = \Namelivia\Wallapophp\ServiceProvider::build();
echo 'User method:';
echo "\n";
echo $client->user('40000000');
echo "\n";

echo 'User received:';
echo "\n";
echo $client->userReviewsReceived('40000000');
echo "\n";

echo 'User sent:';
echo "\n";
echo $client->userReviewsSent('40000000');
echo "\n";

echo 'User items published:';
echo "\n";
echo $client->userItemsPublished('40000000');
echo "\n";

echo 'User items sold:';
echo "\n";
echo $client->userItemsSold('40000000');
echo "\n";

echo 'Search';
echo "\n";
echo $client->search('40.24', '3.41');
echo "\n";
