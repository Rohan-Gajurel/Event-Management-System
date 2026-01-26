<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Event Ticket</title>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">

<table width="100%" cellpadding="10" cellspacing="0" border="0">
    <tr>
        <td align="center">

            <table width="500" cellpadding="10" cellspacing="0" border="1">

                <!-- Header -->
                <tr>
                    <td colspan="2" align="center">
                        <strong style="font-size:16px;">
                            {{ $ticket->event->name }}
                        </strong><br>
                        {{ $ticket->event->venue->name }}<br>
                        {{ $ticket->event->venue->address }}
                    </td>
                </tr>

                <!-- Event Info -->
                <tr>
                    <td>
                        <strong>Date</strong><br>
                        {{ $ticket->event->date }}
                    </td>
                    <td>
                        <strong>Quantity</strong><br>
                        {{ $ticket->quantity }}
                    </td>
                </tr>

                <!-- Ticket Holder -->
                <tr>
                    <td colspan="2">
                        <strong>Ticket Holder</strong><br>
                        {{ $ticket->user->name }}
                    </td>
                </tr>

                <!-- QR Code -->
                <tr>
                    <td colspan="2" align="center">
                        <strong>QR Code</strong><br><br>
                        <img src="data:image/png;base64, {!! base64_encode($qr) !!}" alt="QR Code"> 
        
                    </td>
                </tr>

                <!-- Payment -->
                <tr>
                    <td>
                        <strong>Status</strong><br>
                        PAID
                    </td>
                    <td>
                        <strong>Total Amount</strong><br>
                        Rs. {{ $ticket->total_amount }}
                    </td>
                </tr>

            </table>

            <p style="font-size:10px; margin-top:10px;">
                Please show this ticket at the event entrance.
            </p>

        </td>
    </tr>
</table>

</body>
</html>
