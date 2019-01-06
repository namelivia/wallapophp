# Wallapophp [![Build Status](https://travis-ci.com/namelivia/wallapophp.svg?branch=master)](https://travis-ci.com/namelivia/wallapophp) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/5051a50d47f04ff3bc07cb21070a60ec)](https://app.codacy.com/app/ohcan2/wallapophp?utm_source=github.com&utm_medium=referral&utm_content=namelivia/wallapophp&utm_campaign=Badge_Grade_Dashboard)

PHP Wallapop client library heavyly based on <a href="https://github.com/toniprada/wallapopy">wallapopy</a>

Currently implements the following endpoints:
* User
  * Profile
  * Sold items
  * Unsold items
  * Reviews sent
  * Reviews received
* Item search

More endpoints to come.

## Requirements

[PHP >= 7.1](https://php.net) and [composer](https://getcomposer.org)

## Installation
For installing the library you must require it as a VCS repository at the moment. So
1. Add `"namelivia/wallapophp": "dev-master",` to the require section of your `composer.json` file.
2. Add this to the `repositories` section of your `composer.json` file
```json
    {
      "type": "vcs",
      "url": "git@github.com:namelivia/wallapophp.git"
    },
```
3. Execute `composer install`

## Usage
Once you have installed Wallapophp you can request a new
instance by writing this line in your code.
```php
$wallapop = \Namelivia\Wallapophp\ServiceProvider::build();
```

Then you can start calling it's methods that will all
return a json string with the result like so:
```php
$wallapop->userReviewsReceived('40000000');
```

## Contributing
Any suggestion, bug reports or any other kind enhacements are welcome. Just [open an issue first](https://github.com/namelivia/wallapophp/issues/new), for creating a PR, remember this project has linting checkings and unit tests so any PR should comply with both before beign merged, this checks will be automatically applied when opening or modifying the PR's.
