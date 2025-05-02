@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un EFP</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Ajouter un EFP</h1>
    <form action="{{ route('efps.store') }}" method="POST">
        @csrf
        <label for="nom_etablissement">Nom de l'établissement :</label>
        <input type="text" name="nom_etablissement" id="nom_etablissement" required><br><br>

        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" id="adresse" required><br><br>

        <label for="numero">Numéro :</label>
        <input type="text" name="numero" id="numero" required><br><br>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="id_complexe">Complexe :</label>
        <select name="id_complexe" id="id_complexe" required>
            @foreach($complexes as $complexe)
                <option value="{{ $complexe->id }}">{{ $complexe->nom_complexe }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Ajouter</button>
    </form>

</body>
</html>
@endsection