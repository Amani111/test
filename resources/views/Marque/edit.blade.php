@extends('layouts.app')
@section('title',__('edit_Marque'))

@section('content')

<div class="col">
    <div class="card-wrapper">
      <!-- Custom form validation -->
      <div class="card ">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Edit Marque</h3>
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
          <form class="needs-validation" novalidate="" action="{{route('marque.update',$marque->id)}}" method="POST">
                @method('PATCH') 
                @csrf
                <div class="form-group row">
                    <label for="nom" class="col-md-2 col-form-label form-control-label">Nom du marque</label>
                    <div class="col-md-10">
                    <input type="text" class="form-control" id="nom" value="{{$marque->nom}}" name="nom" required="">
                    </div>
                  </div>
                  <button class="btn btn-success" type="submit">Mise à jour</button>
                  <a class="btn btn-danger" href="{{route('marque.index')}}">Annuler</a>
            </form>
        </div>
      </div>  
  </div>
@endsection