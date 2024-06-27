@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Chart Content Page </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th><strong>Technology </strong></th>
                                <th><strong>Projects</strong></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($chart as $item)									 
                                <tr>
                                    <td> {{ $item->Technology  }}  </td>
                                    <td> {{ $item->Projects  }}  </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit.chart',$item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('delete.service',$item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
    </div>
</div>

@endsection