// Global Variables
var activePlayer = 1;
var arrayPosition = [0,0,0,0,0,0,0,0,0];
var atLeastOne = false;
var ended = false;
//Stopwatch variables
var start = -1;
var tens = 00;
var seconds = 00;
var Interval;

// Function that paint the winner boxes and fired the modal pop up
function endFunction(positions){
  positions = positions.split(",");
  $("#box"+positions[0]).css("background-color","#80ff6c");
  $("#box"+positions[1]).css("background-color","#80ff6c");
  $("#box"+positions[2]).css("background-color","#80ff6c");
  $(".box").attr('onclick','').unbind('click');
  if(activePlayer == 1){
    $("#playerWin").html("\
      <center>\
        <h6>Congratulations</h6></br>\
        <i class='fas fa-times fa-7x'</i></br>\
        <h5>You win!</h5>\
      </center>"
      );
  }else if(activePlayer == 2){
    $("#playerWin").html("\
      <center>\
        <h6>Congratulations</h6></br>\
        <i class='far fa-circle fa-7x'</i></br>\
        <h5>You win!</h5>\
      </center>"
      );
  }
  
  $("#modalButton").click();
}

// Function that made AJAX call to set a record of a non completed game (draw)
function endFunctionIncomplete(){
  $.ajax({
    type: 'post',
    url: "tictactoeHandler.php",
    data: {
      "activePlayer": activePlayer,
      "incompleteGame":1,
      "seconds":seconds
    },
    success: function(data){
      //None
    }
  });
  // Modal pop up
  $("#playerWin").html("\
      <center>\
        <h6>No one wins. Try again!</h6></br>\
      </center>"
    );
  $("#modalButton").click();
}

// Start the stopwatch
function startTimer(){
  if(start == -1){
    clearInterval(Interval);
    Interval = setInterval(Timer, 10); 
    start = 1;
  }
}

// Main Function (AJAX call)
function play (element){
  startTimer(); //Start timer
  position = element.getAttribute("data-value"); //Get DIV data-value
  id = "#"+element.getAttribute("id"); //Get the id "box#"
  // Ternary operator for cross and circle drawing
  activePlayer == 1 ?
    $(id).append("<center><i class='fas fa-times fa-7x'</i></center>")
  :
    $(id).append("<center><i class='far fa-circle fa-7x'</i></center>");

  $(id).attr('onclick','').unbind('click'); //Unbind the onclick event of that panel

  // Make an AJAX call to do the logic based on the clicked position
  $.ajax({
    type: 'post',
    url: "tictactoeHandler.php",
    data: {
      "activePlayer": activePlayer,
      "position":position,
      "arrayPosition":arrayPosition,
      "seconds":seconds
    },
    success: function(data){ //On Success
      data = data.split("\n");
      arrayPosition = data[1].split(",");
      ended = data[2];
      // Validate that the panel has atLeast one free field
      for (var i = 0; i < arrayPosition.length; ++i) {
          if(arrayPosition[i] == "0") {atLeastOne = true; break;}
      }
      // Someone wins
      if(ended){ 
        clearInterval(Interval);
        endFunction(ended); 
      // Draw
      }else if(!atLeastOne){
        activePlayer = 3;
        clearInterval(Interval);
        endFunctionIncomplete(ended); 
      //Normal play
      }else{
        activePlayer = data[0];
      }
      atLeastOne = false;
    }
  });
}

// Replay function (set all init value, reload HTML components)
function replayGame(){
  clearInterval(Interval);
  activePlayer = 1;
  ended = false;
  start = -1;
  tens = 00;
  atLeastOne = 1;
  seconds = 00;
  arrayPosition = [0,0,0,0,0,0,0,0,0];
  $('#timer').load(document.URL +  ' #timer');
  $('#primaryGrid').load(document.URL +  ' #primaryGrid');
}

// Make an AJAX call to get the last 30 games statistics
function getRecords(){
  $.ajax({
    type: 'post',
    url: "tictactoeHandler.php",
    data: {
      "records": true,
      "activePlayer":activePlayer
    },
    success: function(data){
      var record = JSON.parse(data);
      var tableHtml = "";
        for (var i = 0; i < record.length; i++) {
          tableHtml = "<tr>";
          tableHtml += '<td>'+record[i].id+'</td>';
          tableHtml += '<td>'+record[i].player+'</td>';
          tableHtml += '<td>'+record[i].winning_type+'</td>';
          tableHtml += '<td>'+record[i].state+'</td>';
          tableHtml += '<td>'+record[i].seconds+'</td>';
          tableHtml += "</tr>";
          $('#records > tbody:last-child').append(tableHtml);
        }
        
      }
  });
}

// Events to fire in specific circumstances
$(function(){ 
  // Fired when the modal is closed
  $("#modalEnded").on("hide.bs.modal", function () {
      $(".box").attr('onclick','play(this)').bind('click');
      replayGame();
  });

  // Fired when the collapse table is closed
  $('#collapseRecords').on("hidden.bs.collapse", function() {
      $('#tableBody').empty();
  })

});


// Updates the counter of the stopwatch
function Timer () {
  tens++; 
  var appendTens = document.getElementById("tens");
  var appendSeconds = document.getElementById("seconds");
  if(tens < 9){
    appendTens.innerHTML = "0" + tens;
  }

  if (tens > 9){
    appendTens.innerHTML = tens;
    
  } 

  if (tens > 99) {
    seconds++;
    appendSeconds.innerHTML = "0" + seconds;
    tens = 0;
    appendTens.innerHTML = "0" + 0;
  }

  if (seconds > 9){
    appendSeconds.innerHTML = seconds;
  }

}
