# WriteToConsole trait

This is a simple trait to allow a third party class to output to an artisan console. 

Useful when implementing heavy procedural scripts which code is shared with other part of the application, or just written in its own class for easier testability. 

It simply redirects the `info()` , `error()` , `comment()`, `table()` and `progressBar()` methods to the command object set by calling the public `setConsole()` method of the trait, or just pass-through if no command object is set. 

## Example

Using the trait in a custom script : 

```php

namespace App\Tools;

use Code16\WriteToConsole\WriteToConsole;

class DataImporter
{
	use WriteToConsole;

	public function execute()
	{
		$this->info("Import started");

		$progress = $this->progressBar(100);

		for($x=0;$x<100;$x++) {
			$progress->advance();
		}

		$this->info("Import finished");
	}

}

```

Calling the script from an artisan console command : 

```php


<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Tools\DataImporter;

class DataImportsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import DATA';

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
    public function handle()
    {   
        $importer = app(DataImporter::class);
        $importer->setConsole($this);
        
        $importer->execute();

    }
}

```

## Output text to a logger

`WriteToConsole` also accepts a Psr-3 compatible logger as additionnal argument. Therefore every methods, excepts table() and progressBar(), will be redirected to the logger. 

```
    public function handle()
    {   
        $importer = app(DataImporter::class);
        $importer->setConsole($this);

        $logger = app(\Psr\Log\LoggerInterface::class);
        $importer->setLogger($logger);

        $importer->execute();

    }
```

## License

MIT

(c) 2018 Code16.fr