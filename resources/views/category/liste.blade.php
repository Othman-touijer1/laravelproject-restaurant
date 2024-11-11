<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>
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
            background-color: #008B8B; /* Fond gris pour la barre latérale */
            border-right: 1px solid #dee2e6;
            overflow-y: auto; /* Ajout de défilement si nécessaire */
        }
        .sidbar{
            color:white;
        }

        h1 {
            color: black; /* Couleur de texte grise pour le titre principal */
        }

        /* Autres styles existants */

        .container {
            display: flex;
            justify-content: space-between; /* Pour espacer les éléments */
        }

        
        .btn-primary {
            margin-left: auto; 
        }

        .table {
            background-color:  #339966; /* Couleur de fond de la table */
            border: 2px solid #dee2e6; /* Ajout de bordures à la table */
            width: 100%; /* Largeur de la table */
        }

        /* Style pour les liens en blanc */
        .nav-link {
            color: white !important; /* Couleur du texte en blanc pour les liens de navigation */
        }
        .table th, .table td{
            border: 1px solid #dee2e6; /* Bordures pour les cellules */
            padding: 8px; /* Ajustement de la taille du padding */
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
        .edit-button {
        color: white; /* Couleur du texte en blanc pour les boutons "Éditer" */
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
                    <li class="nav-item"><a class="nav-link" href="/category"  >Catégories</a></li>
                    <li class="nav-item"><a class="nav-link" href="/table">Ventes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/serveur">Serveurs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu">Menus</a></li>
                  
                </ul>
            </div>
        </div>

        <div class="col-9 offset-3 mt-5">
            <center><h1>Gestion des Catégories</h1></center>
            <hr> <!-- Ligne horizontale sous le titre -->

            <div class="container">
                <div class="row mt-4 justify-content-end">
                    <!-- <div class="col-auto">
                        <a href="/ajouter" class="btn btn-primary">Ajouter Catégorie</a>
                        <a href="/dashboard" class="btn btn-primary">Retour</a>
                    </div> -->
                </div>
            </div>

            <div class="row mt-4" id="categories">
                <div class="col">
                    <h4>Liste des Catégories</h4>
                    <table class="table table-sm"> <!-- Utilisation de la classe table-sm pour une table plus compacte -->
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titre</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Exemple de lignes -->
                            @foreach($categories as $categorie)
                            <tr> 
                                <td>{{ $categorie->id }}</td>   
                                <td>{{ $categorie->titre }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm">
                                        <a href="/modifiercategory/{{ $categorie->id}}"><i class="fas fa-edit"></i> Éditer<a>
                                            
                                        </button>
                                
                                
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $categorie->id }}">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </td>
                                

                            </tr>
                            
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="container">
                <div class="row mt-4 justify-content-end">
                    <div class="col-auto">
                        <a href="/ajouter" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter Catégorie</a>
                        <a href="/dashboard" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Retour</a>
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
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterModalLabel">Ajouter Catégorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'ajout de catégorie -->
                <form>
                    <div class="form-group">
                        <label for="categoryTitle">Titre de la Catégorie</label>
                        <input type="text" class="form-control" id="categoryTitle" placeholder="Entrez le titre de la catégorie" name="titre">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Liens vers les scripts Bootstrap (jQuery et Popper.js requis pour les fonctionnalités Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Wait for the document to be ready
    $(document).ready(function () {
        // Add click event listener to delete buttons
        $('.delete-btn').click(function () {
            // Get the category ID from the data-id attribute
            var categoryId = $(this).data('id');

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
                    // Redirect to the delete route with the category ID
                    window.location.href = '/supprimercategorie/' + categoryId;
                }
            });
        });
    });
</script>
