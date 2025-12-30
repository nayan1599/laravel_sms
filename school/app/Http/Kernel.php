
<?php 

protected $routeMiddleware = [
    // other middlewares
    'student' => \App\Http\Middleware\StudentMiddleware::class,
];