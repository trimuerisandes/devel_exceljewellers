<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\lab_grown_diamond;

class valour_lab_diamond extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:valour_lab_grown';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Valour Lab Grown Diamond';

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


        set_time_limit(0);

        $url = 'https://valourdiamonds.ca/API/action.php';
        $data = array(
            'action' => 'stock_list',
            'email' => 'info@exceljewellers.com',
            'password' => 'sach1957'
        );
        $options = array(
                'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'GET',
                'content' => json_encode($data),
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents( $url, false, $context );
        $response = json_decode( $result,true );
        $i=0;
        $s=0;


        $db = DB::table('lab_grown_diamonds')->where('company','Valour')->pluck('item_sku');
        $rates = DB::table('currency_rates')->where('base_currency','USD')->where('foreign_currency','CAD')->value('rate');

        foreach ($response['DATA'] as $key) {
            $array[] = $key['LOAT_NO'];
        }

        foreach ($db->toArray() as $key) {
            if (in_array($key,$array)) {
                continue;
            }else{
                 DB::table('lab_grown_diamonds')->where('company','Valour')->where('item_sku',$key)->delete();
                 DB::table('favourites')->where('item_sku',$key)->delete();
                $s++;
            }
        }

        foreach ($response['DATA'] as $key) {
            if ($key['IMAGE']) {
                if (strpos($key['IMAGE'], 'v360') !== false) {
                    $content = @file_get_contents($key['IMAGE']);
                    if ($content === False) {
                       continue;
                    }
                    list($width, $height, $type, $attr) = getimagesize($key['IMAGE']);
                    if ($width == $height) {
                        if ($key['VIDEO']) {

                            if (strpos($key['VIDEO'], 'v360') !== false) {
                                    
                                    $test = DB::table('lab_grown_diamonds')->where('company','Valour')->where('item_sku','=',$key['LOAT_NO'])->get();

                                    if (count($test) > 0) {

                                        continue;

                                    }

                                    switch ($key['CUT']) {
                                        case 'EX':
                                           $cut = "Excellent";
                                            break;
                                        case 'VG':
                                            $cut = "Very Good";
                                            break;
                                        case 'IDEAL':
                                            $cut = "Ideal";
                                            break;
                                        case 'GD':
                                            $cut =  "Good";
                                            break;
                                        default:
                                            $cut = "";
                                            break;
                                    }

                                    switch ($key['POLISH']) {
                                        case 'EX':
                                           $po = "Excellent";
                                            break;
                                        case 'VG':
                                            $po = "Very Good";
                                            break;
                                        case 'IDEAL':
                                            $po = "Ideal";
                                            break;
                                        case 'GD':
                                            $po =  "Good";
                                            break;
                                        default:
                                            $po = $key['POLISH'];
                                            break;
                                    }

                                    $conversion = floatval(str_replace( ',', '',$key['AMOUNT'])) * $rates;

                                    switch (true) {
                                        case ($conversion <= 50):
                                            $new = $conversion*2.5;
                                            break;
                                        case ($conversion > 500 && $conversion <= 2001):
                                            $new = $conversion*2;
                                          
                                            break;
                                        case ($conversion > 2000 && $conversion < 5001):
                                            $new = $conversion*1.75;
                                        
                                            break;
                                        case ($conversion > 5000):
                                            $new = $conversion*1.5;
    
                                            break;
                                        default:
                                            $new = $conversion*2.5;
                                            break;
                                    }

                                    // return $key['LOAT_NO']."    AMOUNT=  ".$key['AMOUNT'] . " MARKUP= " . $new;

                                    $eng = new lab_grown_diamond;
                                    $eng->file_type="lab-grown-diamond";
                                    $eng->company="Valour";
                                    $eng->item_sku = $key['LOAT_NO'];
                                    $eng->currency = "CAD";
                                    $eng->price = $new;
                                    $eng->carat = $key['CARAT'];
                                    $eng->shape=ucfirst(strtolower($key['SHAPE']));
                                    $eng->color =$key['COLOR'];
                                    $eng->clarity =$key['CLARITY'];
                                    $eng->cut=$cut;
                                    $eng->polish=$po;
                                    $eng->width=$key['WIDTH'];
                                    $eng->length=$key['LENGTH'];
                                    if (ucfirst(strtolower($key['SHAPE'])) == "Round") {
                                        $eng->MM=$key['WIDTH'];
                                    }else{
                                        $eng->MM=$key['LENGTH'].'x'.$key['WIDTH'];
                                    }
                                    $eng->table=$key['TABLE_PER'];
                                    $eng->certificate=$key['CERTIFICATE_NO'];
                                    $eng->report=str_replace('.pdf','',$key['CERTIFICATE']);
                                    $eng->img_link=$key['IMAGE'];
                                    if (strpos($key['VIDEO'], 'diamondview.aspx') !== false) {
                                        $query_str = parse_url($key['VIDEO'], PHP_URL_QUERY);
                                        parse_str($query_str, $query_params);
                                        $eng->video_link = 'https://v360.in/v360studio/vision360.html?d='.$query_params['d'];
                                    }else{
                                        $eng->video_link=$key['VIDEO'];
                                    }
                                    $eng->save();
                                    $new=null;
                                    $i++;
                            }
                        }       
                    }
                }
            }
        }


    }
}
