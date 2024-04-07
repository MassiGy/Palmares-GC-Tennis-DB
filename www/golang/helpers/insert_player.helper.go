package helpers

import (
	"net/http"
	"sql-project/database"
)


func Insert_player(req * http.Request)(error){
    // insert our data to the Player table to create a new record 
    rows, err:= database.Db_handler.Query( `INSERT INTO P16_Player 
        (   
            Player_First_Name,
            Player_Last_Name,
            Player_Gender,
            Player_Nationality,
            Player_ATP_Rank
        )
        VALUES 
        (
            ?, 
            ?, 
            ?, 
            ?, 
            ?
        );`,
        req.FormValue("Player_First_Name"),
        req.FormValue("Player_Last_Name"),
        req.FormValue("Player_Gender"),
        req.FormValue("Player_Nationality"),
        req.FormValue("Player_ATP_Rank"),
    );

    // defer the rows close call 
    defer rows.Close();

    // return error if any 
    return err
}

