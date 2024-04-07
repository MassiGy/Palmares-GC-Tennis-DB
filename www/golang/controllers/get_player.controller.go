package controllers

import (
	"fmt"
	"net/http"
	"sql-project/helpers"
	"strconv"
)



func Get_player(res http.ResponseWriter, req *http.Request){
    
    // retreive the id from the request params 
    id, err := strconv.Atoi(req.URL.Query().Get("id"));
    
    // make sure that there is an id
    if err != nil {
        fmt.Fprint(res, err.Error())
        return
    }
    
    // fetch the specific player that has this id
    player, err := helpers.Fetch_player_by_id(id);
    if err != nil {
        fmt.Fprint(res, err.Error())
        return
    }

    // create our response string
    response := ""

    // append to it the player string format
    response += helpers.Format_player_table_row(player)

    fmt.Fprintf(res, response)
}
