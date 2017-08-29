<?php

namespace Stubs;

use Code16\WriteToConsole\WriteToConsole;

class TestScript
{
	use WriteToConsole;

	public function execute()
	{
		$this->comment("script started");
		$this->table(['1',"2"],[["a","b"], ['c','d']]);
		$this->warning('warning');
		$this->error('error');
		$progress = $this->progressBar(1);
		$progress->advance();
		$this->info('script finished');
		return true;
	}

}
