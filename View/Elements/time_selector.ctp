<?php 
	echo $this->Html->script("bower_components/handlebars/handlebars.js");
	echo $this->Html->script("timeselector");
?>

<script type="html/template" id="time-item">
	<a href="#" class="item {{#if notTaken}} availeble {{/if}} {{#if selected}} selected {{/if}}" date-time="{{{timestamp}}}">
		<span class="time">{{{timeOfDay}}}</span> <span class="status">{{#if taken}} Optaget {{else}} Vælg tid {{/if}}</span>
	</a>
</script>

<div class="time-chooser times" data-selected="<?php echo $date_time; ?>">

</div>