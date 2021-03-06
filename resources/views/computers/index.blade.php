@extends('master')

@section('title', 'Computers')
@section('title-bar', trans('computer/index.title'))

@section('body')
    <div class="top-list-user">
        <button id="add-new-user" type="button" class="btn btn-primary"><a href="{{ url('users/create') }}">+</a></button>
        {{-- <div class="filter-user"> --}}
        <div class="search-user">
            <div class="btn-group"> 
              <button class="btn btn-secondary dropdown-toggle" style="height: 50px;width: 150px; text-align: center; display: table-cell; height: 60px; padding-top: 10px" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chọn phòng
              <span class="caret"></span></button>
              <ul class="dropdown-menu dropdown-menu-right">
                <?php $rooms = DB::table('rooms')->get(); ?>
                @foreach($rooms as $room)
                <li><a href="{{url('computers/rooms/'.$room->id)}}">{{ucwords($room->name)}}</a></li>
                 @endforeach
              </ul>
        </div>  

            <form action="{{ url('computers') }}" method="GET" class="form-search-user">
                <input type="hidden" name="action" value="search">
                <input type="text" name="key" id="input" class="form-control" value="" placeholder="Search Computer ...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="container-fluid text-center">
        <div class="row">
            @php($i = 0)
            @foreach($computerList as $computer)
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                <div class="wrap-item">
                    {{-- <div class="row top-grid">
                        <div class="col-lg-2">
                            <p>
                                @php($i++)
                                {{ ComputerHelper::increment($i, $computerList->perPage(), $computerList->currentPage())}}
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <p>{{ $computer->name }}</p>
                        </div>
                        <div class="col-lg-4">
                            <p>{{ ComputerHelper::getStatus( $computer->status )}}</p>
                        </div>
                    </div>
                    --}}
                    <div class="row bottom-grid">   
                        <div class="img-middle-computer">
                            <div class="row">
                                {{-- <div class="col-md-3 col-lg-3">
                                    <p>ID:
                                        @php($i++)
                                        {{ ComputerHelper::increment($i, $computerList->perPage(), $computerList->currentPage())}}
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <p>{{ trans('computer/index.roomsID')}}:{{ $computer->rooms_id }}</p>
                                </div> --}}
                                <div class="col-md-12 col-lg-12">
                                    <p>{{ ComputerHelper::getStatus( $computer->status )}}</p>
                                </div>
                            </div>
                            {{-- image --}}
                            @if($computer->status==0)
                            <img id="click-show-device" data-toggle="modal" href='#modal-id' src="{{ asset('assets/img/desktop.jpg') }}" style="width: 100%; cursor: pointer;" alt="placeholder+image"  onclick="clickOnComputer({{ $computer->id }})">
                            @else
                            <img id="click-show-device" data-toggle="modal" href='#modal-id' src="{{ asset('assets/img/desktop404.jpg') }}" style="width: 100%; cursor: pointer;" alt="placeholder+image"  onclick="clickOnComputer({{ $computer->id }})">
                            @endif
                            {{-- button --}}
                            <div class="text-center"><b>{{ $computer->name }}</b></div>
                            <div class="row btn-computer">
                                {{-- edit button --}}
                                <div class="button-option-edit-computer pull-left"><button><a href="{{ url("computers/$computer->id/edit") }}">{{ trans('computer/index.edit')}}</a></button></div>
                                <div class="button-option-delete-computer pull-right">
                                    <form action="{{ url("computers/$computer->id") }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" data-toggle="tooltip" title="Delete" data-placement="top" onclick="return confirm('bạn có thực sự muốn xóa ?'); ">{{ trans('computer/index.delete')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- modal show device --}}
                    <div class="modal fade" id="modal-id">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Cấu hình máy tính</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-left">
                                        <img src="{{ asset('assets/img/sidebar-4.jpg') }}" alt="">
                                    </div>
                                    <div class="modal-right">
                                        <ul class="show_one_com">
                                            <li id="name_show"></li>
                                            <li id="status_show"></li>
                                            <li id="com_in_room"></li>
                                            <li id="list_dev"><span>Thiết bị : </span>

                                                <ul class="device_com">
                                                    @foreach($computerList as $r)
                                                    <li></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-form-user" data-dismiss="modal" >Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-computer">
            {{ $computerList->links() }}
        </div>

    </div>
    <script type="text/javascript">
        function clickOnComputer(id){
            requestApi(id);
        }
        function requestApi(idComputer){
            $.get('api/computers/' + idComputer , function(data){   
                var computer = data.data;

                $('#name_show').empty();
                $('#status_show').empty();
                $('#com_in_room').empty();
                $('li#list_dev>ul.device_com').empty();

                // console.log(computer);
                if (computer.status == 0) { 
                    var status = 'Đang hoạt động';
                } else { 
                    var status = 'Ngừng hoạt động'; 
                }
                $('#name_show').append('<span>Tên :  </span>' + computer.name);
                $('#status_show').append('<span>Trạng thái :  </span>' + status);
                $('#com_in_room').append('<span>Máy tính thuộc </span>' + computer.room.name);
                for (var i = 0; i < computer.devices.length; i++) {
                    if(computer.devices[i].status == 2){
                        $('li#list_dev>ul.device_com').append('<li style="color: red;">'+ computer.devices[i].name + '</li>');
                    }else{
                        $('li#list_dev>ul.device_com').append('<li style="color: black;">'+ computer.devices[i].name + '</li>');
                    }
                    
                    
                }
            });
        }
        
        
    </script>
    <!-- <script>
        $("select-computer").on("click" , function() {
          
          $(this).parent(".select-box").toggleClass("open");
          
        });
    
        $(document).mouseup(function (e)
        {
            var container = $(".select-box");
    
            if (container.has(e.target).length === 0)
            {
                container.removeClass("open");
            }
        });
    
    
        $("select-computer").on("change" , function() {
          
          var selection = $(this).find("option:selected").text(),
              labelFor = $(this).attr("id"),
              label = $("[for='" + labelFor + "']");
            
          label.find(".label-desc").html(selection);
            
        });
    </script> -->
@endsection