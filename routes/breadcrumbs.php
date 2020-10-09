<?php

// Dashboard
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Categories
// Dashboard > Categories
Breadcrumbs::for('admin.categories.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Categories', route('admin.categories.index'));
});


// Dashboard > Categories > create
Breadcrumbs::for('admin.categories.create', function ($trail) {
    $trail->parent('admin.categories.index');
    $trail->push('Create Category', route('admin.categories.create'));
});

// Dashboard > Categories > Edit
Breadcrumbs::for('admin.categories.edit', function ($trail, $category) {
    $trail->parent('admin.categories.index');
    $trail->push('Edit Category', route('admin.categories.edit', $category));
});

// Products
// Dashboard > Products
Breadcrumbs::for('admin.products.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Products', route('admin.products.index'));
});


// Dashboard > Categories > Create
Breadcrumbs::for('admin.products.create', function ($trail) {
    $trail->parent('admin.products.index');
    $trail->push('Create product', route('admin.products.create'));
});

// Dashboard > Categories > Edit
Breadcrumbs::for('admin.products.edit', function ($trail, $category) {
    $trail->parent('admin.products.index');
    $trail->push('Edit Product', route('admin.products.edit', $category));
});
