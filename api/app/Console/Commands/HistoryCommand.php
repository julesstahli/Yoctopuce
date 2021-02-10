<?php
namespace App\Console\Commands;

use App\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use App\Measure;

class HistoryCommand extends Command {
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'history';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Copy averages of measures for each hour into history table and delete data old of 30 days";
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Copy averages of measures for each hour into history table
        $lastInsertedData = History::orderBy("id", "desc")->first();
        $regs = DB::table('measures')->select(DB::raw("CONCAT(YEAR(created_at), '-', LPAD(MONTH(created_at), 2, '0'), '-', LPAD(DAY(created_at), 2, '0'), ' ', LPAD(HOUR(created_at), 2, '0'), ':00:00') as date, ' ' , AVG(temperature) as temperature, AVG(pression) as pression, AVG(humidity) as humidity, AVG(brightness) as brightness"))->groupBy('date');
        if ($lastInsertedData) {
            $regs = $regs->whereDate('date', '>', $lastInsertedData->date);
        }
        foreach ($regs->get() as $row) {
            $history = new History();
            $history->temperature = $row->temperature;
            $history->pression = $row->pression;
            $history->humidity = $row->humidity;
            $history->brightness = $row->brightness;
            $history->date = $row->date;
            $history->save();
        }
        // Delete data old of 30 days
        Measure::whereDate("created_at", "<", Carbon::now()->subDays(30)->toDateTimeString())->delete();
    }
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array();
    }
}