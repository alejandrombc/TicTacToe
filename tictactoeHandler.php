<?php
  require_once 'tictactoe.php'; //Include the TicTacToe Class

  //Validate that the AJAX call has this elements
  if(isset($_POST['activePlayer']) && isset($_POST['position']) && isset($_POST['arrayPosition']) && isset($_POST['seconds'])) {

  	// Create an instance of the tictactoe class
	$game = new tictactoe($_POST['activePlayer']); //Create instance
	$ended = $game->userPlay($_POST['activePlayer'], $_POST['position'], $_POST['arrayPosition'], $_POST['seconds']); 

	// If ended is defined, process the coordinates of the winning fields
	if(isset($ended)){
		$ended = implode( "," , $ended); //Call main function
	}

	$game->alterActivePlayer($_POST['activePlayer']); //Change activePlayer
	$activePlayer = $game->getActivePlayer(); //Get new activePlayer
	$arrayPosition = implode( ",", $game->getPosition()); //Convert Array to String

	// "Pass" variables to AJAX call
	echo $activePlayer."\n";
	echo $arrayPosition."\n";
	echo $ended;
  }

  //Validate that the AJAX call has this elements
  if(isset($_POST['records']) && isset($_POST['activePlayer'])){
  	$game = new tictactoe($_POST['activePlayer']); //Create instance
  	$records = $game->getRecords(); //Get records

  	// "Pass" variables to AJAX call
  	echo $records;
  }


  //Validate that the AJAX call has this elements
  if(isset($_POST['incompleteGame']) && isset($_POST['activePlayer']) && isset($_POST['seconds'])){
  	
  	$game = new tictactoe($_POST['activePlayer']); //Create instance
  	
  	$records = $game->addRecord("Draw","None","Not Completed",$_POST['seconds']); //Add a new record
  }


?>