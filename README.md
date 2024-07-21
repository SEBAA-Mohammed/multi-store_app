# StoreBuilder : CMS E-Commerce Multi-Tenant

## Introduction

StoreBuilder est un système de gestion de contenu (CMS) personnalisable conçu pour créer et gérer des boutiques en ligne. Développé selon une architecture multi-tenant (modèle de base de données unique), StoreBuilder permet aux utilisateurs de créer plusieurs boutiques, chacune gérée par son propre administrateur. Ce projet a été réalisé dans le cadre d'un stage chez [ArtiWeb](https://artiweb.ma/), une agence de marketing digital et de communication à Fès, au Maroc. L'objectif était de créer une plateforme accessible et conviviale pour les entrepreneurs, en particulier les novices, afin de lancer et gérer facilement leurs boutiques en ligne.

[ PUT VIDEO HERE ]

## Table des matières

- [Contexte du Projet](#contexte-du-projet)
    - [Présentation du Projet](#présentation-du-projet)
    - [Problématique](#problématique)
    - [Solution Proposée](#solution-proposée)
- [Gestion de Projet](#gestion-de-projet)
    - [Cycle de Développement](#cycle-de-développement)
    - [Méthodologie de Gestion de Projet](#méthodologie-de-gestion-de-projet)
- [Étude Fonctionnelle](#étude-fonctionnelle)
    - [Architecture Multi-Tenancy (Base de Données Unique)](#architecture-multi-tenancy-base-de-données-unique)
    - [Conception de la Base de Données](#conception-de-la-base-de-données)
    - [Modélisation des Contextes](#modélisation-des-contextes)
- [Étude Technique](#chapitre-3-étude-technique)
    - [Les Technologies Utilisées](#a-les-technologies-utilisées)
    - [L'exécution de ce projet](#b-lexécution-de-ce-projet)
- [Conclusion](#conclusion)

## Contexte du Projet

### Présentation du Projet

Le projet visait à développer une plateforme innovante permettant aux entrepreneurs de créer et de gérer facilement des boutiques en ligne. Inspirée par des solutions leaders comme Shopify, la plateforme offre une expérience utilisateur simplifiée et intuitive.

#### Fonctionnalités de la Plateforme:
- **Technologie Avancée:** Combine Laravel (framework PHP), React (bibliothèque JavaScript) et Inertia.js pour des interactions transparentes entre le frontend et le backend. L'interface administrateur utilise Filament pour une expérience utilisateur fluide.
- **Création de Boutique Facile:** Les utilisateurs peuvent créer un compte, personnaliser l'apparence de leur boutique et configurer des options essentielles comme les coordonnées et les catégories de produits.
- **Gestion Complète des Produits:** Ajouter des produits, définir des catégories et des marques, et gérer les stocks de manière efficace.
- **Paiements Simplifiés:** Intégration avec Paddle pour des transactions sécurisées.

### Problématique

Lancer une boutique en ligne peut être complexe, nécessitant des compétences techniques et un investissement financier. Les solutions existantes, bien que efficaces, peuvent être coûteuses et difficiles à utiliser pour les débutants.

#### Problèmes Identifiés:
- **Défis Techniques:** Les entrepreneurs manquent de connaissances en développement web et en e-commerce.
- **Coûts Élevés:** Les solutions existantes sont assorties de frais d'abonnement élevés et de commissions sur les transactions.
- **Besoin de Simplicité:** Une interface conviviale et un processus de création de boutique simplifié sont essentiels.

### Solution Proposée

Le projet visait à développer une plateforme intuitive et accessible permettant aux entrepreneurs de créer et de gérer facilement des boutiques en ligne. La plateforme inclut des fonctionnalités essentielles pour une gestion efficace de la boutique, telles que la gestion des produits et des catégories, le contrôle des stocks, et la personnalisation de la boutique. L'intégration de Paddle assure des transactions sécurisées et simples. L'accent mis sur la convivialité et l'abordabilité positionne la plateforme comme une alternative attrayante aux solutions e-commerce traditionnelles.

## Gestion de Projet

### Cycle de Développement

Le développement de la plateforme a suivi un cycle agile, favorisant l'itération et la collaboration pour s'adapter aux besoins et priorités changeants.

#### Phases de Développement:
- **Planification et Analyse:** Définir les objectifs du projet et les principales fonctionnalités. Analyser les besoins des utilisateurs et choisir les technologies appropriées (Laravel, React, Inertia.js, Filament).
- **Conception et Prototypage:** Concevoir l'architecture logicielle et la base de données.
- **Développement et Intégration:** Développement itératif des fonctionnalités de la plateforme avec des sprints courts et des livraisons régulières. Intégrer les composants frontend et backend en utilisant Inertia.js.

### Méthodologie de Gestion de Projet

La gestion de projet s'est appuyée sur une méthodologie agile, mettant l'accent sur la collaboration et la communication entre les parties prenantes. GitHub a été largement utilisé pour le contrôle de version et le travail collaboratif.

#### Éléments Clés:
- **Méthodologie Agile (Scrum):** Organiser le travail en sprints courts avec des livraisons et des points de revue réguliers pour s'adapter aux changements et prioriser les fonctionnalités.
- **Contrôle de Version avec Git et GitHub:** Utiliser Git pour suivre les modifications du code et GitHub pour héberger le code, facilitant la gestion des branches, la collaboration et le suivi des changements.
- **Gestion des Branches:** Créer et gérer des branches de développement pour des fonctionnalités spécifiques, permettant un développement parallèle et un meilleur contrôle des modifications.
- **Résolution de Conflits de Fusion:** Identifier et résoudre les conflits de code lors de la fusion des branches pour assurer une intégration transparente et la stabilité du code.
- **Pull Requests et Revue de Code:** Utiliser les pull requests pour proposer des modifications et des contributions de code, permettant des revues de code pour des suggestions d'amélioration et une assurance qualité.
- **Contribution Active:** Plus de 200 commits ont été effectués, ajoutant de nouvelles fonctionnalités, corrigeant des bugs et améliorant le code existant.

## Étude Fonctionnelle

### Architecture Multi-Tenancy (Base de Données Unique)

[ Place photo here ]

Le multitenancy est un modèle de conception permettant à une seule instance d'application de servir plusieurs clients, appelés "locataires", en partageant la même base de données mais en séparant logiquement leurs données pour garantir confidentialité et sécurité. Dans une telle architecture, le schéma de la base de données inclut des informations spécifiques à chaque locataire, par exemple, une colonne pour l'identifiant du locataire dans chaque table, utilisé pour filtrer et séparer les données afin que chaque locataire ne puisse accéder qu'à ses propres informations.

Cette approche présente des avantages comme une réduction des coûts et une simplification du déploiement et de la maintenance, car une seule base de données est utilisée pour tous les locataires et les mises à jour sont appliquées simultanément. Cependant, des contrôles d'accès rigoureux et des pratiques de gestion des données sont nécessaires pour éviter les fuites de données et assurer la sécurité des informations. Dans notre application CMS e-commerce, cette architecture permet de gérer plusieurs magasins à partir d'une seule instance, chaque magasin ayant son propre ensemble de données tout en partageant la même infrastructure de base de données.

### Conception de la Base de Données

La base de données de la plateforme e-commerce stocke des informations sur les produits, les utilisateurs, les boutiques et les transactions. Elle comprend plusieurs tables reliées par des clés étrangères pour garantir l'intégrité des données.

[ PHOTO HERE ]
#### Principales Tables et Relations:
- **Produits:** Stocke les détails des produits tels que le code-barres, le nom, le prix, la TVA, la description, la catégorie, la marque, l'unité de mesure, le stock disponible, la note moyenne, et la boutique associée.
- **Catégories:** Stocke les catégories de produits liées aux produits et aux boutiques.
- **Marques:** Stocke les marques de produits liées aux produits et aux boutiques.
- **Unités:** Stocke les unités de mesure liées aux produits et aux boutiques.
- **Boutiques:** Stocke les informations des boutiques liées aux utilisateurs, catégories, produits et utilisateurs.
- **Utilisateurs:** Stocke les informations des utilisateurs, y compris les propriétaires de boutiques et les clients.
- **Commandes:** Stocke les informations des commandes, y compris la date, le statut, le mode de paiement et l'utilisateur associé.
- **Détails des Commandes:** Stocke les détails de chaque commande, liant les commandes aux produits et spécifiant la quantité, le prix d'achat et la TVA appliquée.
- **Modes de Paiement:** Stocke les modes de paiement disponibles.
- **Statuts:** Stocke les statuts possibles des commandes.
- **Images des Produits:** Stocke les URL des images des produits.
- **Évaluations:** Stocke les évaluations des produits liées aux utilisateurs et aux produits.

### Modélisation des Contextes

#### Acteurs:
- **Propriétaire de Boutique**
- **Client**
- **Manager**

#### Cas d'Utilisation:

[ PHOTO HERE ]

**Pour les Propriétaires de Boutique:**
- **Créer une Boutique:** Créer et configurer une boutique en ligne.
- **Gérer les Produits:** Ajouter, modifier, supprimer et organiser les produits.
- **Gérer les Catégories et Marques:** Créer, modifier, supprimer et organiser les catégories et marques de produits.
- **Traiter les Commandes:** Gérer les commandes des clients.

**Pour les Clients:**
- **Créer un Compte Client:** Créer et gérer un compte client.
- **Consulter les Produits:** Parcourir les produits disponibles.
- **Passer une Commande:** Ajouter des produits au panier, passer une commande et effectuer un paiement.

**Pour les Managers:**
- **Gérer les Boutiques:** Gérer les boutiques et les utilisateurs associés.

# Chapitre 3: Étude Technique

## A. Les Technologies Utilisées

### a. Laravel Framework

[Laravel](https://github.com/laravel/framework) offre un écosystème riche avec de nombreux packages pré-construits pour des tâches variées, comme le traitement des paiements, l'optimisation SEO et la gestion des utilisateurs. Cela nous permet de gagner du temps et de nous concentrer sur la création de fonctionnalités uniques.

### b. Laravel Ecosystem

#### i. Inertia.js (Intégration React)

[Inertia.js](https://github.com/inertiajs/inertia-laravel) avec React permet de créer une interface utilisateur dynamique tout en bénéficiant des fonctionnalités sécurisées de Laravel. Inertia.js assure une communication fluide entre le frontend et le backend.

#### ii. Cashier avec Paddle

[Cashier](https://github.com/laravel/cashier-paddle) simplifie l'utilisation de Paddle pour les paiements, offrant une solution sécurisée et fiable pour les transactions e-commerce.

#### iii. Laravel Breeze

[Laravel Breeze](https://github.com/laravel/breeze) fournit des fonctionnalités essentielles pour l'enregistrement, la connexion et la gestion des mots de passe des utilisateurs, assurant un processus d'authentification sécurisé et convivial.

### c. FilamentPHP

[FilamentPHP](https://github.com/filamentphp/filamentphp.com) offre une solution rapide pour créer des interfaces d'administration riches en fonctionnalités. Cela permet de développer des tableaux de bord distincts pour les administrateurs et les gestionnaires, et de se concentrer sur les fonctionnalités uniques de l'application.

### d. Paddle Payment Platform

[Paddle](https://www.paddle.com/) gère les paiements en ligne, génère des factures détaillées pour chaque transaction et notifie les clients par email. Cela permet aux managers de consulter le solde global des ventes.

### e. React (Inertia)

[React](https://github.com/facebook/react) avec Inertia.js et TypeScript permet de séparer clairement le frontend et le backend. React crée des interfaces dynamiques et interactives, tandis qu'Inertia.js assure une communication efficace avec le backend Laravel.

### f. TypeScript

[TypeScript](https://github.com/microsoft/TypeScript) améliore la maintenabilité et la robustesse de l'application en offrant des avantages comme la détection des erreurs à la compilation, une meilleure documentation du code, et un refactoring plus sûr.

### g. TailwindCSS

[TailwindCSS](https://github.com/tailwindlabs/tailwindcss) harmonise le style et accélère le développement de l'interface utilisateur en fournissant des classes utilitaires configurables. Cela permet d'appliquer rapidement des styles CSS directement aux composants React, éliminant le besoin de CSS personnalisé volumineux.

## B. L'exécution de ce projet

### a. Cloner le Répertoire

```bash
git clone https://github.com/SEBAA-Mohammed/multi-store_app.git
```

### b. Installer les Dépendances PHP

```bash
composer install
```

### c. Installer les Dépendances JavaScript

```bash
npm install
```

### d. Construire le Projet avec Vite

```bash
npm run build
```

### e. Créer le Fichier `.env` à partir de `.env.example`

```bash
cp .env.example .env
```

### f. Configurer les Clés Paddle

Dans le fichier `.env`, ajoutez vos clés API Paddle :

```env
PADDLE_API_KEY=your-paddle-api-key
PADDLE_CLIENT_SIDE_TOKEN=your-paddle-client-side-token
```

### g. Générer la Clé de l'Application

```bash
php artisan key:generate
```

### h. Créer la Base de Données MySQL

Connectez-vous à votre base de données MySQL et créez la base de données store_builder :

```sql
CREATE DATABASE store_builder;
```

### i. Exécuter les Migrations

```bash
php artisan migrate:fresh --seed
```

### j. Créer un Lien Symbolique vers le Répertoire de Stockage

```bash
php artisan storage:link
```

### k. Démarrer le Serveur de Développement Laravel

```bash
php artisan serve
```

### l. Démarrer le Serveur de Développement Node

```bash
npm run dev
```

Vous pouvez maintenant accéder à votre application en ouvrant un navigateur et en naviguant vers [http://localhost:8000](http://localhost:8000).

## Conclusion

En résumé, ce projet d'application CMS e-commerce, basé sur Laravel, réunit plusieurs technologies modernes pour offrir une expérience utilisateur optimale et une gestion efficace du commerce électronique. L'intégration de Paddle pour les paiements, l'utilisation de React avec TypeScript pour l'interface utilisateur, et l'emploi de TailwindCSS pour le style, forment un ensemble cohérent et performant, répondant aux besoins des administrateurs et des gestionnaires tout en offrant une expérience utilisateur fluide et sécurisée.
