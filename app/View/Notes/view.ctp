<div class="notes view">
<h2><?php  echo __('Note'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($note['Note']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($note['User']['id'], array('controller' => 'users', 'action' => 'view', $note['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($note['Note']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($note['Note']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($note['Note']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Note'), array('action' => 'edit', $note['Note']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Note'), array('action' => 'delete', $note['Note']['id']), null, __('Are you sure you want to delete # %s?', $note['Note']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
