<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Detail vozu')</title>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Ikony -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/cs.js"></script>
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Styles -->
    <style>
        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            background-color: #292929;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-sizing: border-box;
            left: 0;
        }

        .navbar .logo {
            height: 60px;
            display: flex;
            align-items: center;
        }

        .navbar .logo a {
            height: 100%;
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            height: 100%;
            width: auto;
            object-fit: contain;
        }

        .navbar a {
            color: #E9E9E9;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #E44146;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            font-size: 18px;
        }

        /* Dropdown Menu */
        .relative {
            position: relative;
        }

        .account-button {
            background-color: transparent;
            color: #E9E9E9;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 10px 15px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #2C2C2C;
            border: 1px solid #444;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 200px;
            text-align: left;
            overflow: hidden;
        }

        .relative:hover .dropdown-menu {
            display: block;
        }

        .dropdown-link,
        .logout-button {
            display: block;
            color: #E9E9E9;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }

        .dropdown-link:hover,
        .logout-button:hover {
            background-color: #444;
        }

        .logout-button {
            background: none;
            border: none;
            text-align: left;
            cursor: pointer;
            width: 100%;
        }

        /* Media queries pro responzivní navigaci */
        @media screen and (max-width: 768px) {
            .navbar .logo {
                height: 40px;
            }
            
            .navbar {
                flex-direction: column;
                padding: 15px;
            }
            
            .nav-links {
                margin-top: 15px;
                width: 100%;
                justify-content: center;
            }
            
            .relative {
                margin-top: 15px;
            }
            
            .dropdown-menu {
                width: 100%;
                position: static;
                margin-top: 10px;
                box-shadow: none;
            }
        }

        /* Footer */
        .footer {
            background-color: #181818;
            padding: 80px 8% 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 4rem;
        }

        .footer-column h3 {
            color: #fff;
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .footer-column p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer-column ul li {
            margin-bottom: 0.75rem;
        }

        .footer-column ul li a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .footer-column ul li a:hover {
            color: #E34146;
        }

        .copyright {
            background-color: #181818;
            padding: 20px 8%;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .copyright p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
        }

        @media (max-width: 1024px) {
            .footer-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 3rem;
            }
        }

        @media (max-width: 640px) {
            .footer-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer {
                padding: 60px 5% 30px;
            }
        }
    </style>
</head>

<body>
    @include('layouts.navigation')
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
</body>

</html>