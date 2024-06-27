@extends('admin.admin_master')
@section('admin')


<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">                
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Home Page Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Home Title</strong></th>
                                        <th><strong>Home Subtitle</strong></th>
                                        <th><strong>Video</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($homecontent as $item)									 
                                    <tr>
                                        <td>{{ $item->home_title }}</td>
                                        <td>{{ $item->home_subtitle }}</td>
                                        <td>{{ Str::limit($item->video_url, 15, '...') }}  </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.homecontent', $item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.homecontent', $item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="http://127.0.0.1:8000/footer/edit/1" class="btn btn-primary">Dodaj zaglavlje</a>
    </div>
</div>

@endsection