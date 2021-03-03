# Yoctopuce

Ateliers décloisonnés pour les techniciens 1 et 2

## Requirements

* Visual studio 2019
* .NET Framework `4.7.2`
* C# `8`
* Apache web server
* MySQL database
* Composer
* Ruby 2.7.2
* NodeJS v15.6
* Npm v.7.6

## Installation

### C#
1. Open Yoctopuce.sln with Visual studio 2019
2. Click on "Rebuild project" in the VIsual Studio menu
3. Set the MySQL login in the **Main.cs:59** file

### APi
1. In the api directory
2. execute `composer install`
3. Copy the **.env.exemple** file to **.env**
4. Go to localhost/Yoctopuce/api/key
5. Copy the random displayed key
6. Fill the **.env** file with the MySQL login*(DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD, ...)* and the key*(APP_KEY)* which key you previously copied

## Documentation

* [Documentation technique](https://github.com/julesstahli/Yoctopuce/blob/master/documentation/documentation_technique.md)
* [Journal de bord](https://github.com/julesstahli/Yoctopuce/blob/master/documentation/journal_de_bord.md)

## Wiki du projet

[**Wiki** - *Sommaire*](https://github.com/julesstahli/Yoctopuce/wiki/Sommaire)

## License

[MIT](https://github.com/julesstahli/Yoctopuce/blob/master/LICENSE)
