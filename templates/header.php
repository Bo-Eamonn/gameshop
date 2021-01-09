
<body class="<?php echo $_SESSION['role']?>">
    <header>
        <div>
            <img src="/healthone_mvc/assets/images/logo.png" alt="Logo" id="logo">
            <div class="search-container">
                <form class="search-box">
                    <input type="text" placeholder="Zoeken" title="Zoek naar patienten" name="search" autocomplete="off">
                    <button type="submit"><i title="zoeken..." class="fa fa-search"></i></button>
                </form>
                <div class="result"></div>
            </div>
            <div>
                <form action="" method="post">
                    <input type="hidden" name="logout" value="0">
                    <input type="submit" id="logout" value="Uitloggen">
                </form>
            </div>
        </div>
    </header>