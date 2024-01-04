# Bagisto REST API

<p>Bagisto REST API is a medium to use the features of the core Bagisto System. By using Bagisto REST API, you can integrate your application to serve the default content of Bagisto.</p>

### 1. Requirements:

* **Bagisto**: v2.0

### 2. Installation:

##### To install Bagisto REST API from your console:

~~~
composer require bagisto/rest-api dev-master
~~~

##### Add below options in the .env file (i.e. http://localhost/public your domain):

~~~
SANCTUM_STATEFUL_DOMAINS=http://localhost/public
~~~

##### To configure the REST API L5-Swagger Documentation run below command:

~~~
php artisan bagisto-rest-api:install
~~~

#### To check the Admin end API documentation:

~~~
http://localhost/public/api/admin/documentation
~~~

#### To check the Shop end API documentation:

~~~
http://localhost/public/api/shop/documentation
~~~

* You can check the <a href="https://github.com/DarkaOnLine/L5-Swagger"> L5-Swagger </a> guidelines too regarding the configuration the API documentation.

~~~
http://localhost/bagisto2.0beta/bagisto/public/api/v1/customer/login
~~~

* for login the customer add the HasApiTokens in the Webkul\Customer\Models\Customer
use in namespace in admin model use Laravel\Sanctum\HasApiTokens;
use Webkul\Product\Models\ProductReviewProxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Webkul\Sales\Models\InvoiceProxy;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Webkul\Sales\Models\OrderProxy;

~~~
http://localhost/bagisto2.0beta/bagisto/public/api/v1/admin/login
~~~

* for login the admin add the HasApiTokens in the Webkul\User\Models\admin
use in namespace in admin model use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Webkul\User\Database\Factories\AdminFactory;
use Webkul\User\Contracts\Admin as AdminContract;
use Webkul\Admin\Mail\Admin\ResetPasswordNotification;

~~~
In sanctum.php add 
~~~
'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),

~~~
on app/Http/Kernel.php
     'api' => [
            //           \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        add    \App\Http\Middleware\EncryptCookies::class,
        add    \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

