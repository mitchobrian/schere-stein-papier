$(document).ready(function () {

    var mySelection
console.log(mySelection);
    //Make selection
    $('#auswahl-div img').on('click', function (e) {
        e.preventDefault();
        $('#auswahl-div img').removeClass('selected');
        $(this).addClass('selected');

         mySelection = $('.selected').attr('id');

        //get selection
        $('#getAuswahl').text(mySelection);

        //Set Value of Hidden textfield with selection
        if (mySelection != null){
            $('#txtSel').val(mySelection);
        }

    })

    //Countdown
    var seconds = 10;
    $("#time").html(seconds);
    setInterval(function () {
        seconds--;
        $("#time").html(seconds);
        if (seconds < 0 ) {
            if(mySelection == undefined){
                //If nothing selected

            }else {
                //Submit Form with Choice
                $('#choiceForm').submit();
            }
        }
    }, 1000);

});