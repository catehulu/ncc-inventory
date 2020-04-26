{% extends "templates/main.volt" %}

{% block content %}

<div class="card" style="width: 100%;">
    <div class="card-header"> Aturan Peminjaman </div>
    <div class="card-body">
        <div style='text-align:center;'>
            <h2 style='color:red'> PERHATIAN </h2>
            <p>Sebelum melakukan peminjaman, silahkan baca peraturan dan tata cara untuk meminjam barang di lab NCC</p>
        </div>
        <ol>
            <li>...</li>
            <li>...</li>
            <li>...</li>
        </ol>
    <div class='d-flex flex-row-reverse'>
        <a href="/peminjaman/create" class="btn btn-primary">Halaman peminjaman</a>
    </div>
        
    </div>
</div>

{% endblock %}