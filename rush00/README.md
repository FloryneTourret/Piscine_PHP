# Rush-00
Rush 00 de la piscine php - Mini site e-commerce


## Fichiers PHP à la racine
"Controllers", ça sera les pages, sur lesquelles on link les vues et les models. Gestion des formulaires dans ces fichiers.

## Dossier admin, fichiers PHP
"Controllers", ça sera les pages admin, sur lesquelles on link les vues et les models. Gestion des formulaires dans ces fichiers. L'acces est limité aux utilisateurs avec le role 'admin'.

## Dossier models, fichiers *_model.php*
Fichiers dans lesquels on va faire les requetes SQL dans des fonctions. Qu'on appelera dans les controllers, apres avoir include le fichier model dans le controller.

## Dossier views *_view.php*, base et admin 
Fichiers "front", on va faire tout l'affichage dedans.

Dans le dossier base on trouve le header et footer (y compris ceux de l'admin) pour nous éviter de les réécrire 15 fois.

Dans le dossier admin on trouve tous les fichiers fronts des pages admin.

## Dossier configs
Fichier de connection a la db -> a modifier en fonction de docker.

Fichiers d'installation de la db a faire avant de commencer la correction.

## Dossier assets
Lien de tous les fichiers nécessaire : css, js, img

### Dossier css
- master.css -> style des classes générales.

- grille.css -> grille qui permet de gérer le responsive : col, offset, bloc..

- style.css -> style particulier au site.

> Pour afficher les catégories, articles etc, on utilisera des formulaires en GET.

> Pour les formulaires de connexion, inscription etc on utilisera des formulaires en POST.

> Le panier sera stocké dans la session en json


> Identifiants admin : ```admin@ftminishop.fr``` ```123```

> Pour installer la db 127.0.0.1/config/install.php

> docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}'