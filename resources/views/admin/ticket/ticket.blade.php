@extends('admin.layout')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Tickets</h2>
                    <p class="mt-1 text-sm text-slate-600">Review bookings, verify status, and manage uploads.</p>
                </div>
            </div>

            <div class="mt-6 space-y-3">
                @if(session('delete_message'))
                    <div class="alert alert-danger" role="alert">
                        <span class="font-semibold">{{ session('delete_message') }}</span>
                    </div>
                @elseif(session('update_message'))
                    <div class="alert alert-warning" role="alert">
                        <span class="font-semibold">{{ session('update_message') }}</span>
                    </div>
                @endif
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="table min-w-[900px]">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>User</th>
                            <th>Event</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Voucher</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td class="font-semibold text-slate-900">{{ $i }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td class="font-semibold text-slate-900">{{ $ticket->event->name }}</td>
                                <td>{{ $ticket->quantity }}</td>
                                <td>Rs. {{ $ticket->price }}</td>
                                <td class="font-semibold text-slate-900">Rs. {{ $ticket->total_amount }}</td>
                                <td>
                                    @php
                                        $status = strtolower((string) $ticket->status);
                                    @endphp
                                    @if(in_array($status, ['paid', 'approved', 'released'], true))
                                        <span class="badge badge-success">{{ $ticket->status }}</span>
                                    @elseif(in_array($status, ['pending', 'processing'], true))
                                        <span class="badge badge-warning">{{ $ticket->status }}</span>
                                    @elseif(in_array($status, ['hold'], true))
                                        <span class="badge badge-indigo">{{ $ticket->status }}</span>
                                    @elseif(in_array($status, ['cancelled', 'canceled', 'rejected', 'failed'], true))
                                        <span class="badge badge-danger">{{ $ticket->status }}</span>
                                    @else
                                        <span class="badge badge-neutral">{{ $ticket->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <img
                                        src="{{ asset('storage/'.$ticket->image) }}"
                                        alt="Voucher"
                                        class="h-12 w-20 rounded-lg object-cover ring-1 ring-slate-200"
                                        loading="lazy"
                                    >
                                </td>
                                <td class="text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-soft">Edit</a>

                                        <form action="{{ route('ticket.delete', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection