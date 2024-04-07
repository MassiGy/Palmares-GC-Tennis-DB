package helpers

import (
	"errors"
	"sql-project/database"
)




func Fetch_player_by_id(id int)(database.Player, error){
    // fetch the correct player using the id 
    row, err := database.Db_handler.Query("SELECT * FROM P16_Player WHERE Player_ID = ?", id);
    if err != nil {
        return database.Player{}, err
    }

    // make sure that row has an element inside it
    if row.Next() != true {
        return database.Player{}, errors.New("Invalid id.")
    }

    // defer the row close call
    defer row.Close()

    // otherwise, scan the player data to a new database.Player object
    player := database.Player{}
    row.Scan(
        &(player.Player_ID),
        &(player.Player_First_Name),
        &(player.Player_Last_Name),
        &(player.Player_Gender),
        &(player.Player_Nationality),
        &(player.Player_ATP_Rank),
    )
     
    return player, nil 
}
