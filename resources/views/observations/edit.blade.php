@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Observation</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Modifier l'Observation</h1>
    <form action="{{ route('observations.update', $observation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="description_panne">Description de la Panne:</label>
            <textarea name="description_panne" id="description_panne" required>{{ old('description_panne', $observation->description_panne) }}</textarea>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
    <br>
    <a href="{{ route('observations.index') }}">Retour à la liste des observations</a>
</body>
</html>
@endsection