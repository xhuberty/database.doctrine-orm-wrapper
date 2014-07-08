<?php 
use Mouf\Doctrine\ORM\Admin\Controllers\EntityManagerController;
/* @var $this EntityManagerController */
?>
<script type="text/javascript">hljs.initHighlightingOnLoad();</script>

<h1>Launch Schema update</h1>
<form action="install" class="form-horizontal">
	<input type="hidden" id="selfedit" name="selfedit" value="<?php echo plainstring_to_htmlprotected($this->selfedit) ?>" />
	<input type="hidden" id="instanceName" name="instanceName" value="<?php echo plainstring_to_htmlprotected($this->instanceName); ?>" />
	<input type="hidden" id="installMode" name="installMode" value="<?php echo plainstring_to_htmlprotected($this->installMode); ?>" />
	
	<div class="control-group">
		<p>
		These SQL commands will be executed.
		</p>
		<?php 
		if (empty($this->sql)){
		?>
		<div class="info">
			There is no request to be executed. Your database schema and the Doctrine entities are synchronized.
		</div>
		<?php
		} else {
		?>
		<pre><code class="sql"><?php 
		foreach ($this->sql as $request){
			echo $request.";\n";
		}
		?></code></pre>
		<?php } ?>
	</div>
	
	<div class="control-group">
		<label class="checkbox">
			<input type="checkbox" name="generateDaos" <?php if ($this->debugMode) { echo 'checked="checked"'; } ?>> Also regenerate DAOs
		</label>
	</div>
	
	<?php if ($this->patchable): ?>
	<div class="control-group">
		<label class="checkbox">
			<input type="checkbox" name="generatePatch" checked="checked"' /> Store update in a SQL Patch
		</label>
	</div>
	<?php endif; ?>
	
	<div class="control-group">
		<button name="action" value="install" type="submit" class="btn btn-danger" <?php if (empty($this->sql)){ echo "disabled='disabled'"; }?>><i class="icon icon-white icon-refresh"></i> Update database schema</button>
	</div>
</form>