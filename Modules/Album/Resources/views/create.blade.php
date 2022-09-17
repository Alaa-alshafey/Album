@extends('admin.layouts.app')

@section('content')

    <div>
        <h2>Album</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('album.index') }}">Album</a></li>
        <li class="breadcrumb-item">Create</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('album.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>Album Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-10 repeater">

                        <div data-repeater-list="albums">

                                <div class="col-md-12">
                                    <div data-repeater-item class='row'>

                                        <div class="col-md-10">
                                            <label>Photo Name</label>

                                            <input name="photo_name" placeholder="{{ __('Photo Name') }}" value="" type="text" class="form-control">
                                            <br>
                                            <label>Upload picture</label>
                                            <input name="pic_upload" placeholder="{{ __('front preview') }}"  type="file" class="form-control">
                                            <br>

                                        </div>
                                        <br>

                                        <div class="col-md-2">
                                            <input data-repeater-delete type="button" class="btn btn-danger" value="{{ __('Delete') }}"/>
                                        </div>
                                    </div>
                                </div>


                            <div class="col-md-12" >
                                <input data-repeater-create type="button" class="btn btn-success" value="{{ __('Add New Picture') }}"/>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Create</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha256-Q7mTUEY5760eea8mChztdSGuqg3BJuVfwxRgNBgYWKs=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function () {
        $('.repeater').repeater({
            // (Optional)
            // start with an empty list of repeaters. Set your first (and only)
            // "data-repeater-item" with style="display:none;" and pass the
            // following configuration flag
            initEmpty: true,
            // (Optional)
            // "show" is called just after an item is added.  The item is hidden
            // at this point.  If a show callback is not given the item will
            // have $(this).show() called on it.
            show: function () {
                $(this).slideDown();
            },
            // (Optional)
            // "hide" is called when a store clicks on a data-repeater-delete
            // element.  The item is still visible.  "hide" is passed a function
            // as its first argument which will properly remove the item.
            // "hide" allows for a confirmation step, to send a delete request
            // to the server, etc.  If a hide callback is not given the item
            // will be deleted.
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
        })
    });
</script>

@endpush
