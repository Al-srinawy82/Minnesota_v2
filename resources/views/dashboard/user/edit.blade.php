@extends('dashboard.layouts.master')

@section('content')
<!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">تعديل بيانات المستخدم</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                    <div class="card-text">
                      <a  href="{{route('user.index')}}" class="btn btn-primary"><i class="ft-corner-down-right">عرض قائمة المستخدمين</i></a> 
                                        
                    </div>
                    <form class="form form-horizontal form-bordered" action="{{ route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                      @method('PATCH')  
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات المستخدم</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">الإسم الاول</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $data->first_name }}" id="projectinput1" class="form-control" placeholder="الإسم الاول"
                            name="first_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثاني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $data->second_name }}" id="projectinput2" class="form-control" placeholder="الإسم الثاني"
                            name="second_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اسم العائلة</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $data->last_name }}" id="projectinput2" class="form-control" placeholder="اسم العائلة"
                            name="last_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">البريد الالكتروني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $data->email }}" id="projectinput3" class="form-control" placeholder="البريد الالكتروني" name="email">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">رقم الهاتف</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $data->phone_number }}" id="projectinput4" class="form-control" placeholder="رقم الهاتف" 
                            name="phone_number">
                          </div>
                        </div>

                        <div class="form-group row last">
                        <label class="col-md-3 label-control" for="projectinput4">الصورة الشخصية</label>
                            <div class="col-md-9">
                                <input type="file" id="projectinput4" class="form-control" name="avatar">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">الفرع</label>
                          <div class="col-md-9">
                            <input type="hidden" value="{{ $data->branch_id }}" name="branch_id">
                            <select id="projectinput6" name="branch_id" class="form-control">
                              @foreach ($branches as $branche)
                              <option value="{{$branche->id}}" @if ( $branche->id ===  $data->branch_id )  selected="" disabled="" @endif>{{ $branche->name }}</option> 
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">الصلاحية</label>
                          <div class="col-md-9">
                            <input type="hidden" value="{{ $data->role_id }}" name="role_id">
                            <select id="projectinput6" name="role_id" class="form-control">
                              @foreach ($roles as $role)
                              <option value="{{$role->id}}"@if ( $role->id ===  $data->role_id )  selected="" disabled="" @endif> {{ $role->name }} </option> 
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class=" text-center">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> حفظ
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection