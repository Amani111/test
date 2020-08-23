@extends('layouts.app')
@section('title',__('créer_vehicule'))

@section('content')

<div class="col">
    <div class="card-wrapper">
      <!-- Custom form validation -->
      <div class="card ">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Ajouter vehicule</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong></strong> {{ $error }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endforeach
                </ul>
            </div>
            <br /> 
            @endif
          </div>
          <form class="needs-validation" novalidate="" action="{{route('vehicule.store')}}" method="POST"> 
                @csrf
                <div class="form-group row">
                    <label for="nom" class="col-md-2 col-form-label form-control-label">Nom de vehicule</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="nom"  name="nom" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="modele" class="col-md-2 col-form-label form-control-label">Modele de vehicule</label>
                    <div class="col-md-10">
                        <select class="form-control" id="modele_id" name="modele_id">
                            <option value="0" selected disabled>Choisie un modele</option>
                            @foreach($modeles as $item)
                        <option value="{{$item->id}}">{{$item->nom}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="marque" class="col-md-2 col-form-label form-control-label">Marque de vehicule</label>
                    <div class="col-md-10">
                        <select class="form-control" id="marque_id" name="marque_id">
                            <option value="0" selected disabled>Choisie une marque</option>
                            @foreach($marques as $item)
                            <option value="{{$item->id}}">{{$item->nom}}</option>
                            @endforeach
                           
                          </select>
                    </div>
                </div>

                  <button class="btn btn-success" type="submit">Créer</button>
                <a class="btn btn-danger" href="{{route('vehicule.index')}}">Annuler</a>
            </form>
        </div>
      </div>  
  </div>
@endsection