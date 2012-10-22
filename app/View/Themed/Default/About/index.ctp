<div class="about form">
<?php
// in your view file
$this->Html->script('home', array('inline' => false));
$this->Html->css('home', null, array('inline' => false));
?>
 <td class="horizontal_center"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linkcontainer">
      <tr>
        <td><div class="navigation"><?php echo $this->Html->link(__('Home'), array('action' => 'home'),array('class' => 'main_link'));?></div></td>
        <td><div class="navigation"><a href="#" class="main_link">Gallery</a></div></td>
        <td><div class="navigation"><?php echo $this->Html->link(__('About'), array('controller' => 'about', 'action' => 'index'),array('class' => 'main_link'));?></div></td>
        <td><div class="navigation"><a href="#" class="main_link">Help</a></div></td>
        <td><div class="navigation"><?php echo $this->Html->link(__('Contact Us'), array('action' => 'contact'),array('class' => 'main_link'));?></div></td>
      </tr>
    </table></td>

</div>
<div class="about index">
	<h2><?php echo __('Notes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($abouts as $about): ?>
	<tr>
		<td><?php echo h($about['About']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($about['About']['id'], array('controller' => 'users', 'action' => 'view', $about['About']['id'])); ?>
		</td>
		<td><?php echo h($about['About']['body']); ?>&nbsp;</td>
		<td><?php echo h($about['About']['created']); ?>&nbsp;</td>
		<td><?php echo h($about['About']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $about['About']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $about['About']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $about['About']['id']), null, __('Are you sure you want to delete # %s?', $about['About']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>