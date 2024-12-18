<!-- resources/views/lost-items/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclarer un objet perdu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, textarea, select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Déclarer un objet perdu</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form action="{{ route('lost-items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name">Nom de l'objet</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>

            <label for="description">Description de l'objet</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>

            <label for="date_lost">Date de la perte</label>
            <input type="date" id="date_lost" name="date_lost" value="{{ old('date_lost') }}" required>

            <label for="place">Lieu de la perte</label>
            <input type="text" id="place" name="place" value="{{ old('place') }}" required>

            <label for="category_id">Catégorie</label>
            <select id="category_id" name="category_id" required>
                <option value="">Choisir une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label for="subcategory_id">Sous-catégorie</label>
            <select id="subcategory_id" name="subcategory_id">
                <option value="">Choisir une sous-catégorie</option>
            </select>

            <label for="phone_number">Numéro de téléphone</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>

            <label for="photo">Photo (optionnel)</label>
            <input type="file" id="photo" name="photo">

            <button type="submit">Déclarer l'objet perdu</button>
        </form>
    </div>

    <script>
        document.getElementById('category_id').addEventListener('change', function() {
            const categoryId = this.value;
            const subcategorySelect = document.getElementById('subcategory_id');
            subcategorySelect.innerHTML = '<option value="">Choisir une sous-catégorie</option>';

            if (categoryId) {
                fetch(`/api/subcategories/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subcategorySelect.appendChild(option);
                        });
                    });
            }
        });
    </script>

</body>
</html>
