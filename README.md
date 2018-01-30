# very simple package with roles and middleware

* `composer require bu4ak/roles:@dev`
* `php artisan vendor:publish --provider="Bu4ak\Roles\RolesServiceProvider"`
* `php artisan migrate`
* add `HasRoles` trait to `App\User` class