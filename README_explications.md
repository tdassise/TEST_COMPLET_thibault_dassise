# TEST_COMPLET_thibault_dassise
Test Symfony pour SDVI


La branche que j'ai utilisée est la branche 'thibault' : toutes les étapes du test fonctionnent en utilisant le script SQL qui est dans le repo.

J'ai eu beaucoup de problèmes en faisant l'étape 3, mais en prenant du recul j'ai réussi à passer cette étape.

L'étape 4 ne m'a pas posé de problèmes car j'ai pratiqué beaucoup de SQL auparavant, il ne restait plus qu'à comprendre le fonctionnement avec Doctrine; l'étape 5 
ressemblait à l'étape 3 donc cela s'est aussi fait sans problèmes.

Je n'ai pas réussi à utiliser la BDD donnée avec le test (et donc les fixtures) car je n'avais pas compris que la table nb_ingredient_pizza correspondait à l'entité 
IngredientPizza, j'ai donc modifié la base de données pour que mes tests soient fonctionnels et que toutes les étapes puissent tout de même être réalisées.
