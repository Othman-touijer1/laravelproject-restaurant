<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        /* Existing styles */
    
        /* Button Animation */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none;
        }
        .btn-primary {
            background-color: #008cba;
            color: white;
        }
    
        .btn-secondary {
            background-color: #008cba;
            color: white;
        }
    
        .btn:hover {
            background-color: #004266; /* Darker shade of primary color */
            transform: translateY(-2px); /* Move button up slightly on hover */
        }
    </style>
    
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
         /* Global Styles */
         body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 50px 0;
            overflow: hidden;
        }

        header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-out;
        }
        header h2 {
            font-size: 2rem;
            font-weight: 400;
            margin-bottom: 30px;
            animation: fadeInDown 1s 0.5s ease-out;
        }

        header p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            animation: fadeInDown 1s 1s ease-out;
        }

        /* Key Features Section */
        #features {
            padding: 50px 0;
        }
        #features h2 {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            animation: fadeInUp 1s forwards;
        }

        .feature {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 1s forwards;
        }

        .icon {
            flex: 0 0 150px;
            margin-right: 40px;
        }
        /* Custom Button Styles */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-primary {
            background-color:#008CBA;
            color: white;
        }

        .btn-primary:hover {
            background-color: rgb(24, 41, 88);
        }

        .btn-secondary {
            background-color: #008CBA;
            color: white;
        }
        .btn-secondary:hover {
            background-color: rgb(24, 41, 88);
        }


        .icon img {
            max-width: 100%;
            border-radius: 20%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            animation: float 2s infinite alternate;
        }

        .text {
            flex: 1;
        }

        .text h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .text p {
            font-size: 1.2rem;
            line-height: 1.6;
        }
         /* Footer */
         footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes float {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-10px);
            }
        }

        /* Animation for features */
        @keyframes slideFromLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideFromRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .feature:nth-child(odd) {
            animation: slideFromLeft 1s forwards;
        }

        .feature:nth-child(even) {
            animation: slideFromRight 1s forwards;
        }
    </style>
</head>

<body>
    <header >
        <div class="container">
            <h1>Welcome to</h1>
            <h2>Inventory Management System</h2>
            <p>A modern solution for efficient inventory tracking and management</p>
            <div>
            @auth
                    <!-- If the user is authenticated, display a logout link -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            class="btn btn-secondary font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                @else
                    <!-- If the user is not authenticated, display login and register links -->
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}"
                            class="btn btn-primary font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Log in
                        </a>
                    @endif
                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="btn btn-secondary ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Register
                        </a>
                    @endif --}}
                @endauth
            </div>
        </div>
    </header>
    
    <section id="features">
        <div class="container">
            <div class="feature">
                <div class="icon">
                    <img src="https://icaninfotech.com/wp-content/uploads/2021/04/inventory-management-for-ecommerce-store-by-i-can-infotech-1.png" alt="Inventory Tracking">
                </div>
                <div class="text">
                    <h3>Inventory Tracking</h3>
                    <p>Track your inventory in real-time and never run out of stock.</p>
                </div>
                </div>
            <div class="feature">
                <div class="icon">
                    <img src="https://th.bing.com/th/id/OIP.WUYJ_JY3s6wKFIHeWHtakAAAAA?w=363&h=354&rs=1&pid=ImgDetMain" alt="Data Analytics">
                </div>
                <div class="text">
                    <h3>Data Analytics</h3>
                    <p>Gain valuable insights into your inventory data for better decision-making.</p>
                </div>
            </div>
            <div class="feature">
                <div class="icon">
                    <img src="https://1.bp.blogspot.com/-OlQLN8DznT8/Wz2-lkxuxzI/AAAAAAAAA2o/CT6qqaJY7pIJnk0Ah95szQy0IbpdtnM3gCLcBGAs/s1600/inventory-adalah.jpg" alt="User-friendly Interface">
                </div>
                <div class="text">
                    <h3>User-friendly Interface</h3>
                    <p>Intuitive interface for easy management and navigation.</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 Inventory Management System. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>









