{{-- resources/views/admin/content/setting/config.blade.php --}}

@extends('admin.layouts.app')

@section('title', 'Profile')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Setting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cấu hình thông số hệ thống</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Cấu hình thông số hệ thống</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('admin.setting.config.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="company_name">Tên công
                                ty:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                       placeholder="Nhập tên công ty" value="{{ $config['company_name'] }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="address">Địa chỉ:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="Nhập địa chỉ" value="{{ $config['address'] }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="tax_code">Mã số thuế:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tax_code" name="tax_code"
                                       placeholder="Nhập mã số thuế" value="{{ $config['tax_code'] }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="tax_date">Ngày cấp:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tax_date" name="tax_date"
                                       value="{{ $config['tax_date'] }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="work_time">Thời gian làm
                                việc:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="work_time" name="work_time"
                                       placeholder="Nhập thời gian làm việc" value="{{ $config['work_time'] }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="hotline_sale">Hotline bán
                                hàng:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="hotline_sale" name="hotline_sale"
                                       placeholder="Nhập hotline bán hàng" value="{{ $config['hotline_sale'] }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="hotline_support">Hotline hỗ
                                trợ:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="hotline_support" name="hotline_support"
                                       placeholder="Nhập hotline hỗ trợ" value="{{ $config['hotline_support'] }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center" for="hotline_warranty">Hotline bảo
                                hành:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="hotline_warranty" name="hotline_warranty"
                                       placeholder="Nhập hotline bảo hành" value="{{ $config['hotline_warranty'] }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
