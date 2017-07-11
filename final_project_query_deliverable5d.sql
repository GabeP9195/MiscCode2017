/* Final Project, Gabriel Popa, Deliverable 5d:
For all properties currently under agreement display:
The first and last name
The weekly rental amount
State property is located in
Property type
*/

SELECT RENTER_T.RENTER_F_NAME, RENTER_T.RENTER_L_NAME, RENTAL_WEEKLY_RATE, PROP_T.PROP_STATE, PROP_T.PROP_TYPE
FROM RENTER_T, RENTAL_AGREEMENT_T, PROP_T 
WHERE RENTER_T.RENTER_ID = RENTAL_AGREEMENT_T.RENTER_ID 
		AND RENTAL_AGREEMENT_T.PROP_ID = PROP_T.PROP_ID
		AND RENTAL_AGREEMENT_T.RENTAL_END_DATE >= CURDATE();


/* OUTPUT FROM ABOVE QUERY:


mysql> source final_project_QUERY_DELIVERABLE5D.SQL;
+---------------+---------------+--------------------+------------+-----------+
| RENTER_F_NAME | RENTER_L_NAME | RENTAL_WEEKLY_RATE | PROP_STATE | PROP_TYPE |
+---------------+---------------+--------------------+------------+-----------+
| Chris         | Lucero        |             225.00 | MA         | B         |
| Margaret      | Simpson       |             325.00 | MA         | B         |
+---------------+---------------+--------------------+------------+-----------+
2 rows in set (0.00 sec)


*/