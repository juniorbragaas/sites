/**
 * @license e-Calendar v0.9.3
 * (c) 2014-2016 - Jhonis de Souza
 * License: GNU
 */

(function ($) {

    var eCalendar = function (options, object) {
        // Initializing global variables
        var adDay = new Date().getDate();
        var adMonth = new Date().getMonth();
        var adYear = new Date().getFullYear();
        var dDay = adDay;
        var dMonth = adMonth;
        var dYear = adYear;
        var instance = object;

        var settings = $.extend({}, $.fn.eCalendar.defaults, options);

        function lpad(value, length, pad) {
            if (typeof pad == 'undefined') {
                pad = '0';
            }
            var p;
            for (var i = 0; i < length; i++) {
                p += pad;
            }
            return (p + value).slice(-length);
        }

        var mouseOver = function () {
            $(this).addClass('c-nav-btn-over');
        };
        var mouseLeave = function () {
            $(this).removeClass('c-nav-btn-over');
        };
        var mouseOverEvent = function () {
            $(this).addClass('c-event-over');
            var d = $(this).attr('data-event-day');
            $('div.c-event-item[data-event-day="' + d + '"]').addClass('c-event-over');
        };
        var mouseLeaveEvent = function () {
            $(this).removeClass('c-event-over')
            var d = $(this).attr('data-event-day');
            $('div.c-event-item[data-event-day="' + d + '"]').removeClass('c-event-over');
        };
        var mouseOverItem = function () {
            $(this).addClass('c-event-over');
            var d = $(this).attr('data-event-day');
            $('div.c-event[data-event-day="' + d + '"]').addClass('c-event-over');
        };
        var mouseLeaveItem = function () {
            $(this).removeClass('c-event-over')
            var d = $(this).attr('data-event-day');
            $('div.c-event[data-event-day="' + d + '"]').removeClass('c-event-over');
        };
        var nextMonth = function () {
            if (dMonth < 11) {
                dMonth++;
            } else {
                dMonth = 0;
                dYear++;
            }
            print();
        };
        var previousMonth = function () {
            if (dMonth > 0) {
                dMonth--;
            } else {
                dMonth = 11;
                dYear--;
            }
            print();
        };

        function loadEvents() {
            if (typeof settings.url != 'undefined' && settings.url != '') {
                $.ajax({url: settings.url,
                    async: false,
                    success: function (result) {
                        settings.events = result;
                    }
                });
            }
        }

        function print() {
            loadEvents();
            var dWeekDayOfMonthStart = new Date(dYear, dMonth, 1).getDay() - settings.firstDayOfWeek;
            if (dWeekDayOfMonthStart < 0) {
                dWeekDayOfMonthStart = 6 - ((dWeekDayOfMonthStart + 1) * -1);
            }
            var dLastDayOfMonth = new Date(dYear, dMonth + 1, 0).getDate();
            var dLastDayOfPreviousMonth = new Date(dYear, dMonth + 1, 0).getDate() - dWeekDayOfMonthStart + 1;

            var cBody = $('<div/>').addClass('c-grid');
            var cEvents = $('<div/>').addClass('c-event-grid');
            var cEventsBody = $('<div/>').addClass('c-event-body');
            cEvents.append($('<div/>').addClass('c-event-title c-pad-top').html(settings.eventTitle));
            cEvents.append(cEventsBody);
            var cNext = $('<div/>').addClass('c-next c-grid-title c-pad-top');
            var cMonth = $('<div/>').addClass('c-month c-grid-title c-pad-top');
            var cPrevious = $('<div/>').addClass('c-previous c-grid-title c-pad-top');
            cPrevious.html(settings.textArrows.previous);
            cMonth.html(settings.months[dMonth] + ' ' + dYear);
            cNext.html(settings.textArrows.next);

            cPrevious.on('mouseover', mouseOver).on('mouseleave', mouseLeave).on('click', previousMonth);
            cNext.on('mouseover', mouseOver).on('mouseleave', mouseLeave).on('click', nextMonth);

            cBody.append(cPrevious);
            cBody.append(cMonth);
            cBody.append(cNext);
            var dayOfWeek = settings.firstDayOfWeek;
            for (var i = 0; i < 7; i++) {
                if (dayOfWeek > 6) {
                    dayOfWeek = 0;
                }
                var cWeekDay = $('<div/>').addClass('c-week-day c-pad-top');
                cWeekDay.html(settings.weekDays[dayOfWeek]);
                cBody.append(cWeekDay);
                dayOfWeek++;
            }
            var day = 1;
            var dayOfNextMonth = 1;
            for (var i = 0; i < 42; i++) {
                var cDay = $('<div/>');
                if (i < dWeekDayOfMonthStart) {
                    cDay.addClass('c-day-previous-month c-pad-top');
                    cDay.html(dLastDayOfPreviousMonth++);
                } else if (day <= dLastDayOfMonth) {
                    cDay.addClass('c-day c-pad-top');
                    if (day == dDay && adMonth == dMonth && adYear == dYear) {
                        cDay.addClass('c-today');
                    }
                    for (var j = 0; j < settings.events.length; j++) {
                        var d = settings.events[j].datetime;
                        if (d.getDate() == day && d.getMonth() == dMonth && d.getFullYear() == dYear) {
                            cDay.addClass('c-event').attr('data-event-day', d.getDate());
                            cDay.on('mouseover', mouseOverEvent).on('mouseleave', mouseLeaveEvent);
                        }
                    }
                    cDay.html(day++);
                } else {
                    cDay.addClass('c-day-next-month c-pad-top');
                    cDay.html(dayOfNextMonth++);
                }
                cBody.append(cDay);
            }
            var eventList = $('<div/>').addClass('c-event-list');
            for (var i = 0; i < settings.events.length; i++) {
                var d = settings.events[i].datetime;
                if (d.getMonth() == dMonth && d.getFullYear() == dYear) {
                    var date = lpad(d.getDate(), 2) + '/' + lpad(d.getMonth() + 1, 2) + ' ' + lpad(d.getHours(), 2) + ':' + lpad(d.getMinutes(), 2);
                    var item = $('<div/>').addClass('c-event-item');
                    var title = $('<div/>').addClass('title').html(date + '  ' + settings.events[i].title + '<br/>');
                    var description = $('<div/>').addClass('description').html(settings.events[i].description + '<br/>');
                    item.attr('data-event-day', d.getDate());
                    item.on('mouseover', mouseOverItem).on('mouseleave', mouseLeaveItem);
                    item.append(title).append(description);

                    // Add the url to the description if is set
                    if( settings.events[i].url !== undefined )
                    {
                        /**
                         * If the setting url_blank is set and is true, the target of the url
                         * will be "_blank"
                         */
                        type_url = settings.events[i].url_blank !== undefined && 
                                   settings.events[i].url_blank === true ? 
                                   '_blank':'';
                        description.wrap( '<a href="'+ settings.events[i].url +'" target="'+type_url+'" ></a>' );
                    }

                    eventList.append(item);
                }
            }
            $(instance).addClass('calendar');
            cEventsBody.append(eventList);
            $(instance).html(cBody).append(cEvents);
        }

        return print();
    }

    $.fn.eCalendar = function (oInit) {
        return this.each(function () {
            return eCalendar(oInit, $(this));
        });
    };

    // plugin defaults
    $.fn.eCalendar.defaults = {
        weekDays: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        textArrows: {previous: '<', next: '>'},
        eventTitle: 'Eventos',
        url: '',
        events: [
           {title: 'Evento De Teste', description: 'Evento De Teste', datetime: new Date(2017,0,3, 17),url:'www.google.com'},{title: 'Evento De Teste', description: 'Evento De Teste', datetime: new Date(2017,0,3, 17),url:'www.google.com'},{title: 'Evento De Teste', description: 'Evento De Teste', datetime: new Date(2017,0,3, 17),url:'www.google.com'},{title: '9º Aniversário Do Moto Grupo Fantasma Da Estrada', description: '9º Aniversário Do Moto Grupo Fantasma Da Estrada', datetime: new Date(2017,0,10, 17),url:'www.google.com'},{title: '9º Aniversário Moto Fantasma Da Estrada ', description: '9º Aniversário Moto Fantasma Da Estrada ', datetime: new Date(2017,0,14, 17),url:'www.google.com'},{title: '10º Encontro Nacional De Motociclistas Do Morro Do Ferro', description: '10º Encontro Nacional De Motociclistas Do Morro Do Ferro', datetime: new Date(2017,0,20, 17),url:'www.google.com'},{title: '3º Aniversário Pcm Motoclube Em Conselheiro Lafaiete/mg', description: '3º Aniversário Pcm Motoclube Em Conselheiro Lafaiete/mg', datetime: new Date(2017,1,11, 17),url:'www.google.com'},{title: '4º Encontro Nacional De Motociclistas Das Lajes / Resende Costa/mg', description: '4º Encontro Nacional De Motociclistas Das Lajes / Resende Costa/mg', datetime: new Date(2017,2,24, 17),url:'www.google.com'},{title: '12º Moto Fest De Barroso', description: '12º Moto Fest De Barroso', datetime: new Date(2017,4,26, 17),url:'www.google.com'},{title: '6° Encontro Nacional De Motociclistas ', description: '6° Encontro Nacional De Motociclistas ', datetime: new Date(2017,9,13, 17),url:'www.google.com'},{title: '7º Encontro Nacional De Motociclistas Em São João Del Rei', description: '7º Encontro Nacional De Motociclistas Em São João Del Rei', datetime: new Date(2017,8,1, 17),url:'www.google.com'},{title: 'Multas De Trânsito', description: 'Multas De Trânsito', datetime: new Date(2017,0,10, 17),url:'www.google.com'},{title: 'Encontro Motociclistas No Morro Do Ferro', description: 'Encontro Motociclistas No Morro Do Ferro', datetime: new Date(2017,0,20, 17),url:'www.google.com'},{title: 'Yamaha Tricity 125', description: 'Yamaha Tricity 125', datetime: new Date(2017,1,22, 17),url:'www.google.com'},{title: 'Clinica Bem Estar - Excelência Em Fisioterapia', description: 'Clinica Bem Estar - Excelência Em Fisioterapia', datetime: new Date(2017,1,3, 17),url:'www.google.com'},{title: '4º Encontro Nacional De Motociclistas Das Lajes - Resende Costa', description: '4º Encontro Nacional De Motociclistas Das Lajes - Resende Costa', datetime: new Date(2017,2,1, 17),url:'www.google.com'},{title: 'Serra Do Rio Do Rastro - Poderá Ter Pedágio', description: 'Serra Do Rio Do Rastro - Poderá Ter Pedágio', datetime: new Date(2017,0,11, 17),url:'www.google.com'},{title: 'Formatura Aventureira Juliana', description: 'Formatura Aventureira Juliana', datetime: new Date(2017,0,16, 17),url:'www.google.com'},{title: 'Inauguração Da Unidade Águias De Cristo Em São João Del Rei', description: 'Inauguração Da Unidade Águias De Cristo Em São João Del Rei', datetime: new Date(2017,0,20, 17),url:'www.google.com'},{title: 'Aniversário Do Serginho', description: 'Aniversário Do Serginho', datetime: new Date(2017,0,28, 17),url:'www.google.com'},{title: 'Inauguração Da Unidade Águias De Cristo Em São João Del Rei', description: 'Inauguração Da Unidade Águias De Cristo Em São João Del Rei', datetime: new Date(2017,0,21, 17),url:'www.google.com'},{title: '9º Lambari Moto Fest', description: '9º Lambari Moto Fest', datetime: new Date(2017,9,20, 17),url:'www.google.com'},{title: '1º Bike Fest Em São Lourenço', description: '1º Bike Fest Em São Lourenço', datetime: new Date(2017,4,26, 17),url:'www.google.com'},{title: '15º Encontro Internacional De Motociclistas - Congonhas/mg', description: '15º Encontro Internacional De Motociclistas - Congonhas/mg', datetime: new Date(2017,6,7, 17),url:'www.google.com'},{title: '16º Encontro De Motociclistas - Bom Despacho/mg', description: '16º Encontro De Motociclistas - Bom Despacho/mg', datetime: new Date(2017,6,14, 17),url:'www.google.com'},{title: '4º Encontro Nacional De Motociclistas De Nazareno - Nazareno/mg', description: '4º Encontro Nacional De Motociclistas De Nazareno - Nazareno/mg', datetime: new Date(2017,5,2, 17),url:'www.google.com'},{title: '1º Encontro De Motociclistas De Capela Nova - Capela Nova/mg', description: '1º Encontro De Motociclistas De Capela Nova - Capela Nova/mg', datetime: new Date(2017,3,21, 17),url:'www.google.com'},{title: 'Polícia Rodoviária Federal - Nota Técnica Instrutiva Sobre Caracterização De Eventos Em Rodoviais', description: 'Polícia Rodoviária Federal - Nota Técnica Instrutiva Sobre Caracterização De Eventos Em Rodoviais', datetime: new Date(2017,0,21, 17),url:'www.google.com'},{title: 'Brasão Infantil', description: 'Brasão Infantil', datetime: new Date(2017,0,25, 17),url:'www.google.com'},{title: '1º Encontro De Triciclos De Conselheiro Lafaiete - Encontro De Motociclistas', description: '1º Encontro De Triciclos De Conselheiro Lafaiete - Encontro De Motociclistas', datetime: new Date(2017,0,28, 17),url:'www.google.com'},{title: '3º Encontro De Motociclistas De Claúdio', description: '3º Encontro De Motociclistas De Claúdio', datetime: new Date(2017,2,30, 17),url:'www.google.com'},{title: '10° Encontro Nacional De Motociclistas Manhuaçú', description: '10° Encontro Nacional De Motociclistas Manhuaçú', datetime: new Date(2017,4,26, 17),url:'www.google.com'},{title: '8° Cataratas Moto Fest', description: '8° Cataratas Moto Fest', datetime: new Date(2017,4,11, 17),url:'www.google.com'},{title: '3° Aniversário Kombat Mc', description: '3° Aniversário Kombat Mc', datetime: new Date(2017,2,17, 17),url:'www.google.com'},{title: '2° Encontro Nacional De Motociclistas', description: '2° Encontro Nacional De Motociclistas', datetime: new Date(2017,2,2, 17),url:'www.google.com'},{title: '2° Moto Fest Água Doce Do Norte', description: '2° Moto Fest Água Doce Do Norte', datetime: new Date(2017,1,4, 17),url:'www.google.com'},{title: '2°encontro De Motociclistas De Desterro De Entre Rios', description: '2°encontro De Motociclistas De Desterro De Entre Rios', datetime: new Date(2017,4,19, 17),url:'www.google.com'},{title: 'Encontro Internacional De Motociclismo', description: 'Encontro Internacional De Motociclismo', datetime: new Date(2017,3,20, 17),url:'www.google.com'},{title: '3° Aniversário Hoad Bull', description: '3° Aniversário Hoad Bull', datetime: new Date(2017,4,6, 17),url:'www.google.com'},{title: 'Aniversário Classic Event', description: 'Aniversário Classic Event', datetime: new Date(2017,7,5, 17),url:'www.google.com'},{title: 'Point Unificado Em Conselheiro Lafaiete', description: 'Point Unificado Em Conselheiro Lafaiete', datetime: new Date(2017,1,24, 17),url:'www.google.com'},{title: 'Confraternização Aventureiros Do Araguaia', description: 'Confraternização Aventureiros Do Araguaia', datetime: new Date(2017,1,25, 17),url:'www.google.com'},{title: 'Honda Mostra Conceito De Moto Que Fica De Pé, Mesmo Sem Apoio.', description: 'Honda Mostra Conceito De Moto Que Fica De Pé, Mesmo Sem Apoio.', datetime: new Date(2017,0,30, 17),url:'www.google.com'},{title: 'Xix Encontro Nacional De Motociclistas', description: 'Xix Encontro Nacional De Motociclistas', datetime: new Date(2017,1,3, 17),url:'www.google.com'},{title: '19º Encontro Nacional De Motociclistas Barbacena/mg - Paróquia De Santo Antônio', description: '19º Encontro Nacional De Motociclistas Barbacena/mg - Paróquia De Santo Antônio', datetime: new Date(2017,1,2, 17),url:'www.google.com'},{title: 'Aventureiros Presentes No 4° Niver Legendários Moto Clube', description: 'Aventureiros Presentes No 4° Niver Legendários Moto Clube', datetime: new Date(2017,1,12, 17),url:'www.google.com'},{title: 'Aventureiros Presentes Na Casa Do Senhor Thomaz', description: 'Aventureiros Presentes Na Casa Do Senhor Thomaz', datetime: new Date(2017,1,5, 17),url:'www.google.com'},{title: 'Voo Mais Longo Do Mundo Chega À Nova Zelândia', description: 'Voo Mais Longo Do Mundo Chega À Nova Zelândia', datetime: new Date(2017,1,7, 17),url:'www.google.com'},{title: 'Nova Honda Xre 190 2017', description: 'Nova Honda Xre 190 2017', datetime: new Date(2017,1,10, 17),url:'www.google.com'},{title: '4° Aniversário Mc Legendários', description: '4° Aniversário Mc Legendários', datetime: new Date(2017,1,11, 17),url:'www.google.com'},{title: 'Posse Diretoria Amem', description: 'Posse Diretoria Amem', datetime: new Date(2017,2,19, 17),url:'www.google.com'},{title: 'Miraí Moto Fest', description: 'Miraí Moto Fest', datetime: new Date(2017,6,7, 17),url:'www.google.com'},{title: 'Vigo Lança Protótipo Moto Elétrica', description: 'Vigo Lança Protótipo Moto Elétrica', datetime: new Date(2017,1,12, 17),url:'www.google.com'},{title: '3° Aniversário Cavaleiros Imperial Moto Clube', description: '3° Aniversário Cavaleiros Imperial Moto Clube', datetime: new Date(2017,1,12, 17),url:'www.google.com'},{title: 'Moto Centenária É Vendida', description: 'Moto Centenária É Vendida', datetime: new Date(2017,1,16, 17),url:'www.google.com'},{title: 'Presidente Homenageia Moto Clube Cavalheiros Imperial', description: 'Presidente Homenageia Moto Clube Cavalheiros Imperial', datetime: new Date(2017,1,16, 17),url:'www.google.com'},{title: 'Bmw F 800 Gs Adventure 2017', description: 'Bmw F 800 Gs Adventure 2017', datetime: new Date(2017,1,22, 17),url:'www.google.com'},{title: '1° Encontro Nacional De Motociclistas Em Capela Nova', description: '1° Encontro Nacional De Motociclistas Em Capela Nova', datetime: new Date(2017,3,21, 17),url:'www.google.com'},{title: 'Magos Motorcycle', description: 'Magos Motorcycle', datetime: new Date(2017,5,30, 17),url:'www.google.com'},{title: '8° Encontro Nacional De Motociclistas Leopoldina', description: '8° Encontro Nacional De Motociclistas Leopoldina', datetime: new Date(2017,3,21, 17),url:'www.google.com'},{title: 'Rock Nacional Campo Belo', description: 'Rock Nacional Campo Belo', datetime: new Date(2017,3,1, 17),url:'www.google.com'},{title: 'Aventureiros No Carnaval 2017', description: 'Aventureiros No Carnaval 2017', datetime: new Date(2017,2,1, 17),url:'www.google.com'},{title: '1º Moto Rock Lobo Doido - Santos Dumont', description: '1º Moto Rock Lobo Doido - Santos Dumont', datetime: new Date(2017,3,7, 17),url:'www.google.com'},{title: 'Tiger Sport 1050... Pura Emoção!', description: 'Tiger Sport 1050... Pura Emoção!', datetime: new Date(2017,2,3, 17),url:'www.google.com'},{title: '1º Moto Fest São José Da Barra', description: '1º Moto Fest São José Da Barra', datetime: new Date(2017,3,21, 17),url:'www.google.com'},{title: '7ª Confraternização De Motociclistas Em São Geraldo', description: '7ª Confraternização De Motociclistas Em São Geraldo', datetime: new Date(2017,3,15, 17),url:'www.google.com'},{title: 'Encontro Nota 1.000 - Encontro Das Lajes - Resende Costa', description: 'Encontro Nota 1.000 - Encontro Das Lajes - Resende Costa', datetime: new Date(2017,2,28, 17),url:'www.google.com'},{title: 'Inauguração Sede Social Foragidos Mc', description: 'Inauguração Sede Social Foragidos Mc', datetime: new Date(2017,2,18, 17),url:'www.google.com'},{title: 'Moto Festa Arcos 2017', description: 'Moto Festa Arcos 2017', datetime: new Date(2017,3,28, 17),url:'www.google.com'},{title: '2º Aniversário Mc Xerife's', description: '2º Aniversário Mc Xerife's', datetime: new Date(2017,3,8, 17),url:'www.google.com'},{title: 'Xiii Motorcycle', description: 'Xiii Motorcycle', datetime: new Date(2017,3,7, 17),url:'www.google.com'},{title: '14º Encontro Nacional De Motociclistas Ubá', description: '14º Encontro Nacional De Motociclistas Ubá', datetime: new Date(2017,5,9, 17),url:'www.google.com'},{title: '5º Encontro Nacional De Motociclistas De Urucânia', description: '5º Encontro Nacional De Motociclistas De Urucânia', datetime: new Date(2017,4,19, 17),url:'www.google.com'},{title: '5ª Invasão Do Bem - Tiradentes', description: '5ª Invasão Do Bem - Tiradentes', datetime: new Date(2017,3,28, 17),url:'www.google.com'},{title: '6º Encontro De Motociclistas De Santo Antônio Do Amparo', description: '6º Encontro De Motociclistas De Santo Antônio Do Amparo', datetime: new Date(2017,5,16, 17),url:'www.google.com'},{title: 'Furto Moto Halley Davidson', description: 'Furto Moto Halley Davidson', datetime: new Date(2017,3,2, 17),url:'www.google.com'},{title: '3º Encontro De Motociclistas Em Cláudio', description: '3º Encontro De Motociclistas Em Cláudio', datetime: new Date(2017,2,31, 17),url:'www.google.com'},{title: '2º Encontro De Motociclista De Antonio Dias ', description: '2º Encontro De Motociclista De Antonio Dias ', datetime: new Date(2017,3,7, 17),url:'www.google.com'},{title: 'Aniversário Santuário Moto Clube Em Nazareno', description: 'Aniversário Santuário Moto Clube Em Nazareno', datetime: new Date(2017,3,22, 17),url:'www.google.com'},{title: 'Inauguração Sede Boinas Preta Em São Vicente', description: 'Inauguração Sede Boinas Preta Em São Vicente', datetime: new Date(2017,3,30, 17),url:'www.google.com'},{title: 'Cnh A Partir De 2017 Terá Nova Cara', description: 'Cnh A Partir De 2017 Terá Nova Cara', datetime: new Date(2017,3,6, 17),url:'www.google.com'},{title: 'Pl 3245 Altera Cnh Categoria A', description: 'Pl 3245 Altera Cnh Categoria A', datetime: new Date(2017,3,6, 17),url:'www.google.com'},{title: 'Aventureiros Presentes No 22º Ostras Cycle - Rio Das Ostras', description: 'Aventureiros Presentes No 22º Ostras Cycle - Rio Das Ostras', datetime: new Date(2017,3,7, 17),url:'www.google.com'},{title: 'Primeira Pegada Dos 4 - Caraguatatuba - Sp', description: 'Primeira Pegada Dos 4 - Caraguatatuba - Sp', datetime: new Date(2017,3,29, 17),url:'www.google.com'},{title: 'Tuaregues Moto Fest - Angra Dos Reis', description: 'Tuaregues Moto Fest - Angra Dos Reis', datetime: new Date(2017,3,26, 17),url:'www.google.com'},{title: '2º Moto Fest Rio Novo / Mg', description: '2º Moto Fest Rio Novo / Mg', datetime: new Date(2017,3,15, 17),url:'www.google.com'},{title: '15 Anos Morcegão - Pará De Minas', description: '15 Anos Morcegão - Pará De Minas', datetime: new Date(2017,4,1, 17),url:'www.google.com'},{title: '4º Encontro Nacional Motociclistas Da Velha Guarda - Ribeirão Pires', description: '4º Encontro Nacional Motociclistas Da Velha Guarda - Ribeirão Pires', datetime: new Date(2017,4,6, 17),url:'www.google.com'},{title: 'Site Fora Do Ar', description: 'Site Fora Do Ar', datetime: new Date(2017,4,9, 17),url:'www.google.com'},{title: 'Nova Cnh Também Terá Qr-code Com Informações Do Motorista', description: 'Nova Cnh Também Terá Qr-code Com Informações Do Motorista', datetime: new Date(2017,4,10, 17),url:'www.google.com'},{title: 'Bike Fest Tiraddentes', description: 'Bike Fest Tiraddentes', datetime: new Date(2017,5,21, 17),url:'www.google.com'},{title: 'Apresentação Brasão Kids', description: 'Apresentação Brasão Kids', datetime: new Date(2017,4,13, 17),url:'www.google.com'},{title: 'Feliz Dia Das Mães', description: 'Feliz Dia Das Mães', datetime: new Date(2017,4,13, 17),url:'www.google.com'},{title: 'Indian Investe Em Tela Multimídia Para Os Modelos Chieftain E Roadmaster 2017', description: 'Indian Investe Em Tela Multimídia Para Os Modelos Chieftain E Roadmaster 2017', datetime: new Date(2017,4,12, 17),url:'www.google.com'}
    
        ],
        firstDayOfWeek: 0
    };

}(jQuery));