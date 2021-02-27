<table id="courseEval" class="dattable table table-striped thead-dark "  style="width:100%">
                        <thead>
                            <tr>
                                <th >#</th>
                                <!-- <th ></th> -->
                                <th >name</th>
                                <th >Primary Mobile</th>

                                <th >Last Activity Date </th>
                                <th >Service </th>
                                <th style="display: inline-block;width:200px !important;" >Last Activity Notes </th>
                                <th >ToDo Date </th>
                                <th >Discount-Date </th>
                                <th >Next  Followup </th>
                                <th >Last Funnel </th>

                                <!-- <th >Created By</th> -->
                                <!-- <th >Todo Status</th> -->
                                <!-- <th >Created By</th> -->

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                           
                            <tr>
                                <td>{{$index+1}}</td>
                                {{--<th scope="row"><img src="@if($row->image){{ asset('uploads/')}}/{{ $row->image }} @else {{ asset('assets/img/default-user.gif')}} @endif" alt=""></th>--}}
                                <td>{{$row->name}}</td>
                                <td>{{$row->primary_mobile}}</td>
                                <td> <?php
                                        $date = now();
                                        if ($row->activity->last()) {
                                            $date = date_create($row->activity->last()->activity_date);
                                        }
                                        ?>
                                    {{ date_format($date,"d-m-Y") }} </td>
                                    <td >
                                    @if($row->activity->last())
                                    {{ $row->activity->last()->service->first()->text ?? '' }}
                                    @endif </td>
                                    <td style="width: 100%;display:inline-block">
                                    {!! $row->activity->last()->notes ?? '' !!} </td>
                              <!-- new -->
                                    <td> <?php
                                        $date1 = now();
                                        if ($row->activity->last()) {
                                            $date1 = date_create($row->activity->last()->max_todo_date);
                                        }
                                        ?>
                                    {{ date_format($date1,"d-m-Y") }} </td>
                                    <td> <?php
                                        $date2 = now();
                                        if ($row->activity->last()) {
                                            $date2 = date_create($row->activity->last()->discount_offer_date);
                                        }
                                        ?>
                                    {{ date_format($date2,"d-m-Y") }} </td>
                                    <td> <?php
                                        $date3 = now();
                                        if ($row->activity->last()) {
                                            $date3 = date_create($row->activity->last()->followup_date);
                                        }
                                        ?>
                                    {{ date_format($date3,"d-m-Y") }} </td>
                                    <td> @if($row->activity->last())
                                    {{$row->activity->last()->funnel->name ?? ''}}
                                    @endif
                                </td>

                                    <!-- End -->

                               

                                <td>
                                <a href="{{ route('todoList.show',$row->id) }}" style="padding: 5px;background:light"><i class="fa fa-file" aria-hidden="true"></i> </a>

                                   {{-- <a href="{{ route('lead.edit',$row->id) }}"  style="padding: 5px;background:light"><i class="fas fa-pencil-alt " ></i></a>

                                <a href="#" onclick="destroy('this Lead', '{{$row->id}}')" style="padding: 5px;background:light"><i class="far fa-trash-alt"></i> </a>

                                <form id="delete_{{$row->id}}" action="{{ route('lead.destroy', $row->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" value=""></button>
                                </form> --}}
                                </td>
                            </tr>
                          
                            @endforeach
                        </tbody>
                    </table>