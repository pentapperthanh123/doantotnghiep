<div class="top-list-user">
        <div class="btn-group">
            <button id="add-new-user" type="button" class="btn btn-primary"><a href="{{url('computers/create')}}">+</a></button>    
              <button class="btn btn-secondary dropdown-toggle" style="width: 100px; text-align: center; display: table-cell; height: 60px; padding-top: 10px" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chọn phòng
              <span class="caret"></span></button>
              <ul class="dropdown-menu dropdown-menu-right">
                <?php $rooms = DB::table('rooms')->get(); ?>
                @foreach($rooms as $room)
                <li><a href="{{url('computers/rooms/'.$room->id)}}">{{ucwords($room->name)}}</a></li>
                 @endforeach
              </ul>
        </div>  
        <div class="search-user">

            <!-- <form action="{{ url('computers') }}" method="GET" class="filter-user">
                <select id="select-box1" name="col" class="select-computer">
                  @foreach ($computerList as $computer)
                  <option value="{{$computer->id}}"></option>
                  @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-filter"><i class="fa fa-filter"></i></button>
            </form> -->
                
                <!-- <div id="1" name="rooms" class="btn btn-primary dropdown-toggle" onchange="javascript:handleSelect(this)">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">DropDown</button>
                    <ul class="dropdown-menu"></ul>
                    <?php $rooms = DB::table('rooms')->get(); ?>
                
                     @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{$room->name}}
                        
                        </option>
                    
                    @endforeach
                    @foreach($rooms as $room)
                        <li value="{{url('computers/rooms'.$room->id)}}">{{ucwords($room->name)}}</option>
                    @endforeach
                </div>  -->
                    
            <form action="{{ url('computers') }}" method="GET" class="form-search-user">
                <input type="hidden" name="action" value="search">
                <input type="text" name="key" id="input" class="form-control" value="" placeholder="Search Computer ...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        
    </div>