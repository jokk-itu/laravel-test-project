# laravel-test-project
A project written in PHP and using the framework Laravel

<h3>Summary</h3>
Uses a MySQL database with randomly generated instruments, statuses for instruments and locations of instruments.

Has an index route for instruments: /instrument
Has a specific show route for an instrument: /instrument/{name}
Has a store new instrument route: /instrument/create

<h3>Run application (default)</h3>
<p>Fire up the migrate command: <code>php artisan migrate:fresh --seed</code></p>

<p>Then fire up the application: <code>php artisan serve</code></p>
