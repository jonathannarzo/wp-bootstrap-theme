<hr />
<div class="row">
	<?php
		$vals = array();
		$vals[] = $col1_cond = is_active_sidebar('frontcol1');
		$vals[] = $col2_cond = is_active_sidebar('frontcol2');
		$vals[] = $col3_cond = is_active_sidebar('frontcol3');
		$active_cols = 0;
		foreach ($vals as $key => $val) {
			if ($val)
				$active_cols++;
		}
		$col_division = 12 / $active_cols;
	?>
	<div class="col-md-<?php echo $col_division ?>"><?php if ($col1_cond) dynamic_sidebar('frontcol1'); ?></div>
	<div class="col-md-<?php echo $col_division ?>"><?php if ($col2_cond) dynamic_sidebar('frontcol2'); ?></div>
	<div class="col-md-<?php echo $col_division ?>"><?php if ($col3_cond) dynamic_sidebar('frontcol3'); ?></div>
</div>