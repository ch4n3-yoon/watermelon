<?php

require_once __DIR__ . '/core.php';

?><div class="block">
    <h2 class="title">
        🎅 Music Chart (Top 100) 🎅</h2>
</div>
<div>
    <audio id="player" controls="controls" autoplay>
        <source id="mp3" src="#" type="audio/mp3" />
        Your browser does not support the audio element.
    </audio>
</div>
<table class="table">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Uploader</th>
        <th>Upload time</th>
        <th>❤</th>
        <th>Vote</th>
    </tr>
    <?php

    $offset = $_REQUEST['offset'] ? (int)$_REQUEST['offset'] : 0;
    $limit = $_REQUEST['limit'] ? (int)$_REQUEST['limit'] : 100;

    $music_list = getMusicChart($offset, $limit);
    for ($i = 0; $i < count($music_list); $i++) {
        echo "<tr><td>{$music_list[$i]['music_no']}</td>
              <td><a href='javascript:play(\"{$music_list[$i]['location']}\");'>{$music_list[$i]['music_title']}</a></td>
              <td>{$music_list[$i]['uploader']}</td><td>{$music_list[$i]['upload_time']}</td>
              <td>{$music_list[$i]['vote']}</td>
              <td><a href='javascript:vote({$music_list[$i]['music_no']});'>Like</a></td></tr>";
    }

    ?>
</table>
<script type="text/javascript">
    function play(location)
    {
        var audio = document.getElementById('player');
        $('#player').empty();
        $('#player').append($(`<source src='${location}'>`));
        audio.load();
        audio.play();
    }

    function vote(music_no)
    {
        $.post(`${location.protocol}//${location.host}/xmas/vote.php`, {
            music_no: music_no,
        }).done(function( data ) {
            alert(data);
            location.reload();
        });
    }
</script>