{% extends "templates/landing.volt" %}

{% block custom_css %}

<link rel="stylesheet" href="{{ this.url.get('css/error.css') }}">

{% endblock %}

{% block content %}
<header id="showcase">
    <div id='box'>
        <h1>Halaman tidak ditemukan</h1>
        <img src=" {{ this.url.get('img/error.png') }} " alt="" style='width:30%'>
        <p>Tidak ada apa - apa disini</p>
        <p style='font-size:7px; font-weight:100'>Hanya kelinci dan kucing imut</p>
    </div>
</header>
{% endblock %}