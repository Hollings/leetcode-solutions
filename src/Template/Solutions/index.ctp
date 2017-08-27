<!-- File: src/Template/Solutionsolutions/index.ctp -->

<h1>Solutions</h1>
<div class="row">
<div class="col-md-7">
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
<div class="col-md-3 text-muted">
        <h3>What is this?</h3>
        <p>This page lists all the LeetCode questions I've completed. Since a there isn't a single page to view all completed puzzles, I felt like I needed to create a page that could track my progress through the site. Just click on any puzzle in this table to see the question and my solution.</p>
        <p>This is the database application I built to learn CakePHP. Coming from a couple years of Laravel experience, CakePHP was pretty easy to pick up. While I prefer Laravel for its blade templating system and artisan commands, CakePHP is definitely the easier to quickly set up and develop on.</p>
        <p><a href="https://github.com/Hollings/leetcode-solutions">View on GitHub</a></p>
        </div>

</div>