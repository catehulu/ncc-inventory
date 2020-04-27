{% extends "templates/main.volt" %}

{% block content %}
<div class="card bg-light mx-auto" style="max-width: 400px;">
<div class="card-body mx-auto">
	<form method='POST' action='/register'>
	<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px"> <i class="fa fa-user" aria-hidden="true"></i> </span>
		</div>
        <input name="nama" class="form-control" placeholder="Nama" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px"> <i class="fa fa-envelope" aria-hidden="true"></i> </span>
		</div>
        <input name="email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px"> <i class="fa fa-phone" aria-hidden="true"></i> </span>
		</div>
    	<input name="no_telp" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px"> <i class="fa fa-key" aria-hidden="true"></i> </span>
		</div>
        <input name='password' class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px"> <i class="fa fa-key" aria-hidden="true"></i> </span>
		</div>
        <input name='repeat_password' class="form-control" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->
                     
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->
</form>
</div>
</div> <!-- card.// -->
{% endblock %}