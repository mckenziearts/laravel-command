# Laravel-command

[![Latest Stable Version](https://poser.pugx.org/mckenziearts/laravel-command/version)](https://packagist.org/packages/mckenziearts/laravel-command)
[![License](https://poser.pugx.org/mckenziearts/laravel-command/license)](https://packagist.org/packages/mckenziearts/laravel-command)
[![Build Status](https://scrutinizer-ci.com/g/Mckenziearts/laravel-command/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Mckenziearts/laravel-command/build-status)
[![Total Downloads](https://poser.pugx.org/mckenziearts/laravel-command/downloads)](https://packagist.org/packages/mckenziearts/laravel-command)


Simple package to quickly generate Laravel templated Repository, Helpers and Observer files.

## Install

Via Composer

``` bash
$ composer require mckenziearts/laravel-command --dev
```

For Laravel 5.5 - you're done.

For Laravel 5.4 or 5.3 you'll only want to use these commands for ```local``` development, so you don't want to update the ```production``` providers array in ```config/app.php```. Instead, add the provider in ```app/Providers/AppServiceProvider.php```, like so:

```php
public function register()
{
    if ($this->app->environment() == 'local') {
        $this->app->register('Mckenziearts\LaravelCommand\LaravelCommandServiceProvider');
    }
}
```

## Usage

By default Laravel does not allow to generate observers or even does not allow to take the notion of repository as Symfony. To generate its elements you can use the following commands

Open the console and enter this command to generate a new repository :

```shell
php artisan make:repository {Entity}
```

The generate file look like this :

```php
namespace App\Repositories;

use App\Models\Entity;

class EntityRepository
{
    /**
     * @var Entity
     */
    private $model;

    /**
     * EntityRepository constructor.
     * @param Entity $model
     */
    public function __construct(Entity $model)
    {
        $this->model = $model;
    }

    /**
     * Return a new instance of Entity Model
     *
     * @return Entity
     */
    public function newInstance()
    {
        return $this->model->newInstance();
    }
}
```

By default Repository load Model in the default application namespace `App\Models` If your models are in another namespace, it will be necessary to change the use in the repository to have no error like :

```php
use MODELS\NAMESPACE\Entity;
```

This is the same action to perform for the observers, it also loads the models in the namespace App\Models. To generate an observer, you must execute the command:

```shell
php artisan make:observer {Entity}
```

The generate file look like this :

```php
namespace App\Observers;

use App\Models\Entity;

class EntityObserver
{
    /**
     * Trigger Before Create a Entity
     *
     * @param Entity $model
     */
    public function creating(Entity $model){}

    /**
     * Trigger after create a Entity
     *
     * @param Entity $model
     */
    public function created(Entity $model){}

    /**
     * Trigger before update a Entity
     *
     * @param Entity $model
     */
    public function updating(Entity $model){}

    ...
}

```

- Helper files

``` bash
$ php artisan make:helper {Entity}
```

The generate file look like this :

```php
namespace App\Helpers;

class EntityHelper
{

}
```

If you need better distribut your code, you can create a helper to put a logic to lighten your controllers.

An example of a helper that I often use in my projects

```php
namespace App\Helpers;

use Intervention\Image\Facades\Image;

class MediaHelper
{
    /**
     * @protected
     *
     * @var string $dir, the file uploaded path
     */
    protected static $dir = 'uploads';

    /**
     * @return string
     */
    public static function getUploadsFolder()
    {
        return self::$dir;
    }

    /**
     * Return the size of an image
     *
     * @param string $file
     * @param string $folder
     * @return array $width and $height of the file give in parameter
     */
    public static function getFileSizes(string $file, string $folder = null)
    {
        if ($folder) {
            list($width, $height, $type, $attr) = getimagesize(public_path(self::$dir.'/'. $folder .'/'.$file));
        }
        list($width, $height, $type, $attr) = getimagesize(public_path(self::$dir.'/'.$file));

        return [
            'width'     => $width,
            'height'    => $height
        ];
    }

    /**
     * resize, To rezise and image
     *
     * @param string    $file      file to rezise
     * @param int       $width     width of the file
     * @param int       $height    height of the file
     * @param string    $filepath  path to save file
     */
    public static function resize($file, $width, $height, $filepath)
    {
        Image::make($file)->resize($width, $height)->save($filepath);
    }

    /**
     * getImageWeight
     *
     * @param $octets
     * @return string
     */
    public static function getImageWeight($octets) {
        $resultat = $octets;
        for ($i = 0; $i < 8 && $resultat >= 1024; $i++) {
            $resultat = $resultat / 1024;
        }
        if ($i > 0) {
            return preg_replace('/,00$/', '', number_format($resultat, 2, ',', ''))
                . ' ' . substr('KMGTPEZY', $i-1, 1) . 'o';
        } else {
            return $resultat . ' o';
        }
    }

}

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## License

The MIT License (MIT).