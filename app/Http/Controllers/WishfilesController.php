<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Wishfile;
use App\Services\FileManager;

class WishfilesController extends Controller
{

    private $model;
    private $fileManger;

    public function __construct(){
        $this->fileManager = app(FileManager::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $files = Wishfile::all();
        return view('wishfiles.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('wishfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $this->validate($request, [
            'file' => 'required|file',
        ]);

        $this->fileManager->setFile($request->file('file'));

        if($this->fileManager->putFileAs()){

            $model = new Wishfile();
            $model::create($this->fileManager->getDataToStore());

        }

        return redirect(route('wishfiles.list'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $id = $request->input('file');
        $wishfile = Wishfile::find($id);

        if(empty($wishfile)){
            redirect()->back();
        }

        $file = [
            'url' => $this->fileManager->getFileUrl($wishfile->type . '/' . $wishfile->pathname . '.' . $wishfile->extension)
        ];

        return view('wishfiles.show', compact('file'));

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





}
