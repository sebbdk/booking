<?php $this->start('header'); ?>
	<h1><b>Users</b></h1>
<?php $this->end(); ?>

<div class="annexes index">
	<div class="row">
		<?php echo $this->Html->link('Add new', ['action' => 'add'], ['class' => 'btn btn-lg btn-add']); ?>
	</div>

	<div class="row">

		<div class="col-lg-12">
			<table cellpadding="0" cellspacing="0" class="table table-striped AnnexTable">
				<thead>
					<tr>
						<th class="AnnexTitleField"><?php echo $this->Paginator->sort('username'); ?></th>
						<th class="AnnexTitleField"><?php echo $this->Paginator->sort('email'); ?></th>
						<th class="AnnexTitleField" style="text-align: right;">Options</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
						<tr>
							<td class='AnnexTitleField'><div class='limiter'><?php echo h(@$user['User']['username']); ?>&nbsp;<div></td>
							<td class='AnnexTitleField'><div class='limiter'><?php echo h(@$user['User']['email']); ?>&nbsp;<div></td>
							<td class="actions" style="text-align: right;">
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>', array('controller' => 'roles', 'action' => 'edit', $user['User']['id']), array('class' => 'btn btn-default', 'escape' => false)); ?>
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-default', 'escape' => false)); ?>
								<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-default', 'escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php if ($this->Paginator->params()['pageCount'] > 1) : ?>
				<ul class="pagination">
					<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
					?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</div>