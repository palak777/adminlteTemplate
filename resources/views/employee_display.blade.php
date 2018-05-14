@extends('adminlte::page')

@section('htmlheader_title')
	Emoloyee Details
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Details</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <a href="{{ route('employeeList') }}" class="pull-right"><button type="button" class="btn btn-primary">Add</button></a>


                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="container">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                      <tr>
                                        <th>Firstname</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Country</th>
                                        <th>Bdate</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($employeeData as $row)
                                      <tr>
                                        <td>{{$row->full_name }}</td>
                                        <td>{{$row->email }}</td>
                                        <td>{{ $row->gender }}</td>
                                        <td>{{$row->countryList->country_name}}</td>
                                        <td><?php echo $row->bdate?date('d-m-Y',strtotime($row->bdate)):'-'; ?></td>
                                        <td>
                                            <a href="{{ route('employeeDelete',[$row->id]) }}" onClick="return confirm('Are you sure for delete this?');">
                                                <i class="fa fa-trash"></i>
                                            </a>&nbsp;
                                            <a href="{{ route('employeeUpdateView',[$row->id]) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                      </tr>      
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
			</div>
		</div>
	</div>
@endsection
