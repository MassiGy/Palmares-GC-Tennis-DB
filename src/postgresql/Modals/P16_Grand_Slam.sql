DROP TABLE IF EXISTS P16_Grand_Slam CASCADE;

CREATE TABLE P16_Grand_Slam (
    GC_ID SERIAL PRIMARY KEY,
    GC_Name VARCHAR(32) CHECK (GC_Name IN ('Australian Open', 'Roland Garros', 'Wimbledon', 'US Open')) NOT NULL,
    GC_Location VARCHAR(32) NOT NULL,
    GC_Ground VARCHAR(32) CHECK (GC_Ground IN ('Grass', 'Hard', 'Clay')) NOT NULL,
    GC_Creation INTEGER NOT NULL
);

INSERT INTO P16_Grand_Slam (GC_Name, GC_Location, GC_Ground, GC_Creation) VALUES ('Roland Garros', 'Paris', 'Clay', 1891);
INSERT INTO P16_Grand_Slam (GC_Name, GC_Location, GC_Ground, GC_Creation) VALUES ('Wimbledon', 'London', 'Grass', 1877);
INSERT INTO P16_Grand_Slam (GC_Name, GC_Location, GC_Ground, GC_Creation) VALUES ('US Open', 'New York City', 'Hard', 1881);
INSERT INTO P16_Grand_Slam (GC_Name, GC_Location, GC_Ground, GC_Creation) VALUES ('Australian Open', 'Melbourne', 'Hard', 1905);