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






-- FIRST, CONSTRUCT A LIST OF ALL MEN PLAYERS AND WOMEN PLAYERS 
-- THAT SHARES THE SAME NATIONNALITY
-- PS/ WE JUST NEED TO RETURN THE MEN PLAYER_IDS OR THE WOMEN PLAYER_IDS
-- SINCE THE MAIN REQUEST DOES NOT NEED TO SHOW THE DIFFRENCE GENDER-WISE
-- AND ALSO, CUZ THEY ARE PARTICIPATING AT THE SAME GC_ID, 
-- (OTHERWISE THEY WILL BE IGNORED AT THE SECOND STEP)

-- SECOND, FROM THIS LIST SELECT ALL THE PLAYER_ID WHERE 
-- RESULT IS CHAMPION AND RETURN THE EQUIVALENT GC_ID


-- THIRD, USING THIS RETURNED GC_ID, GET ALL DETAILS ABOUT THE GRAND_SLAM
-- ITSELF.

SELECT *        
FROM P16_Grand_Slam
WHERE GC_ID IN (
    SELECT P16_Participate.GC_ID
    FROM P16_Participate
    WHERE P16_Participate.result LIKE "C%"
    AND P16_Participate.Player_ID IN (

        SELECT fst.Player_ID
        FROM P16_Player AS fst
        INNER JOIN P16_Player AS snd
        ON fst.player_nationality = snd.player_nationality 
        WHERE fst.player_gender LIKE "M%"
        AND snd.player_gender LIKE "W%"
    )
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




-- GET THE RESULT OF ALL THE CANADIAN PLAYERS

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



-- GET THE NUMBER OF PLAYERS FOR EACH NATION

SELECT COUNT(Player_ID) AS Player_count, Player_Nationality AS Nation 
FROM P16_Player
GROUP BY Player_Nationality;


-- TO TEST THE ONE ABOVE, MAKE SURE THAT THE RESULTS ARE EQUIVALENT.
SELECT COUNT(*) 
FROM P16_Player 
WHERE Player_Nationality = "nation_name";







-- GET ALL THE PLAYERS THAT GOT THEMSELVES AT LEAST TWO TIMES THROUGH THE FINAL

SELECT DISTINCT P16_Player.player_first_name, P16_Player.player_last_name 
FROM P16_Player 
WHERE P16_Player.Player_ID IN (
    SELECT P16_Participate.Player_ID
    FROM P16_Participate
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