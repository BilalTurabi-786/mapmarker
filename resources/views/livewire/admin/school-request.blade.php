<div class="col-12" x-data="schoolReq">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Available Date 1</th>
                    <th>Available Time 1</th>
                    <th>Available Date 2</th>
                    <th>Available Time 2</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td scope="row">{{ $request->contactUs->name }}</td>
                        <td>{{ $request->contactUs->email }}</td>
                        <td>{{ $request->contactUs->phone }}</td>
                        <td>{{ $request->contactUs->ava_date_one }}</td>
                        <td>{{ $request->contactUs->ava_date_two }}</td>
                        <td>{{ $request->contactUs->ava_time_one }}</td>
                        <td>{{ $request->contactUs->ava_time_two }}</td>
                        <td>
                            @if ($request->is_approved)
                                <span class="badge badge-success badge-pill">Approved</span>
                            @else
                                <span class="badge badge-warning badge-pill">Pending</span>
                            @endif
                        </td>
                        <td>
                            <span class="btn p-1 btn-success" wire:click="approve({{ $request->id }})" data-toggle="tooltip" data-placement="top" title="Approve">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>
                            <span class="btn p-1 btn-danger" wire:click="reject({{ $request->id }})" data-toggle="tooltip" data-placement="top" title="Reject">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('scripts')
<script>
    function schoolReq(){
        return {

        }
    }
</script>
@endpush
