{% extends "templates/landing.volt" %}

{% block custom_css %}

<link rel="stylesheet" href="{{ this.url.get('css/landing.css') }}">

{% endblock %}

{% block content %}
<header id="showcase">
    <div id='box'>
        <h1>NCC Inventory</h1>
        <img src=" {{ this.url.get('img/ncc-logo.jpg') }} " alt="" style='width:20%'>
        <p>Website pencatatan dan peminjaman barang NCC</p>
        {% if this.session.has('auth') %}
            <a href="/dashboard" class="button">Dashboard</a>
        {% else %}
            <a href="/login" class="button">Login</a>
            <a href="/peminjaman" class="button">Pinjam</a>
        {% endif %}
    </div>
</header>
{% endblock %}