<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Gestion de Restaurant</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        /* Styles existants */
    
        /* Animation des boutons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none;
        }
        .btn-primary {
            background-color: #008cba;
            color: white;
        }
    
        .btn-secondary {
            background-color: #008cba;
            color: white;
        }
    
        .btn:hover {
            background-color: #004266; 
            transform: translateY(-2px); 
        }
        
        
    </style>
    
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
         body {
            font-family: Arial, sans-serif;
            background-color: #5F9EA0	;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;                     
        }

        header {
            background-color:#008B8B;
            color: #fff;
            text-align: center;
            padding: 50px 0;
            overflow: hidden;
        }

        header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-out;
        }
        header h2 {
            font-size: 2rem;
            font-weight: 400;
            margin-bottom: 30px;
            animation: fadeInDown 1s 0.5s ease-out;
        }

        header p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            animation: fadeInDown 1s 1s ease-out;
        }

     
        #features {
            padding: 80px 0;
        }
        #features h2 {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            animation: fadeInUp 1s forwards;
        }

        .features-container {
            display: flex; 
            justify-content: space-between; 
        }

        .feature {
            flex: 1;
            background-color: #008B8B;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 0 10px;
            text-align: center;
            transition: transform 0.3s ease;
            color: #fff;
        }

        .feature:hover {
            transform: translateY(-5px); 
        }

        .icon {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-primary {
            background-color:#008CBA;
            color: white;
        }

        .btn-primary:hover {
            background-color: rgb(24, 41, 88);
        }

        .btn-secondary {
            background-color: #008CBA;
            color: white;
        }
        .btn-secondary:hover {
            background-color: rgb(24, 41, 88);
        }

        .icon img {
            max-width: 100%;
            border-radius: 20%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            animation: float 2s infinite alternate;
        }

        .text h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .text p {
            font-size: 1.2rem;
            line-height: 1.6;
        }
         /* Pied de page */
         footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes float {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-10px);
            }
        }

   
        @keyframes slideFromLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideFromRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .feature:nth-child(odd) {
            animation: slideFromLeft 1s forwards;
        }

        .feature:nth-child(even) {
            animation: slideFromRight 1s forwards;
        }
    </style>
</head>

<body>
    <header >
        <div class="container">
            <h1>Bienvenue dans votre restaurant</h1>
            <h2>"Système de Gestion"</h2>
            <p>Une solution moderne pour gérer efficacement votre restaurant</p>
            <div>
                <!-- Si l'utilisateur n'est pas authentifié, afficher les boutons de connexion et d'inscription -->
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                        class="btn btn-primary font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Connexion
                    </a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="btn btn-secondary ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        S'inscrire
                    </a>
                @endif
            </div>
        </div>
    </header>
    
    <section id="features">
        <div class="container">
            <div class="features-container">
                <div class="feature">
                    <div class="icon">
                        <img src="https://tse1.mm.bing.net/th?id=OIP.i8o6Bkt1t0o8t-t4v3gSzQHaHa&pid=Api&P=0&h=180" alt="Gérer">
                    </div>
                    <div class="text">
                        <h3>Gérer </h3>
                        
                        <p>Gérez vos travailleurs et vos produits de manière simple et rapide.</p>
                    </div>
                </div>
                <div class="feature">
                    <div class="icon">
                        <img src="https://tse2.mm.bing.net/th?id=OIP.IfiP0e-m9yc80sdXYw1G_wHaHa&pid=Api&P=0&h=180" alt="Réservation d'une table">
                    </div>
                    <div class="text">
                        <h3>Résérvation d'une table</h3>
                        <p>Réserver une table à un client et les plats qu'il veut</p>
                    </div>
                </div>
                <div class="feature">
                    <div class="icon">
                        <img src="https://tse4.mm.bing.net/th?id=OIP.IZ_QnS9w27DYMf1tUPb6_QHaHa&pid=Api&P=0&h=180" alt="Des Rapoorts">
                    </div>
                    <div class="text">
                        <h3>Des Rapoorts</h3>
                        <p>Obtenez quotidiennement des rapports de ventes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 Système de Gestion de Restaurant. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
