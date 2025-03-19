<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auth Page</title>
    <style>
        :root {
            --bg-color: #121212;
            --card-bg: #1e1e1e;
            --primary: #8e44ad;
            --primary-hover: #9b59b6;
            --text-primary: #ffffff;
            --text-secondary: #b3b3b3;
            --border-radius: 8px;
            --box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            background-color: var(--bg-color);
            background-image: radial-gradient(circle at top right, rgba(142, 68, 173, 0.1), transparent 60%),
                              radial-gradient(circle at bottom left, rgba(41, 128, 185, 0.1), transparent 60%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: var(--text-primary);
        }
        
        .container {
            width: 90%;
            max-width: 400px;
            text-align: center;
            background: var(--card-bg);
            padding: 40px 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: 1px solid rgba(255, 255, 255, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(142, 68, 173, 0.05), transparent);
            transform: rotate(45deg);
            z-index: 0;
        }
        
        .container > * {
            position: relative;
            z-index: 1;
        }
        
        h1 {
            font-size: 26px;
            margin-bottom: 30px;
            color: var(--text-primary);
            font-weight: 600;
        }
        
        .buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }
        
        a {
            display: inline-block;
            width: 100%;
            padding: 14px 20px;
            text-decoration: none;
            color: var(--text-primary);
            font-size: 16px;
            font-weight: 500;
            background-color: var(--primary);
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }
        
        a::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: 0.5s;
        }
        
        a:hover {
            background-color: var(--primary-hover);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(142, 68, 173, 0.3);
        }
        
        a:hover::after {
            left: 100%;
        }
        
        .login-icon {
            display: block;
            margin: 0 auto 30px;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-icon svg {
            width: 40px;
            height: 40px;
            fill: var(--primary);
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>
        <h1>Bienvenue sur Delta</h1>
        <div class="buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/profile') }}">Mon profil</a>
                @else
                    <a href="{{ route('login') }}">Se connecter</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">S'inscrire</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>