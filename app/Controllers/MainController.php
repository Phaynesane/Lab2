<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MusicbridgeModel;
use App\Models\MusicplaylistModel;
use App\Models\MusicsongModel;

class MainController extends BaseController
{
    private $music;
    private $musicplaylist;
    private $musicbridge;

    function __construct()
    {
        $this->music = new MusicbridgeModel();
        $this->music = new MusicplaylistModel();
        $this->musicbridge = new MusicsongModel();
    }
    
    public function index()
    {
        $data=[
            'music'=>$this->music->findAll(),
            'musicplaylist'=>$this->musicplaylist->findAll(),
        ];
        return view('Music/index',$data);
    }

    public function UploadMusic()
    {
        $file=$this->request->getFile('MusicFile');
        var_dump($file);

        $newFileName = $file->getName();

        $data = [
            'musicname'=> $file->getName(),
            'musicfileaddress'=> $newFileName
        ];

        $rules =[
            'MusicFile' =>[
                'uploaded[MusicFile]',
                'mine_in[MusicFile,audio/mpeg]',
                'max_size[MusicFile,10240]',
                'ext_in[MusicFile,mp3]'
            ]
        ];

        if ($this->validate($rules)) {
            if($file->isValid() &&!$file->hasMoved()) {
                if ($file->move(FCPATH.'uploads\Music',$newFileName)) {
                    echo "File uploaded successfully";
                    $this->music->save($data);
                }
                else {
                echo $file->getErrorString().' '.$file->getError();
                }
            }
        }else{
            $data['validation'] = $this->validator;
        }
        return redirect()->to('/UploadMusic');
    }

}
