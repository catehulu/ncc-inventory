{% extends "templates/main.volt" %}

{% block content %}
<div class="card bg-light mx-auto" style="max-width: 400px; margin-top:20px">
<div class="card-header">
    Log in
</div>
<div class="card-body mx-auto">
	<form method='POST' action='/login'>
    <input type="text" name="{{ this.security.getTokenKey() }}" id="" value='{{ this.security.getToken() }}' hidden>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px"> <i class="fa fa-at" aria-hidden="true"></i> </span>
		</div>
        <input name="email" class="form-control" placeholder="Email address" type="email">
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px"> <i class="fa fa-key" aria-hidden="true"></i> </span>
		</div>
        <input name='password' class="form-control" placeholder="Password" type="password">
    </div> <!-- form-group// -->
                     
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Log in  </button>
    </div> <!-- form-group// -->                                      
</form>
</div>
</div> <!-- card.// -->

{% endblock %}
