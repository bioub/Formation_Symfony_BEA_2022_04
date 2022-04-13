# Exercices

## Router

* créer un contrôleur `ContactController` avec la commande `make:controller`
* dans ce controller créer 5 méthodes : `index`, `create`, `show`, `delete`, `update`
* créer les fichiers twig manquants (juste mettre une balise h2 avec le nom de la page)
* ces méthodes doivent être accessibles via les requêtes suivantes

| Requete                                 | methode php |
|-----------------------------------------|-------------|
| `GET` `/contacts`                       | `index`     |
| `GET` `/contacts/{id}`                  | `show`      |
| `GET` et `POST` `/contacts/add`         | `create`    |
| `GET` et `POST` `/contacts/{id}/delete` | `delete`    |
| `GET` et `POST` `/contacts/{id}/update` | `update`    |

## Doctrine

Avec la commande `make:entity`, générer une classe `Contact` avec 4 propriétés (en plus id généré automatiquement) :

- `firstName`
- `lastName`
- `email` (optionnel)
- `phone` (optionnel)

Les 4 sont de type string (taille au choix)

Lancer la commande pour updater la table

Compléter `AppFixtures` pour y générer 5 contacts.

Lancer la commande pour insérer les fixtures

Compléter les méthodes `index` et `show` de `ContactController` pour afficher les contacts (la liste et le détail)

## Associations

Avec la commande `make:entity`, générer une classe `Tag` avec 1 propriété (en plus id généré automatiquement) :

- `name` (type `string`)

Mettre à jour l'entité `Contact` avec `make:entity`, y ajouter la propriété :

- `tags` (type `ManyToMany` vers l'entité `Tag`)

Compléter `AppFixtures` pour y générer 2 tags `Amis`, `Collègues`.

Associer ces tags aux contacts existants.

Lancer la commande pour insérer les fixtures.

Mettre à jour le templates `contact/show.html.twig` pour afficher les tags

