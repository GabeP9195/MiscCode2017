/* Final Project, Gabriel Popa, Deliverable 5b:
For all properties on record display:
Property ID, State, No of rooms, Property Type, Activities
*/

SELECT PROP_T.PROP_ID, PROP_T.PROP_STATE, PROP_T.PROP_BEDS, PROP_T.PROP_TYPE, ACTIVITY_NAME
FROM PROP_T, MTN_PROP_T, ACTIVITIES_T, MTN_ACTIVITY_T
WHERE PROP_T.PROP_ID = MTN_PROP_T.PROP_ID
		AND MTN_ACTIVITY_T.PROP_ID = MTN_PROP_T.PROP_ID
		AND MTN_ACTIVITY_T.ACTIVITY_ID = ACTIVITIES_T.ACTIVITY_ID;


/* OUTPUT FROM ABOVE QUERY:


mysql> SOURCE FINAL_PROJECT_QUERY_DELIVERABLE5B.SQL;
+---------+------------+-----------+-----------+----------------------+
| PROP_ID | PROP_STATE | PROP_BEDS | PROP_TYPE | ACTIVITY_NAME        |
+---------+------------+-----------+-----------+----------------------+
|     101 | NH         |         3 | M         | SKIING               |
|     101 | NH         |         3 | M         | CROSS-COUNTRY SKIING |
|     101 | NH         |         3 | M         | HIKING               |
|     102 | NH         |         2 | M         | SKIING               |
|     102 | NH         |         2 | M         | HIKING               |
|     103 | NH         |         5 | M         | SKIING               |
|     103 | NH         |         5 | M         | HIKING               |
|     103 | NH         |         5 | M         | SKATING              |
|     103 | NH         |         5 | M         | SWIMMING             |
|     104 | NH         |         4 | M         | SKIING               |
|     104 | NH         |         4 | M         | SNOWMOBILING         |
|     104 | NH         |         4 | M         | SKATING              |
|     105 | NH         |         2 | M         | SKIING               |
|     105 | NH         |         2 | M         | CROSS-COUNTRY SKIING |
|     105 | NH         |         2 | M         | SKATING              |
+---------+------------+-----------+-----------+----------------------+
15 rows in set (0.00 sec)


*/