<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <title>Delicious</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.css" rel="stylesheet">
            <!-- Custom styles for this template -->
            <link href="css/main.css" rel="stylesheet">
            <link rel="stylesheet" href="fullcalendar/dist/fullcalendar.css"/>
            <link rel="stylesheet" href="fullcalendar/dist/fullcalendar.print.css" media='print'/>
            <script src="/js/app.js"></script>
            <script src="http://platform.fatsecret.com/js?key=4657f9ac84724aba84a5b760d568b110"></script>
            <script src='fullcalendar/node_modules/jquery/dist/jquery.min.js'></script>
            <script src='js/jquery-ui-1.12.1.custom/jquery-ui.js'></script>
            <script src='fullcalendar/node_modules/moment/moment.js'></script>
            <script src='fullcalendar/dist/fullcalendar.js'></script> 
            <!-- Styles -->
            <link href="/css/app.css" rel="stylesheet">
            <script src='js/jquery.pinto.js'></script>
            <script type="text/javascript">
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            </script>
                <script>
                $(document).ready(function(){
                
            $('#viewcal').click(function(){
            //$('#calendar-frame').hide();

            // r = parseInt($('#cal-recipe').css('right'), 10);

            // $('#cal-recipe')

            //     .animate(
            //       { 
            //         right: r ? -600 : 10
            //       },1000
                
            //     );
            });
});

            </script>
            

        </head>
        <body>
            <nav class="navbar navbar-nav navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container text-center col-md-12" id="main_container">
                <div class="row col-md-offset-4 col-md-6">  
                        
                            {!! Form::open(['url' => 'home/search'],['class' => 'form-inline']) !!}
                            {{ csrf_field() }}
                             {!! Form::submit('Search', ['class' => 'btn btn-primary col-md-4']) !!} 
                            {!! Form::text('recipe', null, ['class' => 'span2 col-md-8']) !!}
                            {!! Form::close() !!}  
                </div>
               <!--  <div class="col-md-offset-4">
               
                     <a id="viewcal"><img src="img/Calendar.png"></a>
               
                <br><br>
                </div> -->
                <br><br>
                <div class="row container" id ="cal-recipe">
                   
                    <!-- calendar frame -->
                        <div id="calendar-frame" class="col-md-offset-4">
                            <br>
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                            <hr>
                        </div>   
                        <div class="container recipe-panel col-md-6">
                            <div id ="recipe_list" class="container-fluid">
                         
                                <!-- These are our grid blocks -->
                            </div>
                        </div>
               </div>
                </div>
                
            </div>
          </div>
        </div>

        <footer class="footer centered">
            <p></p>
            <!-- Scripts -->

            <script>
                $("form").on('submit', function (e) {
                e.preventDefault();
                var recipe = $("input[name='recipe']").val();
                $.ajax({
                    type: "POST",
                    url:'/home/search',
                    data: $('form').serialize(), // Remember that you need to have your csrf token included
                    dataType: 'json',
                    success: function(response){
                        // Handle your response..
                        var recipe_ids = response.listOfImages;
                        var recipe_ids = response.listOfId;
                        var recipe_titles = response.listOfTitle;
                        var recipe_images = response.listOfImages;
                        var recipe_urls = response.listOfUrls;
                        var recipe_desc = response.ListOfDescription;
                        var recipe_panel = $("#recipe_list");
                        for ( var i = 0, l = recipe_ids.length; i < l; i++ ) {
                            //list all recipes results
                            //alert(recipe_images[i]);
                            var link = recipe_urls[i];
                            // recipe_panel.append("<div class=\'draggable-box span3\'" + "id =" + recipe_ids[i] + " data-event=\'title\' : \'myevent\'" + "><img src=><h3>" + recipe_titles[i] + "</h3></div>");
                            recipe_panel.append("<div class=\'draggable-box span3\'" + "id =" + recipe_ids[i] + " data-event=\'title\' : \'myevent\'" + "><img src=" + recipe_images[i] + "><h3>" + recipe_titles[i] + "</h3></a></div>");
                            $('#' + recipe_ids[i]).on('click', function() {
                            opendialog(""+ link + "/");
                            //window.open(link); 
                            });
                            $('#' + recipe_ids[i]).draggable({
                            zIndex:999,
                            helper: 'clone',
                            init: function(){
                                var eventObject = {
                                title: $.trim($(this).text()) // use the element's text as the event title
                                };
                                
                                // store the Event Object in the DOM element so we can get to it later
                                $(this).data('eventObject', eventObject);
                            },
                            start: function(event, ui) {
                                $('.recipe-panel').css("overflow", "visible");
                                
                                $(ui.helper).addClass("ui-helper");
                                return $(this)
                                    
                            },
                            stop: function() {
                                $('.recipe-panel').css("overflow", "scroll");
                                //alert(eventObject.text());
                            },
                            revert: true
                            });            
                            }
                        }
                        ,
                    error: function( response ){
                        // Handle error
                        alert("No Data error" + response.return);
                        // var recipe_panel = $("#recipe_list");

                        //recipe_panel.append("<div class=\'draggable-box\'" + "id =1" + "><img src=img\item-02.png" + "><h3>Chicken</h3></div>");
                    }    
                });
                });
            </script>

            
            <script>
            $('#contact-btn').click(function(){
            $('#calendar-frame').slideDown( "slow", function() {
            // Animation complete.

            });
            });

            </script>         
            <!-- <script>$("#viewcal").click(function() {
            // $('#calendar-frame').slideToggle();
            // });
            </script> -->
            <script>
            $("#somediv").click(function() {
            opendialog("http://www.closetcooking.com/2011/11/buffalo-chicken-chowder.html/");
            });

            function opendialog(page) {
            var $dialog = $('#somediv')
            .html('<iframe style="border: 0px; " src="' + page + '" width="100%" height="100%"></iframe>')
            .dialog({
            title: "Page",
            autoOpen: false,
            dialogClass: 'dialog_fixed,ui-widget-header',
            modal: true,
            height: 500,
            minWidth: 400,
            minHeight: 400,
            draggable:true,
            /*close: function () { $(this).remove(); },*/
            buttons: { "Ok": function () { $(this).dialog("close"); } }
            });
            $dialog.dialog('open');
            } 

            </script>
         
        </footer>

        </body>
</html>
