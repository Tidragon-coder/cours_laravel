<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Utilisateur</title>
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
        
        .profile-header {
            margin-bottom: 30px;
        }
        
        h1 {
            color: var(--text-primary);
            font-size: 24px;
            margin: 15px 0;
            font-weight: 600;
        }
        
        .profile-photo-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 25px;
        }
        
        .profile-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--primary);
            box-shadow: 0 4px 15px rgba(142, 68, 173, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #2a2a2a;
        }
        
        .profile-photo:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(142, 68, 173, 0.5);
        }
        
        .no-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #2a2a2a;
            color: var(--text-secondary);
            font-size: 16px;
            border: 3px solid var(--primary);
        }
        
        .upload-overlay {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: var(--primary);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }
        
        .upload-overlay:hover {
            background-color: var(--primary-hover);
        }
        
        .upload-icon {
            width: 20px;
            height: 20px;
            fill: white;
        }
        
        .profile-info {
            margin-bottom: 25px;
            text-align: left;
            background-color: rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: var(--border-radius);
        }
        
        .info-item {
            margin: 12px 0;
            display: flex;
            align-items: baseline;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--primary);
            margin-right: 10px;
            min-width: 100px;
        }
        
        .info-value {
            color: var(--text-secondary);
            flex-grow: 1;
            word-break: break-word;
        }
        
        .actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        
        .btn {
            padding: 12px 20px;
            background-color: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius);
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 120px;
        }
        
        .btn-edit {
            background-color: var(--secondary);
        }
        
        .btn-logout {
            background-color: #444;
        }
        
        .btn-home {
            background-color: var(--accent);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .btn-edit:hover {
            background-color: #2980b9;
        }
        
        .btn-logout:hover {
            background-color: #333;
        }
        
        .btn-home:hover {
            background-color: #27ae60;
        }
        
        .btn svg {
            margin-right: 8px;
            width: 16px;
            height: 16px;
        }
        
        /* Upload form styling */
        .upload-form {
            display: none;
            margin-top: 20px;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: var(--border-radius);
        }
        
        .file-input-wrapper {
            position: relative;
            margin: 15px auto;
            max-width: 250px;
        }
        
        .file-input {
            opacity: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            cursor: pointer;
            z-index: 2;
        }
        
        .file-input-label {
            display: block;
            background-color: #2a2a2a;
            color: var(--text-secondary);
            padding: 12px 15px;
            border-radius: var(--border-radius);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            border: 1px dashed #444;
        }
        
        .file-input-label:hover {
            background-color: #333;
            color: var(--text-primary);
        }
        
        .btn-submit {
            background-color: var(--accent);
            margin-top: 10px;
        }
        
        .btn-submit:hover {
            background-color: #27ae60;
        }
        
        .btn-cancel {
            background-color: #e74c3c;
            margin-top: 10px;
        }
        
        .btn-cancel:hover {
            background-color: #c0392b;
        }
        
        .upload-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 25px 20px;
            }
            
            .profile-info {
                padding: 15px;
            }
            
            .info-item {
                flex-direction: column;
            }
            
            .info-label {
                margin-bottom: 5px;
            }
            
            .actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
    <script>
        function toggleUploadForm() {
            const form = document.getElementById('uploadForm');
            if (form.style.display === 'block') {
                form.style.display = 'none';
            } else {
                form.style.display = 'block';
            }
        }
        
        function updateFileName() {
            const input = document.getElementById('profilePicture');
            const label = document.getElementById('fileLabel');
            if (input.files.length > 0) {
                label.textContent = input.files[0].name;
            } else {
                label.textContent = 'Choisir une image';
            }
        }
        
        function cancelUpload() {
            document.getElementById('uploadForm').style.display = 'none';
            document.getElementById('profilePicture').value = '';
            document.getElementById('fileLabel').textContent = 'Choisir une image';
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <div class="profile-photo-container">
                @if(auth()->user()->profile_picture)
                <img class="profile-photo" src="{{ asset('storage/' . str_replace('\\', '/', $user->profile_picture)) }}" alt="Photo de profil">
                @else
                <div class="no-photo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                @endif
                <div class="upload-overlay" onclick="toggleUploadForm()">
                    <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 5v14M5 12h14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
                    </svg>
                </div>
            </div>
            <h1>{{ $user->username }}</h1>
        </div>
        
        <div class="profile-info">
            <div class="info-item">
                <span class="info-label">Email :</span>
                <span class="info-value">{{ $user->email }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Bio :</span>
                <span class="info-value">{{ $user->bio ?? 'Aucune bio' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Membre depuis :</span>
                <span class="info-value">{{ $user->created_at->format('d/m/Y') }}</span>
            </div>
        </div>
        
        <div id="uploadForm" class="upload-form" style="display: none;">
            <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="file-input-wrapper">
                    <input type="file" name="profile_picture" id="profilePicture" class="file-input" onchange="updateFileName()">
                    <label for="profilePicture" id="fileLabel" class="file-input-label">Choisir une image</label>
                </div>
                <div class="upload-actions">
                    <button type="submit" class="btn btn-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                        Envoyer
                    </button>
                    <button type="button" class="btn btn-cancel" onclick="cancelUpload()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        Annuler
                    </button>
                </div>
            </form>
        </div>
        
        <div class="actions">
            <a href="{{ url('/') }}" class="btn btn-home">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Accueil
            </a>
            <a href="{{ route('auth.edit') }}" class="btn btn-edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                Modifier
            </a>
            <a href="{{ route('logout') }}" class="btn btn-logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                Déconnexion
            </a>
        </div>
    </div>
</body>
</html>