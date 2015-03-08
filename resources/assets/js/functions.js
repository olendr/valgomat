function startApp(el) {
    $('.start-wrapper').hide();
    $('#personalia').show();
}

function showNextFormGroup(active) {
    if(active.children('h2').html() === 'Fylke') {
        active.hide()
            .removeClass('active');

        $('[data-identifier="' + choices[active.data('name')] + '"]')
            .show()
            .addClass('active');
    } else {
        active.hide()
            .removeClass('active')
            .next('.step')
            .show()
            .addClass('active');
    }
}

function nextPersonalia() {
    var active = $('.active');

    if(active.children('h2').html() === 'Kommune') {
        $('#personalia').hide();
        $('#opinions').show();
    } else {
        if(choices[active.data('name')]) {
            showNextFormGroup(active);
        } else {
            alert('You have to choose an option.')
        }
    }
}

function setChoice(el) {
    var radio = $(el);

    choices[radio.attr('name')] = radio.val();
}

/*
 * Generates Radio button HTML
 * for each option
 */

function createOptions(title, value) {
    var html = '';

    html +=
        '<div class="radio">' +
            '<label>'+
                '<input type="radio" name="' + title + '" value="' + value + '" onClick="setChoice(this)">' +
                value +
            '</label>' +
        '</div>';

    return html;
}

/*
 * Generates HTML to defining user info.
 */
function buildFormGroup(object, title) {
    title = typeof title !== 'undefined' ? title : object.title;

    //console.log(object);
    var html = '',
        isObject = false;

    html += '<div class="personalia-step step form-group" data-name="' + object.slug + '" data-identifier="' + title + '">' +
    '<h2>' + object.title + '</h2>';

    $.each(object.options, function(index, value) {

        if($.isPlainObject(value)){
            value = index;
            isObject = true;
        }

        html += createOptions(object.slug, value);
    });

    html += '</div>';

    /*
     * If the value is also an object
     * we create form groups for the contents
     */
    if(isObject) {

        $.each(object.options, function(index, value) {
            //console.log(index);
            html += buildFormGroup(value, index);
        });
    }
    return html;
}


/*
 * Initiates the building of introductory questions
 *
 * Iterates through all the questions
 * and builds a form group for each.
 */
function buildPersonaliaForm(personalia) {
    var html = '';

    $.each(personalia, function(type, object) {
        html += buildFormGroup(object);
    });

    $('#personalia .col-sm-12').prepend(html);
    $('.personalia-step').hide().first().show().addClass('active');
}

function calculateScore() {
    var html = '';
    var sortable = [];

    for (var key in parties) {
        if(key !== 'Andre' && key !== 'Stemte ikke') {
            sortable.push([key, parties[key]])
        }
    }

    sortable.sort(function(a, b) {return b[1] - a[1]})

    $.each(sortable, function(index, value) {
        html += '<tr><td>' + value[0] + '</td><td>' + value[1] + '</td></tr>'
    });

    $('tbody.parties').html(html);
}

/*
 * Executes when the user proceeds to the
 * part of the app where statements are given
 * and the user either agrees or dissagrees
 *
 * Displays the correct statement
 *
 * Will hide the "opinions"-part of the application when
 * all statements has been answered.
 */

function setOpinion() {
    var el = $('#opinion');
    var index = el.data('index');

    if(typeof(index) !== 'number') {
        index = 0;
    } else {
        index++;
    }

    if(opinions[index]) {
        el.data('index', index);
        el.data('id', opinions[index].id);
        el.html(opinions[index].content);
        $('#category').html(opinions[index].category.name);
    } else {
        $('#opinions').hide();
        $('#results').show();
        calculateScore();

        storeUser();
    }
}

/*
 * Executed when the user selects
 * the level of agreement to the given statement
 *
 * Sets the value in the opinions-array and show the
 * "importance"-buttons
 */

function userChoice(el) {
    if(!choices['opinions']) {
        choices['opinions'] = [];
    }


    var value = $(el).data('value')
    if(value === 0) {
        setOpinion();
    } else {
        $('#importance').show();
    }
    var id = $('#opinion').data('id');
    choices['opinions'][id] = value;
}


/*
 * Executed when user selects
 * how important the question is to him/her
 *
 * Multiplies the value by the level of importance and shows the next question.
 */
function userLevelOfImportance(el) {

    var value = $(el).data('value')
    var id = $('#opinion').data('id');
    choices['opinions'][id] = choices['opinions'][id]*value;

    var el = $('#opinion');
    var index = el.data('index');

    console.log(choices['opinions'][id]);
    $.each(opinions[index].parties, function(index, value){
        parties[value.name] += choices['opinions'][id];
    });
    console.log(parties);

    //$('#opinions').show();
    $('#importance').hide();
    setOpinion();
}


/*
 * Ajax calls
 */
var opinions = {};
var parties = [];

function getOpinions () {
    $.get(
        '/api/opinions',
        function(data) {
            opinions = data;
            setOpinion();
        }
    )
}

function getParties() {
    $.get(
        '/api/parties',
        function(data) {
            $.each(data, function(index, value) {
                parties[value] = 0;
            });
        }
    );
}

function getPersonalia () {
    $.get(
        '/api/personalia',
        function(data) {
            buildPersonaliaForm(data.personalia);

            getOpinions();
            getParties();
        }
    );
}

function storeUser() {
    console.log(choices);
    $.post(
        '/api/store',
        {
            'gender': choices['gender'],
            'age': choices['age'],
            'income': choices['income'],
            'last_vote': choices['last_vote'],
            'will_vote': choices['will_vote'],
            'political_view': choices['political_view'],
            'region': choices['region'],
            'municipality': choices['municipality'],
            'opinions': choices['opinions']
        }
    ).done(function(response) {
            console.log(response);
        });
}