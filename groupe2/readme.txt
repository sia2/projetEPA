Vous trouverez la version fonctionnel à l'adresse www.marmoh.com/SIA/don.php www.marmoh.com/SIA/historique.php
MAJ 15/04/2016
Toute la gestion des paiements est opérationnel sauf la cotisation, ou il faut que je m'entretienne avec joran. 
Les modifications à réaliser sur la base de données pour que le package paiement fonctionne :
  Table Personne_physique: mettre tout les attributs à NULL par défaut (étant donné qu'une personne peut être enregistré sans toute les infformations)
  Table typepaiements : ajouter les lignes suivantes : 
          INSERT INTO `EPA`.`typepaiement` (`idtypeP`, `libelle`) VALUES ('0', 'Carte Bancaire'); 
          INSERT INTO `EPA`.`typepaiement` (`idtypeP`, `libelle`) VALUES ('1', 'Espèces');
          INSERT INTO `EPA`.`typepaiement` (`idtypeP`, `libelle`) VALUES ('2', 'RIB');
          INSERT INTO `EPA`.`typepaiement` (`idtypeP`, `libelle`) VALUES ('3', 'Autres');
          
