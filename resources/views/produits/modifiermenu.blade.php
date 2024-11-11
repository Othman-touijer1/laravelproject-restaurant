<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Catégorie</title>
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
            background-color: #336699;
            border-right: 1px solid #dee2e6;
            overflow-y: auto; /* Ajout de défilement si nécessaire */
        }

        /* Style pour les liens de navigation en blanc */
        .nav-link {
            color: white !important;
        }
        /* Style du cadre */
        .frame {
            border: 2px solid #336699;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Barre latérale pour la navigation -->
        <div class="col-3">
            <div class="sidebar frame">
                <h4>Navigation</h4>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="/category">Catégories</a></li>
                    <li class="nav-item"><a class="nav-link" href="/table">Ventes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/serveur">Serveurs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu">Menus</a></li>
                </ul>
            </div>
        </div>
        <div class="col-9 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col frame">
                        <center><h2>Modifier une Catégorie</h2></center>
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
                        
                        <form action="/modifiermenu/traitement/{{ $menu->id }}" method="POST" class="form-group">
                            @csrf
                            <div class="form-group">
                                <label for="categoryId">ID de la Catégorie</label>
                                <input type="text" class="form-control" id="categoryId" value='{{ $menu->id }}' name="id" disabled>
                            </div>
                            <div class="form-group">
                                <label for="categoryTitle">Titre du Menu</label>
                                <input type="text" class="form-control" id="categoryTitle" value='{{ $menu->titre }}' name="titre" >
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Category</label>
                                <input type="text" class="form-control" id="categoryName" value='{{ $menu->category }}' name="category" >
                            </div>
                            <div class="form-group">
                                <label for="categoryPrice">Prix</label>
                                <input type="text" class="form-control" id="categoryPrice" value='{{ $menu->prix }}' name="prix" >
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Editer Catégorie</button>
                            <br>
                            <br>
                            <a href="/category" class="btn btn-danger">Revenir à la liste des catégories</a>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
