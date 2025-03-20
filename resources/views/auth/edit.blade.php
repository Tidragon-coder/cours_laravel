<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier le Profil</title>
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
            max-width: 500px;
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
        
        .edit-header {
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
        }
        
        .edit-icon {
            width: 70px;
            height: 70px;
            background-color: rgba(52, 152, 219, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .edit-icon svg {
            width: 35px;
            height: 35px;
            fill: var(--secondary);
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
        
        label {
            display: block;
            margin-bottom: 8px;
            color: var(--primary);
            font-weight: 600;
            font-size: 15px;
        }
        
        input, textarea {
            width: 100%;
            padding: 12px 15px;
            background-color: #2a2a2a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            color: var(--text-primary);
            font-size: 15px;
            font-family: inherit;
            transition: all 0.3s ease;
            resize: none;
        }
        
        textarea {
            min-height: 100px;
        }
        
        input:focus, textarea:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        
        .btn {
            padding: 12px 20px;
            background-color: var(--secondary);
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
            background-color: #2980b9;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .back-link {
            display: inline-block;
            margin-top: 25px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s;
        }
        
        .back-link:hover {
            color: var(--text-primary);
            text-decoration: underline;
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
        <div class="edit-header">
            <div class="edit-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                </svg>
            </div>
        </div>
        
        <h1>Modifier mon profil</h1>
        
        <form action="{{ route('auth.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" value="{{ old('username', auth()->user()->username) }}">
                </div>
                
                <div class="input-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}">
                </div>
                
                <div class="input-group">
                    <label for="bio">Bio</label>
                    <textarea name="bio" id="bio">{{ old('bio', auth()->user()->bio) }}</textarea>
                </div>
            </div>
            
            <button type="submit" class="btn">Sauvegarder les modifications</button>
        </form>
        
        <a href="{{ route('profile') }}" class="back-link">Retour au profil</a>
    </div>
</body>
</html>