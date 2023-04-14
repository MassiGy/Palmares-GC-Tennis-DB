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
            </div>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="d-flex my-5 justify-content-between">
            <a href="/views/addPlayer.php" class="btn btn-primary">Insert New Player</a>
            <div  class="d-flex justify-content-between align-items-center" style="width:50%;" >
            <label for="limiter_form">Rows count: </label>
            <form action="/views/players.php" method="get" style="text-align: center;width: 80%" id="limiter_form" class="d-flex justify-content-around align-items-center">
                
                <div >

                    <input type="radio" name="limit" value="20" id="first_limit">
                    <label for="first_limit">20 rows</label>
                </div>

                <div>
                    <input type="radio" name="limit" value="50" id="second_limit">
                    <label for="second_limit">50 rows</label>
                </div>

                <div>
                    <input type="radio" name="limit" value="100" id="third_limit">
                    <label for="third_limit">100 rows</label>
                </div>

                <div>
                    <input type="radio" name="limit" value="10000" id="fourth_limit">
                    <label for="fourth_limit">All rows</label>
                </div>

                <button  class="btn btn-primary">Go &rAarr;</button>
            </form>
        </div>
        </div>





        <table class="table">
            <tbody>
                <?php include "../controllers/postgresql/renderPlayers.php"; ?>
            </tbody>
        </table>
        

    </div>

</body>

</html>