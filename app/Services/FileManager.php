<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileManager{

    /*
        Description des chemins
        - lors de l'upload le fichier doit se trouver ici :
            /storage/app/public/files/document/5bdd764e06b53.pdf
        - Lors de la navigation le chemin retourné doit être :
            http://192.168.33.10/storage/files/document/5bdd764e06b53.pdf
        - Le chemin stocké dans la base de donnée doit être ce dernier

    */

    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt'];
    private $torrent = ['doc', 'docx', 'pdf', 'odt'];

    private $file;
    private $name;
    private $ext;
    private $type;
    private $pathName;

    private $storageDisk = 'public';

    private $ds = DIRECTORY_SEPARATOR;

    protected $dir = 'files';

    public function __construct(){

    }

    public function setFile(UploadedFile $file){

        $this->file = $file;
        $this->name = $this->file->getClientOriginalName();;
        $this->ext = $this->file->getClientOriginalExtension();
        $this->type = $this->getType($this->ext);
        $this->pathName = uniqid();

    }

    /**
     * Return array data to save in  model
    **/
    public function getDataToStore(){

        return [
           'pathname' => $this->pathName,
           'name' => $this->name,
           'type' => $this->type,
           'extension' => $this->ext,
       ];

    }

    public function putFileAs(){

        return Storage::disk($this->storageDisk)->putFileAs(
            $this->pathToStore(),
            $this->file,
            $this->pathName . '.' . $this->ext

        );

    }

    public function getFileUrl($fileUrl){
        return Storage::disk($this->storageDisk)->url( $this->dir . $this->ds . $fileUrl);
    }

    public function getFileIfExist($fileName){
        return Storage::disk($this->storageDisk) . $this->endPath() . $fileName;
    }

    public function getDir(){
        return $this->dir;
    }

    /* private methods */
    /**
     * Return path to Store Folder
    **/
    private function pathToStore(){
        return $this->dir . $this->ds . $this->type;
    }

    private function endPath(){
        return $this->ds . $this->getDir() . $this->ds . $this->type . $this->ds;
    }

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

        if (in_array($ext, $this->torrent_ext)) {
            return 'torrent';
        }

        return 'undefined';

    }

}
