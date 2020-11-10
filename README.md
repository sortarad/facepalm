# Facepalm

Dad jokes for Statamic

## Installation

Install via the Control Panel or via composer

```bash
composer require sortarad/facepalm
```

### Manual Installation

Create directory `sortarad` in `addons` directory and clone project there.

In your project root’s composer.json, add your package to the require and repositories sections, like so:

```json
{
    "require": {
        "sortarad/facepalm": "*"
    },
    "repositories": [
        {
            "type": "path",
            "url": "addons/sortarad/facepalm"
        }
    ]
}
```

Run composer update from your project root (not your addon directory).

```bash
composer update
```

## Enable Widget

Add widget to control panel configuration `config/statamic/cp.php` file.

e.g:
```php
[
	'type' => 'facepalm',
	'width' => 50,
],
```
