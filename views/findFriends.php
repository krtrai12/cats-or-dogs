    <body>
        <?php require_once('/var/www/html/searchdb.php')?>
        <header>
            <h1>FIND FRIENDS</h1>
        </header>
        <div>
            <p>Looking for your friends on Cats-or-Dogs? Just search for the username here, and see if they're on this website.
        </div>
        <div class="col-sm-4">
            <div class="dropdown">
                <input type="text" autocomplete="off" class="form-control" data-toggle="dropdown" id="people" method="get" name="peopleForm" placeholder="Search people" autofocus>
                <ol class="dropdown-menu" id="people-dropdown"></ol>
            </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="../views/searchforfriends.js"></script>