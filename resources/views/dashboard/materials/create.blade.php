@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة مادة جديدة</h4>
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
                                        
                    </div>
                    <form action="{{ route('material.store') }}" method="POST"  class="form form-horizontal form-bordered">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات المادة</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">الإسم </label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" placeholder="الإسم "
                            name="name">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">نبذة عن المادة</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="نبذة عن المادة" 
                            name="info">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">إجمالي الدرجات</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="إجمالي الدرجات" 
                            name="max_mark">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">عدد الطلاب المسموح بهم</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="عدد الطلاب" 
                            name="max_students_number">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">القسم</label>
                          <div class="col-md-9">
                              <select  class="form-control" name="section_id" id="section">
                                <option value="" selected="" disabled="" > اختر القسم</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">التخصص</label>
                          <div class="col-md-9">
                              <select  class="form-control" name="specialization_id" id="specialization">
                                
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="projectinput4">اختر نوع المادة</label>
                        <div class="col-md-9">
                            <select  class="form-control" name="optional" id="">
                              <option selected="" disabled="" >اختر</option>
                              <option value="0">إختياري</option>
                              <option value="1">إلزامي</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="projectinput4">شروط المادة</label>
                        <div class="col-md-9">
                            <select  class="form-control" name="requirement" id="requirement_id">
                              <option selected="" disabled="" >اختر شرط المادة</option>
                              <option value="0">غير متطلب</option>
                              <option value="1">متطلب</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row last" style="display: none;" id="requirement_material">
                        <label class="col-md-3 label-control" for="projectinput4">شروط المادة</label>
                        <div class="col-md-9">
                            <select  class="form-control" name="requirement" id="" required>
                              <option >اختر شرط المادة</option>
                              @foreach ($materials as $material)
                                  <option value="{{ $material->id }}">{{ $material->name }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                      <div class="form-actions text-center">
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
          </section>
<script>
  $("#requirement_id").change(function(){

    requirement = $(this).val();
    if(requirement == 1){
      document.getElementById("requirement_material").style.display = "";
    }else{
      document.getElementById("requirement_material").style.display = "none";
    }
    
  });
</script>

@endsection

@section('js')
<script src="{{asset('dashboard/js/material.js')}}" type="text/javascript"></script>
@endsection