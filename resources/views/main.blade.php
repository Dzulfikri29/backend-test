<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="SKA GROUP INDONESIA">
    <meta name="author" content="SKA GROUP INDONESIA">
    <meta name="token" content="{{ csrf_token() }}">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="SKA GROUP INDONESIA">
    <meta itemprop="description" content="SKA GROUP INDONESIA">
    <meta itemprop="image" content="">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url('') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Login">
    <meta property="og:description" content="SKA GROUP INDONESIA">
    <meta property="og:image" content="{{ asset('app-assets/images/logo/logo.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{ asset('app-assets/images/logo/logo.png') }}">
    <meta name="twitter:title" content="Login">
    <meta name="twitter:description" content="SKA GROUP INDONESIA">
    <meta name="twitter:image" content="{{ asset('app-assets/images/logo/logo.png') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/logo/logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/logo/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/pickers/datetime/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/viewer/viewer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/pixelarity/pixelarity.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/switch.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-climacon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/meteocons/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/users.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/unslider.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/meteocons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/forms/checkboxes-radios.min.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/global.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/chat.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/maps.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- END Custom CSS-->
    <script>
        const base_url = '{{ url('') }}';
        const role_name = '{{ Auth::user()->role->name ?? 'Partner' }}';
        const user_id = '{{ Auth::user()->id }}';
        const token = '{{ csrf_token() }}';
    </script>

    @yield('css')
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns" onload="hideLoader()">
    @yield('loader')
    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js"></script>

    <script>

    </script>

    <!-- fixed-top-->
    @include('header')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('left_menu')
    <div class="app-content content overflow-hidden">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="content-header-left mb-1">
                    <h3 class="content-header-title">@yield('title')</h3>
                    <div class="row">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
        <audio id="alert-sound" style="display: none">
            <source src="{{ asset('app-assets/sound/sound.mp3') }}" />
        </audio>
        <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
        <input type="hidden" id="pusher_app_key" value="{{ config('app.pusher_server_key') }}" />
        <input type="hidden" id="pusher_cluster" value="{{ config('app.pusher_cluster') }}" />
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('footer')

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"
        type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/tables/buttons.colVis.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.colReorder.min.js') }}"
        type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.fixedHeader.min.js') }}"
        type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/pickers/dateTime/moment.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}"
        type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/pickers/dateTime/bootstrap-datetimepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/viewer/viewer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/checkbox-radio.min.js') }}" type="text/javascript"></script>
    <!-- END STACK JS-->
    <script src="{{ asset('app-assets/vendors/js/pusher/pusher.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/extended/inputmask/jquery.mask.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/js/notification.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/global.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/switch.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/simple.money.format.js') }}" type="text/javascript"></script>

    <script src="{{ asset('app-assets/vendors/pixelarity/pixelarity-faceless.js') }}"></script>

    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js"></script>

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyBbZ4BY7i07WW5-vupgF74sYTCFVYFmO84",
            authDomain: "ska-project.firebaseapp.com",
            projectId: "ska-project",
            storageBucket: "ska-project.appspot.com",
            messagingSenderId: "211957644514",
            appId: "1:211957644514:web:104ed4dd9b559bf42572bb",
            measurementId: "G-JP3Q6ML9B2"
        };
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
        Notification.requestPermission().then(function(permission) {
            console.log("permiss", permission);
        });
        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function() {
                return messaging.getToken();
            })
            .then(function(token) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="_token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: base_url + "/api/save-token",
                    type: "POST",
                    data: {
                        user_id: user_id,
                        fcm_token: token,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(err) {
                        console.log(" Can't do because: " + err);
                    },
                });
            })
            .catch(function(err) {
                console.log("Unable to get permission to notify.", err);
            });

        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(noteTitle, noteOptions);
            const audio = new Audio(
                base_url +
                "/app-assets/sound/sound.mp3"
            );
            audio.play();

            getNotification();
        });
    </script>
    <script>
        Notification.requestPermission().then(function(permission) {
            console.log('permiss', permission)
        });

        $('.money').mask('000.000.000.000', {
            reverse: true
        });

        const Toast = Swal.mixin({
            toast: true,
            animation: false,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @yield('js')
    @if ($message = Session::get('message'))
        <script>
            Toast.fire({
                icon: 'success',
                title: '{{ $message }}'
            })
        </script>
    @endif

    @if ($error = Session::get('error'))
        <script>
            Toast.fire({
                icon: 'error',
                title: '{{ $error }}'
            })
        </script>
    @endif
</body>

</html>
