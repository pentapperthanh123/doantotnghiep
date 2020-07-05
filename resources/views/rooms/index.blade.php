@extends('master')

@section('title', 'Room manage')


@section('body')
    
@section('title-bar', trans('rooms/langRooms.title'))
    {{-- add button --}}
    <div class="top-list-user">
        <button id="add-new-user" class="btn btn-primary"><a href="{{url('rooms/create')}}">+</a></button>
         <div class="search-user">
            <form action="{{ url('rooms') }}" method="GET">
                <input type="hidden" name="action" value="search">
                <input type="text" name="key" id="input" class="form-control" value="" placeholder="Search Rooms ...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="container-fluid text-center">
       
        <div class="row">
            @php($i = 0)

            @foreach($roomsList as $rooms)
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                <div class="wrap-item">
                    <div class="row bottom-grid">   
                        <div class="img-middle room">
                            <div class="row">
{{--                                 <div class="col-xs-3">
                                        <p><b>ID:
                                        @php($i++)
                                        {{ RoomsHelper::increment($i , $roomsList->perPage(), $roomsList->currentPage()) }}</b>
                                    </p>
                                </div>
                                <div class="col-xs-6">
                                    
                                </div> --}}
                                <div class="col-xs-12">
                                    <p><b>{{ RoomsHelper::getStatus($rooms->status)}}</b></p>
                                </div>
                            </div>
                            {{-- image --}}
                            <img  data-toggle="modal" href='#modal-id' src="{{ asset('img/rooms.jpg') }}" style="width: 100%; cursor: pointer;" alt="placeholder+image" onclick="clickOnRoom({{ $rooms->id }})">
                            {{-- button --}}
                            <div class="text-center"><b>{{ $rooms->name }}</b></div>
                            <div class="row btn-computer">
                                {{-- edit button --}}
                                {{-- <div >
                                    <button class="button-edit-room pull-left"><a href="{{ url("rooms/$rooms->id/edit") }}"><i id="room-ion" class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                </div> --}}
                                <div class="button-option-edit-computer pull-left">
                                    <button><a href="{{ url("rooms/$rooms->id/edit") }}">{{ trans('rooms/langRooms.edit') }}</a></button>
                                </div>
                                {{-- delete button --}}
                                <div class="button-option-delete-computer pull-right">
                                    <form action="{{ url('rooms/'.$rooms->id) }}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        {{-- <button class="button-delete-room pull-right"  type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); "><i id="room-ion" class="fa fa-trash" aria-hidden="true"></i></button> --}}
                                        <button type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); ">{{ trans('rooms/langRooms.delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                         
                        <div class="col-lg-12 bgr room">
                            <p>
                                <b>{{ trans('rooms/langRooms.desc')}}:{{$rooms->desc}}</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="modal fade" id="modal-id">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Chi tiết phòng máy</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-left">
                            <img src="{{ asset('assets/img/sidebar-4.jpg') }}" alt="">
                        </div>
                        <div class="modal-right">
                            <ul class="show_one_com">
                                <li id="name_show"></li>
                                <li id="status_show"></li>
                                <li id="list_dev"><span>Các máy của phòng: </span>
                                    <ul class="device_com">
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-form-user" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination-computer">
            {{ $roomsList->links() }}
        </div>
    </div>
    <script>
        function clickOnRoom(id){
            requestApiRoom(id);
        }
        function requestApiRoom(idRoom){    
            $.get('api/rooms/' + idRoom, function(data) {
                var dataRoom = data.data;

                $('#name_show').empty();
                $('#status_show').empty();
                $('#com_in_room').empty();
                $('li#list_dev>ul.device_com').empty();
                // console.log(dataRoom);

                if (dataRoom.status == 0) { 
                    var status = 'Đang mở';
                } 
                else if(dataRoom.status == 1){ 
                    var status = 'Đóng cửa'; 
                }
                else {
                    var status = 'Đang sửa chữa';
                }   
                $('#name_show').append('<span>Tên :  </span>' + dataRoom.name);
                $('#status_show').append('<span>Trạng thái :  </span>' + status);
                for (var i = 0; i < dataRoom.computers.length; i++) {
                    $('li#list_dev>ul.device_com').append('<li>' + dataRoom.computers[i].name + '</li>');
                }
            });
        }
    </script>
@endsection



        