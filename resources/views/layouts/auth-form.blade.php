<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="icon" href="img/ecm.png">
        <title>ECM - @yield('title')</title>
        @include('includes.styles')
    </head>
    <body>
        <section id="sign-in">
            <div class="row">
                <div class="col s8 m4 offset-m4 offset-s2">
                    <div class="row">
                        <div class="col s10 offset-s1">
                            <img src="{{url('img/ecm.png')}}" alt="ECM logo" class="responsive-img">
                        </div>
                    </div>
                    <h5 class="pull-right" id="login-heading">User Login</h5>
                    <form action="@yield('action')" method="post">
                        {{csrf_field()}}
                        <div class="card-panel clearfix">
                            @yield('fields')
                            <button class="waves-effect waves-light btn-large z-depth-0 z-depth-1-hover">@yield('button-text')</button>
                            <div class="progress">
                                <div class="indeterminate"></div>
                            </div>
                        </div>
                        @yield('forget-password')
                    </form>
                </div>
            </div>
        </section>
        @include('includes.scripts')
        <script type="text/javascript">
            $(document).ready(function(){
                $('.progress').css('display', 'none');
                $('form').on('submit', function(){
                    $(this).find('.progress').show('slow');
                });
            });
        </script>
    </body>
</html>