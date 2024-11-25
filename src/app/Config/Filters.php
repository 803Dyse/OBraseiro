<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\AuthFilter;

class Filters extends BaseFilters {

    public array $aliases = [
        'csrf' => CSRF::class,
        'toolbar' => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'invalidchars' => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors' => Cors::class,
        'forcehttps' => ForceHTTPS::class,
        'pagecache' => PageCache::class,
        'performance' => PerformanceMetrics::class,
        'auth' => AuthFilter::class, // Este es el alias que le di para el filtro de autenticación
    ];
    public array $required = [
        'before' => [
            'forcehttps', // Force Global Secure Requests
            'pagecache', // Web Page Caching
        ],
        'after' => [
            'pagecache', // Web Page Caching
            'performance', // Performance Metrics
            'toolbar', // Debug Toolbar
        ],
    ];
    public array $globals = [
        'before' => [
        // 'honeypot',
        // 'csrf',
        // 'invalidchars',
        ],
        'after' => [
        // 'honeypot',
        // 'secureheaders',
        ],
    ];
    public array $methods = [];
    public array $filters = [
        'auth' => ['before' => ['perfil', 'realizar-pedido']],
    ];
}
