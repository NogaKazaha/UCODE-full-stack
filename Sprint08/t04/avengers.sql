USE ucode_web;
SELECT power_sum as power, name FROM (
  SELECT heroes.name AS name, sum(powers.points) AS power_sum FROM heroes JOIN powers ON powers.hero_id = heroes.id GROUP BY heroes.id
) kavo
ORDER BY power_sum DESC limit 1;
SELECT power_sum as power, name FROM (
  SELECT heroes.name AS name, sum(table1.points) AS power_sum FROM heroes JOIN (
    SELECT hero_id, points
    FROM powers
    WHERE type = 2
  ) 
  table1 ON table1.hero_id = heroes.id GROUP BY heroes.id
) kavo
ORDER BY power ASC limit 1;
SELECT power_sum as power, name FROM (
  SELECT heroes.name as name, sum(powers.points) AS power_sum FROM heroes JOIN (
    SELECT hero_id FROM teams WHERE name = 'Avengers'
  ) 
  table1 ON table1.hero_id = heroes.id JOIN powers ON powers.hero_id = heroes.id GROUP BY heroes.id
) kavo
ORDER BY power DESC;
SELECT power_sum as power, name
FROM (
  SELECT teams.name as name, sum(powers.points) AS power_sum FROM teams JOIN powers ON powers.hero_id = teams.hero_id GROUP BY name
) kavo
ORDER BY power ASC;