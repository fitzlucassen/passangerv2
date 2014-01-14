passangerv2
===========

la v2 du site du groupe

README :
===========
Chaque dossier doit commencer par une majuscule et être au singulier.

Content --> fichiers media (Css/, Js/, Media/Image, Media/Video)
    Il y a un dossier "Base" qui contient les fichiers voués à être inclus sur toutes les pages (jquery par exemple)
    Pour les fichiers à la racine on préfixe de "ps" pour passanger et on donne si possible le nom du controller

Helper --> Comme son nom l'indique, ce sont des classes vouées à faciliter le développement. Elles étendent toutes de la classe mère "helper.class.php".
    Leurs méthodes commencent par une majuscule.
    Les Helpers principaux sont inclues partout (via le bootstrap) (Sql/Session/View/Router). Pour les autres il faut les inclures dans les controllers voulus

MVC --> Contient le Modèle/Vue/Controleur
    Pour les controller, on suffixe du mot "Controller", pour les modèles, on suffixe du mot "Model".
    Par contre pour les vues on créée un dossier du nom du controller (plusieurs vues peuvent faire partie d'un même controller (plusieurs action))
    Tout modèle et tout controller étant de sa classe mère.
    Toute action d'un controller renvoie un array avec comme paramètre la vue souhaitée et le modèle à lui fournir.
    Ce modèle sera accessible dans la vue via l'objet "$Model"

Partial --> Contient toutes les vues partielles
    Pas de contrainte ici

Repository --> Pour chaque entité en base de données, il y a un repository.
    Commence par une majuscule suffixé de "Repository".
    Fais office de repository (contient toutes les fonctions d'exploitation).

Entity -> Pour chaque entité en base de données il y a une Entity.
    Commence par une majuscule.
    Fais office d'entity (objet image d'une table en BDD)

.htaccess renvoie toujorus vers l'index et on gère l'url rewritting grâce au helper "router.class.php"

bootstrap.php initialise les constantes et les variables importate du site

routes.config.php contient tous les PATH important.