@extends('layouts.app')

@section('content')<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Direction Régionale</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Modifier la Direction Régionale</h1>
    <form action="{{ route('direction_regionales.update', $directionRegionale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="Nom_DR">Nom de la Direction Régionale :</label>
        <input type="text" id="Nom_DR" name="Nom_DR" value="{{ $directionRegionale->Nom_DR }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('direction_regionales.index') }}">Retour à la liste des Directions Régionales</a>
</body>
</html>
@endsection
