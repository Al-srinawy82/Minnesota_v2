@extends('dashboard.layouts.master')

@section('content')

 <!-- Column selectors table -->
 <section id="column-selectors">
          <div class="row">
           <!-- Form repeater section start -->
       
            </div>
      
        <!-- // Form repeater section end -->


            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض المواد الدراسية</h4>
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
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <p class="card-text text-center"></p>
                    <table class="table table-responsive table-bordered dataex-html5-selectors ">
                      <thead>
                          <th>رمز المقرر</th>
                          <th>اسم المقرر</th>
                          <th>المرحلة</th>
                          <th>وصف المقرر</th>
                          <th>العدد المسموح من الطلاب</th>
                          <th>الدرجة النهائية</th>
                          <th>نوع المادة</th>
                          <th>شرط المادة</th>
                          <th>عدد الساعات المادة</th>
                          <th>القسم</th>
                          <th>التخصص</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                      @foreach ($data as $material)
                      <tr>
                        <td>{{ $material->code }}</td>
                        <td>{{ $material->name }}</td>
                        <td>{{ $material['specialization']->section->stage->name }}</td>
                        <td> {{ $material->info }}</td>
                        <td> {{ $material->max_mark }} </td>
                        <td> {{ $material->max_students_number }} </td>
                        <td>
                          @if ($material->optional === 0) إختياري @endif
                          @if ($material->optional === 1) إلزامي @endif
                        </td>
                        <td> 
                          @if ($material->requirement === 0) غير متطلب @else متطلب @endif
                        </td>
                        <td>{{ $material->hours }}</td>
                        <td>{{ $material['specialization']->section->name }}</td>
                        <td>{{ $material['specialization']->name }}</td>
                        <td  class="d-inline-flex">
                          <div class="row">
                            <div class="col-md-6">

                              <form     action="{{ route('material.edit', $material->id) }}" method="get">
                                {{ csrf_field() }}
                               <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>  
                             </form>
                            </div>
                            <div class="col-md-6">
  
                              <form   action="{{ route('material.destroy', $material->id) }}" method="post">
                                @method('DELETE')
                                {{ csrf_field() }}  
                               <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف</button>
                             </form>
                            </div>
                          </div>
                      </td>
                      </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <th>رمز المقرر</th>
                        <th>اسم المقرر</th>
                        <th>المرحلة</th>
                        <th>وصف المقرر</th>
                        <th>العدد المسموح من الطلاب</th>
                        <th>الدرجة النهائية</th>
                        <th>نوع المادة</th>
                        <th>شرط المادة</th>
                        <th>عدد الساعات المادة</th>
                        <th>القسم</th>
                        <th>التخصص</th>
                        <th>الاعدادت</th>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ Column selectors table -->

@endsection