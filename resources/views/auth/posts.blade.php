<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F0FBF7;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #0D0A4B;
        }

        textarea {
            width: 100%;
            height: 100px;
            margin: 10px 0;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="file"] {
            display: block;
            margin: 10px 0;
        }

        button {
            background-color: #3A6D8C;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0D0A4B;
        }

        .post {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: left;
            background-color: white;
        }

        .post p {
            margin: 5px 0;
        }

        img {
            max-width: 100%;
            border-radius: 5px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Les Derniers Posts</h2>

    @foreach($posts as $post)
        <div class="post">
            <p><strong>{{ $post->user->username }}</strong> - {{ $post->created_at->diffForHumans() }}</p>
            <p>{{ $post->content }}</p>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" width="200">
            @endif
            <p>👍 {{ $post->likes_count }}</p>
        </div>
    @endforeach
    
</div>

</body>
</html>
