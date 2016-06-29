<?php

namespace CodePress\CodeTag\Tests\Controllers;

use CodePress\CodeTag\Controllers\AdminCategoriesController;
use CodePress\CodeTag\Controllers\Controller;
use CodePress\CodeTag\Models\Tag;
use CodePress\CodeTag\Tests\AbstractTestCase;
use Illuminate\Contracts\Routing\ResponseFactory;
use Mockery as m;

class AdminTagsControllerTest extends AbstractTestCase
{
    public function test_should_extend_from_controller()
    {
        $tag   = m::mock(Tag::class);
        $response   = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($response, $tag);

        $this->assertInstanceOf(Controller::class, $controller);
    }

    public function test_controller_should_run_index_method_and_return_correct_arguments()
    {
        $tag   = m::mock(Tag::class);
        $response   = m::mock(ResponseFactory::class);
        $html       = m::mock();
        $controller = new AdminCategoriesController($response, $tag);

        $tagResult = array('cat1', 'cat2', 'cat3', 'cat4');
        $tag->shouldReceive('all')->andReturn($tagResult);

        $response->shouldReceive('view')
            ->with('codetag::index', array('tags' => $tagResult))
            ->andReturn($html);

        $this->assertEquals($controller->index(), $html);
    }
}