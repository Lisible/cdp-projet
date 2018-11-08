# TACHES DE DESIGN - CONDUITE DE PROJET

Description générale des composants de chacune des pages de notre projet.

# DESIGN DE LA PAGE DE CREATION DE USER STORY

Nom du fichier du formulaire: add_user_story.php

Nom du bouton de validation: "Valider"
Nom du bouton d'annulation: "Annuler"

c.f. la maquette pour les champs du formulaire

# DESIGN DE LA PAGE DU BACKLOG

Nom du fichier: list_backlog.php

Nom du bouton permettant d'ajouter une US: "Ajouter une User Story"
Nom du bouton permettant de retourner sur la page du projet: "Retour"
Nom du bouton permetttant de supprimer une US: "Supprimer"

c.f. la maquette pour la disposition de la liste

# DESIGN DE LA PAGE DE CREATION DE PROJET

Nom du fichier du formulaire : add_project.php
Nom du bouton de validation: "Valider"
Nom du bouton d'annulation: "Annuler"
c.f. la maquette pour les champs du formulaire

# DESIGN DE LA PAGE DE CONSULTATION DU PROJET

Nom du fichier: project_details.php
Nom du bouton permettant d'accéder à la page du Backlog : "Backlog"
Nom du bouton permettant d'accéder à la liste des sprints : "Sprints"
Nom du bouton permettant d'accéder à la page d'ajout de membre de projet : "Ajouter un membre"
Nom du bouton permettant d'accéder à la liste des membres du projet : "Membres"
Nom du bouton permettant de retourner à la liste des projets : "Retour"
c.f. la maquette pour visualiser les détails du projet

# DESIGN DE LA PAGE DE LA LISTE DES PROJETS

Nom du fichier: project_list.php
Id du du lien permettant d'accéder à la page de création de projet: "add_project_link"

# Base de données
![MLD](MLD_sprint1.png "Modèle logique des données pour le sprint 1")

# DAO
Les fonctions du fichier DAO.php seront:
```
void createProject($project);
Project[] getProjects();
void createUserStory($userStory);
UserStory[] getUserStories($projectId);
```
