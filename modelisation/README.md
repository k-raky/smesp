# smesp

-----------------------------------------------PROJET UML-------------------------------------------------
----------------------------------------------------------------------------------------------------------

On désire automatiser le service de maintenance de l’école.
Le service compte 4 chefs de pôle et un chef Suprême (Prince).

OLD VERSION
 
Les Formulaires sont envoyés à Prince qui les distribuent en retour aux chefs de pôle.


LES ATTENTES

une demande est envoyée au chef de pôle chargé du type de problème, et au chef suprême.
Si la demande est autre, elle n’est envoyée qu’à prince qui va décider qui l’attribuer.

Chaque technicien à un statut:
	disponible
	indisponible

Le chef de pôle peut voir les techniciens disponibles ou non

Le chef de pôle attribue la tache à un technicien disponible
	NB : lui même est un technicien donc il peut faire le travail.


Le technicien doit toujours définir l’état d’une tache.
	En cours
	En suspens (et Pourquoi?)
	Terminé
	
Une fois la tache terminée, le technicien devra remplir un bon notifiant :
	les matériaux utilisés
	Intervenants
	La durée des travaux (Peut êre automatique)

Ce bon est envoyé directement au chef de pôle et au chef suprême

Le chef suprême aura la possibilité de voir
	les personnes en chargent d’une tache précise,
	l’état des travaux,
	l’efficacité des techniciens
	le stock des matériaux
	les matériaux manquants ou demandés …

le chef suprême peut aussi ajouter des matériaux au stock.

Chaque matériel a :
	un nom
	description
	destination (Elec, plomberie, tous …)
  
  ----------------------------------------------------------------------------------------------------------
