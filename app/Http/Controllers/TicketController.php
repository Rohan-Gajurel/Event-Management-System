<?php

namespace App\Http\Controllers;

use App\Mail\TicketMail;
use App\Models\Event;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
// use BaconQrCode\Renderer\Image\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\GdImageBackEnd;
use App\Http\Controllers\Writer;
use GdImage;
// use BaconQrCode\Renderer\Image\ImageBackEndInterface;
use Pest\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Imagick;

class TicketController extends Controller
{
    //
    public function index()
    {
        $tickets = null;

        if (Auth::user()->role === 'admin') {
            $tickets = Ticket::all();
        } else {
            $organizer = Auth::user()->profile->id;
            $event = Event::where('profile_id', $organizer)->pluck('id');
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

        if ($ticket->status == 'released') 
        {
        $ticketData = "Ticket ID: {$ticket->id}, Event: {$ticket->event->name}, Ticket Holder: {$ticket->user->name}, Quantity: {$ticket->quantity}";

        $qr = (
            QrCode::generate($ticketData)
            );
        
        $ticket->save();
        $pdf=Pdf::loadView('frontend.mail_pdf',[
            'ticket' => $ticket,    
            'qr'=>$qr    
        ]);

        Mail::to($ticket->user->email)->send(new TicketMail($ticket, $pdf->output()));        
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
