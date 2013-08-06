<?php foreach ($companies as $company): ?>
	<?php echo '<option value="'.$company['Company']['id'].'">'.$company['Company']['name'].'</option>'; ?>
<?php endforeach ?>