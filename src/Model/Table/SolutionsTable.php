<?php // src/Model/Table/SolutionsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;

class SolutionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}