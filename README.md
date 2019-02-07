# Kirby Laravel Mix Helper
Laravel’s `mix()` helper function adapted to a Kirby 3 plugin.

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>App</title>
    <link rel="stylesheet" href="<?php echo mix('css/app.css'); ?>" />
  </head>
  <body>
    <div id="app"><h1>Hello World</h1></div>

    <script src="<?php echo mix('js/app.js'); ?>"></script>
  </body>
</html>
```

## Installing
### Manual
Grab a ZIP of this repo and place everything into `site/plugins/kirby-laravel-mix-helper`.

### Composer
_In progess!_

## Options
This plugin assumes the location of `mix-manifest.json` and its referenced files are in the default `assets` folder of your Kirby installation.

For custom folder setups, the path can be updated with the following setting in your Kirby site config:

```php
/**
 * /site/config/config.php
 */
return [
  'laravel.mix.manifest_directory' => 'assets'
];
```

## Further Reading
* Kirby: https://getkirby.com
* Laravel Mix: https://laravel-mix.com/

## License
[MIT](https://opensource.org/licenses/MIT)
