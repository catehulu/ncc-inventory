{% extends "templates/main.volt" %}

{% block custom_css %}
<style>
.page-button{
    margin: 5px;
}
</style>
{% endblock %}

{% block content %}

<table class="table table-dark table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">NRP</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">No Telp</th>
      <th scope="col">Tanggal Peminjaman</th>
      <th scope="col">Tanggal Pengembalian</th>
      <th scope="col">Kode</th>
    </tr>
  </thead>
  <tbody>
    {% for peminjam in page.items %}
    <tr>
        <td>{{peminjam['NRP']}}</td>
        <td>{{peminjam['nama']}}</td>
        <td>{{peminjam['email']}}</td>
        <td>{{peminjam['no_telp']}}</td>
        <td>{{peminjam['tanggal_peminjaman']}}</td>
        <td>{{peminjam['tanggal_pengembalian']}}</td>
        <td>{{peminjam['kode']}}</td>
    </tr>
    {% endfor %}
    <tr>
  </tbody>
</table>

<p>halaman {{ page.current }} dari {{ page.last }} </p>
<div id="page-navigator" class='d-flex justify-content-center'>
    <a class='btn btn-secondary page-button' href='/manajemenpeminjaman/history'>First</a>
    <a class='btn btn-secondary page-button' href="/invoices/list?page={{ page.previous }}">Previous</a>
    <a class='btn btn-secondary page-button' href="/invoices/list?page={{ page.next }}">Next</a>
    <a class='btn btn-secondary page-button' href="/invoices/list?page={{ page.last }}">Last</a>
</div>


{% endblock %}