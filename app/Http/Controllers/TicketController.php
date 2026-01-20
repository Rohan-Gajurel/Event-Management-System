<?php

namespace App\Http\Controllers;

use App\Mail\TicketMail;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    //
    public function index(){
        $tickets=Ticket::all();
        return view('admin.ticket.ticket', compact('tickets'));
    }

    public function store(Request $request, $id){
        $ticket=new Ticket();
        $request->validate(
            [
                "quantity"=>"required|integer",
            ]
        );
        
        $event=Event::findOrFail($id);

        $quantity=$request->quantity;
        $price=$event->price;
        $ticket->quantity=$request->quantity;
        $ticket->event_id=$id;
        $ticket->price=$event->price;
        $ticket->total_amount=$price*$quantity;
        $ticket->user_id=Auth::user()->id;
        $ticket->save();

        Mail::to($request->user())->send(new TicketMail($ticket));
        return redirect(route('event.detail',$id))->with('success','Ticket created successfully'); 
    }
    
}
