# Websockets

## Introduction
Il s'agit de concevoir et réaliser le prototype d'un système permettant à des personnes
de se retrouver en un lieu extérieur, pour y accomplir un "« défi écolo »" à l'image des
trashtag challenge qui fleurissent en ce moment. Le système doit permettre de croiser la
géographie des personnes, leurs disponibilités et la météo qu'on souhaite "« bonne »"
pour réaliser un tel défi. Le système est composé :
 - d'un objet géolocalisé utilisé par chaque personne dont vous réaliserez un client web jouant le rôle de simulateur de l'objet
 - d'un serveur "web des objets" sollicité par les objets de ces personnes et pouvant les solliciter par WebSockets
 - de l'utilisation de l'API OpenWeatherMap pour obtenir les informations météorologiques nécessaires (au format JSON)

Chaque personne pourra indiquer au système :
 - un lieu repéré où une action écologique est proposée
 - les créneaux où il est disponible pour participer en commun à un "défi écolo "

Étapes de travail :
 - écriture d'un cahier des charges décrivant le système
 - écriture d'un document de conception décrivant comment il fonctionne

Développement du système :
vidéo de tutoriel de l'application, destinée aux personnes utilisant votre système
(peut être rendue quelques jours après la soutenance)

Optionnel :
Utiliser un SGBD (MySQL ou PostgreSQL par ex.) pour stocker les informations du système de façon persistante.
