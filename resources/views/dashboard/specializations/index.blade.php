@extends('dashboard.layouts.master')

@section('content')

 <!-- Column selectors table -->
 <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض معلومات التخصص</h4>
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
                    <table class="table table-striped table-bordered dataex-html5-selectors">
                      <thead>
                          <th>الاسم</th>
                          <th>نبذة عن التخصص</th>
                          <th>العدد المسموح للطلاب</th>
                          <th>السنة الدراسية</th>
                          <th>القسم</th>
                          <th>حالة القسم</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                      @foreach ($datas as $data)
                      <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->info }}</td>
                        <td>{{ $data->maxStudentNumber }}</td>
                        <td>{{ $data->yearOfAdd }}</td>
                        <td>{{ $data['section']->name }}</td>
                        <td>
                          @if ($data->status === 1)
                            <form action="{{ route('specialization.unactive', $data->id) }}" method="post">
                              {{ csrf_field() }}
                                <input style="border-radius: 25px;" class="btn btn-dark" type="submit" value="الغاء التفعيل">
                              </form> 
                            @else
                               <form action="{{ route('specialization.active', $data->id) }}" method="post">
                                 {{ csrf_field() }}
                                <input style="border-radius: 25px;" class="btn btn-primary" type="submit" value="تفعيل التخصص">   
                              </form> 
                            @endif
                        </td>
                        <td>
                          <form style="display: ruby-base; margin-left: 5px;" action="{{ route('specialization.edit', $data->id) }}" method="get">
                            {{ csrf_field() }}
                           <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>  
                         </form>
                         <form style="display: ruby-base; margin-left: 5px;" action="{{ route('specialization.destroy', $data->id) }}" method="post">
                          @method('DELETE')
                          {{ csrf_field() }}  
                         <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف</button>
                       </form>
                      </td>
                      </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <th>الاسم</th>
                        <th>نبذة عن التخصص</th>
                        <th>العدد المسموح للطلاب</th>
                        <th>السنة الدراسية</th>
                        <th>القسم</th>
                        <th>حالة القسم</th>
                        <th>الاعدادت</th>>
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