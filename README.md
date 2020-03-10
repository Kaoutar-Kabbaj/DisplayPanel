# DisplayPannel
L’application DisplayPannel offre un mode d’affichage innovant des données de rendement des installations photovoltaïques.  
L’installateur est libre de paramétrer la configuration de l’écran de son client comme il le souhaite. 
Afficher ou pas la météo, choisir le type de son horloge (Digitale ou numérique), choisir l’image de son arrière-plan ou bien modifier la couleur de ses graphes. De plus les titres des dashboards des clients sont personnalisables par l’installateur afin de répondre aux besoins spécifiques du client.  
Le client a le choix entre une multitude de dashboards ou de solutions. L’utilisation est un véritable jeu d’enfant : le système est piloté via l’application solardisplay.

# Configuration de l’application  
Avant de déployer l’application sur le serveur, veuillez insérer un fichier sous la forme min200121.csv dans votre répertoire data. Il est à noter que l’extension de votre fichier doit être la date du jour.
Par exemple 200121 le 20 représente l’année 2020, le 01 c’est le mois janvier et le 21 c’est le jour 21 du mois .
Le répertoire data est un répertoire qui contient les fichiers transmis par le datalogger.

# Interface Client 
Comme toute autre application le point de départ de l’application est une simple page d’authentification, celle-ci permet à l'utilisateur d’accéder uniquement aux données dont il a besoin.

![authentification](https://github.com/Kaoutar-Kabbaj/DisplayPannel/blob/master/images/auth.PNG) </br>
Le client s’enregistre en cliquant sur Enregistrez-vous simplement**; ici si il n’est pas encore enregistré.

![register](https://github.com/Kaoutar-Kabbaj/DisplayPannel/blob/master/images/inscription.png)</br>

Effectivement, le client choisit entre 3 types de solutions, chaque solution convient à un dashboard donné personnalisé par son installateur.

Une fois enregistré un email automatique est envoyé au technicien qui quant à lui copiera le chemin du répertoire dans le path du datalogger comme le montre la figure ci-dessous.

![email_notif](https://github.com/Kaoutar-Kabbaj/DisplayPannel/blob/master/images/email_notif.jpg)</br>
Une fois le client est logé une erreur s’affichera sur son écran, celle-ci ne disparaitra qu’après avoir affecté le client à un installateur donné.

Effectivement, Il existe 3 types de dashboard : 
- Dashboard 1 :
![dash1](https://github.com/Kaoutar-Kabbaj/DisplayPannel/blob/master/images/panneau1.PNG)</br>
- Dashboard 2 :
![dash2](https://github.com/Kaoutar-Kabbaj/DisplayPannel/blob/master/images/panneau2.png)</br>
- Dashboard 3 :
![dash3](https://github.com/Kaoutar-Kabbaj/DisplayPannel/blob/master/images/panneau3.PNG)</br>



