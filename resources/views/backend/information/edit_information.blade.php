@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 972px;">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('information.update', $information->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" >Refund Policy</label>
                                    <textarea class="form-control" name="refund" id="summernote2"> {{$information->refund}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" >Terms and Conditions</label>
                                    <textarea class="form-control" name="terms" id="summernote3"> {{$information->terms}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" >Privacy Policy</label>
                                    <textarea class="form-control" name="privacy" id="summernote4"> {{$information->privacy}} </textarea>
                                </div>
                                <input type="submit" class="btn btn-success" value="Update Information" >
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
        height: 400
    });
</script>
<script type="text/javascript">
    $('#summernote2').summernote({
        height: 400
    });
</script>
<script type="text/javascript">
    $('#summernote3').summernote({
        height: 400
    });
</script>
<script type="text/javascript">
    $('#summernote4').summernote({
        height: 400
    });
</script>

@endsection