@extends('layouts.user')
@section('usersidebar')
@include('layouts.usersidebar',[ 'data'=>'orr'])
@endsection
@section('content')
<div class="row">
            <main class="col-md-9 offset-md-3 content" id="content">
                <h4>Available Firms</h4>
                
                <div id="firmList">
                    @foreach ($data as $frmobj)
                    @php 
                    $frm=$frmobj->toArray();
                    $frm=array_map(fn($val)=>ucWords(strtolower($val)),$frm);
                    @endphp
                    
                    <div class="firm-card">
                        <div  class="row">
                            <div class="col-2 order-{{($loop->iteration%2==0)?2:1}}">
                                 {{-- <img src="/images/{{$frm['profilepic'] ?? 'not found.webp'}}" class="img-fluid rounded" style="max-width: 100%; height: auto;">  --}}

                                <img src="/images/{{$frm['profilepic']?$frm['profilepic']:'not found.webp'}}"
                                class="img-fluid rounded" style="max-width: 100%; height: auto;">
                        </div>
                        <div class="col-10 order-{{($loop->iteration%2==0)?1:2}}">
                            
                        <div> <b class="h4">{{ucWords($frm['firm_name'])}}</b><span class="h6 text-muted">(Since: {{date('Y',strtotime
                        ($frm['since'])) }})</span><a class="btn btn-warning" href="tel:+91{{$frm['firm_mobile']}}">Call Now</a></div>
                        <div class="text-primary mb-2">
                            {{$frm['street']}},
                            
                            {{$frm['landmark']}}
                        </div>
                        <p>
                            +91 {{$frm['firm_mobile']}}
                            {{$frm['address']}},
                            {{$frm['category']}},
                            {{$frm['city']}},
                            {{$frm['pincode']}},
                            {{$frm['state']}},
                            {{$frm['country']}}
                        </p>
                           
                        <p><b>About Us:</b>{{$frm['about_us']}}</p>


                        
                        <button class="book-btn">Book Appointment</button>
                  
                    <div>
                        {{-- The best athlete wants his opponent at his best. --}}
                        
                        <table class="w-full mt-4 border">
                            <thead>
                                <tr>
                                    <th class="border p-2">S.No</th>
                                    <th class="border p-2">Week</th>
                                    <th class="border p-2">Shift</th>
                                    <th class="border p-2">Start Form</th>
                                    <th class="border p-2">End From</th>
                                    <th class="border p-2">Max Booking</th>
                                    <th class="border p-2">Remaining</th>
                                    <th class="border p-2">Book</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($frmobj->todaySchedule as $info)
                                @php 
                                $istodayschedule=false;
                                @endphp
                                @if($info['todaydate']==date('Y-m-d'))
                                @php 
                                $istodayschedule=true;
                                @endphp
                                <tr>
                                    <td class="border p-2">{{$loop->iteration}}</td>
                                    <td class="border p-2">{{$info['week']}}</td>
                                    <td class="border p-2">{{$info['shift']}}</td>
                                    <td class="border p-2">{{$info->schedule['start_from']}}</td>
                                    <td class="border p-2">{{$info->schedule['end_from']}}</td>
                                    <td class="border p-2">{{$info->schedule['max_booking']}}</td>
                                    <td class="border p-2">
                                      
                                    </td>
                                    <td class="border p-2">
                                        <button class="book-btn">Book Appointment</button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @if(!count($frmobj->todaySchedule) || !$istodayschedule)
                                <tr>
                                    <th colspan="7" class="text-muted text-center p-4">Today's schedules not Available</th>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    </div>
                    
                    
                </div>
            </div>
                   @endforeach
                </div>
            </main>
        </div>
@endsection