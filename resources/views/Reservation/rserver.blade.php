<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .container {
            width: 90%;
            max-width: 600px;
            padding: 10px;
            background-color: lightblue;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container,
        .menu-container {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .form-container.show,
        .menu-container.show {
            opacity: 1;
            transform: translateY(0);
        }
        .menu-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        .menu-item:hover {
            transform: translateY(-3px);
        }
        .menu-item img {
            max-width: 40px;
            max-height: 40px;
            margin-right: 10px;
        }
        #totalAmount {
            font-weight: bold;
            margin-top: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 100%;
            font-size: 14px;
        }
        .btn {
            padding: 8px;
            font-size: 14px;
        }
        .menu-container {
            border: 2px solid lightblue; 
            padding: 10px; 
            border-radius: 8px; 
            background-color:lightblue;
        }
       
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="number"] {
            background-color:white; 
            font-size: 16px; 
        }
        
    </style>
</head>
<body>
    <div class="container">
    
        <div class="form-container show">
            <h2 class="mb-3 text-center" style="color: #333;">Réservation de Table</h2>
            <form action="/reserver/traitement" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="serverName" placeholder="Votre nom" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="serverEmail" placeholder="Votre email" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="numTable" placeholder="Numéro de table" required>
                </div>
        </div>

      
        <div class="menu-container">
            <h2 class="mb-3 text-center">Menu</h2>
            <div class="row">
                <div class="col-sm-6">
                    <div class="menu-item" data-name="Pizza" data-price="10">
                        <img src="https://media.istockphoto.com/id/1414575281/photo/a-delicious-and-tasty-italian-pizza-margherita-with-tomatoes-and-buffalo-mozzarella.jpg?s=1024x1024&w=is&k=20&c=bwoUzONnFgIK65TQ7uUeSAlM78h-gCmKSR3nnGhb6AI=" alt="Pizza">
                        Pizza - $3
                        <input type="checkbox" class="menu-checkbox">
                    </div>
                    <div class="menu-item" data-name="Burger" data-price="8">
                        <img src="https://media.istockphoto.com/id/1482650278/photo/juicy-ground-pork-and-bacon-cheeseburger-with-fries.jpg?s=1024x1024&w=is&k=20&c=VsvQtB42TsynvGZNeZoKg9GxKMH2q0vHMtNZqLd2IdY=" alt="Burger">
                        Burger - $4
                        <input type="checkbox" class="menu-checkbox">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="menu-item" data-name="Salade" data-price="7">
                        <img src="https://media.istockphoto.com/id/819832220/photo/french-traditional-salade-ni%C3%A7oise-with-tuna-vegetables-and-anchovy.jpg?s=1024x1024&w=is&k=20&c=4ubPD3_oomR3QnFwGAiiupeH2wimOLXmjq76go7ZpNM=" alt="Salade">
                        Salade - $7
                        <input type="checkbox" class="menu-checkbox">
                    </div>
                    <div class="menu-item" data-name="Pâtes" data-price="12">
                        <img src="https://media.istockphoto.com/id/1144823591/photo/spaghetti-in-a-dish-on-a-white-background.jpg?s=1024x1024&w=is&k=20&c=lHa9fOVAOV1QiPDd9UD7FEXl6zXea5SRTAnAD3ez-JU=" alt="Pâtes" width="200px">
                        Pâtes - $12
                        <input type="checkbox" class="menu-checkbox">
                    </div>
                </div>
                <div class="col-sm-6">
    <div class="menu-item" data-name="Sushi" data-price="15">
        <img src="https://larepublica.es/wp-content/uploads/2018/07/Sushi.jpg" alt="Sushi">
        Sushi - $15
        <input type="checkbox" class="menu-checkbox">
    </div>

    </div>
    <div class="col-sm-6">
        <div class="menu-item" data-name="Poulet rôti" data-price="18">
            <img src="https://tse3.mm.bing.net/th?id=OIP.qYQifbRWuGNDuOoSgfMwdAHaE7&pid=Api&P=0&h=180" alt="Poulet rôti">
            Poulet rôti - $18
            <input type="checkbox" class="menu-checkbox">
        </div>
        
    </div>

            </div>
            <div class="d-flex align-items-center">
                <input type="number" id="totalAmount" class="form-control mt-3" placeholder="Total" readonly name="prix" >
            </div>
            <br>
         
            <button type="submit" class="btn btn-primary btn-block">Réserver</button>
            <a href="/table" class="btn btn-primary btn-block">Retour</a>
            
        </div>
        </form>
    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const formContainer = document.querySelector('.form-container');
            const menuContainer = document.querySelector('.menu-container');

           
            setTimeout(() => {
                menuContainer.classList.add('show');
            }, 300);

           
            const checkboxes = document.querySelectorAll('.menu-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    let totalAmount = 0;
                    checkboxes.forEach(checkbox => {
                        if (checkbox.checked) {
                            let item = checkbox.parentElement;
                            let price = parseInt(item.getAttribute('data-price'));
                            totalAmount += price;
                        }
                    });
                    document.getElementById('totalAmount').value = totalAmount;
                });
            });
        });
    </script>
</body>
</html>
