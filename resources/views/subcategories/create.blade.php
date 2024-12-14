<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une sous-catégorie</title>
</head>
<body>
    <h1>Ajouter une sous-catégorie</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('subcategories.store') }}" method="POST">
        @csrf

        <label for="name">Nom de la sous-catégorie</label>
        <input type="text" id="name" name="name" required>

        <label for="category_id">Catégorie mère</label>
        <select id="category_id" name="category_id" required>
            <option value="">Choisir une catégorie</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Ajouter</button>
    </form>

    <br>
    <a href="#">Retour à la liste des catégories</a>
</body>
</html>
