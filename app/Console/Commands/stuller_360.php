<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;
use App\engagement_ring;


class stuller_360 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:stuller_360';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get 360 videos of jewelry';

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

        // $Solitaire_id = ['124702','124648','124519','124560','124405','124522','124333','124305','124276','124184','124171','124170','124046','124008','123823','123713','123639','123599','123636','123440','123453','123345','123213','123226','123043','123044','123131','123132','123018','122969','123060','123059','122938','122939','122903','122797','122705','71759','122558','122574','122563','122522','122496','122455','122364','122366','122183','122339','122290','122242','122278','122340','122187','122279','122089','122218','122231','122224','122118','122100','122095','122099','122059','122063','122043','122062','122054','122048','122047','122011','122004','122005','121990','122054'];

            // $halo_id = ['124628','124665','124542','124443','124478','124468','124470','124403','124381','124331','124435','124330','124282','124246','124248','124241','124240','124155','124056','123938','123884','123928','123861','123615','123562','123641','123473','123525','123567','123541','123481','123385','123449','123449','123387','123344','123359','123348','123333','123335','123336','123271','123310','123242','123337','123267','123227','123173','123243','123082','123038','122965','123022','123023','122986','122989','122908','122918','122925','122884','122917','122909','122854','122864','122836','122888','122892','122873','122870','122842','122791','122830','122804','122651','122699','122669','122653','122645','122650','122643','122648','122624','122618','122616','122605','122193','122582','122596','122580','122569','122567','122545','122548','122561','122547','122540','122354','122528','122520','122493','122516','122497','122485','122472','122506','122488','122463','122464','122477','122457','122378','122459','122399','122413','71680','122280','122305','122304','122367','122382','122311','122342','122238','122281','122324','122295','122200','122344','122205','122284','122353','122319','122207','122328','122273','122268','71639','122177','122110','122181','122179','122091','122109','122230','122317','122240','122232','122221','122173','71640','122203','122086','122088','122106','122101','122092','122087','122116','122084','122064','122060','122067','122051','122052','122053','121999','122001','121992','121995','121999','121987','121981','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''];

        set_time_limit(0);

        for ($i=1; $i < 3500; $i++) {   

            $login = 'excel';
            $password = 'Excel2000';
            $url = 'https://www.stuller.com/api/v2/products?CategoryIds=23618&Page='.$i;
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
            $result = curl_exec($ch);

            $result1 = json_decode($result,true);



            

            foreach ($result1["Products"] as $key) {
           
                if (!isset($key['MerchandisingCategory4']) OR  !isset($key['Videos'][0]['DownloadUrl']) OR !isset($key['Videos']) OR !isset($key['MerchandisingCategory5']) OR !isset($key['MerchandisingCategory3']) OR !isset($key['Description'])) {
                    continue;
                }

                if (str_contains($key['Description'],'Engagement Ring') OR str_contains($key['ShortDescription'],'Engagement Ring')) {

                    if (str_contains($key['Description'],'Solitaire') OR str_contains($key['MerchandisingCategory5'],'Solitaire') OR str_contains($key['MerchandisingCategory4'],'Solitaire') OR str_contains($key['ShortDescription'],'Solitaire')) {

                    }else{
                        continue;
                    }

                    // foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                     
                    //     if (str_contains($key1['Name'],'Stone Shape')) {
                    //         if ($key1['Value'] == 'Round') {
                                
                    //             foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                 if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'7')) {

                    //                     $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                    //                     Storage::disk('local')->put($.'.mp4', $contents);

                                    
                    //                 }
                    //             }

                    //         }
                    //     }
                    // }
                    // if (str_contains($key['CenterStoneShape'],'ROUND') && str_contains($key['CenterStoneSize'],'7')) {
                        
                        

                    // }
                    // dd(123);

                    if (!str_contains($key['Videos'][0]['DownloadUrl'],'.mp4')) {
                        continue;
                    }

                    if (str_contains($key['CenterStoneShape'],'ROUND') && str_contains($key['CenterStoneSize'],'6.5')) {
                        
                        $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                        $sku = explode(":", $key['SKU']);

                        foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                            if (str_contains($key1['Name'],'Quality')) {
                                $metal = str_replace([' ','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            }
                        }

                        Storage::disk('local')->put($sku[0].'-'.$metal.'-'.$key['CenterStoneShape'].'.mp4', $contents);

                    }

                    if (str_contains($key['CenterStoneShape'],'CUSHION') && str_contains($key['CenterStoneSize'],'6')) {
                        
                        $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                        $sku = explode(":", $key['SKU']);

                        foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                            if (str_contains($key1['Name'],'Quality')) {
                                $metal = str_replace([' ','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            }
                        }

                        Storage::disk('local')->put($sku[0].'-'.$metal.'-'.$key['CenterStoneShape'].'.mp4', $contents);

                    }

                    if (str_contains($key['CenterStoneShape'],'SQUARE') && str_contains($key['CenterStoneSize'],'5.5')) {
                        
                        $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                        $sku = explode(":", $key['SKU']);

                        foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                            if (str_contains($key1['Name'],'Quality')) {
                                $metal = str_replace([' ','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            }
                        }

                        Storage::disk('local')->put($sku[0].'-'.$metal.'-'.$key['CenterStoneShape'].'.mp4', $contents);

                    }

                    if (str_contains($key['CenterStoneShape'],'OVAL') && str_contains($key['CenterStoneSize'],'8')) {
                        
                        $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                        $sku = explode(":", $key['SKU']);

                        foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                            if (str_contains($key1['Name'],'Quality')) {
                                $metal = str_replace([' ','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            }
                        }

                        Storage::disk('local')->put($sku[0].'-'.$metal.'-'.$key['CenterStoneShape'].'.mp4', $contents);

                    }

                    if (str_contains($key['CenterStoneShape'],'EMERALD') && str_contains($key['CenterStoneSize'],'7')) {
                        
                        $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                        $sku = explode(":", $key['SKU']);

                        foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                            if (str_contains($key1['Name'],'Quality')) {
                                $metal = str_replace([' ','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            }
                        }

                        Storage::disk('local')->put($sku[0].'-'.$metal.'-'.$key['CenterStoneShape'].'.mp4', $contents);

                    }

                    if (str_contains($key['CenterStoneShape'],'PEAR') && str_contains($key['CenterStoneSize'],'8')) {
                        
                        $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                        $sku = explode(":", $key['SKU']);

                        foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                            if (str_contains($key1['Name'],'Quality')) {
                                $metal = str_replace([' ','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            }
                        }

                        Storage::disk('local')->put($sku[0].'-'.$metal.'-'.$key['CenterStoneShape'].'.mp4', $contents);

                    }

                    if (str_contains($key['CenterStoneShape'],'ASSCHER') && str_contains($key['CenterStoneSize'],'5')) {
                        
                        $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                        $sku = explode(":", $key['SKU']);

                        foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                            if (str_contains($key1['Name'],'Quality')) {
                                $metal = str_replace([' ','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            }
                        }

                        Storage::disk('local')->put($sku[0].'-'.$metal.'-'.$key['CenterStoneShape'].'.mp4', $contents);

                    }

                    if (str_contains($key['CenterStoneShape'],'MARQUISE') && str_contains($key['CenterStoneSize'],'10')) {
                        
                        $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                        $sku = explode(":", $key['SKU']);

                        foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                            if (str_contains($key1['Name'],'Quality')) {
                                $metal = str_replace([' ','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            }
                        }

                        Storage::disk('local')->put($sku[0].'-'.$metal.'-'.$key['CenterStoneShape'].'.mp4', $contents);

                    }

                    if (str_contains($key['CenterStoneShape'],'HEART') && str_contains($key['CenterStoneSize'],'6')) {
                        
                        $contents = file_get_contents($key['Videos'][0]['DownloadUrl']);

                        $sku = explode(":", $key['SKU']);

                        foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                            if (str_contains($key1['Name'],'Quality')) {
                                $metal = str_replace([' ','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            }
                        }

                        Storage::disk('local')->put($sku[0].'-'.$metal.'-'.$key['CenterStoneShape'].'.mp4', $contents);

                    }


                    $sku = explode(":", $key['SKU']);

                    foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                        if (str_contains($key1['Name'],'Quality')) {
                            $metal = str_replace([' ','ellow','hite','ose','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);

                            
                            $k = str_replace([' ','','Yellow','White','Rose','Silver','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);
                            $m = str_replace([' ','','10K','14K','18K','/','Sterling','Continuum','X1'],'',$key1['DisplayValue']);

                        }
                    }


                    if (!isset($key['ShowcasePrice']['Value'])) {
                    echo('<br>');
                    echo($key['Id'].":".$key['SKU']);
                    continue;
                    }

                    if (!isset($key['Description'])) {
                            $description = "Classic Engagement Ring With any choice of a center stone.";
                    }else{
                            $description = $key['Description'];
                    }

                    $eng = new engagement_ring;
                    $eng->file_type = "engagement-ring";
                    $eng->item_code = $sku[0].'-EX';
                    $eng->style ='Solitaire';
                    $eng->currency='CAD';
                    $eng->width =null;
                    $eng->setting_type =null;
                    
                    $eng->collection =null;
                    $eng->brand ='Excel-S';

                    $eng->carat =null;
                    $eng->stoneshape= ucwords(strtolower($key['CenterStoneShape']));
                    $eng->item_sku = $sku[0].'-'.$metal.'-'.substr($key['CenterStoneShape'], 0, 1);
                    $eng->name = $description;
                    $eng->image =$sku[0].'-'.$metal.'-'.substr($key['CenterStoneShape'], 0, 1);;
                    $eng->image_360 =$sku[0].'-'.$metal.'-'.$key['CenterStoneShape'];
                    $eng->price =round($key['ShowcasePrice']['Value'],2);
                    $eng->sale_price =null;
                    $eng->description = $description;
                    $eng->metal =$k;
                    $eng->color =$m;
                    $eng->item_link = $key['Id'].":".$key['SKU'];
                    $eng->quantity = 0;
                    $eng->sold = 0;
                    $eng->save();

                    // dd(123);

                    // foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $stone => $key1) {
                    //     if (str_contains($key1['Name'],'Stone Shape')) {
                    //         switch ($key1['Value']) {
                    //             case 'Round':
                    //                 foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                     if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'6.5')) {
                    //                         echo(234234234);
                    //                     }
                    //                 }
                    //                 break;
                    //             case 'Cushion':
                    //                 foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                     if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'6')) {
                    //                         echo(234234234);
                    //                     }
                    //                 }
                    //                 break;
                    //             case 'Princess':
                    //                 foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                     if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'5.5')) {
                    //                         echo(234234234);
                    //                     }
                    //                 }
                    //                 break;
                    //             case 'Oval':
                    //                 foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                     if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'8')) {
                    //                         echo(234234234);
                    //                     }
                    //                 }
                    //                 break;
                    //             case 'Emerald':
                    //                 foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                     if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'7')) {
                    //                         echo(234234234);
                    //                     }
                    //                 }
                    //                 break;
                    //             case 'Pear':
                    //                 foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                     if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'8')) {
                    //                         echo(234234234);
                    //                     }
                    //                 }
                    //                 break;
                    //             case 'Asscher':
                    //                 foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                     if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'5')) {
                    //                         echo(234234234);
                    //                     }
                    //                 }
                    //                 break;
                    //             case 'Marquise':
                    //                 foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                     if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'10')) {
                    //                         echo(234234234);
                    //                     }
                    //                 }
                    //                 break;
                    //             case 'Heart':
                    //                 foreach ($key['DescriptiveElementGroup']['DescriptiveElements'] as $size => $key2) {
                    //                     if (str_contains($key2['Name'],'Stone Size') && str_contains($key2['Value'],'6')) {
                    //                         echo(234234234);
                    //                     }
                    //                 }
                    //                 break;
                                
                    //             default:
                    //                 echo('None');
                    //                 break;
                    //         }
                    //     }
                    // }



                }

            }

            echo('Page '.$i);

        }

    }
}
