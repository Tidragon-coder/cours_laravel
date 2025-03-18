<head>
    <style>
        form {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background: #0D0A4B; /* Bleu foncé de ta palette */
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Style des titres */
form h2 {
    text-align: center;
    color: #F0FBF7; /* Blanc cassé */
    font-size: 24px;
    margin-bottom: 20px;
}

/* Style des labels */
form label {
    color: #F0FBF7;
    font-size: 14px;
    margin-bottom: 5px;
    display: block;
}

/* Style des champs de saisie */
form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #3A6D8C; /* Bleu moyen */
    border-radius: 6px;
    background: #F0FBF7;
    color: #0D0A4B; /* Bleu foncé pour le texte */
    font-size: 16px;
    transition: 0.3s;
}

/* Effet focus */
form input:focus {
    outline: none;
    border-color: #4F7C77; /* Vert de ta palette */
    box-shadow: 0 0 8px rgba(79, 124, 119, 0.6);
}

/* Style du bouton */
form button {
    width: 100%;
    padding: 12px;
    background: #3A6D8C; /* Bleu moyen */
    color: #F0FBF7;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}

/* Effet hover sur le bouton */
form button:hover {
    background: #4F7C77; /* Vert */
    transform: scale(1.05);
}

    </style>
</head>


<form method="POST" action="{{route('api.register')}}"> 
    @csrf 
    <input type="text" name="username" placeholder="Username"> 
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password"> 
    <button type="submit">Register</button>
</form>
<h2>Don't have an account? <a href="/login">Login</a></h2>


