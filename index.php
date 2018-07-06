<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Tic Tac Toe - Hiberus</title>
    <!-- Imports  -->
    <meta charset='UTF-8'>
    <meta author='Alejandro Barone' to="Hiberus">
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="shortcut icon" href="assets/images/hiberus.ico" />
    <link href="assets/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <script src="assets/js/bootstrap.js"></script>
    <link href="assets/css/tictactoe.css" rel="stylesheet">
    <script src="assets/js/tictactoe.js"></script>
  </head>
  <body>
   <!-- Modal at the end of the game-->
    <div class="modal fade" id="modalEnded" tabindex="-1" role="dialog" aria-labelledby="modalEndedLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEndedLabel">Game Ended</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="playerWin" class="modal-body">
              <!-- Filled dynamically -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Title -->
    <center>
      <h4>Tic Tac Toe</h4>
      <h6>Start by clicking one of the boxes</h6>
    </center>

    <!-- Game Grid -->
    <div id="primaryGrid" class="grid">
      <div class="threePanel">
        <div class="box" id="box0" data-value="1" onclick="play(this)" ></div>
        <div class="box" id="box1" data-value="2" onclick="play(this)" ></div>
        <div class="box" id="box2" data-value="3" onclick="play(this)" ></div>
      </div>
      <div class="threePanel">
        <div class="box"  id="box3" data-value="4" onclick="play(this)" ></div>
        <div class="box"  id="box4" data-value="5" onclick="play(this)" ></div>
        <div class="box"  id="box5" data-value="6" onclick="play(this)" ></div>
      </div>
      <div class="threePanel">
        <div class="box" id="box6" data-value="7" onclick="play(this)" ></div>
        <div class="box" id="box7" data-value="8" onclick="play(this)" ></div>
        <div class="box" id="box8" data-value="9" onclick="play(this)" ></div>
      </div>
    </div>
  
    <!-- Game Options -->
    <center>
      <div id="timer">
          <p><span id="seconds">00</span>:<span id="tens">00</span></p>
      </div>
      <a class="btn btn-primary" onclick="getRecords()" data-toggle="collapse" href="#collapseRecords" role="button" aria-expanded="false" aria-controls="collapseRecords">
        Last 30's
      </a>
      <a class="btn btn-primary" onclick="replayGame()" style="color:white;">
        Replay
      </a>

      <!-- Table of records/history -->
      <div class="collapse" id="collapseRecords">
        <div class="card card-body">
          <table id="records" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Winner</th>
                <th scope="col">Wininng Type</th>
                <th scope="col">Status</th>
                <th scope="col">Seconds</th>
              </tr>
            </thead>
            <tbody id="tableBody">
              <!-- tbody is empty because its fill dynamically -->
            </tbody>
          </table>
        </div>
      </div>
      <!-- Copyrigth -->
      <br><br>
      <h6>Alejandro Barone - Hiberus</h6>
    </center>

    <!-- Button that trigger the modal (is disabled)-->
    <button type="button" id="modalButton" class="btn btn-primary" data-toggle="modal" hidden data-target="#modalEnded">
    </button>
  </body>
</html>