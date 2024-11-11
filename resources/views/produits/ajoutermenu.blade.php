<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
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
            background-color:#336699 ;
            border-right: 1px solid #dee2e6;
            overflow-y: auto; 
        }
        .nav-link {
            color: white !important;
        }
   
        #previewContainer {
            margin-top: 20px;
            max-width: 100%;
            height: auto;
            max-height: 100px;
            max-width:100px; 
            overflow: hidden; 
        }

        #preview {
            max-width: 100%;
            height: auto;
            display: block;
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
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-container">
                            <h2 class="text-center">Ajouter un Produit</h2>
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
                       
                            <form action="/ajoutermenu/traitement" method="post" enctype="multipart/form-data" class="form-group" id="productForm">
                           
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="titreProduit">Titre du Produit</label>
                                    <input type="text" class="form-control" id="titreProduit" placeholder="Entrez le nom du produit" name="titre">
                                </div>
                                <div class="form-group">
                                    <label for="categoryProduit">Catégorie du Produit</label>
                                    <input type="text" class="form-control" id="categoryProduit" placeholder="Entrez la catégorie du produit" name="category">
                                </div>
                                <div class="form-group">
                                    <label for="prixProduit">Prix du Produit</label>
                                    <input type="text" class="form-control" id="prixProduit" placeholder="Entrez le prix du produit" name="prix">
                                </div>
                                <div class="form-group">
                                    <label for="imageProduit">Sélectionner une Image</label>
                                    <input type="file" class="form-control-file" accept="image/*" id="imageProduit" name="image" onchange="previewImage()">
                                </div>
                               
                                <div id="previewContainer">
                                    <img src="#" alt="Aperçu de l'image" id="preview" style="display: none;" name="image1">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Ajouter Produit</button>
                                    <a href="/menu" class="btn btn-danger">Revenir à la liste des Menus</a>
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

<script>
    // Fonction pour prévisualiser l'image sélectionnée
    function previewImage() {
        var fileInput = document.getElementById('imageProduit');
        var preview = document.getElementById('preview');

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>

</body>
</html>
