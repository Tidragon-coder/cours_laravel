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

.post-container {
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

.post-container::before {
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

.post-container > * {
    position: relative;
    z-index: 1;
}

h1 {
    color: var(--text-primary);
    font-size: 24px;
    margin-bottom: 25px;
    font-weight: 600;
}

.post-form-group {
    margin-bottom: 20px;
    text-align: left;
    background-color: rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: var(--border-radius);
}

.form-input-group {
    margin-bottom: 15px;
    position: relative;
}

.form-input-group label {
    display: block;
    margin-bottom: 8px;
    color: var(--text-secondary);
    font-size: 15px;
}

textarea, input[type="file"] {
    width: 100%;
    padding: 12px 15px;
    background-color: #2a2a2a;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: var(--border-radius);
    color: var(--text-primary);
    font-size: 15px;
    transition: all 0.3s ease;
}

input[type="file"] {
    padding: 10px;
}

textarea {
    resize: vertical;
    min-height: 120px;
}

textarea:focus, input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 2px rgba(142, 68, 173, 0.2);
}

textarea::placeholder, input::placeholder {
    color: var(--text-muted);
}

.input-help-text {
    color: var(--text-muted);
    font-size: 12px;
    display: block;
    margin-top: 5px;
}

.post-btn {
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
    margin-top: 10px;
}

.post-btn:hover {
    background-color: #27ae60;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.post-btn2 {
    padding: 12px 20px;
    background-color: #3498db;
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
    margin-top: 10px;
    text-align: center;
}

.post-btn2:hover {
    background-color:rgb(52, 119, 219);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.post-form-header {
    margin-bottom: 25px;
    display: flex;
    justify-content: center;
}

.post-icon {
    width: 70px;
    height: 70px;
    background-color: rgba(46, 204, 113, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
}

.post-icon svg {
    width: 35px;
    height: 35px;
    fill: var(--accent);
}

.alert {
    padding: 12px;
    border-radius: var(--border-radius);
    margin-bottom: 15px;
    font-size: 14px;
}

.alert-success {
    background-color: rgba(46, 204, 113, 0.1);
    color: var(--accent);
    border: 1px solid rgba(46, 204, 113, 0.3);
}

.alert-danger {
    background-color: rgba(231, 76, 60, 0.1);
    color: #e74c3c;
    border: 1px solid rgba(231, 76, 60, 0.3);
}

.alert ul {
    list-style-position: inside;
    padding-left: 0;
    margin: 5px 0 0;
}

.alert ul li {
    margin-top: 3px;
}

@media (max-width: 480px) {
    .post-container {
        padding: 25px 20px;
    }
    
    .post-form-group {
        padding: 15px;
    }
}
</style>


<div class="post-container">
    <div class="post-form-header">
        <div class="post-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 5.5c-5 0-9 4-9 9v7h18v-7c0-5-4-9-9-9zm0 4c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3z"/>
            </svg>
        </div>
    </div>
    <h1>Créer un post</h1>
    
    <div class="post-form-group">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-input-group">
                <label for="content">Contenu</label>
                <textarea id="content" name="content" rows="4" required>{{ old('content') }}</textarea>
            </div>
            
            <div class="form-input-group">
                <label for="image">Image (obligatoire)</label>
                <input type="file" id="image" name="image" required>
                <small class="input-help-text">Formats acceptés: jpeg, png, jpg, gif</small>
            </div>
            
            <button type="submit" class="post-btn">Publier</button>

            <a href="{{ url('/') }}" class="post-btn2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Accueil
            </a>
        </form>
    </div>
</div>