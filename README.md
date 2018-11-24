## Very simple package with roles and middleware

#### Installation:
```bash
 composer require bu4ak/roles
 php artisan vendor:publish --provider="Bu4ak\Roles\RolesServiceProvider"
 php artisan migrate
 add 'HasRoles' trait to 'App\User' class
```
#### Usage example:
set admin role to user:
```php
$user = User::first();
$user->role_id = RoleType::ADMIN; // MANAGER or USER
$user->save();
```
and add middleware `admin` (`manager` or `user`) to route:
```php
Route::get('/', function () {
    return view('welcome');
})->middleware('admin');
```
