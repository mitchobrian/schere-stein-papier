$(document).ready(function () {
    var p1Points = parseInt($('#p1Points').text());
    var p2Points = $('#p2Points').text();

    var p1Counter = 0;
    var p2Counter = 0;

    var p1Choice = $('#p1Choice').val();

    //!!!!!!!! ONLY FOR TEST !!!!!!!!!!!!!!!
    var randomChoice = Array("Schere", "Stein", "Papier");
    var p2Choice = "Papier";//randomChoice[Math.floor(randomChoice.length * Math.random())];
    //!!!!!!!! ONLY FOR TEST !!!!!!!!!!!!!!!


    //Evaluate
    if (p1Choice === "Schere" && p2Choice === "Papier") {
        //Set Points of P1 +1
        $("#p1Points").text(p1Counter + 1);

        //Set Winnertext
        $('#winner').text('Schere schlägt Papier! (Player1 gewinnt)');
    }

    if (p1Choice === "Stein" && p2Choice === "Papier") {
        //Set Points of P1 +1
        p2Points.text(p2Points++);

        //Set Winnertext
        $('#winner').text('Papier schlägt Stein! (Player2 gewinnt)');
    }

    if (p1Choice === "Papier" && p2Choice === "Papier") {
        //Set Points of P1 +1
        p2Points.text(p2Points++);
    }
})