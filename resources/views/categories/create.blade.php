<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une catégorie</title>
</head>
<body>
    <h1>Ajouter une catégorie</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Nom de la catégorie</label>
        <input type="text" id="name" name="name" required>
        
        <button type="submit">Ajouter</button>
    </form>

    <br>
    <a href="#">Retour à la liste des catégories</a>
</body>
</html>
