<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="url('/verify-author-email?id=' . $id)">
Verification
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
