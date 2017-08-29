<?php

namespace Code16\WriteToConsole;

use Illuminate\Console\Command;

/**
 * A simple traits that decorates the Command class, so we
 * can write separate classes that outputs to user if launched from
 * artisan, or just ignore the verbosity otherwise.
 */
trait WriteToConsole
{
	/**
     * Handle to the Console, to redirect display there
     * 
     * @var Command;
     */
    protected $console;

    /**
     * Set a console command to redirect output to
     * 
     * @param Command $console
     * @return void
     */
    public function setConsole(Command $console)
    {
        $this->console = $console;
    }

    /**
     * Shortcut method to line method
     * 
     * @param  string $text]
     * @return void
     */
    protected function line($text)
    {
        if($this->console) {
            $this->console->line($text);
        }
    }

    /**
     * Shortcut method to add logging info
     * 
     * @param  string $text
     * @return void
     */
    protected function info($text)
    {
        if($this->console) {
            $this->console->info($text);
        }
    }

    /**
     * Shortcut method to add logging warning
     * 
     * @param  string $text
     * @return void
     */
    protected function warning($text)
    {
        $this->comment($text);
    }

    /**
     * Shortcut method to comment method
     * 
     * @param  string $text
     * @return void
     */
    protected function comment($text)
    {
        if($this->console) {
            $this->console->comment($text);
        }
    } 

    /**
     * Shortcut method to add logging error
     * 
     * @param  string $text
     * @return void
     */
    protected function error($text)
    {
        if($this->console) {
            $this->console->error($text);
        }
    }

    /**
     * Output a table to the console
     * 
     * @param  array $headers
     * @param  array $rows   
     * @return void
     */
    protected function table($headers, $rows)
    {
        if($this->console) {
            $this->console->table($headers, $rows);
        }
    }

    /**
     * Create a progress bar
     * 
     * @param  int    $count
     * @return Symfony\Component\Console\Helper\ProgressBar
     */
    protected function progressBar($count)
    {
        if($this->console) {
            return $this->console->getOutput()->createProgressBar($count);
        }
        else {
            return new NullProgressBar;
        }
    }
}
