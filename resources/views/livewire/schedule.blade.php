<div class="container mx-auto p-4">
    <button wire:click="create" class="bg-blue-500 text-white px-4 py-2">Create Schedule</button>

    @if(session()->has('message'))
        <div class="mt-2 p-2 bg-green-500 text-white">
            {{ session('message') }}
        </div>
    @endif
    @if(!$isModalOpen)
    <table class="w-full mt-4 border">
        <thead>
            <tr>
                <th class="border p-2">S.No</th>
                <th class="border p-2">Week</th>
                <th class="border p-2">Shift</th>
                <th class="border p-2">Start Form</th>
                <th class="border p-2">End From</th>
                <th class="border p-2">Max Booking</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allschedule as $info)
            <tr>
                <th class="border p-2">{{$loop->iteration}}</th>
                <th class="border p-2">{{$info['week']}}</th>
                <th class="border p-2">{{$info['shift']}}</th>
                <th class="border p-2">{{$info['start_from']}}</th>
                <th class="border p-2">{{$info['end_from']}}</th>
                <th class="border p-2">{{$info['max_booking']}}</th>
                <th class="border p-2">
                    <button wire:click='delete({{$info['id']}})' class="btn btn-danger">delete</button>
                </th>
            </tr>
            
            @endforeach
            @if(!count($allschedule))
            <tr>
                <th colspan="7" class="text-muted text-center p-4">No Data Available</th>
            </tr>
            @endif
        </tbody>
    </table>
    @endif
    @if($isModalOpen)

    @include('firm.schedule')

     @endif
</div>
