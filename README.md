# larastall
Larastall is a flexible Laravel 5 installer I initially built for my self and later on felt it might be useful for someone out there. This a further extension of bestmomo\laravel-installer.

## Preview
![vcord-larastall](https://dl.dropboxusercontent.com/s/lgkrk1ov3o9qbx6/localhost-8000-install-database-config.png?dl=0  "vcord/larastall")
## Features
+ check PHP Version
+ check server requirements
+ Gets database settings with a form
+ migrate database
+ comes with a pre-built sites and users database tables (just like wordpress)
+ registers admin user on the fly
+ deletes installation files after installation and remove service provider reference in config
+ Gets Mail settings with a form

## Installation
to install it run:
composer require vcord/larastall

The next required step is to add the service provider to `config/app.php` <br>
`Vcord\Larastal\LarastallServiceprovider::class,`

## Publish
The last required step is to publish views, configuration and assets in your applicatio with:<br>
`php artisan vendor:publish`

#### N.B 
if you've set the 'publish_users_table' configuration option to true, you would need to re-run the above command to publish the 'users' migration file. Please [See Configuration](https://github.com/vcord/larastall/master/README.md#configuration)

# Configuration
Configuration is in config/larastall.php: 
+ on_complete_url : the url to redirect to after installation
+ publish_users_table : This sets the option whether to publish the larastall users migration - it defaults to false, reason beign that    every basic laravel application has the 'users' migration file, with this in mind, please make sure your 'users'  table   has the following fields : `id, username, email, password, is_admin, is_active`



