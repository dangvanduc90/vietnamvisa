@extends('backend.layouts.main')

@section('title')
    Tạo mới person
@endsection

{{-- Page content --}}
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thông tin chi tiết</h5>
                </div>
                <div class="ibox-content">
                    @include('backend.partials.alert-msg')
                    <form id="form" class="form-horizontal" role="form" action="{{route('person.store')}}"
                          enctype="multipart/form-data" method="POST">
                        @csrf
                        @include('backend.visa-person.form')
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" >Làm mới</button>
                                <button class="btn btn-primary" type="submit">Tạo mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
