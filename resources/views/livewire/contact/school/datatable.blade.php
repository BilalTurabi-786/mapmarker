<div class="col-12" x-data="schoolReq">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Error!</strong> {{ session('error') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>website</th>
                    <th>Phone</th>
                    <th>country</th>
                    <th>city</th>
                    <th>address</th>
                    <th>description</th>
                    {{-- <th>longitude</th>
                    <th>latitude</th> --}}
                    {{-- <th>Status</th> --}}
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td scope="row">{{ $request->name }}</td>
                        <td>{{ Str::limit($request->webiste, 50) }}</td>
                        <td>{{ $request->phone }}</td>
                        <td>{{ $request->country }}</td>
                        <td>{{ $request->city }}</td>
                        <td>{{ Str::limit($request->address, 50) }}</td>
                        <td>{{ Str::limit($request->description, 50) }}</td>
                        <td>
                            <form action="{{ route('addFilter') }}" method="post">
                                @csrf
                                <input type="hidden" name="school_id" value="{{$request->id}}">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </form>
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
