    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



  <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/wedding-band.css?'.time().'') }}">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/general.css?'.time().'') }}" rel="stylesheet">
    <script src="{{ asset('js/slick.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('storage/image/page_img/icon.png') }}" />

    <script type="text/javascript" src="{{ asset('js/general.js?'.time().'') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
      <main>
        <div class="msg-box">
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              {!! \Session::get('success') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @elseif(\Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
              {!! \Session::get('error') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        </div> 
        <div class="frames-header p-3 pb-md-4 mx-auto mb-4 text-center">
            <h1 class="display-4 fw-normal">Jewellery Frame Generator</h1>
            <p class="fs-5 text-muted">Quickly Generates and customize Frames</p>
        </div>
        <div class="container">
          <div class="pb-5 text-center">
            <div class="container">
                <video id="video" width="550" height="300" controls>
                  Your browser does not support HTML5 video.
                </video>
            </div>
            <div class="w-40 mx-auto pt-5">

                <div class="container">
                      <!-- Preview Form -->
                      <form id="data" action="{{ url('upload_video_to_360') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="custom-file">
                            <label class="custom-file-label" for="file">Choose file</label>
                            <input type="file"
                                name="file"
                                class="form-control @error('file') is-invalid @enderror"
                                id="file" 
                                accept="video/*" Required>
                                @error('file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                          </div>
                          <br>
                          <br>
                          <select required name="file_type">
                            <option value="engagement-ring">Engagement Ring</option>
                            <option value="wedding-band">Wedding Band</option>
                            <option value="fine-jewellery">Fine Jewellery</option>
                          </select>

                          <h3 class="pt-5">Product Search</h3> 
                          <input type="" name="product_search">
                          <button name="search_btn" type="button">Search</button>
                          
                          <script type="text/javascript">
                            $(document).ready(function(){
                              $('button[name=search_btn]').click(function(){
                                $.ajax({
                                    url: "search_data_360",
                                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                                    method: "POST",
                                    dataType:'json',
                                    data: { type:$('select[name=file_type] option:selected').val(),search: $('input[name=product_search]').val(), page:1 },
                                    beforeSend: function () {
                            
                                    },
                                    success: function (e) {
                                        $('#wedding-band-container').empty();
                                        $.each(e,function(index, itemData){
                                          $('#wedding-band-container').append('<div class="item_found"><input value="'+itemData.file_type+':'+itemData.item_sku+'" name="checked[]" type="checkbox"><img src="<?php echo(asset("storage/image/")) ?>/'+itemData.file_type+'/'+itemData.image+'-1.jpg"><div class="sku_name" data-type="'+itemData.file_type+'">'+itemData.item_sku+'</div><div class="name_name">'+itemData.name+'</div></div>')
                                        });
                                    },
                                    error: function (e, n, o) {
                                        console.log(e);
                                    },
                                });

                              });

                              $(document).on('click','.item_found',function(){
                                $(this).addClass('selected');
                                $(this).find('input').prop('checked',true);
                              });

                              $(document).on('click','.selected',function(){
                                $(this).removeClass('selected');
                                $(this).find('input').prop('checked',false);
                              });

                            });
                            

                          </script>

                          <style type="text/css">
                            .item_found{
                              width: 200px;
                            }

                            .item_found img{
                              width: 100%;
                            }

                            .sku_name{
                              font-size: 9px;
                            }

                            .name_name{
                              font-size: 11px;
                            }

                            .selected{
                              border:solid 1px #d60d8c;
                            }
                          </style>

                          <div id="wedding-band-container"></div>

                          <div class="form-group mt-5">
                            
                              <h5 class="py-2">Frames Information:</h5>
                              <div class="frames-info">

                                <input type="text" 
                                class="@error('folder_name') is-invalid @enderror"
                                  name="folder_name"
                                  placeholder="Folder Name"
                                  id="folder_name" Required>
                                  @error('folder_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="text" 
                                  name="fps"
                                  class="@error('fps') is-invalid @enderror"
                                  placeholder="Frame every second"
                                  id="duration" Required>
                                  @error('fps')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror

                              </div>
                              
                              <div class="form-group range-slider mt-3">

                                <span class="badge badge-dark">Compress</span>

                                <div class="d-inline-block">
                                    <input type="range" 
                                    name="qscale"
                                    class="form-control-range range-slider__range @error('qscale') is-invalid @enderror"
                                    value="2" min="2" max="31" step ="1"
                                    id="qscale">
                                    <span class="range-slider__value">0</span>
                                     @error('qscale')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                              </div>
                
                          </div>

                          <button id="upload" class="btn btn-outline-dark mt-2" name="process" type="submit">SUBMIT</button>
                      </form>
                </div>
            </div>
          </div>
        </div>
      <main>
    </div>
    

    
    <!-- Script for preview -->
    <script>
        const input = document.getElementById('file');
        const video = document.getElementById('video');
        const videoSource = document.createElement('source');

        input.addEventListener('change', function() {
          const files = this.files || [];

          if (!files.length) return;
          
          const reader = new FileReader();

          reader.onload = function (e) {
            videoSource.setAttribute('src', e.target.result);
            video.appendChild(videoSource);
            video.load();
            video.play();
          };
          
          reader.onprogress = function (e) {
            console.log('progress: ', Math.round((e.loaded * 100) / e.total));
          };
          
          reader.readAsDataURL(files[0]);
        });
    </script>

    <!-- Script for CSS Filters -->
    <script>
      var constrast = document.getElementById("contrast");
      var brightness = document.getElementById("brightness");
      var saturation = document.getElementById("saturation");
      var vibrance = document.getElementById("contrast");

      constrast.addEventListener('change', function() {
        video.style.filter = "contrast("+contrast.value+")" + " " +
                             "saturate("+saturation.value+")" + " " +
                             "brightness("+brightness.value+")";
      });

      saturation.addEventListener('change', function() {
        video.style.filter = "contrast("+contrast.value+")" + " " +
                             "saturate("+saturation.value+")" + " " +
                             "brightness("+brightness.value+")";
      });

      brightness.addEventListener('change', function() {
        video.style.filter = "contrast("+contrast.value+")" + " " +
                             "saturate("+saturation.value+")" + " " +
                             "brightness("+brightness.value+")";
      });

    </script>

    <!-- Script for Range Slider -->
    <script>
      var rangeSlider = function(){
      var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    
      slider.each(function(){

        value.each(function(){
          var value = $(this).prev().attr('value');
          $(this).html(value);
        });

        range.on('input', function(){
          $(this).next(value).html(this.value);
          });
        });
       };
      rangeSlider();
    </script>

  <style type="text/css">
    
.frames-header {
    max-width: 750px;
}

.form-group {
    margin-top: 30px;
    margin-bottom: 30px;
}

/** CSS FOR RANGE INPUT **/
input[type="range"] {
    width: 280px !important;
}

.range-slider {
    margin: 60px 0 0 0%;
}

.range-slider {
    width: 100%;
}

.range-slider__range {
    -webkit-appearance: none;
    width: calc(100% - (73px));
    height: 10px;
    border-radius: 5px;
    background: #d7dcdf;
    outline: none;
    padding: 0;
    margin: 0;
}
.range-slider__range::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #2c3e50;
    cursor: pointer;
    -webkit-transition: background 0.15s ease-in-out;
    transition: background 0.15s ease-in-out;
}
.range-slider__range::-webkit-slider-thumb:hover {
    background: #1abc9c;
}
.range-slider__range:active::-webkit-slider-thumb {
    background: #1abc9c;
}
.range-slider__range::-moz-range-thumb {
    width: 20px;
    height: 20px;
    border: 0;
    border-radius: 50%;
    background: #2c3e50;
    cursor: pointer;
    -moz-transition: background 0.15s ease-in-out;
    transition: background 0.15s ease-in-out;
}
.range-slider__range::-moz-range-thumb:hover {
    background: #1abc9c;
}
.range-slider__range:active::-moz-range-thumb {
    background: #1abc9c;
}
.range-slider__range:focus::-webkit-slider-thumb {
    box-shadow: 0 0 0 3px #fff, 0 0 0 6px #1abc9c;
}

.range-slider__value {
    display: inline-block;
    position: relative;
    width: 60px;
    color: #fff;
    line-height: 20px;
    text-align: center;
    border-radius: 3px;
    background: #2c3e50;
    padding: 5px 10px;
    margin-left: 8px;
}
.range-slider__value:after {
    position: absolute;
    top: 8px;
    left: -7px;
    width: 0;
    height: 0;
    border-top: 7px solid transparent;
    border-right: 7px solid #2c3e50;
    border-bottom: 7px solid transparent;
    content: "";
}

::-moz-range-track {
    background: #d7dcdf;
    border: 0;
}

/* CSS For INPUT Field */
input::-moz-focus-inner,
input::-moz-focus-outer {
    border: 0;
}
.form-control-file,
.form-control-range {
    display: inline-block;
    width: 100%;
}


  </style> 