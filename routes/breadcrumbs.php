<?php

// Login
Breadcrumbs::for('login', function ($trail) {
    $trail->push('Login', route('login'));
});

// Register
Breadcrumbs::for('register', function ($trail) {
    $trail->push('Register', route('register'));
});

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Servers
Breadcrumbs::for('servers.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Servers', route('servers.index'));
});

// Home > Admin > Locations
Breadcrumbs::for('admins.locations', function ($trail) {
    $trail->parent('admins.dashboard');
    $trail->push('Locations', route('admins.locations'));
});

Breadcrumbs::for('locations.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Locations', route('locations.index'));
});

// Home > Locations > Location
Breadcrumbs::for('locations.show', function ($trail, $location) {
    $trail->parent('locations.index');
    $trail->push("Viewing $location->short", route('locations.show', $location));
});

// Home > Transaction
Breadcrumbs::for('transactions.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Transactions', route('transactions.index'));
});

// Home > Orders
Breadcrumbs::for('orders.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Orders', route('orders.index'));
});

// Home > Orders
Breadcrumbs::for('orders.create', function ($trail) {
    $trail->parent('orders.index');
    $trail->push('New order', route('orders.create'));
});

// Home > Coupons
Breadcrumbs::for('coupons.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Coupons', route('coupons.index'));
});

// Home > Coupons > Viewing coupon
Breadcrumbs::for('coupons.show', function ($trail, $coupon) {
    $trail->parent('coupons.index');
    $trail->push('Viewing coupon', route('coupons.show', $coupon));
});

// Home > Coupons > Viewing coupon
Breadcrumbs::for('coupons.create', function ($trail) {
    $trail->parent('coupons.index');
    $trail->push('Creating coupon', route('coupons.create'));
});

// Home > API Keys
Breadcrumbs::for('api-keys.index', function ($trail) {
    $trail->parent('home');
    $trail->push('API Keys', route('api-keys.index'));
});

// Home > API Keys > Create new API key
Breadcrumbs::for('api-keys.create', function ($trail) {
    $trail->parent('api-keys.index');
    $trail->push('Create new API key', route('api-keys.create'));
});

// Home > API Keys > Editing API key
Breadcrumbs::for('api-keys.edit', function ($trail, $key) {
    $trail->parent('api-keys.index');
    $trail->push('Editing API key', route('api-keys.edit', $key));
});

// Home > Administrative
Breadcrumbs::for('admins.dashboard', function ($trail) {
    $trail->parent('home');
    $trail->push('Admin dashboard', route('admins.dashboard'));
});

// Home > Administrative > Coupons
Breadcrumbs::for('admins.coupons', function ($trail) {
    $trail->parent('admins.dashboard');
    $trail->push('Coupons', route('admins.coupons'));
});

// Home > Administrative > Nodes
Breadcrumbs::for('admins.nodes', function ($trail) {
    $trail->parent('admins.dashboard');
    $trail->push('Nodes', route('admins.nodes'));
});

// Home > Coupons > [Edit]
Breadcrumbs::for('coupons.edit', function ($trail, $coupon) {
    $trail->parent('coupons.index');
    $trail->push('Editing coupon', route('coupons.edit', $coupon));
});

// Home > Servers > [Server]
Breadcrumbs::for('servers.show', function ($trail, $server) {
    $trail->parent('servers.index');
    $trail->push($server->name, route('servers.show', $server));
});

// Home > Servers > [Server] > Deploy
Breadcrumbs::for('deploys.create', function ($trail, $server) {
    $trail->parent('servers.show', $server);
    $trail->push($server->name, route('deploys.create', $server));
});

// Home > Deploys > Edit
Breadcrumbs::for('deploys.edit', function ($trail, $deploy) {
    $trail->parent('servers.show', $deploy->server);
    $trail->push('Editing deploy', route('deploys.edit', $deploy));
});