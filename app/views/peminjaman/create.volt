{% extends 'templates/main.volt' %}


{% block content %}
<div class="card bg-light" style="max-width: 100%;">
<div class="card-header">
    Pinjam Barang
</div>
<div class="card-body">
<form action="/peminjaman/store" method="post">
    <div class="form-group">
        <label for="NRP">NRP</label>
        <input type="input" class="form-control" id="NRP" name="NRP" aria-describedby="nrpHelp" placeholder="NRP" maxlength='15'>
        <small id="NRP" class="form-text text-muted">Harap menggunakan NRP 14 digit</small>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="input" class="form-control" id="nama" name="nama" placeholder="Nama">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="adminncc@ncc.com">
    </div>
    <div class="form-group">
        <label for="no_telp">No Telp</label>
        <input type="input" class="form-control" id="no_telp" name="no_telp" placeholder="0853xxxxx">
    </div>
    <div class="form-group">
        <label for="inventaris_id">Barang</label>
        <select name="inventaris_id" id="inventaris_id" class="form-control">
            <option value="" selected disabled>Pilih barang ...</option>
            {% for inventaris in inventarises %}
                <option value="{{ inventaris.id }}">{{ inventaris.nama }}</option>
            {% endfor %}
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
        <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" placeholder="22/01/2020">
    </div>
    <div class="form-group">
        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
        <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" placeholder="23/02/2020">
    </div>
    <div class="form-group">
        <label for="nama">Deskripsi</label>
        <textarea type="input" class="form-control" id="deskripsi" name="deskripsi" placeholder="Saya meminjam alat ini untuk..." cols='10' row='30'></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div> <!-- card.// -->
{% endblock %}