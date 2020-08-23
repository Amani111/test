@extends('layouts.app')
@section('title',__('Modele-vehicule'))

@section('content')
 <!-- Dark table -->
 <div class="row mt-5">
    <div class="col">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <div class="row">
            <h3 class="text-white mb-0">Liste des marques vehicule</h3>
            <div class="col-lg-9  col-5 text-right">
            <a href="{{route('marque.create')}}" class="btn btn-sm btn-neutral ">New</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-flush tablemarque">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom de marque</th>
                <th scope="col">Date de creation</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($marques as $item)
              <tr>
                <td>
                  {{$item->id}}
                </td>
                <td>
                  {{$item->nom}}
                </td>
                <td>
                  {{$item->created_at}}
                </td>
                <td>
                  <a href="" class="button delbtn"   data-id="{{$item->id}}" data-original-title="delete marque">
                    <i class="fas fa-trash"></i>
                  </a>
                  <a  href="{{route('marque.edit', $item->id)}}"><i class="fas fa-user-edit"></i></a>
                </td>
              </tr> 
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    
@endsection
@push('scripts')
<script>
 $(document).on('click', '.delbtn', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);
    swal.fire({
      title: 'AÊtes-vous sûr de vouloir supprimer ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Oui, supprimer!'
      
        })   
         .then(function (e){
          if (e.value === true) {
              var i = $(this).data('id'); 

      var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: 'marque/'+id,
            type: 'post',
            data: {
                "_token"    : token,
                _method: 'delete'
            },
            dataType: "json",
            success: function (results) {
              swal.fire("Supprimé ave succées", {icon: "success",});
                            location.reload(true); 
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("Error: ");
            }
        });
          }    
    });
    });
</script>
    
@endpush