package controllers

import (
	"fmt"
	"net/http"
	"sql-project/helpers"
)




func Get_all_players(res_writer http.ResponseWriter, req *http.Request){
    

    // first fetch all the player (limit defaults to 5 records)
    players_data, err:= helpers.Fetch_players(5);
    if err != nil {
        fmt.Fprintf(res_writer, err.Error())
        return
    }


    // initiate our response string 
    response := ""
    

    // for each player, get its string format
    for _,player := range players_data {
        response+="\n"
        response += helpers.Format_player_table_row(player);
    }


    fmt.Fprintf(res_writer, response);
}
