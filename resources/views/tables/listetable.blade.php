<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Ventes</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Styles existants */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 20px;
            background-color: #008B8B;
            border-right: 1px solid #dee2e6;
            overflow-y: auto;
        }
        .container {
            display: flex;
            justify-content: space-between;
        }
        .btn-primary {
            margin-right: auto;
        }
        .table {
            background-color: #C0C0C0;
        }
        /* Style pour la date mise à jour */
        #currentDate {
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            justify-content: center;
        }
        .nav-link {
            color: white !important; /* Couleur du texte en blanc pour les liens de navigation */
        }
        .table td{
            border:2px solid black;
        }
        /* Style pour les icônes dans les boutons */
        .btn i {
            margin-right: 5px; /* Marge à droite pour l'espacement avec le texte */
        }
        tr{
            transition: all .2s ease-in;
            cursor:pointer;
        }
        #header{
            background-color:#16a085;
            color:#fff;
        }
        h1{
            font-weight:700;
            text-align:center;
            background-color:#16a085;
            color:#fff;
            padding:10px 0px;
        }
        tr:hover{
            background-color:#f5f5f5;
            transform:scale(1.02);     
        }
        /* Ajout de styles pour centrer le bouton de date et heure */
        #currentDateContainer {
            text-align: right; /* Aligner à droite */
            margin-top: 10px;
            margin-right:100px;
        }
        #currentDate{
            margin-left:560px;
            margin-bottom:30px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Barre latérale pour la navigation -->
        <div class="col-3">
            <div class="sidebar">
                <h4>Navigation</h4>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="/category">Catégories</a></li>
                    <li class="nav-item"><a class="nav-link" href="/table">Ventes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/serveur">Serveurs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu">Menus</a></li>
                </ul>
            </div>
        </div>

        <div class="col-9 offset-3 mt-5">
            <center><h1>Gestion des Ventes</h1></center>
            <hr>

            <div class="row mt-4" id="categories">
                <div class="col">
                    <h4>Liste des ventes</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Table</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Boucle PHP pour afficher les ventes -->
                            @foreach($tables as $table)
                            <tr> 
                                <td>{{$table->user_name}}</td>
                                <td>{{$table->email}}</td>
                                <td>{{$table->num}}</td>
                                <td>{{$table->price}}</td>
                                <td>
                                    
                                    <form action="/modifiertable/{{$table->id}}">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Éditer</button>
                                    </form>
                                    <!-- <form action="/supprimertable/{{$table->id}}">
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Supprimer</button>
                                    </form> -->
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete({{$table->id}})"><i class="fas fa-trash-alt"></i> Supprimer</button>
                                    
                                
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Bouton Date et Heure actuelle -->
            <div class="container mt-4" id="currentDateContainer">
                <div class="row justify-content-start align-items-center">
                    <!-- Déplacement du bouton de retour à gauche -->
                    <div class="col">
                        <a href="/dashboard" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Retour</a>
                    </div>
                    <div class="col-auto" id="currentDate"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Liens vers les scripts Bootstrap (jQuery et Popper.js requis pour les fonctionnalités Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Lien vers Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Fonction pour mettre à jour la date et l'heure actuelles
    function updateCurrentDateTime() {
        const currentDateElement = document.getElementById('currentDate');
        if (currentDateElement) {
            const now = new Date();
            const formattedDateTime = now.toLocaleString('fr-FR', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' });
            currentDateElement.textContent = formattedDateTime;
        }
    }

    // Mettre à jour la date et l'heure initiales lors du chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        updateCurrentDateTime(); // Mettre à jour la date et l'heure lors du chargement initial de la page
        setInterval(updateCurrentDateTime, 1000); // Mettre à jour la date et l'heure chaque seconde
    });
</script>
<!-- Liens vers les scripts Bootstrap (jQuery et Popper.js requis pour les fonctionnalités Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Lien vers Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Fonction pour confirmer la suppression
    function confirmDelete(tableId) {
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas récupérer cette vente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer!',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                // Rediriger vers l'action de suppression avec l'ID de la table
                window.location.href = "/supprimertable/" + tableId;
            }
        });
    }
</script>


</body>
</html>
