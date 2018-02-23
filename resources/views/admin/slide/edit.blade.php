@extends('admin.master')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        {{ Form::open(array('route' => ['admin.slide.update', $data['id']], 'class' => 'form-horizontal','files'=>true,'name'=>'frmEditSlide')) }}
            <div class="col-md-8">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Edit slide</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label required">Text link</label>
                                <input type="text" class="form-control" placeholder="Text link" name="textlink" value="{!! old('textlink',isset($data) ? $data['textlink']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label required">Link</label>
                                <input type="text" class="form-control" placeholder="Link" name="link" value="{!! old('link',isset($data) ? $data['link']:null ) !!}">
                            </div>
                            <div class="form-group">
                              <label class="">Image</label>
                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                      <i class="fa fa-picture-o"></i> Choose
                                    </a>

                                     <a href="javascript:void(0)" type="button" id="delImageSlide" class="btn btn-primary"><i class="fa fa-times"></i>Delete image</a>
                                  </span>
                                  <input id="thumbnail" class="form-control" type="text" name="image" value="{!! old('intro',isset($data) ? $data['image']:null ) !!}">

                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;" src="{!! asset($data['image'])  !!}" idHinh="{!! $data['id'] !!}" id="{!! $data['id'] !!}">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                            <span class="caption-subject bold uppercase">Search Engine Optimize</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="">SEO title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" value="{!! old('title',isset($data) ? $data['title']:null ) !!}">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span>Title tags are displayed on search engine results pages (SERPs) as the clickable headline for a given result, and are important for usability, SEO, and social sharing. The title tag of a web page is meant to be an accurate and concise description of a page's content.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">SEO description</label>
                                <input type="text" class="form-control" placeholder="Description" name="description" value="{!! old('description',isset($data) ? $data['description']:null ) !!}">
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span> The meta description is a ~160 character snippet, a tag in HTML, that summarizes a page's content. Search engines show the meta description in search results mostly when the searched for phrase is contained in the description. Optimizing the meta description is a very important aspect of on-page SEO.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                            <span class="caption-subject bold uppercase">Publish</span>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Publish</button>
                            <button type="submit" class="btn blue">Publish & edit</button>
                        </div>
                    </div>
                </div>

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                            <span class="caption-subject bold uppercase">Status</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-group">
                            <select class="form-control" name="status">
                                <option value={!! $data['status'] !!} selected>{!! $currentNameStatus !!}</option>
                                <option value={!! $otherStatus !!}>{!! $otherNameStatus !!}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
      var route_prefix = "{{ url(config('lfm.prefix')) }}";
    </script>
    <script>
      {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
  </script>
    <link href="{{ URL::asset('/admin/assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css" />

@endsection()
