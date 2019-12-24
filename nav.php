<h1 class="header">🎵 Watermelon 🎵</h1>
<nav>
    <ul class="menu">
        <li><a href="?p=main">Home</a></li>
        |
        <li><a href="?p=upload">Upload Music</a></li>
        |
        <li><a href="?p=list">Music List</a></li>
        |
        <li><a href="?p=chart">Chart</a></li>
        <?php
        if (!$login) { ?>
        |
        <li><a href="?p=signin">Sign In</a></li>
        |
        <li><a href="?p=signup">Sign Up</a></li>
        <?php } else { ?>
        |
        <li><a href="?p=signout">Sign out</a></li>
        <?php } ?>
    </ul>
</nav>