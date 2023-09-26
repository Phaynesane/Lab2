<?php include 'include/First.php'; ?>
<body>

    <?php include 'include/ThirdAdd.php';?>
    <?php include 'include/AddMusic.php';?>
    <?php include 'include/SecondPlaylist.php';?>

    <form action="/SearchMusic" method="get">
        <input type="search" name="search" placeholder="Search">
        <input type="submit" value="Search">
    </form>
    <h1>Music Playlists</h1>
    <a class="btn btn-primary" href="/">All Songs</a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">My Playlist</button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=#AddMusicModal>Add Music</button>

    <audio id="audio" controls></audio>
    <ul id="playlist">
        <?php foreach ($music as $musics) :?>
            <li data-src="<?="base_url"('/uploads/music/'.$musics['musicfileaddress']);?>">
            <?= $musics['musicname'];?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="setMusicID('<?= $musics['id'];?>')"> + </button>
            </li>
        <?php endforeach;?>
    </ul>
    <?php include 'include/Fourth.php';?>
</body>