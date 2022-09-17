<?php

namespace Modules\Album\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumPictures;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $albums = Album::get();

        return view('album::index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        return view('album::create');
    }



    public function store(Request $request)
    {
        $request->validate([

            "name"=>'required'

        ]);
        $data = [];
        $data['name'] = $request->name;
        $albumcreated = Album::create($data);
        if($albumcreated){

            if($request->albums != null){

                 $album_array = [];
                 $album_data = [];
                foreach($request->albums as $key => $album) {
                        $input = $album['pic_upload'];
                        $destinationPath = 'public/photos/Album_photo'; // path to save to, has to exist and be writeable
                        $file = $input->getClientOriginalName();// original name that it was uploaded with
                        $input->move($destinationPath,$file); // moving the file to specified dir with the original name



                    AlbumPictures::create([

                        'album_id'=> $albumcreated->id,
                        'picture_name'=> $album['photo_name'],
                        'picture_url'=> $file
                    ]);

                }

                session()->flash('success','Added Successfully');
                return redirect()->route('album.index');

            }else{

                return redirect()->back()->with('error','Pictures Can Not Be Empty');
            }
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('album::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $album = Album::where('id',$id)->with('pictures')->first();
        $pictures = AlbumPictures::where('album_id',$id)->get();

        return view('album::edit',compact('album','pictures'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */

    public function delete_album(){

        if(isset($_GET['data'])){

            $delete = AlbumPictures::findorfail($_GET['data']);
            $delete->delete();
             return response()->json([
                         'success'=>"success",

                 ]);
        }
    }
    public function update(Request $request, $id)
    {
        $album = Album::where('id',$id)->first();
        $data = [];
        $data['name'] = $request->name;
        $album_updated = $album->update($data);

        if($album_updated){
            $new_data = [];
            AlbumPictures::where('album_id',$id)->truncate();

            foreach ($request->albums as $key => $photo) {

                if(isset($photo['pic_upload'])){
                    $input = $photo['pic_upload'];
                    $destinationPath = 'public/photos/Album_photo'; // path to save to, has to exist and be writeable
                    $file = $input->getClientOriginalName();// original name that it was uploaded with
                    $input->move($destinationPath,$file); // moving the file to specified dir with the original name

                    $new_data['picture_url'] = $file;
                }else{

                    $file = $photo['img_updated'];

                }
                $new_data['picture_name'] = $photo['photo_name'];
                $new_data['album_id'] = $id;


                AlbumPictures::create([

                    'album_id'=> $id,
                    'picture_name'=> $photo['photo_name'],
                    'picture_url'=> $file
                ]);

            }
        }
        session()->flash('success','Added Successfully');
        return redirect()->route('album.index');




    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $album = Album::FindOrFail($id);
        $album->delete();
         AlbumPictures::where('album_id',$id)->truncate();

        session()->flash('success','Deleted Successfully');
        return response('Deleted Successfully');

    }
    public function move_to_another_album($id){

        $delete_album = Album::where('id',$id)->first();
        $delete_album->delete();
        $moving_pic_id = $_GET['data'][0]['value'];
        $old_id = AlbumPictures::where('album_id',$id)->get();
        foreach ($old_id as $key => $value) {
            $update = AlbumPictures::where('album_id',$value['id'])->first();
            $update->album_id = $moving_pic_id;
            $update->save();

        }
        session()->flash('success','Moved Successfully');
        return response('Moved Successfully');
    }
}
