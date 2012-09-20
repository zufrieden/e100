<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$localeRegExp = '(fr|en)'; 

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;

$app->get('/{_locale}/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage_i18n')
->assert('_locale', $localeRegExp);
;

$app->get('/{_locale}/categories', function () use ($app) {
    return $app['twig']->render('categories.html.twig', array());
})
->bind('categories')
->assert('_locale', $localeRegExp);
;

$app->get('/{_locale}/random', function () use ($app) {
    return $app['twig']->render('random.html.twig', array());
})
->bind('random')
->assert('_locale', $localeRegExp);
;

$app->get('/{_locale}/favorites', function () use ($app) {
    return $app['twig']->render('favorites.html.twig', array());
})
->bind('favorites')
->assert('_locale', $localeRegExp);
;

$app->get('/{_locale}/notes', function () use ($app) {
    return $app['twig']->render('notes.html.twig', array());
})
->bind('notes')
->assert('_locale', $localeRegExp);
;

$app->get('/{_locale}/last', function () use ($app) {
    return $app['twig']->render('last.html.twig', array());
})
->bind('last')
->assert('_locale', $localeRegExp);
;

$app->get('cache/clear', function () use ($app) {

    $cacheDir = $app['twig']->getCache();
    $finder = new Symfony\Component\Finder\Finder();

    foreach($finder->in($cacheDir)->files() as $file) {
        print "- ".$file->getRealpath()."<br>\n";
        unlink($file->getRealpath());
    }

    foreach($finder->in($cacheDir)->directories() as $file) {
        //print "- ".$file->getRealpath()."<br>\n";
        //rmdir($file->getRealpath());
    }
    
    $response = 'cache:clear';

    return $response;
})
->bind('cache_clear');

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html' : '500.html';

    return new Response(file_get_contents(__DIR__.'/../templates/'.$page), $code);
});