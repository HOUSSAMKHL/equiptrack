<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Observation</title>
    @extends('layouts.app')

</head>
<body>
    <h1>Ajouter une Observation</h1>
    <form action="{{ route('observations.store') }}" method="POST">
        @csrf
        <div>
            <label for="description_panne">Description de la Panne:</label>
            <textarea name="description_panne" id="description_panne" required>{{ old('description_panne') }}</textarea>
        </div>
        <button type="submit">Ajouter</button>
    </form>
    <br>
    <a href="{{ route('observations.index') }}">Retour à la liste des observations</a>
</body>
</html>
