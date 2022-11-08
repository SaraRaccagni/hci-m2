<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable="no">
    
    <title>Create new itinerary</title>
    
     <!-- Style Sheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/style.css">
   

    <!-- jQuery e plugin JavaScript to use Bootstrap  -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/myScript.js"></script><!--script Javascript scritto da me-->

</head>

<body>
<nav class="navbar-default-top navbar-fixed-top">
        
        <div class="container text-center">

            <div class="header-logo">
                <img src="img/logo.png" width="41" height="60"\>
            </div>

            <!-- <div class="nav-menu">
                <div id="burger-wrap">
                    <a class="burger"><span></span></a>
                </div>
                <div class="menu-list">
                    <ul>
                        <li><a href="mapa_index.php">Mapa</a></li>
                        <li><a href="projeto.html">Sobre</a></li>
                        <li><a href="equipa.html">A Equipa</a></li>
                        <li><a href="palavra.html">Inserir Palavra</a></li>
                    </ul>
                </div>
            </div>
            <script src="menu.js"></script>
        </div> -->
        <div class="container text-center">
            <h4>New Itinerary</h4>
        </div>

</nav>



    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-offset-2">
                <h2>
                    {{ trans('labels.insertMsg') }}
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if(isset($reservation->id))
                <form class="form-horizontal" name="reservation" method="get" action="{{ route('reservation.update', ['id' => $reservation->id]) }}">
                @else
                <form class="form-horizontal" name="reservation" method="post" action="{{ route('reservation.store') }}">
                @endif
                    @csrf
                    <div class="form-group">
                        <label class="col-md-2" for="firstName">{{ trans('labels.firstName') }}</label>
                        <div class="col-md-10">
                            @if(isset($reservation->id))
                            <input class="form-control" type="text" id="firstName" name="firstName" placeholder="{{ trans('labels.firstName') }}" value="{{ $reservation->user_name }}">
                            @else
                            <input class="form-control" type="text" id="firstName" name="firstName" placeholder="{{ trans('labels.firstName') }}" value="{{ $user->firstName }}">
                            @endif
                            <span class="invalid-input" id="invalid-firstName"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2" for="lastName">{{ trans('labels.lastName') }}</label>
                        <div class="col-md-10">
                            @if(isset($reservation->id))
                            <input class="form-control" type="text" id="lastName" name="lastName" placeholder="{{ trans('labels.lastName') }}" value="{{ $reservation->user_surname }}">
                            @else
                            <input class="form-control" type="text" id="lastName" name="lastName" placeholder="{{ trans('labels.lastName') }}" value="{{ $user->lastName }}">
                            @endif
                            <span class="invalid-input" id="invalid-lastName"></span>
                        </div>
                    </div>
                    


                    <div class="form-group">
                        <label class="col-md-2" for="date">{{ trans('labels.date') }}</label>
                        <div class="col-md-10">
                        @if(isset($reservation->id))
                        <input class="form-control" type="text" id="date" name="date" value="{{ $reservation->date }}"/>
                        @else
                        <input class="form-control" type="text" id="date" name="date" value=""/>
                        @endif
                        <span class="invalid-input" id="invalid-date"></span>
                        </div>
                    </div>

                    <script>
                    var exclude = ["08/12/2022","24/12/2022","25/12/2022", "26/12/2022","31/12/2022", "01/01/2023", "06/01/2023"]

                    var dateToday = new Date();
                    $("#date").datepicker({
                        dateFormat: 'dd-mm-yy',
                        minDate: dateToday,
                        beforeShowDay: function(date) {
                            var day = jQuery.datepicker.formatDate('dd/mm/yy', date);//per avere compatibilità con il formato usato per le date da escludere
                            return [!~$.inArray(day, exclude) && (date.getDay() != 0)];//in questo modo disabilita le date escluse e i giorni 0 ovvero la domenica (sunday)
                        }
                    });

                    $('#date').click(function() {
                        document.getElementById("court-block").style.display = "none";
                        document.getElementById("time-block").style.display = "none";
                    });
                        
                    $('#date').change(function() {
                            document.getElementById("court-block").style.display = "block";
                            
                        var date = $(this).val();
                        //alert(date);

                        $.ajax({
                            type: 'GET',
                            url: '/ajaxReservationCourt',
                            data: {dateAjax: date},
                            success: function (data) {
                               //console.log(data.courtAvailable);
                                var stringa="<option value=\"\"></option>";
                                for (let i=0; i<data.courtAvailable.length; i++){
                                    stringa=stringa.concat("<option value=".concat(data.courtAvailable[i][0][6]).concat(">{{ trans('labels.court') }} ".concat(data.courtAvailable[i][0][6]).concat("</option>")))
                                }
                                $('#court').html(stringa);
                                

                            }
                        });

                        });

                    </script>

                    @if((isset($reservation->id)))
                    <div class="form-group" id="court-block">
                        <label class="col-md-2" for="court">{{ trans('labels.court') }}</label>
                        <div class="col-md-10">
                            <select class="form-control" id="court" name="court">
                            <option value=""> </option>
                                @foreach($courtList as $court)
                                    @if(($court[0][6] == $reservation->court_id))
                                    <option value="{{ $court[0][6] }}" selected="selected">{{ trans('labels.court') }} {{ $court[0][6] }}</option>
                                    @else
                                    <option value="{{ $court[0][6] }}">{{ trans('labels.court') }} {{ $court[0][6] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="invalid-input" id="invalid-court"></span>
                        </div>
                    </div>
                    @else
                    <div class="form-group" id="court-block" hidden>
                        <label class="col-md-2" for="court">{{ trans('labels.court') }}</label>
                        <div class="col-md-10">
                            <select class="form-control" id="court" name="court">
                                
                            </select>
                            <span class="invalid-input" id="invalid-court"></span>
                        </div>
                    </div>
                    @endif
                        

                    @if((isset($reservation->id)))
                    <div class="form-group" id="time-block">
                        <label class="col-md-2" for="time" >{{ trans('labels.time') }}</label>
                        <div class="col-md-10">
                        <select class="form-control" id="time" name="time">
                        <option value=""></option>
                        @foreach($optionList as $opt)
                                @if(($opt[0] == $reservation->time))
                                    <option value="{{ $opt[0] }}" selected="selected">{{ $opt[1] }}</option>
                                @endif
                        @endforeach
                        @foreach($optionListAvailable as $opt)
                               
                                    <option value="{{ $opt[0] }}">{{ $opt[1] }}</option>
                                
                            @endforeach
                        </select>
                        <span class="invalid-input" id="invalid-time"></span>
                        </div>
                    </div>
                    @else
                    <div class="form-group" id="time-block" hidden>
                        <label class="col-md-2" for="time" >{{ trans('labels.time') }}</label>
                        <div class="col-md-10">
                        <select class="form-control" id="time" name="time">
                            
                        </select>
                        <span class="invalid-input" id="invalid-time"></span>
                        </div>
                    </div>
                    @endif
                        

                    <script>
                        
                        
                        $('#court').change(function() {
                       
                        document.getElementById("time-block").style.display = "block";

                        var court = $(this);
                        var courtId = court.val();
                        var date= $('#date').val();
                        //alert(courtId);
                        //alert(date);
                        

                        $.ajax({
                            type: 'GET',
                            url: '/ajaxReservationTime',
                            data: {courtIdAjax: courtId, dateAjax: date},
                            success: function (data) {
                                console.log(data.price[0]['hourlyCost']);
                                var stringa="<option value=\"\"></option>";
                                if(data.timeAvailable!=""){
                                    for (let i=0; i<data.timeAvailable.length; i++){
                                    stringa=stringa.concat("<option value=".concat(data.timeAvailable[i][0]).concat(">".concat(data.timeAvailable[i][1]).concat("</option>")))
                                }
                                }
                                
                                $('#time').html(stringa);
                                
                                $('#price').val(data.price[0]['hourlyCost']);
                                $('#price-hidden').val(data.price[0]['hourlyCost']);
                            }
                        });

                        });
                    
                    
                    </script>

                    <div class="form-group">
                        <label class="col-md-2" for="price">Hourly price</label>
                        <div class="col-md-10">
                        @if(isset($reservation->id))
                            <input class="form-control" id="price" type="text" value="{{ $reservation->price }}" disabled></input>
                            <input class="form-control hidden" id="price-hidden" type="text" name="price-hidden" value="{{ $reservation->price }}"></input>
                        @else
                            <input class="form-control" id="price" type="text" disabled></input>
                            <input class="form-control hidden" id="price-hidden" type="text" name="price-hidden" ></input>
                        @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2" for="phone">{{ trans('labels.phone') }}</label>
                        <div class="col-md-10">
                        @if(isset($reservation->id))
                            <input class="form-control" id="phone" type="text" name="phone" placeholder="+39" value="{{ $reservation->phone }}">
                        @else
                        <input class="form-control" id="phone" type="text" name="phone" placeholder="+39" value="{{ $user->phone }}">
                        @endif
                        <span class="invalid-input" id="invalid-phone"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2" for="comment">{{ trans('labels.comment') }}</label>
                        <div class="col-md-10">
                        @if(isset($reservation->id))
                            <textarea class="form-control" id="comment" type="text" name="comment" rows="3">{{ $reservation->comment }}</textarea>
                        @else
                            <textarea class="form-control" id="comment" type="text" name="comment" rows="3"></textarea>
                        @endif
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                        @if(isset($reservation->id))
                        <input type="hidden" name="id" value="{{ $reservation->id }}"/><!--nel caso di Edit devo passare alla form anche l'id nascosto-->
                        <label for="mySubmit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-floppy-save"></span>{{ trans('labels.save') }}</label>
                        <input id="mySubmit" type="submit" value="Save" class="hidden" onclick="event.preventDefault(); checkReservation()"/>
                        @else
                        <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span>{{ trans('labels.reserve') }}</label>
                        <input id="mySubmit" type="submit" value="Create" class="hidden" onclick="event.preventDefault(); checkReservation()"/>
                        @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <a class="btn btn-danger btn-block" href="{{ route('reservation.index') }}">{{ trans('labels.cancel') }}</a>
                            <!--btn-danger da il colore rosso
                                btn-block fa si che il bottone occupi tutto il blocco orizzontale
                                PERMETTE ALL'UTENTE DI TORNARE INDIETRO NELL'APPLICAZIONE-->
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <nav class="navbar-default-bottom navbar-fixed-bottom">
        <div class="container">

            <a class="navbar-brand-feed" href="feed.html">Feed</a>
            <a class="navbar-brand-map" href="mapa_index.php">Map</a>
            <a class="navbar-brand-itinerary" href="itinerary.html">Itinerary</a>
            <a class="navbar-brand-profile" href="profile.html">Profile</a>

        </div>
    </nav>

</body>

</html>

