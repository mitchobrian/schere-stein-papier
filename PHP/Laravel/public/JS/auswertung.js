$(document).ready(function () {
    var p1Points = parseInt($('#p1Points').text());
    var p2Points = parseInt($('#p2Points').text());

    var p1Counter = 0;
    var p2Counter = 0;


   /* //!!!!!!!! ONLY FOR TEST !!!!!!!!!!!!!!!
    var randomChoice = Array("Schere", "Stein", "Papier");
    var p2Choice = randomChoice[Math.floor(randomChoice.length * Math.random())];
    console.log(p1Choice + " " + p1Points);
    console.log(p2Choice + " " + p2Points);
    //!!!!!!!! ONLY FOR TEST !!!!!!!!!!!!!!!*/


    //Hide all Symboles
    $('.sym').hide();

    switch (p1Choice) {
        case "Schere"://IF P1 CHOICE = SCHERE
            $('#Schere1').show();
            if (p2Choice == "Schere") {
                //Set Winnertext
                $('#winner').text('Unentschieden');

                //Show The Symbols
                $('#Schere2').show();
                
                
                insertmatchwinner(3);
                
            }

            if (p2Choice == "Papier") {
                alert('SDGF');
                //Set Points of P1 +1
                $("#p1Points").text(p1Counter + 1);

                //Show The Symbols
                $('#Papier2').show();

                //Set Winnertext
                $('#winner').text('Schere schneidet Papier! (Player1 gewinnt)');

                insertmatchwinner(1);
            }

            if (p2Choice == "Stein") {
                //Set Points of P2 +1
                $("#p2Points").text(p2Counter + 1);

                //Show The Symbols
                $('#Stein2').show();

                //Set Winnertext
                $('#winner').text('Stein schlägt Schere (Player2 gewinnt)');

                insertmatchwinner(2);
                
                
            }
            break;

        case "Stein"://IF P1 CHOICE = STEIN
            $('#Stein1').show();
            if (p2Choice == "Stein") {
                //Set Winnertext
                $('#winner').text('Unentschieden');

                //Show The Symbols

                $('#Stein2').show();

                insertmatchwinner(3);
            }

            if (p2Choice == "Papier") {
                //Set Points of P2 +1
                $("#p2Points").text(p2Counter + 1);

                //Show The Symbols
                $('#Papier2').show();

                //Set Winnertext
                $('#winner').text('Papier schlägt Stein! (Player2 gewinnt)');

                insertmatchwinner(2);
            }

            if (p2Choice == "Schere") {
                //Set Points of P1 +1
                $("#p1Points").text(p1Counter + 1);

                //Show The Symbols
                $('#Stein2').show();

                //Set Winnertext
                $('#winner').text('Stein schlägt Schere (Player1 gewinnt)');

                insertmatchwinner(1);
            }
            break;

        case "Papier": //IF P1 CHOICE = Papier
            $('#Papier1').show();
            if (p2Choice == "Papier") {
                //Set Winnertext
                $('#winner').text('Unentschieden');

                //Show The Symbols

                $('#Papier2').show();

                insertmatchwinner(3);
            }

            if (p2Choice == "Schere") {
                //Set Points of P2 +1
                $("#p2Points").text(p2Counter + 1);

                //Show The Symbols
                $('#Schere2').show();

                //Set Winnertext
                $('#winner').text('Schere schneidet Papier! (Player2 gewinnt)');

                insertmatchwinner(2);
            }

            if (p2Choice == "Stein") {
                //Set Points of P1 +1
                $("#p1Points").text(p1Counter + 1);

                //Show The Symbols
                $('#Stein2').show();

                //Set Winnertext
                $('#winner').text('Papier schlägt Stein (Player1 gewinnt)');

                insertmatchwinner(1);
            }
            break;
    }
})

function insertmatchwinner(winner) {
    console.log(hoster);
    console.log(winner);
     if (hoster) {
         console.log("insertmatchwinner")
         $.ajax({
             'url': 'insertmatchwinner',
             'type': 'get',
             'dataType': 'json',
             'data': {
                 'winner': winner,
                 'match_id': match_id,
             }
         });
     }
}