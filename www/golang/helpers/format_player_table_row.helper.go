package helpers

import (
	"reflect"
	"sql-project/database"
	"strconv"
)




func Format_player_table_row(row database.Player)(string){
    
    // turn all the row data into one string
    result := "";
    
    // get all the fields of our player table
    fields := reflect.VisibleFields(reflect.TypeOf(database.Player{}))
    
    // get all the values of the passed row,
    values := reflect.ValueOf(row);

    // iterate through the fields and add to them thier keys directly 
    // into the string
    for index,field := range fields {

        // check if the i'th feild is a numeric field,
        if values.Field(index).CanInt() {
            result += "\n" + field.Name + ": "+ strconv.Itoa(int(values.Field(index).Int())) + ","
        }else {
            result += "\n" + field.Name + ": "+ values.Field(index).String() + ","
        }
    }
    
    // return the result
    return result
}

