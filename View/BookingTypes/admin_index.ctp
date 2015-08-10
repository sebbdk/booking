

<div class="col-md-12">

	<div class="well">
		<h3>Booking types</h3>
	</div>

	<div class="well">
		<?php echo $this->Html->link("Create new type", ["action" => "add"], ["class" => "btn btn-primary"]); ?>
	</div>

	<div class="well">

		<table cellpadding="0" cellspacing="0" class="table table-striped AnnexTable">
			<thead>
				<tr>
					<th class="AnnexTitleField"><?php echo $this->Paginator->sort('name'); ?></th>
					<th class="actions"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($bookingTypes as $booking): ?>
					<tr>
						<td class='AnnexTitleField'><div class='limiter'><?php echo h($booking['BookingType']['name']); ?>&nbsp;<div></td>
						<td class="actions" style="text-align: right;">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $booking['BookingType']['id']), array('class' => 'btn btn-default', 'escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $booking['BookingType']['id']), array('class' => 'btn btn-default', 'escape' => false), __('Are you sure you want to delete # %s?', $booking['BookingType']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<center>
			<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
		</center>

		<?php
		$params = $this->Paginator->params();
		if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination">
				<?php
				echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
				echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
				echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php
		}
		?>
	</div>
</div>