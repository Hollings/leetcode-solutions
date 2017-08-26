<!-- File: src/Template/Solutions/add.ctp -->

<h1>Add Solution</h1>
<?php
    echo $this->Form->create($solution);
    echo $this->Form->control('title');
    echo $this->Form->control('difficulty');
    echo $this->Form->control('description', ['rows' => '3']);
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Save Solution'));
    echo $this->Form->end();
?>