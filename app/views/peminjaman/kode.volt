{% extends "templates/main.volt" %}



{% block content %}
<div class="card  mx-auto" style="width: 70%" align=center>
    <div class="card-header"> Data peminjaman </div>
    <div class="card-body">
        <div style='text-align:center;'>
            <h2> Data Peminjaman </h2>
        </div>
        <table class='table'>
            <tr>
                <th style='width: 25%'>NRP</th>
                <td style='width: 25%'>:</td>
                <td style='width: 25%'>{{ peminjam.NRP }}</td>
                <td style='width: 25%'></td>
            </tr>
            <tr>
                <th style='width: 25%'>Nama</th>
                <td style='width: 25%'>:</td>
                <td style='width: 25%'>{{ peminjam.nama }}</td>
                <td style='width: 25%'></td>
            </tr>
            <tr>
                <th style='width: 25%'>Email</th>
                <td style='width: 25%'>:</td>
                <td style='width: 25%'>{{ peminjam.email }}</td>
                <td style='width: 25%'></td>
            </tr>
            <tr>
                <th style='width: 25%'>No Telp</th>
                <td style='width: 25%'>:</td>
                <td style='width: 25%'>{{ peminjam.no_telp }}</td>
                <td style='width: 25%'></td>
            </tr>
            <tr>
                <th style='width: 25%'>Tanggal Peminjaman</th>
                <td style='width: 25%'>:</td>
                <td style='width: 25%'>{{ peminjam.tanggal_peminjaman }}</td>
                <td style='width: 25%'></td>
            </tr>
            <tr>
                <th style='width: 25%'>Tanggal Pengembalian</th>
                <td style='width: 25%'>:</td>
                <td style='width: 25%'>{{ peminjam.tanggal_pengembalian }}</td>
                <td style='width: 25%'></td>
            </tr>
            <tr>
                <th style='width: 25%'>Deskripsi</th>
                <td style='width: 25%'>:</td>
                <td style='width: 25%'>{{ peminjam.deskripsi }}</td>
                <td style='width: 25%'></td>
            </tr>
            <tr>
                <th style='width: 25%'>Status</th>
                <td style='width: 25%'>:</td>
                {% if peminjam.status == 0 %}
                    <td style='width: 25%'>Sedang proses</td>
                {% elseif peminjam.status == 1 %}
                    <td style='width: 25%'>Diterima</td>
                {% else %}
                    <td style='width: 25%'>Ditolak</td>
                {% endif %}
                <td style='width: 25%'></td>
            </tr>
            <tr>
                <th style='width: 25%'>Inventaris</th>
                <td style='width: 25%'>:</td>
                <td style='width: 25%'>{{ peminjam.inventaris.nama }}</td>
                <td style='width: 25%'></td>
            </tr>
        </table>
        <div id="kode" style='text-align: center'>
            <h3>Kode : </h3><br>
            <h4>{{ peminjam.kode }}</h4>
        </div>
    </div>
</div>
{% endblock %}