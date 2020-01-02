@extends('frontend.master.master')

@section('main')
<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Giỏ hàng</h3>
                    </div>
                    <div class="process text-center active">
                        <p><span>02</span></p>
                        <h3>Thanh toán</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>03</span></p>
                        <h3>Hoàn tất thanh toán</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <form method="post" class="colorlib-form">
                    @csrf
                    <h2>Chi tiết thanh toán</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">Họ & Tên</label>
                                <input name="name" type="text" id="fname" class="form-control" placeholder="First Name">
                                {{errorsShow($errors,'name')}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname">Địa chỉ</label>
                                <input name="address" type="text" id="address" class="form-control"
                                    placeholder="Nhập địa chỉ của bạn">
                                    {{errorsShow($errors,'address')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="email">Địa chỉ email</label>
                                <input name="email" type="email" id="email" class="form-control"
                                    placeholder="Ex: youremail@domain.com">
                                    {{errorsShow($errors,'email')}}
                            </div>
                            <div class="col-md-6">
                                <label for="Phone">Số điện thoại</label>
                                <input name="phone" type="text" id="zippostalcode" class="form-control"
                                    placeholder="Ex: 0123456789">
                                    {{errorsShow($errors,'phone')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="cart-detail">
                    <h2>Tổng Giỏ hàng</h2>
                    <ul>
                        <li>

                            <ul>
                                <li><span>1 x Tên sản phẩm</span> <span>₫ 990.000</span></li>
                                <li><span>1 x Tên sản phẩm</span> <span>₫ 780.000</span></li>
                            </ul>
                        </li>

                        <li><span>Tổng tiền đơn hàng</span> <span>₫ 1.370.000</span></li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p><a href="order-complete.html" class="btn btn-primary">Thanh toán</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
