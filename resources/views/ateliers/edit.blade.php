@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Atelier</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Modifier l'Atelier</h1>
    <form action="{{ route('ateliers.update', $atelier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="numero_atelier">Numéro de l'atelier :</label>
            <input type="text" name="numero_atelier" id="numero_atelier" value="{{ $atelier->numero_atelier }}" required>
        </div>
        <div>
            <label for="id_etablissement">Établissement :</label>
            <select name="id_etablissement" id="id_etablissement" required>
                @foreach ($Efp as $etablissement)
                    <option value="{{ $etablissement->id }}" {{ $atelier->id_etablissement == $etablissement->id ? 'selected' : '' }}>
                        {{ $etablissement->nom_etablissement }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Mettre à jour</button>
        </div>
    </form>
</body>
</html>
@endsection