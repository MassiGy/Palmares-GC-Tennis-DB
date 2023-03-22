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

<body>
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
                        <a class="nav-link active" aria-current="page" href="/views/players.php">Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/views/grandSlams.php">Grand Slam</a>
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

    <div class="container mt-5">

        <div class="d-flex my-5">
            <a href="/views/addPlayer.php" class="btn btn-primary">Insert New Player</a>

        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="player_info d-flex justify-content-between"  style="width:60%;">
                    <h6>Massiles</h6>
                    <h6>GHERNAOUT</h6>
                    <h6>Man</h6>
                    <h6>Algerian</h6>
                </div>
                <div class="player_links">
                    <a href="" class="btn btn-warning mx-3">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </div>
            </li>
            <li class="list-group-item">Player 2</li>
            <li class="list-group-item">Player 3</li>
            <li class="list-group-item">Player 4</li>
            <li class="list-group-item">Player 5</li>
        </ul>
    </div>

</body>

</html>