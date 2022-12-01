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




