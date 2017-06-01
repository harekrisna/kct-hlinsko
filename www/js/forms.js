$(document).ready(function(){
    $.fn.datepicker.dates['cs'] = {
        days: ["Neděle", "Pondělí", "Úterý", "Středa", "Čtvrtek", "Pátek", "Sobota"],
        daysShort: ["Ned", "Pon", "Úte", "Stř", "Čtv", "Pát", "Sob"],
        daysMin: ["Ne", "Po", "Út", "St", "Čt", "Pá", "So"],
        months: ["Leden", "Únor", "Březen", "Duben", "Květen", "Červen", "Červenec", "Srpen", "Září", "Říjen", "Listopad", "Prosinec"],
        monthsShort: ["Led", "Úno", "Bře", "Dub", "Kvě", "Čer", "Čnc", "Srp", "Zář", "Říj", "Lis", "Pro"],
        today: "Dnes",
        clear: "Vymazat",
        monthsTitle: "Měsíc",
        weekStart: 1,
        format: "dd.mm.yyyy"
    };
    $('div.input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        language: 'cs',
    }); 

    $('input.datepicker').keydown(function(event) {
        if(event.keyCode == 8) {
            event.preventDefault();
            $(this).val("");
        }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "Toto pole je povinné.",
        number: "Prosím zadejte validní číslo.",
        min: "Prosím zadejte čílo větší než 0.",
    });

    $("#frm-form").validate();
});

var webalize = function (str) {
    var charlist;
    charlist = [
        ['Á','A'], ['Ä','A'], ['Č','C'], ['Ç','C'], ['Ď','D'], ['É','E'], ['Ě','E'],
        ['Ë','E'], ['Í','I'], ['Ň','N'], ['Ó','O'], ['Ö','O'], ['Ř','R'], ['Š','S'],
        ['Ť','T'], ['Ú','U'], ['Ů','U'], ['Ü','U'], ['Ý','Y'], ['Ž','Z'], ['á','a'],
        ['ä','a'], ['č','c'], ['ç','c'], ['ď','d'], ['é','e'], ['ě','e'], ['ë','e'],
        ['í','i'], ['ň','n'], ['ó','o'], ['ö','o'], ['ř','r'], ['š','s'], ['ť','t'],
        ['ú','u'], ['ů','u'], ['ü','u'], ['ý','y'], ['ž','z']
    ];
    for (var i in charlist) {
        var re = new RegExp(charlist[i][0],'g');
        str = str.replace(re, charlist[i][1]);
    }
    
    str = str.replace(/[^a-z0-9]/ig, '-');
    str = str.replace(/\-+/g, '-');
    if (str[0] == '-') {
        str = str.substring(1, str.length);
    }
    if (str[str.length - 1] == '-') {
        str = str.substring(0, str.length - 1);
    }
    
    return str.toLowerCase();
}