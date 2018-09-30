<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Whishfile;

class WishfilesController extends Controller
{

    private $base = 'storage/';
    private $dir = 'files';

    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $fileCfg =[
            'path' => $this->getFullBasePath(),
            'dir' => $this->getDir(),
        ];

        $files = Whishfile::all();
        return view('whishfiles.index', compact('files', 'fileCfg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model = new Whishfile();

        $validator = $this->validate($request, [
            'file' => 'required|file',
        ]);

        $file = $request->file('file');

        $name =$file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $type = $this->getType($ext);

        $pathName = uniqid();

        if (Storage::putFileAs('/public/' . $this->getDir() . '/' . $type . '/', $file, $pathName . '.' . $ext)) {

             $model::create([
                'pathname' => $pathName,
                'name' => $name,
                'type' => $type,
                'extension' => $ext,
            ]);
        }

        return redirect(route('index'));

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* private methods */

    /**
     * Get type by extension
     * @param  string $ext Specific extension
     * @return string      Type
     */
    private function getType($ext)
    {
        if (in_array($ext, $this->image_ext)) {
            return 'image';
        }

        if (in_array($ext, $this->audio_ext)) {
            return 'audio';
        }

        if (in_array($ext, $this->video_ext)) {
            return 'video';
        }

        if (in_array($ext, $this->document_ext)) {
            return 'document';
        }
    }

    private function getDir()
    {
        return $this->dir;
    }

    private function getFullBasePath(){
        return url($this->base.$this->getDir());
    }

}
