<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Welcome to Frescura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      /* Fallback styling if needed */
      body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body style="margin:0;padding:0;background-color:#f7f7f7;">
    <table
      role="presentation"
      cellspacing="0"
      cellpadding="0"
      width="100%"
      style="background-color:#f7f7f7;padding:20px 0;"
    >
      <tr>
        <td align="center">
          <table
            role="presentation"
            width="100%"
            cellpadding="0"
            cellspacing="0"
            style="max-width:600px;background-color:#ffffff;border-radius:8px;padding:30px;"
          >
            <tr>
              <td align="center" style="padding-bottom: 20px;">
                <img
                  src="{{ $message->embed($logoPath) }}"
                  alt="Frescura Logo"
                  width="100"
                  style="display:block;margin-bottom:10px;"
                />
                <h1 style="font-size:24px;color:#2e7d32;margin:0;">Welcome to Frescura!</h1>
              </td>
            </tr>
            <tr>
              <td style="font-size:16px;color:#333333;line-height:1.6;padding:0 20px;">
                <p>Hi there 👋,</p>
                <p>
                  Congratulations on joining our early access list! You’re now part of a movement that values real, wholesome food without the junk.
                </p>
                <p>
                  As a thank you, you're now eligible for a chance to receive <strong>free samples</strong> of our clean, delicious offerings — before anyone else.
                </p>
                <p>
                  Stay tuned for updates, exclusive content, and healthy surprises coming your way!
                </p>
                <p style="margin-top:30px;">
                  🥦 With care,<br />
                  The Frescura Team
                </p>
              </td>
            </tr>
            <tr>
              <td align="center" style="padding:30px 20px;">
                <a
                  href="https://frescura.vercel.app"
                  style="
                    background-color:#43a047;
                    color:#ffffff;
                    padding:12px 24px;
                    border-radius:6px;
                    text-decoration:none;
                    font-weight:bold;
                    display:inline-block;
                    margin-top:10px;"
                  >Visit Our Site</a>
              </td>
            </tr>
            <tr>
              <td align="center" style="font-size:12px;color:#888888;padding-top:20px;">
                © 2025 Frescura, All rights reserved.<br />
                You’re receiving this email because you signed up for early access.
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
