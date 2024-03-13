# Bagisto REST API

<p>Bagisto REST API is a medium to use the features of the core Bagisto System. By using Bagisto REST API, you can integrate your application to serve the default content of Bagisto.</p>

### 1. Requirements:

* **Bagisto**: v2.1.2

### 2. Installation:

##### To install Bagisto REST API from your console:

#### For the master version:
~~~
composer require bagisto/rest-api:dev-master
~~~

***Note:*** It is not recommended to use the master version as it may contain breaking changes.

##### Add below options in the .env file (i.e. http://localhost/public your domain):

~~~
SANCTUM_STATEFUL_DOMAINS=http://localhost/public
~~~

##### To configure the REST API L5-Swagger Documentation run below command:

~~~
php artisan bagisto-rest-api:install
~~~

##### To check the Admin end API documentation:

~~~
http://localhost/public/api/admin/documentation
~~~

##### To check the Shop end API documentation:

~~~
http://localhost/public/api/shop/documentation
~~~

* You can check the <a href="https://github.com/DarkaOnLine/L5-Swagger"> L5-Swagger </a> guidelines too regarding the configuration the API documentation.