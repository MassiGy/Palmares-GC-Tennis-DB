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
            </div>
        </div>
    </nav>

    <form action="/controllers/postgresql/editGrandSlam.php" method="post" class="mt-5" style="width:60%; margin:auto">
        <div class="mt-4 row">
            <label for="gcName" class="col-form-label">Grand Slam Name</label>
            <input type="text" name="gc_id" class="form-control" id="gcId" value="<?php echo $_POST["gc_id"];  ?>" hidden>
            <input type="text" name="gc_name" class="form-control" id="gcName" value="<?php echo $_POST["gc_name"];  ?>">
        </div>
        <div class=" mt-4 row">
            <label for="gcLocation" class="col-form-label">Location</label>
            <input type="text" name="gc_location" class="form-control" id="gcLocation" value="<?php echo $_POST["gc_location"];  ?>">
        </div>


        <div class="mt-4 row">
            <label for="gcGround" class=" col-form-label">Ground</label>
            <select class="form-select" name="gc_ground">
                <option value="<?php echo $_POST["gc_ground"] ?>" selected="selected"><?php echo $_POST["gc_ground"] ?></option>
                <option value="Grass">Grass</option>
                <option value="Hard">Hard</option>
                <option value="Clay">Clay</option>
            </select>

        </div>

        <div class="mt-4 row">
            <label for="gcYear" class="col-form-label">Creation year</label>
            <input type="text" name="gc_creation" value="<?php echo $_POST["gc_creation"];  ?>" class="form-control" id="gcYear">
        </div>

        <div class="d-flex justify-content-center">
            <button name="edit_submit" type="submit" class="mt-5 btn btn-primary">Edit</button>
        </div>
    </form>
</body>

</html>