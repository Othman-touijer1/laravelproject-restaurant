<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Catégorie</title>
    <!-- Link vers Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 20px;
            background-color: #336699; /* Fond gris pour la barre latérale */
            border-right: 1px solid #dee2e6;
            overflow-y: auto; /* Ajout de défilement si nécessaire */
        }
        .nav-link {
            color: white !important;
        }
        /* Ajout de style pour le cadre */
        .container-border {
            border: 2px solid #336699;
            padding: 20px;
            margin-top: 20px;
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
        <div class="col-9 mt-5">
            <!-- Ajout du cadre autour des éléments -->
            <div class="container container-border">
                <div class="row">
                    <div class="col">
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
                    </div>
                </div>
                <form action="/modifiercategorie/traitement/{{$id->id}}" method="POST">
                    @csrf
                    @method("PATCH")
                    <!-- <div class="form-group">
                    <label for="category_id">Identifiant de la Catégorie:</label>
                        <input type="text" class="form-control" id="category_id" name="id" value="{{$id->id}}">
                    </div> -->
                    <div class="form-group">
                        <label for="category_title">Titre de la Catégorie:</label>
                        <input type="text" class="form-control" id="category_title" name="titre" value="{{$id->titre}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                    <a href="/category" class="btn btn-secondary">Revenir a la liste</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Liens vers les scripts Bootstrap (jQuery requis pour les fonctionnalités Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
