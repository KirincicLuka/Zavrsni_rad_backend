@extends('admin.admin_master')
@section('admin')


<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">                
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Information Page </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Refund Policy</strong></th>
                                        <th><strong>Terms And Condition</strong></th>
                                        <th><strong>Privacy And Policy</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result as $item)									 
                                    <tr>
                                        <td>{{ Str::limit($item->refund, 20, '...') }}  </td>
                                        <td>{{ Str::limit($item->terms, 20, '...') }} </td>
                                        <td>{{ Str::limit($item->privacy, 20, '...') }} </td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.information', $item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.information', $item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
        <a href="http://127.0.0.1:8000/service/add" class="btn btn-primary">Dodaj slike</a>
    </div>
</div>

@endsection