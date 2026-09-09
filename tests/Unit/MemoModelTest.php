<?php

declare(strict_types=1);

namespace app\tests\Unit;

use app\models\Memo;

final class MemoModelTest extends \Codeception\Test\Unit
{
    public function testLoadsTagNamesWithoutRelationConflict(): void
    {
        $memo = new Memo();

        $memo->load([
            'Memo' => [
                'name' => 'Project review',
                'description' => 'Needs follow-up',
                'type_id' => 1,
                'tagNames' => ['urgent', 'follow-up'],
            ],
        ]);

        verify($memo->tagNames)->equals(['urgent', 'follow-up']);
    }

    public function testTimestampBehaviorUsesDatabaseDatetimeFormat(): void
    {
        $memo = new Memo();
        $memo->name = 'timestamp regression';
        $memo->description = 'Should be stored as a SQL datetime';
        $memo->type_id = 1;

        $memo->beforeSave(true);

        verify($memo->created_at)->matches('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/');
        verify($memo->updated_at)->matches('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/');
    }
}
