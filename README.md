## LaraPanel

## Laravel 4.2 + AdminLTE + Sentry
Admin panel using 4.2 laravel, can be used in making the dashboard the sentry as the security provider
- Costumize Laravel with HMVC
- put ORM model on app/database/orm
- add app/modules

## Modules
create module service provider that extends `Illuminate\Support\ServiceProvider`

## For Your Information
1. Install using composer.json with `"app/modules"` included in classmap.
2. Once you create modules, register namespace module service provider in: `"app/config/app.php"`.
3. add Cartalyst/Sentry on composer.json
4. default layout adminLTE put on views/admin/layouts.




