<!-- Menu -->
<style>
/* css menu-user */
.fixed-bottom {
    max-width: 780px;
    position: fixed;
    background: #387CF3 !important;
    bottom:0;
}
.icon {
    width: 40px;
    height: auto;
    margin-left: 20px;
    margin-right: 20px;
    padding-top:8px;
    padding-bottom:8px;
}
.active {
    background: #5699F4;
}
.navbar-nav{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:row;
}
.navbar{
    display:flex;
    justify-content:center;
    align-items:center;
    padding-top:0;
    padding-bottom:0;
}

li {
    transition: 0.3s;
}

li:hover {
    background: #5699F4;
}

</style>
<nav class="navbar fixed-bottom navbar-expand-lg mx-auto">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index-user.php"><img src="assets/home-icon.png" class="icon"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="explore.php"><img src="assets/explore-icon.png" class="icon"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><img src="assets/chat-icon.png" class="icon"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="settings-user.php"><img src="assets/setting-icon.png" class="icon"></a>
        </li>
    </ul>
</nav>

<script>
    function getCurrentFileName() {
    var url = window.location.href
    var pathname = new URL(url).pathname;
    var filename = pathname.substring(pathname.lastIndexOf("/") + 1);
    return filename;
    }
    // Example
    var url = getCurrentFileName()

    home = ['index-user.php'];
    explore = ['explore.php'];
    chat = [];
    settings = ['settings-user.php'];
    console.log(url)
    if(home.includes(url)){
        document.querySelector('.nav-link[href="index-user.php"]').classList.add('active');
    }else if(explore.includes(url)){
        document.querySelector('.nav-link[href="explore.php"]').classList.add('active');
    }else if(chat.includes(url)){
        document.querySelector('.nav-link[href="#"]').classList.add('active');
    }else if(settings.includes(url)){
        document.querySelector('.nav-link[href="settings-user.php"]').classList.add('active');
    }
</script>