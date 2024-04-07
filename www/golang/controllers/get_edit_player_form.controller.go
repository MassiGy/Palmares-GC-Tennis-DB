package controllers

import "net/http"




func Get_edit_player_form(res http.ResponseWriter, req * http.Request){
    // basicaly redirect to the /edit_player.html so as the file server
    // send back the page to the user.
    http.Redirect(res, req, "/edit_player.html", http.StatusSeeOther);
}
