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
        $this->music = new MusicsongModel();
        $this->musicplaylist = new MusicplaylistModel();
        $this->musicbridge = new MusicbridgeModel();
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

        $newFileName = $file->getRandomName();

        $data = [
            'musicname'=> $file->getName(),
            'musicfileaddress'=> $newFileName
        ];

        $rules =[
            'MusicFile' =>[
                'uploaded[MusicFile]',
                'mime_in[MusicFile,audio/mpeg]',
                'max_size[MusicFile,10240]',
                'ext_in[MusicFile,mp3]'
            ]
        ];

        if ($this->validate($rules)) {
            if($file->isValid() && !$file->hasMoved()) {
                if ($file->move(FCPATH.'uploads\Music',$newFileName)) {
                    echo "File uploaded successfully";
                    $this->music->save($data);
                    var_dump($data);
                }
                else {
                echo $file->getErrorString().' '.$file->getError();
                }
            }
        }else{
            $data['validation'] = $this->validator;
            if ($data['validation']->getErrors()){
                $errorMessages = $data['validation']->getErrors();
                foreach ($errorMessages as $field=>$error) {
                    echo "Field: $field - Error: $error<b>";
                }
            }
            else{
                echo "No validation errors.";
            }
        }
        return redirect()->to('/')->withInput();
    }
    public function SearchMusic(){
        $searchLike = $this->request->getVar('search');
        if(!empty($searchLike)){
            $data=[
                'music'=>$this->music->like('musicname',$searchLike)->findAll(),
                'musicplaylist'=>$this->musicplaylist->findAll(),
            ];
            return view('Music/index',$data);
        }
        else{
            return redirect()->to('/');
        }
    }
    public function createPlaylist(){
        $data=[
          'musicplaylistname'=>$this->request->getVar('musicplaylistname'),
        ];
        $this->musicplaylist->save($data);
        return redirect()->to('/');
    }

    public function addToPlaylist(){
        $data= [
        'musicname_id'=>$this->request->getVar('id'),
        'musicplaylist_id'=>$this->request->getVar('musicplaylist_id'),
        ];
        
        
        $this->musicbridge->save($data);
        return redirect()->to('/');
    }
    
    public function musicplaylist($id= null){
        $db = \Config\Database::connect();
        $builder = $db->table('musicsongs');
        $builder->select(['musicsongs.id','musicsongs.musicname','musicsongs.musicfileaddress','musicplaylist.musicplaylist_id', 'musicplaylist.musicplaylistname']);
        $builder->join('musicbridge','musicsongs.id = musicbridge.musicname_id');
        $builder->join('musicplaylist','musicplaylist.musicplaylist_id = musicbridge.musicplaylist_id');

        if($id!== null){
            $builder->where('musicplaylist.musicplaylist_id',$id);
        }
        $query = $builder->get();
        $data=[
            'music' => $this->music->findAll(),
            'musicplaylist'=>$this->musicplaylist->findAll(),
        ];
        if($query){
            $data['music'] = $query->getResultArray();
        }
        else{
            echo "Query failed";
        }
        return view('Music\index',$data);
    }


}