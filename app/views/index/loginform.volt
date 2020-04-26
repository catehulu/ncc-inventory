<div class="card bg-light mx-auto" style="max-width: 400px;">
<div class="card-header">
    Log in
</div>
<div class="card-body mx-auto">
	<form method='POST' action='/login'>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px">  </span>
		</div>
        <input name="email" class="form-control" placeholder="Email address" type="email">
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text" style="max-width: 50px">  </span>
		</div>
        <input name='password' class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
                     
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Log in  </button>
    </div> <!-- form-group// -->                                      
    <p class="text-center"><a href="/register">Register</a> akun yang baru</p>  
</form>
</div>
</div> <!-- card.// -->