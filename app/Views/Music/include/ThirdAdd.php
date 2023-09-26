<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Select from playlist</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/addToPlaylist" method="post">
                    <!-- <p id="modalData"></p> -->
                    <input type="hidden" id="id" name="id">
                    <select  name="musicplaylist_id" class="form-control" >
                      <?php foreach ($musicplaylist as $playlist):?>
                        <option value="<?=$playlist['musicplaylist_id']?>">
                          <?=$playlist['musicplaylistname']?>
                        </option>
                        <?php endforeach;?>
                    </select>
                    <button class="btn btn-primary mt-2 d-flex" type="submit" name="Add" >Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>