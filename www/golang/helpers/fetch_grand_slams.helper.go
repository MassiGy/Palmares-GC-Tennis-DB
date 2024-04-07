package helpers

import (
	"errors"
	"sql-project/database"
)


func Fetch_grand_slams(limit int)([]database.Grand_slam, error){
    
    // if limit is not positive, fire up an error.
    if limit <= 0 {
        return make([]database.Grand_slam, 0), errors.New("Limit should be positive.");
    }

    // create our return array
    result := make([]database.Grand_slam, limit);

    
    // otherwise,
    // first of all, query our data
    rows, err:= database.Db_handler.Query("SELECT * FROM P16_Grand_Slam LIMIT ?; ",limit)
    if err!= nil {
        return result, err
    } 

    // defer the close call for the byte stream
    defer rows.Close()

    
    // iterate through the rows byte stream and scan each row 
    // to right slot in our result array.
    i := 0;
    for rows.Next(){
        // scan the fields to the i'th object in result
        rows.Scan(
            &(result[i].GC_ID),
            &(result[i].GC_Name),
            &(result[i].GC_Location),
            &(result[i].GC_Ground),
            &(result[i].GC_Creation),
        )
        // inc i
        i++;
    }

    return result, nil
}

