package helpers

import (
	"reflect"
	"sql-project/database"
	"strconv"
)



func Format_grand_slam_table_row(row database.Grand_slam)(string){

    // declare our response string
    response := "" 

    // get all the fields of the grand_slam table
    fields := reflect.VisibleFields(reflect.TypeOf(database.Grand_slam{}))
    
    // get all the values of row 
    values := reflect.ValueOf(row)


    // iterate through the fields and add them to the response
    // string after injecting the values.
    for index, field := range fields {
        // check if the field is numeric
        if values.Field(index).CanInt() {
            response += "\n" + field.Name + ": "+ strconv.Itoa(int(values.Field(index).Int())) + ","
        }else {
            response += "\n" + field.Name + ": "+ values.Field(index).String() + ","
        }
    }

    // return the response
    return response;
}
