package controllers

import (
	"fmt"
	"net/http"
	"sql-project/helpers"
)



func Get_all_grand_slams(res_writer http.ResponseWriter, req *http.Request){
    
    // get all of our slams data(limit defaults to 5)
    grand_slams_data, err := helpers.Fetch_grand_slams(5);
    if err != nil {
        fmt.Fprintf(res_writer, err.Error())
    }

    // create our response string
    response := ""

    // iterate through our grand_slams_data array and 
    // get the format for each row and append it to 
    // the response string
    for _,row := range grand_slams_data {
        response += "\n"
        response += helpers.Format_grand_slam_table_row(row) 
    }


    fmt.Fprintf(res_writer, response)
}
