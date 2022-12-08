-- GET ALL P16_PLAYER DETAILS FOR A SPECIFIC GRAND_SLAM IN A SPECIFIC YEAR, FOR  SPECIFIC CATEGORY AND RESULT
SELECT * FROM P16_Player 
WHERE Player_ID IN ( SELECT Player_ID FROM P16_Participate WHERE GC_ID = 4 AND _YEAR = 2021 
AND Category LIKE "W%" AND Result LIKE "1/32%" );


-- GET ALL PLAYERS FOR WHOM THE RANK IS BETWEEN X & Y
SELECT DISTINCT Player_First_Name, Player_Last_Name, Player_Gender, Player_Nationality, Player_ATP_Rank 
FROM P16_Player
WHERE Player_ATP_Rank BETWEEN 1 AND 13;

--  FOR ONLY MAN;

SELECT DISTINCT Player_First_Name, Player_Last_Name, Player_Gender, Player_Nationality, Player_ATP_Rank 
FROM P16_Player
WHERE Player_ATP_Rank BETWEEN 1 AND 13
AND Player_Gender LIKE "M%";

--  FOR ONLY WOMEN;

SELECT DISTINCT Player_First_Name, Player_Last_Name, Player_Gender, Player_Nationality, Player_ATP_Rank 
FROM P16_Player
WHERE Player_ATP_Rank BETWEEN 1 AND 13
AND Player_Gender LIKE "W%";



-- GET ALL PLAYERS WITHIN A SPECIFIC RESULT PLACE, FROM A SPECIFIC COUNTRY, FOR A SPECIFIC YEAR



-- GET ALL RESULTS FOR A SPECIFIC P16_PLAYER
SELECT Result 
FROM P16_Participate 
WHERE Player_ID = 1;


-- OR
SELECT P16_Player.Player_First_Name, P16_Player.Player_Last_Name, P16_Player.Player_Gender, P16_Player.Player_Nationality, P16_Participate.Result
FROM P16_Participate
INNER JOIN P16_Player
ON P16_Participate.Player_ID = P16_Player.Player_ID
WHERE P16_Player.Player_ID = 1;


-- GET ALL WOMEN
SELECT * 
FROM P16_Player 
WHERE player_gender = "Woman" ;


-- GET ALL PLAYERS WITH A LAST NAME CONTAINING "VIC" OR "EV"
SELECT * 
FROM P16_Player 
WHERE player_last_name LIKE "%vic%" 
OR player_last_name LIKE "%ev%" ;





-- GET ALL THE CHAMPIONS
SELECT DISTINCT P16_Player.player_first_name,  P16_Player.player_last_name 
FROM P16_Player 
NATURAL JOIN P16_Participate 
WHERE result LIKE "Champion" ;


-- GET ALL THE FRENCH PLAYERS
SELECT COUNT(*) 
FROM P16_Player 
WHERE player_nationality LIKE "France";


-- GET ALL THE PLAYERS THAT GOT THEMSELVES AT LEAST TO THE 1/4 FINALS
SELECT DISTINCT P16_Player.player_first_name, P16_Player.player_last_name 
FROM P16_Player 
NATURAL JOIN P16_Participate 
WHERE result NOT LIKE "1/64%" 
OR result NOT LIKE "1/32%" 
OR result NOT LIKE "1/16%" 
OR result NOT LIKE "1/8%" ;



-- GET ALL INFOS ABOUT THE GRAND_SLAM WHICH HAD A WOMEN & A
-- MAN CHAMPIONS FROM THE SAME NATION.


SELECT *        
FROM P16_Grand_Slam
WHERE GC_ID IN (
        -- SELECT TWO GROUPS OF PLAYERS THAT SHARE THE SAME NATION
        SELECT fst_gc.GC_ID
        FROM P16_Player AS fst
        INNER JOIN P16_Player AS snd
        ON fst.player_nationality = snd.player_nationality

        -- FOREACH PLAYER OF EACH GROUP 
        -- FIND ITS PARTICIPATION RECORDS
        INNER JOIN P16_Participate AS fst_participation
        ON fst_participation.Player_ID = fst.Player_ID
        INNER JOIN P16_Participate AS snd_participation
        ON snd_participation.Player_ID = snd.Player_ID

        -- FOR EACH PLAYER OF EACH GROUP
        -- FIND WHICH GRAND_SLAM IN WHICH HE PARTICIPATED
        INNER JOIN P16_Grand_Slam AS fst_gc
        ON fst_gc.GC_ID = fst_participation.GC_ID
        INNER JOIN P16_Grand_Slam AS snd_gc
        ON snd_gc.GC_ID = snd_participation.GC_ID

        -- FROM THE FIRST GROUP, SELECT ALL THE MEN
        WHERE fst.player_gender LIKE "M%"
        -- FROM THE FIRST GROUP, SELECT ALL THE WOMEN
        AND snd.player_gender LIKE "W%"
        -- FROM THE FIRST GROUP, SELECT ALL THE CHAMPIONS
        AND fst_participation.result LIKE "C%"
        -- FROM THE SECOND GROUP, SELECT ALL THE CHAMPIONS
        AND snd_participation.result LIKE "C%"
        -- FROM BOTH GROUPS SELECT THE PAIRS THAT BEEN ON THE SAME GRAND_SLAM
        AND fst_gc.GC_ID = snd_gc.GC_ID
);




-- GET ALL THE PLAYERS THAT PARTICIPATED ONLY TO ONE GRAND_SLAM.

SELECT * 
FROM P16_Player
WHERE (
    SELECT COUNT(*)
    FROM P16_Participate 
    WHERE P16_Player.Player_ID = P16_Participate.Player_ID
) = 1;


-- TO TEST THE PREVIOUS ONE.
-- THE NUMBER OF RESULTS SHOULD BE THE SAME WITH THE PREVIOUS ONE.

SELECT * FROM P16_Participate
WHERE P16_Participate.Player_ID IN (

    SELECT P16_Player.Player_ID
    FROM P16_Player
    WHERE (
        SELECT COUNT(*)
        FROM P16_Participate 
        WHERE P16_Player.Player_ID = P16_Participate.Player_ID
    ) = 1
);




-- GET THE RANK OF ALL THE CANADIAN PLAYERS

SELECT * 
FROM P16_Player
NATURAL JOIN P16_Participate
WHERE P16_Player.Player_Nationality LIKE "CAN%" ;

-- TO TEST THE ONE ABOVE;
-- ALL THE RETURNED PLAYERS FROM THE ABOVE REQUEST SHOULD BE 
-- MENTIONNED IN THE RESULT OF THE REQUEST BELOW

SELECT *
FROM P16_Player 
WHERE Player_Nationality 
LIKE "CAN%" ;


-- GET THE RESULT OF ALL THE CANADIAN PLAYERS

SELECT * 
FROM P16_Player
INNER JOIN P16_Participate
ON P16_Player.Player_ID = P16_Participate.Player_ID
WHERE P16_Player.Player_Nationality LIKE "CAN%";




-- GET THE NUMBER OF PLAYERS FOR EACH NATION

SELECT COUNT(Player_ID) AS Player_count, Player_Nationality AS Nation 
FROM P16_Player
GROUP BY Player_Nationality;


-- TO TEST THE ONE ABOVE, MAKE SURE THAT THE RESULTS ARE EQUIVALENT.
SELECT COUNT(*) 
FROM P16_Player 
WHERE Player_Nationality = "nation_name";







-- GET ALL THE PLAYERS THAT GOT THEMSELVES AT LEAST TWO TIMES THROUGH THE FINAL

-- SELECT PLAYER DATA
SELECT DISTINCT P16_Player.player_first_name, P16_Player.player_last_name 
FROM P16_Player 
-- WHERE THE PLAYER HAD ALREADY PARTICIPATED TO GC
WHERE P16_Player.Player_ID IN (
    SELECT P16_Participate.Player_ID
    FROM P16_Participate
    -- AND ALSO HAS BEEN A RUNNER UP OR A CHAMPION MORE THEN ONCE
    WHERE (
        SELECT COUNT(*)
        FROM P16_Participate
        WHERE P16_Participate.Player_ID = P16_Player.Player_ID
        AND (P16_Participate.Result LIKE "R%" OR P16_Participate.Result LIKE "C%")
    ) > 1
);


-- TO TEST THE ONE ABOVE
-- FOR EACH RESULT OF THE REQUEST ABOVE,
-- COUNT THE NUMBER OF TIME HE FINISHED AS FINALIST 
-- (AS A RUNNER-UP OR AS A CHAMPION.)

SELECT COUNT(*)
FROM P16_Participate
WHERE (P16_Participate.Result LIKE "R%" OR P16_Participate.Result LIKE "C%")
AND P16_Participate.Player_ID = (
    SELECT Player_ID 
    FROM P16_Player
    WHERE Player_First_Name = "Iga"
    AND Player_Last_Name = "Swiatek"
);