
<div class="stage-container">
    <div class="wizard2-steps">
        <div class="cyo-bar-step step step-item " data-view-link="/engagement-ring-settings/">
            <div class="node">
                <div class="node-skin" style="border-left: 1px solid #e5e5e5;">
                    <div class="num number-1" style="padding-left: 16px;">1</div>

                    <div class="cont">
                        @if(session('create_ring.engagement-ring'))

                            ${{ number_format(\App\Helper\AppHelper::conversion(session('create_ring.engagement-ring')['currency'],session('create_ring.engagement-ring')['price'],session('currency')),2) }}
                            <a href="{{ url('/engagement-ring/'.session('create_ring.engagement-ring')['id'].'') }}">
                                <div class="view-btn">View</div>
                            </a>
                            <a href="{{ url('/engagement-ring')}}">
                                <div id="change-eng" class="change-btn">Change</div>
                            </a>

                        @else
                        <a class="uncomplete-eng" href="{{ url('/engagement-ring')}}">Select Setting</a> @endif
                    </div>
                    <div class="pho">
                        @if(session('create_ring.engagement-ring'))
                                <img class="stage-img" src="{{ session('create_ring.engagement-ring')['img'] }}">
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="cyo-bar-step step step-item " data-view-link="/design-your-own-engagement-ring/">
            <div class="node">
                <div class="node-skin node-skin-diamond">
                    <div style="padding-left: 16px;" class="num number-2">2</div>

                    <div class="cont">
                        @if(session('create_ring.stone'))

                        <span class="dia_retail">${{ number_format(\App\Helper\AppHelper::conversion(session('create_ring.stone')['currency'],session('create_ring.stone')['retail'],session('currency')),2) }}</span>
                        <a href="{{ url('/diamonds#/'.session('create_ring.stone')['stone_id'].'') }}">
                            <a href="{{ session('create_ring.stone')['url'] }}">
                                <div class="view-btn">View</div>
                            </a>
                        </a>
                        <a href="{{ url('/diamonds') }}">
                            <div id="change-dia" class="change-btn">Change</div>
                        </a>

                        @else
                        <a class="uncomplete-dia select-stones" href="{{ url('/diamonds')}}">Select Stone</a> @endif

                    </div>
                    <div class="pho">
                        @if(session('create_ring.stone'))
                        <img class="stage-img" id="{{ session('create_ring.stone')['stone_id'] }}" src="{{ asset('storage/image/moissanite/gem-shape/'.session('create_ring.stone')['shape'].'.jpg') }}">
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="cyo-bar-step step step-item active-step" data-view-link="/design-your-own-engagement-ring/">
            <div class="node">
                <div class="node-skin" style="border-left: 16px solid transparent;">
                    @if(session('create_ring.stone') && session('create_ring.engagement-ring'))
                    <div class="num number-3 complete-3">3</div>
                    @else
                    <div class="num number-3">3</div>
                    @endif

                    <div class="cont">
                        @if(session('create_ring.stone') && session('create_ring.engagement-ring'))
                        <div>
                            <a class="complete-ring" href="{{ url('/complete-ring')}}">
                                <span class="complete-ring-icon icon-diamond-ring"></span><div class="stage-text view-ring">View Ring</div>
                            </a>
                        </div>
                        @elseif(session('create_ring.engagement-ring'))
                        <a href="{{ url('/diamonds') }}"><div class="stage-text">Complete Ring</div></a>
                        @elseif(session('create_ring.stone'))
                        <a href="{{ url('/engagement-ring') }}"><div class="stage-text">Complete Ring</div></a>
                        @else
                        <div class="stage-text">Complete Ring</div>
                        @endif
                    </div>

                    <div class="pho cont-3"></div>
                </div>
            </div>
        </div>

    </div>
</div>
  
<style type="text/css">

@media only screen and (min-width:0){.stage-img{display:none}.num{display:none!important;width:55px;font-size:25px}.cont{padding-left:16px}}@media only screen and (min-width:480px){.num{display:table-cell!important;width:55px;font-size:25px}.cont{padding-left:0}}@media screen and(max-width:600px){.bd{display:none!important}}@media only screen and (min-width:768px){.stage-img{display:block}}.stage-container{font-size:11px;text-align:center}.wizard2-steps{font-family:'ZapfHumanist601BT-Roman';color:#333;letter-spacing:.8px;margin:20px 0 0 0;padding:0;position:relative;clear:both;display:table;width:100%;height:80px;margin:0 auto;border:1px solid #e2e2e2;border-collapse:separate;table-layout:fixed;line-height:1.3;position:relative;background-color:#e2e2e2;box-sizing:content-box!important;margin-bottom:5px}.wizard2-steps-heading,.wizard2-steps-heading h1,.wizard2-steps-heading h2{font-family:inherit;margin:0;color:inherit;font-size:16px;text-align:center}.wizard2-steps .node{position:relative;display:block;width:auto;height:80px;margin-right:16px;background:#fff;text-decoration:none}.wizard2-steps .node-skin{background-color:inherit}.wizard2-steps .node-skin{position:relative;z-index:2;display:table;table-layout:fixed;width:100%;height:inherit;vertical-align:middle;box-sizing:content-box!important}.wizard2-steps .node-skin>div{display:table-cell;vertical-align:middle}.wizard2-steps .step{position:relative;width:33.3%;display:table-cell;vertical-align:top}.wizard2-steps .pho>img{width:70px;height:auto}.wizard2-steps .node:before{width:0;height:0;border-top:40px solid #fff;border-bottom:40px solid #fff;border-left:15px solid transparent;position:absolute;content:"";top:0;left:-15px}.wizard2-steps .node:after{width:0;height:0;border-top:40px solid transparent;border-bottom:40px solid transparent;border-left:15px solid #fff;position:absolute;content:"";top:0;right:-15px}steps-heading h2{font-family:inherit;margin:0;color:inherit;font-size:16px;text-align:center}.nostyle-heading{color:inherit;display:inline-block;font-family:inherit;font-size:inherit;margin:0;padding:0;text-transform:inherit}.change-btn,.view-btn{transition:.2s;cursor:pointer}.change-btn:hover,.view-btn:hover{color:#d60d8c}.view-ring{color:#d60d8c;}.complete-ring-icon{font-size:30px;color:#d60d8c;}.complete-3{color:#d60d8c;}.cont-3{width: 20%;}

</style>
