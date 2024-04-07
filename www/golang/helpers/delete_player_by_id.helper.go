package helpers

import "sql-project/database"



func Delete_player_by_id(id int)(error){
    // delete the player using the id 
    rows, err := database.Db_handler.Query("DELETE FROM P16_Player WHERE Player_ID = ? ;", id)
    
    // defer the rows close call
    defer rows.Close()

    // return err if any 
    return err
}
