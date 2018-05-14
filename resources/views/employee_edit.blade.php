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
                        <h3 class="box-title">Edit Employee </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" action="{{ route('employeeUpdate',[$employeeData->id])}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}

                               @if(count($errors))
                                    <div class="alert alert-danger">
                                      @foreach ($errors->all() as $error)
                                        {{ $error }} <br>
                                      @endforeach
                                    </div>
                               @endif

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="full_name">Full Name:*</label>
                                <div class="col-sm-6">
                                  <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter Name" value="{{ $employeeData->full_name }}">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Email:*</label>
                                <div class="col-sm-6">
                                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $employeeData->email }}">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="country">Country:*</label>
                                <div class="col-sm-6">
                                  <select name="country" class="form-control" id="country">
                                   @foreach($countryData as $row)
                                      <option value="{{ $row->id }}" {{ $row->id==$employeeData->country?'selected':'' }}>{{ $row->country_name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="address">Address:</label>
                                <div class="col-sm-6">
                                  <textarea  name="address" class="form-control" id="address" placeholder="Enter Address">{{ $employeeData->address }}</textarea>
                                </div>
                              </div>

                               <div class="form-group">
                                <label class="control-label col-sm-4" for="bdate">Bdate:</label>
                                <div class="col-sm-6">
                                   <input type="date" class="form-control" id="bdate" name="bdate" value="{{ $employeeData->bdate }}">
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="gender">Gender:*</label>
                                <div class="col-sm-1">
                                   <input type="radio" value="male"  name="gender" {{ $employeeData->gender=='male'?'checked':'' }}> Male
                                </div>
                                <div class="col-sm-1">
                                   <input type="radio" value="female"  name="gender" {{ $employeeData->gender=='female'?'checked':'' }}> Female
                                </div>
                              </div>
                            @php
                              $hobby=array();
                              if($employeeData->hobbies)
                              {
                                $hobby=explode(',',$employeeData->hobbies);
                              }
                            @endphp
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="hobbies">Hobbies:</label>
                                <div class="col-sm-1">
                                   <input type="checkbox" value="cricket" name="hobbies[]" {{ in_array('cricket',$hobby)?'checked':'' }}> Cricket
                                </div>
                                <div class="col-sm-1">
                                   <input type="checkbox" value="music" name="hobbies[]" {{ in_array('music',$hobby)?'checked':'' }}> Music
                                </div>
                                <div class="col-sm-1">
                                   <input type="checkbox" value="dance" name="hobbies[]" {{ in_array('dance',$hobby)?'checked':'' }}> Dance
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="photo">photo</label>
                                <div class="col-sm-4">
                                   <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                                 <div class="col-sm-1">
                                   <img  src="{{url('images/'.$employeeData->photo)}}" style="height:50px;width:50px">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-4">
                                  <button type="submit" class="btn btn-default pull-right">Submit</button>
                                </div>
                              </div>

                            </form>
                            </div>
                    </div>
                    <!-- /.box-body -->
                </div>
			</div>
		</div>
	</div>
@endsection
