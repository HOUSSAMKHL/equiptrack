@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Direction Régionale</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Ajouter une Direction Régionale</h1>
    <form action="{{ route('direction_regionales.store') }}" method="POST">
        @csrf
        <label for="Nom_DR">Nom de la Direction Régionale :</label>
        <input type="text" id="Nom_DR" name="Nom_DR" required>
        <button type="submit">Ajouter</button>
    </form>
    <a href="{{ route('direction_regionales.index') }}">Retour à la liste des Directions Régionales</a>
</body>
</html>
@endsection
