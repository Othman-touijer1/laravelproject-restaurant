<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie</title>
    <!-- Link vers Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style pour rendre la barre latérale fixe avec un défilement */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 20px;
            background-color:#336699; ;
            border-right: 1px solid #dee2e6;
            overflow-y: auto; /* Ajout de défilement si nécessaire */
        }
        .nav-link {
            color: white !important;
        }
        .form-container {
            border: 1px solid #dee2e6;
            padding: 20px;
            margin-bottom: 20px;
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
        <div class="col-9 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-container">
                            <h2 class="text-center">Ajouter une Catégorie</h2>
                            <hr>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                            <!-- Formulaire d'ajout de catégorie -->
                            <form action="/ajouter/traitement" method="POST" class="form-group">
                                @csrf
                                <!-- <div class="form-group">
                                    <label for="categoryId">ID de la Catégorie</label>
                                    <input type="text" class="form-control" id="categoryId" placeholder="Entrez l'ID de la catégorie" name="id">
                                </div> -->
                                <div class="form-group">
                                    <label for="categoryTitle">Titre de la Catégorie</label>
                                    <input type="text" class="form-control" id="categoryTitle" placeholder="Entrez le titre de la catégorie" name="titre">
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Ajouter Catégorie</button>
                                </div>
                                <br>
                                <div class="text-center">
                                    <a href="/category" class="btn btn-danger">Revenir à la liste des catégories</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liens vers les scripts Bootstrap (jQuery requis pour les fonctionnalités Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
