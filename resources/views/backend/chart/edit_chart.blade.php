@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Chart </h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('chart.update') }}" >
                                @csrf
                                <input type="hidden" name="id" value="{{ $chart->id }}">
                                <div class="form-group">
                                    <label class="info-title">  Technology </label>
                                    <input type="text" name="Technology" class="form-control input-default " value="{{ $chart->Technology }}"  >
                                    @error('Technology')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title">  Projects </label>
                                    <input type="text" name="Projects" class="form-control input-default " value="{{ $chart->Projects }}"  >
                                    @error('Projects')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <input type="submit" class="btn btn-success" value="Update Chart">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 