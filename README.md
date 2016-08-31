Mime Types
==========

Converts mime types to the proper file extensions and vice versa.

Installation
------------

```php
composer require magyarjeti/mime-types
```

Usage
-----

Create a new mime type converter instance:

```php
use Magyarjeti\MimeTypes\MimeTypeConverter;

$converter = new MimeTypeConverter;
```

Get the proper mime type for a file extension:

```php
echo $converter->toMimeType('jpeg');
```

or find a file extension to the given mime type:

```php
echo $converter->toExtension('image/jpeg');
```

Multiple extensions could belong to the same mime type so the code above will
return with the first matching one.

Development
-----------

Create the Docker based development environment:

```php
make dev
```

Check the coding style and run unit tests:

```php
make test
```
