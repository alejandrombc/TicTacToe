<?php
  include 'connection.php';

  class tictactoe{

    /* Attributes */     
    private $activePlayer;
    private $positions;

    /*  Methods   */
      //Construct
    public function __construct($activePlayer) {
      $this->activePlayer = $activePlayer;
      $this->position = array(0,0,0,0,0,0,0,0,0);
    }

      //Get the active player (cross=1, circle=2)
    public function getActivePlayer(){
      return $this->activePlayer;
    }
 
      //Get array of chosen positions
    public function getPosition(){
      return $this->position;
    }

      //Set a new activePlayer
    public function setActivePlayer($newActivePlayer){
      $this->activePlayer = $newActivePlayer;
    }

      //Switch the activePlayer
    public function alterActivePlayer($lastActivePlayer){
      if($lastActivePlayer == 1){ $newActivePlayer = 2; }else{ $newActivePlayer = 1; }
      $this->setActivePlayer($newActivePlayer);
    }
    
      //Get the last 30 records
    public function getRecords(){
      global $connection;
      $sql = "SELECT * FROM tictactoe ORDER BY id DESC LIMIT 30";
      $result = $connection->query($sql);
      $res = False;
      while($row = $result->fetch_assoc()) {
        $res[]=$row;
      }
      return json_encode($res);
    }

      //Add new record to the Database
    public function addRecord($player, $type, $state, $seconds){
      global $connection;
      $sql = "INSERT INTO tictactoe (player, winning_type, state, seconds) VALUES ('".$player."', '".$type."', '".$state."', '".$seconds."');";
      $connection->query($sql); 
    }

      //Set a new position array
    private function setNewPosition($arrayPosition){
      $this->position = $arrayPosition;
    }

      //Set a new position to the array based on the activePlayer
    private function alterPosition($newPosition){
      $activePlayer = $this->activePlayer;
      $this->position[$newPosition-1] = $activePlayer;
    }
      //Calculate whenever the game is over or not
    private function calculateMap($seconds){
      $index = 0;
      foreach ($this->position as $value){
        if($index < 3) {
          if($this->position[$index] == $this->activePlayer && 
            $this->position[$index+3] == $this->activePlayer &&
            $this->position[$index+6] == $this->activePlayer){
              $this->addRecord("Player ".$this->activePlayer, "Vertical", "Completed", $seconds);
              return array($index, $index+3, $index+6);
          } 
        }
        if ($index % 3 == 0) {
          if($this->position[$index] == $this->activePlayer && 
            $this->position[$index+1] == $this->activePlayer &&
            $this->position[$index+2] == $this->activePlayer){
              $this->addRecord("Player ".$this->activePlayer, "Horizontal", "Completed", $seconds);
              return array($index, $index+1, $index+2);
          } 
        }
        if ($index == 0) {
          if($this->position[$index] == $this->activePlayer && 
            $this->position[$index+4] == $this->activePlayer &&
            $this->position[$index+8] == $this->activePlayer){
              $this->addRecord("Player ".$this->activePlayer, "Diagonal", "Completed", $seconds);
              return array($index, $index+4, $index+8);
          }
        }
        if ($index == 2) {
          if($this->position[$index] == $this->activePlayer && 
            $this->position[$index+2] == $this->activePlayer &&
            $this->position[$index+4] == $this->activePlayer){
              $this->addRecord("Player ".$this->activePlayer, "DiagonalR", "Completed", $seconds);
              return array($index, $index+2, $index+4);
          }
        }

        $index++;
      }

      return array();
    }
      //Principal function that executes the rest
    public function userPlay($lastActivePlayer, $position, $arrayPosition, $seconds){
      $this->setNewPosition($arrayPosition);
      $this->alterPosition($position);
      return $this->calculateMap($seconds);
    }

  }

?>