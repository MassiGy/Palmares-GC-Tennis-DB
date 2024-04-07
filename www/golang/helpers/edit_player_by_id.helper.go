package helpers

import (
	"net/http"
	"sql-project/database"
)



func Edit_player_by_id(req *http.Request)(error){
    
    // edit the edit player 
    rows, err := database.Db_handler.Query(
        `UPDATE P16_Player 
        SET Player_First_Name = ?, 
        Player_Last_Name = ?, 
        Player_Gender = ?, 
        Player_Nationality = ?, 
        Player_ATP_Rank = ? 
        WHERE Player_ID = ?;`, 
        req.FormValue("Player_First_Name"),
        req.FormValue("Player_Last_Name"),
        req.FormValue("Player_Gender"),
        req.FormValue("Player_Nationality"),
        req.FormValue("Player_ATP_Rank"),
        req.FormValue("Player_ID"),
    );

    // defer the row byte stream close call
    defer rows.Close();

    // if err then return it, otherwise return nil  
    return err  
}
