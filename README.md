# pokedex v.0.0.1

Une mini application sous ionic qui interroge une api php pour afficher la fiche de dracaufeu et Pikachu en dropdown

## Installation de l'API

Dans le projet se trouve le répertoire "api_pokedex". 
Copier le et placer le à la racine de votre serveur (MAMP dans mon cas) ou servez vous du serveur interne de php.
C'est vous qui voyez.
Dans ce répertoire, outre les deux fichiers php qui constituent l'api se trouve le dump de la base de donnée "pokedex.sql"
Après avoir créer votre base de données que vous nommerez "pokedex", vous pourrez y importer la table "pokemon" et ses données grâce au fichier "pokedex.sql".
Servez vous de phpmyadmin par exemple.

## Adaptation de l'url

A la ligne 89 du fichier Home.vue vous adapterez l'url utilisé par axios selon l'environnement dans lequel vous avez placé le répertoire "api_pokedex"

            axios
                .get("http://localhost:8888/API_pokedex/pokemons") <-- url à adapter selon le nom de domaine.
                .then((response) => (this.infos = response.data));

## Installation des dépendances

Un petit coup de 

            npm install