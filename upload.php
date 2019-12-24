<div class="block">
    <h2 class="title">
        🎅 Upload your music 🎅</h2>
    <form action="?p=upload.ok" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="country">Title</label>
            </div>
            <input class="form-control" name="title" type="text" placeholder="Music title">
        </div>
        <div class="input-group mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file" id="inputGroupFile01"
                           aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose your music file (Only mp3 and wav are allowed.)</label>
                </div>
            </div>
        </div>
        <p><span style="color: red;">*</span> After an hour, the uploaded music will be automatically deleted.
            (Only file will be deleted)
            <br>
            <span style="color: red;">*</span> 1시간이 지나면 업로드한 음악은 자동으로 삭제됩니다. (파일만 삭제됩니다)
        </p>
        <div class="input-group mb-1">
            <div class="float-right">
                <input type="submit" class="btn btn-primary" value="Upload">
            </div>
        </div>
    </form>
</div>