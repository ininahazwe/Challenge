[![Contributors][contributors-shield]][contributors-url]
[![MIT License][license-shield]][license-url]


<!-- ABOUT THE PROJECT -->
## A propos du projet

Application symfony de gestion de commandes et stock.

### Développé avec

Elle a été développée avec les technologies suivantes:
* [Symfony](https://symfony.com)
* [Twig](https://twig.symfony.com/)
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)



<!-- DEMARRAGE -->
## Démarrage
Le framework Symfony nécessite npm ou yarn (gestionnaires de paquets officiel de Node.js) pour installer les dépendances, et php.
Le choix s'étant porté sur la 5.4xversion de Symfony, la version 8.0 de php (par contrainte technique) est nécessaire. La base de données est en sql.
Il est recommandé d'installer également Composer (Composer est un logiciel gestionnaire de dépendances libre écrit en PHP)

### Prérequis

Voici les
* npm
  ```sh
  npm install npm@latest -g
  ```
  php 8.0
  ```sh
  sudo apt install php libapache2-mod-php http://www.php.net/downloads.php
  ```
  Composer
  ```sh
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
  php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
  php composer-setup.php
  php -r "unlink('composer-setup.php');"
  ```

### Installation

1. Installation du projet symfony (en mode complet)
   ```sh
   gh repo clone ininahazwe/boutique
   ```
2. Création de la base de données et liaison avec les entités
   ```sh
   php bin/console doctrine:database:create
   php bin/console make:migration
   php bin/console doctrine:migrations:migrate
   ```
3. Mise à jour des dépendances
   ```sh
   composer install
   npm install
   
   ```
4. Tests
   ```sh
   symfony console make:test
   php bin/phpunit
   ```

<!-- LICENSE -->
## License

Distribué sous la License MIT. Voir `LICENSE` for plus d'informations.

<!-- CONTACT -->
## Contact

Yves Ininahazwe - yves.ininahazwe@talents-handicap.com
