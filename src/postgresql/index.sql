SELECT Player_Last_Name
FROM Player NATURAL JOIN Participate NATURAL JOIN Grand_Slam
WHERE GC_Name = 'Rolland Garros' AND _Year = 2022 AND Result = 'Champion';