<body class="<?php echo $_SESSION['role']?>">
    <header>
        <h1><a href="index.php"><img src="/gameshop/assets/images/logo.png" onerror="this.src='/gameshop/assets/images/placeholder/missing_img.png'"></a></h1>
        <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Wat zoek je?">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search">zoek</i>
                </button>
            </div>
        </div>
        <div id="mySidenav" class="sideNav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">Home</a>
            <a href="#">Bekijk producten</a>
        </div>
        <div id="centreermenu">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
    </header>