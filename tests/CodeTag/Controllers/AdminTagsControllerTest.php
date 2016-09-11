<?php

namespace CodePress\CodeTag\Tests\Controllers;

use CodePress\CodeTag\Controllers\AdminCategoriesController;
use CodePress\CodeTag\Controllers\AdminTagsController;
use CodePress\CodeTag\Controllers\Controller;
use CodePress\CodeTag\Models\Tag;
use CodePress\CodeTag\Repository\TagRepository;
use CodePress\CodeTag\Tests\AbstractTestCase;
use Illuminate\Contracts\Routing\ResponseFactory;
use Mockery as m;

class AdminTagsControllerTest extends AbstractTestCase
{
    public function test_should_extend_from_controller()
    {
        $repository = m::mock(TagRepository::class);
        $response   = m::mock(ResponseFactory::class);
        $controller = new AdminTagsController($response, $repository);

        $this->assertInstanceOf(Controller::class, $controller);
    }

    public function test_controller_should_run_index_method_and_return_correct_arguments()
    {
        $repository   = m::mock(TagRepository::class);
        $response   = m::mock(ResponseFactory::class);
        $html       = m::mock();
        $controller = new AdminTagsController($response, $repository);

        $tagResult = array('tag1', 'tag2', 'tag3', 'tag4');
        $repository->shouldReceive('paginate')->andReturn($tagResult);

        $response->shouldReceive('view')
            ->with('codetag::index', array('tags' => $tagResult))
            ->andReturn($html);

        $this->assertEquals($controller->index(), $html);
    }
}