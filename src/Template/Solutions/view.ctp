<!-- File: src/Template/Solutions/view.ctp -->
<?php 
echo $this->Html->css('monokai');
echo $this->Html->script('highlight.pack');
?>
<script>hljs.initHighlightingOnLoad();</script>
<div class="col-md-12">
<h1><?= h($solution->title) ?></h1>
<p><?= $solution->description ?></p>
<hr />
<h2>My Solution:</h2>
<p>
<pre><code class="python"><?= h($solution->body) ?></code></pre></p>
<p><small>Created: <?= $solution->created->format(DATE_RFC850) ?></small></p>
<?php 
/*
echo $this->Html->link(
    'Add',
    '/solutions/add',
    array('class' => 'button', 'target' => '_blank')
);
*/ 
?> 
</div>