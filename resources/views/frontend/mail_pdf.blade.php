{{-- <!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Event Ticket</title>
</head>

<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" style="padding:20px;">

      <!-- Card -->
      <table width="600" cellpadding="0" cellspacing="0"
             style="background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.1);">

        <!-- Header -->
        <tr>
          <td style="padding:20px;
                     background:#2563eb;
                     background:linear-gradient(90deg,#2563eb,#4f46e5);
                     color:#ffffff;">
            <h1 style="margin:0;font-size:22px;">🎫 {{ $ticket->event->name }}</h1>
            <p style="margin:5px 0 0;font-size:14px;">
              {{ $ticket->event->venue->name }}
            </p>
            <p style="margin:0;font-size:13px;">
              {{ $ticket->event->venue->address }}
            </p>
          </td>
        </tr>

        <!-- Body -->
        <tr>
          <td style="padding:20px;">

            <!-- Date / Quantity -->
            <table width="100%">
              <tr>
                <td style="font-size:13px;color:#6b7280;">Date</td>
                <td style="font-size:13px;color:#6b7280;" align="right">Quantity</td>
              </tr>
              <tr>
                <td style="font-size:14px;font-weight:bold;color:#111827;">
                  {{ $ticket->event->date }}
                </td>
                <td align="right" style="font-size:14px;font-weight:bold;color:#111827;">
                  {{ $ticket->quantity }}
                </td>
              </tr>
            </table>

            <!-- Divider -->
            <hr style="border:none;border-top:1px dashed #e5e7eb;margin:20px 0;">

            <!-- Ticket Holder -->
            <p style="margin:0;font-size:13px;color:#6b7280;">Ticket Holder</p>
            <p style="margin:5px 0 15px;font-size:14px;font-weight:bold;color:#111827;">
              {{ $ticket->user->name }}
            </p>

            <!-- QR -->
            <p style="font-size:13px;color:#6b7280;">Scan this for validity</p>
            <img
              src="{{ asset(public_path('storage/'.$ticket->qr)) }}"
              alt="Ticket QR Code"
              width="200"
              style="display:block;margin-top:10px;"
            >

          </td>
        </tr>

        <!-- Footer -->
        <tr>
          <td style="padding:15px;background:#f9fafb;">
            <table width="100%">
              <tr>
                <td style="color:#16a34a;font-weight:bold;font-size:14px;">
                  PAID
                </td>
                <td align="right" style="font-size:18px;font-weight:bold;color:#111827;">
                  Rs. {{ $ticket->total_amount }}
                </td>
              </tr>
            </table>
          </td>
        </tr>

      </table>

      <!-- Footer Note -->
      <p style="font-size:12px;color:#9ca3af;margin-top:15px;text-align:center;">
        Please show this email at the event entrance.
      </p>

    </td>
  </tr>
</table>

</body>
</html> --}}
