<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
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
            background-color: var(--primary);
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
            background-color: var(--primary-hover);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .register-link {
            margin-top: 25px;
            color: var(--text-secondary);
            font-size: 15px;
        }
        
        .register-link a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .register-link a:hover {
            color: var(--accent);
            text-decoration: underline;
        }
        
        .form-header {
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
        }
        
        .login-icon {
            width: 70px;
            height: 70px;
            background-color: rgba(142, 68, 173, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .login-icon svg {
            width: 35px;
            height: 35px;
            fill: var(--primary);
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
            <div class="login-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"/>
                </svg>
            </div>
        </div>
        
        <h1>Connexion</h1>
        
        <form method="POST" action="{{route('api.login')}}">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Adresse e-mail" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Mot de passe" required>
                </div>
            </div>
            
            <button type="submit" class="btn">Se connecter</button>
        </form>
        
        <div class="register-link">
            Vous n'avez pas de compte ? <a href="/register">S'inscrire</a>
        </div>
    </div>
</body>
</html>