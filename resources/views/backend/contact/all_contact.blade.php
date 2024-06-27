@extends('admin.admin_master')
@section('admin')


<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contact Message Page </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong> Name </strong></th>
                                        <th><strong>Email </strong></th>
                                        <th><strong>Message </strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contact as $item)									 
                                    <tr>
                                        <td> {{ $item->name  }}  </td>
                                        <td> {{ $item->email  }}  </td>
                                        <td>{{ Str::limit($item->message, 30, '..') }} </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('delete.message',$item->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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