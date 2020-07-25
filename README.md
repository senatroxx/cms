CMS by Athhar Kautsar with Laravel Framework.

This is on going project, so if you found some bug please report it.

Feel free to use it :)

<h2>Installation</h2>
After cloning this repo, install composer
<pre>
<code>composer install</code>
</pre>

Then, link the storage
<pre>
<code>php artisan storage:link</code>
</pre>

Copy the .env.example file to .env
Setup your database and app_url to your development url.
e.g.,
<pre>
<code>
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=cms
DB_USERNAME=root
DB_PASSWORD=
</code>
</pre>
<pre>
<code>
APP_URL=http://cms.test
</code>
</pre>
