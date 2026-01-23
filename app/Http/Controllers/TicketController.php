<?php

namespace App\Http\Controllers;

use App\Mail\TicketMail;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Pest\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    //
    public function index()
    {
        $tickets = null;

        if (Auth::user()->role === 'admin') {
            $tickets = Ticket::all();
        } else {
            $organizer = Auth::user()->organizer->id;
            $event = Event::where('organizer_id', $organizer)->pluck('id');
            $tickets = Ticket::whereIn('event_id', $event)->get();
        }

        return view('admin.ticket.ticket', compact('tickets'));
    }

    public function store(Request $request, $id)
    {
        $ticket = new Ticket;
        $request->validate(
            [
                'quantity' => 'required|integer|min:1',
                'image' => 'required|image|max:2048',
            ]
        );

        $event = Event::findOrFail($id);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('payment_recpiet', 'public');
        }

        $quantity = $request->quantity;
        $ticket->image = $imagePath;
        $price = $event->price;
        $ticket->quantity = $request->quantity;
        $ticket->event_id = $id;
        $ticket->price = $event->price;
        $ticket->total_amount = $price * $quantity;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        return redirect(route('event.detail', $id))->with('success', 'Ticket created successfully');
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('admin.ticket.edit_ticket', compact('ticket'));

    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $request->validate(
            [
                'quantity' => 'required|integer',
                'status' => 'required|in:hold,released',
            ]
        );

        $ticket->quantity = $request->quantity;
        $price = $ticket->price;
        $ticket->status = $request->status;
        $ticket->total_amount = $price * $request->quantity;
        $ticket->update();

        $ticketData = "Ticket ID: {$ticket->id}, Event: {$ticket->event->name}, Ticket Holder:{$ticket->user->name}, Quantiry: {$ticket->quantity}";

        if ($ticket->status == 'released') {
            // $ticketData = "Ticket ID: {$ticket->id}, Event: {$ticket->event->name}, Ticket Holder: {$ticket->user->name}, Quantity: {$ticket->quantity}";
            // $qrFileName = 'ticket_'.$ticket->id.'_'.Str::random(6).'.png';
            // $qrStoragePath = 'qr_image/' . $qrFileName;

            // $qrcode=$qrcode=QrCode::format('png')->generate($ticketData);

            // Storage::disk('public')->put($qrStoragePath, $qrcode);

            // $ticket->qr = $qrStoragePath;
            // $ticket->save();
            $ticketData = "Ticket ID: {$ticket->id}, Event: {$ticket->event->name}, Ticket Holder: {$ticket->user->name}, Quantity: {$ticket->quantity}";
            $qrFileName = 'ticket_'.$ticket->id.'_'.Str::random(6).'.png';
            $qrStoragePath = 'qr_image/'.$qrFileName;

            $qrcodeContent = QrCode::generate($ticketData);

            Storage::disk('public')->put($qrStoragePath, $qrcodeContent);

            $ticket->qr = $qrStoragePath;
            $ticket->save();

            Mail::to($ticket->user->email)->send(new TicketMail($ticket));
        }

        return redirect(route('ticket.index'))->with('update_message', 'Ticket updated successfully');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect(route('ticket.index'))->with('delete_message', 'Ticket deleted successfully');
    }

    public function show_form($id)
    {
        $event = Event::findOrFail($id);

        return view('frontend.ticket-form', compact('event'));
    }
}
