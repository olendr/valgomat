var choices = [];

$(document).ready(function() {

    /*
     * Listeners
     */

    $('#start').on('click', function() {
        startApp(this);
    });

    $('#next-personalia').on('click', function(){
        nextPersonalia();
    });

    $('.choice').on('click', function() {
        userChoice(this);
    });

    $('.importance').on('click', function() {
        userLevelOfImportance(this);
    });


    /*
     * Init
     */
    getPersonalia();
});