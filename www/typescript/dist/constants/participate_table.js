"use strict";
module.exports.participate_table = {
    name: "P16_Participate",
    colomns: ["Result", "Category", "GC_ID", "Player_ID"],
    join_colomns: [
        "GC_ID",
        "Player_ID",
        "Player_First_Name",
        "Player_Last_Name",
        "Player_Gender",
        "Player_Nationality",
        "Player_ATP_Rank",
        "Result",
        "Category",
        "Year",
        "GC_Name",
        "GC_Location",
        "GC_Ground",
        "GC_Creation",
    ],
};
