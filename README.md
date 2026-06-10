# RareCare - HealthTech Platform

Une plateforme centralisée pour faciliter le suivi de patients atteints de maladies rares.

## 📋 Description

RareCare est une API REST développée par une startup HealthTech pour améliorer la gestion et le suivi des patients souffrant de maladies rares. La plateforme offre une solution centralisée et efficace pour les professionnels de santé.

## 🏗️ Architecture

Le projet est construit avec :
- **Backend** : PHP avec Laravel (framework web)
- **Templating** : Blade (moteur de templates Laravel)

## 🚀 Fonctionnalités principales

- Gestion des dossiers patients
- Suivi des traitements et des médicaments
- Historique médical complet
- Rapports et statistiques
- API REST centralisée

## 📦 Installation

### Prérequis
- PHP 8.0+
- Composer
- Base de données (MySQL/PostgreSQL)

### Étapes d'installation

1. **Cloner le repository**
   ```bash
   git clone https://github.com/Lahcen-akdime/Healthtech.git
   cd Healthtech
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configurer la base de données**
   - Mettre à jour les paramètres de connexion dans le fichier `.env`

5. **Exécuter les migrations**
   ```bash
   php artisan migrate
   ```

6. **Démarrer le serveur**
   ```bash
   php artisan serve
   ```

## 🔐 Authentification

La plateforme utilise JWT (JSON Web Tokens) pour l'authentification de l'API.

Voir l'issue [#1](https://github.com/Lahcen-akdime/Healthtech/issues/1) pour les détails de mise en place.

## 📚 Documentation API

La documentation détaillée de l'API sera disponible à `/api/docs` une fois le serveur lancé.

## 🤝 Contribution

Les contributions sont bienvenues ! Veuillez :

1. Fork le repository
2. Créer une branche pour votre feature (`git checkout -b feature/AmazingFeature`)
3. Commiter vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Pusher vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## 📝 License

Ce projet est sous license [À DÉFINIR].

## 📧 Contact

Pour toute question ou suggestion, veuillez créer une issue dans ce repository.

---

**Statut du projet** : En développement 🔨