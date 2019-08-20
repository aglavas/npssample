<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Home > About
Breadcrumbs::for('survey', function ($trail, $survey) {
    $trail->parent('dashboard');
    $trail->push($survey->name, route('survey', $survey->id));
});

