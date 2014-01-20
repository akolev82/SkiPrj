<div class="zips view">
<h2><?php echo __('Zip'); ?></h2>
	<dl>
		<dt><?php echo __('ZipID'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['ZipID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['CountryName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['CityName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['StateName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['ZipCode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['longitude']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php if ($is_admin) {
  echo '<div class="actions">';
	echo '<h3>' . __('Actions') . '</h3>';
	echo '<ul>';
		echo '<li>' . $this->Html->link(__('Edit Zip'), array('action' => 'edit', $zip['Zip']['ZipID'])) . '</li>';
		echo '<li>' . $this->Form->postLink(__('Delete Zip'), array('action' => 'delete', $zip['Zip']['ZipID']), null, __('Are you sure you want to delete # %s?', $zip['Zip']['ZipID'])) . '</li>';
		echo '<li>' . $this->Html->link(__('List Zips'), array('action' => 'index')) . '</li>';
		echo '<li>' . $this->Html->link(__('New Zip'), array('action' => 'add')) . '</li>';
	echo '</ul>';
  echo '</div>';
}
?>