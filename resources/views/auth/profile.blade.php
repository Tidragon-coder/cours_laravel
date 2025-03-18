<head>
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #0D0A4B;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #333;
            margin: 8px 0;
        }

        strong {
            color: #3A6D8C;
        }

        img {
            border-radius: 50%;
            border: 3px solid #4F7C77;
            margin-top: 10px;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #3A6D8C;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        a:hover {
            background-color: #0D0A4B;
        }

    </style>
</head>

<div class="container">
    <h1>Profil de {{ $user->username }}</h1>
 
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <p><strong>Bio :</strong> {{ $user->bio ?? 'Aucune bio' }}</p>
    <p><strong>création de compte :</strong> {{ $user->created_at }}</p>
 
    @if ($user->profile_picture)
        <p><strong>Photo de profil :</strong></p>
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" width="150">
    @else
        <p>Aucune photo de profil</p>
    @endif
 
    <a href="{{ route('logout') }}">Se déconnecter</a>
</div>