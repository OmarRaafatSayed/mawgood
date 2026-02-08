<?php return array (
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'app' => 
  array (
    'name' => 'Mawgood',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://127.0.0.1:8000',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'Africa/Cairo',
    'locale' => 'ar',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:xbI4a6uKXy1m8CPyMZrEXs8BUduDhucHgyJmOFBRMKI=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
      'store' => 'database',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\VendorServiceProvider',
      25 => 'App\\Providers\\ThemeServiceProvider',
      26 => 'Mawgood\\Core\\Providers\\CoreServiceProvider',
      27 => 'Mawgood\\Vendor\\Providers\\VendorServiceProvider',
      28 => 'Mawgood\\Company\\Providers\\CompanyServiceProvider',
      29 => 'Mawgood\\Shop\\Providers\\ShopServiceProvider',
      30 => 'Webkul\\Admin\\Providers\\AdminServiceProvider',
      31 => 'Webkul\\Attribute\\Providers\\AttributeServiceProvider',
      32 => 'Webkul\\BookingProduct\\Providers\\BookingProductServiceProvider',
      33 => 'Webkul\\CMS\\Providers\\CMSServiceProvider',
      34 => 'Webkul\\CartRule\\Providers\\CartRuleServiceProvider',
      35 => 'Webkul\\CatalogRule\\Providers\\CatalogRuleServiceProvider',
      36 => 'Webkul\\Category\\Providers\\CategoryServiceProvider',
      37 => 'Webkul\\Checkout\\Providers\\CheckoutServiceProvider',
      38 => 'Webkul\\Core\\Providers\\CoreServiceProvider',
      39 => 'Webkul\\Core\\Providers\\EnvValidatorServiceProvider',
      40 => 'Webkul\\Customer\\Providers\\CustomerServiceProvider',
      41 => 'Webkul\\DataGrid\\Providers\\DataGridServiceProvider',
      42 => 'Webkul\\DataTransfer\\Providers\\DataTransferServiceProvider',
      43 => 'Webkul\\DebugBar\\Providers\\DebugBarServiceProvider',
      44 => 'Webkul\\FPC\\Providers\\FPCServiceProvider',
      45 => 'Webkul\\GDPR\\Providers\\GDPRServiceProvider',
      46 => 'Webkul\\Installer\\Providers\\InstallerServiceProvider',
      47 => 'Webkul\\Inventory\\Providers\\InventoryServiceProvider',
      48 => 'Webkul\\MagicAI\\Providers\\MagicAIServiceProvider',
      49 => 'Webkul\\Marketing\\Providers\\MarketingServiceProvider',
      50 => 'Webkul\\Notification\\Providers\\NotificationServiceProvider',
      51 => 'Webkul\\Payment\\Providers\\PaymentServiceProvider',
      52 => 'Webkul\\Paypal\\Providers\\PaypalServiceProvider',
      53 => 'Webkul\\Product\\Providers\\ProductServiceProvider',
      54 => 'Webkul\\Rule\\Providers\\RuleServiceProvider',
      55 => 'Webkul\\Sales\\Providers\\SalesServiceProvider',
      56 => 'Webkul\\Shipping\\Providers\\ShippingServiceProvider',
      57 => 'Webkul\\Shop\\Providers\\ShopServiceProvider',
      58 => 'Webkul\\Sitemap\\Providers\\SitemapServiceProvider',
      59 => 'Webkul\\SocialLogin\\Providers\\SocialLoginServiceProvider',
      60 => 'Webkul\\SocialShare\\Providers\\SocialShareServiceProvider',
      61 => 'Webkul\\Tax\\Providers\\TaxServiceProvider',
      62 => 'Webkul\\Theme\\Providers\\ThemeServiceProvider',
      63 => 'Webkul\\User\\Providers\\UserServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Uri' => 'Illuminate\\Support\\Uri',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
    'debug_allowed_ips' => NULL,
    'admin_url' => 'admin',
    'default_country' => NULL,
    'currency' => 'EGP',
    'channel' => 'default',
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'customer',
      'passwords' => 'customers',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'customer' => 
      array (
        'driver' => 'session',
        'provider' => 'customers',
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admins',
      ),
      'vendor' => 
      array (
        'driver' => 'session',
        'provider' => 'vendors',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'customers' => 
      array (
        'driver' => 'eloquent',
        'model' => 'Webkul\\Customer\\Models\\Customer',
      ),
      'admins' => 
      array (
        'driver' => 'eloquent',
        'model' => 'Webkul\\User\\Models\\Admin',
      ),
      'vendors' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Vendor',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
      'customers' => 
      array (
        'provider' => 'customers',
        'table' => 'customer_password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
      'admins' => 
      array (
        'provider' => 'admins',
        'table' => 'admin_password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'bagisto-vite' => 
  array (
    'viters' => 
    array (
      'admin' => 
      array (
        'hot_file' => 'admin-default-vite.hot',
        'build_directory' => 'themes/admin/default/build',
        'package_assets_directory' => 'src/Resources/assets',
      ),
      'shop' => 
      array (
        'hot_file' => 'shop-default-vite.hot',
        'build_directory' => 'themes/shop/default/build',
        'package_assets_directory' => 'src/Resources/assets',
      ),
      'installer' => 
      array (
        'hot_file' => 'installer-default-vite.hot',
        'build_directory' => 'themes/installer/default/build',
        'package_assets_directory' => 'src/Resources/assets',
      ),
    ),
  ),
  'breadcrumbs' => 
  array (
    'view' => 'breadcrumbs::bootstrap5',
    'files' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\routes/breadcrumbs.php',
    'unnamed-route-exception' => true,
    'missing-route-bound-breadcrumb-exception' => true,
    'invalid-named-breadcrumb-exception' => true,
    'manager-class' => 'Diglactic\\Breadcrumbs\\Manager',
    'generator-class' => 'Diglactic\\Breadcrumbs\\Generator',
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'cache',
        'lock_connection' => NULL,
        'lock_table' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\framework/cache/data',
        'lock_path' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'mawgood_cache_',
  ),
  'concord' => 
  array (
    'modules' => 
    array (
      0 => 'Webkul\\Admin\\Providers\\ModuleServiceProvider',
      1 => 'Webkul\\Attribute\\Providers\\ModuleServiceProvider',
      2 => 'Webkul\\BookingProduct\\Providers\\ModuleServiceProvider',
      3 => 'Webkul\\CartRule\\Providers\\ModuleServiceProvider',
      4 => 'Webkul\\CatalogRule\\Providers\\ModuleServiceProvider',
      5 => 'Webkul\\Category\\Providers\\ModuleServiceProvider',
      6 => 'Webkul\\Checkout\\Providers\\ModuleServiceProvider',
      7 => 'Webkul\\CMS\\Providers\\ModuleServiceProvider',
      8 => 'Webkul\\Core\\Providers\\ModuleServiceProvider',
      9 => 'Webkul\\Customer\\Providers\\ModuleServiceProvider',
      10 => 'Webkul\\DataGrid\\Providers\\ModuleServiceProvider',
      11 => 'Webkul\\DataTransfer\\Providers\\ModuleServiceProvider',
      12 => 'Webkul\\GDPR\\Providers\\ModuleServiceProvider',
      13 => 'Webkul\\Inventory\\Providers\\ModuleServiceProvider',
      14 => 'Webkul\\Marketing\\Providers\\ModuleServiceProvider',
      15 => 'Webkul\\Notification\\Providers\\ModuleServiceProvider',
      16 => 'Webkul\\Payment\\Providers\\ModuleServiceProvider',
      17 => 'Webkul\\Paypal\\Providers\\ModuleServiceProvider',
      18 => 'Webkul\\Product\\Providers\\ModuleServiceProvider',
      19 => 'Webkul\\Rule\\Providers\\ModuleServiceProvider',
      20 => 'Webkul\\Sales\\Providers\\ModuleServiceProvider',
      21 => 'Webkul\\Shipping\\Providers\\ModuleServiceProvider',
      22 => 'Webkul\\Shop\\Providers\\ModuleServiceProvider',
      23 => 'Webkul\\Sitemap\\Providers\\ModuleServiceProvider',
      24 => 'Webkul\\SocialLogin\\Providers\\ModuleServiceProvider',
      25 => 'Webkul\\Tax\\Providers\\ModuleServiceProvider',
      26 => 'Webkul\\Theme\\Providers\\ModuleServiceProvider',
      27 => 'Webkul\\User\\Providers\\ModuleServiceProvider',
    ),
    'register_route_models' => true,
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'mawgood',
        'prefix' => '',
        'foreign_key_constraints' => true,
        'busy_timeout' => NULL,
        'journal_mode' => NULL,
        'synchronous' => NULL,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'mawgood',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => NULL,
        'options' => 
        array (
          1002 => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci',
          20 => true,
          12 => true,
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'mawgood',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'mawgood',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'mawgood',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 
    array (
      'table' => 'migrations',
      'update_date_on_publish' => true,
    ),
    'redis' => 
    array (
      'client' => 'predis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'mawgood_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
        'read_write_timeout' => 60,
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
        'read_write_timeout' => 60,
      ),
      'session' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '2',
        'read_write_timeout' => 60,
      ),
    ),
  ),
  'elasticsearch' => 
  array (
    'connection' => 'default',
    'connections' => 
    array (
      'default' => 
      array (
        'hosts' => 
        array (
          0 => 'http://localhost:9200',
        ),
        'user' => NULL,
        'pass' => NULL,
      ),
      'api' => 
      array (
        'hosts' => 
        array (
          0 => NULL,
        ),
        'key' => NULL,
      ),
      'cloud' => 
      array (
        'id' => NULL,
        'api_key' => NULL,
        'user' => NULL,
        'pass' => NULL,
      ),
    ),
    'caBundle' => NULL,
    'retries' => NULL,
  ),
  'filesystems' => 
  array (
    'default' => 'public',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\app',
        'serve' => true,
        'throw' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\app/public',
        'url' => 'http://127.0.0.1:8000/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
      ),
      'private' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\app/private',
        'serve' => true,
        'throw' => false,
      ),
    ),
    'links' => 
    array (
      'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\public\\storage' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\app/public',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
    'rehash_on_login' => true,
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'imagecache' => 
  array (
    'route' => 'cache',
    'paths' => 
    array (
      0 => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\app/public',
      1 => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\public\\storage',
    ),
    'templates' => 
    array (
      'small' => 'Webkul\\Shop\\CacheFilters\\Small',
      'medium' => 'Webkul\\Shop\\CacheFilters\\Medium',
      'large' => 'Webkul\\Shop\\CacheFilters\\Large',
    ),
    'lifetime' => 525600,
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\logs/laravel.log',
        'level' => 'error',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\logs/laravel.log',
        'level' => 'error',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'error',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'error',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'error',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'error',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'error',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\logs/laravel.log',
      ),
      'deprecations' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'url' => NULL,
        'host' => 'smtp.yourdomain.com',
        'port' => '587',
        'encryption' => 'tls',
        'username' => 'noreply@yourdomain.com',
        'password' => 'YOUR_MAIL_PASSWORD',
        'timeout' => NULL,
        'local_domain' => '127.0.0.1',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'noreply@mawgood.com',
      'name' => 'Mawgood',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\resources\\views/vendor/mail',
      ),
    ),
    'admin' => 
    array (
      'address' => NULL,
      'name' => 'Admin',
    ),
    'contact' => 
    array (
      'address' => NULL,
      'name' => 'Contact',
    ),
  ),
  'multivendor' => 
  array (
    'enabled' => true,
    'default_commission_rate' => 10.0,
    'auto_approve_vendors' => false,
    'vendor_can_manage_orders' => true,
    'vendor_can_manage_inventory' => true,
    'vendor_dashboard_route' => 'vendor',
    'commission_calculation' => 
    array (
      'type' => 'percentage',
      'include_shipping' => false,
      'include_tax' => false,
    ),
    'vendor_permissions' => 
    array (
      'manage_products' => true,
      'manage_orders' => true,
      'manage_inventory' => true,
      'view_reports' => true,
      'manage_profile' => true,
    ),
  ),
  'octane' => 
  array (
    'server' => 'roadrunner',
    'https' => false,
    'listeners' => 
    array (
      'Laravel\\Octane\\Events\\WorkerStarting' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\EnsureUploadedFilesAreValid',
        1 => 'Laravel\\Octane\\Listeners\\EnsureUploadedFilesCanBeMoved',
      ),
      'Laravel\\Octane\\Events\\RequestReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\CreateUrlGeneratorSandbox',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToLogManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        16 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        17 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        18 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        19 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        20 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        21 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        22 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        23 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        24 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        25 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        26 => 'Laravel\\Octane\\Listeners\\FlushVite',
        27 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        29 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        30 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
        31 => 'Laravel\\Octane\\Listeners\\FlushLocaleState',
        32 => 'Laravel\\Octane\\Listeners\\FlushQueuedCookies',
        33 => 'Laravel\\Octane\\Listeners\\FlushSessionState',
        34 => 'Laravel\\Octane\\Listeners\\FlushAuthenticationState',
        35 => 'Laravel\\Octane\\Listeners\\EnforceRequestScheme',
        36 => 'Laravel\\Octane\\Listeners\\EnsureRequestServerPortMatchesScheme',
        37 => 'Laravel\\Octane\\Listeners\\GiveNewRequestInstanceToApplication',
        38 => 'Laravel\\Octane\\Listeners\\GiveNewRequestInstanceToPaginator',
      ),
      'Laravel\\Octane\\Events\\RequestHandled' => 
      array (
      ),
      'Laravel\\Octane\\Events\\RequestTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Events\\TaskReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\CreateUrlGeneratorSandbox',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToLogManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        16 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        17 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        18 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        19 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        20 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        21 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        22 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        23 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        24 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        25 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        26 => 'Laravel\\Octane\\Listeners\\FlushVite',
        27 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        29 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        30 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
      ),
      'Laravel\\Octane\\Events\\TaskTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Events\\TickReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\CreateUrlGeneratorSandbox',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToLogManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        16 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        17 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        18 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        19 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        20 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        21 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        22 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        23 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        24 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        25 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        26 => 'Laravel\\Octane\\Listeners\\FlushVite',
        27 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        29 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        30 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
      ),
      'Laravel\\Octane\\Events\\TickTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Contracts\\OperationTerminated' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\FlushOnce',
        1 => 'Laravel\\Octane\\Listeners\\FlushTemporaryContainerInstances',
      ),
      'Laravel\\Octane\\Events\\WorkerErrorOccurred' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\ReportException',
        1 => 'Laravel\\Octane\\Listeners\\StopWorkerIfNecessary',
      ),
      'Laravel\\Octane\\Events\\WorkerStopping' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CloseMonologHandlers',
      ),
    ),
    'warm' => 
    array (
      0 => 'auth',
      1 => 'cache',
      2 => 'cache.store',
      3 => 'config',
      4 => 'cookie',
      5 => 'db',
      6 => 'db.factory',
      7 => 'db.transactions',
      8 => 'encrypter',
      9 => 'files',
      10 => 'hash',
      11 => 'log',
      12 => 'router',
      13 => 'routes',
      14 => 'session',
      15 => 'session.store',
      16 => 'translator',
      17 => 'url',
      18 => 'view',
    ),
    'flush' => 
    array (
    ),
    'tables' => 
    array (
      'example:1000' => 
      array (
        'name' => 'string:1000',
        'votes' => 'int',
      ),
    ),
    'cache' => 
    array (
      'rows' => 1000,
      'bytes' => 10000,
    ),
    'watch' => 
    array (
      0 => 'app',
      1 => 'bootstrap',
      2 => 'config/**/*.php',
      3 => 'database/**/*.php',
      4 => 'public/**/*.php',
      5 => 'resources/**/*.php',
      6 => 'routes',
      7 => 'composer.lock',
      8 => '.env',
    ),
    'garbage' => 50,
    'max_execution_time' => 30,
  ),
  'openai' => 
  array (
    'api_key' => NULL,
    'organization' => NULL,
    'request_timeout' => 30,
  ),
  'products' => 
  array (
    'copy' => 
    array (
      'skip_attributes' => 
      array (
      ),
    ),
  ),
  'purify' => 
  array (
    'default' => 'default',
    'configs' => 
    array (
      'default' => 
      array (
        'Core.Encoding' => 'utf-8',
        'HTML.Doctype' => 'HTML 4.01 Transitional',
        'HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,b,u,strong,i,em,s,del,a[href|title],ul,ol,li,p[style],br,span,img[width|height|alt|src],blockquote',
        'HTML.ForbiddenElements' => '',
        'CSS.AllowedProperties' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
        'AutoFormat.AutoParagraph' => false,
        'AutoFormat.RemoveEmpty' => false,
      ),
    ),
    'definitions' => 'Stevebauman\\Purify\\Definitions\\Html5Definition',
    'css-definitions' => NULL,
    'serializer' => 
    array (
      'driver' => 'file',
      'cache' => 'Stevebauman\\Purify\\Cache\\CacheDefinitionCache',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'repository' => 
  array (
    'pagination' => 
    array (
      'limit' => 15,
    ),
    'fractal' => 
    array (
      'params' => 
      array (
        'include' => 'include',
      ),
      'serializer' => 'League\\Fractal\\Serializer\\DataArraySerializer',
    ),
    'cache' => 
    array (
      'enabled' => false,
      'minutes' => 30,
      'repository' => 'cache',
      'clean' => 
      array (
        'enabled' => true,
        'on' => 
        array (
          'create' => true,
          'update' => true,
          'delete' => true,
        ),
      ),
      'params' => 
      array (
        'skipCache' => 'skipCache',
      ),
      'allowed' => 
      array (
        'only' => NULL,
        'except' => NULL,
      ),
    ),
    'criteria' => 
    array (
      'acceptedConditions' => 
      array (
        0 => '=',
        1 => 'like',
        2 => 'in',
      ),
      'params' => 
      array (
        'search' => 'search',
        'searchFields' => 'searchFields',
        'filter' => 'filter',
        'orderBy' => 'orderBy',
        'sortedBy' => 'sortedBy',
        'with' => 'with',
        'searchJoin' => 'searchJoin',
        'withCount' => 'withCount',
      ),
    ),
    'generator' => 
    array (
      'basePath' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\app',
      'rootNamespace' => 'App\\',
      'stubsOverridePath' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\app',
      'paths' => 
      array (
        'models' => 'Entities',
        'repositories' => 'Repositories',
        'interfaces' => 'Repositories',
        'transformers' => 'Transformers',
        'presenters' => 'Presenters',
        'validators' => 'Validators',
        'controllers' => 'Http/Controllers',
        'provider' => 'RepositoryServiceProvider',
        'criteria' => 'Criteria',
      ),
    ),
  ),
  'responsecache' => 
  array (
    'enabled' => true,
    'cache_profile' => 'Spatie\\ResponseCache\\CacheProfiles\\CacheAllSuccessfulGetRequests',
    'cache_bypass_header' => 
    array (
      'name' => NULL,
      'value' => NULL,
    ),
    'cache_lifetime_in_seconds' => 604800,
    'add_cache_time_header' => true,
    'cache_time_header_name' => 'laravel-responsecache',
    'add_cache_age_header' => false,
    'cache_age_header_name' => 'laravel-responsecache-age',
    'cache_store' => 'file',
    'replacers' => 
    array (
      0 => 'Spatie\\ResponseCache\\Replacers\\CsrfTokenReplacer',
    ),
    'cache_tag' => '',
    'hasher' => 'Spatie\\ResponseCache\\Hasher\\DefaultHasher',
    'serializer' => 'Spatie\\ResponseCache\\Serializers\\DefaultSerializer',
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => '127.0.0.1:8000',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'authenticate_session' => 'Laravel\\Sanctum\\Http\\Middleware\\AuthenticateSession',
      'encrypt_cookies' => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
      'validate_csrf_token' => 'Illuminate\\Foundation\\Http\\Middleware\\ValidateCsrfToken',
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
    'exchange_api' => 
    array (
      'default' => 'exchange_rates',
      'fixer' => 
      array (
        'key' => NULL,
        'class' => 'Webkul\\Core\\Helpers\\Exchange\\FixerExchange',
      ),
      'exchange_rates' => 
      array (
        'key' => NULL,
        'class' => 'Webkul\\Core\\Helpers\\Exchange\\ExchangeRates',
        'url' => NULL,
      ),
    ),
    'facebook' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'twitter' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'google' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'linkedin-openid' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'github' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'mawgood_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'sitemap' => 
  array (
    'guzzle_options' => 
    array (
      'cookies' => true,
      'connect_timeout' => 10,
      'timeout' => 10,
      'allow_redirects' => false,
    ),
    'execute_javascript' => false,
    'chrome_binary_path' => NULL,
    'crawl_profile' => 'Spatie\\Sitemap\\Crawler\\Profile',
  ),
  'themes' => 
  array (
    'shop-default' => 'default',
    'shop' => 
    array (
      'default' => 
      array (
        'name' => 'Default',
        'assets_path' => 'public/themes/shop/default',
        'views_path' => 'resources/themes/default/views',
        'vite' => 
        array (
          'hot_file' => 'shop-default-vite.hot',
          'build_directory' => 'themes/shop/default/build',
          'package_assets_directory' => 'src/Resources/assets',
        ),
      ),
    ),
    'admin-default' => 'default',
    'admin' => 
    array (
      'default' => 
      array (
        'name' => 'Default',
        'assets_path' => 'public/themes/admin/default',
        'views_path' => 'resources/admin-themes/default/views',
        'vite' => 
        array (
          'hot_file' => 'admin-default-vite.hot',
          'build_directory' => 'themes/admin/default/build',
          'package_assets_directory' => 'src/Resources/assets',
        ),
      ),
    ),
  ),
  'translatable' => 
  array (
    'locales' => 
    array (
      0 => 'en',
      1 => 'fr',
      'es' => 
      array (
        0 => 'MX',
        1 => 'CO',
      ),
    ),
    'locale_separator' => '-',
    'locale' => NULL,
    'use_fallback' => false,
    'use_property_fallback' => true,
    'fallback_locale' => 'en',
    'translation_model_namespace' => NULL,
    'translation_suffix' => 'Translation',
    'locale_key' => 'locale',
    'to_array_always_loads_translations' => true,
    'rule_factory' => 
    array (
      'format' => 1,
      'prefix' => '%',
      'suffix' => '%',
    ),
    'translations_wrapper' => NULL,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\resources\\views',
    ),
    'compiled' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\framework\\views',
    'tracer' => false,
  ),
  'visitor' => 
  array (
    'default' => 'jenssegers',
    'except' => 
    array (
      0 => 'login',
      1 => 'register',
    ),
    'table_name' => 'visits',
    'drivers' => 
    array (
      'jenssegers' => 'Shetabit\\Visitor\\Drivers\\JenssegersAgent',
      'UAParser' => 'Shetabit\\Visitor\\Drivers\\UAParser',
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => NULL,
    'hide_empty_tabs' => true,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
      2 => '_boost/browser-logs',
    ),
    'storage' => 
    array (
      'enabled' => true,
      'open' => NULL,
      'driver' => 'file',
      'path' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\debugbar',
      'connection' => NULL,
      'provider' => '',
      'hostname' => '127.0.0.1',
      'port' => 2304,
    ),
    'editor' => 'phpstorm',
    'remote_sites_path' => NULL,
    'local_sites_path' => NULL,
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'ajax_handler_auto_show' => true,
    'ajax_handler_enable_tab' => true,
    'defer_datasets' => false,
    'error_handler' => false,
    'error_level' => 30719,
    'clockwork' => false,
    'collectors' => 
    array (
      'phpinfo' => false,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => false,
      'auth' => false,
      'gate' => true,
      'session' => false,
      'symfony_request' => true,
      'mail' => true,
      'laravel' => true,
      'events' => false,
      'default_request' => false,
      'logs' => false,
      'files' => false,
      'config' => false,
      'cache' => false,
      'models' => true,
      'livewire' => true,
      'jobs' => false,
      'pennant' => false,
    ),
    'options' => 
    array (
      'time' => 
      array (
        'memory_usage' => false,
      ),
      'messages' => 
      array (
        'trace' => true,
        'capture_dumps' => false,
      ),
      'memory' => 
      array (
        'reset_peak' => false,
        'with_baseline' => false,
        'precision' => 0,
      ),
      'auth' => 
      array (
        'show_name' => true,
        'show_guards' => true,
      ),
      'gate' => 
      array (
        'trace' => false,
      ),
      'db' => 
      array (
        'with_params' => true,
        'exclude_paths' => 
        array (
        ),
        'backtrace' => true,
        'backtrace_exclude_paths' => 
        array (
        ),
        'timeline' => false,
        'duration_background' => true,
        'explain' => 
        array (
          'enabled' => false,
        ),
        'hints' => false,
        'show_copy' => true,
        'only_slow_queries' => true,
        'slow_threshold' => false,
        'memory_usage' => false,
        'soft_limit' => 100,
        'hard_limit' => 500,
      ),
      'mail' => 
      array (
        'timeline' => true,
        'show_body' => true,
      ),
      'views' => 
      array (
        'timeline' => true,
        'data' => false,
        'group' => 50,
        'inertia_pages' => 'js/Pages',
        'exclude_paths' => 
        array (
          0 => 'vendor/filament',
        ),
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'session' => 
      array (
        'hiddens' => 
        array (
        ),
      ),
      'symfony_request' => 
      array (
        'label' => true,
        'hiddens' => 
        array (
        ),
      ),
      'events' => 
      array (
        'data' => false,
        'excluded' => 
        array (
        ),
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
      'cache' => 
      array (
        'values' => true,
      ),
    ),
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_middleware' => 
    array (
    ),
    'route_domain' => NULL,
    'theme' => 'auto',
    'debug_backtrace_limit' => 50,
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\fonts',
      'font_cache' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\fonts',
      'temp_dir' => 'C:\\Users\\EXPRESS\\AppData\\Local\\Temp',
      'chroot' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood',
      'allowed_protocols' => 
      array (
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
        'output_encoding' => '',
        'test_auto_detect' => true,
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => NULL,
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'guess',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
      'cells' => 
      array (
        'middleware' => 
        array (
        ),
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
      'default_ttl' => 10800,
    ),
    'transactions' => 
    array (
      'handler' => 'db',
      'db' => 
      array (
        'connection' => NULL,
      ),
    ),
    'temporary_files' => 
    array (
      'local_path' => 'C:\\Users\\EXPRESS\\Downloads\\coding\\mawgood\\mawgood\\storage\\framework/cache/laravel-excel',
      'local_permissions' => 
      array (
      ),
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'menu' => 
  array (
    'admin' => 
    array (
      0 => 
      array (
        'key' => 'dashboard',
        'name' => 'admin::app.components.layouts.sidebar.dashboard',
        'route' => 'admin.dashboard.index',
        'sort' => 1,
        'icon' => 'icon-dashboard',
      ),
      1 => 
      array (
        'key' => 'sales',
        'name' => 'admin::app.components.layouts.sidebar.sales',
        'route' => 'admin.sales.orders.index',
        'sort' => 2,
        'icon' => 'icon-sales',
      ),
      2 => 
      array (
        'key' => 'sales.orders',
        'name' => 'admin::app.components.layouts.sidebar.orders',
        'route' => 'admin.sales.orders.index',
        'sort' => 1,
        'icon' => '',
      ),
      3 => 
      array (
        'key' => 'sales.shipments',
        'name' => 'admin::app.components.layouts.sidebar.shipments',
        'route' => 'admin.sales.shipments.index',
        'sort' => 2,
        'icon' => '',
      ),
      4 => 
      array (
        'key' => 'sales.invoices',
        'name' => 'admin::app.components.layouts.sidebar.invoices',
        'route' => 'admin.sales.invoices.index',
        'sort' => 3,
        'icon' => '',
      ),
      5 => 
      array (
        'key' => 'sales.refunds',
        'name' => 'admin::app.components.layouts.sidebar.refunds',
        'route' => 'admin.sales.refunds.index',
        'sort' => 4,
        'icon' => '',
      ),
      6 => 
      array (
        'key' => 'sales.transactions',
        'name' => 'admin::app.components.layouts.sidebar.transactions',
        'route' => 'admin.sales.transactions.index',
        'sort' => 5,
        'icon' => '',
      ),
      7 => 
      array (
        'key' => 'sales.bookings',
        'name' => 'admin::app.components.layouts.sidebar.booking-product',
        'route' => 'admin.sales.bookings.index',
        'sort' => 6,
        'icon' => '',
      ),
      8 => 
      array (
        'key' => 'catalog',
        'name' => 'admin::app.components.layouts.sidebar.catalog',
        'route' => 'admin.catalog.products.index',
        'sort' => 3,
        'icon' => 'icon-product',
      ),
      9 => 
      array (
        'key' => 'catalog.products',
        'name' => 'admin::app.components.layouts.sidebar.products',
        'route' => 'admin.catalog.products.index',
        'sort' => 1,
        'icon' => '',
      ),
      10 => 
      array (
        'key' => 'catalog.categories',
        'name' => 'admin::app.components.layouts.sidebar.categories',
        'route' => 'admin.catalog.categories.index',
        'sort' => 2,
        'icon' => '',
      ),
      11 => 
      array (
        'key' => 'catalog.attributes',
        'name' => 'admin::app.components.layouts.sidebar.attributes',
        'route' => 'admin.catalog.attributes.index',
        'sort' => 3,
        'icon' => '',
      ),
      12 => 
      array (
        'key' => 'catalog.families',
        'name' => 'admin::app.components.layouts.sidebar.attribute-families',
        'route' => 'admin.catalog.families.index',
        'sort' => 4,
        'icon' => '',
      ),
      13 => 
      array (
        'key' => 'vendors',
        'name' => 'إدارة التجار',
        'route' => 'admin.vendors.index',
        'sort' => 4.5,
        'icon' => 'icon-customer-2',
      ),
      14 => 
      array (
        'key' => 'customers',
        'name' => 'admin::app.components.layouts.sidebar.customers',
        'route' => 'admin.customers.customers.index',
        'sort' => 4,
        'icon' => 'icon-customer-2',
      ),
      15 => 
      array (
        'key' => 'customers.customers',
        'name' => 'admin::app.components.layouts.sidebar.customers',
        'route' => 'admin.customers.customers.index',
        'sort' => 1,
        'icon' => '',
      ),
      16 => 
      array (
        'key' => 'customers.groups',
        'name' => 'admin::app.components.layouts.sidebar.groups',
        'route' => 'admin.customers.groups.index',
        'sort' => 2,
        'icon' => '',
      ),
      17 => 
      array (
        'key' => 'customers.reviews',
        'name' => 'admin::app.components.layouts.sidebar.reviews',
        'route' => 'admin.customers.customers.review.index',
        'sort' => 3,
        'icon' => '',
      ),
      18 => 
      array (
        'key' => 'customers.gdpr_requests',
        'name' => 'admin::app.components.layouts.sidebar.gdpr-data-requests',
        'route' => 'admin.customers.gdpr.index',
        'sort' => 4,
        'icon' => '',
      ),
      19 => 
      array (
        'key' => 'cms',
        'name' => 'admin::app.components.layouts.sidebar.cms',
        'route' => 'admin.cms.index',
        'sort' => 5,
        'icon' => 'icon-cms',
      ),
      20 => 
      array (
        'key' => 'jobs',
        'name' => 'الوظائف',
        'route' => 'admin.jobs.index',
        'sort' => 5.5,
        'icon' => 'icon-briefcase',
      ),
      21 => 
      array (
        'key' => 'jobs.listings',
        'name' => 'قائمة الوظائف',
        'route' => 'admin.jobs.index',
        'sort' => 1,
        'icon' => '',
      ),
      22 => 
      array (
        'key' => 'jobs.categories',
        'name' => 'تصنيفات الوظائف',
        'route' => 'admin.jobs.categories',
        'sort' => 2,
        'icon' => '',
      ),
      23 => 
      array (
        'key' => 'marketing',
        'name' => 'admin::app.components.layouts.sidebar.marketing',
        'route' => 'admin.marketing.promotions.catalog_rules.index',
        'sort' => 6,
        'icon' => 'icon-promotion',
      ),
      24 => 
      array (
        'key' => 'marketing.promotions',
        'name' => 'admin::app.components.layouts.sidebar.promotions',
        'route' => 'admin.marketing.promotions.catalog_rules.index',
        'sort' => 1,
        'icon' => '',
      ),
      25 => 
      array (
        'key' => 'marketing.promotions.catalog_rules',
        'name' => 'admin::app.marketing.promotions.index.catalog-rule-title',
        'route' => 'admin.marketing.promotions.catalog_rules.index',
        'sort' => 1,
        'icon' => '',
      ),
      26 => 
      array (
        'key' => 'marketing.promotions.cart_rules',
        'name' => 'admin::app.marketing.promotions.index.cart-rule-title',
        'route' => 'admin.marketing.promotions.cart_rules.index',
        'sort' => 2,
        'icon' => '',
      ),
      27 => 
      array (
        'key' => 'marketing.communications',
        'name' => 'admin::app.components.layouts.sidebar.communications',
        'route' => 'admin.marketing.communications.email_templates.index',
        'sort' => 2,
        'icon' => '',
      ),
      28 => 
      array (
        'key' => 'marketing.communications.email_templates',
        'name' => 'admin::app.components.layouts.sidebar.email-templates',
        'route' => 'admin.marketing.communications.email_templates.index',
        'sort' => 1,
        'icon' => '',
      ),
      29 => 
      array (
        'key' => 'marketing.communications.events',
        'name' => 'admin::app.components.layouts.sidebar.events',
        'route' => 'admin.marketing.communications.events.index',
        'sort' => 2,
        'icon' => '',
      ),
      30 => 
      array (
        'key' => 'marketing.communications.campaigns',
        'name' => 'admin::app.components.layouts.sidebar.campaigns',
        'route' => 'admin.marketing.communications.campaigns.index',
        'sort' => 2,
        'icon' => '',
      ),
      31 => 
      array (
        'key' => 'marketing.communications.subscribers',
        'name' => 'admin::app.components.layouts.sidebar.newsletter-subscriptions',
        'route' => 'admin.marketing.communications.subscribers.index',
        'sort' => 3,
        'icon' => '',
      ),
      32 => 
      array (
        'key' => 'marketing.search_seo',
        'name' => 'admin::app.components.layouts.sidebar.search-seo',
        'route' => 'admin.marketing.search_seo.url_rewrites.index',
        'sort' => 3,
        'icon' => '',
      ),
      33 => 
      array (
        'key' => 'marketing.search_seo.url_rewrites',
        'name' => 'admin::app.components.layouts.sidebar.url-rewrites',
        'route' => 'admin.marketing.search_seo.url_rewrites.index',
        'sort' => 1,
        'icon' => '',
      ),
      34 => 
      array (
        'key' => 'marketing.search_seo.search_terms',
        'name' => 'admin::app.components.layouts.sidebar.search-terms',
        'route' => 'admin.marketing.search_seo.search_terms.index',
        'sort' => 2,
        'icon' => '',
      ),
      35 => 
      array (
        'key' => 'marketing.search_seo.search_synonyms',
        'name' => 'admin::app.components.layouts.sidebar.search-synonyms',
        'route' => 'admin.marketing.search_seo.search_synonyms.index',
        'sort' => 3,
        'icon' => '',
      ),
      36 => 
      array (
        'key' => 'settings',
        'name' => 'admin::app.components.layouts.sidebar.settings',
        'route' => 'admin.settings.locales.index',
        'sort' => 7,
        'icon' => 'icon-settings',
      ),
      37 => 
      array (
        'key' => 'settings.locales',
        'name' => 'admin::app.components.layouts.sidebar.locales',
        'route' => 'admin.settings.locales.index',
        'sort' => 1,
        'icon' => '',
      ),
      38 => 
      array (
        'key' => 'settings.currencies',
        'name' => 'admin::app.components.layouts.sidebar.currencies',
        'route' => 'admin.settings.currencies.index',
        'sort' => 2,
        'icon' => '',
      ),
      39 => 
      array (
        'key' => 'settings.exchange_rates',
        'name' => 'admin::app.components.layouts.sidebar.exchange-rates',
        'route' => 'admin.settings.exchange_rates.index',
        'sort' => 3,
        'icon' => '',
      ),
      40 => 
      array (
        'key' => 'settings.inventory_sources',
        'name' => 'admin::app.components.layouts.sidebar.inventory-sources',
        'route' => 'admin.settings.inventory_sources.index',
        'sort' => 4,
        'icon' => '',
      ),
      41 => 
      array (
        'key' => 'settings.channels',
        'name' => 'admin::app.components.layouts.sidebar.channels',
        'route' => 'admin.settings.channels.index',
        'sort' => 5,
        'icon' => '',
      ),
      42 => 
      array (
        'key' => 'settings.users',
        'name' => 'admin::app.components.layouts.sidebar.users',
        'route' => 'admin.settings.users.index',
        'sort' => 6,
        'icon' => '',
      ),
      43 => 
      array (
        'key' => 'settings.roles',
        'name' => 'admin::app.components.layouts.sidebar.roles',
        'route' => 'admin.settings.roles.index',
        'sort' => 7,
        'icon' => '',
      ),
      44 => 
      array (
        'key' => 'settings.themes',
        'name' => 'admin::app.components.layouts.sidebar.themes',
        'route' => 'admin.settings.themes.index',
        'sort' => 8,
        'icon' => '',
      ),
      45 => 
      array (
        'key' => 'settings.taxes',
        'name' => 'admin::app.components.layouts.sidebar.taxes',
        'route' => 'admin.settings.taxes.categories.index',
        'sort' => 9,
        'icon' => '',
      ),
      46 => 
      array (
        'key' => 'settings.taxes.tax_categories',
        'name' => 'admin::app.components.layouts.sidebar.tax-categories',
        'route' => 'admin.settings.taxes.categories.index',
        'sort' => 1,
        'icon' => '',
      ),
      47 => 
      array (
        'key' => 'settings.taxes.tax_rates',
        'name' => 'admin::app.components.layouts.sidebar.tax-rates',
        'route' => 'admin.settings.taxes.rates.index',
        'sort' => 2,
        'icon' => '',
      ),
    ),
    'customer' => 
    array (
      0 => 
      array (
        'key' => 'account',
        'name' => 'shop::app.layouts.my-account',
        'route' => 'shop.customers.account.profile.index',
        'icon' => '',
        'sort' => 1,
      ),
      1 => 
      array (
        'key' => 'account.profile',
        'name' => 'shop::app.layouts.profile',
        'route' => 'shop.customers.account.profile.index',
        'icon' => 'icon-users',
        'sort' => 1,
      ),
      2 => 
      array (
        'key' => 'account.address',
        'name' => 'shop::app.layouts.address',
        'route' => 'shop.customers.account.addresses.index',
        'icon' => 'icon-location',
        'sort' => 2,
      ),
      3 => 
      array (
        'key' => 'account.orders',
        'name' => 'shop::app.layouts.orders',
        'route' => 'shop.customers.account.orders.index',
        'icon' => 'icon-orders',
        'sort' => 3,
      ),
      4 => 
      array (
        'key' => 'account.downloadables',
        'name' => 'shop::app.layouts.downloadable-products',
        'route' => 'shop.customers.account.downloadable_products.index',
        'icon' => 'icon-download',
        'sort' => 4,
      ),
      5 => 
      array (
        'key' => 'account.reviews',
        'name' => 'shop::app.layouts.reviews',
        'route' => 'shop.customers.account.reviews.index',
        'icon' => 'icon-star',
        'sort' => 5,
      ),
      6 => 
      array (
        'key' => 'account.wishlist',
        'name' => 'shop::app.layouts.wishlist',
        'route' => 'shop.customers.account.wishlist.index',
        'icon' => 'icon-heart',
        'sort' => 6,
      ),
      7 => 
      array (
        'key' => 'account.jobs',
        'name' => 'اعرض وظيفة',
        'route' => 'shop.customers.account.jobs.create',
        'icon' => 'icon-briefcase',
        'sort' => 7,
      ),
      8 => 
      array (
        'key' => 'account.gdpr_data_request',
        'name' => 'shop::app.layouts.gdpr-request',
        'route' => 'shop.customers.account.gdpr.index',
        'icon' => 'icon-gdpr-safe',
        'sort' => 8,
      ),
    ),
  ),
  'acl' => 
  array (
    0 => 
    array (
      'key' => 'dashboard',
      'name' => 'admin::app.acl.dashboard',
      'route' => 'admin.dashboard.index',
      'sort' => 1,
    ),
    1 => 
    array (
      'key' => 'sales',
      'name' => 'admin::app.acl.sales',
      'route' => 'admin.sales.orders.index',
      'sort' => 2,
    ),
    2 => 
    array (
      'key' => 'sales.orders',
      'name' => 'admin::app.acl.orders',
      'route' => 'admin.sales.orders.index',
      'sort' => 1,
    ),
    3 => 
    array (
      'key' => 'sales.orders.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.sales.orders.create',
      'sort' => 1,
    ),
    4 => 
    array (
      'key' => 'sales.orders.view',
      'name' => 'admin::app.acl.view',
      'route' => 'admin.sales.orders.view',
      'sort' => 2,
    ),
    5 => 
    array (
      'key' => 'sales.orders.cancel',
      'name' => 'admin::app.acl.cancel',
      'route' => 'admin.sales.orders.cancel',
      'sort' => 3,
    ),
    6 => 
    array (
      'key' => 'sales.invoices',
      'name' => 'admin::app.acl.invoices',
      'route' => 'admin.sales.invoices.index',
      'sort' => 2,
    ),
    7 => 
    array (
      'key' => 'sales.invoices.view',
      'name' => 'admin::app.acl.view',
      'route' => 'admin.sales.invoices.view',
      'sort' => 1,
    ),
    8 => 
    array (
      'key' => 'sales.invoices.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.sales.invoices.store',
      'sort' => 2,
    ),
    9 => 
    array (
      'key' => 'sales.shipments',
      'name' => 'admin::app.acl.shipments',
      'route' => 'admin.sales.shipments.index',
      'sort' => 3,
    ),
    10 => 
    array (
      'key' => 'sales.shipments.view',
      'name' => 'admin::app.acl.view',
      'route' => 'admin.sales.shipments.view',
      'sort' => 1,
    ),
    11 => 
    array (
      'key' => 'sales.shipments.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.sales.shipments.store',
      'sort' => 2,
    ),
    12 => 
    array (
      'key' => 'sales.refunds',
      'name' => 'admin::app.acl.refunds',
      'route' => 'admin.sales.refunds.index',
      'sort' => 4,
    ),
    13 => 
    array (
      'key' => 'sales.refunds.view',
      'name' => 'admin::app.acl.view',
      'route' => 'admin.sales.refunds.view',
      'sort' => 1,
    ),
    14 => 
    array (
      'key' => 'sales.refunds.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.sales.refunds.store',
      'sort' => 2,
    ),
    15 => 
    array (
      'key' => 'sales.transactions',
      'name' => 'admin::app.acl.transactions',
      'route' => 'admin.sales.transactions.index',
      'sort' => 5,
    ),
    16 => 
    array (
      'key' => 'sales.transactions.view',
      'name' => 'admin::app.acl.view',
      'route' => 'admin.sales.transactions.view',
      'sort' => 1,
    ),
    17 => 
    array (
      'key' => 'catalog',
      'name' => 'admin::app.acl.catalog',
      'route' => 'admin.catalog.products.index',
      'sort' => 3,
    ),
    18 => 
    array (
      'key' => 'catalog.products',
      'name' => 'admin::app.acl.products',
      'route' => 'admin.catalog.products.index',
      'sort' => 1,
    ),
    19 => 
    array (
      'key' => 'catalog.products.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.catalog.products.store',
      'sort' => 1,
    ),
    20 => 
    array (
      'key' => 'catalog.products.copy',
      'name' => 'admin::app.acl.copy',
      'route' => 'admin.catalog.products.copy',
      'sort' => 2,
    ),
    21 => 
    array (
      'key' => 'catalog.products.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.catalog.products.edit',
      'sort' => 3,
    ),
    22 => 
    array (
      'key' => 'catalog.products.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.catalog.products.delete',
      'sort' => 4,
    ),
    23 => 
    array (
      'key' => 'catalog.categories',
      'name' => 'admin::app.acl.categories',
      'route' => 'admin.catalog.categories.index',
      'sort' => 2,
    ),
    24 => 
    array (
      'key' => 'catalog.categories.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.catalog.categories.create',
      'sort' => 1,
    ),
    25 => 
    array (
      'key' => 'catalog.categories.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.catalog.categories.edit',
      'sort' => 2,
    ),
    26 => 
    array (
      'key' => 'catalog.categories.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.catalog.categories.delete',
      'sort' => 3,
    ),
    27 => 
    array (
      'key' => 'catalog.attributes',
      'name' => 'admin::app.acl.attributes',
      'route' => 'admin.catalog.attributes.index',
      'sort' => 3,
    ),
    28 => 
    array (
      'key' => 'catalog.attributes.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.catalog.attributes.create',
      'sort' => 1,
    ),
    29 => 
    array (
      'key' => 'catalog.attributes.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.catalog.attributes.edit',
      'sort' => 2,
    ),
    30 => 
    array (
      'key' => 'catalog.attributes.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.catalog.attributes.delete',
      'sort' => 3,
    ),
    31 => 
    array (
      'key' => 'catalog.families',
      'name' => 'admin::app.acl.attribute-families',
      'route' => 'admin.catalog.families.index',
      'sort' => 4,
    ),
    32 => 
    array (
      'key' => 'catalog.families.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.catalog.families.create',
      'sort' => 1,
    ),
    33 => 
    array (
      'key' => 'catalog.families.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.catalog.families.edit',
      'sort' => 2,
    ),
    34 => 
    array (
      'key' => 'catalog.families.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.catalog.families.delete',
      'sort' => 3,
    ),
    35 => 
    array (
      'key' => 'vendors',
      'name' => 'إدارة التجار',
      'route' => 'admin.vendors.index',
      'sort' => 4.5,
    ),
    36 => 
    array (
      'key' => 'vendors.view',
      'name' => 'عرض التجار',
      'route' => 'admin.vendors.index',
      'sort' => 1,
    ),
    37 => 
    array (
      'key' => 'vendors.create',
      'name' => 'إضافة تاجر',
      'route' => 'admin.vendors.create',
      'sort' => 2,
    ),
    38 => 
    array (
      'key' => 'vendors.edit',
      'name' => 'تعديل التاجر',
      'route' => 'admin.vendors.edit',
      'sort' => 3,
    ),
    39 => 
    array (
      'key' => 'vendors.delete',
      'name' => 'حذف التاجر',
      'route' => 'admin.vendors.destroy',
      'sort' => 4,
    ),
    40 => 
    array (
      'key' => 'jobs',
      'name' => 'الوظائف',
      'route' => 'admin.jobs.index',
      'sort' => 5.5,
    ),
    41 => 
    array (
      'key' => 'jobs.view',
      'name' => 'عرض الوظائف',
      'route' => 'admin.jobs.index',
      'sort' => 1,
    ),
    42 => 
    array (
      'key' => 'jobs.categories',
      'name' => 'تصنيفات الوظائف',
      'route' => 'admin.jobs.categories',
      'sort' => 2,
    ),
    43 => 
    array (
      'key' => 'customers',
      'name' => 'admin::app.acl.customers',
      'route' => 'admin.customers.customers.index',
      'sort' => 4,
    ),
    44 => 
    array (
      'key' => 'customers.customers',
      'name' => 'admin::app.acl.customers',
      'route' => 'admin.customers.customers.index',
      'sort' => 1,
    ),
    45 => 
    array (
      'key' => 'customers.customers.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.customer.create',
      'sort' => 1,
    ),
    46 => 
    array (
      'key' => 'customers.customers.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.customers.customers.edit',
      'sort' => 2,
    ),
    47 => 
    array (
      'key' => 'customers.customers.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.customers.customers.delete',
      'sort' => 3,
    ),
    48 => 
    array (
      'key' => 'customers.addresses',
      'name' => 'admin::app.acl.addresses',
      'route' => 'admin.customers.customers.addresses.index',
      'sort' => 2,
    ),
    49 => 
    array (
      'key' => 'customers.addresses.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.customers.customers.addresses.create',
      'sort' => 1,
    ),
    50 => 
    array (
      'key' => 'customers.addresses.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.customers.customers.addresses.edit',
      'sort' => 2,
    ),
    51 => 
    array (
      'key' => 'customers.addresses.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.customers.customers.addresses.delete',
      'sort' => 3,
    ),
    52 => 
    array (
      'key' => 'customers.note',
      'name' => 'admin::app.acl.note',
      'route' => 'admin.customer.note.create',
      'sort' => 3,
    ),
    53 => 
    array (
      'key' => 'customers.groups',
      'name' => 'admin::app.acl.groups',
      'route' => 'admin.customers.groups.index',
      'sort' => 4,
    ),
    54 => 
    array (
      'key' => 'customers.groups.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.groups.create',
      'sort' => 1,
    ),
    55 => 
    array (
      'key' => 'customers.groups.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.customers.groups.update',
      'sort' => 2,
    ),
    56 => 
    array (
      'key' => 'customers.groups.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.customers.groups.delete',
      'sort' => 3,
    ),
    57 => 
    array (
      'key' => 'customers.reviews',
      'name' => 'admin::app.acl.reviews',
      'route' => 'admin.customers.customers.review.index',
      'sort' => 5,
    ),
    58 => 
    array (
      'key' => 'customers.reviews.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.customers.customers.review.edit',
      'sort' => 1,
    ),
    59 => 
    array (
      'key' => 'customers.reviews.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.customers.customers.review.delete',
      'sort' => 2,
    ),
    60 => 
    array (
      'key' => 'customers.gdpr_requests',
      'name' => 'admin::app.acl.gdpr',
      'route' => 'admin.customers.gdpr.index',
      'sort' => 6,
    ),
    61 => 
    array (
      'key' => 'customers.gdpr_requests.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.customers.gdpr.edit',
      'sort' => 1,
    ),
    62 => 
    array (
      'key' => 'customers.gdpr_requests.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.customers.gdpr.delete',
      'sort' => 2,
    ),
    63 => 
    array (
      'key' => 'marketing',
      'name' => 'admin::app.acl.marketing',
      'route' => 'admin.marketing.promotions.cart_rules.index',
      'sort' => 6,
    ),
    64 => 
    array (
      'key' => 'marketing.promotions',
      'name' => 'admin::app.acl.promotions',
      'route' => 'admin.marketing.promotions.cart_rules.index',
      'sort' => 1,
    ),
    65 => 
    array (
      'key' => 'marketing.promotions.cart_rules',
      'name' => 'admin::app.acl.cart-rules',
      'route' => 'admin.marketing.promotions.cart_rules.index',
      'sort' => 1,
    ),
    66 => 
    array (
      'key' => 'marketing.promotions.cart_rules.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.marketing.promotions.cart_rules.create',
      'sort' => 1,
    ),
    67 => 
    array (
      'key' => 'marketing.promotions.cart_rules.copy',
      'name' => 'admin::app.acl.copy',
      'route' => 'admin.marketing.promotions.cart_rules.copy',
      'sort' => 1,
    ),
    68 => 
    array (
      'key' => 'marketing.promotions.cart_rules.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.promotions.cart_rules.edit',
      'sort' => 2,
    ),
    69 => 
    array (
      'key' => 'marketing.promotions.cart_rules.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.promotions.cart_rules.delete',
      'sort' => 3,
    ),
    70 => 
    array (
      'key' => 'marketing.promotions.catalog_rules',
      'name' => 'admin::app.acl.catalog-rules',
      'route' => 'admin.marketing.promotions.catalog_rules.index',
      'sort' => 1,
    ),
    71 => 
    array (
      'key' => 'marketing.promotions.catalog_rules.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.marketing.promotions.catalog_rules.index',
      'sort' => 1,
    ),
    72 => 
    array (
      'key' => 'marketing.promotions.catalog_rules.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.promotions.catalog_rules.edit',
      'sort' => 2,
    ),
    73 => 
    array (
      'key' => 'marketing.promotions.catalog_rules.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.promotions.catalog_rules.delete',
      'sort' => 3,
    ),
    74 => 
    array (
      'key' => 'marketing.communications',
      'name' => 'admin::app.acl.communications',
      'route' => 'admin.marketing.communications.email_templates.index',
      'sort' => 2,
    ),
    75 => 
    array (
      'key' => 'marketing.communications.email_templates',
      'name' => 'admin::app.acl.email-templates',
      'route' => 'admin.marketing.communications.email_templates.index',
      'sort' => 1,
    ),
    76 => 
    array (
      'key' => 'marketing.communications.email_templates.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.marketing.communications.email_templates.create',
      'sort' => 2,
    ),
    77 => 
    array (
      'key' => 'marketing.communications.email_templates.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.communications.email_templates.edit',
      'sort' => 3,
    ),
    78 => 
    array (
      'key' => 'marketing.communications.email_templates.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.communications.email_templates.delete',
      'sort' => 4,
    ),
    79 => 
    array (
      'key' => 'marketing.communications.events',
      'name' => 'admin::app.acl.events',
      'route' => 'admin.marketing.communications.events.index',
      'sort' => 2,
    ),
    80 => 
    array (
      'key' => 'marketing.communications.events.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.marketing.communications.events.update',
      'sort' => 1,
    ),
    81 => 
    array (
      'key' => 'marketing.communications.events.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.communications.events.edit',
      'sort' => 2,
    ),
    82 => 
    array (
      'key' => 'marketing.communications.events.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.communications.events.delete',
      'sort' => 3,
    ),
    83 => 
    array (
      'key' => 'marketing.communications.campaigns',
      'name' => 'admin::app.acl.campaigns',
      'route' => 'admin.marketing.communications.campaigns.index',
      'sort' => 3,
    ),
    84 => 
    array (
      'key' => 'marketing.communications.campaigns.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.marketing.communications.campaigns.create',
      'sort' => 1,
    ),
    85 => 
    array (
      'key' => 'marketing.communications.campaigns.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.communications.campaigns.edit',
      'sort' => 2,
    ),
    86 => 
    array (
      'key' => 'marketing.communications.campaigns.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.communications.campaigns.delete',
      'sort' => 3,
    ),
    87 => 
    array (
      'key' => 'marketing.communications.subscribers',
      'name' => 'admin::app.acl.subscribers',
      'route' => 'admin.marketing.communications.subscribers.index',
      'sort' => 3,
    ),
    88 => 
    array (
      'key' => 'marketing.communications.subscribers.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.communications.subscribers.edit',
      'sort' => 1,
    ),
    89 => 
    array (
      'key' => 'marketing.communications.subscribers.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.communications.subscribers.delete',
      'sort' => 2,
    ),
    90 => 
    array (
      'key' => 'marketing.search_seo',
      'name' => 'admin::app.acl.search-seo',
      'route' => 'admin.marketing.search_seo.url_rewrites.index',
      'sort' => 3,
    ),
    91 => 
    array (
      'key' => 'marketing.search_seo.url_rewrites',
      'name' => 'admin::app.acl.url-rewrites',
      'route' => 'admin.marketing.search_seo.url_rewrites.index',
      'sort' => 1,
    ),
    92 => 
    array (
      'key' => 'marketing.search_seo.url_rewrites.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.marketing.search_seo.url_rewrites.update',
      'sort' => 1,
    ),
    93 => 
    array (
      'key' => 'marketing.search_seo.url_rewrites.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.search_seo.url_rewrites.update',
      'sort' => 2,
    ),
    94 => 
    array (
      'key' => 'marketing.search_seo.url_rewrites.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.search_seo.url_rewrites.delete',
      'sort' => 3,
    ),
    95 => 
    array (
      'key' => 'marketing.search_seo.search_terms',
      'name' => 'admin::app.acl.search-terms',
      'route' => 'admin.marketing.search_seo.search_terms.index',
      'sort' => 2,
    ),
    96 => 
    array (
      'key' => 'marketing.search_seo.search_terms.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.marketing.search_seo.search_terms.update',
      'sort' => 1,
    ),
    97 => 
    array (
      'key' => 'marketing.search_seo.search_terms.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.search_seo.search_terms.update',
      'sort' => 2,
    ),
    98 => 
    array (
      'key' => 'marketing.search_seo.search_terms.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.search_seo.search_terms.delete',
      'sort' => 3,
    ),
    99 => 
    array (
      'key' => 'marketing.search_seo.search_synonyms',
      'name' => 'admin::app.acl.search-synonyms',
      'route' => 'admin.marketing.search_seo.search_synonyms.index',
      'sort' => 3,
    ),
    100 => 
    array (
      'key' => 'marketing.search_seo.search_synonyms.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.marketing.search_seo.search_synonyms.update',
      'sort' => 1,
    ),
    101 => 
    array (
      'key' => 'marketing.search_seo.search_synonyms.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.search_seo.search_synonyms.update',
      'sort' => 2,
    ),
    102 => 
    array (
      'key' => 'marketing.search_seo.search_synonyms.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.search_seo.search_synonyms.delete',
      'sort' => 3,
    ),
    103 => 
    array (
      'key' => 'marketing.search_seo.sitemaps',
      'name' => 'admin::app.acl.sitemaps',
      'route' => 'admin.marketing.search_seo.sitemaps.index',
      'sort' => 4,
    ),
    104 => 
    array (
      'key' => 'marketing.search_seo.sitemaps.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.marketing.search_seo.sitemaps.update',
      'sort' => 1,
    ),
    105 => 
    array (
      'key' => 'marketing.search_seo.sitemaps.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.marketing.search_seo.sitemaps.update',
      'sort' => 2,
    ),
    106 => 
    array (
      'key' => 'marketing.search_seo.sitemaps.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.marketing.search_seo.sitemaps.delete',
      'sort' => 3,
    ),
    107 => 
    array (
      'key' => 'reporting',
      'name' => 'admin::app.acl.reporting',
      'route' => 'admin.reporting.sales.index',
      'sort' => 6,
    ),
    108 => 
    array (
      'key' => 'reporting.sales',
      'name' => 'admin::app.acl.sales',
      'route' => 'admin.reporting.sales.index',
      'sort' => 1,
    ),
    109 => 
    array (
      'key' => 'reporting.customers',
      'name' => 'admin::app.acl.customers',
      'route' => 'admin.reporting.customers.index',
      'sort' => 2,
    ),
    110 => 
    array (
      'key' => 'reporting.products',
      'name' => 'admin::app.acl.products',
      'route' => 'admin.reporting.products.index',
      'sort' => 3,
    ),
    111 => 
    array (
      'key' => 'cms',
      'name' => 'admin::app.acl.cms',
      'route' => 'admin.cms.index',
      'sort' => 7,
    ),
    112 => 
    array (
      'key' => 'cms.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.cms.create',
      'sort' => 1,
    ),
    113 => 
    array (
      'key' => 'cms.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.cms.edit',
      'sort' => 2,
    ),
    114 => 
    array (
      'key' => 'cms.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.cms.delete',
      'sort' => 3,
    ),
    115 => 
    array (
      'key' => 'settings',
      'name' => 'admin::app.acl.settings',
      'route' => 'admin.settings.users.index',
      'sort' => 8,
    ),
    116 => 
    array (
      'key' => 'settings.locales',
      'name' => 'admin::app.acl.locales',
      'route' => 'admin.settings.locales.index',
      'sort' => 1,
    ),
    117 => 
    array (
      'key' => 'settings.locales.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.locales.create',
      'sort' => 1,
    ),
    118 => 
    array (
      'key' => 'settings.locales.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.locales.edit',
      'sort' => 2,
    ),
    119 => 
    array (
      'key' => 'settings.locales.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.locales.delete',
      'sort' => 3,
    ),
    120 => 
    array (
      'key' => 'settings.currencies',
      'name' => 'admin::app.acl.currencies',
      'route' => 'admin.settings.currencies.index',
      'sort' => 2,
    ),
    121 => 
    array (
      'key' => 'settings.currencies.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.currencies.create',
      'sort' => 1,
    ),
    122 => 
    array (
      'key' => 'settings.currencies.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.currencies.edit',
      'sort' => 2,
    ),
    123 => 
    array (
      'key' => 'settings.currencies.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.currencies.delete',
      'sort' => 3,
    ),
    124 => 
    array (
      'key' => 'settings.exchange_rates',
      'name' => 'admin::app.acl.exchange-rates',
      'route' => 'admin.settings.exchange_rates.index',
      'sort' => 3,
    ),
    125 => 
    array (
      'key' => 'settings.exchange_rates.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.exchange_rates.create',
      'sort' => 1,
    ),
    126 => 
    array (
      'key' => 'settings.exchange_rates.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.exchange_rates.edit',
      'sort' => 2,
    ),
    127 => 
    array (
      'key' => 'settings.exchange_rates.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.exchange_rates.delete',
      'sort' => 3,
    ),
    128 => 
    array (
      'key' => 'settings.inventory_sources',
      'name' => 'admin::app.acl.inventory-sources',
      'route' => 'admin.settings.inventory_sources.index',
      'sort' => 4,
    ),
    129 => 
    array (
      'key' => 'settings.inventory_sources.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.inventory_sources.create',
      'sort' => 1,
    ),
    130 => 
    array (
      'key' => 'settings.inventory_sources.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.inventory_sources.edit',
      'sort' => 2,
    ),
    131 => 
    array (
      'key' => 'settings.inventory_sources.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.inventory_sources.delete',
      'sort' => 3,
    ),
    132 => 
    array (
      'key' => 'settings.channels',
      'name' => 'admin::app.acl.channels',
      'route' => 'admin.settings.channels.index',
      'sort' => 5,
    ),
    133 => 
    array (
      'key' => 'settings.channels.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.channels.create',
      'sort' => 1,
    ),
    134 => 
    array (
      'key' => 'settings.channels.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.channels.edit',
      'sort' => 2,
    ),
    135 => 
    array (
      'key' => 'settings.channels.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.channels.delete',
      'sort' => 3,
    ),
    136 => 
    array (
      'key' => 'settings.users',
      'name' => 'admin::app.acl.users',
      'route' => 'admin.settings.users.index',
      'sort' => 6,
    ),
    137 => 
    array (
      'key' => 'settings.users.users',
      'name' => 'admin::app.acl.users',
      'route' => 'admin.settings.users.index',
      'sort' => 1,
    ),
    138 => 
    array (
      'key' => 'settings.users.users.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.users.store',
      'sort' => 1,
    ),
    139 => 
    array (
      'key' => 'settings.users.users.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.users.edit',
      'sort' => 2,
    ),
    140 => 
    array (
      'key' => 'settings.users.users.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.users.delete',
      'sort' => 3,
    ),
    141 => 
    array (
      'key' => 'settings.roles',
      'name' => 'admin::app.acl.roles',
      'route' => 'admin.settings.roles.index',
      'sort' => 7,
    ),
    142 => 
    array (
      'key' => 'settings.roles.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.roles.create',
      'sort' => 1,
    ),
    143 => 
    array (
      'key' => 'settings.roles.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.roles.edit',
      'sort' => 2,
    ),
    144 => 
    array (
      'key' => 'settings.roles.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.roles.delete',
      'sort' => 3,
    ),
    145 => 
    array (
      'key' => 'settings.themes',
      'name' => 'admin::app.acl.themes',
      'route' => 'admin.settings.themes.index',
      'sort' => 8,
    ),
    146 => 
    array (
      'key' => 'settings.themes.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.themes.store',
      'sort' => 1,
    ),
    147 => 
    array (
      'key' => 'settings.themes.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.themes.edit',
      'sort' => 2,
    ),
    148 => 
    array (
      'key' => 'settings.themes.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.themes.delete',
      'sort' => 3,
    ),
    149 => 
    array (
      'key' => 'settings.taxes',
      'name' => 'admin::app.acl.taxes',
      'route' => 'admin.settings.taxes.categories.index',
      'sort' => 9,
    ),
    150 => 
    array (
      'key' => 'settings.taxes.tax_categories',
      'name' => 'admin::app.acl.tax-categories',
      'route' => 'admin.settings.taxes.categories.index',
      'sort' => 1,
    ),
    151 => 
    array (
      'key' => 'settings.taxes.tax_categories.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.taxes.tax_categories.create',
      'sort' => 1,
    ),
    152 => 
    array (
      'key' => 'settings.taxes.tax_categories.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.taxes.categories.edit',
      'sort' => 2,
    ),
    153 => 
    array (
      'key' => 'settings.taxes.tax_categories.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.taxes.categories.delete',
      'sort' => 3,
    ),
    154 => 
    array (
      'key' => 'settings.taxes.tax_rates',
      'name' => 'admin::app.acl.tax-rates',
      'route' => 'admin.settings.taxes.rates.index',
      'sort' => 2,
    ),
    155 => 
    array (
      'key' => 'settings.taxes.tax_rates.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.taxes.rates.create',
      'sort' => 1,
    ),
    156 => 
    array (
      'key' => 'settings.taxes.tax_rates.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.taxes.rates.edit',
      'sort' => 2,
    ),
    157 => 
    array (
      'key' => 'settings.data_transfer',
      'name' => 'admin::app.acl.data-transfer',
      'route' => 'admin.settings.data_transfer.imports.index',
      'sort' => 10,
    ),
    158 => 
    array (
      'key' => 'settings.data_transfer.imports',
      'name' => 'admin::app.acl.imports',
      'route' => 'admin.settings.data_transfer.imports.index',
      'sort' => 1,
    ),
    159 => 
    array (
      'key' => 'settings.data_transfer.imports.create',
      'name' => 'admin::app.acl.create',
      'route' => 'admin.settings.data_transfer.imports.create',
      'sort' => 1,
    ),
    160 => 
    array (
      'key' => 'settings.data_transfer.imports.edit',
      'name' => 'admin::app.acl.edit',
      'route' => 'admin.settings.data_transfer.imports.edit',
      'sort' => 2,
    ),
    161 => 
    array (
      'key' => 'settings.data_transfer.imports.delete',
      'name' => 'admin::app.acl.delete',
      'route' => 'admin.settings.data_transfer.imports.delete',
      'sort' => 3,
    ),
    162 => 
    array (
      'key' => 'settings.data_transfer.imports.import',
      'name' => 'admin::app.acl.import',
      'route' => 'admin.settings.data_transfer.imports.import',
      'sort' => 4,
    ),
    163 => 
    array (
      'key' => 'configuration',
      'name' => 'admin::app.acl.configure',
      'route' => 'admin.configuration.index',
      'sort' => 9,
    ),
  ),
  'core' => 
  array (
    0 => 
    array (
      'key' => 'general',
      'name' => 'admin::app.configuration.index.general.title',
      'info' => 'admin::app.configuration.index.general.info',
      'sort' => 1,
    ),
    1 => 
    array (
      'key' => 'general.general',
      'name' => 'admin::app.configuration.index.general.general.title',
      'info' => 'admin::app.configuration.index.general.general.info',
      'icon' => 'settings/store.svg',
      'sort' => 1,
    ),
    2 => 
    array (
      'key' => 'general.general.locale_options',
      'name' => 'admin::app.configuration.index.general.general.unit-options.title',
      'info' => 'admin::app.configuration.index.general.general.unit-options.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'weight_unit',
          'title' => 'admin::app.configuration.index.general.general.unit-options.weight-unit',
          'type' => 'select',
          'default' => 'kgs',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'lbs',
              'value' => 'lbs',
            ),
            1 => 
            array (
              'title' => 'kgs',
              'value' => 'kgs',
            ),
          ),
          'channel_based' => true,
        ),
      ),
    ),
    3 => 
    array (
      'key' => 'general.general.breadcrumbs',
      'name' => 'admin::app.configuration.index.general.general.breadcrumbs.title',
      'info' => 'admin::app.configuration.index.general.general.breadcrumbs.title-info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'shop',
          'title' => 'admin::app.configuration.index.general.general.breadcrumbs.shop',
          'type' => 'boolean',
          'default' => true,
        ),
      ),
    ),
    4 => 
    array (
      'key' => 'general.general.visitor_options',
      'name' => 'admin::app.configuration.index.general.general.visitor-options.title',
      'info' => 'admin::app.configuration.index.general.general.visitor-options.title-info',
      'sort' => 3,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.general.visitor-options.enable',
          'type' => 'boolean',
          'default' => false,
        ),
      ),
    ),
    5 => 
    array (
      'key' => 'general.content',
      'name' => 'admin::app.configuration.index.general.content.title',
      'info' => 'admin::app.configuration.index.general.content.info',
      'icon' => 'settings/store.svg',
      'sort' => 2,
    ),
    6 => 
    array (
      'key' => 'general.content.header_offer',
      'name' => 'admin::app.configuration.index.general.content.header-offer.title',
      'info' => 'admin::app.configuration.index.general.content.header-offer.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'title',
          'title' => 'admin::app.configuration.index.general.content.header-offer.offer-title',
          'type' => 'text',
          'default' => 'Get UPTO 40% OFF on your 1st order',
          'validation' => 'max:100',
        ),
        1 => 
        array (
          'name' => 'redirection_title',
          'title' => 'admin::app.configuration.index.general.content.header-offer.redirection-title',
          'type' => 'text',
          'default' => 'SHOP NOW',
          'validation' => 'max:25',
        ),
        2 => 
        array (
          'name' => 'redirection_link',
          'title' => 'admin::app.configuration.index.general.content.header-offer.redirection-link',
          'type' => 'text',
        ),
      ),
    ),
    7 => 
    array (
      'key' => 'general.content.speculation_rules',
      'name' => 'admin::app.configuration.index.general.content.speculation-rules.title',
      'info' => 'admin::app.configuration.index.general.content.speculation-rules.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.content.speculation-rules.enable-speculation',
          'type' => 'boolean',
          'default' => true,
        ),
        1 => 
        array (
          'name' => 'prerender_enabled',
          'title' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.enabled',
          'type' => 'boolean',
          'default' => true,
        ),
        2 => 
        array (
          'name' => 'prerender_ignore_urls',
          'title' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.ignore-urls',
          'info' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.ignore-urls-info',
          'type' => 'textarea',
          'default' => '/customer/account/*|/checkout/*',
          'depends' => 'prerender_enabled:true',
        ),
        3 => 
        array (
          'name' => 'prerender_ignore_url_params',
          'title' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.ignore-url-params',
          'info' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.ignore-url-params-info',
          'type' => 'textarea',
          'depends' => 'prerender_enabled:true',
        ),
        4 => 
        array (
          'name' => 'prerender_eagerness',
          'title' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.eagerness',
          'info' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.eagerness-info',
          'type' => 'select',
          'default' => 'moderate',
          'depends' => 'prerender_enabled:true',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.eager',
              'value' => 'eager',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.moderate',
              'value' => 'moderate',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.general.content.speculation-rules.prerender.conservative',
              'value' => 'conservative',
            ),
          ),
        ),
        5 => 
        array (
          'name' => 'prefetch_enabled',
          'title' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.enabled',
          'type' => 'boolean',
          'default' => false,
        ),
        6 => 
        array (
          'name' => 'prefetch_ignore_urls',
          'title' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.ignore-urls',
          'info' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.ignore-urls-info',
          'type' => 'textarea',
          'default' => '/customer/account/*|/checkout/*',
          'depends' => 'prefetch_enabled:true',
        ),
        7 => 
        array (
          'name' => 'prefetch_ignore_url_params',
          'title' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.ignore-url-params',
          'info' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.ignore-url-params-info',
          'type' => 'textarea',
          'depends' => 'prefetch_enabled:true',
        ),
        8 => 
        array (
          'name' => 'prefetch_eagerness',
          'title' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.eagerness',
          'info' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.eagerness-info',
          'type' => 'select',
          'default' => 'moderate',
          'depends' => 'prefetch_enabled:true',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.eager',
              'value' => 'eager',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.moderate',
              'value' => 'moderate',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.general.content.speculation-rules.prefetch.conservative',
              'value' => 'conservative',
            ),
          ),
        ),
      ),
    ),
    8 => 
    array (
      'key' => 'general.content.custom_scripts',
      'name' => 'admin::app.configuration.index.general.content.custom-scripts.title',
      'info' => 'admin::app.configuration.index.general.content.custom-scripts.title-info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'custom_css',
          'title' => 'admin::app.configuration.index.general.content.custom-scripts.custom-css',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => false,
        ),
        1 => 
        array (
          'name' => 'custom_javascript',
          'title' => 'admin::app.configuration.index.general.content.custom-scripts.custom-javascript',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => false,
        ),
      ),
    ),
    9 => 
    array (
      'key' => 'general.design',
      'name' => 'admin::app.configuration.index.general.design.title',
      'info' => 'admin::app.configuration.index.general.design.info',
      'icon' => 'settings/theme.svg',
      'sort' => 3,
    ),
    10 => 
    array (
      'key' => 'general.design.admin_logo',
      'name' => 'admin::app.configuration.index.general.design.admin-logo.title',
      'info' => 'admin::app.configuration.index.general.design.admin-logo.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'logo_image',
          'title' => 'admin::app.configuration.index.general.design.admin-logo.logo-image',
          'type' => 'image',
          'channel_based' => false,
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp,svg',
        ),
        1 => 
        array (
          'name' => 'favicon',
          'title' => 'admin::app.configuration.index.general.design.admin-logo.favicon',
          'type' => 'image',
          'channel_based' => false,
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp,svg,ico',
        ),
      ),
    ),
    11 => 
    array (
      'key' => 'general.design.categories',
      'name' => 'admin::app.configuration.index.general.design.menu-category.title',
      'info' => 'admin::app.configuration.index.general.design.menu-category.info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'category_view',
          'title' => 'admin::app.configuration.index.general.design.menu-category.title',
          'type' => 'select',
          'default' => 'default',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.general.design.menu-category.default',
              'value' => 'default',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.general.design.menu-category.sidebar',
              'value' => 'sidebar',
            ),
          ),
        ),
        1 => 
        array (
          'name' => 'agreement_label',
          'title' => 'admin::app.configuration.index.general.gdpr.agreement.checkbox-label',
          'type' => 'blade',
          'path' => 'admin::configuration.custom-views.category-menu',
        ),
      ),
    ),
    12 => 
    array (
      'key' => 'general.magic_ai',
      'name' => 'admin::app.configuration.index.general.magic-ai.title',
      'info' => 'admin::app.configuration.index.general.magic-ai.info',
      'icon' => 'settings/magic-ai.svg',
      'sort' => 3,
    ),
    13 => 
    array (
      'key' => 'general.magic_ai.settings',
      'name' => 'admin::app.configuration.index.general.magic-ai.settings.title',
      'info' => 'admin::app.configuration.index.general.magic-ai.settings.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.magic-ai.settings.enabled',
          'type' => 'boolean',
          'channel_based' => true,
        ),
        1 => 
        array (
          'name' => 'api_key',
          'title' => 'admin::app.configuration.index.general.magic-ai.settings.api-key',
          'type' => 'password',
          'channel_based' => true,
        ),
        2 => 
        array (
          'name' => 'organization',
          'title' => 'admin::app.configuration.index.general.magic-ai.settings.organization',
          'type' => 'text',
          'channel_based' => true,
        ),
        3 => 
        array (
          'name' => 'api_domain',
          'title' => 'admin::app.configuration.index.general.magic-ai.settings.llm-api-domain',
          'type' => 'text',
          'channel_based' => true,
        ),
      ),
    ),
    14 => 
    array (
      'key' => 'general.magic_ai.content_generation',
      'name' => 'admin::app.configuration.index.general.magic-ai.content-generation.title',
      'info' => 'admin::app.configuration.index.general.magic-ai.content-generation.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.magic-ai.content-generation.enabled',
          'type' => 'boolean',
        ),
        1 => 
        array (
          'name' => 'product_short_description_prompt',
          'title' => 'admin::app.configuration.index.general.magic-ai.content-generation.product-short-description-prompt',
          'type' => 'textarea',
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'product_description_prompt',
          'title' => 'admin::app.configuration.index.general.magic-ai.content-generation.product-description-prompt',
          'type' => 'textarea',
          'locale_based' => true,
        ),
        3 => 
        array (
          'name' => 'category_description_prompt',
          'title' => 'admin::app.configuration.index.general.magic-ai.content-generation.category-description-prompt',
          'type' => 'textarea',
          'locale_based' => true,
        ),
        4 => 
        array (
          'name' => 'cms_page_content_prompt',
          'title' => 'admin::app.configuration.index.general.magic-ai.content-generation.cms-page-content-prompt',
          'type' => 'textarea',
          'locale_based' => true,
        ),
      ),
    ),
    15 => 
    array (
      'key' => 'general.magic_ai.image_generation',
      'name' => 'admin::app.configuration.index.general.magic-ai.image-generation.title',
      'info' => 'admin::app.configuration.index.general.magic-ai.image-generation.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.magic-ai.image-generation.enabled',
          'type' => 'boolean',
          'channel_based' => true,
        ),
      ),
    ),
    16 => 
    array (
      'key' => 'general.magic_ai.review_translation',
      'name' => 'admin::app.configuration.index.general.magic-ai.review-translation.title',
      'info' => 'admin::app.configuration.index.general.magic-ai.review-translation.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.enabled',
          'type' => 'boolean',
          'channel_based' => true,
        ),
        1 => 
        array (
          'name' => 'model',
          'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.model',
          'type' => 'select',
          'channel_based' => true,
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.gpt-4-turbo',
              'value' => 'gpt-4-turbo',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.gpt-4o',
              'value' => 'gpt-4o',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.gpt-4o-mini',
              'value' => 'gpt-4o-mini',
            ),
            3 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.gemini-2-0-flash',
              'value' => 'gemini-2.0-flash',
            ),
            4 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.deepseek-r1-8b',
              'value' => 'deepseek-r1:8b',
            ),
            5 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.llama-groq',
              'value' => 'llama3-8b-8192',
            ),
            6 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.llama3-2-3b',
              'value' => 'llama3.2:3b',
            ),
            7 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.llama3-2-1b',
              'value' => 'llama3.2:1b',
            ),
            8 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.llama3-1-8b',
              'value' => 'llama3.1:8b',
            ),
            9 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.llama3-8b',
              'value' => 'llama3:8b',
            ),
            10 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.llava-7b',
              'value' => 'llava:7b',
            ),
            11 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.vicuna-13b',
              'value' => 'vicuna:13b',
            ),
            12 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.vicuna-7b',
              'value' => 'vicuna:7b',
            ),
            13 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.qwen2-5-14b',
              'value' => 'qwen2.5:14b',
            ),
            14 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.qwen2-5-7b',
              'value' => 'qwen2.5:7b',
            ),
            15 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.qwen2-5-3b',
              'value' => 'qwen2.5:3b',
            ),
            16 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.qwen2-5-1-5b',
              'value' => 'qwen2.5:1.5b',
            ),
            17 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.qwen2-5-0-5b',
              'value' => 'qwen2.5:0.5b',
            ),
            18 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.mistral-7b',
              'value' => 'mistral:7b',
            ),
            19 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.starling-lm-7b',
              'value' => 'starling-lm:7b',
            ),
            20 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.phi3-5',
              'value' => 'phi3.5',
            ),
            21 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.review-translation.orca-mini',
              'value' => 'orca-mini',
            ),
          ),
        ),
      ),
    ),
    17 => 
    array (
      'key' => 'general.magic_ai.checkout_message',
      'name' => 'admin::app.configuration.index.general.magic-ai.checkout-message.title',
      'info' => 'admin::app.configuration.index.general.magic-ai.checkout-message.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.enabled',
          'type' => 'boolean',
          'channel_based' => true,
        ),
        1 => 
        array (
          'name' => 'model',
          'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.model',
          'type' => 'select',
          'channel_based' => true,
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.gpt-4-turbo',
              'value' => 'gpt-4-turbo',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.gpt-4o',
              'value' => 'gpt-4o',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.gpt-4o-mini',
              'value' => 'gpt-4o-mini',
            ),
            3 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.gemini-2-0-flash',
              'value' => 'gemini-2.0-flash',
            ),
            4 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.deepseek-r1-8b',
              'value' => 'deepseek-r1:8b',
            ),
            5 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.llama-groq',
              'value' => 'llama3.3',
            ),
            6 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.llama3-2-3b',
              'value' => 'llama3.2:3b',
            ),
            7 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.llama3-2-1b',
              'value' => 'llama3.2:1b',
            ),
            8 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.llama3-1-8b',
              'value' => 'llama3.1:8b',
            ),
            9 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.llama3-8b',
              'value' => 'llama3:8b',
            ),
            10 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.llava-7b',
              'value' => 'llava:7b',
            ),
            11 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.vicuna-13b',
              'value' => 'vicuna:13b',
            ),
            12 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.vicuna-7b',
              'value' => 'vicuna:7b',
            ),
            13 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.qwen2-5-14b',
              'value' => 'qwen2.5:14b',
            ),
            14 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.qwen2-5-7b',
              'value' => 'qwen2.5:7b',
            ),
            15 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.qwen2-5-3b',
              'value' => 'qwen2.5:3b',
            ),
            16 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.qwen2-5-1-5b',
              'value' => 'qwen2.5:1.5b',
            ),
            17 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.qwen2-5-0-5b',
              'value' => 'qwen2.5:0.5b',
            ),
            18 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.mistral-7b',
              'value' => 'mistral:7b',
            ),
            19 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.starling-lm-7b',
              'value' => 'starling-lm:7b',
            ),
            20 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.phi3-5',
              'value' => 'phi3.5',
            ),
            21 => 
            array (
              'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.orca-mini',
              'value' => 'orca-mini',
            ),
          ),
        ),
        2 => 
        array (
          'name' => 'prompt',
          'title' => 'admin::app.configuration.index.general.magic-ai.checkout-message.prompt',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
      ),
    ),
    18 => 
    array (
      'key' => 'general.sitemap',
      'name' => 'admin::app.configuration.index.general.sitemap.title',
      'info' => 'admin::app.configuration.index.general.sitemap.info',
      'icon' => 'settings/store.svg',
      'sort' => 3,
    ),
    19 => 
    array (
      'key' => 'general.sitemap.settings',
      'name' => 'admin::app.configuration.index.general.sitemap.settings.title',
      'info' => 'admin::app.configuration.index.general.sitemap.settings.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.sitemap.settings.enabled',
          'type' => 'boolean',
          'default' => 1,
          'channel_based' => true,
        ),
      ),
    ),
    20 => 
    array (
      'key' => 'general.sitemap.file_limits',
      'name' => 'admin::app.configuration.index.general.sitemap.file-limits.title',
      'info' => 'admin::app.configuration.index.general.sitemap.file-limits.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'max_url_per_file',
          'title' => 'admin::app.configuration.index.general.sitemap.file-limits.max-url-per-file',
          'type' => 'text',
          'default' => 50000,
          'validation' => 'integer|min:1',
          'channel_based' => true,
        ),
      ),
    ),
    21 => 
    array (
      'key' => 'general.gdpr',
      'name' => 'admin::app.configuration.index.general.gdpr.title',
      'info' => 'admin::app.configuration.index.general.gdpr.info',
      'icon' => 'settings/store.svg',
      'sort' => 4,
    ),
    22 => 
    array (
      'key' => 'general.gdpr.settings',
      'name' => 'admin::app.configuration.index.general.gdpr.settings.title',
      'info' => 'admin::app.configuration.index.general.gdpr.settings.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.gdpr.settings.enabled',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => true,
        ),
      ),
    ),
    23 => 
    array (
      'key' => 'general.gdpr.agreement',
      'name' => 'admin::app.configuration.index.general.gdpr.agreement.title',
      'info' => 'admin::app.configuration.index.general.gdpr.agreement.info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.gdpr.agreement.enable',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'agreement_label',
          'title' => 'admin::app.configuration.index.general.gdpr.agreement.checkbox-label',
          'type' => 'text',
          'default' => 'I agree with the terms and conditions.',
          'validation' => 'max:255',
          'depends' => 'enabled:true',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'agreement_content',
          'title' => 'admin::app.configuration.index.general.gdpr.agreement.content',
          'type' => 'editor',
          'depends' => 'enabled:true',
          'channel_based' => true,
          'locale_based' => true,
        ),
      ),
    ),
    24 => 
    array (
      'key' => 'general.gdpr.cookie',
      'name' => 'admin::app.configuration.index.general.gdpr.cookie.title',
      'info' => 'admin::app.configuration.index.general.gdpr.cookie.info',
      'sort' => 3,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.general.gdpr.cookie.enable',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'position',
          'title' => 'admin::app.configuration.index.general.gdpr.cookie.position',
          'type' => 'select',
          'default' => 'bottom-left',
          'depends' => 'enabled:true',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.general.gdpr.cookie.bottom-left',
              'value' => 'bottom-left',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.general.gdpr.cookie.bottom-right',
              'value' => 'bottom-right',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.general.gdpr.cookie.top-left',
              'value' => 'top-left',
            ),
            3 => 
            array (
              'title' => 'admin::app.configuration.index.general.gdpr.cookie.top-right',
              'value' => 'top-right',
            ),
            4 => 
            array (
              'title' => 'admin::app.configuration.index.general.gdpr.cookie.center',
              'value' => 'center',
            ),
          ),
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'static_block_identifier',
          'title' => 'admin::app.configuration.index.general.gdpr.cookie.identifier',
          'type' => 'text',
          'default' => 'Cookie Block',
          'validation' => 'max:255',
          'depends' => 'enabled:true',
          'channel_based' => true,
          'locale_based' => true,
        ),
        3 => 
        array (
          'name' => 'description',
          'title' => 'admin::app.configuration.index.general.gdpr.cookie.description',
          'type' => 'textarea',
          'default' => 'This website uses cookies to ensure you get the best experience on our website.',
          'validation' => 'max:500',
          'depends' => 'enabled:true',
          'channel_based' => true,
          'locale_based' => true,
        ),
      ),
    ),
    25 => 
    array (
      'key' => 'general.gdpr.cookie_consent',
      'name' => 'admin::app.configuration.index.general.gdpr.cookie-consent.title',
      'info' => 'admin::app.configuration.index.general.gdpr.cookie-consent.info',
      'sort' => 4,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'strictly_necessary',
          'title' => 'admin::app.configuration.index.general.gdpr.cookie-consent.strictly-necessary',
          'type' => 'editor',
          'default' => 'I agree with the terms and conditions.',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'basic_interaction',
          'title' => 'admin::app.configuration.index.general.gdpr.cookie-consent.basic-interaction',
          'type' => 'editor',
          'default' => 'These trackers enable basic interactions and functionalities that allow you to access selected features of our service and facilitate your communication with us.',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'experience_enhancement',
          'title' => 'admin::app.configuration.index.general.gdpr.cookie-consent.experience-enhancement',
          'type' => 'editor',
          'default' => 'These trackers help us to provide a personalized user experience by improving the quality of your preference management options, and by enabling the interaction with external networks and platforms.',
          'channel_based' => true,
          'locale_based' => true,
        ),
        3 => 
        array (
          'name' => 'measurements',
          'title' => 'admin::app.configuration.index.general.gdpr.cookie-consent.measurement',
          'type' => 'editor',
          'default' => 'These trackers help us to measure traffic and analyze your behavior with the goal of improving our service.',
          'channel_based' => true,
          'locale_based' => true,
        ),
        4 => 
        array (
          'name' => 'targeting_advertising',
          'title' => 'admin::app.configuration.index.general.gdpr.cookie-consent.targeting-advertising',
          'type' => 'editor',
          'default' => 'These trackers help us to deliver personalized marketing content to you based on your behavior and to operate, serve and track ads.',
          'channel_based' => true,
          'locale_based' => true,
        ),
      ),
    ),
    26 => 
    array (
      'key' => 'catalog',
      'name' => 'admin::app.configuration.index.catalog.title',
      'info' => 'admin::app.configuration.index.catalog.info',
      'sort' => 2,
    ),
    27 => 
    array (
      'key' => 'catalog.products',
      'name' => 'admin::app.configuration.index.catalog.products.title',
      'info' => 'admin::app.configuration.index.catalog.products.info',
      'icon' => 'settings/product.svg',
      'sort' => 1,
    ),
    28 => 
    array (
      'key' => 'catalog.products.settings',
      'name' => 'admin::app.configuration.index.catalog.products.settings.title',
      'info' => 'admin::app.configuration.index.catalog.products.settings.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'compare_option',
          'title' => 'admin::app.configuration.index.catalog.products.settings.compare-options',
          'type' => 'boolean',
          'default' => 1,
        ),
        1 => 
        array (
          'name' => 'image_search',
          'title' => 'admin::app.configuration.index.catalog.products.settings.image-search-option',
          'type' => 'boolean',
          'default' => 1,
        ),
      ),
    ),
    29 => 
    array (
      'key' => 'catalog.products.search',
      'name' => 'admin::app.configuration.index.catalog.products.search.title',
      'info' => 'admin::app.configuration.index.catalog.products.search.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'engine',
          'title' => 'admin::app.configuration.index.catalog.products.search.search-engine',
          'type' => 'select',
          'default' => 'database',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.search.database',
              'value' => 'database',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.search.elastic',
              'value' => 'elastic',
            ),
          ),
        ),
        1 => 
        array (
          'name' => 'admin_mode',
          'title' => 'admin::app.configuration.index.catalog.products.search.admin-mode',
          'info' => 'admin::app.configuration.index.catalog.products.search.admin-mode-info',
          'type' => 'select',
          'default' => 'database',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.search.database',
              'value' => 'database',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.search.elastic',
              'value' => 'elastic',
            ),
          ),
        ),
        2 => 
        array (
          'name' => 'storefront_mode',
          'title' => 'admin::app.configuration.index.catalog.products.search.storefront-mode',
          'info' => 'admin::app.configuration.index.catalog.products.search.storefront-mode-info',
          'type' => 'select',
          'default' => 'database',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.search.database',
              'value' => 'database',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.search.elastic',
              'value' => 'elastic',
            ),
          ),
        ),
        3 => 
        array (
          'name' => 'min_query_length',
          'title' => 'admin::app.configuration.index.catalog.products.search.min-query-length',
          'info' => 'admin::app.configuration.index.catalog.products.search.min-query-length-info',
          'type' => 'number',
          'validation' => 'numeric',
          'default' => '0',
        ),
        4 => 
        array (
          'name' => 'max_query_length',
          'title' => 'admin::app.configuration.index.catalog.products.search.max-query-length',
          'info' => 'admin::app.configuration.index.catalog.products.search.max-query-length-info',
          'type' => 'number',
          'validation' => 'numeric',
          'default' => '1000',
        ),
      ),
    ),
    30 => 
    array (
      'key' => 'catalog.products.product_view_page',
      'name' => 'admin::app.configuration.index.catalog.products.product-view-page.title',
      'info' => 'admin::app.configuration.index.catalog.products.product-view-page.title-info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'no_of_related_products',
          'title' => 'admin::app.configuration.index.catalog.products.product-view-page.allow-no-of-related-products',
          'type' => 'number',
          'validation' => 'integer|min:0',
        ),
        1 => 
        array (
          'name' => 'no_of_up_sells_products',
          'title' => 'admin::app.configuration.index.catalog.products.product-view-page.allow-no-of-up-sells-products',
          'type' => 'number',
          'validation' => 'integer|min:0',
        ),
      ),
    ),
    31 => 
    array (
      'key' => 'catalog.products.cart_view_page',
      'name' => 'admin::app.configuration.index.catalog.products.cart-view-page.title',
      'info' => 'admin::app.configuration.index.catalog.products.cart-view-page.title-info',
      'sort' => 3,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'no_of_cross_sells_products',
          'title' => 'admin::app.configuration.index.catalog.products.cart-view-page.allow-no-of-cross-sells-products',
          'type' => 'number',
          'validation' => 'integer|min:0',
        ),
      ),
    ),
    32 => 
    array (
      'key' => 'catalog.products.storefront',
      'name' => 'admin::app.configuration.index.catalog.products.storefront.title',
      'info' => 'admin::app.configuration.index.catalog.products.storefront.title-info',
      'sort' => 4,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'mode',
          'title' => 'admin::app.configuration.index.catalog.products.storefront.default-list-mode',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.storefront.grid',
              'value' => 'grid',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.storefront.list',
              'value' => 'list',
            ),
          ),
          'channel_based' => true,
        ),
        1 => 
        array (
          'name' => 'products_per_page',
          'title' => 'admin::app.configuration.index.catalog.products.storefront.products-per-page',
          'type' => 'text',
          'info' => 'admin::app.configuration.index.catalog.products.storefront.comma-separated',
          'channel_based' => true,
        ),
        2 => 
        array (
          'name' => 'sort_by',
          'title' => 'admin::app.configuration.index.catalog.products.storefront.sort-by',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.storefront.from-a-z',
              'value' => 'name-asc',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.storefront.from-z-a',
              'value' => 'name-desc',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.storefront.latest-first',
              'value' => 'created_at-desc',
            ),
            3 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.storefront.oldest-first',
              'value' => 'created_at-asc',
            ),
            4 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.storefront.cheapest-first',
              'value' => 'price-asc',
            ),
            5 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.storefront.expensive-first',
              'value' => 'price-desc',
            ),
          ),
          'channel_based' => true,
        ),
        3 => 
        array (
          'name' => 'buy_now_button_display',
          'title' => 'admin::app.configuration.index.catalog.products.storefront.buy-now-button-display',
          'type' => 'boolean',
        ),
      ),
    ),
    33 => 
    array (
      'key' => 'catalog.products.cache_small_image',
      'name' => 'admin::app.configuration.index.catalog.products.small-image.title',
      'info' => 'admin::app.configuration.index.catalog.products.small-image.title-info',
      'sort' => 5,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'width',
          'title' => 'admin::app.configuration.index.catalog.products.small-image.width',
          'type' => 'text',
          'validation' => 'integer|min:1',
        ),
        1 => 
        array (
          'name' => 'height',
          'title' => 'admin::app.configuration.index.catalog.products.small-image.height',
          'type' => 'text',
          'validation' => 'integer|min:1',
        ),
        2 => 
        array (
          'name' => 'url',
          'title' => 'admin::app.configuration.index.catalog.products.small-image.placeholder',
          'type' => 'image',
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp,svg',
        ),
      ),
    ),
    34 => 
    array (
      'key' => 'catalog.products.cache_medium_image',
      'name' => 'admin::app.configuration.index.catalog.products.medium-image.title',
      'info' => 'admin::app.configuration.index.catalog.products.medium-image.title-info',
      'sort' => 6,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'width',
          'title' => 'admin::app.configuration.index.catalog.products.medium-image.width',
          'type' => 'text',
          'validation' => 'integer|min:1',
        ),
        1 => 
        array (
          'name' => 'height',
          'title' => 'admin::app.configuration.index.catalog.products.medium-image.height',
          'type' => 'text',
          'validation' => 'integer|min:1',
        ),
        2 => 
        array (
          'name' => 'url',
          'title' => 'admin::app.configuration.index.catalog.products.medium-image.placeholder',
          'type' => 'image',
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp,svg',
        ),
      ),
    ),
    35 => 
    array (
      'key' => 'catalog.products.cache_large_image',
      'name' => 'admin::app.configuration.index.catalog.products.large-image.title',
      'info' => 'admin::app.configuration.index.catalog.products.large-image.title-info',
      'sort' => 7,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'width',
          'title' => 'admin::app.configuration.index.catalog.products.large-image.width',
          'type' => 'text',
          'validation' => 'integer|min:1',
        ),
        1 => 
        array (
          'name' => 'height',
          'title' => 'admin::app.configuration.index.catalog.products.large-image.height',
          'type' => 'text',
          'validation' => 'integer|min:1',
        ),
        2 => 
        array (
          'name' => 'url',
          'title' => 'admin::app.configuration.index.catalog.products.large-image.placeholder',
          'type' => 'image',
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp,svg',
        ),
      ),
    ),
    36 => 
    array (
      'key' => 'catalog.products.review',
      'name' => 'admin::app.configuration.index.catalog.products.review.title',
      'info' => 'admin::app.configuration.index.catalog.products.review.title-info',
      'sort' => 8,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'guest_review',
          'title' => 'admin::app.configuration.index.catalog.products.review.allow-guest-review',
          'type' => 'boolean',
        ),
        1 => 
        array (
          'name' => 'customer_review',
          'title' => 'admin::app.configuration.index.catalog.products.review.allow-customer-review',
          'type' => 'boolean',
          'default' => true,
        ),
        2 => 
        array (
          'name' => 'censoring_reviewer_name',
          'title' => 'admin::app.configuration.index.catalog.products.review.censoring-reviewer-name',
          'type' => 'boolean',
          'default' => true,
        ),
        3 => 
        array (
          'name' => 'summary',
          'title' => 'admin::app.configuration.index.catalog.products.review.summary',
          'type' => 'select',
          'default' => 'review_counts',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.review.display-star-count',
              'value' => 'star_counts',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.catalog.products.review.display-review-count',
              'value' => 'review_counts',
            ),
          ),
        ),
      ),
    ),
    37 => 
    array (
      'key' => 'catalog.products.attribute',
      'name' => 'admin::app.configuration.index.catalog.products.attribute.title',
      'info' => 'admin::app.configuration.index.catalog.products.attribute.title-info',
      'sort' => 9,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'image_attribute_upload_size',
          'title' => 'admin::app.configuration.index.catalog.products.attribute.image-upload-size',
          'type' => 'text',
          'validation' => 'numeric',
        ),
        1 => 
        array (
          'name' => 'file_attribute_upload_size',
          'title' => 'admin::app.configuration.index.catalog.products.attribute.file-upload-size',
          'type' => 'text',
          'validation' => 'numeric',
        ),
      ),
    ),
    38 => 
    array (
      'key' => 'catalog.products.social_share',
      'name' => 'admin::app.configuration.index.catalog.products.social-share.title',
      'info' => 'admin::app.configuration.index.catalog.products.social-share.title-info',
      'sort' => 10,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enabled',
          'title' => 'admin::app.configuration.index.catalog.products.social-share.enable-social-share',
          'type' => 'boolean',
        ),
        1 => 
        array (
          'name' => 'facebook',
          'title' => 'admin::app.configuration.index.catalog.products.social-share.enable-share-facebook',
          'type' => 'boolean',
        ),
        2 => 
        array (
          'name' => 'twitter',
          'title' => 'admin::app.configuration.index.catalog.products.social-share.enable-share-twitter',
          'type' => 'boolean',
        ),
        3 => 
        array (
          'name' => 'pinterest',
          'title' => 'admin::app.configuration.index.catalog.products.social-share.enable-share-pinterest',
          'type' => 'boolean',
        ),
        4 => 
        array (
          'name' => 'whatsapp',
          'title' => 'admin::app.configuration.index.catalog.products.social-share.enable-share-whatsapp',
          'type' => 'boolean',
          'info' => 'admin::app.configuration.index.catalog.products.social-share.enable-share-whatsapp-info',
        ),
        5 => 
        array (
          'name' => 'linkedin',
          'title' => 'admin::app.configuration.index.catalog.products.social-share.enable-share-linkedin',
          'type' => 'boolean',
        ),
        6 => 
        array (
          'name' => 'email',
          'title' => 'admin::app.configuration.index.catalog.products.social-share.enable-share-email',
          'type' => 'boolean',
        ),
        7 => 
        array (
          'name' => 'share_message',
          'title' => 'admin::app.configuration.index.catalog.products.social-share.share-message',
          'type' => 'text',
        ),
      ),
    ),
    39 => 
    array (
      'key' => 'catalog.rich_snippets',
      'name' => 'admin::app.configuration.index.catalog.rich-snippets.title',
      'info' => 'admin::app.configuration.index.catalog.rich-snippets.info',
      'icon' => 'settings/settings.svg',
      'sort' => 2,
    ),
    40 => 
    array (
      'key' => 'catalog.rich_snippets.products',
      'name' => 'admin::app.configuration.index.catalog.rich-snippets.products.title',
      'info' => 'admin::app.configuration.index.catalog.rich-snippets.products.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enable',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.products.enable',
          'type' => 'boolean',
        ),
        1 => 
        array (
          'name' => 'show_sku',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.products.show-sku',
          'type' => 'boolean',
        ),
        2 => 
        array (
          'name' => 'show_weight',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.products.show-weight',
          'type' => 'boolean',
        ),
        3 => 
        array (
          'name' => 'show_categories',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.products.show-categories',
          'type' => 'boolean',
        ),
        4 => 
        array (
          'name' => 'show_images',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.products.show-images',
          'type' => 'boolean',
        ),
        5 => 
        array (
          'name' => 'show_reviews',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.products.show-reviews',
          'type' => 'boolean',
        ),
        6 => 
        array (
          'name' => 'show_ratings',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.products.show-ratings',
          'type' => 'boolean',
        ),
        7 => 
        array (
          'name' => 'show_offers',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.products.show-offers',
          'type' => 'boolean',
        ),
      ),
    ),
    41 => 
    array (
      'key' => 'catalog.rich_snippets.categories',
      'name' => 'admin::app.configuration.index.catalog.rich-snippets.categories.title',
      'info' => 'admin::app.configuration.index.catalog.rich-snippets.categories.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enable',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.categories.enable',
          'type' => 'boolean',
        ),
        1 => 
        array (
          'name' => 'show_search_input_field',
          'title' => 'admin::app.configuration.index.catalog.rich-snippets.categories.show-search-input-field',
          'type' => 'boolean',
        ),
      ),
    ),
    42 => 
    array (
      'key' => 'catalog.inventory',
      'name' => 'admin::app.configuration.index.catalog.inventory.title',
      'info' => 'admin::app.configuration.index.catalog.inventory.title-info',
      'icon' => 'settings/inventory.svg',
      'sort' => 3,
    ),
    43 => 
    array (
      'key' => 'catalog.inventory.stock_options',
      'name' => 'admin::app.configuration.index.catalog.inventory.product-stock-options.title',
      'info' => 'admin::app.configuration.index.catalog.inventory.product-stock-options.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'back_orders',
          'title' => 'admin::app.configuration.index.catalog.inventory.product-stock-options.allow-back-orders',
          'type' => 'boolean',
          0 => 'default',
        ),
        1 => 
        array (
          'name' => 'out_of_stock_threshold',
          'title' => 'admin::app.configuration.index.catalog.inventory.product-stock-options.out-of-stock-threshold',
          'type' => 'number',
          'default' => '0',
        ),
      ),
    ),
    44 => 
    array (
      'key' => 'customer',
      'name' => 'admin::app.configuration.index.customer.title',
      'info' => 'admin::app.configuration.index.customer.info',
      'sort' => 3,
    ),
    45 => 
    array (
      'key' => 'customer.address',
      'name' => 'admin::app.configuration.index.customer.address.title',
      'info' => 'admin::app.configuration.index.customer.address.info',
      'icon' => 'settings/address.svg',
      'sort' => 1,
    ),
    46 => 
    array (
      'key' => 'customer.address.requirements',
      'name' => 'admin::app.configuration.index.customer.address.requirements.title',
      'info' => 'admin::app.configuration.index.customer.address.requirements.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'country',
          'title' => 'admin::app.configuration.index.customer.address.requirements.country',
          'type' => 'boolean',
          'channel_based' => true,
          'default' => 1,
        ),
        1 => 
        array (
          'name' => 'state',
          'title' => 'admin::app.configuration.index.customer.address.requirements.state',
          'type' => 'boolean',
          'channel_based' => true,
          'default' => 1,
        ),
        2 => 
        array (
          'name' => 'postcode',
          'title' => 'admin::app.configuration.index.customer.address.requirements.zip',
          'type' => 'boolean',
          'channel_based' => true,
          'default' => 1,
        ),
      ),
    ),
    47 => 
    array (
      'key' => 'customer.address.information',
      'name' => 'admin::app.configuration.index.customer.address.information.title',
      'info' => 'admin::app.configuration.index.customer.address.information.title-info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'street_lines',
          'title' => 'admin::app.configuration.index.customer.address.information.street-lines',
          'type' => 'text',
          'validation' => 'between:1,4|integer',
          'channel_based' => true,
          'default_value' => 1,
        ),
      ),
    ),
    48 => 
    array (
      'key' => 'customer.captcha',
      'name' => 'admin::app.configuration.index.customer.captcha.title',
      'info' => 'admin::app.configuration.index.customer.captcha.info',
      'icon' => 'settings/captcha.svg',
      'sort' => 2,
    ),
    49 => 
    array (
      'key' => 'customer.captcha.credentials',
      'name' => 'admin::app.configuration.index.customer.captcha.credentials.title',
      'info' => 'admin::app.configuration.index.customer.captcha.credentials.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'status',
          'title' => 'admin::app.configuration.index.customer.captcha.credentials.status',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => false,
        ),
        1 => 
        array (
          'name' => 'site_key',
          'title' => 'admin::app.configuration.index.customer.captcha.credentials.site-key',
          'type' => 'text',
          'depends' => 'status:true',
          'validation' => 'required_if:status,1',
          'channel_based' => true,
          'locale_based' => false,
        ),
        2 => 
        array (
          'name' => 'secret_key',
          'title' => 'admin::app.configuration.index.customer.captcha.credentials.secret-key',
          'type' => 'text',
          'depends' => 'status:true',
          'validation' => 'required_if:status,1',
          'channel_based' => true,
          'locale_based' => false,
        ),
      ),
    ),
    50 => 
    array (
      'key' => 'customer.settings',
      'name' => 'admin::app.configuration.index.customer.settings.title',
      'info' => 'admin::app.configuration.index.customer.settings.settings-info',
      'icon' => 'settings/settings.svg',
      'sort' => 3,
    ),
    51 => 
    array (
      'key' => 'customer.settings.wishlist',
      'name' => 'admin::app.configuration.index.customer.settings.wishlist.title',
      'info' => 'admin::app.configuration.index.customer.settings.wishlist.title-info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'wishlist_option',
          'title' => 'admin::app.configuration.index.customer.settings.wishlist.allow-option',
          'type' => 'boolean',
          'default' => 1,
        ),
      ),
    ),
    52 => 
    array (
      'key' => 'customer.settings.login_options',
      'name' => 'admin::app.configuration.index.customer.settings.login-options.title',
      'info' => 'admin::app.configuration.index.customer.settings.login-options.title-info',
      'sort' => 3,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'redirected_to_page',
          'title' => 'admin::app.configuration.index.customer.settings.login-options.redirect-to-page',
          'type' => 'select',
          'default' => 'home',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.customer.settings.login-options.home',
              'value' => 'home',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.customer.settings.login-options.account',
              'value' => 'account',
            ),
          ),
        ),
      ),
    ),
    53 => 
    array (
      'key' => 'customer.settings.create_new_account_options',
      'name' => 'admin::app.configuration.index.customer.settings.create-new-account-option.title',
      'info' => 'admin::app.configuration.index.customer.settings.create-new-account-option.title-info',
      'sort' => 4,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'default_group',
          'title' => 'admin::app.configuration.index.customer.settings.create-new-account-option.default-group.title',
          'info' => 'admin::app.configuration.index.customer.settings.create-new-account-option.default-group.title-info',
          'type' => 'select',
          'default' => 'general',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.customer.settings.create-new-account-option.default-group.general',
              'value' => 'general',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.customer.settings.create-new-account-option.default-group.guest',
              'value' => 'guest',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.customer.settings.create-new-account-option.default-group.wholesale',
              'value' => 'wholesale',
            ),
          ),
        ),
        1 => 
        array (
          'name' => 'news_letter',
          'title' => 'admin::app.configuration.index.customer.settings.create-new-account-option.news-letter',
          'info' => 'admin::app.configuration.index.customer.settings.create-new-account-option.news-letter-info',
          'type' => 'boolean',
          'default' => true,
        ),
      ),
    ),
    54 => 
    array (
      'key' => 'customer.settings.newsletter',
      'name' => 'admin::app.configuration.index.customer.settings.newsletter.title',
      'info' => 'admin::app.configuration.index.customer.settings.newsletter.title-info',
      'sort' => 5,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'subscription',
          'title' => 'admin::app.configuration.index.customer.settings.newsletter.subscription',
          'info' => 'Enable subscription option for users in the footer section.',
          'type' => 'boolean',
          'default' => 1,
        ),
      ),
    ),
    55 => 
    array (
      'key' => 'customer.settings.email',
      'name' => 'admin::app.configuration.index.customer.settings.email.title',
      'info' => 'admin::app.configuration.index.customer.settings.email.title-info',
      'sort' => 6,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'verification',
          'title' => 'admin::app.configuration.index.customer.settings.email.email-verification',
          'type' => 'boolean',
        ),
      ),
    ),
    56 => 
    array (
      'key' => 'customer.settings.social_login',
      'name' => 'admin::app.configuration.index.customer.settings.social-login.title',
      'info' => 'admin::app.configuration.index.customer.settings.social-login.info',
      'sort' => 7,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enable_facebook',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.facebook.enable-facebook',
          'type' => 'boolean',
          'channel_based' => true,
        ),
        1 => 
        array (
          'name' => 'facebook_client_id',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.facebook.client-id.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.facebook.client-id.title-info',
          'type' => 'text',
          'depends' => 'enable_facebook:1',
        ),
        2 => 
        array (
          'name' => 'facebook_client_secret',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.facebook.client-secret.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.facebook.client-secret.title-info',
          'type' => 'text',
          'depends' => 'enable_facebook:1',
        ),
        3 => 
        array (
          'name' => 'facebook_callback_url',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.facebook.redirect.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.facebook.redirect.title-info',
          'type' => 'text',
          'depends' => 'enable_facebook:1',
        ),
        4 => 
        array (
          'name' => 'enable_twitter',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.twitter.enable-twitter',
          'type' => 'boolean',
          'channel_based' => true,
        ),
        5 => 
        array (
          'name' => 'twitter_client_id',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.twitter.client-id.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.twitter.client-id.title-info',
          'type' => 'text',
          'depends' => 'enable_twitter:1',
        ),
        6 => 
        array (
          'name' => 'twitter_client_secret',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.twitter.client-secret.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.twitter.client-secret.title-info',
          'type' => 'text',
          'depends' => 'enable_twitter:1',
        ),
        7 => 
        array (
          'name' => 'twitter_callback_url',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.twitter.redirect.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.twitter.redirect.title-info',
          'type' => 'text',
          'depends' => 'enable_twitter:1',
        ),
        8 => 
        array (
          'name' => 'enable_google',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.google.enable-google',
          'type' => 'boolean',
          'channel_based' => true,
        ),
        9 => 
        array (
          'name' => 'google_client_id',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.google.client-id.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.google.client-id.title-info',
          'type' => 'text',
          'depends' => 'enable_google:1',
        ),
        10 => 
        array (
          'name' => 'google_client_secret',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.google.client-secret.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.google.client-secret.title-info',
          'type' => 'text',
          'depends' => 'enable_google:1',
        ),
        11 => 
        array (
          'name' => 'google_callback_url',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.google.redirect.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.google.redirect.title-info',
          'type' => 'text',
          'depends' => 'enable_google:1',
        ),
        12 => 
        array (
          'name' => 'enable_linkedin-openid',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.linkedin.enable-linkedin',
          'type' => 'boolean',
          'channel_based' => true,
        ),
        13 => 
        array (
          'name' => 'linkedin_client_id',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.linkedin.client-id.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.linkedin.client-id.title-info',
          'type' => 'text',
          'depends' => 'enable_linkedin-openid:1',
        ),
        14 => 
        array (
          'name' => 'linkedin_client_secret',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.linkedin.client-secret.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.linkedin.client-secret.title-info',
          'type' => 'text',
          'depends' => 'enable_linkedin-openid:1',
        ),
        15 => 
        array (
          'name' => 'linkedin_callback_url',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.linkedin.redirect.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.linkedin.redirect.title-info',
          'type' => 'text',
          'depends' => 'enable_linkedin-openid:1',
        ),
        16 => 
        array (
          'name' => 'enable_github',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.github.enable-github',
          'type' => 'boolean',
          'channel_based' => true,
        ),
        17 => 
        array (
          'name' => 'github_client_id',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.github.client-id.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.github.client-id.title-info',
          'type' => 'text',
          'depends' => 'enable_github:1',
        ),
        18 => 
        array (
          'name' => 'github_client_secret',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.github.client-secret.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.github.client-secret.title-info',
          'type' => 'text',
          'depends' => 'enable_github:1',
        ),
        19 => 
        array (
          'name' => 'github_callback_url',
          'title' => 'admin::app.configuration.index.customer.settings.social-login.github.redirect.title',
          'info' => 'admin::app.configuration.index.customer.settings.social-login.github.redirect.title-info',
          'type' => 'text',
          'depends' => 'enable_github:1',
        ),
      ),
    ),
    57 => 
    array (
      'key' => 'emails',
      'name' => 'admin::app.configuration.index.email.title',
      'info' => 'admin::app.configuration.index.email.info',
      'sort' => 4,
    ),
    58 => 
    array (
      'key' => 'emails.configure',
      'name' => 'admin::app.configuration.index.email.email-settings.title',
      'info' => 'admin::app.configuration.index.email.email-settings.info',
      'icon' => 'settings/email.svg',
      'sort' => 1,
    ),
    59 => 
    array (
      'key' => 'emails.configure.email_settings',
      'name' => 'admin::app.configuration.index.email.email-settings.title',
      'info' => 'admin::app.configuration.index.email.email-settings.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'sender_name',
          'title' => 'admin::app.configuration.index.email.email-settings.email-sender-name',
          'type' => 'text',
          'info' => 'admin::app.configuration.index.email.email-settings.email-sender-name-tip',
          'validation' => 'required|max:50',
          'channel_based' => true,
          'default_value' => 'Mawgood',
        ),
        1 => 
        array (
          'name' => 'shop_email_from',
          'title' => 'admin::app.configuration.index.email.email-settings.shop-email-from',
          'type' => 'text',
          'info' => 'admin::app.configuration.index.email.email-settings.shop-email-from-tip',
          'validation' => 'required|email',
          'channel_based' => true,
          'default_value' => 'noreply@mawgood.com',
        ),
        2 => 
        array (
          'name' => 'admin_name',
          'title' => 'admin::app.configuration.index.email.email-settings.admin-name',
          'type' => 'text',
          'info' => 'admin::app.configuration.index.email.email-settings.admin-name-tip',
          'validation' => 'required|max:50',
          'channel_based' => true,
          'default_value' => 'Admin',
        ),
        3 => 
        array (
          'name' => 'admin_email',
          'title' => 'admin::app.configuration.index.email.email-settings.admin-email',
          'type' => 'text',
          'info' => 'admin::app.configuration.index.email.email-settings.admin-email-tip',
          'validation' => 'required|email',
          'channel_based' => true,
          'default_value' => NULL,
        ),
        4 => 
        array (
          'name' => 'contact_name',
          'title' => 'admin::app.configuration.index.email.email-settings.contact-name',
          'type' => 'text',
          'info' => 'admin::app.configuration.index.email.email-settings.contact-name-tip',
          'validation' => 'required|max:50',
          'channel_based' => true,
          'default_value' => 'Contact',
        ),
        5 => 
        array (
          'name' => 'contact_email',
          'title' => 'admin::app.configuration.index.email.email-settings.contact-email',
          'type' => 'text',
          'info' => 'admin::app.configuration.index.email.email-settings.contact-email-tip',
          'validation' => 'required|email',
          'channel_based' => true,
          'default_value' => NULL,
        ),
      ),
    ),
    60 => 
    array (
      'key' => 'emails.general',
      'name' => 'admin::app.configuration.index.email.notifications.title',
      'info' => 'admin::app.configuration.index.email.notifications.info',
      'icon' => 'settings/store.svg',
      'sort' => 1,
    ),
    61 => 
    array (
      'key' => 'emails.general.notifications',
      'name' => 'admin::app.configuration.index.email.notifications.title',
      'info' => 'admin::app.configuration.index.email.notifications.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'emails.general.notifications.registration',
          'title' => 'admin::app.configuration.index.email.notifications.registration',
          'type' => 'boolean',
        ),
        1 => 
        array (
          'name' => 'emails.general.notifications.customer_registration_confirmation_mail_to_admin',
          'title' => 'admin::app.configuration.index.email.notifications.customer-registration-confirmation-mail-to-admin',
          'type' => 'boolean',
        ),
        2 => 
        array (
          'name' => 'emails.general.notifications.customer_account_credentials',
          'title' => 'admin::app.configuration.index.email.notifications.customer',
          'type' => 'boolean',
        ),
        3 => 
        array (
          'name' => 'emails.general.notifications.new_order',
          'title' => 'admin::app.configuration.index.email.notifications.new-order',
          'type' => 'boolean',
        ),
        4 => 
        array (
          'name' => 'emails.general.notifications.new_order_mail_to_admin',
          'title' => 'admin::app.configuration.index.email.notifications.new-order-mail-to-admin',
          'type' => 'boolean',
        ),
        5 => 
        array (
          'name' => 'emails.general.notifications.new_invoice',
          'title' => 'admin::app.configuration.index.email.notifications.new-invoice',
          'type' => 'boolean',
        ),
        6 => 
        array (
          'name' => 'emails.general.notifications.new_invoice_mail_to_admin',
          'title' => 'admin::app.configuration.index.email.notifications.new-invoice-mail-to-admin',
          'type' => 'boolean',
        ),
        7 => 
        array (
          'name' => 'emails.general.notifications.new_refund',
          'title' => 'admin::app.configuration.index.email.notifications.new-refund',
          'type' => 'boolean',
        ),
        8 => 
        array (
          'name' => 'emails.general.notifications.new_refund_mail_to_admin',
          'title' => 'admin::app.configuration.index.email.notifications.new-refund-mail-to-admin',
          'type' => 'boolean',
        ),
        9 => 
        array (
          'name' => 'emails.general.notifications.new_shipment',
          'title' => 'admin::app.configuration.index.email.notifications.new-shipment',
          'type' => 'boolean',
        ),
        10 => 
        array (
          'name' => 'emails.general.notifications.new_shipment_mail_to_admin',
          'title' => 'admin::app.configuration.index.email.notifications.new-shipment-mail-to-admin',
          'type' => 'boolean',
        ),
        11 => 
        array (
          'name' => 'emails.general.notifications.new_inventory_source',
          'title' => 'admin::app.configuration.index.email.notifications.new-inventory-source',
          'type' => 'boolean',
        ),
        12 => 
        array (
          'name' => 'emails.general.notifications.cancel_order',
          'title' => 'admin::app.configuration.index.email.notifications.cancel-order',
          'type' => 'boolean',
        ),
        13 => 
        array (
          'name' => 'emails.general.notifications.cancel_order_mail_to_admin',
          'title' => 'admin::app.configuration.index.email.notifications.cancel-order-mail-to-admin',
          'type' => 'boolean',
        ),
      ),
    ),
    62 => 
    array (
      'key' => 'sales',
      'name' => 'admin::app.configuration.index.sales.title',
      'info' => 'admin::app.configuration.index.sales.info',
      'sort' => 5,
    ),
    63 => 
    array (
      'key' => 'sales.shipping',
      'name' => 'admin::app.configuration.index.sales.shipping-setting.title',
      'info' => 'admin::app.configuration.index.sales.shipping-setting.info',
      'icon' => 'settings/shipping.svg',
      'sort' => 1,
    ),
    64 => 
    array (
      'key' => 'sales.shipping.origin',
      'name' => 'admin::app.configuration.index.sales.shipping-setting.origin.title',
      'info' => 'admin::app.configuration.index.sales.shipping-setting.origin.title-info',
      'sort' => 0,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'country',
          'title' => 'admin::app.configuration.index.sales.shipping-setting.origin.country',
          'type' => 'country',
          'validation' => 'required',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'state',
          'title' => 'admin::app.configuration.index.sales.shipping-setting.origin.state',
          'type' => 'state',
          'validation' => 'required',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'city',
          'title' => 'admin::app.configuration.index.sales.shipping-setting.origin.city',
          'type' => 'text',
          'validation' => 'required',
          'channel_based' => true,
          'locale_based' => true,
        ),
        3 => 
        array (
          'name' => 'address',
          'title' => 'admin::app.configuration.index.sales.shipping-setting.origin.street-address',
          'type' => 'text',
          'validation' => 'required',
          'channel_based' => true,
          'locale_based' => true,
        ),
        4 => 
        array (
          'name' => 'zipcode',
          'title' => 'admin::app.configuration.index.sales.shipping-setting.origin.zip',
          'type' => 'text',
          'validation' => 'required|postcode',
          'channel_based' => true,
          'locale_based' => true,
        ),
        5 => 
        array (
          'name' => 'store_name',
          'title' => 'admin::app.configuration.index.sales.shipping-setting.origin.store-name',
          'type' => 'text',
          'channel_based' => true,
          'locale_based' => true,
        ),
        6 => 
        array (
          'name' => 'vat_number',
          'title' => 'admin::app.configuration.index.sales.shipping-setting.origin.vat-number',
          'type' => 'text',
          'channel_based' => true,
        ),
        7 => 
        array (
          'name' => 'contact',
          'title' => 'admin::app.configuration.index.sales.shipping-setting.origin.contact-number',
          'type' => 'text',
          'validation' => 'phone',
          'channel_based' => true,
        ),
        8 => 
        array (
          'name' => 'bank_details',
          'title' => 'admin::app.configuration.index.sales.shipping-setting.origin.bank-details',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
      ),
    ),
    65 => 
    array (
      'key' => 'sales.carriers',
      'name' => 'admin::app.configuration.index.sales.shipping-methods.title',
      'info' => 'admin::app.configuration.index.sales.shipping-methods.info',
      'icon' => 'settings/shipping-method.svg',
      'sort' => 2,
    ),
    66 => 
    array (
      'key' => 'sales.carriers.free',
      'name' => 'admin::app.configuration.index.sales.shipping-methods.free-shipping.page-title',
      'info' => 'admin::app.configuration.index.sales.shipping-methods.free-shipping.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'title',
          'title' => 'admin::app.configuration.index.sales.shipping-methods.free-shipping.title',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'description',
          'title' => 'admin::app.configuration.index.sales.shipping-methods.free-shipping.description',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'active',
          'title' => 'admin::app.configuration.index.sales.shipping-methods.free-shipping.status',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => false,
        ),
      ),
    ),
    67 => 
    array (
      'key' => 'sales.carriers.flatrate',
      'name' => 'admin::app.configuration.index.sales.shipping-methods.flat-rate-shipping.page-title',
      'info' => 'admin::app.configuration.index.sales.shipping-methods.flat-rate-shipping.title-info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'title',
          'title' => 'admin::app.configuration.index.sales.shipping-methods.flat-rate-shipping.title',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'description',
          'title' => 'admin::app.configuration.index.sales.shipping-methods.flat-rate-shipping.description',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'default_rate',
          'title' => 'admin::app.configuration.index.sales.shipping-methods.flat-rate-shipping.rate',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1|numeric',
          'channel_based' => true,
          'locale_based' => false,
        ),
        3 => 
        array (
          'name' => 'type',
          'title' => 'admin::app.configuration.index.sales.shipping-methods.flat-rate-shipping.type.title',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.shipping-methods.flat-rate-shipping.type.per-unit',
              'value' => 'per_unit',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.shipping-methods.flat-rate-shipping.type.per-order',
              'value' => 'per_order',
            ),
          ),
          'channel_based' => true,
          'locale_based' => false,
        ),
        4 => 
        array (
          'name' => 'active',
          'title' => 'admin::app.configuration.index.sales.shipping-methods.flat-rate-shipping.status',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => false,
        ),
      ),
    ),
    68 => 
    array (
      'key' => 'sales.payment_methods',
      'name' => 'admin::app.configuration.index.sales.payment-methods.page-title',
      'info' => 'admin::app.configuration.index.sales.payment-methods.info',
      'icon' => 'settings/payment-method.svg',
      'sort' => 3,
    ),
    69 => 
    array (
      'key' => 'sales.payment_methods.cashondelivery',
      'name' => 'admin::app.configuration.index.sales.payment-methods.cash-on-delivery',
      'info' => 'admin::app.configuration.index.sales.payment-methods.cash-on-delivery-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'title',
          'title' => 'admin::app.configuration.index.sales.payment-methods.title',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'description',
          'title' => 'admin::app.configuration.index.sales.payment-methods.description',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'image',
          'title' => 'admin::app.configuration.index.sales.payment-methods.logo',
          'type' => 'image',
          'info' => 'admin::app.configuration.index.sales.payment-methods.logo-information',
          'channel_based' => true,
          'locale_based' => false,
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp',
        ),
        3 => 
        array (
          'name' => 'instructions',
          'title' => 'admin::app.configuration.index.sales.payment-methods.instructions',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
        4 => 
        array (
          'name' => 'generate_invoice',
          'title' => 'admin::app.configuration.index.sales.payment-methods.generate-invoice',
          'type' => 'boolean',
          'default_value' => false,
          'channel_based' => true,
          'locale_based' => false,
        ),
        5 => 
        array (
          'name' => 'invoice_status',
          'title' => 'admin::app.configuration.index.sales.payment-methods.set-invoice-status',
          'depends' => 'generate_invoice:1',
          'validation' => 'required_if:generate_invoice,1',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.pending',
              'value' => 'pending',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.paid',
              'value' => 'paid',
            ),
          ),
          'info' => 'admin::app.configuration.index.sales.payment-methods.set-order-status',
          'channel_based' => true,
          'locale_based' => false,
        ),
        6 => 
        array (
          'name' => 'order_status',
          'title' => 'admin::app.configuration.index.sales.payment-methods.set-order-status',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.pending',
              'value' => 'pending',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.pending-payment',
              'value' => 'pending_payment',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.processing',
              'value' => 'processing',
            ),
          ),
          'info' => 'admin::app.configuration.index.sales.payment-methods.generate-invoice-applicable',
          'channel_based' => true,
          'locale_based' => false,
        ),
        7 => 
        array (
          'name' => 'active',
          'title' => 'admin::app.configuration.index.sales.payment-methods.status',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => false,
        ),
        8 => 
        array (
          'name' => 'sort',
          'title' => 'admin::app.configuration.index.sales.payment-methods.sort-order',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => '1',
              'value' => 1,
            ),
            1 => 
            array (
              'title' => '2',
              'value' => 2,
            ),
            2 => 
            array (
              'title' => '3',
              'value' => 3,
            ),
            3 => 
            array (
              'title' => '4',
              'value' => 4,
            ),
          ),
        ),
      ),
    ),
    70 => 
    array (
      'key' => 'sales.payment_methods.moneytransfer',
      'name' => 'admin::app.configuration.index.sales.payment-methods.money-transfer',
      'info' => 'admin::app.configuration.index.sales.payment-methods.money-transfer-info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'title',
          'title' => 'admin::app.configuration.index.sales.payment-methods.title',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'description',
          'title' => 'admin::app.configuration.index.sales.payment-methods.description',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'image',
          'title' => 'admin::app.configuration.index.sales.payment-methods.logo',
          'type' => 'image',
          'info' => 'admin::app.configuration.index.sales.payment-methods.logo-information',
          'channel_based' => false,
          'locale_based' => false,
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp',
        ),
        3 => 
        array (
          'name' => 'generate_invoice',
          'title' => 'admin::app.configuration.index.sales.payment-methods.generate-invoice',
          'type' => 'boolean',
          'default_value' => false,
          'channel_based' => true,
          'locale_based' => false,
        ),
        4 => 
        array (
          'name' => 'invoice_status',
          'depends' => 'generate_invoice:1',
          'validation' => 'required_if:generate_invoice,1',
          'title' => 'admin::app.configuration.index.sales.payment-methods.set-invoice-status',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.pending',
              'value' => 'pending',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.paid',
              'value' => 'paid',
            ),
          ),
          'info' => 'admin::app.configuration.index.sales.payment-methods.generate-invoice-applicable',
          'channel_based' => true,
          'locale_based' => false,
        ),
        5 => 
        array (
          'name' => 'order_status',
          'title' => 'admin::app.configuration.index.sales.payment-methods.set-order-status',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.pending',
              'value' => 'pending',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.pending-payment',
              'value' => 'pending_payment',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.sales.payment-methods.processing',
              'value' => 'processing',
            ),
          ),
          'info' => 'admin::app.configuration.index.sales.payment-methods.generate-invoice-applicable',
          'channel_based' => true,
          'locale_based' => false,
        ),
        6 => 
        array (
          'name' => 'mailing_address',
          'title' => 'admin::app.configuration.index.sales.payment-methods.mailing-address',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
        7 => 
        array (
          'name' => 'active',
          'title' => 'admin::app.configuration.index.sales.payment-methods.status',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => false,
        ),
        8 => 
        array (
          'name' => 'sort',
          'title' => 'admin::app.configuration.index.sales.payment-methods.sort-order',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => '1',
              'value' => 1,
            ),
            1 => 
            array (
              'title' => '2',
              'value' => 2,
            ),
            2 => 
            array (
              'title' => '3',
              'value' => 3,
            ),
            3 => 
            array (
              'title' => '4',
              'value' => 4,
            ),
          ),
        ),
      ),
    ),
    71 => 
    array (
      'key' => 'sales.payment_methods.paypal_standard',
      'name' => 'admin::app.configuration.index.sales.payment-methods.paypal-standard',
      'info' => 'admin::app.configuration.index.sales.payment-methods.paypal-standard-info',
      'sort' => 3,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'title',
          'title' => 'admin::app.configuration.index.sales.payment-methods.title',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'description',
          'title' => 'admin::app.configuration.index.sales.payment-methods.description',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'image',
          'title' => 'admin::app.configuration.index.sales.payment-methods.logo',
          'type' => 'image',
          'info' => 'admin::app.configuration.index.sales.payment-methods.logo-information',
          'channel_based' => false,
          'locale_based' => false,
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp',
        ),
        3 => 
        array (
          'name' => 'business_account',
          'title' => 'admin::app.configuration.index.sales.payment-methods.business-account',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => false,
        ),
        4 => 
        array (
          'name' => 'active',
          'title' => 'admin::app.configuration.index.sales.payment-methods.status',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => false,
        ),
        5 => 
        array (
          'name' => 'sandbox',
          'title' => 'admin::app.configuration.index.sales.payment-methods.sandbox',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => false,
        ),
        6 => 
        array (
          'name' => 'sort',
          'title' => 'admin::app.configuration.index.sales.payment-methods.sort-order',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => '1',
              'value' => 1,
            ),
            1 => 
            array (
              'title' => '2',
              'value' => 2,
            ),
            2 => 
            array (
              'title' => '3',
              'value' => 3,
            ),
            3 => 
            array (
              'title' => '4',
              'value' => 4,
            ),
          ),
        ),
      ),
    ),
    72 => 
    array (
      'key' => 'sales.payment_methods.paypal_smart_button',
      'name' => 'admin::app.configuration.index.sales.payment-methods.paypal-smart-button',
      'info' => 'admin::app.configuration.index.sales.payment-methods.paypal-smart-button-info',
      'sort' => 4,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'title',
          'title' => 'admin::app.configuration.index.sales.payment-methods.title',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'description',
          'title' => 'admin::app.configuration.index.sales.payment-methods.description',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'image',
          'title' => 'admin::app.configuration.index.sales.payment-methods.logo',
          'type' => 'image',
          'info' => 'admin::app.configuration.index.sales.payment-methods.logo-information',
          'channel_based' => false,
          'locale_based' => false,
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp',
        ),
        3 => 
        array (
          'name' => 'client_id',
          'title' => 'admin::app.configuration.index.sales.payment-methods.client-id',
          'info' => 'admin::app.configuration.index.sales.payment-methods.client-id-info',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => false,
        ),
        4 => 
        array (
          'name' => 'client_secret',
          'title' => 'admin::app.configuration.index.sales.payment-methods.client-secret',
          'info' => 'admin::app.configuration.index.sales.payment-methods.client-secret-info',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => false,
          'default' => 'CLIENT_SECRET',
        ),
        5 => 
        array (
          'name' => 'accepted_currencies',
          'title' => 'admin::app.configuration.index.sales.payment-methods.accepted-currencies',
          'info' => 'admin::app.configuration.index.sales.payment-methods.accepted-currencies-info',
          'type' => 'text',
          'depends' => 'active:1',
          'validation' => 'required_if:active,1',
          'channel_based' => true,
          'locale_based' => false,
          'default' => 'USD',
        ),
        6 => 
        array (
          'name' => 'active',
          'title' => 'admin::app.configuration.index.sales.payment-methods.status',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => false,
        ),
        7 => 
        array (
          'name' => 'sandbox',
          'title' => 'admin::app.configuration.index.sales.payment-methods.sandbox',
          'type' => 'boolean',
          'channel_based' => true,
          'locale_based' => false,
        ),
        8 => 
        array (
          'name' => 'sort',
          'title' => 'admin::app.configuration.index.sales.payment-methods.sort-order',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => '1',
              'value' => 1,
            ),
            1 => 
            array (
              'title' => '2',
              'value' => 2,
            ),
            2 => 
            array (
              'title' => '3',
              'value' => 3,
            ),
            3 => 
            array (
              'title' => '4',
              'value' => 4,
            ),
          ),
        ),
      ),
    ),
    73 => 
    array (
      'key' => 'sales.order_settings',
      'name' => 'admin::app.configuration.index.sales.order-settings.title',
      'info' => 'admin::app.configuration.index.sales.order-settings.info',
      'icon' => 'settings/order.svg',
      'sort' => 4,
    ),
    74 => 
    array (
      'key' => 'sales.order_settings.order_number',
      'name' => 'admin::app.configuration.index.sales.order-settings.order-number.title',
      'info' => 'admin::app.configuration.index.sales.order-settings.order-number.info',
      'sort' => 0,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'order_number_prefix',
          'title' => 'admin::app.configuration.index.sales.order-settings.order-number.prefix',
          'type' => 'text',
          'validation' => false,
          'channel_based' => true,
        ),
        1 => 
        array (
          'name' => 'order_number_length',
          'title' => 'admin::app.configuration.index.sales.order-settings.order-number.length',
          'type' => 'text',
          'validation' => 'between:1,10|integer',
          'channel_based' => true,
        ),
        2 => 
        array (
          'name' => 'order_number_suffix',
          'title' => 'admin::app.configuration.index.sales.order-settings.order-number.suffix',
          'type' => 'text',
          'validation' => false,
          'channel_based' => true,
        ),
        3 => 
        array (
          'name' => 'order_number_generator',
          'title' => 'admin::app.configuration.index.sales.order-settings.order-number.generator',
          'type' => 'text',
          'validation' => false,
          'channel_based' => true,
        ),
      ),
    ),
    75 => 
    array (
      'key' => 'sales.order_settings.minimum_order',
      'name' => 'admin::app.configuration.index.sales.order-settings.minimum-order.title',
      'info' => 'admin::app.configuration.index.sales.order-settings.minimum-order.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'enable',
          'title' => 'admin::app.configuration.index.sales.order-settings.minimum-order.enable',
          'type' => 'boolean',
        ),
        1 => 
        array (
          'name' => 'minimum_order_amount',
          'title' => 'admin::app.configuration.index.sales.order-settings.minimum-order.minimum-order-amount',
          'type' => 'number',
          'validation' => 'required_if:enable,1|numeric',
          'depends' => 'enable:1',
          'channel_based' => true,
        ),
        2 => 
        array (
          'name' => 'include_discount_amount',
          'title' => 'admin::app.configuration.index.sales.order-settings.minimum-order.include-discount-amount',
          'type' => 'boolean',
          'depends' => 'enable:1',
        ),
        3 => 
        array (
          'name' => 'include_tax_to_amount',
          'title' => 'admin::app.configuration.index.sales.order-settings.minimum-order.include-tax-amount',
          'type' => 'boolean',
          'depends' => 'enable:1',
        ),
        4 => 
        array (
          'name' => 'description',
          'title' => 'admin::app.configuration.index.sales.order-settings.minimum-order.description',
          'type' => 'textarea',
          'depends' => 'enable:1',
          'channel_based' => true,
        ),
      ),
    ),
    76 => 
    array (
      'key' => 'sales.order_settings.reorder',
      'name' => 'admin::app.configuration.index.sales.order-settings.reorder.title',
      'info' => 'admin::app.configuration.index.sales.order-settings.reorder.info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'admin',
          'title' => 'admin::app.configuration.index.sales.order-settings.reorder.admin-reorder',
          'info' => 'admin::app.configuration.index.sales.order-settings.reorder.admin-reorder-info',
          'type' => 'boolean',
          'default' => true,
        ),
        1 => 
        array (
          'name' => 'shop',
          'title' => 'admin::app.configuration.index.sales.order-settings.reorder.shop-reorder',
          'info' => 'admin::app.configuration.index.sales.order-settings.reorder.shop-reorder-info',
          'type' => 'boolean',
          'default' => true,
        ),
      ),
    ),
    77 => 
    array (
      'key' => 'sales.invoice_settings',
      'name' => 'admin::app.configuration.index.sales.invoice-settings.title',
      'info' => 'admin::app.configuration.index.sales.invoice-settings.info',
      'icon' => 'settings/invoice.svg',
      'sort' => 5,
    ),
    78 => 
    array (
      'key' => 'sales.invoice_settings.invoice_number',
      'name' => 'admin::app.configuration.index.sales.invoice-settings.invoice-number.title',
      'info' => 'admin::app.configuration.index.sales.invoice-settings.invoice-number.info',
      'sort' => 0,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'invoice_number_prefix',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.invoice-number.prefix',
          'type' => 'text',
          'validation' => false,
          'channel_based' => true,
          'locale_based' => true,
        ),
        1 => 
        array (
          'name' => 'invoice_number_length',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.invoice-number.length',
          'type' => 'text',
          'validation' => 'numeric|min:0|max:10',
          'channel_based' => true,
          'locale_based' => true,
        ),
        2 => 
        array (
          'name' => 'invoice_number_suffix',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.invoice-number.suffix',
          'type' => 'text',
          'validation' => false,
          'channel_based' => true,
          'locale_based' => true,
        ),
        3 => 
        array (
          'name' => 'invoice_number_generator_class',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.invoice-number.generator',
          'type' => 'text',
          'validation' => false,
          'channel_based' => true,
          'locale_based' => true,
        ),
      ),
    ),
    79 => 
    array (
      'key' => 'sales.invoice_settings.payment_terms',
      'name' => 'admin::app.configuration.index.sales.invoice-settings.payment-terms.title',
      'info' => 'admin::app.configuration.index.sales.invoice-settings.payment-terms.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'due_duration',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.payment-terms.due-duration',
          'type' => 'text',
          'validation' => 'numeric',
          'channel_based' => true,
        ),
      ),
    ),
    80 => 
    array (
      'key' => 'sales.invoice_settings.pdf_print_outs',
      'name' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.title',
      'info' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'invoice_id',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.invoice-id-title',
          'info' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.invoice-id-info',
          'type' => 'boolean',
          'default' => true,
        ),
        1 => 
        array (
          'name' => 'order_id',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.order-id-title',
          'info' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.order-id-info',
          'type' => 'boolean',
          'default' => true,
        ),
        2 => 
        array (
          'name' => 'logo',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.logo',
          'info' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.logo-info',
          'type' => 'image',
          'validation' => 'mimes:bmp,jpeg,jpg,png,webp',
          'channel_based' => true,
        ),
        3 => 
        array (
          'name' => 'footer_text',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.footer-text',
          'info' => 'admin::app.configuration.index.sales.invoice-settings.pdf-print-outs.footer-text-info',
          'type' => 'textarea',
          'channel_based' => true,
          'locale_based' => true,
        ),
      ),
    ),
    81 => 
    array (
      'key' => 'sales.invoice_settings.invoice_reminders',
      'name' => 'admin::app.configuration.index.sales.invoice-settings.invoice-reminders.title',
      'info' => 'admin::app.configuration.index.sales.invoice-settings.invoice-reminders.info',
      'sort' => 3,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'reminders_limit',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.invoice-reminders.maximum-limit-of-reminders',
          'type' => 'text',
          'validation' => 'numeric',
          'channel_based' => true,
        ),
        1 => 
        array (
          'name' => 'interval_between_reminders',
          'title' => 'admin::app.configuration.index.sales.invoice-settings.invoice-reminders.interval-between-reminders',
          'type' => 'select',
          'options' => 
          array (
            0 => 
            array (
              'title' => '1 day',
              'value' => 'P1D',
            ),
            1 => 
            array (
              'title' => '2 days',
              'value' => 'P2D',
            ),
            2 => 
            array (
              'title' => '3 days',
              'value' => 'P3D',
            ),
            3 => 
            array (
              'title' => '4 days',
              'value' => 'P4D',
            ),
            4 => 
            array (
              'title' => '5 days',
              'value' => 'P4D',
            ),
            5 => 
            array (
              'title' => '6 days',
              'value' => 'P4D',
            ),
            6 => 
            array (
              'title' => '7 days',
              'value' => 'P4D',
            ),
            7 => 
            array (
              'title' => '2 weeks',
              'value' => 'P2W',
            ),
            8 => 
            array (
              'title' => '3 weeks',
              'value' => 'P3W',
            ),
            9 => 
            array (
              'title' => '4 weeks',
              'value' => 'P4W',
            ),
          ),
        ),
      ),
    ),
    82 => 
    array (
      'key' => 'sales.taxes',
      'name' => 'admin::app.configuration.index.sales.taxes.title',
      'info' => 'admin::app.configuration.index.sales.taxes.title-info',
      'icon' => 'settings/tax.svg',
      'sort' => 6,
    ),
    83 => 
    array (
      'key' => 'sales.taxes.categories',
      'name' => 'admin::app.configuration.index.sales.taxes.categories.title',
      'info' => 'admin::app.configuration.index.sales.taxes.categories.title-info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'shipping',
          'title' => 'admin::app.configuration.index.sales.taxes.categories.shipping',
          'type' => 'select',
          'default' => 0,
          'options' => 'Webkul\\Tax\\Repositories\\TaxCategoryRepository@getConfigOptions',
        ),
        1 => 
        array (
          'name' => 'product',
          'title' => 'admin::app.configuration.index.sales.taxes.categories.product',
          'type' => 'select',
          'default' => 0,
          'options' => 'Webkul\\Tax\\Repositories\\TaxCategoryRepository@getConfigOptions',
        ),
      ),
    ),
    84 => 
    array (
      'key' => 'sales.taxes.calculation',
      'name' => 'admin::app.configuration.index.sales.taxes.calculation.title',
      'info' => 'admin::app.configuration.index.sales.taxes.calculation.title-info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'based_on',
          'title' => 'admin::app.configuration.index.sales.taxes.calculation.based-on',
          'type' => 'select',
          'default' => 'shipping_address',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.calculation.shipping-address',
              'value' => 'shipping_address',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.calculation.billing-address',
              'value' => 'billing_address',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.calculation.shipping-origin',
              'value' => 'shipping_origin',
            ),
          ),
        ),
        1 => 
        array (
          'name' => 'product_prices',
          'title' => 'admin::app.configuration.index.sales.taxes.calculation.product-prices',
          'type' => 'select',
          'default' => 'excluding_tax',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.calculation.excluding-tax',
              'value' => 'excluding_tax',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.calculation.including-tax',
              'value' => 'including_tax',
            ),
          ),
        ),
        2 => 
        array (
          'name' => 'shipping_prices',
          'title' => 'admin::app.configuration.index.sales.taxes.calculation.shipping-prices',
          'type' => 'select',
          'default' => 'excluding_tax',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.calculation.excluding-tax',
              'value' => 'excluding_tax',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.calculation.including-tax',
              'value' => 'including_tax',
            ),
          ),
        ),
      ),
    ),
    85 => 
    array (
      'key' => 'sales.taxes.default_destination_calculation',
      'name' => 'admin::app.configuration.index.sales.taxes.default-destination-calculation.title',
      'info' => 'admin::app.configuration.index.sales.taxes.default-destination-calculation.title-info',
      'sort' => 3,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'country',
          'title' => 'admin::app.configuration.index.sales.taxes.default-destination-calculation.default-country',
          'type' => 'country',
          'default' => '',
        ),
        1 => 
        array (
          'name' => 'state',
          'title' => 'admin::app.configuration.index.sales.taxes.default-destination-calculation.default-state',
          'type' => 'state',
          'default' => '',
        ),
        2 => 
        array (
          'name' => 'post_code',
          'title' => 'admin::app.configuration.index.sales.taxes.default-destination-calculation.default-post-code',
          'type' => 'text',
          'default' => '',
        ),
      ),
    ),
    86 => 
    array (
      'key' => 'sales.taxes.shopping_cart',
      'name' => 'admin::app.configuration.index.sales.taxes.shopping-cart.title',
      'info' => 'admin::app.configuration.index.sales.taxes.shopping-cart.title-info',
      'sort' => 4,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'display_prices',
          'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.display-prices',
          'type' => 'select',
          'default' => 'excluding_tax',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.excluding-tax',
              'value' => 'excluding_tax',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.including-tax',
              'value' => 'including_tax',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.both',
              'value' => 'both',
            ),
          ),
        ),
        1 => 
        array (
          'name' => 'display_subtotal',
          'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.display-subtotal',
          'type' => 'select',
          'default' => 'excluding_tax',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.excluding-tax',
              'value' => 'excluding_tax',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.including-tax',
              'value' => 'including_tax',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.both',
              'value' => 'both',
            ),
          ),
        ),
        2 => 
        array (
          'name' => 'display_shipping_amount',
          'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.display-shipping-amount',
          'type' => 'select',
          'default' => 'excluding_tax',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.excluding-tax',
              'value' => 'excluding_tax',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.including-tax',
              'value' => 'including_tax',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.shopping-cart.both',
              'value' => 'both',
            ),
          ),
        ),
      ),
    ),
    87 => 
    array (
      'key' => 'sales.taxes.sales',
      'name' => 'admin::app.configuration.index.sales.taxes.sales.title',
      'info' => 'admin::app.configuration.index.sales.taxes.sales.title-info',
      'sort' => 4,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'display_prices',
          'title' => 'admin::app.configuration.index.sales.taxes.sales.display-prices',
          'type' => 'select',
          'default' => 'excluding_tax',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.sales.excluding-tax',
              'value' => 'excluding_tax',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.sales.including-tax',
              'value' => 'including_tax',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.sales.both',
              'value' => 'both',
            ),
          ),
        ),
        1 => 
        array (
          'name' => 'display_subtotal',
          'title' => 'admin::app.configuration.index.sales.taxes.sales.display-subtotal',
          'type' => 'select',
          'default' => 'excluding_tax',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.sales.excluding-tax',
              'value' => 'excluding_tax',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.sales.including-tax',
              'value' => 'including_tax',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.sales.both',
              'value' => 'both',
            ),
          ),
        ),
        2 => 
        array (
          'name' => 'display_shipping_amount',
          'title' => 'admin::app.configuration.index.sales.taxes.sales.display-shipping-amount',
          'type' => 'select',
          'default' => 'excluding_tax',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.sales.excluding-tax',
              'value' => 'excluding_tax',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.sales.including-tax',
              'value' => 'including_tax',
            ),
            2 => 
            array (
              'title' => 'admin::app.configuration.index.sales.taxes.sales.both',
              'value' => 'both',
            ),
          ),
        ),
      ),
    ),
    88 => 
    array (
      'key' => 'sales.checkout',
      'name' => 'admin::app.configuration.index.sales.checkout.title',
      'info' => 'admin::app.configuration.index.sales.checkout.info',
      'icon' => 'settings/checkout.svg',
      'sort' => 7,
    ),
    89 => 
    array (
      'key' => 'sales.checkout.shopping_cart',
      'name' => 'admin::app.configuration.index.sales.checkout.shopping-cart.title',
      'info' => 'admin::app.configuration.index.sales.checkout.shopping-cart.info',
      'sort' => 1,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'allow_guest_checkout',
          'title' => 'admin::app.configuration.index.sales.checkout.shopping-cart.guest-checkout',
          'info' => 'admin::app.configuration.index.sales.checkout.shopping-cart.guest-checkout-info',
          'type' => 'boolean',
          'default' => 1,
        ),
        1 => 
        array (
          'name' => 'cart_page',
          'title' => 'admin::app.configuration.index.sales.checkout.shopping-cart.cart-page',
          'info' => 'admin::app.configuration.index.sales.checkout.shopping-cart.cart-page-info',
          'type' => 'boolean',
          'default' => 2,
        ),
        2 => 
        array (
          'name' => 'cross_sell',
          'title' => 'admin::app.configuration.index.sales.checkout.shopping-cart.cross-sell',
          'info' => 'admin::app.configuration.index.sales.checkout.shopping-cart.cross-sell-info',
          'type' => 'boolean',
          'default' => 3,
        ),
        3 => 
        array (
          'name' => 'estimate_shipping',
          'title' => 'admin::app.configuration.index.sales.checkout.shopping-cart.estimate-shipping',
          'info' => 'admin::app.configuration.index.sales.checkout.shopping-cart.estimate-shipping-info',
          'type' => 'boolean',
          'default' => 4,
        ),
      ),
    ),
    90 => 
    array (
      'key' => 'sales.checkout.my_cart',
      'name' => 'admin::app.configuration.index.sales.checkout.my-cart.title',
      'info' => 'admin::app.configuration.index.sales.checkout.my-cart.info',
      'sort' => 2,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'summary',
          'title' => 'admin::app.configuration.index.sales.checkout.my-cart.summary',
          'type' => 'select',
          'default' => 'display_number_of_items_in_cart',
          'options' => 
          array (
            0 => 
            array (
              'title' => 'admin::app.configuration.index.sales.checkout.my-cart.display-item-quantities',
              'value' => 'display_item_quantity',
            ),
            1 => 
            array (
              'title' => 'admin::app.configuration.index.sales.checkout.my-cart.display-number-in-cart',
              'value' => 'display_number_of_items_in_cart',
            ),
          ),
        ),
      ),
    ),
    91 => 
    array (
      'key' => 'sales.checkout.mini_cart',
      'name' => 'admin::app.configuration.index.sales.checkout.mini-cart.title',
      'info' => 'admin::app.configuration.index.sales.checkout.mini-cart.info',
      'sort' => 3,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'display_mini_cart',
          'title' => 'admin::app.configuration.index.sales.checkout.mini-cart.display-mini-cart',
          'type' => 'boolean',
          'default' => 1,
        ),
        1 => 
        array (
          'name' => 'offer_info',
          'title' => 'admin::app.configuration.index.sales.checkout.mini-cart.mini-cart-offer-info',
          'type' => 'text',
          'default' => 'Get Up To 30% OFF on your 1st order',
          'validation' => 'max:200',
        ),
      ),
    ),
  ),
  'importers' => 
  array (
    'products' => 
    array (
      'title' => 'data_transfer::app.importers.products.title',
      'importer' => 'Webkul\\DataTransfer\\Helpers\\Importers\\Product\\Importer',
      'sample_paths' => 
      array (
        'csv' => 'data-transfer/samples/csv/products.csv',
        'xls' => 'data-transfer/samples/xls/products.xls',
        'xlsx' => 'data-transfer/samples/xlsx/products.xlsx',
        'xml' => 'data-transfer/samples/xml/products.xml',
      ),
    ),
    'customers' => 
    array (
      'title' => 'data_transfer::app.importers.customers.title',
      'importer' => 'Webkul\\DataTransfer\\Helpers\\Importers\\Customer\\Importer',
      'sample_paths' => 
      array (
        'csv' => 'data-transfer/samples/csv/customers.csv',
        'xls' => 'data-transfer/samples/xls/customers.xls',
        'xlsx' => 'data-transfer/samples/xlsx/customers.xlsx',
        'xml' => 'data-transfer/samples/xml/customers.xml',
      ),
    ),
    'tax_rates' => 
    array (
      'title' => 'data_transfer::app.importers.tax-rates.title',
      'importer' => 'Webkul\\DataTransfer\\Helpers\\Importers\\TaxRate\\Importer',
      'sample_paths' => 
      array (
        'csv' => 'data-transfer/samples/csv/tax-rates.csv',
        'xls' => 'data-transfer/samples/xls/tax-rates.xls',
        'xlsx' => 'data-transfer/samples/xlsx/tax-rates.xlsx',
        'xml' => 'data-transfer/samples/xml/tax-rates.xml',
      ),
    ),
  ),
  'payment_methods' => 
  array (
    'paypal_smart_button' => 
    array (
      'code' => 'paypal_smart_button',
      'title' => 'PayPal Smart Button',
      'description' => 'PayPal',
      'client_id' => 'sb',
      'class' => 'Webkul\\Paypal\\Payment\\SmartButton',
      'sandbox' => true,
      'active' => true,
      'sort' => 4,
    ),
    'paypal_standard' => 
    array (
      'code' => 'paypal_standard',
      'title' => 'PayPal Standard',
      'description' => 'PayPal Standard',
      'class' => 'Webkul\\Paypal\\Payment\\Standard',
      'sandbox' => true,
      'active' => true,
      'business_account' => 'test@webkul.com',
      'sort' => 3,
    ),
    'cashondelivery' => 
    array (
      'code' => 'cashondelivery',
      'title' => 'Cash On Delivery',
      'description' => 'Cash On Delivery',
      'class' => 'Webkul\\Payment\\Payment\\CashOnDelivery',
      'active' => true,
      'sort' => 1,
    ),
    'moneytransfer' => 
    array (
      'code' => 'moneytransfer',
      'title' => 'Money Transfer',
      'description' => 'Money Transfer',
      'class' => 'Webkul\\Payment\\Payment\\MoneyTransfer',
      'active' => true,
      'sort' => 2,
    ),
  ),
  'product_types' => 
  array (
    'simple' => 
    array (
      'key' => 'simple',
      'name' => 'product::app.type.simple',
      'class' => 'Webkul\\Product\\Type\\Simple',
      'sort' => 1,
    ),
    'booking' => 
    array (
      'key' => 'booking',
      'name' => 'product::app.type.booking',
      'class' => 'Webkul\\Product\\Type\\Booking',
      'sort' => 2,
    ),
    'configurable' => 
    array (
      'key' => 'configurable',
      'name' => 'product::app.type.configurable',
      'class' => 'Webkul\\Product\\Type\\Configurable',
      'sort' => 3,
    ),
    'virtual' => 
    array (
      'key' => 'virtual',
      'name' => 'product::app.type.virtual',
      'class' => 'Webkul\\Product\\Type\\Virtual',
      'sort' => 4,
    ),
    'grouped' => 
    array (
      'key' => 'grouped',
      'name' => 'product::app.type.grouped',
      'class' => 'Webkul\\Product\\Type\\Grouped',
      'sort' => 5,
    ),
    'downloadable' => 
    array (
      'key' => 'downloadable',
      'name' => 'product::app.type.downloadable',
      'class' => 'Webkul\\Product\\Type\\Downloadable',
      'sort' => 6,
    ),
    'bundle' => 
    array (
      'key' => 'bundle',
      'name' => 'product::app.type.bundle',
      'class' => 'Webkul\\Product\\Type\\Bundle',
      'sort' => 7,
    ),
  ),
  'carriers' => 
  array (
    'flatrate' => 
    array (
      'code' => 'flatrate',
      'title' => 'Flat Rate',
      'description' => 'Flat Rate Shipping',
      'active' => true,
      'default_rate' => '10',
      'type' => 'per_unit',
      'class' => 'Webkul\\Shipping\\Carriers\\FlatRate',
    ),
    'free' => 
    array (
      'code' => 'free',
      'title' => 'Free Shipping',
      'description' => 'Free Shipping',
      'active' => true,
      'default_rate' => '0',
      'class' => 'Webkul\\Shipping\\Carriers\\Free',
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
