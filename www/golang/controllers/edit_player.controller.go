package controllers

import (
	"fmt"
	"net/http"
	"sql-project/helpers"
)



func Edit_player(res http.ResponseWriter, req *http.Request){
    // since this is a post request, grab all the form values
    err := req.ParseForm()
    if err != nil {
        fmt.Fprintf(res, err.Error())
        return
    }
    // edit the player by id 
    err = helpers.Edit_player_by_id(req)
    if err != nil {
        fmt.Fprintf(res, err.Error())
        return
    }
    // redirect to the /players?id=(edited player id)
    http.Redirect(res, req, "/player?id="+req.FormValue("Player_ID"), http.StatusSeeOther);
}
