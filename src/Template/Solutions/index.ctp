<!-- File: src/Template/Solutionsolutions/index.ctp -->

<h1>Solutions</h1>
<div class="row">
<div class="col-md-8 col-md-offset-2">
<table class="table-responsive">
    <tr>
        <th class="col-xs-2">Problem Number</th>
        <th class="col-xs-7">Title</th>
        <th class="col-xs-3">Difficulty</th>
    </tr>

    <!-- Here is where we iterate through our $solutions query object, printing out solution info -->

    <?php foreach ($solutions as $solution): ?>
    <tr class="<?= $solution->difficulty ?>">
        <td>
            <?= explode(" ",$solution->title, 2)[0] ?>
        </td>
        <td>
            <?= $this->Html->link(explode(" ",$solution->title, 2)[1] , ['action' => 'view', $solution->id]) ?>
        </td>
        <td>
            <?= $solution->difficulty ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</div>