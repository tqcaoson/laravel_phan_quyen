<!-- Install Package -->
composer require spatie/laravel-permission

<!-- Add provider -->
'providers' => [
	Spatie\Permission\PermissionServiceProvider::class,
],






<!-- Composer json -->
"laravelcollective/html": "^5.4"

<!-- Add Provider -->
'providers' => [

	Collective\Html\HtmlServiceProvider::class,

],

<!-- Add Provider -->
'aliases' => [

  	'Form' => Collective\Html\FormFacade::class,

  	'Html' => Collective\Html\HtmlFacade::class,

],


<!-- Create roles -->
php artisan permission:create-role storekeeper


<!-- Clear cache -->
php artisan permission:cache-reset


