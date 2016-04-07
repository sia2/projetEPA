Installation MiniBB

1/ Modifier le fichier setup_options.php (dans le repertoire minibb) et replacer les champs concernant la BDD
$DBhost='localhost'; Nom de l'hôte
$DBname='minibb'; "Base de données où le forum sera installé, ce doit être la même que pour l'ensemble des modules"
$DBusr='root'; Utilisateur
$DBpwd=''; Mot de passe

2/ Créer les tables dans la base de données que vous avez indiqué précédemment via le fichier minibb.sql.

3/ Lancer le site /localhost/projetEPA/groupe1/minibb/index.php