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
        $Tag = Tag::create(array(
            'name' => 'Tag Test',
            'active' => true
        ));
        $this->assertEquals('Tag Test', $Tag->name);

        $Tag = Tag::all()->first();
        $this->assertEquals('Tag Test', $Tag->name);
    }

    public function test_check_if_a_tag_will_deleted()
    {
        Tag::create(array(
            'name' => 'Tag Test',
            'active' => true
        ));

        $child = Tag::all()->last();
        $this->assertEquals('Tag Test', $child->name);

        $child->delete();
        $childDeleted = Tag::all()->last();
        $this->assertEquals(null, $childDeleted);
    }

    public function test_check_if_a_tag_will_updated()
    {
        Tag::create(array(
            'name' => 'Tag Test',
            'active' => true
        ));

        $child = Tag::all()->last();
        $this->assertEquals('Tag Test', $child->name);

        $child->name = 'Tag Updated Test';
        $child->save();

        $childUpdated = Tag::all()->last();
        $this->assertEquals('Tag Updated Test', $childUpdated->name);
    }
}