
<body class="<?php echo $_SESSION['role']?>">
    <header>
        <div>
            <img src="/gameshop/assets/images/logo.png" onerror='this.src="ASSETS/images/placeholder/missing_img.png"' alt="Logo" id="logo">
            <div>
                <form action="" method="post">
                    <input type="hidden" name="logout" value="0">
                    <input type="submit" id="logout" value="Uitloggen">
                </form>
            </div>
        </div>
    </header>