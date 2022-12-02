/*
SELECT Player_Last_Name
FROM P16_Player NATURAL JOIN P16_Participate NATURAL JOIN P16_Grand_Slam
WHERE GC_Name = 'Rolland Garros' AND _Year = 2022 AND Result = 'Champion';
*/

SELECT DISTINCT Player_First_Name, Player_Last_Name, Player_ATP_Rank
FROM P16_Player NATURAL JOIN P16_Participate NATURAL JOIN P16_Grand_Slam
WHERE Result IN ('1/4 Finalist', '1/2 Finalist', 'Runner-up', 'Champion');
