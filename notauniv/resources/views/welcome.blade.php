<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Styles -->
    <style>
        /* Styles CSS */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .btn-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .button-frame {
            border: 2px solid #4CAF50;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            transition: border-color 0.3s ease;
        }
        .button-frame:hover {
            border-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="btn-container">
            @if (Route::has('login'))
                @auth
                    <div class="button-frame">
                        <button onclick="window.location.href='{{ url('/dashboard') }}'" class="btn">Dashboard</button>
                    </div>
                @else
                    <div class="button-frame">
                        <button onclick="window.location.href='{{ route('login') }}'" class="btn">Log in</button>
                    </div>

                    @if (Route::has('register'))
                        <div class="button-frame">
                            <button onclick="window.location.href='{{ route('register') }}'" class="btn">Register</button>
                        </div>
                    @endif
                @endauth
            @endif
        </div>
        @auth
            <!-- Afficher le texte "Dashboard" après la connexion de l'utilisateur -->
            <p>vous etes connecté</p>
        @endauth
    </div>
</body>
</html>
