# Concours de Robots - Application de gestion

## 📌 Contexte
Chaque année, un **concours de robots** est organisé entre plusieurs collèges des Deux-Sèvres dans le cadre de l’enseignement de technologie en classe de troisième.  
Cette application web permet de gérer le concours depuis l’inscription des équipes jusqu’à la proclamation des résultats.

Le projet est développé avec **PHP Laravel**, afin de proposer une solution moderne, sécurisée et responsive.

---

## 🚀 Fonctionnalités principales
- **Inscriptions en ligne** des équipes par les professeurs de technologie.  
- **Gestion des épreuves** avec prise en compte des barèmes et coefficients.  
- **Saisie des résultats** par les secrétaires pendant le concours.  
- **Consultation des résultats** et export au format tableur (CSV, ODS, XLS).  
- **Classements par catégories** (concours général, esthétique, site web, meilleure équipe par collège).  
- **Accès public** aux informations générales et aux résultats finaux.  
- **Responsive design** pour une utilisation sur ordinateur, tablette et smartphone.  

---

## 👥 Rôles utilisateurs
- **Visiteur** : consultation des infos générales.  
- **Abonné** : accès en lecture seule.  
- **Élève** : membre d’équipe, jury ou secrétaire.  
- **Enseignant** : inscription et suivi des équipes de son collège.  
- **Jury** : évaluation des épreuves.  
- **Secrétaire** : saisie des notes.  
- **Gestionnaire** : supervision, modification des notes, édition des résultats.  
- **Administrateur** : tous les droits.


# 🚀 Guide d’installation du projet

## 1. Installer les dépendances système

### Installer Composer
```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
```

### Installer Node.js & NPM
```bash
sudo apt install nodejs npm
```

---

## 2. Installer le projet

### Cloner le dépôt

#### Créer un dossier \`cr26\` et y cloner :
```bash
git clone https://github.com/Lethary/cr26
cd cr26/
```

#### Ou cloner directement dans le dossier courant :
```bash
git clone https://github.com/Lethary/cr26 .
```

---

## 3. Installer les dépendances du projet

### Backend (Composer / Laravel)
```bash
composer update
```

### Frontend (NPM)
```bash
npm install
```

---

## 4. Préparer l’environnement

### Créer le fichier \`.env\`
```bash
cp .env.example .env
```

### Configurer la connexion à la base de données
Modifier dans \`.env\` :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_ta_base
DB_USERNAME=ton_utilisateur
DB_PASSWORD=ton_mot_de_passe
```

---

## 5. Générer la clé Laravel
```bash
php artisan key:generate
```

---

## 6. Compiler les assets frontend
```bash
npm run build
```

---

## ✔️ Installation terminée !
