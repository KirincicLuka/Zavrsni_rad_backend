@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Footer Content Page </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th><strong>Footer Address </strong></th>
                                <th><strong>Footer Email</strong></th>
                                <th><strong>Footer Phone</strong></th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($footer as $item)									 
                                <tr>
                                    <td>{{ Str::limit($item->address, 25, '..') }} </td>
                                    <td> {{ $item->email  }}  </td>
                                    <td> {{ $item->phone  }}  </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit.footer',$item->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
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
        <p>Čestitamo! Uspješno ste dodali sav potreban sadržaj na web stranicu! Sada ju možete pregledati klikom na gumb ispod.</p>
        <a href="http://localhost:3000/" class="btn btn-primary">Pregledaj web stranicu</a>
    </div>
</div>

@endsection