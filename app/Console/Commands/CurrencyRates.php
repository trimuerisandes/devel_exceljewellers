<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use DB;

class CurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Global Currency Rates';

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
    public function handle(){

        
        $currencies = ['CAD','USD'];

        foreach ($currencies as $c) {

            $currency = json_decode(file_get_contents('https://api.exchangeratesapi.io/latest?base='.$c.''));

            foreach ($currency->rates as $key => $value) {
         
                 $count = DB::table('currency_rates')->where('base_currency',$c)->where('foreign_currency',$key)->get();
                if (count($count) > 0) {
                    DB::table('currency_rates')->where('base_currency',$c)->where('foreign_currency',$key)->update([
                        'rate'=>$currency->rates->$key
                    ]);
                }else{
                    DB::table('currency_rates')->insert([
                        'base_currency'=>$c,
                        'foreign_currency'=>$key,
                        'rate'=>$currency->rates->$key
                    ]);
                }
            }

            echo "Currency ".$c." completed " ;

        }


    }
}
