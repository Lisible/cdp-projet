# cdp-projet
[![Build Status](https://travis-ci.com/Lisible/cdp-projet.svg?branch=master)](https://travis-ci.com/Lisible/cdp-projet)

Projet de Conduite de Projet

# Objectif
Le but de ce projet est de développer une application Web permettant de gérer
et de suivre des projets logiciels.

# Reste à faire

Les tâches qui doivent être implémentées seront représentées par des notes dans l'onglet 'Projects' du dépôt. Elles seront dans la colonne 'To do', et les tâches en cours d'implémentation seront épinglées dans la colonne 'On going'.

# Définition of Done

Pour qu'une tâche soit finie d'être implémentée, le développeur doit s'assurer du bon fonctionnement de cette dernière et vérifier la robustesse de son code avec des tests unitaires couvrant au minimum 80% du code. Une fois les tests implémentés, le développeur doit déplacer la tâche du kanban de l'onglet 'Projects' du dépôt de la colonne 'On going' vers la colonne 'Done'.
Il peut également renseigner le commit indiquant les dernières modifications impliquant la tâche, permettant ainsi de se retrouver dans de future révision. Une fois la totalité de ces actions faites, la tâche est finie d'être implémentée.

# Les issues (le Backlog)
| ID | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                             | Difficulté | Priorité | 
|----|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|------------|----------| 
| 1  | En tant que visiteur, je souhaite pouvoir me connecter avec les identifiants (login / mot de passe) afin d'accéder à la liste des projets.                                                                                                                                                                                                                                                                                                                                              | 3          | Moyenne | 
| 2  | En tant que visiteur, je souhaite pouvoir m'inscrire en renseignant mes informations (identifiant (obligatoire) : 20 caractères max, mot de passe (obligatoire) : 50 caractères max, adresse email (obligatoire) : 255 caractères max, nom (obligatoire) : 50 caractères max et prénom (obligatoire) : 50 caractères max) afin de créer mon compte utilisateur.                                                                                                                         | 4          | Moyenne | 
| 3  | En tant qu'utilisateur, je souhaite cliquer sur le bouton "Nouveau projet" pour saisir un nom (obligatoire), une description (optionelle), la durée d'un sprint (2 semaines par défaut), ainsi que la date de début du projet afin de créer un nouveau projet.                                                                                                                                                                                                                          | 3          | Haute | 
| 4  | En tant qu'utilisateur, je souhaite pouvoir ajouter des utilisateurs en renseignant son identifiant comme membre d'un projet dont je fais partie afin de constituer l'équipe de celui-ci.                                                                                                                                                                                                                                                                                               | 3          | Moyenne | 
| 5  | En tant qu'utilisateur, je souhaite pouvoir consulter la liste des membres d'un projet dont je fais partie afin d'accéder aux informations de contact (prénom, nom, adresse email) de ces derniers.                                                                                                                                                                                                                                                                                     | 2          | Basse | 
| 6  | En tant qu'utilisateur, je souhaite pouvoir accéder à chacun des projets dont je suis membre afin de consulter le backlog (sous forme d'une liste des US).                                                                                                                                                                                                                                                                | 2          | Haute |
| 7 | En tant qu'utilisateur, je souhaite pouvoir accéder à chacun des projets dont je suis membre afin de consulter les sprints (sous forme de tableau de tâches).                                                                                                                                                                                                                                                                | 2          | Basse | 
| 8 | En tant qu'utilisateur, je souhaite pouvoir ajouter une user story au backlog d'un projet dont je fais partie, en cliquant sur le bouton "Ajouter une user story" puis en saisissant son identifiant (entier non-signé et obligatoire), sa description (500 caractères max et obligatoire), sa difficulté (entier non-signé et obligatoire) et sa priorité (Très faible, Faible, Moyen, Élevé, Urgent et optionnelle) ainsi que le numéro du sprint (optionnel) assigné à l'user story. | 3          | Haute | 
| 9 | En tant qu'utilisateur, je souhaite pouvoir supprimer une user story du backlog d'un projet dont je fais partie en cliquant sur le bouton "supprimer" associé à une user story afin de corriger le backlog.                                                                                                                                                                                                                                                                             | 3          | Haute | 
| 10 | En tant qu'utilisateur je souhaite pouvoir ajouter un sprint à l'un de mes projets afin de pouvoir répartir les US du projet dans ce sprint. Le numéro du sprint sera auto-incrémenté.                                                                                                                                                                                                                                                                                                  | 3          | Basse | 
| 11 | En tant qu'utilisateur, je souhaite pouvoir visualiser l'avancement des tâches d'un sprint du projet dans 3 colonnes: to do, ongoing, done en affichant l'intitulé des tâches ainsi que le membre s'occupant de celles-ci                                                                                                                                                                                                                                                               | 2          | Basse | 
| 12 | En tant qu'utilisateur, je souhaite pouvoir ajouter une tâche en saisissant ses informations (intitulé décrivant la tâche (obligatoire): 100 caractères max, description détaillée (optionnelle): 500 caractères max, nombre de jour/homme (optionelle): entier non-signé, issue associée (obligatoire)) à un sprint d'un projet dont je suis membre.                                                                                                                             | 3          | Basse | 
| 13 | En tant qu'utilisateur, je souhaite pouvoir modifier l'état d'avancement d'une tâche (to do, ongoing, done) qui m'est assignée dans un projet dont je suis membre à l'aide d'un glisser/déposer d'une colonne à l'autre (représentant l'état d'une tâche).                                                                                                                                                                                                                              | 3          | Basse | 
| 14 | En tant qu'utilisateur, je souhaite pouvoir cliquer sur un bouton "Déconnexion" afin de me déconnecter de l'application.                                                                                                                                                                                                                                                                                                                                                                | 1          | Moyenne | 
| 15 | En tant qu'utilisateur, je souhaite pouvoir consulter le détail d'une tâche (intitulé, description, son état(to do, ongoing, done) ainsi que le nombre de jour/homme).                                                                                                                                                                                                                                                                                                                                                       | 2          | Basse | 
| 16 | En tant qu'utilisateur, je souhaite pouvoir ajouter une note (500 caractères) à une tâche afin d'indiquer une information au sujet de la tâche au reste de l'équipe.                                                                                                                                                                                                                                                                                                                    | 3          | Basse | 
| 17 | En tant qu'utilisateur, je souhaite pouvoir lire les notes qui ont été ajoutées à une tâche afin de me tenir à jour sur la tâche.                                                                                                                                                                                                                                                                                                                                                       | 2          | Basse | 
| 18 | En tant qu'utilisateur, je souhaite pouvoir supprimer une tâche d'un sprint d'un projet dont je suis membre afin de mettre à jour la liste des tâches (correction d'un imprévu, erreur de saisie).                                                                                                                                                                                                                                                                                      | 3          | Basse | 
| 19 | En tant qu'utilisateur, je souhaite pouvoir consulter le burn-down chart du sprint en cours afin de visualiser l'avancement du sprint.                                                                                                                                                                                                                                                                                                                                                  | 5          | Basse | 
| 20 | En tant qu'utilisateur, je souhaite pouvoir supprimer un sprint d'un projet afin de corriger une erreur de manipulation.                                                                                                                                                                                                                                                                                                                                                                | 3          | Basse |
| 21 | En tant qu'utilisateur, je souhaite pouvoir accèder aux retours des tests E2E effectués d'un projet dont je suis membre pour m'assurer du bon avancement de notre projet.                                                                                                                                                                                                                                                                                                                                                                | 4          | Basse |
| 22 | En tant qu'utilisateur, je souhaite pouvoir ajouter le retour d'un test E2E effectué d'un projet dont je suis membre en précisant la date d'exécution (obligatoire), un descriptif (obligatoire) et l'état de ce dernier (Validé ou non, obligatoire) afin d'informer le reste de mon équipe de l'avancement du projet.                                                                                                                                                                                                                                                                                                                                                                | 3          | Basse |
| 23 | En tant qu'utilisateur, je souhaite pouvoir supprimer le retour d'un test E2E effectué d'un projet dont je suis membre afin de corriger une erreur de manipulation.                                                                                                                                                                                                                                                                                                                                                                | 2         | Basse |
| 24 | En tant qu'utilisateur, je souhaite pouvoir corriger la date d'exécution, le descriptif et/ou l'état d'un le retour d'un test E2E d'un projet dont je suis membre afin d'informer le reste de mon équipe de l'avancement du test.                                                                                                                                                                                                                                                                                                                                                                | 2         | Basse |
| 25 | En tant qu'utilisateur, je souhaite pouvoir accéder à la liste des releases pour un projet dont je suis membre afin de m'informer du bon avancement du projet.                                                                                                                                                                                                                                                                                                                                                                | 2         | Basse |
| 26 | En tant qu'utilisateur, je souhaite pouvoir ajouter une release d'un projet dont je suis membre en informant la version de la release (50 caractères max., obligatoire), le changelog (500 caractères max., obligatoire), et un lien de téléchargement (255 caractères max., obligatoire) permettant d'accèder à la release afin d'informer le reste de mon équipe de la disponibilité et des fonctionnalités developpées de cette dernière.                                                                                  | 4         | Basse |
| 27 | En tant qu'utilisateur, je souhaite pouvoir supprimer une release d'un projet dont je suis membre pour corriger une erreur de manipulation.                                                                                                                                                                                                                                                                                                                                                                | 3         | Basse |
| 28 | En tant qu'utilisateur, je souhaite pouvoir corriger les informations concernant la release d'un projet dont je suis membre (c'est-à-dire le changelog, la version et/ou le lien de téléchargement).                                                                                                                                                                                                                                                                                                                                                                | 3         | Basse |




