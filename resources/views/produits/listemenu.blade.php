<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Menus</title>
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
        .table{
            background-color:lightblue;
            border:2px solid black;
        }
        .nav-link {
            color: white !important; /* Couleur du texte en blanc pour les liens de navigation */
        }
        /* Style pour réduire la taille des cellules de la colonne "Action" */
        .action-col {
            width: 120px; /* Ajustez la largeur selon vos besoins */
        }
        /* Style pour réduire la taille de la colonne d'image */
        .image-col {
            width: 120px; /* Ajustez la largeur selon vos besoins */
        }
        .table td{
            border:2px solid black;
            padding: 8px; /* Ajustement du padding */
        }
        .table th{
            border:2px solid black;
            padding: 8px; /* Ajustement du padding */
        }
        .table img {
            max-width: 100px; /* Taille maximale de l'image */
            height: auto; /* Hauteur automatique pour garder les proportions */
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
            <center><h1>Gestion de Menu</h1></center>
            <hr>

            <!-- Tableau des menus -->
            <div class="row mt-4" id="menus">
                <div class="col">
                    <h4>Liste des Menus</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Category</th>
                                <th scope="col">Prix($)</th>
                                <th scope="col" class="image-col">Image</th> <!-- Ajout de la classe image-col -->
                                <th scope="col" class="action-col">Action</th> <!-- Ajout de la classe action-col -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                            <tr> 
                                <th scope="row">{{ $menu->id }}</th>   
                                <td>{{ $menu->titre }}</td>
                                <td>{{ $menu->category }}</td>
                                <td>{{ $menu->prix}}</td>
                                <td class="image-col"> 
                                    <img src="uploads/images/{{ $menu->image }}" alt="">
                                </td>
                                <td class="action-col"> 
                                    <form action="/modifiermenu/{{$menu->id}}">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Éditer</button>
                                    </form>
                                    
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $menu->id }}">
                                            <i class="fas fa-trash-alt"></i> Supprimer
                                        </button>
                                    

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Boutons Retour et Ajouter Menu côte à côte -->
            <div class="row mt-4">
                <div class="col">
                    <a href="/dashboard" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Retour</a>
                    <a href="/ajoutermenu" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modèle de fenêtre modale pour Ajouter Menu -->
<div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterModalLabel">Ajouter Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'ajout de menu (exemple statique) -->
                <form>
                    <div class="form-group">
                        <label for="menuTitle">Titre du Menu</label>
                        <input type="text" name="titre" class="form-control" id="titre" placeholder="Entrez le titre du menu">
                    </div>
                    <div class="form-group">
                        <label for="menuCategory">Catégorie</label>
                        <input type="text" name="category" class="form-control" id="category" placeholder="Entrez la catégorie du menu">
                    </div>
                    <div class="form-group">
                        <label for="menuPrice">Prix</label>
                        <input type="text" name="prix" class="form-control" id="prix" placeholder="Entrez le prix du menu">
                    </div>
                    <div class="form-group">
                        <label for="menuImage">Image URL</label>
                        <input type="text" name="iamge"class="form-control" id="image" placeholder="Entrez l'URL de l'image du menu">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Liens vers les scripts Bootstrap (jQuery et Popper.js requis pour les fonctionnalités Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Wait for the document to be ready
    $(document).ready(function () {
        // Add click event listener to delete buttons
        $('.delete-btn').click(function () {
            // Get the menu ID from the data-id attribute
            var menuId = $(this).data('id');

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
                    // Redirect to the delete route with the menu ID
                    window.location.href = '/supprimermenu/' + menuId;
                }
            });
        });
    });
</script>

</body>
</html>
