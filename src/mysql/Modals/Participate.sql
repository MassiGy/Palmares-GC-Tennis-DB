DROP TABLE Participate;

CREATE TABLE IF NOT EXISTS Participate (
    Resault VARCHAR(64) NOT NULL CHECK IN ("1/64 Finalist", "1/32 Finalist", "1/16 Finalist", "1/8 Finalist", "1/4 Finalist", "1/2 Finalist", "Runner-up", "Champion"),
    Category VARCHAR(64) NOT NULL CHECK IN ("Men’s Singles", "Women’s Singles", "Men’s Doubles", "Women’s Doubles", "Mixted Doubles"),
    _Year INT NOT NULL CHECK IN (2022, 2021),
    GC_ID INT,
    Player_ID INT,
    FOREIGN KEY (GC_ID) REFERENCES Grand_Slam(GC_ID),
    FOREIGN KEY (Player_ID) REFERENCES Player(Player_ID),
    PRIMARY KEY(GC_ID, Player_ID)
);