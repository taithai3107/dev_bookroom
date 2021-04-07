@extends('home')
@section('room')

<div class="rooms-page-item">
<h2 class="title text-center" style="padding-bottom:100px;">Danh sách phòng</h2>
                @foreach($showPageRoom as $key => $showRooms)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">
                            <div class="single-room-pic">
                                <img src="{{URL::to('public/upload/rooms/'.$showRooms->room_image)}}">
                            </div>
                            <div class="single-room-pic">
                                <img src="{{URL::to('public/upload/rooms/'.$showRooms->room_image)}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{URL::to('/save-cart')}}" method="post">
                            @csrf
                            <input type="hidden" name="room_hidden" value="{{$showRooms->room_id}}"/>
                            <div class="room-text">
                                <div class="room-title">
                                    <h2>{{$showRooms->room_name}}</h2>
                                    <div class="room-price">
                                        <span>From</span>
                                        <h2>{{number_format($showRooms->room_price).' đ'}}</h2>
                                        <sub>/night</sub>
                                    </div>
                                </div>
                                <div class="room-desc">
                                    <p> {{$showRooms->room_description}}</p>
                                </div>
                                <div class="room-features">
                                    <div class="room-info">
                                        <i class="flaticon-019-television"></i>
                                        <span>Smart TV</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-029-wifi"></i>
                                        <span>High Wi-fii</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-003-air-conditioner"></i>
                                        <span>AC</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-036-parking"></i>
                                        <span>Parking</span>
                                    </div>
                                    <div class="room-info last">
                                        <i class="flaticon-007-swimming-pool"></i>
                                        <span>Pool</span>
                                    </div>
                                </div>
                                <button class="primary-btn" type='submit'>
                                    <i class="lnr lnr-arrow-right"></i>
                                    Đặt phòng
                                </button>
                                <label>
                                <input type="number" name="days" min="1" value="1"/>
                                </label>
                            </div>
                        </form>
                        

                    </div>
                </div>
                @endforeach
            </div>
@endsection