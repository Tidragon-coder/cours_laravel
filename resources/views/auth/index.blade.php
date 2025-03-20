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

/* Styles globaux */
body {
    background-color: var(--bg-color);
    color: var(--text-primary);
    font-family: 'Inter', 'Segoe UI', sans-serif;
    line-height: 1.6;
}

/* Container principal */
.container {
    max-width: 1200px;
    padding: 20px;
    margin: 0 auto;
}

/* Titres */
h1 {
    color: var(--text-primary);
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.mb-4 {
    margin-bottom: 1.5rem;
}

/* Alerte de succès */
.alert {
    padding: 12px 20px;
    border-radius: var(--border-radius);
    margin-bottom: 1.5rem;
}

.alert-success {
    background-color: var(--accent);
    color: var(--bg-color);
    border-left: 4px solid #27ae60;
}

.alert-info {
    background-color: var(--secondary);
    color: var(--text-primary);
    border-left: 4px solid #2980b9;
}

/* Bouton */
.btn {
    display: inline-block;
    padding: 10px 20px;
    border-radius: var(--border-radius);
    text-decoration: none;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: var(--primary);
    color: var(--text-primary);
}

.btn-primary:hover {
    background-color: var(--primary-hover);
    box-shadow: var(--box-shadow);
}

.btn-primary2 {
    background-color:  #2980b9;
    color: var(--text-primary);
}

.btn-primary2:hover {
    background-color:rgb(41, 65, 185);
    box-shadow: var(--box-shadow);
}

/* Structure en grille */
.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -15px;
}

.col-12 {
    width: 100%;
    padding: 0 15px;
}

.col-md-6 {
    width: 100%;
    padding: 0 15px;
}

@media (min-width: 768px) {
    .col-md-6 {
        width: 50%;
    }
}

/* Cards des posts */
.card {
    background-color: var(--card-bg);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--box-shadow);
    height: 100%;
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.card-header {
    padding: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-img-top {
    width: 100%;
    height: auto;
    object-fit: cover;
    max-height: 400px;
}

.card-body {
    padding: 20px;
    flex-grow: 1;
}

.card-text {
    color: var(--text-secondary);
    margin-bottom: 0;
}

.card-footer {
    padding: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    background-color: var(--card-bg) !important;
}

/* Utilities */
.text-muted {
    color: var(--text-muted) !important;
}

.float-end {
    float: right;
}

.d-flex {
    display: flex;
}

.justify-content-between {
    justify-content: space-between;
}

.align-items-center {
    align-items: center;
}

/* Badge */
.badge {
    padding: 6px 12px;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 600;
}

.bg-primary {
    background-color: var(--primary);
    color: var(--text-primary);
}

/* État vide */
.h-100 {
    height: 100%;
}
</style>


<div class="container">
    <h1 class="mb-4">Tous les posts</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="mb-4">
        <a href="{{ route('home') }}" class="btn btn-primary2">Accueil</a>
    </div>
    
    <div class="mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Créer un nouveau post</a>
    </div>

    
    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <strong>{{ $post->user->name ?? 'Utilisateur inconnu' }}</strong>
                        <small class="text-muted float-end">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                    
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Image du post">
                    @endif
                    
                    <div class="card-body">
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                    
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-primary">{{ $post->likes_count }} J'aime</span>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Aucun post disponible pour le moment.
                </div>
            </div>
        @endforelse
    </div>
</div>