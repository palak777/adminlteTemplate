@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
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
                    <a href="#" class="pull-right"><button type="button" class="btn btn-primary">Add</button></a>


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
                                    @if(count($employeeData)>0)
                                    @foreach(employeeData as $row)
                                      <tr>
                                        <td>{{$row->full_name }}</td>
                                        <td>{{$row->email }}</td>
                                        <td>{{$row->gender }}</td>
                                        <td>{{$row->country->country_name}}</td>
                                        <td><?php echo $row->bdate?date('d-m-Y',strtotime($row->bdate)):'-'; ?></td>
                                        <td>
                                          <a href="{{ route('emp-delete',[$row->id]) }}" onClick="return confirm('Are you sure for delete this?');"><button type="button" class="btn btn-danger">Delete</button></a>
                                          <a href="{{ route('emp-update',[$row->id]) }}"><button type="button" class="btn btn-success">Update</button></a>
                                        </td>
                                      </tr>      
                                    @endforeach
                                    
                                    @else
                                        <h3>No data</h3>
                                    @endif
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
