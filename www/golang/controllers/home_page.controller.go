package controllers

import "net/http"


func Home_page(res_writer http.ResponseWriter, req * http.Request){
    // just redirect to the index.html file so as the fileServer kicks in
    http.Redirect(res_writer, req, "/index.html", http.StatusSeeOther);
}

