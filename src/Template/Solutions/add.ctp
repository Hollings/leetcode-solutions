<!-- File: src/Template/Solutions/add.ctp -->

<h1>Add Solution</h1>
<?php
    echo $this->Form->create($solution);
    echo $this->Form->control('link');
    echo $this->Form->control('body', ['rows' => '3', 'label' => 'Solution',]);
    echo $this->Form->button(__('Save Solution'));
    echo $this->Form->end();
?>