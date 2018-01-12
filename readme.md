# Multi Tenant Database Laravel With Orchestra Package Implementation
<h3>Note</h3>
<p>If you are looking for Configuration Tenant Driver for Multiple Databases, Please <a href="https://github.com/basherr/laravel-multi-tenancy">Click here</a></p>
<h2>Installation Instruction - Single Database Connection Setup</h2>
<p>Clone or Download the Repository to the htdocs / www folder.</p>
<span>Update Composer by typing<code>Composer update</code> in the <code>command line</code> on the root directory of project.</span>
<span>Change default database configuration in </span> <code>config/database.php</code><br/>
<span>We are using <code>mysql</code> as default connection</span><br/>

```
'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'), //This database will be the root for all other databases, can manage other databases tables etc
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
``` 
<p>We already have some <code>Role</code> seeder, So we also need to seed the database along with migration</p><br/>
<span> Run migration by typing<code>php artisan migrate --seed</code>in the </span><code>command line</code>
<h3>Tip</h3>
<p>To create a migration for <code>Tenant</code>simply type <code>php artisan tenanti:make site create_tablename_table</code> 
in the <code>command line</code></p>
<p>The tenant migration will be under <code>database/tenant/sites/</code></p>
<h3>Contribution</h3>
<p>Please feel free to contribute and send pull request.</p>
