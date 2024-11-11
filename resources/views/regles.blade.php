<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Règles de Réservation</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
            background-color: #5F9EA0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Ajout pour positionner le bouton */
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .rules {
            margin-top: 30px;
        }

        h2 {
            color: #007bff;
        }

        p {
            margin-bottom: 20px;
        }

        .reservation-button {
            position: absolute; /* Positionnement absolu par rapport à .container */
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Supprimer la décoration de texte */
        }

        /* Animation du bouton */
        .reservation-button:hover {
            background-color: #0056b3;
        }
                /* Animation lorsqu'une règle est survolée */
        .rules h2,
        .rules p {
            transition: color 1s ease;
        }

        .rules h2:hover,
        .rules p:hover {
            color: #007bff;
        }

        /* Animation lorsqu'une règle est cliquée */
        .rules h2:active,
        .rules p:active {
            color: #0056b3;
        }

        /* Animation de texte pour les règles */
        .rules h2,
        .rules p {
            animation: fade-in 0.5s ease-in-out forwards;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        a{
            margin-top:20px;
            font-size:18px;
        }


    </style>
</head>
<body>
    <div class="container">
        <h1>Règles du Serveur</h1>
        <div class="rules">
            <h2>1. Tenue Appropriée</h2>
            <p>Tous les serveurs doivent porter une tenue appropriée, comprenant une chemise blanche et un pantalon noir.</p>
            <h2>2. Courtoisie envers les Clients</h2>
            <p>Les serveurs doivent toujours être polis et courtois envers les clients, répondre à leurs questions et satisfaire leurs demandes dans la mesure du possible.</p>
            <h2>3. Hygiène Personnelle</h2>
            <p>Les serveurs doivent maintenir une hygiène personnelle irréprochable, en se lavant les mains régulièrement et en gardant leurs cheveux attachés.</p>
            <!-- Ajoutez d'autres règles ici -->
        </div>

        <h1>Règles de Réservation</h1>
        <div class="rules">
            <h2>1. Réservations</h2>
            <p>Les réservations doivent être faites au moins 24 heures à l'avance.</p>
            <h2>2. Nombre de Personnes</h2>
            <p>Le nombre de personnes dans une réservation ne peut pas dépasser la capacité de la table réservée.</p>
            <h2>3. Annulations</h2>
            <p>Toute annulation de réservation doit être effectuée au moins 2 heures avant l'heure prévue de la réservation.</p>
            <!-- Ajoutez d'autres règles ici -->
        </div>

        <!-- Bouton de réservation -->
        
    </div>
    <a href="/reserver" class="reservation-button">Réserver</a>
</body>
</html>
