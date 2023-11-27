<?php

require_once __DIR__ . '/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

$app = new Jenssegers\Lean\App();

$container = $app->getContainer();

$container->get('settings')->set('displayErrorDetails', true);

$container->get('settings')->set('db', [
    'driver' => 'pgsql',
    'host' => '127.0.0.1',
    'database' => 'slimadr',
    'username' => 'alexgarrett',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection($container->get('settings')->get('db'));

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container->share('view', function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => $container->settings['views']['cache']
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
});

require_once __DIR__ . '/../routes/api.php';
