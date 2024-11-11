<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Serveurs</title>
    <!-- Link vers Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Style pour rendre la barre latérale fixe avec un défilement */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 20px;
            background-color: #008B8B;
            border-right: 1px solid #dee2e6;
            overflow-y: auto; /* Ajout de défilement si nécessaire */
        }
        
        .container {
            display: flex;
            justify-content: space-between; /* Pour espacer les éléments */
        }

        .btn-primary {
            margin-left: auto; /* Déplace le bouton vers la droite */
        }

        .table {
            background-color: lightgreen;
            border: 2px solid black;
        }

        .nav-link {
            color: white !important; 
            /* Couleur du texte en blanc pour les liens de navigation */
        }

        .table td {
            border: 2px solid black;
            padding: 8px;
        }

        .table th {
            border: 2px solid black;
            padding: 8px;
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
        
        <!-- Contenu principal -->
        <div class="col-9 offset-3 mt-5">
            <center><h1>Gestion des Serveurs</h1></center>
            <hr>

        

            <div class="row mt-4" id="categories">
                <div class="col">
                    <h4>Liste des Serveurs</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Adresse</th>
                                <th scope="col" class="action-col">Action</th> <!-- Ajout de la classe action-col -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($serveurs as $serveur)
                            <tr>
                                <th scope="row">{{ $serveur->id }}</th>   
                                <td>{{ $serveur->nom}}</td>
                                <td>{{ $serveur->adresse}}</td>
                                <td class="action-col"> <!-- Ajout de la classe action-col -->
                                    <form action="/modifierserveur/{{$serveur->id}}">
                                    @csrf 
                                        <button class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Éditer</button>
                                    </form>
                                    <!-- <form action="supprimerserveur/{{$serveur->id}}">
                                    @csrf 
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Supprimer</button>
                                    </form> -->
                                    
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $serveur->id }}">
                                            <i class="fas fa-trash-alt"></i> Supprimer
                                        </button>
                                    

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Nouveaux boutons -->
            

            <!-- Boutons Retour et Ajouter -->
            <div class="container mt-4">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <a href="/dashboard" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Retour</a>
                    </div>
                    <div class="col-auto">
                        <a href="/ajouterserveur" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Ajouter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modèle de fenêtre modale pour Ajouter Catégorie -->
<div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="ajouterModalLabel">Ajouter Serveur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            
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
    // Wait for the document to be ready
    $(document).ready(function () {
        // Add click event listener to delete buttons
        $('.delete-btn').click(function () {
            // Get the server ID from the data-id attribute
            var serverId = $(this).data('id');

            // Display a confirmation dialog using SweetAlert
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Vous ne pourrez pas annuler cela!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!'
            }).then((result) => {
                // If the user confirms deletion, redirect to the delete route
                if (result.isConfirmed) {
                    // Redirect to the delete route with the server ID
                    window.location.href = '/supprimerserveur/' + serverId;
                }
            });
        });
    });
</script>


</body>
</html>
