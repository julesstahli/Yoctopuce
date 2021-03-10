# Documentation technique

## Introduction

Dans le cadre de l'atelier technicien 1ère et 2ème année, nous avons été mandaté pour réaliser une station météo à l'aide de modules Yoctopuce.

## Rappel du cahier des charges

### Objectifs

Réaliser un programme C# qui regarde les données d'un Yoctopuce et qui automatise l'ajout de donnée dans une base de donnée SQL SERVER et par la suite installer un serveur web avec un panel qui affiche les informations de la base de donnée.

### Spécifications

Récupération des données depuis les puces capteurs Yoctopuce.

Insertion des données récupérés dans une base de donnée.

Affichage des données sur une interface web.

### Configuration

aller sur : http://www.yoctopuce.com/FR/virtualhub.php
télécharger l'installeur windows msi.

VirtualHub Control : Démarrer "Start" et ouvrir VirtualHub WebUI, Après l'opération sur WebUI, arrêter "Stop"
VirtualHub WebUI : Cliquer sur le micro-contrôleur à mettre à jour "Configure",  "Upgrade", puis fermer WebUI

### Environnement

* Windows 10
* MySQL Workbench 8.0 CE
* Visual Studio 2019
* Visual Studio Code / Atom / PHP Storm
* Laragon
* Typora
* VirtualHub

### Organisation

Jules Stähli - jules.sthl@eduge.ch

Samuel Charneco - samuel.pschr@eduge.ch

Nicolas Oliveira - nicolas.olvrm@eduge.ch	

Jeremy Meissner - jeremy.mssnr@eduge.ch

### Livrable

* Présentation
* Code source
* Documentation technique
* Journal de bord

## Analyse fonctionnelle

### Fonctionnalités

#### Lecture de données

Lecture des données provenant d'un ou plusieurs capteurs Yoctopuce.

#### Import des données

Stockage dans une base de donéées des informations récupérées depuis les capteurs

#### Historique

Effacement des données vieilles de plus d'un mois et sauvegarde des moyennes par heure dans un historique

#### Api

Données accessible via une api _(voir documentation de l'api)_

#### Interfaces Web

Vue en direct sur les données et sur l'historique via une interace web.

## Analyse organique

### Technologie

* Lumen (Laravel): Framework php
* Plugin MySQL: Connexion à une base MySQL en C#
* Axios: Ajax
* Slate: Documentation de  l'api
* ChartJS: Graphique en Javascript

### Backend

#### Application C#

L'application récupère les données des capteurs et l'insère dans une base de données

#### Serveur web (php)

Renvoie des pages web pour la visualisation des données ou du JSON pour les données de l'API.

##### Vues

* index.blade.php
  * Affiche les données sous forme de tableau et de graphique.
* api.blade.php
  * Contient la documentation de l'api
* template.blade.php
  * Contenu propre à toutes les pages du site (sauf la documentation de l'api)

### Frontend

#### Routes

|Protocol|Endpoint|Description|
|---|---|---|
| GET | / | Retourne la vue sur les données |
| GET | /api | Retourne la documentation de l'api |

> Pour les routes de l'api _voir dans la documentation de l'api_

### Architecture
```
├───api ==> Partie Web de l'application
│   ├───app
│   │   ├───Console
│   │   │   └───Commands ==> Contient les commandes php du projet
│   │   ├───Events
│   │   ├───Exceptions
│   │   ├───Http
│   │   │   ├───Controllers ==> Contient les controlleurs du projet
│   │   │   └───Middleware ==> Contient les middlewares du projet
│   │   ├───Jobs
│   │   ├───Listeners
│   │   └───Providers
│   ├───bootstrap
│   ├───database
│   │   ├───factories
│   │   ├───migrations ==> Contient les migrations du projet
│   │   └───seeds
│   ├───public ==> Contient la partie accessible depuis le web du projet
│   │   ├───css
│   │   ├───fonts
│   │   ├───images
│   │   ├───javascripts
│   │   └───stylesheets
│   ├───resources ==> Contient les vues blade du projet
│   │   └───views
│   ├───routes ==> Contient les routes du projet
│   ├───storage
│   │   ├───app
│   │   ├───framework
│   │   │   ├───cache
│   │   │   │   └───data
│   │   │   └───views
│   │   └───logs ==> Contient les logs de l'application
│   ├───tests
│   └───vendor
├───api_doc ==> Contient la documentation de l'api
│   ├───.github
│   │   ├───ISSUE_TEMPLATE
│   │   └───workflows
│   ├───build ==> Contient la rendu final de la documentation
│   │   ├───fonts
│   │   ├───images
│   │   ├───javascripts
│   │   └───stylesheets
│   ├───lib
│   └───source ==> Contient les resources pour construire la documentation
│       ├───fonts
│       ├───images
│       ├───includes
│       ├───javascripts
│       │   ├───app
│       │   └───lib
│       ├───layouts
│       └───stylesheets
├───documentation ==> Contient la documentation du projet
└───Yoctopuce ==> Contient le code c# de l'application (Lecture des données des capteurs)
    ├───bin
    │   ├───Debug
    │   └───Release
    ├───Exceptions ==> Contient les différents type d'exceptions de l'application
    ├───obj
    │   ├───Debug
    │   │   └───TempPE
    │   └───Release
    ├───Properties
    ├───Sensors ==> Contient les casses propre à la lecture des données des capteurs
    └───Yocto ==> Contient la librairie Yoctopuce
```

