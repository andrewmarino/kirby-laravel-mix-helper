<?php

use Kirby\Toolkit\Str;

/**
 * Laravel Mix helper for Kirby.
 * @since 3.0.0
 */
Kirby::plugin('laravel/mix', [
  'options' => [
    'manifest_directory' => 'assets'
  ]
]);

if (!function_exists('mix')) {
  /**
   * Get the path to a versioned Mix file (lightly modified and adapted for a Kirby 3 plugin).
   * @source https://github.com/laravel/framework
   *
   * @param  string  $path
   * @return string
   *
   * @throws \Exception
   *
   */
  function mix($path) {
    static $manifests = [];

    $manifestDirectory = option('laravel.mix.manifest_directory');
    $manifestPath = $manifestDirectory.'/mix-manifest.json';
    if (!isset($manifests[$manifestPath])) {
      if (!file_exists($manifestPath)) {
        throw new Exception('The Mix manifest does not exist.');
      }
      $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
    }

    if (!Str::startsWith($path, '/')) {
      $path = "/{$path}";
    }

    if (!Str::startsWith($manifestDirectory, '/')) {
      $manifestDirectory = "/{$manifestDirectory}";
    }

    $manifest = $manifests[$manifestPath];
    if (!isset($manifest[$path])) {
      throw new Exception("Unable to locate Mix file: {$path}.");
    }

    return $manifestDirectory.$manifest[$path];
  }
}
