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

<body class="container my-5">

    <form action="" class=" mt-5">
        <div class="mb-3 mt-5 row">
            <label for="firstName" class="col-sm-2 col-form-label">First Name</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstName">
            </div>
        </div>
        <div class="mb-3 mt-5 row">
            <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastName">
            </div>
        </div>


        <div class="mb-3 mt-5 row">
            <label for="playerGender" class="col-sm-2 col-form-label">Player Gender</label>

            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                    <option value="1">Man</option>
                    <option value="2">Woman</option>
                </select>
            </div>
        </div>


        <div class="mb-3 mt-5 row">
            <label for="firstName" class="col-sm-2 col-form-label">Player Nationality</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="playerNationality">
            </div>
        </div>
        <div class="mb-3 mt-5 row">
            <label for="playerRank" class="col-sm-2 col-form-label">Player ATP Rank</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="playerRank">
            </div>
        </div>

        <button class="mt-5 btn btn-primary">Insert Player</button>
    </form>
</body>

</html>