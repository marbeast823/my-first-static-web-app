
											
<div class="meta"><div class="title">Topup</div></div>
<p>
Hi <strong><?=$_SESSION[___user_];?></strong>, you currently have <strong><?=$web->getEP($_SESSION[___user_]);?> E-Points</strong><BR>
Please go to <a href="?p=donate">How to Donate Guide</a> to know how to obtain top up code.
</p>
<div class="card-body">
	<form class="userTrans" method="post">
	<input type="hidden" name="act_userTrans" value="__topup_">
		<div class="form-group">
			<input maxlength="11" type="text" name="ccode" id="ccode" placeholder="Code" class="form-control">
		</div>
		<div class="form-group">
			<input maxlength="6" type="text" name="cpcode" id="cpcode" placeholder="PIN" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" class="float-right btn btn-outline-primary">Topup</button>
		</div>
	</form>
</div>					
				
			