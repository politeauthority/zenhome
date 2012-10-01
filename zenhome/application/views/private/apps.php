<?php
	// APPS index
?>

<div id="wrap" class="container-fluid">
	<!-- Page Title -->
	<div class="row-fluid">
		<div class="span4">
				<h3>Apps</h3>
		</div>
		<div class="span3 pull-right">
			<div class="dropdown">
	  		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
	  			<i class="icon-white icon-chevron-down"></i> Options
	  		</a>
	  		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
	    		<li><a href="#">Enabled Apps</a></li>
	    		<li><a href="#">All Apps</a></li>
	  		</ul>
			</div>
		</div>		
	</div>

	<div class="row-fluid">
		<div class="span8">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>App Name</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?
					foreach( $apps as $app ){
						?>
						<tr>
							<td>
								<a href="<? echo base_url( 'apps/' . $app->slug_name ); ?>">
								<? echo $app->pretty_name; ?>
							</td>
							<td></td>
							<td>
								<? 
								if( !$app->enabled ){
									?>
									<a class="btn btn-success btn-small" href="<? echo base_url() . 'apps/apps/enable/' . $app->row_id; ?>">
										Enable
									</a>
									<?
								} else {
									?>
									<a class="btn btn-danger btn-small" href="<? echo base_url() . 'apps/apps/disable/' . $app->row_id; ?>">
										Disable
									</a>
									<?
								}
								?>
							</td>
						</tr>
						<?
					}
					?>								
				<tbody>
			</table>
		</div>
		<div class="span4">
		</div>
	</div>
</div>