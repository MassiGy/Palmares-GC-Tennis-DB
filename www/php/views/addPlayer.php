<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body class="">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/views/home.php">
                <img src="../assets/images/Logo/GS_Tennis.png" alt="Bootstrap" width="80" height="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="players.php">Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="grandSlams.php">Grand Slam</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Grand Slam" aria-label="Search">
                    <input class="form-control me-2" type="search" placeholder="Player" aria-label="Search">
                    <input class="form-control me-2" type="search" placeholder="ATP Rank" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">
                        <img src="../assets/images/Logo/zoom-lens.png" alt="Bootstrap" width="40" height="40">
                    </button>
                </form>
            </div>
        </div>
    </nav>



    <form action="" class="mt-5" style="width:60%; margin:auto">
        <div class="mt-4 row">
            <label for="firstName" class="col-form-label">First Name</label>

            <input type="text" class="form-control" id="firstName">
        </div>
        <div class=" mt-4 row">
            <label for="lastName" class="col-form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName">
        </div>


        <div class="mt-4 row">
            <label for="playerGender" class=" col-form-label">Player Gender</label>
            <select class="form-select" aria-label="Default select example">
                <option value="1">Man</option>
                <option value="2">Woman</option>
            </select>

        </div>


        <div class="mt-4 row">
            <label for="playerNationality" class="col-form-label">Player Nationality</label>
            <input type="text" class="form-control" id="playerNationality">
        </div>
        <div class=" mt-4 row">
            <label for="playerRank" class=" col-form-label">Player ATP Rank</label>

            <input type="text" class="form-control" id="playerRank">
        </div>
        <div class="d-flex justify-content-center">
            <button class="mt-5 btn btn-primary">Insert Player</button>
        </div>
    </form>
</body>

</html>