<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Install extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'project:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Projeyi Yükler';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{/*
		Schema::dropIfExists('article');
        Schema::dropIfExists('calendar');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('contents');
        Schema::dropIfExists('deletepost');
        Schema::dropIfExists('favorite');
        Schema::dropIfExists('language');
        Schema::dropIfExists('lesson');
        Schema::dropIfExists('menu');
        Schema::dropIfExists('notes');
        Schema::dropIfExists('onwork');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('readingpost');
        Schema::dropIfExists('users');
        Schema::dropIfExists('worked');
	*/	
		
		$this->comment('_______________________________________________');
        $this->comment('');
        $this->info('  Step: 1');
        $this->comment('');
        $this->info('    Please follow the following');
        $this->info('    instructions to create your');
        $this->info('    default user.');
        $this->comment('');
        $this->comment('-------------------------------------');
        $this->comment('');
		
		
		
		
		
		
		
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
