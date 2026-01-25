

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Event Ticket</title>
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center" style="padding:20px;">

<!-- Ticket Card -->
<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.1);">

  <!-- Header -->
  <tr>
    <td style="background:linear-gradient(90deg,#2563eb,#4f46e5);color:#ffffff;padding:20px;">
      <h1 style="margin:0;font-size:22px;">🎫 {{ $ticket->event->name }}</h1>
      <p style="margin:5px 0 0;font-size:14px;">{{ $ticket->event->venue->name }}</p>
      <p style="margin:5px 0 0;font-size:14px;">{{ $ticket->event->venue->address }}</p>
    </td>
  </tr>

  <!-- Body -->
  <tr>
    <td style="padding:20px;">
      <table width="100%">
        <tr>
          <td style="font-size:13px;color:#6b7280;">Date</td>
          <td style="font-size:13px;color:#6b7280;">Quantity</td>
        </tr>
        <tr>
          <td style="font-weight:bold;">{{ $ticket->event->date }}</td>
          <td style="font-weight:bold;">{{ $ticket->quantity }}</td>
        </tr>
      </table>

      <hr style="border:none;border-top:1px dashed #e5e7eb;margin:20px 0;">

      <table width="100%">
        <tr>
          <td>
            <p style="margin:0;font-size:13px;color:#6b7280;">Ticket Holder</p>
            <p style="margin:5px 0;font-weight:bold;">{{ $ticket->user->name }}</p>
          </td>
          <td align="right">
          </td>
        </tr>
      </table>

  <!-- Footer -->
  <tr>
    <td style="background:#f9fafb;padding:15px;">
      <table width="100%">
        <tr>
          <td style="color:#16a34a;font-weight:bold;">PAID</td>
          <td align="right" style="font-size:18px;font-weight:bold;">Rs. {{ $ticket->total_amount }}</td>
        </tr>
      </table>
    </td>
  </tr>

</table>

<p style="font-size:12px;color:#9ca3af;margin-top:15px;">
  Please show this email at the event entrance.
</p>

</td>
</tr>
</table>

</body>
</html>
