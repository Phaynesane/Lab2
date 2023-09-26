<!-- Modal -->
<div class="modal fade" id="AddMusicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Music</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/SaveMusic" method="post" enctype="multipart/form-data">
            <div class= "input-group mb-3">
                <input type="File" class="form-control col-6" id="inputMusicFile" name="MusicFile">
                <label class="input-group-text" for="inputMusicFile">Upload Music</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/" class="btn btn-secondary">Back</a>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>