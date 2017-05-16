<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use File;

class InstallLocalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:local {--S|seed= : Seed or not}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install or reinstall app';
    
    /**
     * Create a new command instance.
     *
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
        if (env('APP_ENV') == 'local') {
            // 生成助手文件
            $this->callSilent('ide-helper:generate');
            $this->info('Ide-helper generated successfully.');
            $this->callSilent('ide-helper:meta');
            $this->info('Ide-helper meta generated successfully.');
            
            $this->callSilent('cache:clear');
            $this->info('Enjoy your time!');
        }
        else {
            $this->error('Installed failed.');
        }
    }
    
}
