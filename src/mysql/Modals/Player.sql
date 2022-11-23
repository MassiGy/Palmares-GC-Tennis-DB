DROP TABLE Player; 


CREATE IF NOT EXISTS Player (

    Player_ID INT PRIMARY KEY AUTO_INCREMENT,
    Player_First_Name VARCHAR(32) NOT NULL,
    Player_Last_Name VARCHAR(32) NOT NULL,
    Player_Gender VARCHAR(8) CHECK IN ("Man", "Woman")
    Player_Nationality VARCHAR(32) NOT NULL,
    Player_ATP_Rank INT NOT NULL
);