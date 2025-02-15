@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 972px;">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Home Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('homecontent.update', $homecontent->id) }}" >
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" >Home Title</label>
                                    <input type="text" name="home_title" class="form-control input-default" value="{{ $homecontent->home_title }}">
                                    @error('home_title')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" >Home Subtitle</label>
                                    <input type="text" name="home_subtitle" class="form-control input-default" value="{{ $homecontent->home_subtitle }}" >
                                    @error('home_subtitle')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" >Video Description</label>
                                    <textarea class="form-control" name="video_description" id="summernote2">
                                        {{ $homecontent->video_description }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" >Video Url</label>
                                    <input type="text" name="video_url" class="form-control input-default" value="{{ $homecontent->video_url }}">
                                    @error('video_url')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <input type="submit" class="btn btn-success" value="Update Home Content" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 200
    });
</script>
<script type="text/javascript">
    $('#summernote2').summernote({
        height: 200
    });
</script>

@endsection