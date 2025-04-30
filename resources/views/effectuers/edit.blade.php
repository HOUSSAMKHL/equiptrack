@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Modifier l'opération effectuée</h1>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('effectuers.update', $effectuer->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <!-- Utilisateur -->
                        <div class="mb-3">
                            <label for="id_user" class="form-label">Utilisateur :</label>
                            <select name="id_user" id="id_user" class="form-select" required>
                                @foreach($utilisateurs as $utilisateur)
                                    <option value="{{ $utilisateur->id }}" {{ $utilisateur->id == $effectuer->id_user ? 'selected' : '' }}>
                                        {{ $utilisateur->nom_user }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Exemplaire -->
                        <div class="mb-3">
                            <label for="id_exemplaire" class="form-label">Exemplaire :</label>
                            <select name="id_exemplaire" id="id_exemplaire" class="form-select" required>
                                @foreach($equipementsTracables as $equipement)
                                    <option value="{{ $equipement->id }}" {{ $equipement->id == $effectuer->id_exemplaire ? 'selected' : '' }}>
                                        {{ $equipement->equipementIdentifie->nom_equipement }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <!-- Opération -->
                        <div class="mb-3">
                            <label for="id_operation" class="form-label">Opération :</label>
                            <select name="id_operation" id="id_operation" class="form-select" required>
                                @foreach($operations as $operation)
                                    <option value="{{ $operation->id }}" {{ $operation->id == $effectuer->id_operation ? 'selected' : '' }}>
                                        {{ $operation->nom_operation }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Date de l'opération -->
                        <div class="mb-3">
                            <label for="date_operation" class="form-label">Date de l'opération :</label>
                            <input type="datetime-local" name="date_operation" id="date_operation" 
                                   class="form-control" 
                                   value="{{ \Carbon\Carbon::parse($effectuer->date_operation)->format('Y-m-d\TH:i') }}" 
                                   required>
                        </div>
                        
                        <!-- Durée -->
                        <div class="mb-3">
                            <label for="durée" class="form-label">Durée (HH:MM:SS) :</label>
                            <input type="time" name="durée" id="durée" step="1" 
                                   class="form-control" 
                                   value="{{ $effectuer->durée }}" 
                                   required>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="{{ route('effectuers.index') }}" class="btn btn-secondary me-md-2">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection