@extends('admin.layouts.app')
@section('content')

    <div>
        <h2>Album</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">Album</li>
    </ul>

    <div class="row">
        <div class="col-md-12">

          <div class="tile">
            <div class="tile-body">
                <a href="{{ route('album.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Create Album</a>
                <br>
                <br>
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @isset($albums)
                    @foreach ($albums as $album )

                    <tr>

                        <td>{{ $album->id }}</td>
                        <td>{{ $album->name }}</td>
                        <td>
                            <a href="{{ route('album.edit', $album->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>edit</a>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{ $album->id }}">delete</button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal_{{ $album->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Or Update Pictures</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('album.destroy', $album->id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>delete</button>
            </form>
        <a href="#" data-id="{{ $album->id }}" class="btn btn-warning moving">Move Pictures To Another Album</a>
            <br>
            <div class="col-md-10 move_open_{{ $album->id }}" style="display: none;">

                <form method="post" class="moving_data" action="{{ route('move_to_another_album',$album->id) }}">
                        <label>Choose Album You Want Picture To Move</label>

                        <select class="form-control" name="next_album">
                            <option value="#">Choose Album Name</option>

                            @foreach ($albums as  $pic )
                                @if ( $album->id != $pic->id )
                                <option value="{{ $pic->id }}">{{ $pic->name }}</option>
                                @endif

                            @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-success">Move</button>
                </form>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


                        </td>
                    </tr>

                      @endforeach

               @endisset

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@push('scripts')
    <!-- Data table plugin-->
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
    <script>

                $(".moving").on('click',function(){
                    var id = $(this).data('id');
                    $(".move_open_"+id).toggle();

                    $(".moving_data").on("submit",function(e){

                       e.preventDefault();
                       var action =  $(this).attr('action');
                       var data = $(this).serializeArray() ;
                            $.ajax({

                                    url:action,
                                    type: 'GET',
                                    dataType: 'JSON',
                                    data:{data: data},
                                    success:function(result){
                                        window.location.reload(true);

                                    }

                            });

                        });
                })

    </script>

@endpush
