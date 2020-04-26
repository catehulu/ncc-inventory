{% extends 'templates/main.volt' %}


{% block content %}
<div class="card bg-light mx-auto" style="max-width: 400px;">
<div class="card-header">
    Tambah Barang
</div>
<div class="card-body mx-auto">
	<form method='POST' action='/inventaris/store'>
	<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px">  </span>
		</div>
        <input name="nama" class="form-control" placeholder="Nama" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px">  </span>
		</div>
        <input name="jumlah" class="form-control" placeholder="jumlah" min="0" type='number'>
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px">  </span>
		</div>
        <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" placeholder='deksripsi'></textarea>
    </div> <!-- form-group// -->
                     
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Tambah  </button>
    </div> <!-- form-group// -->
</form>
</div>
</div> <!-- card.// -->
{% endblock %}