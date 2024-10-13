@component('mail::message')
# Halo!

Anda menerima email ini karena kami menerima permintaan reset kata sandi untuk akun Anda.

@component('mail::button', ['url' => $actionUrl])
Reset Kata Sandi
@endcomponent

Tautan reset kata sandi ini akan kedaluwarsa dalam 60 menit.

Jika Anda tidak meminta reset kata sandi, tidak ada tindakan lebih lanjut yang diperlukan.

Salam,<br>
{{ env('MAIL_FROM_NAME') }}

Jika Anda mengalami kesulitan mengklik tombol "Reset Kata Sandi", salin dan tempel URL di bawah ini ke browser web Anda:
<br>
{{ $actionUrl }}
@endcomponent