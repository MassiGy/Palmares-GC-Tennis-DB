package helpers

import (
	"errors"
	"sql-project/database"
)


func Fetch_players(limit int)([]database.Player, error){
    
    // if limit is not positive, fire up an error.
    if limit <= 0 {
        return make([]database.Player, 0), errors.New("Limit should be positive.");
    }

    // create our return array
    result := make([]database.Player, limit);

    

    // otherwise,
    // first of all, query our data
    rows, err:= database.Db_handler.Query("SELECT * FROM P16_Player LIMIT ?; ", limit)
    if err != nil {
        return result, err
    } 

    // defer the close call for the byte stream
    defer rows.Close();

    
    // traverse our bytes stream and scan each row 
    i := 0;
    for rows.Next(){
        // scan the current row to the i'th slot of our result array
        rows.Scan(
            &(result[i].Player_ID),
            &(result[i].Player_First_Name),
            &(result[i].Player_Last_Name),
            &(result[i].Player_Gender),
            &(result[i].Player_Nationality),
            &(result[i].Player_ATP_Rank),
        );

        // inc i 
        i++;
    }



    return result, nil
}
