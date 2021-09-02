<?php

// Connect to mysql database and change this entry expiry date
$mysqli = new mysqli( "localhost", "app_connection_covid", "6#w!zBzpoN-%Is-#", "prod_users" );


  $result = $mysqli->query( "INSERT INTO `prod_users`.`accounts` (`userID`, `givenName`, `surName`, `gender`, `DOB`, `email`, `idNum`, `phoneNumber`, `firstDoseCompleted`, `secondDoseCompleted`, `userTokenFirebase`) VALUES (999999999, 'Khadija', 'Lee', 'Male', '1955-07-01', 'pnickharris956x@nroeor.com', 'F14324534', '+61466555592', '1', '0', '999999999')" );

  $result = $mysqli->query( "INSERT INTO `prod_users`.`accounts` (`userID`, `givenName`, `surName`, `gender`, `DOB`, `email`, `idNum`, `phoneNumber`, `firstDoseCompleted`, `secondDoseCompleted`, `userTokenFirebase`) VALUES (999999998, 'Lachlan', 'Alicia', 'Male', '1994-08-17', 'mo.ashrafea@hotmail.red', 'EE1231245', '+61466555592', '1', '0', '999999998')" );

  $result = $mysqli->query( "INSERT INTO `prod_users`.`accounts` (`userID`, `givenName`, `surName`, `gender`, `DOB`, `email`, `idNum`, `phoneNumber`, `firstDoseCompleted`, `secondDoseCompleted`, `userTokenFirebase`) VALUES (999999997, 'Margie', 'Isabelle', 'Female', '1996-07-14', 'ewww.rekibw@devef.site', 'EFF1432538926', '+61466555592', '1', '1', '999999997')" );

  $result = $mysqli->query( "INSERT INTO `prod_users`.`accounts` (`userID`, `givenName`, `surName`, `gender`, `DOB`, `email`, `idNum`, `phoneNumber`, `firstDoseCompleted`, `secondDoseCompleted`, `userTokenFirebase`) VALUES (999999996, 'Ellie-May
', 'Cerys', 'Male', '1975-08-23', 'njose.hernecki@theanatoly.com', 'EWR13124353', '+61466555592', '1', '0', '999999996')" );

  $result = $mysqli->query( "INSERT INTO `prod_users`.`accounts` (`userID`, `givenName`, `surName`, `gender`, `DOB`, `email`, `idNum`, `phoneNumber`, `firstDoseCompleted`, `secondDoseCompleted`, `userTokenFirebase`) VALUES (999999995, 'Ellie', 'Kayleigh', 'Female', '1974-08-19', 'ialmarazeeq3@boranora.com', 'EWQE129032', '+61466555592', '0', '0', '999999995')" );

  $result = $mysqli->query( "INSERT INTO `prod_users`.`accounts` (`userID`, `givenName`, `surName`, `gender`, `DOB`, `email`, `idNum`, `phoneNumber`, `firstDoseCompleted`, `secondDoseCompleted`, `userTokenFirebase`) VALUES (999999994, 'Rita', 'Alannah', 'Other', '1998-01-04', '1karollina.maria4@eatneha.com', '65465Q55', '+61466555592', '1', '0', '999999994')" );

  $result = $mysqli->query( "INSERT INTO `prod_users`.`accounts` (`userID`, `givenName`, `surName`, `gender`, `DOB`, `email`, `idNum`, `phoneNumber`, `firstDoseCompleted`, `secondDoseCompleted`, `userTokenFirebase`) VALUES (999999993, 'Roxanne', 'Rita', 'Other', '2000-08-14', 'nabdalh@underdosejkt.org', '121236DC', '+61466555592', '0', '0', '999999993')" );
