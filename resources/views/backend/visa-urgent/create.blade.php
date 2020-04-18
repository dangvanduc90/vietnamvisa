<div class="row animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Thông tin chi tiết</h5>
        </div>
        <div class="ibox-content">
            @include('backend.partials.alert-msg')
            <form id="form" class="form-horizontal" role="form" action="{{route('urgent.store')}}"
                  enctype="multipart/form-data" method="POST">
                @csrf
                @include('backend.visa-urgent.form')
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-white" type="reset">Làm mới</button>
                        <button class="btn btn-primary" type="submit">Tạo mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
