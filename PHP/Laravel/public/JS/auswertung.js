$(document).ready(function () {
    var p1Points = parseInt($('#p1Points').text());
    var p2Points = parseInt($('#p2Points').text());

    var p1Counter = 0;
    var p2Counter = 0;

    $('#nochmal').on('click', function (e) {

        nochmalinsertdecision();
        c.getMessage(function (message) {
        });


    })


    /* //!!!!!!!! ONLY FOR TEST !!!!!!!!!!!!!!!
     var randomChoice = Array("Schere", "Stein", "Papier");
     var p2Choice = randomChoice[Math.floor(randomChoice.length * Math.random())];
     console.log(p1Choice + " " + p1Points);
     console.log(p2Choice + " " + p2Points);
     //!!!!!!!! ONLY FOR TEST !!!!!!!!!!!!!!!*/


    //Hide all Symboles
    $('.auswahl').hide();

    switch (p1Choice) {
        case "Schere"://IF P1 CHOICE = SCHERE

            if (p2Choice == "Schere") {
                $('#Schere1_remis').show();
                //Set Winnertext
                $('#winner').text('Unentschieden');

                //Show The Symbols
                $('#Schere2_remis').show();


                insertmatchwinner(3);

            }

            if (p2Choice == "Papier") {
                $('#Schere1_win').show();
                //Set Points of P1 +1
                $("#p1Points").text(p1Counter + 1);

                //Show The Symbols
                $('#Papier2_lose').show();

                //Set Winnertext
                $('#winner').text('Schere schneidet Papier! (Player1 gewinnt)');

                insertmatchwinner(1);
            }

            if (p2Choice == "Stein") {
                $('#Schere1_lose').show();
                //Set Points of P2 +1
                $("#p2Points").text(p2Counter + 1);

                //Show The Symbols
                $('#Stein2_win').show();

                //Set Winnertext
                $('#winner').text('Stein schlägt Schere (Player2 gewinnt)');

                insertmatchwinner(2);


            }
            break;

        case "Stein"://IF P1 CHOICE = STEIN

            if (p2Choice == "Stein") {
                $('#Stein1_remis').show();
                //Set Winnertext
                $('#winner').text('Unentschieden');

                //Show The Symbols

                $('#Stein2_remis').show();

                insertmatchwinner(3);
            }

            if (p2Choice == "Papier") {
                $('#Stein1_lose').show();
                //Set Points of P2 +1
                $("#p2Points").text(p2Counter + 1);

                //Show The Symbols
                $('#Papier2_win').show();

                //Set Winnertext
                $('#winner').text('Papier schlägt Stein! (Player2 gewinnt)');

                insertmatchwinner(2);
            }

            if (p2Choice == "Schere") {
                $('#Stein1_win').show();
                //Set Points of P1 +1
                $("#p1Points").text(p1Counter + 1);

                //Show The Symbols
                $('#Schere2_lose').show();

                //Set Winnertext
                $('#winner').text('Stein schlägt Schere (Player1 gewinnt)');

                insertmatchwinner(1);
            }
            break;

        case "Papier": //IF P1 CHOICE = Papier

            if (p2Choice == "Papier") {
                $('#Papier1_remis').show();
                //Set Winnertext
                $('#winner').text('Unentschieden');

                //Show The Symbols

                $('#Papier2_remis').show();

                insertmatchwinner(3);
            }

            if (p2Choice == "Schere") {
                $('#Papier1_lose').show();
                //Set Points of P2 +1
                $("#p2Points").text(p2Counter + 1);

                //Show The Symbols
                $('#Schere2_win').show();

                //Set Winnertext
                $('#winner').text('Schere schneidet Papier! (Player2 gewinnt)');

                insertmatchwinner(2);
            }

            if (p2Choice == "Stein") {
                $('#Papier1_win').show();
                //Set Points of P1 +1
                $("#p1Points").text(p1Counter + 1);

                //Show The Symbols
                $('#Stein2_lose').show();

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

function nochmalinsertdecision() {
    $.ajax({
        'url': 'insertnochmaldecision',
        'type': 'get',
        'dataType': 'json',
        'data': {
            'match_id': match_id,
            'hoster': hoster,
        }
    });
    

}

function Chatter() {
    this.getMessage = function () {
        var t = this;
        var latest = null;


        $.ajax({
            'url': 'nochmalspielen',
            'type': 'get',
            'dataType': 'json',

            'data': {
                'mode': 'post',
                'userid': id,
                'matchid': match_id,
                'hoster': hoster,
            },
            'timeout': 3000000,
            'cache': false,
            'success': function (result) {

                if (result.result) {
                    $('#nochmalform').submit();
                    callback(result.message);
                    latest = result.latest;

                }
            },
            'error': function (e) {
                console.log(e);
            },
            'complete': function () {
                t.getMessage();
            }
        });
    };


};

var c = new Chatter();
    
