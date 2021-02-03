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

### Organisation

Jules Stähli - jules.sthl@eduge.ch

Samuel Charneco - samuel.pschr@eduge.ch

Nicolas Oliveira - nicolas.olvrm@eduge.ch	

Jeremy Meissner - jeremy.mssnr@eduge.ch

### Livrable

* Code source
* Documentation technique
* Journal de bord

## Etude d'opportunité

## Analyse fonctionnelle

### Fonctionnalités

#### Lecture de données

#### Import de données

### Interfaces

Tableau de données

Graphique

## Analyse organique

### Technologie

* Lumen (Laravel)
* Plugin MySQL
* Axios
* Bulma
* Slate
* ChartJS

### Backend

#### Application C#

L'application récupère les données des capteurs et l'insère dans une base de données

#### Serveur web (php)

Renvoie des pages web pour la visualisation des données ou du JSON pour les données de l'API.

### Frontend

* La page index.php
  * Affiche les données sous forme de tableau et de graphique.
* La page ...

### Architecture

## Tests