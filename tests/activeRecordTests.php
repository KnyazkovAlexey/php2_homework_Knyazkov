<?php

require __DIR__.'/../autoload.php';

$article = new \App\Models\Article();
assert($article->isNew());

$article->title = 'Новость №1';
assert($article->save());
assert(!$article->isNew());

$article->title = 'Новость №2';
assert($article->save());

assert($article->delete());
assert($article->isDeleted());
assert(!$article->isNew());

assert(!$article->save());
assert(!$article->delete());