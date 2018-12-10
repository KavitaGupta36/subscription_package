# Subscription Package

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

It will create a complete subscription functionality except Payment Gateway.
Here we provide subscription CRUD with search and pagination. Here Admin can assign subscription plan to user.


## Installation

Via Composer

``` bash
$ composer require hestalabs/subscription ">=1.0"
```

or you can just add it in your composer.json

```
"require": {
    "hestalabs/subscription": ">=1.0"
}
```

Next, run `composer update`.


## Usage

a). Add in `providers` array,

'providers' => array(
    // ...

    Hestalabs\Subscription\SubscriptionServiceProvider::class,
);

b). Finally publish the package configurations by running the following command in `Terminal`

`php artisan vendor:publish --provider="Hestalabs\Subscription\SubscriptionServiceProvider"`

c) migrate database using `php artisan migrate`

d) Access in browser `/subscription` or `/user_subscription`

## Security

If you discover any security related issues, please email friends@gmail.com instead of using the issue tracker.

## Credits

- [Kavita]

## License

license. Please see the [license file](license.md) for more information.
       

