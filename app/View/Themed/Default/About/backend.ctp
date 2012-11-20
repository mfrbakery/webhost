<div class="Abouts index">
<?php
// in your view file
$this->Html->script('auth', array('inline' => false));
$this->Html->css('auth', null, array('inline' => false));
?>
	<h2><?php echo __('About Content'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
	
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($abouts as $about): ?>
	<tr>
		<td><?php echo h($about['About']['id']); ?>&nbsp;</td>
		<td><?php echo h($about['About']['title']); ?>&nbsp;</td>
		<td><?php echo h($about['About']['body']); ?>&nbsp;</td>
		
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New About'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Requests'), array('controller' => 'requestrecords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Sign out'), array('controller' => 'Abouts', 'action' => 'logout')); ?> </li>
		<li><?php echo $this->Html->link(__('About Content'), array('controller' => 'about', 'action' => 'add')); ?> </li>
	</ul>
</div>
