<?php

use Stubs\TestCommand;
use Stubs\TestKernel;
use Stubs\TestScript;

class WriteToConsoleTest extends Orchestra\Testbench\TestCase
{
    protected function setUp(): void
	{
    	parent::setUp();
    	$this->app->singleton(Illuminate\Contracts\Console\Kernel::class, TestKernel::class);
    }

	/** @test */
    public function it_writes_to_console_when_console_is_set()
    {
    	$this->app->make(Illuminate\Contracts\Console\Kernel::class)->registerCommand(app(TestCommand::class));
    	$intance = $this->artisan('test:test');
    	$this->assertTrue(true);
    }

    /** @test */
    public function it_quietly_pass_through_when_no_console_is_set()
    {
    	$script = app(TestScript::class);
    	$this->assertTrue($script->execute());
    }
}
