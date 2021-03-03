# Yoctopuce
<img src="https://www.yoctopuce.com/img/yoctopuce-logo.png" alt="logo" />

Ateliers décloisonnés pour les techniciens 1 et 2

## Requirements

* [Visual studio 2019](https://visualstudio.microsoft.com/fr/)
* .NET Framework `4.7.2`
* [C#](https://docs.microsoft.com/en-us/dotnet/csharp/) `8`
* [Apache web server](https://httpd.apache.org/)
* [MySQL database](https://www.mysql.com/fr/)
* [Composer](https://getcomposer.org/)
* [Ruby](https://www.ruby-lang.org/fr/) `2.7.2`
* Bundle
* [NodeJS](https://nodejs.org/en/) `15.6`
* Npm `7.6`

---

* [Get Visual Studio](https://visualstudio.microsoft.com/fr/vs/)
* [Get Laragon](https://laragon.org/download/)
* [Get Composer](https://getcomposer.org/download/)
* [Get Ruby](https://www.ruby-lang.org/fr/downloads/)
* [Get NodeJS](https://nodejs.org/en/download/)

> You can use [NVM](https://github.com/nvm-sh/nvm) to manage Node versions

## Installation

### C#
1. Open Yoctopuce.sln with Visual studio 2019
2. Click on `Rebuild project` in the VIsual Studio menu
3. Set the MySQL login in the **Main.cs:59** file

### APi
1. In the api directory
2. Execute `composer install`
3. Copy the **.env.exemple** file to **.env**
4. Go to [http://localhost/Yoctopuce/api/key](http://localhost/Yoctopuce/api/key)
5. Copy the random displayed key
6. Fill the **.env** file with the MySQL login*(DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD, ...)* and the key*(APP_KEY)* which key you previously copied
7. Execute `php artisan migrate`

### Api documentation
1. In the api_doc directory
2. Execute `bundle install`

## Build

### Development

#### C#
1. Click on `Run` in Visual Studio

#### Api documentation
1. In the api_doc directory
2. Execute `bundle exec middleman server`
3. Go to [http://localhost:4567/](http://localhost:4567/)

### Production

#### C#
1. Click on `Run` in Visual Studio

> The executable is in **Yoctopuce/bin/Debug** or **Yoctopuce/bin/Release**

#### Api documentation
1. In the api_doc directory
2. Execute `bundle exec middleman build`
3. Copy **Yoctopuce/api_doc/build/index.html** to **Yoctopuce/api/resources/views/api.blade.php**
4. Copy **Yoctopuce/api_doc/build/fonts**, **Yoctopuce/api_doc/build/images**, **Yoctopuce/api_doc/build/javascripts** and **Yoctopuce/api_doc/build/stylesheets** to **Yoctopuce/api/public**


## Documentation

* [Documentation technique](https://github.com/julesstahli/Yoctopuce/blob/master/documentation/documentation_technique.md)
* [Documentation utilisateur](https://github.com/julesstahli/Yoctopuce/blob/master/documentation/documentation_utilisateur.md)
* [Journal de bord](https://github.com/julesstahli/Yoctopuce/blob/master/documentation/journal_de_bord.md)

## Project wiki

[**Wiki** - *Sommaire*](https://github.com/julesstahli/Yoctopuce/wiki/Sommaire)

## License

[MIT](https://github.com/julesstahli/Yoctopuce/blob/master/LICENSE)
