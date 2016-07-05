$(document).ready(function () {
    $('#hurry').hide();

    var mySelection
    
    //Make selection
    $('#auswahl-div img').on('click', function (e) {
        console.log("gewählt");
        e.preventDefault();
        $('#auswahl-div img').removeClass('selected');
        $(this).addClass('selected');

        mySelection = $('.selected').attr('id');

        //get selection
        $('#getAuswahl').text(mySelection);

        //Set Value of Hidden textfield with selection
        if (mySelection != null) {
            $('#txtSel').val(mySelection);
        }
console.log("vor deci methode");
        insertdecision(mySelection);
        c.getMessage(function(message){});
    
        
    })

    $('#btnRandom').on('click', function (e) {
        e.preventDefault();

        var choices = Array("Schere", "Stein", "Papier");
        var randomChoice = choices[Math.floor(choices.length * Math.random())];

        //set Selection
        mySelection = randomChoice;

        //set hiddenbox
        $('#txtSel').val(mySelection);

        //set Shwon Selection
        $('#getAuswahl').text(mySelection);
    })

    //Countdown
    var seconds = 300;
    $("#time").html(seconds);
    setInterval(function () {
        seconds--;
        $("#time").html(seconds);

        //If Countdown is < 15 and nothing chosen
        if(seconds < 15 && seconds > 9 && mySelection == undefined){
           $('#hurry').fadeIn(200);
            if(seconds == 10){
                $('#hurry').fadeOut(200);
            }
        }

        //If Countdown is 0
        if (seconds < 1) {
            if (mySelection == undefined) {
                seconds = 0;
                //If nothing selected
                //Array with possible choices
                var randomChoice = Array("Schere", "Stein", "Papier");

                //Get One Random and put in hidden field as Choice
                $('#txtSel').val(randomChoice[Math.floor(randomChoice.length * Math.random())]);

                //Show Random Choice on Page
                $('#getAuswahl').text(mySelection);

                //Submit Form with Choice
                $('#choiceForm').submit();
            } else {
                seconds = 0;
                //Submit Form with Choice
                $('#choiceForm').submit();
            }
        }
    }, 1000);

});

function Chatter(){
    this.getMessage = function(){
        var t = this;
        var latest = null;


        $.ajax({
            'url': 'gamepolling',
            'type': 'get',
            'dataType': 'json',

            'data': {
                'mode': 'post',
                'userid': id
            },
            'timeout': 3000000,
            'cache': false,
            'success': function(result){
                if(result.result){
                    $('#gameend').submit();
                    callback(result.message);
                    latest = result.latest;

                }
            },
            'error': function(e){
                console.log(e);
            },
            'complete': function(){
                t.getMessage();
            }
        });
    };


};

var c = new Chatter();

function insertdecision(selection) {
    console.log("vor ajax");
    $.ajax({
        'url': 'insertselection',
        'type': 'get',
        'dataType': 'json',
        'data': {
            'selection': selection,
            'userid': id
        }
    });

}