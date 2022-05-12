@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 m-auto">
          <div class="contact-form">
            <h3>جهات الاتصال</h1>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">العائلة</th>
                    <th scope="col">البريد الإلكتروني</th>
                    <th scope="col">&nbsp</th>
                    <th scope="col">&nbsp</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $index => $contact )
                    <tr>
                    <th scope="row">{{++$index}}</th>
                    <td>{{$contact->first}}</td>
                    <td>{{$contact->last}}</td>
                    <td>{{$contact->email}}</td>
                    <td><a href="{{url('destroy/'.$contact->id)}}"class="btn btn-danger">حذف</a></td>
                    <td><ba href="{{url('edit')}}" class="btn btn-primary">تعديل</a></td>
                  </tr>
                    @endforeach

                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
</div>

  @endsection
