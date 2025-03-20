<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <style>
        :root {
            --bg-color: #121212;
            --card-bg: #1e1e1e;
            --primary: #8e44ad;
            --primary-hover: #9b59b6;
            --secondary: #3498db;
            --accent: #2ecc71;
            --text-primary: #ffffff;
            --text-secondary: #b3b3b3;
            --text-muted: #777777;
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
            min-height: 100vh;
            margin: 0;
            color: var(--text-primary);
            padding: 20px;
        }
        
        .container {
            width: 100%;
            max-width: 400px;
            background: var(--card-bg);
            padding: 35px 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            text-align: center;
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
            color: var(--text-primary);
            font-size: 24px;
            margin-bottom: 25px;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 20px;
            text-align: left;
            background-color: rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: var(--border-radius);
        }
        
        .input-group {
            margin-bottom: 15px;
            position: relative;
        }
        
        input {
            width: 100%;
            padding: 12px 15px;
            background-color: #2a2a2a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            color: var(--text-primary);
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(142, 68, 173, 0.2);
        }
        
        input::placeholder {
            color: var(--text-muted);
        }
        
        .btn {
            padding: 12px 20px;
            background-color: var(--accent);
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius);
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            width: 100%;
        }
        
        .btn:hover {
            background-color: #27ae60;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .login-link {
            margin-top: 25px;
            color: var(--text-secondary);
            font-size: 15px;
        }
        
        .login-link a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .login-link a:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        .form-header {
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
        }
        
        .register-icon {
            width: 70px;
            height: 70px; 
            background-color: rgba(46, 204, 113, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .register-icon svg {
            width: 35px;
            height: 35px;
            fill: var(--accent);
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 25px 20px;
            }
            
            .form-group {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <div class="register-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </div>
        </div>
        
        <h1>Créer un compte</h1>
        
        <form method="POST" action="{{route('api.register')}}">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Adresse e-mail" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Mot de passe" required>
                </div>
            </div>
            
            <button type="submit" class="btn">S'inscrire</button>
        </form>
        
        <div class="login-link">
            Vous avez déjà un compte ? <a href="/login">Se connecter</a>
        </div>
    </div>
</body>
</html>