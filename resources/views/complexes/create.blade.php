@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Complexe</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Ajouter un Complexe</h1>
    <form action="{{ route('complexes.store') }}" method="POST">
        @csrf
        <label for="nom_complexe">Nom du Complexe</label>
        <input type="text" id="nom_complexe" name="nom_complexe" required>
        <br>

        <label for="id_DR">Direction Régionale</label>
        <select id="id_DR" name="id_DR" required>
            @foreach($directionRegionale as $dr)
                <option value="{{ $dr->id }}">{{ $dr->Nom_DR }}</option>
            @endforeach
        </select>
        <br>

        <button type="submit">Créer</button>
    </form>

    <a href="{{ route('complexes.index') }}">Retour à la liste des complexes</a>
</body>
</html>
@endsection
