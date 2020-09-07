<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <!-- <th scope="col"></th> -->
                                <th scope="col">name</th>
                                <th scope="col">Primary Mobile</th>

                                <th scope="col">Last Activity Date </th>
                                <th scope="col">Service </th>
                                <th scope="col">Last Activity Notes </th>
                                <th scope="col">Created By</th>
                                <!-- <th scope="col">Todo Status</th> -->
                                <!-- <th scope="col">Created By</th> -->

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
                                    <td style="width: 30%;">
                                    {{ $row->activity->last()->service->first()->text ?? '' }} </td>
                                    <td style="width: 30%;">
                                    {!! $row->activity->last()->notes ?? '' !!} </td>
                              
                                <td> @if($row->createdBy)
                                    {{$row->activity->last()->createdBy->name ?? ''}}
                                    @endif
                                </td>

                                <td>
                                <a href="{{ route('lead.show',$row->id) }}" style="padding: 5px;background:light"><i class="fa fa-file" aria-hidden="true"></i> </a>

                                    <a href="{{ route('lead.edit',$row->id) }}"  style="padding: 5px;background:light"><i class="fas fa-pencil-alt " ></i></a>

                                <a href="#" onclick="destroy('this Lead', '{{$row->id}}')" style="padding: 5px;background:light"><i class="far fa-trash-alt"></i> </a>

                                <form id="delete_{{$row->id}}" action="{{ route('lead.destroy', $row->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" value=""></button>
                                </form>
                                </td>
                            </tr>
                          
                            @endforeach
                        </tbody>
                    </table>