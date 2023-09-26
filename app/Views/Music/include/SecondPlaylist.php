<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="laylistmodal_title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <?php foreach ($musicplaylist as $playlsit):?><br>
              <a href="/musicplaylist/<?=$playlsit['musicplaylist_id']?>"><?=$playlsit['musicplaylistname']?></a><br>
              <?php endforeach;?>
        </div>
        <div class="modal-footer">
          <form action="/createPlaylist" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Playlist Name" aria-describedby="button-addon2" name="musicplaylistname">
              <input class="btn btn-primary" type="submit" value="Create Playlist">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>