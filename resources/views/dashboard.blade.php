<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <style>
        body {
            background-image: url('restaurant-jardins-epicure-vexin-882-1024x684.jpg');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .topnav {
            overflow: hidden;
            background-color:  #5F9EA0;
        }

        .topnav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 20px;
        }

        .topnav a:hover {
            background-color: #008B8B;
        }

        .topnav .icon-btn i {
            color: #007bff;
        }

        .topnav .icon-btn.delete i {
            color: #dc3545;
        }

        .topnav a:hover i {
            transform: scale(1.2);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 100px;
            animation: fadeIn 4s ease ;
            color:white;
        }

        .title-container {
            display: flex;
            align-items: center;
            height: 100vh;
        }

        .title-container img {
            width: 150px;
            height: auto;
            margin-right: 20px;
        }
    </style>
</head>
<body>
<div class="topnav">
    <a href="/category" style="background-color: #008B8B"><i class="fas fa-cogs"></i>Gérer</a>
    <a href="/regle"><i class="far fa-calendar-alt"></i> Reservation</a>
    <a href="/afficher"><i class="fas fa-chart-line"></i> Rapports</a>
    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}" style="float: right;">
        @csrf
        <button type="submit" class="btn btn-secondary" style="margin-top: 20px; text-align: left;, margin-bottom:10px; background-color:lightblue;">
            <i class="fas fa-sign-out-alt" style="margin-right: 10px;" id="person"></i> Logout
        </button>
    </form>
</div>

<!-- Title in the middle of the page -->
<div class="title-container">
    
    <h1>Bienvenue Dans Votre Restaurant</h1>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // JavaScript code for search functionality
    const searchInput = document.getElementById('searchInput');
    const productCountText = document.getElementById('productCountText');
    const productsTable = document.getElementById('productsTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    function confirmDelete(productId) {
        Swal.fire({
            title: 'Confirmation',
            text: "Voulez-vous vraiment supprimer ce produit?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler',
            customClass: {
                title: 'swal-title',
                text: 'swal-text',
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-primary  '
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/deleteproduit?id=" + productId;
            }
        });
    }

    // Function to handle search
    function handleSearch() {
        const searchValue = searchInput.value.trim().toLowerCase();
        let count = 0;
    }
        for (let i = 0; i < productsTable.length; i++) {
            const productName = productsTable[i].getElementsByTagName('td')[0].innerText.toLowerCase();
            const productBrand = productsTable[i].getElementsByTagName('td')[1].innerText.toLowerCase();
            if (productName.includes(searchValue) || productBrand.includes(searchValue)) {
                productsTable[i].style.display = '';
                count++;
            } else {
                productsTable[i].style.display = 'none';
            }
       
