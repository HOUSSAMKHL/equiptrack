@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Intervenant</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Ajouter un Intervenant</h1>
    <form action="{{ route('intervenants.store') }}" method="POST">
        @csrf
        <div>
            <label for="nom_intervenant">Nom de l'Intervenant:</label>
            <input type="text" name="nom_intervenant" id="nom_intervenant" value="{{ old('nom_intervenant') }}" required>
        </div>
        <div>
            <label for="numero">Numéro:</label>
            <input type="text" name="numero" id="numero" value="{{ old('numero') }}" required>
        </div>
        <div>
            <label for="societe">Société:</label>
            <input type="text" name="societe" id="societe" value="{{ old('societe') }}" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
    <br>
    <a href="{{ route('intervenants.index') }}">Retour à la liste des intervenants</a>
</body>
</html>
@endsection