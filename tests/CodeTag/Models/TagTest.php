<?php

namespace CodePress\CodeTag\Tests\Models;

use CodePress\CodeTag\Models\Tag;
use CodePress\CodeTag\Tests\AbstractTestCase;

class TagTest extends AbstractTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->migrate();
    }

    public function test_check_if_a_tag_can_be_persisted()
    {
        $category = Tag::create(array(
            'name' => 'Tag Test',
            'active' => true
        ));
        $this->assertEquals('Tag Test', $category->name);

        $category = Tag::all()->first();
        $this->assertEquals('Tag Test', $category->name);
    }
}