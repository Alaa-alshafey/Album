    <a href="{{ route('album.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>edit</a>

    <form action="{{ route('album.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>delete</button>
    </form>
