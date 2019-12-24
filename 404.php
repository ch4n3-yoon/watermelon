<div class="block">
    <img class="nyancat" src="./img/nyancat.gif">
    <p class="notfound">404 Not Found</p>
</div>
<style>
    .block {
        text-align: center;
    }

    .nyancat {
        width: 44%;
        margin-bottom: 1em;
    }

    .notfound {
        font-style: italic;
        font-weight: bold;
        font-size: 2em;
    }
</style>
<?php
header("HTTP/1.0 404 Not Found");
?>