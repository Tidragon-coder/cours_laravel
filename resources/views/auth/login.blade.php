<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background: #4a5568;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        a {
            display: block;
            margin-top: 10px;
            color: #3182ce;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{route('api.login')}}"> 
            @csrf 
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password"> 
            <button type="submit">Login</button>
        </form>
        <h3>Don't have an account? <a href="/register">Register</a></h3>
    </div>
</body>
</html>