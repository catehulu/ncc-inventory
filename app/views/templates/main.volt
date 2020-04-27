<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NCC Inventory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
    <!-- DataTabels -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{ this.url.getStatic('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {% block custom_css %}{% endblock %}
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-primary" style='margin-bottom: 20px;'>
        <a class="navbar-brand" href="/">
            <img src="{{ this.url.get('img/ncc-logo.jpg') }}" height="30" class="d-inline-block align-top" alt="">
            NCC Inventory
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            {% if this.session.has('auth') %}
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/inventaris"> Inventaris </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manajemenpeminjaman"> Peminjaman </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li> -->
            </ul>
            <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                <li class="nav-item active">
                    <a class="nav-link" href="/register"> Buat Akun </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/logout"> Logout </a>
                </li>
            </ul>
            
            {% else %}
            <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                <li class="nav-item active">
                    <a class="nav-link" href="/login"> Login </a>
                </li>
            </ul>
            {% endif %}
        </div>
    </nav>

    <div class="container">
        {{ flashSession.output() }}
        {% block content %}{% endblock %}
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#"> NCCLabs</a>
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- DataTabels -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    {% block custom_js %}{% endblock %}
</body>