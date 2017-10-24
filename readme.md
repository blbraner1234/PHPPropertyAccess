## Synopsis

PropertyAccess is a small PHP package that will allow you to access your class methods as though there are properties.
This works by utilizing __set, __get, and __isset magic methods.
By using the above magic methods this also allows you to do this with non existent or private properties as well.

This is setup to mimic using Python's @property decorator 

## Code Example

Lets say you have a User class that want to be able to set the firstName, lastName, and email on.
You want to be able to automaticlly construct the email from the firstName.lastName@example.com
Normally you would have something such as the example below
```php
<?php

class User
{

    public $firstName = '';
    public $lastName  = '';
    
    public function __constructor($firstName, $lastName)
    {
        $this->firstName =  $firstName;
        $this->lastName  =  $lastName;
    }

    public function email()
    {
        return "{$this->firstName}.{$this->lastName}@example.com";
    }    

}

$user = new User('John', 'Doe');
echo $user->email(); //John.Doe@example.com
```

However what if you want to be able to access the email address as a property? 
By annotating the method call with @property you can do just that.

```php
<?php

//require composer autoloader
require 'vendor/autoload.php';

//include the trait
use teleiosis\PropertyAccess\traits\PropertyAccess;
class User
{
    use PropertyAccess;

    public $firstName = '';
    public $lastName  = '';
    
    public function __constructor($firstName, $lastName)
    {
        $this->firstName =  $firstName;
        $this->lastName  =  $lastName;
    }

    /**
    *@property
    */
    public function email()
    {
        return "{$this->firstName}.{$this->lastName}@example.com";
    }    

}

$user = new User('John', 'Doe');
echo $user->email; //John.Doe@example.com
```

You can also pass an array as arguments for your decorated methods

```php
<?php

//require composer autoloader
require 'vendor/autoload.php';

//include the trait
use teleiosis\PropertyAccess\traits\PropertyAccess;
class User
{
    use PropertyAccess;

    /**
    *@property
    */
    public function email($args = array())
    {
        return "{$args['firstName']}.{$args['lastName']}@example.com";
    }    

}

$user = new User();
$user->email = ['firstName' => 'John', 'lastName' => 'Doe'];
echo $user->email; //John.Doe@example.com
```

## Installation

Install with composer

```
composer require teleiosis/property_access
```

## Tests

Tests are ran via PHPUnit

## Contributors

Brandon Braner
