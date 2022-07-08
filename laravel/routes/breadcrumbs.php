<?php

// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;
// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Location
Breadcrumbs::for('locations.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Locations', route('locations.index'));
});

// Home > Category
Breadcrumbs::for('categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Categories', route('categories.index'));
});

// Home > About
Breadcrumbs::for('about.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('About', route('about.index'));
});

// Home > About > Book
Breadcrumbs::for('about.book', function (BreadcrumbTrail $trail) {
    $trail->parent('about.index');
    $trail->push('Book', route('about.book'));
});

// Home > Contact
Breadcrumbs::for('contact.create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contact', route('contact.create'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});
